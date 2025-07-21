<x-layout>

      <div class="px-5 py-8 relative min-h-full">
        <h2 class="text-[22px] font-semibold">
        {{ urldecode(request()->segment(1)) }}
        </h2>

        <div class="mt-8 grid grid-cols-4 gap-x-6 gap-y-6">

          @foreach($notes as $note)

            <div class="bg-white/3 p-5 flex flex-col gap-2.5 cursor-pointer hover:bg-white/5 noteItem">
              <p class="text-white font-semibold text-[18px]">{{ Str::limit($note->title, '22', '...') }}</p>

              <div class="flex items-center gap-2.5">
                <p>{{ $note->created_at->format('Y-m-d') }}</p>
                <p>
                  {!! Str::limit($note->context, '15', '...')  !!}
                </p>
              </div>

              <input type="hidden" data-note_item_id="{{ $note->id }}" data-note_item_folder_id={{ $note->folder_id }} data-note_content="{{ $note->context }}" data-note_title="{{ $note->title }}" data-note_created_at="{{ $note->created_at }}" data-current_folder="{{ urldecode(request()->segment(1)) }}">
            </div>

          @endforeach

        </div>
      </div>

</x-layout>
