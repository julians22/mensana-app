<div x-data="{results: {{$results->count()}}}" x-cloak x-show="results">
    {{-- The whole world belongs to you. --}}
    <h3 class="mb-10 font-bold text-blue-mensana text-2xl underline underline-offset-4">{{ $sectionTitle }}</h3>


    <div>

        @if ($results->count())

            <ul class="gap-5 grid 2xl:grid-cols-4">
                @switch($sectionTitle)
                    @case('Products')
                        @foreach ($results as $product)
                            <li class="bg-white shadow border-blue-mensana/65 hover:scale-105 transition-all transform">
                                <a href="{{ route('product.detail', ['slug' => $product->slug]) }}" class="flex flex-col items-center gap-y-4 p-2">
                                    <img src="{{ $product->getFirstMediaUrl('thumbnail') }}" alt="{{ $product->name }}" class="rounded-lg size-64 object-cover aspect-square">
                                    <div>
                                        <p class="font-bold text-blue-mensana text-lg">{{ $product->name }}</p>
                                        <p class="text-gray-600">{{ $product->excerpt }}</p>
                                    </div>
                                </a>
                            </li>
                        @endforeach
                    @break

                    @case('Articles')
                        @foreach ($results as $article)
                            <li class="bg-gray-100 border-blue-mensana/65 hover:scale-105 transition-all transform">
                                <a href="{{ route('article.detail', ['article' => $article->slug]) }}" class="flex flex-col items-center gap-y-4 p-2">
                                    <img src="{{ $article->getFirstMediaUrl('thumbnail') }}" alt="{{ $article->title }}" class="rounded-lg size-64 object-cover aspect-square">
                                    <div>
                                        <p class="font-bold text-blue-mensana text-lg">{{ $article->title }}</p>
                                        <p class="text-gray-600">{{ $article->excerpt }}</p>
                                    </div>
                                </a>
                            </li>
                        @endforeach
                    @break
                    @case('Services')
                        @foreach ($results as $service)
                            <li class="bg-gray-100 border-blue-mensana/65 hover:scale-105 transition-all transform">
                                <a href="{{ route('service') }}#{{Str::slug($service['title_'.app()->getLocale()])}}" class="flex flex-col items-center gap-y-4 p-2">
                                    <img src="{{ storageAsset($service['featured_image']) }}" alt="{{ $service['title_'.app()->getLocale()] }}" class="rounded-lg size-64 object-cover aspect-square">
                                    <div>
                                        <p class="font-bold text-blue-mensana text-lg">{{ $service['title_'.app()->getLocale()] }}</p>
                                    </div>
                                </a>
                            </li>
                        @endforeach
                    @break

                @endswitch

            </ul>

        @else

            <div>
                <p class="font-semibold text-gray-500 text-xl">No {{ strtolower($sectionTitle) }} found.</p>
            </div>

        @endif


    </div>


</div>
