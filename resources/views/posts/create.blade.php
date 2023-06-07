@extends('layouts.app')
@section('title', 'create')
@section('content')
<div class="flex justify-center items-center mt-36">
    <form  action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data" class="w-1/2 p-8 bg-gray-100 rounded-lg">
        @csrf
        <h2 class="text-2xl mb-4">Créer un nouveau poste</h2>

        <div class="mb-4">
            <label for="small-input" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">title</label>
            <input type="text" value="{{ old('title') }}"  name="title" id="small-input" class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 sm:text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            @error('title')
                <span class="text-red-400 font-bold">{{$message}}</span>
            @enderror
            <label for="small-input" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">description</label>
            <input type="text" value="{{ old('Description') }}"  name="Description" id="small-input" class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 sm:text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            @error('description')
                <span class="text-red-400 font-bold">{{$message}}</span>
            @enderror
            <label for="small-input"  class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Cover</label>
            <input type="file" value="{{ old('cover') }}" name="cover" id="small-input" class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 sm:text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            @error('cover')
            <span class="text-red-400 font-bold">{{$message}}</span>
            @enderror

            <label for="categories" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Selectioner la categorie </label>
            <select id="categories" name="category_id" value="{{ old('category_id') }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                <option value="selct your category"></option>
              @foreach ($categories as $category)
              <option value="{{ $category->id }}">{{ $category->name }}</option>
              @endforeach
             
            </select>
             @error('category_id')
                <span class="text-red-400 font-bold">{{$message}}</span>
            @enderror
            

            {{-- @error('name')
                <span class="text-red-400 font-bold">{{$message}}</span>
            @enderror --}}
        </div>
        <button type="submit" class="text-white bg-black focus:ring-4 focus:outline-none focus:ring-cyan-300 dark:focus:ring-cyan-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Enregistrer</button>
    </form>
</div>
@endsection