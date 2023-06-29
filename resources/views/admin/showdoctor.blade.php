<!DOCTYPE html>
<html lang="en">
  <head>
    @include('admin.css')
  </head>
  <body>
    <div class="container-scroller">
    
    @include('admin.sidebar')
    @include('admin.navbar')

    <div class="container-fluid page-body-wrapper">
      <div align="center" style="padding: 15px;">
        <table>
          <tr style="background-color:black;">
            <th style="padding: 15px; font-size: 15px; color: white;">Doctor Name</th>
            <th style="padding: 15px; font-size: 15px; color: white;">Phone</th>
            <th style="padding: 15px; font-size: 15px; color: white;">Speciality</th>
            <th style="padding: 15px; font-size: 15px; color: white;">Room No</th>
            <th style="padding: 15px; font-size: 15px; color: white;">Image</th>
            <th style="padding: 15px; font-size: 15px; color: white;">Update</th>
            <th style="padding: 15px; font-size: 15px; color: white;">Delete</th>
          </tr>

          @foreach($data as $doctor)
          
          <tr align="center" style="background-color:skyblue">
            <td style="padding: 15px; font-size: 15px; color: white;">{{$doctor->name}}</td>
            <td style="padding: 15px; font-size: 15px; color: white;">{{$doctor->phone}}</td>
            <td style="padding: 15px; font-size: 15px; color: white;">{{$doctor->speciality}}</td>
            <td style="padding: 15px; font-size: 15px; color: white;">{{$doctor->room}}</td>
            <td><img height="100" width="100" src="doctorimage/{{$doctor->image}}"></td>
            <td><a class="btn btn-primary" href="{{url('updatedoctor',$doctor->id)}}">Update</a></td>
            <td><a class="btn btn-danger" onclick="return confirm('Are you sure to remove doctor?')" href="{{url('deletedoctor',$doctor->id)}}">Delete</a></td>
          </tr>
          
          @endforeach
        
        </table>
      </div>
    </div>

    @include('admin.script')
  </body>
</html>