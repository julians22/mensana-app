<div>
    {{-- Knowing others is intelligence; knowing yourself is true wisdom. --}}

    <div class="bg-blue-mensana py-10">
        <div class="grid grid-cols-1 lg:grid-cols-3 mx-auto container">
            <div class="col-start-1 lg:col-start-2">
                <form action="{{ route('search_result') }}">
                    <input type="q" wire:model='keyword' name="q" class="bg-white px-4 py-2 rounded-full focus:outline-0 w-full text-lg">
                </form>

                <div class="mt-10 font-quicksilver text-white text-center">
                    @if ($keyword)
                        <p>Showing result for "{{ $keyword }}"</p>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <div class="mx-auto my-10 container">

        <div class="flex flex-col lg:gap-y-8">
            <livewire:search-results.section key="section-products" :keyword="$keyword ?? null" sectionTitle="Products">

            <livewire:search-results.section key="section-articles" :keyword="$keyword ?? null" sectionTitle="Articles">

            <livewire:search-results.section key="section-services" :keyword="$keyword ?? null" sectionTitle="Services">

        </div>


    </div>


</div>
