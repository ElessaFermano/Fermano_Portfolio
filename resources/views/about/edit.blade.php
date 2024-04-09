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
  <div class="card-header">ABOUT PAGE</div>
  <div class="card-body">
  <a href="{{ url('/about') }}" class="button" title="Back to About Page">
        <i class="fa fa-arrow-left" aria-hidden="true"></i> Back
  </a>
      <form action="{{ url('about/' .$about->id) }}" method="post">
        {!! csrf_field() !!}
        @method("PATCH")
        <input type="hidden" name="id" id="id" value="{{$about->id}}" id="id" />
       
        <label>Name</label></br>
        <input type="text" name="name" id="name" value="{{$about->name}}" class="form-control" required></br>
       
        <label>Date of Birth</label></br>
        <input type="date" name="date_of_birth" id="date_of_birth" value="{{$about->date_of_birth}}" class="form-control" required></br>
       
        <label>Brgy</label></br>
        <input type="text" name="brgy" id="brgy" value="{{$about->brgy}}" class="form-control" required></br>
       
        <label>Municipality</label></br>
        <input type="text" name="municipality" id="municipality" value="{{$about->municipality}}" class="form-control" required></br>
       
        <label>Province</label></br>
        <input type="text" name="province" id="province" value="{{$about->province}}" class="form-control" required></br>
       
        <label>Zipcode</label></br>
        <input type="number" name="zipcode" id="zipcode" value="{{$about->zipcode}}" class="form-control" required></br>
       
        <label>Email</label></br>
        <input type="text" name="email" id="email" value="{{$about->email}}" class="form-control" required></br>
       
        <label>Age</label></br>
        <input type="number" name="age" id="age" value="{{$about->age}}" class="form-control" required></br>
       
        <input type="submit" value="Update" class="btn"></br>
    </form>
   
  </div>
</div>
 <style>
  .card {
    box-shadow: 0 5px 10px;
    border: 1px solid #ccc;
    border-radius: 8px;
    padding: 16px;
    width: 600px;
    margin: 20px auto; 
    box-shadow: 5px 5px;
}
  .card-header{
      background-color: #527da8;
      font-size: x-large;
      font-family: sans-serif;
      text-align: center;
      color: white;
      font-weight: bolder;
   
  }
  .card-body{
    background-color:#b6ccfe;
   
  }
   .button{
            background-color: #a4133c;
            color: wheat;
            text-decoration: none;
            padding: 2px 3px;
            font-size: small;
            border-radius: 3px;

        }
   .button:hover{
            color: lightcoral;
            transition-duration: 1s;
        }
   .btn{
          background-color: #a4133c;
          color: #ffe5ec;
  }
 </style>
</body>
</html>

@stop