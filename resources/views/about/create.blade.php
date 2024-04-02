@extends('home')
@section('content')
 
<br>
<div class="card">
  <div class="card-header">
    <h2 class="h">ABOUT PAGE</h2>
  </div>
  <div class="card-body">
  <a href="{{ url('/about') }}" class="button" title="Back to About Page">
        <i class="fa fa-arrow-left" aria-hidden="true"></i> Back
  </a>
  <br>
      <form action="{{ url('about') }}" method="post">
        {!! csrf_field() !!}

        <label>Name</label></br>
        <input type="text" name="name" id="name" class="form-control" required></br>
        <label>Date of Birth</label></br>
        <input type="date" name="date_of_birth" id="date_of_birth" class="form-control" required></br>
        <label>Address</label></br>
        <input type="text" name="address" id="address" class="form-control" required></br>
        <label>Zipcode</label></br>
        <input type="number" name="zipcode" id="zipcode" class="form-control" required></br>
        <label>Email</label></br>
        <input type="text" name="email" id="email" class="form-control" required></br>
        <label>Phone</label></br>
        <input type="number" name="phone" id="phone" class="form-control" required></br>
       
        <input type="submit" value="Save" class="btn"></br>
    </form>
   
  </div>
</div>
 
<style>
  .card{
    background-color: #c2e9e7;
    border-radius: 20px;
  }
  .card-header{
    background-color: #02979d;
    border-radius: 20px;
  }
  .h{
    color: white;
    font-family: sans-serif;
    text-align: center;
    font-size: larger;
    font-weight: bolder;
  }

  .btn{
    background-color: #a4133c;
    color: #ffe5ec;
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
@stop