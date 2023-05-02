@extends('layouts.app')
 
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Grade</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('grades.create') }}"> Create New Grade</a>
            </div>
        </div>
    </div>
   
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
   
    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Name</th>
            <th>Status</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($grades as $grade)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $grade->name }}</td>
            <td>{{ $grade->status }}</td>
            <td>
                <form action="{{ route('grades.destroy',$grade->id) }}" method="POST">
   
                    <a class="btn btn-info" href="{{ route('grades.show',$grade->id) }}">Show</a>
    
                    <a class="btn btn-primary" href="{{ route('grades.edit',$grade->id) }}">Edit</a>
   
                    @csrf
                    @method('DELETE')
      
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
  
    {!! $grades->links() !!}
      
@endsection