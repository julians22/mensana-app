@extends('layouts.app')

@section('title', __('Layanan'))


@section('content')
<section class="relative">
    <!-- Very little is needed to make a happy life. - Marcus Aurelius -->
    <img src="{{ asset('img/layanan-hero_1.png') }}" alt="">

    <div class="absolute inset-0 flex items-center">
        <div class="grid grid-cols-5 mx-auto container">
            <div class="col-span-2 col-start-4 text-white">
                <h1 data-motion="fade-left" class="mb-4 font-bold text-6xl">Kami berikan yang terbaik untuk kebutuhan ternak Anda.</h1>

                <div class="text-2xl" data-motion="fade-down">
                    <p>Donec vulputate nibh at massa bibendum, et pulvinar massa ornare. Sed elementum augue eu auctor fringilla. Phasellus interdum diam magna, a semper odio accumsan non. Maecenas enim</p>
                </div>

            </div>
        </div>
    </div>
</section>
{{-- <div class="layanan-section-wrapper">
    <div class="flex flex-col gap-y-10 mx-auto container">

        <div class="relative">
            <div class="z-10 relative place-items-center gap-x-12 grid grid-cols-6">
                <div class="col-span-2 col-start-2 text-right">
                    <h2 class="mb-8 font-bold text-blue-mensana text-6xl">LABORATORIUM</h2>
                    <p class="text-lg">
                        Mauris tincidunt rutrum arcu, sit amet pretium
                        lectus mattis sed. Suspendisse ultricies eu
                        turpis in feugiat. Nam risus lacus, viverra eget
                        commodo nec, dapibus id libero. Aenean lorem
                        tortor, consequat in libero id, congue
                        ullamcorper ante. Nam risus lacus, viverra eget
                        commodo nec, dapibus id libero. Aenean lorem
                    </p>
                </div>
                <div class="col-span-2">
                    <div class="w-full aspect-[3/4]">
                        <img src="{{ asset('img/layanan-content-1.png') }}" alt="">
                    </div>
                </div>
            </div>

            <div class="absolute inset-0 mt-20 ml-72 border-t border-r border-blue-mensana rounded-tr-3xl"></div>

        </div>

        <div class="relative">
            <div class="place-items-center gap-x-12 grid grid-cols-6">
                <div class="col-span-2 col-start-2">
                    <div class="w-full aspect-[3/4]">
                        <img src="{{ asset('img/layanan-content-2.png') }}" alt="">
                    </div>
                </div>
                <div class="col-span-2">
                    <h2 class="mb-8 font-bold text-blue-mensana text-6xl">ANIMAL HEALTH CONSULTATION</h2>
                    <p class="text-lg">
                        Mauris tincidunt rutrum arcu, sit amet pretium
                        lectus mattis sed. Suspendisse ultricies eu
                        turpis in feugiat. Nam risus lacus, viverra eget
                        commodo nec, dapibus id libero. Aenean lorem
                        tortor, consequat in libero id, congue
                        ullamcorper ante. Nam risus lacus, viverra eget
                        commodo nec, dapibus id libero. Aenean lorem
                    </p>
                </div>
            </div>
        </div>



    </div>
</div> --}}

<div class="mx-auto mt-10 mb-48 container">
    <div class="flex flex-col p-12 w-full">
        <div class="pl-48 w-full translate-y-0.5">
            <div class="border-y-2 border-r-2 border-blue-mensana rounded-r-4xl h-full">
                <div class="gap-x-20 grid grid-cols-2 h-full">
                    <div class="flex flex-col justify-center py-32 text-right">
                        <h2 class="mb-8 font-bold text-blue-mensana text-6xl">LABORATORIUM</h2>
                        <p class="text-lg">
                            Mauris tincidunt rutrum arcu, sit amet pretium
                            lectus mattis sed. Suspendisse ultricies eu
                            turpis in feugiat. Nam risus lacus, viverra eget
                            commodo nec, dapibus id libero. Aenean lorem
                            tortor, consequat in libero id, congue
                            ullamcorper ante. Nam risus lacus, viverra eget
                            commodo nec, dapibus id libero. Aenean lorem
                        </p>
                    </div>
                    <div class="relative">
                        <div class="bottom-6 absolute w-[500px]">
                            <img class="w-full h-auto" src="{{ asset('img/layanan-content-1.png') }}" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="-ml-28 w-full">
            <div class="border-y-2 border-blue-mensana border-l-2 rounded-l-4xl h-full">
                <div class="gap-x-20 grid grid-cols-2 h-full">
                    <div class="relative">
                        <div class="top-6 right-0 absolute w-[500px]">
                            <img class="w-full h-auto" src="{{ asset('img/layanan-content-2.png') }}" alt="">
                        </div>
                    </div>
                    <div class="flex flex-col justify-center py-32 text-left">
                        <h2 class="mb-8 font-bold text-blue-mensana text-6xl">ANIMAL HEALTH CONSULTATION</h2>
                        <p class="text-lg">
                            Mauris tincidunt rutrum arcu, sit amet pretium
                            lectus mattis sed. Suspendisse ultricies eu
                            turpis in feugiat. Nam risus lacus, viverra eget
                            commodo nec, dapibus id libero. Aenean lorem
                            tortor, consequat in libero id, congue
                            ullamcorper ante. Nam risus lacus, viverra eget
                            commodo nec, dapibus id libero. Aenean lorem
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
