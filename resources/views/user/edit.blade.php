@extends('home')
@section('content')

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
 
<div class="card">
  <div class="card-header">USERS PAGE</div>
  <div class="card-body">
  <a href="{{ url('/user') }}" class="button" title="Back to user Page">
        <i class="fa fa-arrow-left" aria-hidden="true"></i> Back
  </a>
      <form action="{{ url('user/' .$user->id) }}" method="post">
        {!! csrf_field() !!}
        @method("PATCH")
        <input type="hidden" name="id" id="id" value="{{$user->id}}" id="id" />
       
        <label>Name</label></br>
        <input type="text" name="name" id="name" value="{{$user->name}}" class="form-control" required></br>
       
        <label>Email</label></br>
        <input type="email" name="email" id="email" value="{{$user->email}}" class="form-control" required></br>
       
        <label>Password</label></br>
        <input type="password" name="password" id="password" value="{{$user->password}}" class="form-control" required></br>
      
     
        <input type="submit" value="Update" class="btn"></br>
    </form>
   
  </div>
</div>
 
</body>
</html>

@stop