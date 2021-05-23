<?php

namespace App\Http\Controllers;
use App\Models\Post;
use App\Models\Category;
use App\Models\User;
use App\Http\Requests\StoreBlogPost;
use Illuminate\Http\Request;
use DB;
use Gate;
use Storage;
class PostController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Post::class ,'post');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts=Post::with(['categories','user'])->paginate(2);
      // dd (Storage::disk('public')->delete($posts[0]->thumbnail));
        return view('dashboard.posts.index',compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories=Category::all();
        return view('dashboard.posts.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $filename=sprintf('thumbnail_%s.jpg',random_int(1,1000));
        if($request->hasFile('thumbnail'))
            $filename= $request->file('thumbnail')->storeAs('posts',$filename,'public');
        else
            $filename='posts/dummy.jpg';
        $post=[
                'title'=>$request->title,
                'content'=>$request->content,
                'user_id'=>1,
                'slug'=>$request->title,
                'thumbnail'=>$filename,
            ];
       
            $post=Post::create($post);
        if($post){
            $post->categories()->attach($request->categories);
           return redirect()->route('posts.index');
        }
    }
    public function withValidator($validator)
    {
        $validator->after(function ($validator) {
            if ($this->somethingElseIsInvalid()) {
                $validator->errors()->add('field', 'Something is wrong with this field!');
            }
        });
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       $post=Post::with(['categories','user'])->where('id',$id)->first();
  
       return view('dashboard.posts.show',compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       $post=Post::with(['categories','user'])->where('id',$id)->first();
    //     // $response=Gate::inspect('allow-edit',$post->user->id);
    //     $response=Gate::inspect('allow-edit',$post);
    //     if($response->denied()){
    //         return redirect()->back()->with('status',$response->message());
    //     }
    //    Gate::authorize('allow-edit',$post->user->id);
       $categories=Category::all();
       return view('dashboard.posts.edit',compact('post','categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $post=Post::find($id);
        $post->title=$request->title;
        $post->slug=$request->slug;
        $filename=sprintf('thumbnail_%s.jpg',random_int(1,1000));
        if($request->hasFile('thumbnail'))
            $filename= $request->file('thumbnail')->storeAs('posts',$filename,'public');
        else
            $filename=$post->thumbnail;
        $post->thumbnail=$filename;
        if($post->save()){
            $post->categories()->sync($request->categories);
            return redirect()->route('posts.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post=Post::find($id);
        $post->categories()->detach();
        $post->delete();
        return redirect()->route('posts.index');
    }
}
