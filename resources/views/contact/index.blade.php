@extends('home')
@section('content')
<div>
    <br>
    <br>
</div>
<link rel="stylesheet" href="views/contact.css">
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

                    </div>
                </div>
            </div>
        </div>
    </div>
  
@endsection