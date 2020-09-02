@extends('Layout')
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
<form action="/editedmeeting" method="POST">
            @csrf
            <div class="container">
            <div class="form-group">
                
                    <input type="hidden" class="form-control" name="id" id="" value="{{$meet->id}}">
                  </div>
              <div class="form-group">
                <label for="Meeting title">Meeting Title</label>
                <input type="text" class="form-control" name="meetingtitle" id="Meetingtitle" value="{{$meet->meetingtitle}}"aria-describedby="nameHelp"
                  placeholder="Meeting Title">
                  @error('meetingtitle')
                             <span style="color:red">{{$message}}</span>
                             @enderror
              </div>
              

              <div>
              <div class="form-group">
                <label for="Meeting user">Selection of user</label>
              <select class="form-control" name="user_id" required>
              <option>Select user</option>
                @foreach ($prof as $key)
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
                <input type="date" class="form-control" name="meetingdate" id="Meetingdate" value="{{$meet->meetingdate}}" aria-describedby="dateHelp"
                  placeholder="Meeting Date">
                   @error('meetingdate')
                 <span style="color:red">{{$message}}</span>
               @enderror
              </div>
              <div class="form-group">
                 <label for="Meeting time">Meeting Time</label>
                 <input type="time" class="form-control" name="meetingtime" id="Meetingtime" value="{{$meet->meetingtime}}" aria-describedby="timeHelp"
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
              </div>
            </form>
            </center>