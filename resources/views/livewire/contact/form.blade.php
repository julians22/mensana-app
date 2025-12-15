<div class="bg-blue-mensana/40 p-4 lg:p-8 rounded-2xl w-full lg:max-w-lg">

    @error('recaptcha')
        <div class="bg-red-300 p-3 rounded text-red-700">{{ $message }}</div>
    @enderror

    <form
        class="space-y-6"
        x-data="{
            siteKey: @js(config('captcha.captcha_sitekey')),
            init() {
                // load our recaptcha.
                if (!window.recaptcha) {
                    const script = document.createElement('script');
                    script.src = 'https://www.google.com/recaptcha/api.js?render=' + this.siteKey;
                    document.body.append(script);
                }
            },
            doCaptcha() {
                grecaptcha.execute(this.siteKey, {action: 'submit'}).then(token => {
                    Livewire.dispatch('formSubmitted', {token: token});
                });
            },
        }"
        x-on:submit.prevent="doCaptcha"
        >

        <div>
            <label for="nama" class="block mb-2 font-semibold text-blue-mensana">@lang("Nama")</label>
            <input type="text" id="nama" wire:model="name"
                class="bg-white shadow-sm p-3 border-0 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-mensana w-full"
                >
            @error('name') <label class="mt-1 text-red-500 text-sm">{{ $message }}</label> @enderror
        </div>

        <div>
            <label for="email" class="block mb-2 font-semibold text-blue-mensana">Email</label>
            <input type="email" id="email" wire:model="email"
                class="bg-white shadow-sm p-3 border-0 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-mensana w-full"
                >
                @error('email') <label class="mt-1 text-red-500 text-sm">{{ $message }}</label> @enderror
            </div>

            <div>
                <label for="telp" class="block mb-2 font-semibold text-blue-mensana">@lang("No. Telp")</label>
                <input type="tel" id="telp" wire:model="phone"
                class="bg-white shadow-sm p-3 border-0 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-mensana w-full">
                @error('phone') <label class="mt-1 text-red-500 text-sm">{{ $message }}</label> @enderror
            </div>

            <div>
                <label for="pesan" class="block mb-2 font-semibold text-blue-mensana">@lang("Pesan Anda")</label>
                <textarea id="pesan" wire:model="message" rows="5"
                class="bg-white shadow-sm p-3 border-0 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-mensana w-full resize-none"
                ></textarea>
                @error('message') <label class="mt-1 text-red-500 text-sm">{{ $message }}</label> @enderror
        </div>

        <div class="flex justify-end pt-2">
            <button type="submit"
                class="bg-orange-400 hover:bg-orange-500 focus:ring-opacity-50 shadow-md px-8 py-3 rounded-lg focus:outline-none focus:ring-2 focus:ring-orange-500 font-bold text-white transition-colors duration-300 cursor-pointer">
                @lang("Kirim")
            </button>
        </div>
    </form>
</div>
