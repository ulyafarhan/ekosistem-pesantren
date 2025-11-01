@extends('layouts.app')

@section('title', $title)
@section('description', Str::limit(strip_tags($content), 150))

@section('content')
<div class="pt-24 pb-20 sm:pt-32 sm:pb-24">
    <div class="container mx-auto px-6 max-w-7xl">
        
        <div class="mb-8">
            <a href="{{ route('tokoh.sejarah.index') }}" class="inline-flex items-center gap-2 text-primary-blue font-semibold hover:underline">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd" />
                </svg>
                Kembali ke Halaman Tokoh & Sejarah
            </a>
        </div>

        <div class="bg-white p-8 md:p-12 rounded-2xl border border-gray-200/80 shadow-lg animasi-scroll fade-in-up">
            <h1 class="text-3xl md:text-4xl font-extrabold text-gray-900 mb-8">{{ $title }}</h1>
            <div class="prose max-w-none prose-lg text-gray-600 leading-relaxed">
                {!! $content !!}
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    document.addEventListener("DOMContentLoaded", function() {
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('sudah-muncul');
                    observer.unobserve(entry.target);
                }
            });
        }, { 
            threshold: 0.1
        });

        const elementsToAnimate = document.querySelectorAll('.animasi-scroll');
        elementsToAnimate.forEach(el => {
            observer.observe(el);
        });
    });
</script>
@endpush