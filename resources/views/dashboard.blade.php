<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <!-- {{ __("You're logged in!") }} -->
                   <div class="flex">
                        <div class="flex-1 pr-5">
                        <h2 class="font-semibold text-lg mb-6">Add New Post</h2>
                        <form action="{{route('add-post')}}" method="POST">
                            @csrf
                            <p class="mb-4">
                                <input class="w-full px-4 py-2 border border-gray-500" name="title" type="text" placeholder="Post title here">
                                @error('title')
                                <span class="text-red-500 text-sm">
                                    {{$message}}
                                </span>
                                @enderror
                            </p>
                            <p><textarea name="content" cols="60" rows="10" placeholder="Description here"></textarea></p>
                            <button class="w-full bg-rose-600 p-3 text-white text-xl" type="submit">Add Post</button>
                         </form>
                    </div>
                        <div class="flex-1">
                            <h2 class="text-lg font-semibold caret-violet-600">Post Show Here</h2>
                            <ul>
                                @foreach($posts as $post)
                                <div class="my-3 py-2 px-2 border border-solid border-emerald-600">
                                <li class="flex place-items-stretch">
                                    <a class="mr-6" href="#">{{$post->title}}</a>
                                    <span>
                                        <a class="bg-green-500 px-6 py-1 text-white rounded " href="{{route('edit-post', $post->id)}}">Edit</a>
                                    </span>
                                </li>
                                </div>
                                @endforeach
                            </ul>
                        </div>
                   </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
