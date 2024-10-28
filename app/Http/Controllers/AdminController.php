<?php

namespace App\Http\Controllers;

use App\Models\Complaint;
use Illuminate\Http\Request;


class AdminController extends Controller
{
    function index() {
        $all = Complaint::count();
        $pending = Complaint::where('status', 'pending')->count();
        $proses = Complaint::where('status', 'proses')->count();
        $selesai = Complaint::where('status', 'selesai')->count();


        return view('dashboard.index',[
            'all'=> $all,
            'pending'=> $pending,
            'proses'=> $proses,
            'done'=> $selesai
        ]);
    }

    function allComplaints() {
        $data = Complaint::with('user')->get();
        return view('admin.complaints.index', [
            'data' => $data
        ]);
    }
    function allpendingComplaints() {
        $data = Complaint::where('status','pending')->get();
        return view('admin.complaints.index', [
            'data' => $data
        ]);
    }
    function allprocessComplaints() {
        $data = Complaint::where('status','proses')->get();
        return view('admin.complaints.index', [
            'data' => $data
        ]);
    }
    function allsuccessComplaints() {
        $data = Complaint::where('status','selesai')->get();
        return view('admin.complaints.index', [
            'data' => $data
        ]);
    }
  function showComplaint($id) {
    $data = Complaint::findOrFail($id);
    return view('admin.complaints.detail-complaint',[
        'data' => $data
    ]); 
  }
      
}
