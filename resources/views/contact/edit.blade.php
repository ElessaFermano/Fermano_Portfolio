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
  <div class="card-header">CONTACTS PAGE</div>
  <div class="card-body">
  <a href="{{ url('/contact') }}" class="button" title="Back to contact Page">
        <i class="fa fa-arrow-left" aria-hidden="true"></i> Back
  </a>
      <form action="{{ url('contact/' .$contact->id) }}" method="post">
        {!! csrf_field() !!}
        @method("PATCH")
        <input type="hidden" name="id" id="id" value="{{$contact->id}}" id="id" />
       
        <label>Phone</label></br>
        <input type="number" name="phone" id="phone" value="{{$contact->phone}}" class="form-control" required></br>
       
        <label>Facebook</label></br>
        <input type="text" name="facebook" id="facebook" value="{{$contact->facebook}}" class="form-control" required></br>
       
        <label>Email</label></br>
        <input type="text" name="email" id="email" value="{{$contact->email}}" class="form-control" required></br>
       
        <label>Linkedin</label></br>
        <input type="text" name="linkedin" id="linkedin" value="{{$contact->linkedin}}" class="form-control" required></br>
          
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