@extends('layouts.app')

@section('title', 'Product')

@section('meta_description', 'Product')

@section('content')


<div>
    <!-- Always remember that you are absolutely unique. Just like everyone else. - Margaret Mead -->


    <div class="relative">
        <div class="relative mx-auto mb-10 border border-slate-200 rounded-lg overflow-hidden container">
            <div class="bg-white mx-auto mb-8 p-6 lg:p-12 max-w-7xl">
                <div class="relative flex lg:flex-row flex-col lg:space-x-12">

                    <div class="top-4 right-4 z-10 absolute flex space-x-4 text-xl">

                        <span
                            @click="openShareModal = true"
                            class="group block hover:bg-blue-mensana/40 p-2 border border-stone-300 hover:border-blue-mensana/40 rounded-full cursor-pointer">
                            <x-heroicon-o-share class="stroke-stone-300 group-hover:stroke-white w-6 h-6"/>
                        </span>

                        <span class="group block hover:bg-blue-mensana/40 p-2 border border-stone-300 hover:border-blue-mensana/40 rounded-full cursor-pointer">
                            <x-heroicon-o-x-mark class="stroke-stone-300 group-hover:stroke-white w-6 h-6"/>
                        </span>
                    </div>

                    <div class="flex-1">
                        <div class="flex space-x-2 mb-4 text-gray-500 text-sm">
                            <span class="px-3 py-1 border border-gray-400 rounded-full">Anti Parasit</span>
                            <span class="px-3 py-1 border border-gray-400 rounded-full">Farmasetik</span>
                        </div>
                        <h1 class="mt-2 font-bold text-blue-mensana text-4xl lg:text-5xl">ALBENMAS</h1>
                        <h2 class="mt-2 font-normal text-blue-mensana text-xl lg:text-2xl">Albendazole, Oral Suspension</h2>

                        <div class="mt-8">
                            <h3 class="mb-2 font-semibold text-blue-mensana text-base">Ukuran</h3>
                            <div class="flex space-x-2">
                                <span class="px-4 py-2 border border-blue-mensana rounded-full font-medium text-slate-700 cursor-pointer">1000 ml</span>
                                <span class="px-4 py-2 border border-blue-mensana rounded-full font-medium text-slate-700 cursor-pointer">100 ml</span>
                            </div>
                        </div>

                        <div class="mt-8">
                            <h3 class="font-semibold text-gray-700 text-xl">Indikasi</h3>
                            <p class="mt-2 text-gray-600 text-sm">Menyerang infestasi parasit dewasa, larva, dan telur Nematoda spp., cacing paru-paru, cacing pita, cacing hati, Fasciolla hepatica pada sapi, kuda, domba, kambing dan unggas.</p>
                        </div>

                        <div class="mt-6">
                            <h3 class="font-semibold text-gray-700 text-xl">Aturan Pakai dan Dosis</h3>
                            <p class="mt-2 text-gray-600 text-sm">Diberikan secara oral lewat air minum.</p>
                            <ul class="space-y-1 mt-2 text-gray-600 text-sm list-disc list-inside">
                                <li>Sapi, kuda, domba:</li>
                                <li>Nematoda spp., cacing partu-paru, cacing pita: 5 ml/10 kg BB</li>
                                <li>Cacing hati: 1ml/10 kg BB</li>
                                <li>Unggas: 0,1 - 0,15 ml/10 kg BB</li>
                            </ul>
                        </div>

                        <div class="mt-8">
                            <p class="mb-2 font-semibold text-blue-mensana text-sm">Produk untuk Sapi, kuda, domba, unggas</p>
                            <button class="group flex items-center space-x-2 bg-white hover:bg-blue-mensana/60 py-3 pr-6 pl-3 border border-blue-men rounded-xl font-bold text-blue-mensana hover:text-white transition-colors">
                                <x-heroicon-s-arrow-down-tray class="size-5 text-blue-mensana group-hover:text-white transition-all ease-in-out"/>
                                <span>Request Download Catalog</span>
                            </button>
                        </div>
                    </div>

                    <div class="relative flex flex-1 justify-center items-center mt-8 lg:mt-0">
                        <img src="https://i.imgur.com/83u6N7u.png" alt="ALBENMAS Oral Suspension" class="max-w-full h-auto">
                        <div class="right-0 absolute inset-y-0 flex items-center pr-2">
                            <button class="bg-white bg-opacity-70 shadow-md p-2 rounded-full text-gray-700">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5" />
                                </svg>
                            </button>
                        </div>
                    </div>

                </div>
            </div>

            <div class="z-10 relative mx-auto mt-12 pb-20 max-w-4xl text-center">
                <h3 class="mb-14 font-semibold text-blue-mensana text-xl">Produk Anti Parasit Lainnya</h3>
                <div class="gap-6 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3">

                    <div class="bg-white shadow-md hover:shadow-lg p-6 border border-stone-400 rounded-xl text-center transition-transform hover:-translate-y-1 duration-300 transform">
                        <img src="{{ asset('product-thumbs.png') }}" alt="Cyromas" class="mx-auto h-40 object-contain">
                        <h4 class="mt-4 font-semibold text-blue-mensana text-lg">Cyromas</h4>
                    </div>

                    <div class="bg-white shadow-md hover:shadow-lg p-6 border border-stone-400 rounded-xl text-center transition-transform hover:-translate-y-1 duration-300 transform">
                        <img src="{{ asset('product-thumbs.png') }}" alt="Levamas" class="mx-auto h-40 object-contain">
                        <h4 class="mt-4 font-semibold text-blue-mensana text-lg">Levamas</h4>
                    </div>

                    <div class="bg-white shadow-md hover:shadow-lg p-6 border border-stone-400 rounded-xl text-center transition-transform hover:-translate-y-1 duration-300 transform">
                        <img src="{{ asset('product-thumbs.png') }}" alt="Piperamas" class="mx-auto h-40 object-contain">
                        <h4 class="mt-4 font-semibold text-blue-mensana text-lg">Piperamas</h4>
                    </div>

                </div>


            </div>

            <div class="-bottom-24 absolute inset-x-0 w-full">
                <svg class="w-full" viewBox="0 0 605 195" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M605 195V5.83029C544.699 26.8813 433.59 41 306.5 41C173.561 41 58.1075 25.5517 0 2.88026V195H605Z" fill="#F2F2F2"/>
                </svg>
            </div>
        </div>

        <div class="-bottom-5 absolute inset-x-0 flex justify-center mt-8">
            <button
                @click="window.scrollTo({top: 0, behavior: 'smooth'})"
                type="button" class="bg-white hover:bg-stone-300 p-2 border border-stone-300 rounded-full transition-colors">
                <x-heroicon-o-chevron-double-up class="w-6 h-6 text-stone-500" />
            </button>
        </div>

    </div>


</div>

@endsection

