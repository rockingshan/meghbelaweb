<?php

namespace App\Http\Controllers;

use App\Models\Channel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ChannelController extends Controller
{
    public function channels()
    {
        $sql = "SELECT lcn.genre, lcn.lcn, cm.channelName, br.broadcaster, cm.price FROM channel_mapping_tb AS cmap INNER JOIN sid_tb AS sid ON cmap.sid_id = sid.sid_id INNER JOIN lcn_tb AS lcn ON cmap.lcn_id = lcn.lcn_id LEFT JOIN channel_master_tb AS cm ON cmap.channel_id = cm.channel_id LEFT JOIN broadcaster_tb AS br ON cm.broadcaster_id = br.broadcaster_id WHERE sid.city_id = 1 ORDER BY lcn.lcn ASC";
        $channels = \DB::connection('mysql')->select($sql);
        return view('pages.channels', ['channels' => $channels, 'title' => 'Channel List']);
    }

    public function lcnmaster()
    {
        $channels = \App\Models\Channel::with('lcnRelation', 'sidInfo')->orderBy('lcn')->get();

        return view('admin.lcnmaster.index', ['title' => 'LCN Master'], compact('channels'));
    }

    public function editChannelName($sid)
    {
        $channel = Channel::where('sid', $sid)->firstOrFail();
        return view('admin.lcnmaster.edit', compact('channel'));
    }

    public function updateChannelName(Request $request, $sid)
    {
        $request->validate([
            'channel' => 'required|string|max:255',
        ]);
        $channel = Channel::where('sid', $sid)->firstOrFail();
        $channel->channel = $request->channel;
        $channel->save();
        return redirect()->route('admin.lcnmaster')->with('success', 'Channel name updated successfully.');
    }

    public function showUpdate($sid)
    {
        $channel = Channel::with('lcnRelation', 'sidInfo')->where('sid', $sid)->firstOrFail();
        // Get LCNs from Lcn model that are not present in Channel model
        $usedLcns = Channel::pluck('lcn')->toArray();
        $availableLcns = \App\Models\Lcn::whereNotIn('lcn', $usedLcns)->get();
        return view('admin.lcnmaster.update', compact('channel', 'availableLcns'));
    }

    public function updateAllFields(Request $request, $sid)
    {
        $request->validate([
            'lcn' => 'required|integer',
            'channel' => 'required|string|max:255',
        ]);
        $channel = Channel::where('sid', $sid)->firstOrFail();
        $channel->lcn = $request->lcn;
        $channel->channel = $request->channel;
        // Update lcnhex from Lcn model
        $lcnModel = \App\Models\Lcn::where('lcn', $request->lcn)->first();
        if ($lcnModel) {
            $channel->lcnhex = $lcnModel->lcnhex;
        }
        $channel->save();
        return redirect()->route('admin.lcnmaster')->with('success', 'Channel LCN and name updated successfully.');
    }

    public function downloadExcel()
    {
        // If Laravel Excel is available, use it. Otherwise, fallback to CSV export.
        if (class_exists('Maatwebsite\\Excel\\Facades\\Excel')) {
            $channels = Channel::with('lcnRelation', 'sidInfo')->orderBy('lcn')->get();
            $exportData = $channels->map(function ($row) {
                return [
                    'Genre' => $row->lcnRelation->genre ?? '',
                    'LCN' => $row->lcn,
                    'SID' => $row->sid,
                    'Freq' => $row->sidInfo->freq ?? '',
                    'Channel' => $row->channel,
                ];
            });
            $export = new class($exportData) implements \Maatwebsite\Excel\Concerns\FromCollection, \Maatwebsite\Excel\Concerns\WithHeadings {
                private $data;
                public function __construct($data) { $this->data = $data; }
                public function collection() { return collect($this->data); }
                public function headings(): array { return ['Genre', 'LCN', 'SID', 'Freq', 'Channel']; }
            };
            return \Maatwebsite\Excel\Facades\Excel::download($export, 'lcn_master.xlsx');
        } else {
            // Fallback: CSV export
            $channels = Channel::with('lcnRelation', 'sidInfo')->orderBy('lcn')->get();
            $filename = 'lcn_master.csv';
            $headers = [
                'Content-Type' => 'text/csv',
                'Content-Disposition' => 'attachment; filename="' . $filename . '"',
            ];
            $callback = function() use ($channels) {
                $handle = fopen('php://output', 'w');
                fputcsv($handle, ['Genre', 'LCN', 'SID', 'Freq', 'Channel']);
                foreach ($channels as $row) {
                    fputcsv($handle, [
                        $row->lcnRelation->genre ?? '',
                        $row->lcn,
                        $row->sid,
                        $row->sidInfo->freq ?? '',
                        $row->channel,
                    ]);
                }
                fclose($handle);
            };
            return response()->stream($callback, 200, $headers);
        }
    }
}
