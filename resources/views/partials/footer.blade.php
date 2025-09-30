
@php

    $class="footer-gray";

    $route = Route::currentRouteName();

    if ($route !== 'contact') {
        $class = "footer-white";
    }
@endphp
<footer class="relative bg-cover bg-top pt-20 pb-24 {{ $class }}" style="background-image: url('{{ asset('img/footer-shape.png') }}');">

    <div class="mx-auto overflow-hidden container">
        <div class="flex">

            <!-- Logo -->
            <div class="flex-shrink-0 mr-20">
                <img src="{{ asset('img/logo-simple.svg') }}" alt="Logo" class="h-40">
            </div>

            <!-- Address -->
            <div class="flex-grow-0 space-y-3 mr-60 max-w-80 font-sans-9pt-regular">
                <h5 class="font-sans text-white text-2xl">PT. Mensana Aneka Satwa</h5>
                <p class="text-white text-lg text-justify">Mensana Tower Cibubur Lt. 18, Jalan Raya Kranggan No. 69, Kelurahan Jatisampurna, Bekasi, Jawa Barat, Indonesia, 17433</p>

                <div>
                    <p class="flex items-center text-white text-lg">
                        <img src="{{ asset('img/icons/email.svg') }}" alt="Email" class="mr-2 w-5 h-5">
                        sales@ptmensana.com
                    </p>
                    <p class="flex items-center text-white text-lg">
                        <img src="{{ asset('img/icons/phone.svg') }}" alt="Phone" class="mr-2 w-5 h-5">
                        +62 213 970 1500
                    </p>
                    <p class="flex items-center text-white text-lg">
                        <img src="{{ asset('img/icons/whatsapp.svg') }}" alt="WhatsApp" class="mr-2 w-5 h-5">
                        +62 813 8039 9399
                    </p>
                </div>
            </div>

            <!-- Site Link & Social Icons Column -->
            <div>
                <!-- Site Links -->
                <ul class="gap-10 grid grid-cols-2 text-lg">
                    <li><a href="{{ url('/') }}" class="text-white hover:underline">Home</a></li>
                    <li><a href="{{ url('/career') }}" class="text-white hover:underline">Career</a></li>
                    <li><a href="{{ url('/products') }}" class="text-white hover:underline">Products</a></li>
                    <li><a href="{{ url('/services') }}" class="text-white hover:underline">Services</a></li>

                    <li><a href="{{ url('/download') }}" class="text-white hover:underline">Download</a></li>
                    <li><a href="{{ url('/article') }}" class="text-white hover:underline">Article</a></li>
                </ul>

                <!-- Social Icons -->
                <div class="mt-10">
                    <p class="text-white text-lg">Social media kami</p>
                    <div class="flex">
                        <a href="#" class="w-12 h-12 text-white hover:underline">
                            <img src="{{ asset('img/icons/instagram.svg') }}" alt="">
                        </a>

                        <a href="#" class="w-12 h-12 text-white hover:underline">
                            <img src="{{ asset('img/icons/facebook.svg') }}" alt="">
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>


</footer>
