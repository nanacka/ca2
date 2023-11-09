

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Post') }}
        </h2>
    </x-slot>

    <x-slot name="slot">
        <h3 class="text-2xl m-5">{{$post->title}}</h3>
        <p class="m-5">{{$post->description}}</p>
        <br>
        <a href="{{route('posts.edit',$post->id)}}" class="btn btn-primary float-left m-10">Update</a>
        <a href="#" class="btn btn-danger float-right" data-toggle="modal" data-target="#delete-modal">Delete</a>
        <div class="clearfix"></div>
        <div class="modal fade" id="delete-modal">
            <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Delete post</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Are you sure?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" onclick="document.querySelector('#delete-form').submit()">Proceed</button>
                    <button type="button" class="btn btn-primary" data-dismiss="modal">Cancel</button>
                </div>
            </div>
            </div>
        </div>
        
        <form method="POST" id="delete-form" action="{{route('posts.destroy',$post->id)}}">
            @csrf
            @method('DELETE')
            
        </form>
    
    </x-slot>

    
</x-app-layout>

