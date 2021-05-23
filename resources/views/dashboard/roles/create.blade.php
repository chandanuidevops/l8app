@extends('dashboard.layout')
@section('content')
<form method="POST" action="{{route('roles.store')}}">
    @csrf
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="my-input">Add New Role</label>
                <input id="my-input" class="form-control" type="text" name="name">
            </div>
            <div class="form-froup">
                <button type="submit" class="btn btn-primary">Add Role</button>
            </div>
        </div>
    </div>
</form> 
@endsection
