<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>


@extends('layouts.app')

    @section('content')
        <h2 class="text-center">All posts</h2>
        <ul class="list-group py-3 mb-3">
            @forelse($posts as $post)
                <li class="list-group-item my-2">
                    <h5>{{ $post->title }}</h5>
                    <p>{{ Str::limit($post->desc,10) }}</p>
                    <small class="float-right">{{ $post->date_created->diffForHumans() }}</small>
                    <a href="{{route('posts.show',$post->id)}}">Read More</a>
                </li>
            @empty
                <h4 class="text-center">No posts Found!</h4>
            @endforelse
        </ul>
        <div class="d-flex justify-content-center">
            {{ $posts->links() }}
        </div>

    @endsection

</body>
</html>