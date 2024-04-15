@extends('home')
@section('content')
<div>
    <br>
    <br>
</div>
<link rel="stylesheet" href="views/user.css">

<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h2 class="h">USERS PAGE</h2>
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
                                    <th>Role</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Actions</th>
                                </tr>
                                
                                @foreach($users as $item)
                                @if($item->role == 'spectator')
                             
                                    <tr>
                                    
                                        <td>{{ $loop->iteration }}</td>   
                                        <td>{{$item->role}}</td>              
                                        <td>{{ $item->name }}</td>
                                        <td>{{ $item->email }}</td>
                                    
                                       
                                        <td>
                                           
                                            <a href="{{ url('/user/' . $item->id . '/edit') }}" title="Edit Info"><button class="edit"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>
 
                                            <form method="POST" action="{{ url('/user' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                                                {{ method_field('DELETE') }}
                                                {{ csrf_field() }}
                                                <button type="submit" class="delete" title="Delete Info" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                                            </form>
                                        </td>
                                       @endif
                                        @endforeach
                                    
                                    </tr>
                               
                                
                                </tbody>
                            </table>
                        </div>
                        <br>
                  
                    </div>
                </div>
            </div>
        </div>
    </div>
    
   
@endsection