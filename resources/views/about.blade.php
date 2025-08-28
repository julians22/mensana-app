@extends('layouts.app')

@section('content')


<section class="relative">
    <!-- The whole future lies in uncertainty: live immediately. - Seneca -->

    <img src="{{ asset('img/hero-about.png') }}" alt="">


</section>

<section class="py-20">

    <div class="mx-auto px-4 container">
        <h2 class="mb-8 font-bold text-blue-mensana text-4xl text-center">Pencapaian Kami</h2>

        <!-- Milestones Thumbnail swiper -->
         <div class="pb-6">
            <div class="swiper thumbnail_milestone__swiper">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <div class="thumbnail__title">1986 - 1990</div>
                        <div class="thumbnail__subtitle">Awal Berdiri</div>
                    </div>
                    <div class="swiper-slide">
                        <div class="thumbnail__title">1995 - 2003</div>
                        <div class="thumbnail__subtitle">Mandiri</div>
                    </div>
                    <div class="swiper-slide">
                        <div class="thumbnail__title">2012 - Sekarang</div>
                        <div class="thumbnail__subtitle">Berkembang</div>
                    </div>
                    <div class="swiper-slide">
                        <div class="thumbnail__title">2012 - Sekarang</div>
                        <div class="thumbnail__subtitle">Berkembang</div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Milestones swiper -->
        <div>
            <div class="swiper-container swiper milestone__swiper">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <div class="milestone-card">
                            <img src="{{ asset('img/milestones/1.png') }}" alt="">
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="milestone-card">
                            <img src="{{ asset('img/milestones/2.png') }}" alt="">
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="milestone-card">
                            <img src="{{ asset('img/milestones/3.png') }}" alt="">
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="milestone-card">
                            <img src="{{ asset('img/milestones/3.png') }}" alt="">
                        </div>
                    </div>
                </div>
                <!-- Add Pagination -->
                <div class="swiper-pagination"></div>
            </div>
        </div>


    </div>

</section>

@endsection
