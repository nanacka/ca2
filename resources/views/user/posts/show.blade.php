<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Posts') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">

                        <img width="150" src={{ asset("storage/images/" . $post->post_image) }} alt="" />
                        <p><b>Title:</b> {{ $post->title }}</p>
                        <p><b>Description:</b> {{ $post->description }}</p> 

                        <h3><b>Comments</b></h3>

                        @forelse($post->comments as $comment)

                        <li class="list-group-item mx-5 my-5">
                            <h5 class="text-xl">{{ $comment->content }}</h5>
                            <h5 class="text-xl">{{ $comment->user->name }}</h5>
                        </li>

            
        
                        @empty
                            <h4 class="text-center">No Comments Found!</h4>
                        @endforelse 

                        {{-- @forelse($commenters as $commenter)

                        <li class="list-group-item mx-5 my-5">
                            <h5 class="text-xl">{{ $commenter->name }}</h5>
                        </li>

        
                        @empty
                            <h4 class="text-center">No Commenters Found!</h4>
                        @endforelse --}}


                        {{-- <p>{{$comment->content}}</p> --}}

                    </div>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>