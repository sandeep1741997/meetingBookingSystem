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
        <a class="nav-link" href="/Meeting">Meeting <span class="sr-only">(current)</span></a>
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
<form action="registered" method="POST"  onsubmit=" validateform()">
{{ csrf_field() }} {{ method_field('POST') }}
<input name="_token" type="hidden" value="{{ csrf_token() }}"/>
<div class="container register-form">

            <div class="form" >

                
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="text" class="form-control" name="name" placeholder="Your Name *" value=""/><br>
                             @error('name')
                             <span style="color:red">{{$message}}</span>
                             @enderror
                            </div><br>
                         <div class="form-group">
                                <input type="text" class="form-control" name="email" placeholder="Email *" value=""/><br>
                                @error('email')
                             <span style="color:red">{{$message}}</span>
                             @enderror
                        </div>   
                        <br>
                        
                
                                   
                
                            <div class="form-group">
                                <input type="password" class="form-control" name ="password" placeholder="Your Password *" value=""/><br>
                            @error('password')
                             <span style="color:red">{{$message}}</span>
                             @enderror
                            </div>
                          
                        <br><br>
                    </div>
                    </div>   
                    <button type="submit" class="btnSubmit" onclick=" validateform()">Register</button>
                </div>
            </div>
        
    </form>
    </body>
</html>
    