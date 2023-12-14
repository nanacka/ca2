<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Posts') }}
        </h2>
    </x-slot>

    <x-slot name="slot">
        <ul class="list-group py-3 mb-3">

            @forelse($posts as $post)

                <li class="list-group-item mx-5 my-5">
                    <h5 class="text-xl">{{ $post->title }}</h5>
                    <p>{{ Str::limit($post->description,10) }}</p>
                    <small class="float-right">{{ $post->date_created }}</small>
                    <a href="{{route('user.posts.show',$post->id)}}" class="text-slate-500">Read More</a>
                </li>

            @empty
                <h4 class="text-center">No posts Found!</h4>
            @endforelse


            
        </ul>
        <div class="d-flex justify-content-center">
            {{ $posts->links() }}
        </div>
    </x-slot>

    
</x-app-layout>
