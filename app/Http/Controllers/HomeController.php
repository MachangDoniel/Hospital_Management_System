<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Doctor;
use App\Models\Doctors;

// use DB;
// use App\Http\Requests;
// use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function redirect()
    {
        if (Auth::id()) {
            if (Auth::user()->usertype == '0') {
                $doctor = Doctor::all();
                return view('user.home',compact('doctor'));
            } else {
                return view('admin.home');
            }
        } else {
            return redirect()->back();
        }
    }

    public function index()
    {
        if (Auth::id()) {
            return redirect('home');
        }
        else{
            $doctor = Doctor::all(); // Retrieve all doctors from the database
            return view('user.home',compact('doctor'));

            // $doctors=Doctor::select('select * from doctors');
            // return view('user.home',['doctors'=>$doctors]);
        }
        
    }
}
