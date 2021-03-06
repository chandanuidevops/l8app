@extends('dashboard.layout')
@section('content')
<div
class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
<h5 class="h5">Post Section</h5>
<div class="btn-toolbar mb-2 mb-md-0">
    <div class="btn-group mr-2">
        <a  href="{{route('posts.create')}}" class="btn btn-sm btn-outline-secondary">Add New post</a>
    </div>
</div>
</div>
@if ($post)
<div class="table-responsive">
    <table class="table table-striped table-sm">
        <thead>
            <tr>
                <th>#</th>
                <th>Title</th>
                <th>Thumbnail</th>
                <th>Created At</th>
                <th>Updated At</th>
                <th>Children</th>
                <th>Content</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
          
            <tr>
                <td>{{$post->id}}</td>
                <td>   {{$post->title}}</td>
                <td><img class="img-fluid" src="{{asset('storage/'.$post->thumbnail)}}" alt=""> </td>
                <td>{{$post->created_at}}</td>
                <td>{{$post->updated_at}}</td>
                <td>
                    @if (!$post->categories->isEmpty())
                        @foreach($post->categories as $cat)
                      {{$cat->title}}
                        @endforeach
                    @else
                    {{'Parent post'}}
                    @endif
                </td>
                <td>{!! $post->content !!}</td>
                <td>
                  
                    <a href="{{route('posts.edit',$post->id)}}">Edit</a>
                    <form action="{{route('posts.destroy',$post->id)}}" method="POST">
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