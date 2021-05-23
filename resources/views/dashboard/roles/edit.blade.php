@extends('dashboard.layout')
@section('content')
<form method="POST" action="{{route('roles.update',$role->id)}}">
    @csrf
    @method('PUT')
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="my-input">Edit Role</label>
                <input id="my-input" class="form-control" type="text" name="name" value="{{$role->name}}">
            </div>
            <div class="form-froup">
                <button type="submit" class="btn btn-primary">Update Role</button>
            </div>
        </div>
    </div>
</form> 
@endsection
