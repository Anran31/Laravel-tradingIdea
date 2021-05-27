@extends('layouts.app')

@section('content')
    <div class="flex justify-center">
        <div class="w-3/4 flex-col text-white bg-secondary p-6 rounded-lg">
            <div class="flex text-3xl mb-5 justify-between">
                <div class="flex">
                    <p>{{ $idea->title }}</p>
                </div>
                <div class="flex">
                    <a href="{{ url()->previous() }}">X</a>
                </div>
            </div>
            <div class="flex">
                <img  class="object-contain" src={{ url('storage/' . substr($idea->image, 7)) }} alt="">
            </div>
            <div class="flex mt-3 mb-3 text-2xl">
                <p>{{ $idea->description }}</p>
            </div>
            <div class="flex flex-row justify-between">
                <div class="flex flex-col">
                    <div class="flex">
                        <p class="text-l mb-2">{{ $idea->user->username }}</p>
                    </div>
                    <div class="flex">
                        <p class="text-l mb-2">{{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $idea->created_at) }}</p> 
                    </div>
                </div>

                @if ($idea->ownedBy(auth()->user()))
                    <div class="flex">
                        <form action="{{ route('idea.destroy',$idea) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-500 text-white px-6 py-2 rounded
                            font-medium">Delete</button>
                        </form>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection