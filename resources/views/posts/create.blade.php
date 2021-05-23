@extends('layouts.posts')
@section('title')
Create New Post
@endsection
@section('content')
<form action="{{ route('post.store') }} " method="POST">
    @csrf

    <input type="text" name="title" value="{{  old('title') }} " placeholder="title">
    @error('title')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror<br>
    <input type="date" name="start_date" value="<?php echo old('start_date'); ?>" placeholder="title">
    @error('start_date')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror<br>
    <input type="date" name="finish_date" value="<?php echo old('finish_date'); ?>" placeholder="title">
    @error('finish_date')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror<br>
    <input type="url" name="website" value="<?php echo old('website'); ?>" placeholder="website">
    @error('website')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror<br>
    <textarea name="content" id="" cols="30" rows="10"><?php echo old('content'); ?></textarea> @error('content')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror<br>
    <label for="">General</label><input type="checkbox" name="check[]" placeholder="name"> @error('check')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror<br>
    <input type="file" name="photo" placeholder="name"> @error('photo')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror<br>
    <input type="password" name="password" placeholder="password">
    <input type="password" name="password_confirmation" placeholder="password">
    @error('password_confirmation')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror<br>
    <label for="">T&C</label><input type="checkbox" name="tos"> @error('tos')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror<br>
    <input type="submit" value="submit">
</form>

@endsection
