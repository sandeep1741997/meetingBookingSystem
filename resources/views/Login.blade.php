@extends('Layout')
<html>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="/home">Home</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="/Meeting">Meeting <span class="sr-only"></span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/login">Login</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/register">Signup</a>
      </li>
        </ul>
  </div>
</nav>
<form name="myform" action="logedin" method="POST"  onsubmit="">
@csrf
<div class="container">
  <div class="form-group">
    <label for="exampleInputEmail1">Email address</label>
    <input type="email" class="form-control" name="email" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" required><br>
  
  </div>
  <div class="form-group">
    <label for="InputPassword">Password</label>
    <input type="password" class="form-control" name="password" id="Password1" placeholder="Password" required >
  </div>
  <button type="submit" class="btn btn-primary" >Login</button>
  </div>
</form>
<script src="{{asset('js/main.js')}}" type="text/javascript"> </script>
</body>
</html>