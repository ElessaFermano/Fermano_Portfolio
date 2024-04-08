@extends('home')
@section('content')
 
<br>
<div class="card">
  <div class="card-header">
    <h2 class="h">USER PAGE</h2>
  </div>
  <div class="card-body">
  <a href="{{ url('/user') }}" class="button" title="Back to user Page">
        <i class="fa fa-arrow-left" aria-hidden="true"></i> Back
  </a>
  <br>
      <form action="{{ url('user') }}" method="post">
        {!! csrf_field() !!}

        <label>Name</label></br>
        <input type="text" name="name" id="name" class="form-control" required></br>
     
        <label>Email</label></br>
        <input type="email" name="email" id="email" class="form-control" required></br>
     
        <label>Password</label></br>
        <input type="password" name="password" id="password" class="form-control" required></br>
     
        <input type="submit" value="Save" class="btn"></br>
    </form>
   
  </div>
</div>

@stop