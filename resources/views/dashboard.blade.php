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
                        <div class="flex-1">
                        <h2>Add New Post</h2>
                        <form action="{{route('add-post')}}" method="POST">
                        @csrf
                        <p style="margin-bottom: 10px;"><input style="width: 50%;" name="title" type="text" placeholder="Post Tiele"></p>
                        <p><textarea name="content" cols="30" rows="10"></textarea></p>
                        <button style="border: 1px solid red; padding:10px 25px;" type="submit">Add Post</button>
                         </form>
                    </div>
                        <div class="flex-1">
                            <h2 class="text-lg caret-violet-600">Post Show Here</h2>
                            <ul>
                                @foreach($posts as $post)
                                <div style="border: 1px solid red; padding:10px">
                                <li><a href="#">Title: {{$post->title}}</a></li>
                                <p>Content : {{$post->content}}</p>
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
