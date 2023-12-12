@extends('layouts.admin')

    @section('header')
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create Post ADMIN LAYOUT') }}
        </h2>
    @endsection

    @section('content')
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="my-6 p-6 bg-white border-b border-gray-200 shadow-sm sm:rounded-lg">
                <form enctype="multipart/form-data" action="{{ route('admin.posts.store') }}" method="post">
                    @csrf
                    <x-text-input
                        type="text"
                        name="title"
                        field="title"
                        placeholder="Title"
                        class="w-full"
                        autocomplete="off"
                        :value="@old('title')"></x-text-input>

                        @if($errors->has('title')) {{-- <-check if we have a validation error --}}
                            <span class="invalid-feedback">
                                {{ $errors->first('title') }} {{-- <- Display the First validation error --}}
                            </span>
                        @endif

                    <textarea
                        name="description"
                        rows="10"
                        field="description"
                        placeholder="Description..."
                        class="w-full mt-6"
                        :value="@old('description')"></textarea>
                        
                        @if($errors->has('description')) {{-- <-check if we have a validation error --}}
                            <span class="invalid-feedback">
                                {{ $errors->first('description') }} {{-- <- Display the First validation error --}}
                            </span>
                        @endif

                        <div class="form-group">
                            <label for="tags"> <strong> Tags</strong> <br> </label>
                                @foreach($tags as $tag)
                                    <input id="{{$tag->id}}" type="checkbox" value="{{$tag->id}}" name="tags[]">
                                    <label for="{{$tag->id}}">{{$tag->name}}</label>
                                    <br>
                                @endforeach
    
                        </div>
    
                        @if($errors->has('tags')) {{-- <-check if we have a validation error --}}
                            <span class="invalid-feedback">
                                {{ $errors->first('tags') }} {{-- <- Display the First validation error --}}
                            </span>
                        @endif
{{-- 
                    <input
                        type="file"
                        name="post_image"
                        placeholder="Post image"
                        class="w-full mt-6"
                        field="post_image"
                    /> --}}


                    <x-primary-button class="mt-6">Save Post</x-primary-button>
                </form>
            </div>
        </div>
    </div>
    @endsection