<html>
{{$post->title}}
{{$post->body}}


<form action="/comment/" method="post">
@csrf
  <label for="lname">Comment:</label>
  <input type="text" id="lname" name="body"><br><br>
  <input id="prodId" name="post_id" type="hidden" value={{$post->id}}>

  <input type="submit" value="Submit">
</form>

@foreach($post->comments as $comment)
    {{$comment->body}}
    {{$comment->user}}
    <br>
@endforeach

</html>