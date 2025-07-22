<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title ?? 'NoteTracker - create notes and save them, simply as that' }} </title>
    @vite('resources/css/quil_rich.css')
    @vite('resources/js/quil_rich.js')
    @vite('resources/css/app.css')
    @vite('resources/js/app.js')
</head>
<body>

    <div class="min-h-screen flex lg:flex-row flex-col  bg-[#181818] text-white">

        <div class="flex flex-2 flex-col justify-between px-5 py-8">

            <div>
                <div class="flex items-center justify-between">
                    <p>{{ $user->name ?? 'Guest' }}</p>
                </div>

                <div class="flex items-center justify-center text-white rounded-md bg-white/5 w-full py-2.5 mt-8 cursor-pointer hover:bg-white/10 {{ urldecode(request()->path()) == "/" ? 'hidden' : '' }}" id="new_note_item" id="note_create">
                    <div class="flex items-center gap-2">
                        <img src="{{ Vite::asset('resources/images/icons/plus_icon.png') }}" alt="plus_icons">
                        <p class="font-semibold">New Note</p>
                    </div>
                </div>

                <div>

                    <div class="flex items-center justify-between mt-8">
                        <p class="text-white/60">Folders</p>
                        <div class="cursor-pointer" id="create_folder_item">
                            <img src="{{ Vite::asset('resources/images/icons/folder_create.png') }}" alt="create_folder_logo">
                        </div>
                    </div>

                    <div class="flex flex-col gap-1.5 mt-2">

                        @foreach($folders as $folder)
                        <a href="{{  route('folder', ['folderName' => $folder->name]) }}">
                            <div class="mt-2 flex items-center gap-[15px] py-2 px-2 bg-transparent cursor-pointer hover:bg-white/3 {{ urldecode(request()->segment(1)) == $folder->name ? 'bg-white/3' : ''  }}">
                                <img src="{{ urldecode(request()->segment(1)) == $folder->name ? Vite::asset('resources/images/icons/open_folder.png') : Vite::asset('resources/images/icons/closed_folder_icon.png') }}" alt="folder_icon">
                                <p class="font-semibold text-white/60">{{ $folder->name }}</p>
                            </div>
                        </a>
                        @endforeach
                    </div>

                </div>

                <div class="mt-10">

                    <div>
                        <p class="text-white/60">More</p>
                    </div>

                    <div class="mt-2 flex flex-col gap-[5px]">
                        <a href="/favourites">
                            <div class="flex items-center gap-[15px] cursor-pointer hover:bg-white/8 px-1 py-2.5 rounded-md">
                                <img src="{{ Vite::asset('resources/images/icons/star_icon.png') }}" alt="star_icon">
                                <p class="text-white/60 font-semibold">Favorites</p>
                            </div>
                        </a>

                        <a href="/trash">
                            <div class="flex items-center gap-[15px] cursor-pointer hover:bg-white/8 px-1 py-2.5 rounded-md">
                                <img src="{{ Vite::asset('resources/images/icons/trash_icon.png') }}" alt="star_icon">
                                <p class="text-white/60 font-semibold">Trash</p>
                            </div>
                        </a>

                        <a href="archive">
                            <div class="flex items-center gap-[15px] cursor-pointer hover:bg-white/8 px-1 py-2.5 rounded-md">
                                <img src="{{ Vite::asset('resources/images/icons/archive_icon.png') }}" alt="star_icon">
                                <p class="text-white/60 font-semibold">Archived Notes</p>
                            </div>
                        </a>

                    </div>

                </div>
            </div>

            <form action="{{ route('logout') }}" method="POST">
                @csrf

                <button type="submit" class="font-bold flex items-center justify-center text-white rounded-md bg-white/5 w-full py-2.5 mt-8 cursor-pointer hover:bg-white/6">Logout</button>
            </form>


        </div>

        <div class="flex-10 bg-[#1C1C1C]">

            {{  $slot }}

            <div id="new_folder_modal" class=" text-white font-semibold absolute w-full h-full top-0 left-0 flex justify-center items-center hidden">
                <div class="absolute bg-black/70 w-full h-full" id="black_background_for_folder_create_modal"></div>
                <form action="{{ route('folder_create')  }}" method="POST" class="z-[2000] bg-[#3C362A] p-4 rounded-lg w-full m-4 md:w-[400px]">
                    @csrf
                    <div class="flex items-start gap-4 md:flex-row flex-col">
                        <label for="create_folder_name" class="font-bold">Folder name</label>
                        <input type="text" id="create_folder_name_input" class="border md:w-auto w-full rounded-md border-gray-500 px-2" name="folder_name">
                    </div>

                    @error('folder_name')
                        <p class="mt-4">{{ $message }}</p>
                    @enderror

                    <div class="flex gap-4 mt-6">
                        <button class="px-2 border rounded-lg font-semibold cursor-pointer bg-[#663F46] border-[#8b5c42]" type="submit" id="folder_create_button">Create</button>
                        <div id="folder_create_cancel_button" class="px-2 border rounded-lg font-semibold cursor-pointer bg-[#663F46] border-[#8b5c42]">Cancel</div>
                    </div>

                </form>

            </div>

            <div id="new_note_modal" class=" text-white font-semibold absolute w-full h-full top-0 left-0 flex justify-center items-center hidden">
                <div class="absolute bg-black/70 w-full h-full" id="note_modal_background"></div>
                <form action="{{ route('note_create', ['folderName' => urldecode(request()->path())])  }}" method="POST" class="z-[2000] bg-[#3C362A] p-4 rounded-lg md:w-auto w-full m-4">
                    @csrf
                    <div class="flex items-start justify-between gap-4 mb-6">
                        <label for="create_folder_name" class="font-bold">Note title</label>
                        <input type="text" id="create_folder_name_input" class="border rounded-md border-gray-500 px-2" name="note_name">
                    </div>

                    <div id="note_editor" style="width: 100% !important; height: 300px !important; overflow: auto !important">
                    </div>

                    <input type="hidden" name="note_content" id="hidden_note_editor_content">

                    @error('note_name')
                        <p class="mt-4">{{ $message }}</p>
                    @enderror

                     @error('note_content')
                        <p class="mt-4">{{ $message }}</p>
                    @enderror

                    <div class="flex gap-4 mt-6">
                        <button class="px-2 border rounded-lg font-semibold cursor-pointer bg-[#663F46] border-[#8b5c42]" type="submit" id="note_create_button">Create</button>
                        <div id="note_create_cancel_button" class="px-2 border rounded-lg font-semibold cursor-pointer bg-[#663F46] border-[#8b5c42]">Cancel</div>
                    </div>

                </form>

            </div>

        </div>

    </div>

    <script>
        window.shouldOpenModal = {{ $errors->has('folder_name') ? 'true' : 'false'  }};
        window.shouldOpenNoteModal = {{ ($errors->has('note_name') || $errors->has('note_content')) ? 'true' : 'false'  }};
    </script>

</body>
</html>
