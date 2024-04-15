@extends('home')
@section('content')
<div>
    <br>
    <br>
</div>
<link rel="stylesheet" href="views/education.css">
<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h2 class="h">EDUCATIONAL ATTAINMENT PAGE</h2>
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
                                    <th>Grade Level</th>
                                    <th>Year</th>
                                    <th>Name of School</th>
                                    <th>Address</th>
                                    @if(Auth::User()->role == 'admin')
                                    <th>Actions</th>
                                    @endif
                                </tr>
                         
                                @foreach($education as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->grade_level }}</td>
                                        <td>{{ $item->year }}</td>
                                        <td>{{ $item->school_name }}</td>
                                        <td>{{ $item->address }}</td>
                                        
 
                                        <td>
                                        @if(Auth::User()->role == 'admin')
                                            <a href="{{ url('/education/' . $item->id . '/edit') }}" title="Edit Info"><button class="edit"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>
 
                                            <form method="POST" action="{{ url('/education' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
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
                        <a href="{{ url('/education/create') }}" class="button2" title="Add New Info">
                            <i class="fa fa-plus" aria-hidden="true"></i> Add New
                        </a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
  
@endsection