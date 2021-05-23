@extends('dashboard.layout')
@section('content')
<form method="POST" action="{{route('users.update',$user->id)}}" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="my-input">Full Name</label>
                <input id="my-input" class="form-control" type="text" name="name" value="{{$user->name}}">
            </div>
            <div class="form-group">
                <label for="my-input">Email</label>
                <input id="my-input" class="form-control" type="text" name="email" value="{{$user->name}}">
            </div>

            <div class="form-group">
                <label for="my-input">Phone</label>
                <input id="my-input" class="form-control" type="text" name="phone" value="{{$user->profile->phone}}">
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <select id="my-select" class="form-control" name="country">
                    <label for="">Country</label>
                    @if (!$countries->isEmpty())
                    @foreach($countries as $key => $country)
                    <option @if($country->id==$user->profile->country->id){{'selected'}} @endif
                        value="{{$country->id}}">{{$country->name}}</option>
                    @endforeach
                    @endif
                </select>
            </div>
            <div class="form-group">
                <label for="my-input">City</label>
                <input id="my-input" class="form-control" type="text" name="city" value="{{$user->profile->city}}">
            </div>
            <div class="form-group">
                <select id="my-select" class="form-control" name="roles[]" multiple>
                    <label for="">Roles</label>
                    @if (!$roles->isEmpty())
                    @foreach($roles as $key => $role)
                    <option @if (in_array($role->id,$user->roles->pluck('id')->toArray()))
                        {{'selected'}}
                        @endif
                        value="{{$role->id}}">{{$role->name}}</option>
                    @endforeach
                    @endif
                </select>
            </div>
            <div class="form-group">
                <img src="{{asset('storage/'.$user->profile->photo)}}" alt="" width="50">
                <label for="my-input">Profile</label>
                <input id="my-input" class="form-control" type="file" name="photo">
            </div>
            </div>
            <div class="col-md-12">
                <div class="form-froup">
                    <button type="submit" class="btn btn-primary">Update User</button>
                </div>
            </div>
        </div>
    </div>
</form>
@endsection