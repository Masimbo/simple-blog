<form action="{{route('post.update',$post->id)}}" method="post">

@csrf
@method('PUT')
  <label for="fname">Title</label>
  <input type="text" id="fname" name="title" value={{$post->title}}><br><br>
  <label for="lname">body:</label>
  <input type="text" id="lname" name="body" value={{$post->body}}><br><br>
  <input type="submit" value="Submit">
</form>