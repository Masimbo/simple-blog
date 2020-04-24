<html>
@foreach ($posts as $post)
    {{$post->id}}
    <br>
    <a href="{{route('post.show',$post->id)}}">{{$post->title}}</a>
    @if(Auth::check())
    <a href="{{route('post.edit',$post->id)}}">Edit this post</a>
    @endif
    <br>
    {{$post->body}}
    <br>
@endforeach

<a href="{{route('register')}}">register</a>
<a href="{{route('login')}}">Login</a>
<a href="{{route('post.create')}}">Create A Post</a>



</html