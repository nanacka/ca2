

@extends('layouts.app')

    @section('content')

        <h2 class="text-center">All posts</h2>

        <ul class="list-group py-3 mb-3">
            @forelse($posts as $post)
                <li class="list-group-item my-2">

                    <h5>{{ $post->title }}</h5>
                    <p>{{ Str::limit($post->Description,10) }}</p>
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

