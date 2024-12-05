<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('My Projects') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-10">

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $errors)
                                <li class="py-5 bg-red-500 text-white font-bold">{{ $errors }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                
                <form action="{{route('admin.projects.update', $project)}}" enctype="multipart/form-data" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="flex flex-col gap-5">
                        <h1 class="text-3xl text-indigo-950 font-bold">
                            Add New Project
                        </h1>

                        <div class="flex flex-col gap-2">
                            <h3>Name</h3>
                            <input type="text" id="name" name="name" value="{{$project->name}}">
                        </div>
                        <div class="flex flex-col gap-2">
                            <h3>Category</h3>
                            <select name="category" id="category">
                                <option selected value="{{$project->category}}">{{$project->category}}</option>
                                <option value="Website Development">Website Development</option>
                                <option value="App Development">App Development</option>
                                <option value="UI/UX Design">UI/UX Design</option>
                            </select>
                        </div>
                        <div class="flex flex-col gap-2">
                            <h3>Cover</h3>
                            <img src="{{Storage::url($project->cover)}}" alt="" class="object-cover w-[120px] h-[90px] rounded-2xl">
                            <input type="file" id="cover" name="cover">
                        </div>
                        <div class="flex flex-col gap-2">
                            <h3>About</h3>
                            <textarea name="about" id="about">{{$project->about}}</textarea>
                        </div>
                        <button type="submit" class="py-4 w-full rounded-full bg-violet-700 font-bold text-white">Update Project</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>