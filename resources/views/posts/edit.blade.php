

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Edit Post') }}
        </h2>
    </x-slot>

    <x-slot name="slot">
        <h3 class="text-center">Edit Post</h3>
        <form action="{{route('posts.update',$post->id)}}" method="post">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="title">Post Title</label>
                <input type="text" name="title" id="title" class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }}" value="{{ old('title') ? : $post->title }}" placeholder="Enter Title">
                @if($errors->has('title')) {{-- <-check if we have a validation error --}}
                    <span class="invalid-feedback">
                        {{$errors->first('title')}} {{-- <- Display the First validation error --}}
                    </span>
                @endif
            </div>
            <div class="form-group">
                <label for="description">Post Description</label>
                <textarea name="description" id="description" rows="4" class="form-control {{ $errors->has('description') ? 'is-invalid' : '' }}" placeholder="Enter Post Description">{{ old('description') ? : $post->description }}</textarea>
                @if($errors->has('description')) {{-- <-check if we have a validation error --}}
                    <span class="invalid-feedback">
                        {{$errors->first('description')}} {{-- <- Display the First validation error --}}
                    </span>
                @endif
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </x-slot>

    
</x-app-layout>

    