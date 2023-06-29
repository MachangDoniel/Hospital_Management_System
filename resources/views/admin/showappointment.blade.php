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
            <th style="padding: 15px; font-size: 15px; color: white;">Customer Name</th>
            <th style="padding: 15px; font-size: 15px; color: white;">Email</th>
            <th style="padding: 15px; font-size: 15px; color: white;">Phone</th>
            <th style="padding: 15px; font-size: 15px; color: white;">Doctor Name</th>
            <th style="padding: 15px; font-size: 15px; color: white;">Date</th>
            <th style="padding: 15px; font-size: 15px; color: white;">Message</th>
            <th style="padding: 15px; font-size: 15px; color: white;">Status</th>
            <th style="padding: 15px; font-size: 15px; color: white;">Approve</th>
            <th style="padding: 15px; font-size: 15px; color: white;">Cancel</th>
            <th style="padding: 15px; font-size: 15px; color: white;">Send mail</th>
          </tr>

          @foreach($data as $appoint)
          
          <tr align="center" style="background-color:skyblue">
            <td style="padding: 15px; font-size: 15px; color: white;">{{$appoint->name}}</td>
            <td style="padding: 15px; font-size: 15px; color: white;">{{$appoint->email}}</td>
            <td style="padding: 15px; font-size: 15px; color: white;">{{$appoint->phone}}</td>
            <td style="padding: 15px; font-size: 15px; color: white;">{{$appoint->doctor}}</td>
            <td style="padding: 15px; font-size: 15px; color: white;">{{$appoint->date}}</td>
            <td style="padding: 15px; font-size: 15px; color: white;">{{$appoint->message}}</td>
            <td style="padding: 15px; font-size: 15px; color: white;">{{$appoint->status}}</td>
            <td style="padding: 15px; font-size: 15px;">
              <a class="btn btn-success" href="{{url('approve',$appoint->id)}}">Approve</a>
            </td>
            <td style="padding: 15px; font-size: 15px;">
              <a class="btn btn-danger" href="{{url('cancel',$appoint->id)}}">Cancel</a>
            </td>
            <td style="padding: 15px; font-size: 15px;">
              <a class="btn btn-primary" href="{{url('emailview',$appoint->id)}}">Send Mail</a>
            </td>
          </tr>
          
          @endforeach
        
        </table>
      </div>
    </div>
    
    @include('admin.script')
  </body>
</html>