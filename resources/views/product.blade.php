@extends('layouts.app')

@section('content')

<section class="relative">
    <!-- The whole future lies in uncertainty: live immediately. - Seneca -->

    <img src="{{ asset('img/hero-product.png') }}" alt="">

</section>


<section class="pt-20">

    <div class="gap-x-10 grid grid-cols-10 mx-auto container">
        <div class="col-span-3">

            <div class="top-10 sticky bg-[#f2f2f2] px-10 py-10 rounded-2xl">

                <!-- Search Field -->
                <div>
                    <form action="" onsubmit="return false;">
                        <input
                            type="text"
                            name="search"
                            placeholder="Search Product"
                            class="bg-white px-2 py-3 rounded-md outline-none ring-[#f2f2f2] ring-1 focus:ring-gray-300 ring-offset-1 w-full">

                        <button class="mt-4 btn btn-primary" type="submit">Search</button>
                    </form>
                </div>

                <!-- Filter Info -->
                <div class="flex gap-x-2 gap-y-1 mt-4">
                    <div class="relative bg-neutral-300 pr-6 pl-2 rounded-md text-white">Unggas <span class="right-0 absolute mr-2 text-gray-400 cursor-pointer">x</span></div>
                    <div class="relative bg-neutral-300 pr-6 pl-2 rounded-md text-white">Antibiotik <span class="right-0 absolute mr-2 text-gray-400 cursor-pointer">x</span></div>
                    <div class="relative bg-neutral-300 pr-6 pl-2 rounded-md text-white">Vitamin <span class="right-0 absolute mr-2 text-gray-400 cursor-pointer">x</span></div>
                </div>

                <!-- Filter Animal -->
                <div class="product-filter-wrapper" x-data="{openAnimal: false}">
                    <h3 class="filter-parrent-title">Animal</h3>

                    <ul class="mt-4" x-show="openAnimal" x-transition x-transition:enter.scale.80 x-transition:leave.scale.90>
                        <li>
                            <label class="option-list">
                                <input type="checkbox" class="form-checkbox">
                                <span class="label">
                                    <svg class="checkbox" width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <rect width="18" height="18" rx="4" fill="current"/>
                                    </svg>
                                    <span>Sapi</span>
                                </span>
                            </label>
                        </li>
                        <li>
                            <label class="option-list">
                                <input type="checkbox" class="form-checkbox">
                                <span class="label">
                                    <svg class="checkbox" width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <rect width="18" height="18" rx="4" fill="current"/>
                                    </svg>
                                    <span>Ayam</span>
                                </span>
                            </label>
                        </li>
                        <li>
                            <label class="option-list">
                                <input type="checkbox" class="form-checkbox">
                                <span class="label">
                                    <svg class="checkbox" width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <rect width="18" height="18" rx="4" fill="current"/>
                                    </svg>
                                    <span>Babi</span>
                                </span>
                            </label>
                        </li>
                    </ul>

                    <div class="group top-0 right-0 absolute size-6 cursor-pointer">
                        <span  @click="openAnimal = !openAnimal" class="block size-full transform" :class="{'-scale-y-100' : !openAnimal}">
                            <x-heroicon-o-chevron-down class="text-blue-mensana"/>
                        </span>
                    </div>
                </div>

                <!-- Category Filter -->
                <div class="product-filter-wrapper" x-data="{openCategory: true}">
                    <h3 class="filter-parrent-title" @click="openCategory = !openCategory">Category</h3>

                    <ul class="mt-4" x-show="openCategory" x-transition x-transition:enter.scale.80 x-transition:leave.scale.90>
                        <li>
                            <label class="option-list">
                                <input type="checkbox" class="form-checkbox">
                                <span class="label">
                                    <svg class="checkbox" width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <rect width="18" height="18" rx="4" fill="current"/>
                                    </svg>
                                    <span>Premix</span>
                                </span>
                            </label>
                        </li>
                        <li>
                            <label class="option-list">
                                <input type="checkbox" class="form-checkbox">
                                <span class="label">
                                    <svg class="checkbox" width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <rect width="18" height="18" rx="4" fill="current"/>
                                    </svg>
                                    <span>Pharmasetik</span>
                                </span>
                            </label>
                        </li>
                        <li>
                            <label class="option-list">
                                <input type="checkbox" class="form-checkbox">
                                <span class="label">
                                    <svg class="checkbox" width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <rect width="18" height="18" rx="4" fill="current"/>
                                    </svg>
                                    <span>Herbal</span>
                                </span>
                            </label>
                        </li>
                        <li>
                            <label class="option-list">
                                <input type="checkbox" class="form-checkbox">
                                <span class="label">
                                    <svg class="checkbox" width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <rect width="18" height="18" rx="4" fill="current"/>
                                    </svg>
                                    <span>Vaksin</span>
                                </span>
                            </label>
                        </li>
                        <li>
                            <label class="option-list">
                                <input type="checkbox" class="form-checkbox">
                                <span class="label">
                                    <svg class="checkbox" width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <rect width="18" height="18" rx="4" fill="current"/>
                                    </svg>
                                    <span>Perlengkapan</span>
                                </span>
                            </label>
                        </li>

                    </ul>

                    <div class="group top-0 right-0 absolute size-6 cursor-pointer">
                        <span  @click="openCategory = !openCategory" class="block size-full transform" :class="{'-scale-y-100' : !openCategory}">
                            <x-heroicon-o-chevron-down class="text-blue-mensana"/>
                        </span>
                    </div>
                </div>

                <!-- Download Catalogue Button -->

                <div class="mt-6">
                    <a href="#" class="group flex items-center hover:bg-blue-mensana border border-blue-mensana rounded-xl">
                        <div class="flex flex-1 justify-center items-center px-4 size-6">
                            <x-heroicon-s-arrow-down-tray class="text-blue-mensana group-hover:text-white transition-all ease-in-out"/>
                        </div>
                        <div class="px-4 py-2 group-hover:border-white border-blue-mensana border-l transition-all ease-in-out">
                            <span class="font-bold text-blue-mensana group-hover:text-white text-xl transition-all ease-in-out">
                                Request Download Catalog
                            </span>
                        </div>
                    </a>
                </div>



            </div>

        </div>
        <div class="col-span-7">
            <div class="min-h-[1000px]">
                <div class="product__wrapper">

                    <x-product-card-component
                        slug="sanavac-nd-clone"
                        product_name="Sanavac ND Clone"
                        product_description="Vaksin aktif newcastle disease"
                        :categories="['Vaksin', 'Live']"
                    />

                    <x-product-card-component
                        slug="colimas"
                        product_name="Colimas"
                        product_description=""
                        :categories="['Farmasetik', 'Antibiotik']"
                    />

                    <x-product-card-component
                        slug="doxerin-+"
                        product_name="Doxerin +"
                        product_description=""
                        :categories="['Premix', 'Antibiotik']"
                    />


                    <x-product-card-component
                        slug="doxerin"
                        product_name="Doxerin"
                        product_description=""
                        :categories="['Farmasetik', 'Antibiotik']"
                    />
                    <x-product-card-component
                        slug="sanavac-nd-clone"
                        product_name="Sanavac ND Clone"
                        product_description="Vaksin aktif newcastle disease"
                        :categories="['Vaksin', 'Live']"
                    />

                    <x-product-card-component
                        slug="colimas"
                        product_name="Colimas"
                        product_description=""
                        :categories="['Farmasetik', 'Antibiotik']"
                    />

                    <x-product-card-component
                        slug="doxerin-+"
                        product_name="Doxerin +"
                        product_description=""
                        :categories="['Premix', 'Antibiotik']"
                    />


                    <x-product-card-component
                        slug="doxerin"
                        product_name="Doxerin"
                        product_description=""
                        :categories="['Farmasetik', 'Antibiotik']"
                    />
                    <x-product-card-component
                        slug="sanavac-nd-clone"
                        product_name="Sanavac ND Clone"
                        product_description="Vaksin aktif newcastle disease"
                        :categories="['Vaksin', 'Live']"
                    />

                    <x-product-card-component
                        slug="colimas"
                        product_name="Colimas"
                        product_description=""
                        :categories="['Farmasetik', 'Antibiotik']"
                    />

                    <x-product-card-component
                        slug="doxerin-+"
                        product_name="Doxerin +"
                        product_description=""
                        :categories="['Premix', 'Antibiotik']"
                    />


                    <x-product-card-component
                        slug="doxerin"
                        product_name="Doxerin"
                        product_description=""
                        :categories="['Farmasetik', 'Antibiotik']"
                    />




                    {{-- <div class="product-card">
                        <div class="p-4 pt-8">
                            <img src="https://i.imgur.com/kP8yHj9.png" alt="Sanavac ND Clone" class="mx-auto h-36 object-contain">
                        </div>
                        <div class="flex flex-col justify-between p-5 h-full product-info">
                            <div>
                                <h3 class="product-title">Sanavac ND Clone</h3>
                                <p class="mt-1 min-h-[40px] text-gray-600 text-sm">Vaksin aktif newcastle disease</p>
                            </div>
                            <div class="flex justify-center space-x-2 mt-4 pt-4 border-gray-200 border-t">
                                <span class="px-3 py-1 border border-blue-700 rounded-full font-medium text-blue-700 text-sm">Vaksin</span>
                                <span class="px-3 py-1 border border-gray-400 rounded-full text-gray-700 text-sm">Live</span>
                            </div>
                        </div>
                    </div>

                    <div class="product-card">
                        <div class="p-4 pt-8">
                            <img src="https://i.imgur.com/yFqGfQy.png" alt="Colimas" class="mx-auto h-36 object-contain">
                        </div>
                        <div class="flex flex-col justify-between p-5 h-full">
                            <div>
                                <h3 class="mt-2 font-semibold text-blue-700 text-xl">Colimas</h3>
                                <p class="mt-1 min-h-[40px] text-gray-600 text-sm">Kombinasi ideal antibakteri dalam bentuk water soluble powder</p>
                            </div>
                            <div class="flex justify-center space-x-2 mt-4 pt-4 border-gray-200 border-t">
                                <span class="px-3 py-1 border border-gray-400 rounded-full text-gray-700 text-sm">Farmasetik</span>
                                <span class="px-3 py-1 border border-gray-400 rounded-full text-gray-700 text-sm">Antibiotik</span>
                            </div>
                        </div>
                    </div>

                    <div class="product-card">
                        <div class="p-4 pt-8">
                            <img src="https://i.imgur.com/83p7Q7C.png" alt="Doxerin +" class="mx-auto h-36 object-contain">
                        </div>
                        <div class="flex flex-col justify-between p-5 h-full">
                            <div>
                                <h3 class="mt-2 font-semibold text-blue-700 text-xl">Doxerin +</h3>
                                <p class="mt-1 min-h-[40px] text-gray-600 text-sm">Kombinasi dua antibiotik dalam konsentrasi tinggi untuk melawan CRD, Snot dan komplikasinya</p>
                            </div>
                            <div class="flex justify-center space-x-2 mt-4 pt-4 border-gray-200 border-t">
                                <span class="px-3 py-1 border border-gray-400 rounded-full text-gray-700 text-sm">Premix</span>
                                <span class="px-3 py-1 border border-gray-400 rounded-full text-gray-700 text-sm">Antibiotik</span>
                            </div>
                        </div>
                    </div>

                    <div class="product-card">
                        <div class="p-4 pt-8">
                            <img src="https://i.imgur.com/712W1Xo.png" alt="Doxerin" class="mx-auto h-36 object-contain">
                        </div>
                        <div class="flex flex-col justify-between p-5 h-full">
                            <div>
                                <h3 class="mt-2 font-semibold text-blue-700 text-xl">Doxerin</h3>
                                <p class="mt-1 min-h-[40px] text-gray-600 text-sm">Kombinasi ampuh melawan CRD, Snot dan komplikasinya dalam bentuk water soluble powder</p>
                            </div>
                            <div class="flex justify-center space-x-2 mt-4 pt-4 border-gray-200 border-t">
                                <span class="px-3 py-1 border border-gray-400 rounded-full text-gray-700 text-sm">Farmasetik</span>
                                <span class="px-3 py-1 border border-gray-400 rounded-full text-gray-700 text-sm">Antibiotik</span>
                            </div>
                        </div>
                    </div> --}}

                </div>
            </div>

            <div class="h-[100px]"></div>
        </div>
    </div>

</section>

@endsection
