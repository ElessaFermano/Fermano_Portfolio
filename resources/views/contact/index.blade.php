@extends('home')
@section('content')
<div>
    <br>
    <br>
</div>
<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h2 class="h">CONTACTS PAGE</h2>
                </div>
                <div class="card-body">
                <a href="{{ url('/home') }}" class="button" title="Back to Dashboard">
                            <i class="fa fa-arrow-left" aria-hidden="true"></i> Back
                        </a>
                    <br>
                    <br/>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Phone</th>
                                    <th>Facebook</th>
                                    <th>Email</th>
                                    <th>Linkedin</th>
                                    
                                    <th>Actions</th>
                                </tr>
                         
                                @foreach($contact as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->phone }}</td>
                                        <td> <a href="{{$item->facebook}}"  target="_blank">{{ $item->facebook}}</a></td>
                                        <td>{{ $item->email }}</td>
                                        <td>{{ $item->linkedin }}</td>
                                        
                                        
 
                                        <td>
                                            <a href="{{ url('/contact/' . $item->id) }}" title="View Info"><button class="view"><i class="fa fa-eye"  aria-hidden="true"></i> View</button></a>
                                            <a href="{{ url('/contact/' . $item->id . '/edit') }}" title="Edit Info"><button class="edit"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>
 
                                            <form method="POST" action="{{ url('/contact' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                                                {{ method_field('DELETE') }}
                                                {{ csrf_field() }}
                                                <button type="submit" class="delete" title="Delete Info" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        <br>
<!--                        
                        <a href="{{ url('/contact/create') }}" class="button2" title="Add New Info">
                            <i class="fa fa-plus" aria-hidden="true"></i> Add New
                        </a> -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <style>
      
        .container{
            box-shadow: 0 5px 10px;
            border-radius: 10px;
            width: 100%;
            margin: 0;
            padding: 0;
        }
        .card-header{
            background-color: #02979d;
        }

        .h{
            font-size: x-large;
            font-family: sans-serif;
            text-align: center;
            color: white;
            font-weight: bolder;
        }
        .col-12{
        width: 100%;
        }
      tr{
        padding-left: 5px;
      }
        .button{
            background-color: #3e92cc;
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
        .card-body{
            border: 2px;
            border-radius: 50px;
            width: 100%;
            color:#abc4ff;
        }
        .table-responsive{
            background-color: #abc4ff;
            border-radius: 10px;
            padding: 0;
        }
        .table{
            background-color: #abc4ff;
            table-layout: auto;
            
        }
        
        .button2{
            background-color: #3e92cc;
            color: wheat;
            text-decoration: none;
            padding: 2px 3px;
            font-size: small;
            border-radius: 3px;
        }
        .button2:hover{
            color: hotpink;
            transition-duration: 1s;
        }
      .view{
        border: 2px;
        border-style: solid;
        border-radius: 5px;
        color: #7b5063;
        font-size: 10px;
        background-color:#f3d5b5 ;
      }
      .view:hover{
        color: #fb6f92;
        transition-duration: 1s;
      }
      .edit{
        border: 2px;
        border-style: solid;
        border-radius: 5px;
        color: #7b5063;
        font-size: 10px;
        background-color:#f3d5b5 ;
      }
      .edit:hover{
        color:#fb6f92 ;
        transition-duration: 1s;
      }
      .delete{
        border: 2px;
        border-style: solid;
        border-radius: 5px;
        color: #7b5063;
        font-size: 10px;
        background-color:#f3d5b5 ;
      }
      .delete:hover{
        color: #fb6f92;
        transition-duration: 1s;
      }
      td{
        padding: 0;
      }
    </style>
@endsection