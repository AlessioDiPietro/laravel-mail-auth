@extends('layouts.app');
@section('titolo', 'homepage|ADMIN')
    
@section('content')
    <div class="crea_btn text-center">
        <a href="{{route('admin.posts.create')}}" class="btn btn-primary my-5">crea nuovo</a>
    </div>
    <div class="list-group ">

        @foreach ($posts as $post)
        
        <a href="{{route('admin.posts.show', $post->id)}}" class="list-group-item list-group-item-action d-flex justify-content-between text-center">{{$post->title}}
        </a>
        <div class="btn_box d-flex justify-content-start align-items-center">
            <a href="{{route('admin.posts.edit', $post->id)}}" class="btn btn-warning">edit</a>
            <form action="{{route('admin.posts.destroy', $post->id)}}"  method="post" class="d-flex mt-3 delete_form">
                @csrf
                @method('DELETE')
                <input type="submit" value='delete' class="btn btn-danger">
            </form>
        </div>


        @endforeach


    </div>
@endsection