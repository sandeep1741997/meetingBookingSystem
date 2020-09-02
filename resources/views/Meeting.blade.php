@extends('Layout')

<!doctype html>
<html lang="en">

<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="http://127.0.0.1:8000/home">Home</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="http://127.0.0.1:8000/Meeting">Meeting <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="http://127.0.0.1:8000/login">Login</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="http://127.0.0.1:8000/register">Signup</a>
      </li>
        </ul>
  </div>
</nav>
  <center>
    <h1>Meeting Booking System</h1>
    <div class="card text-center">
  <div class="card-header">
  <h4>Booked Meeting Details</h4>
  <div class="container\ mx-2 my-4">
      <button class="btn bg-success" data-toggle="modal" data-target="#AddNewMeetingModal">AddNewMeeting</button>
    </div>
  </div>
  <div class="card-body">
  <table class="table">
  <thead class="thead-dark">
  <tr>
      <th scope="col">Meeting title</th>
      <th scope="col">Meeting date</th>
      <th scope="col">Meeting time</th>
      <th scope="col">Meeting with</th>
      <th scope="col">Action</th>
 </tr>
 </thead>
    @foreach ($meet as $key)
    @if(($key->host_id == $host_id) || ($key->user_id == $host_id))
                <tr scope="row">
                  <td>{{$key->meetingtitle}}</td>
                  <td>{{$key->meetingdate}}</td>
                  <td>{{$key->meetingtime}}</td>
                  <td>{{$key->user_id}}</td>
                  <td><button class="btn bg-success" onclick="window.location.href='http://127.0.0.1:8000/editmeeting/{{$key->id}}'">edit</button>
                      <button class="btn bg-danger" onclick="window.location.href='http://127.0.0.1:8000/deletemeeting/{{$key->id}}'">delete</button>
                  </td>
                
                </tr>
                @endif
    @endforeach 
    </table>
  </div>
  <div class="card-footer text-muted">
  
  </div>
</div>
    
    <div class="modal fade" id="AddNewMeetingModal" tabindex="-1" role="dialog" aria-labelledby="AddNewMeetingLabel"
      aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="AddNewMeetingLabel">Schedule a meeting</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form action="meetingadded" method="POST">
            @csrf
            <div class="form-group">
            <label for="Meeting host">Host_id</label>
                    <input type="text" class="form-control" name="host_id" id="host" value="{{$host_id}}">
                  </div>
              <div class="form-group">
                <label for="Meeting title">Meeting Title</label>
                <input type="text" class="form-control" name="meetingtitle" id="Meetingtitle" aria-describedby="nameHelp"
                  placeholder="Meeting Title">
                  @error('meetingtime')
                 <span style="color:red">{{$message}}</span>
               @enderror
              </div>

              <div>
              <div class="form-group">
                <label for="Meeting user">Selection of user</label>
              <select class="form-control" name="user_id">
              <option>Select user</option>
                @foreach ($temp as $key)
                @if($key->id != $host_id)
                <option value="{{ $key ->id}}" > 
                   {{ $key->name}} 
                </option>
                @endif
              @endforeach    
              </select>
              @error('user_id')
                 <span style="color:red">{{$message}}</span>
               @enderror
              </div>
               
              <div class="form-group">
                  <label for="Meeting Date">Meeting Date</label>
                  <input type="date" class="form-control" name="meetingdate" id="Meetingdate" aria-describedby="dateHelp"
                   placeholder="Meeting Date">
                   @error('meetingdate')
                   <span style="color:red">{{$message}}</span>
                   @enderror
              </div>
              <div class="form-group">
                  <label for="Meeting time">Meeting Time</label>
                  <input type="time" class="form-control" name="meetingtime" id="Meetingtime" aria-describedby="timeHelp"
                  placeholder="Meeting Title">
                  @error('meetingtime')
                  <span style="color:red">{{$message}}</span>
                  @enderror
              </div>
              <div class="form-group form-check">
                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                <label class="form-check-label" for="exampleCheck1">Check me out</label>
              </div>
                 <button type="submit" class="btn btn-primary">Submit</button>
            </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>

  </center>


  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
    integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
    crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
    integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
    crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
    integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
    crossorigin="anonymous"></script>
    <script src="{{asset('js/main.js')}}" type="text/javascript"> </script>
    
</body>

</html>