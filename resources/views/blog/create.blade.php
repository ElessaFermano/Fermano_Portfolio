@extends('home')
@section('content')
 
<br>
<div class="card">
  <div class="card-header">
    <h2 class="h">MY BLOG PAGE</h2>
  </div>
  <div class="card-body">
  <a href="{{ url('/education') }}" class="button" title="Back to Blog Page">
        <i class="fa fa-arrow-left" aria-hidden="true"></i> Back
  </a>
  <br>
      <form action="{{ url('blog') }}" method="post">
        {!! csrf_field() !!}

        <label>Title</label></br>
        <input type="text" name="title" id="title" class="form-control" required></br>
        <label>Content</label></br>
        <input type="text" name="content" id="content" class="form-control" required></br>
        <label>Date</label></br>
        <input type="date" name="date" id="date" class="form-control" required></br>
        
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