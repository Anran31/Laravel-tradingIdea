@extends('layouts.app')

@section('content')
    <div class="flex justify-center">
        <div class="w-3/4 flex-col bg-secondary p-6 rounded-lg">
            <div class="flex justify-between pb-1">
                <div>
                    <h1 class=" flex text-white text-5xl pl-24">Ideas</h1>
                </div>
                @auth
                    <div class="pr-24 pt-4">
                        <a href="{{ route('post-idea') }}" class="bg-blue-500 text-white px-2 py-1 rounded
                        font-small">New Idea</a>
                    </div>
                @endauth

                @guest
                    <div class="pr-24 pt-4">
                        <a href="{{ route('login') }}" class="bg-blue-500 text-white px-2 py-1 rounded
                        font-small">New Idea</a>
                    </div>
                @endguest
            </div>

            <div class="flex flex-col place-items-center">
                @if ($ideas->count())
                    @foreach ($ideas as $idea)
                        <div class="flex flex-row w-11/12 bg-ternary mt-4 rounded-lg">
                            <div class="flex flex-col w-9/12">
                                <div class="flex">
                                    <a href="{{ route('idea.show',$idea) }}" class="px-14 text-3xl mt-2">{{ $idea->title }}</a>
                                </div>

                                <div class="flex">
                                    <div class="flex flex-row">
                                        <div class="flex w-1/4">
                                            <p class="px-14 text-l mb-2">{{ $idea->user->username }}</p>
                                        </div>
                                        <div class="flex w-3/4">
                                            <p class="px-14 text-l mb-2">{{ $idea->created_at->diffForHumans() }}</p> 
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>    
                    @endforeach
                    <div class="mt-4 ">
                       <p class="text-white">{{ $ideas->links() }}</p> 
                    </div>  
                    @else
                        <p class="text-xl text-white mt-4">There is no idea currently</p>
                    @endif
                    
                </div>
        </div>
    </div>
@endsection