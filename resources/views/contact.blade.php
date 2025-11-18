@extends('layouts.app')

@section('title', $site_title)
@section('meta_description', $meta_description)
@section('meta_keyword', $meta_keywords)
@section('meta_og_img', storageAsset($meta_og_img))

@section('content')

<div class="bg-[#f2f2f2] pt-10 pb-8 min-h-[800px]">
    <!-- Act only according to that maxim whereby you can, at the same time, will that it should become a universal law. - Immanuel Kant -->

    <div class="bg-white shadow mx-auto rounded-4xl container">
        <div class="space-y-4 px-4 lg:px-0 py-6 lg:py3">
            <img src="{{ asset('img/maps.jpg') }}" alt="" class="w-full">

            <div class="bg-cyan-mensana rounded-full w-full h-1.5"></div>

            <div class="lg:pl-4">
                <h1 class="mb-3 lg:mb-0 font-bold text-blue-mensana text-3xl lg:text-5xl">@lang('Hubungi Kami')</h1>

                <div class="gap-y-4 lg:gap-x-10 lg:gap-y-0 grid grid-cols-12">
                    <div class="lg:place-items-center gap-y-4 lg:gap-y-0 order-2 lg:order-1 grid grid-cols-1 lg:grid-cols-2 col-span-12 lg:col-span-7">
                        <div class="order-3 lg:order-1">
                            <img src="{{ asset('img/logo-simple-blue.png') }}" alt="" class="lg:mx-auto max-w-[120px] lg:max-w-none">
                        </div>

                        <div class="flex flex-col space-y-5 order-4 lg:order-2">

                            <h2 class="text-blue-mensana text-3xl">PT Mensana Aneka Satwa</h2>

                            <p class="text-blue-mensana text-xl">
                                Mensana Tower Cibubur Lt.18,
                                JI. Raya Kranggan No.69, RT.002/RW.016,
                                Kel. Jatisampurna, Kec. Jatisampurna
                                Bekasi, Jawa Barat, Indonesia, 17433
                            </p>

                            <ul class="text-blue-mensana text-xl">
                                <li>
                                    <a href="mailto:sales@ptmensana.com">
                                        <span><x-eos-email class="inline-block size-5"/> sales@ptmensana.com</span>
                                    </a>
                                </li>
                                <li><a href="tel:+62 213 970 1500"><span><x-eos-phone class="inline-block size-5"/>+62 213 970 1500</span></a></li>
                                <li><a href="tel:+62 813 8039 9399"><span><x-eos-phone class="inline-block size-5"/>+62 813 8039 9399</span></a></li>
                            </ul>

                            <h3 class="text-blue-mensana text-3xl">Sosial media kami</h3>
                            <div class="flex space-x-4">
                                <a href="">
                                    <x-bi-instagram class="fill-blue-mensana size-9"/>
                                </a>
                                <a href="">
                                    <x-elusive-facebook class="fill-blue-mensana size-9"/>
                                </a>
                            </div>
                        </div>

                        <div class="order-2 lg:order-3">
                            <img src="{{ asset('img/logo-sanbio.png') }}" alt="" class="lg:mx-auto max-w-[120px] lg:max-w-none">
                        </div>

                        <div class="order-1 lg:order-4">
                            <h3 class="text-blue-mensana text-3xl">Kami distributor tunggal PT Sanbio Laboratories</h3>
                        </div>


                    </div>
                    <div class="order-1 lg:order-2 col-span-12 lg:col-span-5">
                        @livewire('contact.form')
                    </div>
                </div>

            </div>

        </div>
    </div>

</div>

@endsection


@push('after-scripts')
    <script>
        Livewire.on('contact-submited', () => {
            alert('Your message has been sent.')
        });
    </script>
@endpush
