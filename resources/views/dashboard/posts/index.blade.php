@extends('dashboard.layout')
@section('content')
<div
class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
<h5 class="h5">Posts Section</h5>
<div class="btn-toolbar mb-2 mb-md-0">
    <div class="btn-group mr-2">
        <a  href="{{route('posts.create')}}" class="btn btn-sm btn-outline-secondary">Add New Post</a>
    </div>
</div>
</div>
@if (!$posts->isEmpty())
<div class="table-responsive">
    <table class="table table-striped table-sm">
        <thead>
            <tr>
                <th>#</th>
                <th>Title</th>
                <th>Slug</th>
                <th>Thumbnail</th>
                <th>Author</th>
                <th>Created At</th>
                <th>Updated At</th>
                <th>Children</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($posts as $post)
         
            <tr>
                <td>{{$post->id}}</td>
                <td>   {{$post->title}}</td>
                <td>   {{$post->slug}}</td>
              
                <td><img class="img-fluid" src="{{asset('storage/'.$post->thumbnail)}}" alt="" width="50"> </td>
                <td>   <?php //echo ; ?>{{ $post->user->name }}</td>
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
               
                <td>
                @can('view',$post)
                    <a href="{{route('posts.show',$post->id)}}">Show</a>
                    {{-- @canany(['isAdmin','isSubscriber']) --}}

                    <a href="{{route('posts.edit',$post->id)}}">Edit</a>
                    <form action="{{route('posts.destroy',$post->id)}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-sm" type="submit">Delete</button>
                    </form>
                    @endcan
                </td>
            </tr>
            @endforeach
           <tr>
                <td colspan="9"> {{$posts->links()}}</td>
           </tr>
           
          
           
        </tbody>
    </table>
</div>    
@else
  <p class="alert alert-info">No Record found</p>    

@endif
    
@endsection