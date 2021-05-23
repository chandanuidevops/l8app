@extends('dashboard.layout')
@section('content')
<div
class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
<h5 class="h5">User Section</h5>
<div class="btn-toolbar mb-2 mb-md-0">
    <div class="btn-group mr-2">
        <a  href="{{route('users.create')}}" class="btn btn-sm btn-outline-secondary">Add New User</a>
    </div>
</div>
</div>
@if ($user)
<div class="table-responsive">
    <table class="table table-striped table-sm">
        <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Username</th>
                <th>profile</th>
                <th>Phone</th>
                <th>City</th>
                <th>Country</th>
                <th>Roles</th>
                <th>Created At</th>
                <th>Updated At</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
          
            <tr>
                <td>{{$user->id}}</td>
                <td>{{$user->name}}</td>
                <td>   {{$user->username}}</td>
                <td><img class="img-fluid" src="{{asset('storage/'.$user->profile->photo)}}" alt="" width="50"> </td>
                <td>{{$user->profile->phone}}</td>
                <td>{{$user->profile->city}}</td>
                <td>{{$user->profile->country->name}}</td>
                <td>
                    @if (!$user->roles->isEmpty())
                    {{$user->roles->implode('name',' ,')}}
                    @endif
                </td>
                <td>{{$user->created_at}}</td>
                <td>{{$user->updated_at}}</td>
              
               
                <td>
                  
                    <a href="{{route('users.edit',$user->id)}}">Edit</a>
                    <form action="{{route('users.destroy',$user->id)}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-sm" type="submit">Delete</button>
                    </form>
                    <a href=""></a>
                </td>
            </tr>     
        </tbody>
    </table>
</div>    
@else
  <p class="alert alert-info">No Record found</p>    

@endif
    
@endsection