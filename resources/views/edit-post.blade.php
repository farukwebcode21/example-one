
<x-app-layout>
<x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Edit Post Here
        </h2>
    </x-slot>
    <div class="container mx-auto">
        <div class="bg-white p-6 my-6">
            <form action="{{route('update-post',$post->id)}}" method="post">
                @csrf 
                <p class="mb-4">
                    <input class="w-1/5" type="text" value="{{$post->title}}" name="title">
                </p>
                <div class="mb-4">
                    <textarea name="content" cols="30" rows="5">{{$post->content}}</textarea>
                </div>
                <button class="border border-fuchsia-700 py-3 px-4" type="submit">Update Data</button>

            </form>
        </div>
    </div>
</x-app-layout>