@extends('dashboard.layout')
@section('content')
<form method="POST" action="{{route('categories.store')}}" enctype="multipart/form-data">
    @csrf
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="my-input">Add Category Title</label>
                <input id="my-input" class="form-control" type="text" name="title">
            </div>
                <div class="form-group">
                    <label for="my-textarea">Content</label>
                    <textarea id="inputContent" class="form-control" name="content" rows="3"></textarea>
                </div>
                <div class="form-group">
                    <label for="my-input">Thumbnail</label>
                    <input id="my-input" class="form-control" type="file" name="thumbnail">
                </div>
                <div class="form-group">
                        
                        <select id="my-select" class="form-control" name="parent_id">
                            <option value="0">Select A Parent Category</option>
                            @if (!$categories->isEmpty())
                                @foreach($categories as $key => $category)
                                    <option value="{{$category->id}}">{{$category->title}}</option>
                                @endforeach
                            @endif
                        </select>
                </div>

            <div class="form-froup">
                <button type="submit" class="btn btn-primary">Add Category</button>
            </div>
        </div>
    </div>
</form> 



@endsection
