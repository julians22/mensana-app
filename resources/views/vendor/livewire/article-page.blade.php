@php
if (! isset($scrollTo)) {
    $scrollTo = 'body';
}

$scrollIntoViewJsSnippet = ($scrollTo !== false)
    ? <<<JS
       (\$el.closest('{$scrollTo}') || document.querySelector('{$scrollTo}')).scrollIntoView()
    JS
    : '';
@endphp

<div>
    @if ($paginator->hasPages())

        <div class="mx-auto mt-10 w-[100px]">
            <div class="flex flex-col items-center">
                <a wire:click="nextPage" wire:loading.attr="disabled" rel="next" class="">Load More</a>
            </div>
        </div>
    @endif
</div>
