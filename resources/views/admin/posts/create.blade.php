@extends('layouts.app')
@section('titolo', 'crea un nuovo post')


@section('content')
<div class="container">
  <form action='{{route('admin.posts.store')}}'method="post" enctype="multipart/form-data">
    @csrf
    <div class="mb-3">
      <label for="titolo" class="form-label">Titolo</label>
      <input type="text" class="form-control mb-4" id="titolo" aria-describedby="titolo" name="title">
      <label for="img form-label ">Scegli un immagine</label>
      <input type="file" name="image" id="img" class="d-block mb-4">
          <label for="descrizione" class="form-label">Articolo</label>
          <textarea name="article" id="descrizione" cols="30" rows="10" class="form-control mb-4"></textarea>
          <label for="cat" class="form-label">Categoria</label>
          <select name="category_id" id="cat" class="form-control mb-4">
            <option value="">Seleziona una categoria</option>
            @foreach ($categories as $category)
              <option value="{{$category->id}}"
                @if ($category->id == old('category_id')) selected
                @endif
                >{{$category->name}}</option>
            @endforeach
          </select>
          <label for="">Lettura:</label>
          @foreach ($tags as $tag)
              <input type="checkbox" name="tags[]" id="tag{{$loop->iteration}}"value="{{$tag->id}}"
              @if(in_array($tag->id, old('tags', []))) checked
              @endif
              >
              <label for="tag{{$loop->iteration}}">{{$tag->name}}</label>
          @endforeach
          
          
        </div>
        <button type="submit" class="btn btn-primary">crea</button>
    </form>
    @if ($errors->any())
        <div class="alert">
          @foreach ( $errors->all() as $er)
            <h2>! {{$er}}</h2>
          @endforeach
          <h2>Attenzione i campi non sono compilati</h2>
        </div>
    @endif
</div>
    
@endsection