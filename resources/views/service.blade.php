@extends('layouts.app')

@section('title', __('Layanan'))

@section('content')
<section class="relative">
    <!-- Very little is needed to make a happy life. - Marcus Aurelius -->
    <div class="w-full aspect-square lg:aspect-auto">
        <img src="{{ asset('img/layanan-hero_1.png') }}" alt="" class="w-full lg:w-full h-full lg:h-full object-cover object-right lg:object-none">
    </div>

    <div class="absolute inset-0 flex items-center">
        <div class="grid grid-cols-5 mx-auto px-4 lg:px-0 container">
            <div class="col-span-5 lg:col-span-2 lg:col-start-4 text-white">
                <h1 data-motion="fade-left" class="mb-4 font-bold text-xl lg:text-6xl">Kami berikan yang terbaik untuk kebutuhan ternak Anda.</h1>

                <div class="text-base lg:text-2xl" data-motion="fade-down">
                    <p>Donec vulputate nibh at massa bibendum, et pulvinar massa ornare. Sed elementum augue eu auctor fringilla. Phasellus interdum diam magna, a semper odio accumsan non. Maecenas enim</p>
                </div>

            </div>
        </div>
    </div>
</section>

<div class="mx-auto mt-10 mb-12 lg:mb-48 px-4 lg:px-0 container">
    <div class="flex flex-col gap-y-4 lg:gap-y-0 lg:p-12 w-full">
        <div class="lg:pl-48 w-full lg:translate-y-0.5">
            <div class="border-blue-mensana lg:border-y-2 lg:border-r-2 rounded-r-4xl h-full">
                <div class="lg:gap-x-20 grid lg:grid-cols-2 h-full">
                    <div class="flex flex-col justify-center lg:py-32 text-right">
                        <h2 class="mb-3 lg:mb-8 font-bold text-blue-mensana text-3xl lg:text-6xl">LABORATORIUM</h2>
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
                        <div class="lg:bottom-6 lg:absolute lg:w-[500px]">
                            <img class="w-full h-auto" src="{{ asset('img/layanan-content-1.png') }}" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="lg:-ml-28 w-full">
            <div class="border-blue-mensana lg:border-y-2 lg:border-l-2 rounded-l-4xl h-full">
                <div class="lg:gap-x-20 grid lg:grid-cols-2 h-full">
                    <div class="relative">
                        <div class="lg:top-6 lg:right-0 lg:absolute lg:w-[500px]">
                            <img class="w-full h-auto" src="{{ asset('img/layanan-content-2.png') }}" alt="">
                        </div>
                    </div>
                    <div class="flex flex-col justify-center lg:py-32 text-left">
                        <h2 class="mb-3 lg:mb-8 font-bold text-blue-mensana text-3xl lg:text-6xl">ANIMAL HEALTH CONSULTATION</h2>
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
