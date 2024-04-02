@extends('home')
@section('content')
 
<br>
<br>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   
</head>
<body>
  
<div class="card">

  <div class="card-header">EXPERIENCES PAGE</div>
  
  <div class="card-body">
  <a href="{{ url('/experience') }}" class="button" title="Back to experience Page">
        <i class="fa fa-arrow-left" aria-hidden="true"></i> Back
  </a> 
 
        <div class="card-body">
       

        <p class="card-text">Title : {{ $experience->title }}</p>
        <p class="card-text">Details : {{ $experience->details }}</p>
        
   </div> 
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
 .card-header {
     
     font-weight: bold;
     font-size: 20px;
     font-family: sans-serif;
     margin-bottom: 10px;
     text-align: center;
 }
 .card-body {
    font-size: 20px;
    background-color: #ffccd5;
    border-radius: 5px;
 }
 .card-text{
  font-weight:600;
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
</style>
</body>
</html>

