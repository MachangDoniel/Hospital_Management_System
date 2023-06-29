<!DOCTYPE html>
<html lang="en">
  <head>
    <base href="/public">
    <style type="text/css">
        label{
            display: inline-block;
            width: 200px;
        }
    </style>
    @include('admin.css')
  </head>
  <body>
    <div class="container-scroller">
    <h1>Show Appointment</h1>
    @include('admin.sidebar')
    @include('admin.navbar')

    <div class="container-fluid page-body-wrapper">
        <div class="container">
            @if(session()->has('message'))
            <div class='alert alert-success'>
                
                {{session()->get('message')}}
                <button type=button class='close' data-bs-dismiss="alert" style="float: right;">
                    x
                </button>
                
            </div>
            @endif
            <form action="{{url('editdoctor',$data->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div style='padding:15px;'>
                    <label>Doctor Name</label>
                    <input type='text' style='color:black;' name='name' value="{{$data->name}}" required>
                </div>

                <div style='padding:15px;'>
                    <label>Phone No</label>
                    <input type='text' style='color:black;' name='number' value="{{$data->phone}}" required>
                </div>

                <div style='padding:15px;'>
                    <label>Speciality</label>
                    <input type='text' style='color:black;' name='speciality' value="{{$data->speciality}}" required>
                </div>

                <div style='padding:15px;'>
                    <label>Room No</label>
                    <input type='text' style='color:black;' name='room' value="{{$data->room}}" required>
                </div>

                <div style='padding:15px;'>
                    <label>Doctor Image</label>
                    <img height="100" width="100" src="doctorimage/{{$data->image}}">
                </div>

                <div style='padding:15px;'>
                    <label>Change Image</label>
                    <input type='file' name='file'>
                </div>

                <div style='padding:15px;'>
                    <input type='submit' class="btn btn-primary">
                </div>
            </form>
        </div>
    </div>

    @include('admin.script')
  </body>
</html>