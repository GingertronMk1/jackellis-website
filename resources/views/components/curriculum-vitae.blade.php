@props([
    'cv'
])

@php
    $classes = [
        'space-y-2',
        '[&>h1]:text-5xl',
        '[&>h2]:text-4xl',
        '[&>h3]:text-3xl',
        '[&>h4]:text-2xl',
        '[&>h5]:text-xl',
        '[&>h6]:text-lg',
        '[&>ul]:list-inside',
        '[&>ul]:list-disc',
        '[&>ol]:list-inside',
        '[&>ol]:list-decimal',
    ];
@endphp

<section class="{{ implode(' ', $classes) }}">
    {!! str($cv)->markdown()->sanitizeHtml() !!}
</section>
