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
  <div class="card-header">SEMINAR PAGE</div>
  <div class="card-body">
  <a href="{{ url('/seminar') }}" class="button" title="Back to Seminar Page">
        <i class="fa fa-arrow-left" aria-hidden="true"></i> Back
  </a>
      <form action="{{ url('seminar/' .$seminar->id) }}" method="post">
        {!! csrf_field() !!}
        @method("PATCH")
        <input type="hidden" name="id" id="id" value="{{$seminar->id}}" id="id" />
       
        <label>Agemda</label></br>
        <input type="text" name="agenda" id="agenda" value="{{$seminar->agenda}}" class="form-control" required></br>
       
        <label>Host Name</label></br>
        <input type="text" name="host_name" id="host_name" value="{{$seminar->host_name}}" class="form-control" required></br>
       
        <label>Date</label></br>
        <input type="date" name="date" id="date" value="{{$seminar->date}}" class="form-control" required></br>
       
     
        <input type="submit" value="Update" class="btn"></br>
    </form>
   
  </div>
</div>
 <style>
  .card {
    
    border: 1px solid #ccc;
    border-radius: 8px;
    padding: 16px;
    width: 600px;
    margin: 20px auto; 
    box-shadow: 5px 5px;
}
  .card-header{
      background-color: #02979d;
      font-size: x-large;
      font-family: sans-serif;
      text-align: center;
      color: white;
      font-weight: bolder;
   
  }
  .card-body{
    background-color:#ffccd5;
   
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