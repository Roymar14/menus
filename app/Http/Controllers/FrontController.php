<?php

namespace App\Http\Controllers;

use App\Models\complaint;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FrontController extends Controller
{
    function semuaPengaduan() {
        $data = Complaint::all();
        return view('front.semua-pengaduan', [
            'data' => $data 
        ]);
    }

    function semuaStatistik() {
        $all = Complaint::count();
        $pending = Complaint::where('status', 'pending')->count();
        $proses = Complaint::where('status', 'proses')->count();
        $selesai = Complaint::where('status', 'selesai')->count();


        return view('front.statistik',[
            'all'=> $all,
            'pending'=> $pending,
            'proses'=> $proses,
            'selesai'=> $selesai
        ]);
    }

    function formPengaduan() {
        return view('front.form-pengaduan');
    }
    function storeComplaint(Request $request) {
        $request->validate([
            'name' => 'required|string|max:225',
            'title' => 'required|string|max:225',
            'telp' => 'required|numeric|min:10',
            'email' => 'required|email|unique:users',
            'description' =>'required|string',
            'image'=> 'required|image|mimes:jpg,jpeg,png|max:2048'
        ]);
        if ($request->hasFile('image')) {
            $path = 'public/complaints';
            $image = $request->file('image');
            $name = $image-> getClientOriginalName();
            $request->file('image')->storeAs($path, $name);
        }

        $user = Auth::user();
        
        $complaint = new complaint();
        $complaint->guest_name = $request->name;
        $complaint->guest_telp = $request->telp;
        $complaint->guest_email = $request->email;
        $complaint->description = $request->description;
        $complaint->image = $name;
        $complaint->title = $request->title;
        $complaint->user_id = $user ? $user->id : null;

        $complaint->save();

        return redirect()->back()->with('msg', 'pengaduan anda berhasil dikirimkan!');

    }
}

