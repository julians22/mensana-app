
<form wire:submit="send">
    {{-- Nothing in the world is as soft and yielding as water. --}}
    <div class="flex flex-col gap-y-2">

        {{-- write session_flash 'request_form' if exist --}}
        @if (session()->has('request_form'))
            <div class="bg-green-400 mb-4 p-2 rounded text-white">
                {{ session('request_form') }}
            </div>
        @endif

        <div class="flex flex-col space-y-1">
            <label for="request_name" class="font-extrabold text-lg">@lang('Nama Lengkap')</label>
            <input name="request_name" wire:model="request_name" type="text" class="bg-white px-3 py-2 rounded-lg outline-0 text-black">
            <div>
                @error('request_name') <span class="bg-red-400 p-px rounded text-red-100 error">{{ $message }}</span> @enderror
            </div>
        </div>

        <div class="flex flex-col space-y-1">
            <label for="request_email" class="font-extrabold text-lg">@lang('Email')</label>
            <input name="request_email" wire:model="request_email" type="email" class="bg-white px-3 py-2 rounded-lg outline-0 text-black">
            <div>
                @error('request_email') <span class="bg-red-400 p-px rounded text-red-100 error">{{ $message }}</span> @enderror
            </div>
        </div>

        <div class="flex flex-col space-y-1">
            <label for="request_phone" class="font-extrabold text-lg">@lang('No. Telp')</label>
            <input name="request_phone" wire:model="request_phone" type="tel" class="bg-white px-3 py-2 rounded-lg outline-0 text-black">
            <div>
                @error('request_phone') <span class="bg-red-400 p-px rounded text-red-100 error">{{ $message }}</span> @enderror
            </div>
        </div>

        <!--Footer-->
        <div class="flex justify-end pt-2">
            <button type="submit" class="bg-orange-400 hover:bg-orange-500 mr-2 p-3 px-4 rounded-lg text-white">@lang('Kirim')</button>
        </div>

    </div>
</form>
