@extends('layouts.app')

@section('title', __('Berita & Artikel'))

@section('content')

<!-- If you do not have a consistent goal in life, you can not live it in a consistent way. - Marcus Aurelius -->


<!-- All Article List -->
<section class="pt-10 pb-20">

    <div class="mx-auto container">

        <livewire:articles.index-article :categories="$categories" />

    </div>

</section>


@endsection
