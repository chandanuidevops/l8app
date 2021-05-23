@component('mail::message')
# Welcome to our website
Thank you for registering with us, <br />
here is a list of our latest 5 posts<br />

@foreach ($posts as $post )
# <a href="{{route('posts.show',$post->slug)}}" >{{$post->title}}</a>   
@endforeach


@component('mail::button', ['url' => ''])
Button Text
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
