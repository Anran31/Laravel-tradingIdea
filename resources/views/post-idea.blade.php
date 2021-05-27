@extends('layouts.app')

@section('content')
    <div class="flex justify-center">
        <div class="w-3/4 bg-secondary p-6 rounded-lg text-black">
            <form action="{{ route('post-idea') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-4">
                    <p class="text-white text-2xl mb-2">Idea Title</p>
                    <label for="title" class="sr-only">Idea Title</label>
                    <input type="text" name="title" id="title" placeholder="A clear title for your idea" 
                    class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('title')
                    border-red-500 @enderror" value="{{ old('title') }}">

                    @error('title')
                        <div class="text-red-500 mt-2 text-sm">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="mb-4">
                    <p class="text-white text-2xl mb-2">Chart Image</p>
                    <label for="image" class="sr-only">Chart Image</label>
                    <input type="file" name="image" id="image"
                    class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('image')
                    border-red-500 @enderror">

                    @error('image')
                        <div class="text-red-500 mt-2 text-sm">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="mb-4">
                    <p class="text-white text-2xl mb-2">Description</p>
                    <label for="description" class="sr-only">Description</label>
                    <textarea name="description" id="description" cols="30" rows="8" placeholder="Please provide a meaningful and detailed description of your analysis and prediction."
                    class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('description') border-red-500 @enderror
                    placeholder="Post something!" wrap="hard""></textarea>
                    
                    @error('description')
                    <div class="text-red-500 mt-2 text-sm">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <div>
                    <button type="submit" class="bg-blue-500 text-white px-4 py-3 rounded
                    font-medium w-full">Publish</button>
                </div>
            </form>
        </div>
    </div>
@endsection