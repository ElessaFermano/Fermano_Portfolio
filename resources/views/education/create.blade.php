@extends('home')
@section('content')
 
<br>
<div class="card">
  <div class="card-header">
    <h2 class="h">EDUCATIONAL ATTAINMENT PAGE</h2>
  </div>
  <div class="card-body">
  <a href="{{ url('/education') }}" class="button" title="Back to Educational Attainment Page">
        <i class="fa fa-arrow-left" aria-hidden="true"></i> Back
  </a>
  <br>
      <form action="{{ url('education') }}" method="post">
        {!! csrf_field() !!}

        <label>Grade Level</label></br>
        <input type="text" name="grade_level" id="grade_level" class="form-control" required></br>
        <label>Year</label></br>
        <input type="text" name="year" id="year" class="form-control" required></br>
        <label>Name of School</label></br>
        <input type="text" name="school_name" id="school_name" class="form-control" required></br>
        <label>Address</label></br>
        <input type="text" name="address" id="address" class="form-control" required></br>
       
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