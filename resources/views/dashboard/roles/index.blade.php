@extends('dashboard.layout')
@section('content')
<div
class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
<h5 class="h5">Roles Section</h5>
<div class="btn-toolbar mb-2 mb-md-0">
    <div class="btn-group mr-2">
        <a  href="{{route('roles.create')}}" class="btn btn-sm btn-outline-secondary">Add New Role</a>
    </div>
</div>
</div>
@if (!$roles->isEmpty())
<div class="table-responsive">
    <table class="table table-striped table-sm">
        <thead>
            <tr>
                <th>#</th>
                <th>Title</th>
                <th>Created At</th>
                <th>Updated At</th>
                <th>Users</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($roles as $role)
            <tr>
                <td>{{$role->id}}</td>
                <td>{{$role->name}}</td>
                <td>{{$role->created_at}}</td>
                <td>{{$role->updated_at}}</td>
                <td></td>
                <td>
                    <a href="{{route('roles.show',$role->id)}}">Show</a>
                    <a href="{{route('roles.edit',$role->id)}}">Edit</a>
                    <form action="{{route('roles.destroy',$role->id)}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-sm" type="submit">Delete</button>
                    </form>
                    <a href=""></a>
                </td>
            </tr>
            @endforeach
           
           
          
           
        </tbody>
    </table>
</div>    
@else
  <p class="alert alert-info">No Record found</p>    

@endif
    
@endsection