<x-layout>
    
    <div class="w-full h-full flex justify-center items-center">
        <div class="text-center flex justify-center flex-col gap-2.5 w-[460px]">
            <div class="w-[80px] h-[80px] m-auto">
                <img class="w-full h-full object-fill" src="{{ Vite::asset('resources/images/icons/select_note_icon.png')  }}" alt="note_icon">
            </div>
            <p class="text-white text-[28px] font-semibold">Select folder to view notes</p>
            <p class="text-white/60">
                Choose a note from the list on the left to view its contents, or create a new note to add to your collection.
            </p>
        </div>
    </div>

</x-layout>