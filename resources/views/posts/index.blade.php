@extends('layouts.app')
@section('content')
<div class="py-12 mx-48">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class=" overflow-hidden  p-6 text-gray-900">
            <h1 class="text-xl text-gray-700">liste des Posts</h1>
            <button
            type="button"
            class=" flex space-x-4 mt-6 border rounded-2xl bg-gray-50 px-14 pb-2 pt-2.5 text-xs font-medium uppercase leading-normal text-black transition duration-150 ease-in-out hover:bg-primary-accent-100 focus:bg-primary-accent-100 focus:outline-none focus:ring-0 active:bg-primary-accent-200">
            <a href="{{ route('posts.create') }}">add new Post</a>
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                <path fill-rule="evenodd" d="M12 2.25c-5.385 0-9.75 4.365-9.75 9.75s4.365 9.75 9.75 9.75 9.75-4.365 9.75-9.75S17.385 2.25 12 2.25zM12.75 9a.75.75 0 00-1.5 0v2.25H9a.75.75 0 000 1.5h2.25V15a.75.75 0 001.5 0v-2.25H15a.75.75 0 000-1.5h-2.25V9z" clip-rule="evenodd" />
            </svg>
              
              
            </button>
        </div>
        <div class="flex flex-col w-[1200px] ">
            <div class="  sm:-mx-6 lg:-mx-8">
              <div class="inline-block min-w-full py-2 sm:px-6 lg:px-8">
                <div class="overflow-hidden">
                  <table class="min-w-full w-full rounded-lg text-left text-sm font-light">
                    <thead
                      class="text-lg border-b bg-white font-medium dark:border-neutral-500 dark:bg-neutral-600">
                      <tr>
                        {{-- <th scope="col" class="px-6 py-4">#</th> --}}
                        <th scope="col" class="px-6 py-4">Titre de post </th>
                        <th scope="col" class="px-6 py-4">description</th>
                        <th scope="col" class="px-6 py-4">Cover</th>
                        <th scope="col" class="px-6 py-4">Categorie</th>
                        <th scope="col" class="px-6 py-4">created_at</th>
                        <th scope="col" class="px-6 py-4">updated_at</th>
                        <th scope="col" class="px-6 py-4">Actions</th>
                      </tr>
                    </thead>
                    <tbody>
                    @foreach ($posts as $post)
                      <tr
                        class="border-b bg-neutral-100 dark:border-neutral-500 dark:bg-neutral-700 text-base">
                        {{-- <td class="whitespace-nowrap px-6 py-4 font-medium">{{ $post->id }}</td> --}}
                        <td class="whitespace-nowrap px-6 py-4">{{ $post->title }}</td>
                        <td class="whitespace-nowrap px-6 py-4"> {{ \Str::limit($post->Description, 20)}}</td>
                        <td class="whitespace-nowrap px-6 py-4"><img class='w-36 h-24' src={{ asset($post->cover)}} alt=""></td>
                        <td class="whitespace-nowrap px-6 py-4">{{ $post->category->name }}</td>
                        <td class="whitespace-nowrap px-6 py-4">{{ $post->created_at->diffForHumans()}}</td>
                        <td class="whitespace-nowrap px-6 py-4">{{ $post->updated_at->diffForHumans()}}</td>
                        <td class="flex space-x-4  whitespace-nowrap text-base px-6 py-4">
                            <a class="font-medium text-primary-600" href="{{ route('posts.edit', $post->id) }}">edit</a>
                            <div x-data="{ showModal: false }">
                              <!-- Button to open the modal -->
                              <!-- Modal overlay -->
                              <form action="{{ route('posts.destroy', $post->id) }}" method="POST"
                                  class="d-inline">
                                  @csrf
                                  @method('DELETE')
                                  <a href="#" onclick="toggleModal('modal-id{{ $post->id }}')" class="font-medium text-red-600 ">Delet</a>
                                  <div class="hidden overflow-x-hidden overflow-y-auto fixed inset-0 z-50 outline-none focus:outline-none justify-center items-center"
                                      id="modal-id{{ $post->id }}">
                                      <div class="relative rounded-lg shadow-lg  w-[500px] bg-white my-6 mx-auto max-w-3xl">
                                          <!--content-->
                                          <div
                                              class="border-0  relative flex flex-col  outline-none focus:outline-none">
                                              <!--header-->
                                              <button
                                              class="p-1 ml-auto bg-transparent border-0 text-black opacity-5 float-right text-3xl leading-none font-semibold outline-none focus:outline-none"
                                              onclick="toggleModal('modal-id{{ $post->id }}')">
                                              <span
                                                  class="bg-transparent text-black opacity-5 h-6 w-6 text-2xl block outline-none focus:outline-none">
                                                  ×
                                              </span>
                                          </button>
                                              <div class="relative p-6 flex-auto">
                                                <svg aria-hidden="true" class="mx-auto mb-4 text-gray-400 w-14 h-14 dark:text-gray-200" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                                <h3 class="mb-5 text-lg text-center font-normal text-gray-500 dark:text-gray-400">Are you sure you want to delete this product?</h3>
                                              </div>
                                              <div
                                                  class="flex items-center justify-end p-6 border-t border-solid border-slate-200 rounded-b">
                                                  <button
                                                      class="text-gray-700 background-transparent border rounded-md font-bold uppercase px-6 py-2 text-sm outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150"
                                                      type="button"
                                                      onclick="toggleModal('modal-id{{ $post->id }}')">
                                                      no, close
                                                  </button>
                                                  <button
                                                      class="bg-red-500 text-white active:bg-red-600 font-bold uppercase text-sm px-6 py-3 rounded-md shadow hover:shadow-lg outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150"
                                                      type="submit"
                                                      onclick="toggleModal('modal-id{{ $post->id }}')">
                                                      Yes, I'm sure
                                                  </button>
                                              </div>
                                          </div>
                                      </div>
                                  </div>
                                  <div class="hidden opacity-25 fixed inset-0 z-40 bg-black" id="modal-id-backdrop">
                                  </div>
                                  <script type="text/javascript">
                                      function toggleModal(modalID) {
                                          document.getElementById(modalID).classList.toggle("hidden");
                                          document.getElementById(modalID + "-backdrop").classList.toggle("hidden");
                                          document.getElementById(modalID).classList.toggle("flex");
                                          document.getElementById(modalID + "-backdrop").classList.toggle("flex");
                                      }
                                  </script>
                        </td>
                      </tr>
                      @endforeach
                     
                     
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
    </div>
</div>
@endsection