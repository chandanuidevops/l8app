@extends('dashboard.layout')
@section('content')
<form method="POST" action="{{route('posts.update', $post->id)}}" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="my-input">Edit Post Title</label>
                <input id="my-input" class="form-control" type="text" name="title" value="{{$post->title}}">
            </div>
                <div class="form-group">
                    <label for="my-textarea">Content</label>
                    <textarea id="my-textarea" class="form-control" name="content" rows="3">{!!$post->content!!}</textarea>
                </div>
                <div class="form-group">
                    <label for="my-input">Thumbnail</label>
                    <img src="{{asset('storage/'.$post->thumbnail)}}" alt="" width="100">
                    <input id="my-input" class="form-control" type="file" name="thumbnail">
                </div>
                <div class="form-group">

                        <select id="my-select" class="form-control" name="categories[]" multiple>
                            <option value="0">Select A Parent post</option>
                            @if (!$categories->isEmpty())
                                @foreach($categories as  $cats)
                                    <option @if (in_array($cats->id,$post->categories->pluck('id')->toArray()))
                                        {{'selected'}}
                                    @endif value="{{$cats->id}}">{{$cats->title}}</option>
                                @endforeach
                            @endif
                        </select>
                </div>

            <div class="form-froup">
                <button type="submit" class="btn btn-primary">Update post</button>
            </div>
        </div>
    </div>
</form> 
@endsection
