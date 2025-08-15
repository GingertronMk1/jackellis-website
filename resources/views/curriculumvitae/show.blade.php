@props([
    'cv'
])

<x-guest-layout>
    <x-curriculum-vitae :cv="$cv" />
    <div class="flex flex-row gap-x-4 mt-4">
        <x-primary-button>
            <a href="{{ route('curriculum-vitae.download-markdown') }}" target="_blank">
                Download Markdown
            </a>
        </x-primary-button>
        <x-primary-button>
            <a href="{{ route('curriculum-vitae.download-pdf') }}" target="_blank">
                Download PDF
            </a>
        </x-primary-button>
    </div>
</x-guest-layout>
