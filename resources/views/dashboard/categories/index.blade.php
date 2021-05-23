@extends('dashboard.layout')
@section('content')
<div
class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
<h5 class="h5">Category Section</h5>
<div class="btn-toolbar mb-2 mb-md-0">
    <div class="btn-group mr-2">
        <a  href="{{route('categories.create')}}" class="btn btn-sm btn-outline-secondary">Add New Category</a>
    </div>
</div>
</div>
@if (!$categories->isEmpty())
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
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($categories as $category)
            <tr>
                <td>{{$category->id}}</td>
                <td>   {{$category->title}}</td>
                <td><img class="img-fluid" src="{{asset('storage/'.$category->thumbnail)}}" alt="" width="50"> </td>
                <td>{{$category->created_at}}</td>
                <td>{{$category->updated_at}}</td>
                <td>
                    @if (!$category->children->isEmpty())
                        @foreach($category->children as $children)
                      {{$children->title}}
                        @endforeach
                    @else
                    {{'Parent category'}}
                    @endif
                </td>
               
                <td>
                    <a href="{{route('categories.show',$category->id)}}">Show</a>
                    <a href="{{route('categories.edit',$category->id)}}">Edit</a>
                    <form action="{{route('categories.destroy',$category->id)}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-sm" type="submit">Delete</button>
                    </form>
                    <a href=""></a>
                </td>
            </tr>
            @endforeach
           
           
          
           
        </tbody>
    </table>
</div>    
@else
  <p class="alert alert-info">No Record found</p>    

@endif
    
@endsection