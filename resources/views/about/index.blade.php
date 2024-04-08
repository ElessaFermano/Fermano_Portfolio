@extends('home')
@section('content')

<link rel="stylesheet" href="views/about.css">
<div>
    <br>
    <br>
</div>
<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h2 class="h">ABOUT PAGE</h2>
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
                                    <th>Name</th>
                                    <th>Birthdate</th>
                                    <th>Address</th>
                                    <th>Zipcode</th>
                                    <th>Email</th>
                                    <th>Age</th>
                                    <th>Actions</th>
                                </tr>
                         
                                @foreach($about as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->name }}</td>
                                        <td>{{ $item->date_of_birth }}</td>
                                        <td>{{ $item->address }}</td>
                                        <td>{{ $item->zipcode }}</td>
                                        <td>{{ $item->email }}</td>
                                        <td>{{ $item->age }}</td>
                                        
 
                                        <td>
                                        @if(Auth::User()->role == 'admin')
                                            <a href="{{ url('/about/' . $item->id . '/edit') }}" title="Edit Info"><button class="edit"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>
                                        @endif
                                           
                                        </td>
                                    </tr>
                                @endforeach
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

