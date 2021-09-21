@extends('layouts.app')
@section('titolo', 'dettagli aggiuntivi')
    
@section('content')

    <div class="container">
        
        <h2><strong>{{$post->slug}}</strong></h2>
        @if ($post->cover)
            <img src="{{asset('storage/' . $post->cover )}}" alt="">
        @endif
        <hr>
        <p> {{$post->article}} </p>
        <hr>
        <h2>Categorie:</h2>
        @if ($post->category)
        <p><strong>{{$post->category->name}}</strong></p>
        @endif

        <div class="form-controll">
            <label for="">Lettura:</label>
            @forelse ($post->tags as $tag)
            <span class="badge">{{$tag->name}}</span>
                
            @empty
                <span> 0 Tags segnati.</span>
                
            @endforelse

        </div>
        <a href="{{route('admin.posts.index')}}" class="btn btn-primary">indietro</a>


    </div>
    
@endsection