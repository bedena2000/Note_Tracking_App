<x-layout>
  <div class="px-5 py-8 relative min-h-full">
    <h2 class="text-[22px] font-semibold">
      {{ urldecode(request()->segment(1)) }}
    </h2>
  
    <div class="mt-8 grid grid-cols-4 gap-x-6 gap-y-6">

      @foreach($notes as $note)
      
        <div class="bg-white/3 p-5 flex flex-col gap-2.5 cursor-pointer hover:bg-white/5" id="note_item">
          <p class="text-white font-semibold text-[18px]">{{ Str::limit($note->title, '22', '...') }}</p>

          <div class="flex items-center gap-2.5">
            <p>{{ $note->created_at->format('Y-m-d') }}</p>
            <p>
              {{ Str::limit($note->context, '15', '...')  }}
            </p>
          </div>
        </div>

      @endforeach
  
    </div>

    {{-- Editor Modal --}}
    <div class="hidden w-[790px] flex flex-col text-white absolute right-0 top-0 bg-[#181818] h-full z-[1000] p-8" id="note_editor_modal">

      <div class="flex items-center justify-between">
        <h3 class="text-2xl">Reflection on the Month of June</h3>
        <div class="relative">
          <div class="w-[40px] h-[40px] cursor-pointer relative" id="editor_menu_button">
            <img class="w-full h-full object-fill" src="{{ Vite::asset('resources/images/icons/note_modal_icon.png') }}" alt="Editor_note_modal_icon">
  
          </div>
          {{-- Modal --}}
          <div class="text-white bg-[#333333] p-5 rounded-lg absolute right-8 w-[300px] translate-y-2 z-2000 hidden" id="editor_modal_menu">
            <div class="pb-2 border-b border-white/20">
              <div class="flex items-center gap-[18px] cursor-pointer bg-transparent hover:bg-white/7 p-2 rounded-sm">
                <img src="{{ Vite::asset('resources/images/icons/star_icon.png') }}" alt="archived_icon">
                <p class="">Add to favorites</p>
              </div>

              <div class="flex items-center gap-[18px] cursor-pointer bg-transparent hover:bg-white/7 p-2 rounded-sm">
                <img src="{{ Vite::asset('resources/images/icons/archive_icon.png') }}" alt="archived_icon">
                <p class="">Archived</p>
              </div>
            </div>

            <div class="flex items-center gap-[18px] cursor-pointer bg-transparent hover:bg-white/7 p-2 rounded-sm mt-4">
              <img src="{{ Vite::asset('resources/images/icons/trash_icon.png') }}" alt="archived_icon">
              <p class="">Delete</p>
            </div>
          </div>
        </div>

        
      </div>

      <div class="mt-6 mb-6">
        <div class="border-b border-white/20 pb-4">
          <div class="w-[260px] flex items-center justify-between gap-[40px]">
            <div class="flex items-center gap-[12px] ">
              <div class="w-[20px] h-[20px]"><img class="w-full h-full object-fill" src="{{ Vite::asset('resources/images/icons/date_icon.png') }}" alt="date_icon"></div>
              <p class="text-white/30 font-semibold">Date</p>
            </div>
            <p class="text-white font-semibold">21/06/2022</p>
          </div>
        </div>

        <div class="mt-4">
          <div class="w-[260px] flex items-center justify-between gap-[40px]">
            <div class="flex items-center gap-[12px] ">
              <div class="w-[20px] h-[20px]"><img class="w-full h-full object-fill" src="{{ Vite::asset('resources/images/icons/closed_folder_icon.png') }}" alt="date_icon"></div>
              <p class="text-white/30 font-semibold">Folder</p>
            </div>
            <p class="text-white font-semibold">21/06/2022</p>
          </div>
        </div>
      </div>

      <form action="" class="relative h-full overflow-auto">
        <input type="hidden" name="_html_hidden_content" id="editor_hidden_content">
        <div id="editor" style="height: 100% !important; border: none; color: white !imporant" class="flex-1 overflow-auto placeholder-white">
        
        </div>

        
        <button class="absolute bottom-4 bg-gray-600 rounded-full px-6 py-2 cursor-pointer" type="submit">Save</button>
                
      </form>

      

    </div>


    
  </div>

</x-layout>