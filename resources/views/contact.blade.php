@extends('layouts.app')

@section('title', __('Kontak'))

@section('content')

<div class="bg-[#f2f2f2] pt-10 pb-8 min-h-[800px]">
    <!-- Act only according to that maxim whereby you can, at the same time, will that it should become a universal law. - Immanuel Kant -->

    <div class="bg-white shadow mx-auto rounded-4xl container">
        <div class="space-y-4 px-7 py-6">
            <img src="{{ asset('img/maps.jpg') }}" alt="" class="w-full">

            <div class="bg-cyan-mensana rounded-full w-full h-1.5"></div>

            <div class="pl-4">
                <h1 class="font-bold text-blue-mensana text-5xl">Kontak Kami</h1>

                <div class="lg:gap-x-10 grid grid-cols-12">
                    <div class="place-items-center grid grid-cols-2 col-span-7">
                        <div>
                            <img src="{{ asset('img/logo-simple-blue.png') }}" alt="" class="mx-auto">
                        </div>

                        <div class="flex flex-col space-y-5">

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

                        <div>
                            <img src="{{ asset('img/logo-sanbio.png') }}" alt="" class="mx-auto">
                        </div>

                        <div>
                            <h3 class="text-blue-mensana text-3xl">Kami distributor tunggal PT Sanbio Laboratories</h3>
                        </div>


                    </div>
                    <div class="col-span-5">
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
