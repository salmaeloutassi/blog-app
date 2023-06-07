@extends('layouts.app')
@section('title', 'posts')


@section('content')
<div class="py-12 w-[90%]  mx-36">
    <div class="  sm:px-6 lg:px-8">
        <div class="flex  flex-wrap space-x-4 ml-24 justify-center ">
            @foreach ($posts as $post)
                <div class="my-5 w-[350px] bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                    <img class="h-52 rounded-t-lg w-full" src="{{ asset($post->cover) }}" alt="" />
                    <div class="p-5">
                        <a href="#">
                            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{ $post->title }}</h5>
                        </a>
                        <p class="mb-2 text-xl tracking-tight text-blue-900 dark:text-white">Nombre de vues : {{ $post->views }}</p>
                        <h6 class="mb-2 text-2xl tracking-tight text-gray-900 dark:text-white">{{ $post->category->name }}</h6>
                        <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">{{ \Str::limit($post->Description, 100) }}</p>
                        <a href="{{ route('posts.show', ['post' => $post->id]) }}" class="text-primary-400 text-sm">voir plus</a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>

@endsection