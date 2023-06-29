<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Doctor;
use App\Models\Appointment;

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
        } 
        else {
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

    public function appointment(Request $request){
        $data=new appointment;
        $data->name=$request->name;
        $data->email=$request->email;
        $data->date=$request->date;
        $data->phone=$request->number;
        $data->message=$request->message;
        $data->doctor=$request->doctor;
        $data->status='In progress';
        if(Auth::id()){
            $data->user_id=Auth::user()->id;
        }
        else{
            $data->user_id='guest';
        }
        $data->save();
        
        //return redirect()->back();
        return redirect()->back()->with('message','Appointment Request Successfull. We will contact you soon.');
    }
    public function myappointment(){
        if(Auth::id()){
            if(Auth::user()->usertype==0){
            $userid=Auth::user()->id;
            $appoint=appointment::where('user_id',$userid)->get();
            return view('user.my_appointment',compact('appoint'));
            }
            else{
                return redirect()->back();
            }
        }
        else{
            return redirect('login');
        }
    }

    public function cancel_appoint($id){
        if(Auth::id()){
            if(Auth::user()->usertype==0){
            $data=appointment::find($id);
            $data->delete();
            return redirect()->back();
            }
            else{
                return redirect()->back();
            }
        }
        else{
            return redirect('login');
        }
    }
}
