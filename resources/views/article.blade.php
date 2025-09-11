@extends('layouts.app')

@section('content')

<!-- If you do not have a consistent goal in life, you can not live it in a consistent way. - Marcus Aurelius -->


<!-- All Article List -->
<section class="pb-20 pt-10">

    <div class="mx-auto container">

        <livewire:articles.index-article :categories="$categories" />

    </div>

</section>


@endsection
