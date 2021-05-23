@extends('dashboard.layout')
@section('content')
<form method="POST" action="{{route('users.store')}}" enctype="multipart/form-data">
    @csrf
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="my-input">User Name</label>
                <input id="my-input" class="form-control" type="text" name="username">
            </div>
            <div class="form-group">
                <label for="my-input">Full Name</label>
                <input id="my-input" class="form-control" type="text" name="name">
            </div>
            <div class="form-group">
                <label for="my-input">Email</label>
                <input id="my-input" class="form-control" type="text" name="email">
            </div>
            <div class="form-group">
                <label for="my-input">Password</label>
                <input id="my-input" class="form-control" type="password" name="password">
            </div>

        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="my-input">Phone</label>
                <input id="my-input" class="form-control" type="text" name="phone">
            </div>
            <div class="form-group">
                <label for="">Country</label>
                <select id="my-select" class="form-control" name="country">
                   
                    @if (!$countries->isEmpty())
                    @foreach($countries as $key => $country)
                    <option value="{{$country->id}}">{{$country->name}}</option>
                    @endforeach
                    @endif
                </select>
            </div>
            <div class="form-group">
                <label for="my-input">City</label>
                <input id="my-input" class="form-control" type="text" name="city">
            </div>
            <div class="form-group">
                <select id="my-select" class="form-control" name="roles[]" multiple>
                    <label for="">Role</label>
                    @if (!$roles->isEmpty())
                    @foreach($roles as $key => $role)
                    <option value="{{$role->id}}">{{$role->name}}</option>
                    @endforeach
                    @endif
                </select>
            </div>

            <div class="form-group">
                <label for="my-input">Profile</label>
                <input id="my-input" class="form-control" type="file" name="photo">
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="form-froup">
                    <button type="submit" class="btn btn-primary">Add User</button>
                </div>
            </div>
        </div>
    </div>
</form>
@endsection