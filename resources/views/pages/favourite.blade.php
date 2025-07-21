<x-layout>

      <div class="px-5 py-8 relative min-h-full">
        <h2 class="text-[22px] font-semibold">
        {{ urldecode(request()->segment(1)) }}
        </h2>

        <div class="mt-8 grid grid-cols-2 gap-x-6 gap-y-6">

          @foreach($notes as $note)

            <div class="bg-white/3 p-5 flex flex-col gap-2.5 hover:bg-white/5 w-[600px] h-[600px]">
              <div class="flex relative gap-2.5 flex-col">
                  <p class="text-white font-semibold text-[18px]">Title: {{ Str::limit($note->title, '22', '...') }}</p>
                  <p>Date: {{ $note->created_at->format('Y-m-d') }}</p>
              </div>


              <div class="overflow-auto">
                  {!! $note->context !!}
              </div>

              <input type="hidden" data-note_item_id="{{ $note->id }}" data-note_item_folder_id={{ $note->folder_id }} data-note_content="{{ $note->context }}" data-note_title="{{ $note->title }}" data-note_created_at="{{ $note->created_at }}" data-current_folder="{{ urldecode(request()->segment(1)) }}">
            </div>

          @endforeach

        </div>
      </div>

</x-layout>
