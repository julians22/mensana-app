@extends('layouts.app')

@section('title', __('Tentang Kami'))

@section('content')

<section class="relative">
    <!-- The whole future lies in uncertainty: live immediately. - Seneca -->

    <div class="aspect-square lg:aspect-video">
        <img src="{{ asset('img/hero-about.png') }}" alt="" class="w-full h-full object-center object-cover">
    </div>


    <div class="absolute inset-0 flex items-center px-4 lg:px-0">
        <div class="grid grid-cols-5 mx-auto container">
            <div class="col-span-4 lg:col-span-2 text-white">
                <h1 data-motion="fade-left" class="mb-4 font-bold text-xl lg:text-4xl">PT MENSANA ANEKAS SATWA</h1>

                <div class="text-base lg:text-2xl" data-motion="fade-down">
                    <p>adalah perusahaan produsen, importir, eksportir dan distributor yang bergerak dibidang kesehatan hewan. Sejak berdiri pada tahun 1986 hingga saat ini produknya sudah merambah hampir diseluruh Indonesia. Produk yang diproduksi adalah farmasetik, obat alami, dan premix.</p>
                </div>

            </div>
        </div>
    </div>

</section>

<!-- Milestones Section -->
<section class="py-8 lg:py-20">

    <div class="mx-auto px-4 container">
        <h2 class="mb-8 font-bold text-blue-mensana text-4xl text-center" data-motion="">@lang('Pencapaian Kami')</h2>

        <!-- Milestones Thumbnail swiper -->
         <div class="pb-6">
            <div class="swiper thumbnail_milestone__swiper">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <div class="cursor-pointer">
                            <div class="thumbnail__title">1986 - 1990</div>
                            <div class="thumbnail__subtitle">Awal Berdiri</div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="cursor-pointer">
                            <div class="thumbnail__title">1995 - 2003</div>
                            <div class="thumbnail__subtitle">Mandiri</div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="cursor-pointer">
                            <div class="thumbnail__title">2012 - Sekarang</div>
                            <div class="thumbnail__subtitle">Berkembang</div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="cursor-pointer">
                            <div class="thumbnail__title">2012 - Sekarang</div>
                            <div class="thumbnail__subtitle">Berkembang</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Milestones swiper -->
        <div class="relative pb-10">
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
            </div>
            <!-- Add Pagination -->
            <div class="swiper-pagination milestone__swiper-pagination"></div>
        </div>


    </div>

</section>

<!-- Visi Section -->
<section class="about__section">
    <div class="absolute inset-0">
        <img src="{{ asset('img/visi-bg.png') }}" alt="" class="w-full h-full object-cover">
    </div>
    <div class="relative flex flex-row-reverse mx-auto px-2 md:px-10 container">

        <div class="w-full md:w-1/2 prose xl:prose-xl">
            <h2 class="text-blue-mensana" data-motion="fade-left">Visi</h2>
            <div data-motion="fade-down">
                <p>Menjadi perusahaan obat hewan yang terpercaya, tangguh dan mampu bersaing di era globalisasi.</p>
                <p>Mengutamakan kualitas dan mutu produk obat hewan yang dipasarkan untuk kemajuan industri peternakan Indonesia.</p>
            </div>
        </div>
    </div>
</section>

<!-- Misi Section -->
<section class="about__section">

    <div class="absolute inset-0">
        <img src="{{ asset('img/misi-bg.png') }}" alt="" class="w-full h-full object-cover">
    </div>

    <div class="relative flex flex-row mx-auto px-2 md:px-10 container">
        <div class="w-full md:w-1/2 prose xl:prose-xl">
            <h2 class="text-blue-mensana" data-motion="fade-right">Misi</h2>

            <div data-motion="fade-down">
                <p>Memberikan pelayanan dan service yang terbaik bagi seluruh customer atau pemakai produk PT. Mensana Aneka Satwa dengan berinovasi menciptakan produk-produk yang unggul dalam kualitas.</p>
                <p>Menjalin hubungan yang baik kepada para pelanggan melalui sistem layanan teknis oleh para tenaga ahli kesehatan yang handal.</p>
                <p>Menciptakan lingkungan kerja yang positif, nyaman dan interaktif.</p>
            </div>

        </div>
    </div>

</section>

<!-- Core Section -->
<section class="about__section">

    <div class="absolute inset-0">
        <img src="{{ asset('img/core-bg.png') }}" alt="" class="w-full h-full object-cover">
    </div>

    <div class="relative flex flex-row mx-auto px-2 md:px-10 container">
        <div class="w-full md:w-1/2 prose xl:prose-xl">
            <h2 class="text-blue-mensana" data-motion="fade-left">Nilai-Nilai Inti (Core Values)</h2>

            <div data-motion="fade-down">
                <p> <span class="font-bold text-blue-mensana text-2xl">Diversity,</span> menjunjung tinggi Keberagaman sebagai sebuah nilai dapat memastikan Kami memiliki beragam keterampilan, opini, pandangan, pengalaman, dan bakat dalam persusahaan kami. Kombinasi ini dapat memajukan kami lebih cepat dan berinovasi untuk menghadirkan solusi.</p>
            </div>
        </div>
    </div>
</section>

<!-- Product Section -->
<section class="about__section">

    <div class="hidden lg:block lg:top-[80%] z-0 absolute inset-x-0 bg-linear-to-t from-30% from-white via-80% to-[#DDDDDD] to-100% w-full lg:h-[500px]"></div>

    <div class="relative mx-auto container">
        <div class="lg:top-7 lg:left-0 lg:absolute lg:max-w-[600px] text-center">
            <h5 class="font-sans-9pt-regular font-normal text-blue-mensana text-3xl 2xl:text-5xl">@lang('Jelajahi produk kami untuk')</h5>
            <h5 class="font-sans font-black text-blue-mensana text-3xl 2xl:text-6xl">@lang('mengetahui kami lebih dalam')</h5>

            <a class="inline-block bg-white mt-8 px-4 py-2 border border-blue-mensana rounded text-blue-mensana" href="">@lang('Produk Kami')</a>
        </div>


        <div class="img__shadowable_wrapper">
            <img src="{{ asset('img/Product Lineup.png') }}" alt="" class="z-10 relative mt-4 lg:mt-0 w-full max-w-full lg:max-w-[800px] 2xl:max-w-[1000px] img__shadowable">
        </div>
    </div>

</section>

@endsection
