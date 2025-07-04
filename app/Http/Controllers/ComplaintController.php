<?php

namespace App\Http\Controllers;

use App\Models\Complaint;
use Illuminate\Http\Request;
use Mews\Captcha\Facades\Captcha;

class ComplaintController extends Controller
{
    public function create()
    {
        return view('pages.complaint', ['title' => 'File a Complaint']);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:20',
            'complaint' => 'required|string',
            'captcha' => 'required|captcha',
        ]);

        Complaint::create($request->only(['name', 'email', 'phone', 'complaint']));
        return redirect()->route('complaint')->with('success', 'Complaint submitted successfully.');
    }

    public function index()
    {
        $complaints = Complaint::latest()->paginate(10);
        return view('admin.complaints.index', ['title' => 'Customer Complaints', 'complaints' => $complaints]);
    }
}