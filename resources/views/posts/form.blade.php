<label for="title">Titulo<br>
    <input name="title" type="text" value="{{old('title',$post->title)}}"><br>
    @error('title')
    <small style="color:red">{{$message}}</small>
    @enderror
</label>
<br>
<label for="body">Contenido<br>
    <textarea name="body">{{old('body',$post->body)}}</textarea>
    <br>
    @error('body')
    <small style="color:red">{{$message}}</small>
    @enderror
</label><br>