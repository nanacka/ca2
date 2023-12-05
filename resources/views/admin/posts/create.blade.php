<x-app-layout>
    @section('header')
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Create post') }}
        </h2>
    @endsection

    <x-slot name="slot">
        <h3 class="text-center">Create post</h3>
        <form action="{{ route('posts.store') }}" method="post">
    
            @csrf
            {{-- ^^ generates a hidden input named csrf_token for security, needed to submit form--}}
            <div class="form-group">
                <label for="title">post Title</label>
                <input type="text" name="title" id="title" class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }}" value="{{ old('title') }}" placeholder="Enter Title">
                @if($errors->has('title'))
                    <span class="invalid-feedback">
                        {{ $errors->first('title') }}
                    </span>
                @endif
            </div>
            <div class="form-group">
                <label for="description">post Description</label>
                <textarea name="description" id="description" rows="4" class="form-control {{ $errors->has('description') ? 'is-invalid' : '' }}" placeholder="Enter post Description">{{ old('description') }}</textarea>
    
                {{--error handling--}}
                
                @if($errors->has('description')) {{-- <-check if we have a validation error --}}
                    <span class="invalid-feedback">
                        {{ $errors->first('description') }} {{-- <- Display the First validation error --}}
                    </span>
                @endif
            </div>
            <button type="submit" class="btn btn-primary">Create</button>
        </form>
    </x-slot>

    
</x-app-layout>
