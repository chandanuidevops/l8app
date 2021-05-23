@extends('dashboard.layout')
@section('content')
<form method="POST" action="{{route('categories.update', $category->id)}}" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="my-input">Add Category Title</label>
                <input id="my-input" class="form-control" type="text" name="title" value="{{$category->title}}">
            </div>
                <div class="form-group">
                    <label for="my-textarea">Content</label>
                    <textarea id="my-textarea" class="form-control" name="content" rows="3">{!!$category->content!!}</textarea>
                </div>
                <div class="form-group">
                    <label for="my-input">Thumbnail</label>
                    <img src="{{asset('storage/'.$category->thumbnail)}}" alt="" width="100">
                    <input id="my-input" class="form-control" type="file" name="thumbnail">
                </div>
                <div class="form-group">

                        <select id="my-select" class="form-control" name="parent_id">
                            <option value="0">Select A Parent Category</option>
                            @if (!$categories->isEmpty())
                                @foreach($categories as $key => $value)
                                    <option @if ($value->id==$category->parent->id)
                                        {{'selected'}}
                                    @endif value="{{$value->id}}">{{$value->title}}</option>
                                @endforeach
                            @endif
                        </select>
                </div>

            <div class="form-froup">
                <button type="submit" class="btn btn-primary">Update Category</button>
            </div>
        </div>
    </div>
</form> 
@endsection
