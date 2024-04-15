@extends('home')
@section('content')
<div>
    <br>
    <br>
</div>
<link rel="stylesheet" href="views/blog.css">
<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h2 class="h">BLOG PAGE</h2>
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
                                    <th>Title</th>
                                    <th>Content</th>
                                    <th>Date</th>
                                    @if(Auth::User()->role == 'admin')
                                    <th>Actions</th>
                                    @endif
                                </tr>
                         
                                @foreach($blog as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        
                                        <td>{{ $item->title }}</td>
                                        <td>{{ $item->content }}</td>
                                        <td>{{ $item->date }}</td>
                                        
 
                                        <td>
                                        @if(Auth::User()->role == 'admin')

                                            <a href="{{ url('/blog/' . $item->id . '/edit') }}" title="Edit Info"><button class="edit"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>
 
                                            <form method="POST" action="{{ url('/blog' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                                                {{ method_field('DELETE') }}
                                                {{ csrf_field() }}
                                                <button type="submit" class="delete" title="Delete Info" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                                            </form>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        <br>
                        @if(Auth::User()->role == 'admin')
                        <a href="{{ url('/blog/create') }}" class="button2" title="Add New Info">
                            <i class="fa fa-plus" aria-hidden="true"></i> Add New
                        </a>
                       @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
  
@endsection