<?php

namespace App\Http\Controllers;

use App\Notifications\SendEmailNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\Doctor;

use App\Models\Appointment;
use Notification;

class AdminController extends Controller
{
    public function addview(){
        if(Auth::id()){
            if(Auth::user()->usertype==1){
                return view('admin.add_doctor');
            }
            else{
                return redirect()->back();
            }
        }
        else{
            return redirect('login');
        }  
    }
    public function upload(Request $request){
        if(Auth::id()){
            if(Auth::user()->usertype==1){
            $doctor=new doctor;
            $image=$request->file;
            $imagename=time().'.'.$image->getClientoriginalExtension();
            $request->file->move('doctorimage',$imagename);
            $doctor->image=$imagename;
            $doctor->name=$request->name;
            $doctor->phone=$request->number;
            $doctor->room=$request->room;
            $doctor->speciality=$request->speciality;

            $doctor->save();
            return redirect()->back()->with('message','Doctor Added succesfully');
            }
            else{
                return redirect()->back();
            }
        }
        else{
            return redirect('login');
        }
    }

    public function showappointment(){
        if(Auth::id()){
            if(Auth::user()->usertype==1){
                $data=appointment::all();
                return view('admin.showappointment',compact('data'));
            }
            else{
                return redirect()->back();
            }
        }
        else{
            return redirect('login');
        }

       
    }
    public function approve($id){
        if(Auth::id()){
            if(Auth::user()->usertype==1){
                $data=appointment::find($id);
                $data->status='Approved';
                $data->save();
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
    public function cancel($id){
        if(Auth::id()){
            if(Auth::user()->usertype==1){
                $data=appointment::find($id);
                $data->status='Canceled';
                $data->save();
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
    public function showdoctor(){
        if(Auth::id()){
            if(Auth::user()->usertype==1){
                $data=doctor::all();
                return view('admin.showdoctor',compact('data'));
            }
            else{
                return redirect()->back();
            }
        }
        else{
            return redirect('login');
        }
    }

    public function deletedoctor($id){
        if(Auth::id()){
            if(Auth::user()->usertype==1){
                $data=doctor::find($id);
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

    public function updatedoctor($id){
        if(Auth::id()){
            if(Auth::user()->usertype==1){
                $data=doctor::find($id);
                return view('admin.updatedoctor',compact('data'));
            }
            else{
                return redirect()->back();
            }
        }
        else{
            return redirect('login');
        }
    }
    public function editdoctor(Request $request, $id){
        if(Auth::id()){
            if(Auth::user()->usertype==1){
                $doctor=doctor::find($id);
                $doctor->name=$request->name;
                $doctor->phone=$request->number;
                $doctor->speciality=$request->speciality;
                $doctor->room=$request->room;
                $image=$request->file;
                if($image){
                    $imagename=time().'.'.$image->getClientOriginalExtension();
                    $request->file->move('doctorimage',$imagename);
                    $doctor->image=$imagename;
                }

                $doctor->save();
                return redirect()->back()->with('message','Doctor Details Updated Successfully');
            }
            else{
                return redirect()->back();
            }
        }
        else{
            return redirect('login');
        }
            }

    public function emailview($id){
        if(Auth::id()){
            if(Auth::user()->usertype==1){
                $data=appointment::find($id);
                return view('admin.emailview',compact('data'));
            }
            else{
                return redirect()->back();
            }
        }
        else{
            return redirect('login');
        }
    }

    public function sendemail(Request $request,$id){
        if(Auth::id()){
            if(Auth::user()->usertype==1){
                $data=appointment::find($id);
                $details=[
                    'greeting'=> $request->greeting,
                    'body'=> $request->body,
                    'actiontext'=> $request->actiontext,
                    'actionurl'=> $request->actionurl,
                    'endpart'=> $request->endpart
                ];

                Notification::send($data,new SendEmailNotification($details));
                return redirect()->back()->with('message','Email is sent Succesfully');
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
