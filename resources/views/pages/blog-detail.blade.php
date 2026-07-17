@extends('layouts.app')

@section('title', $blog->title . ' - Armada Mobil')

@section('meta_description', $blog->excerpt)
@section('meta_keywords', 'armada mobil, ' . strtolower($blog->title) . ', tips otomotif, berita otomotif')
@section('og_image', $blog->image)

@section('content')
    <article class="detail-container">
        <div style="margin-bottom: 2rem;">
            <a href="{{ route('blogs') }}" class="text-btn" style="margin-bottom: 1.5rem; display: inline-flex; align-items: center; gap: 0.5rem;">
                <i class="fa-solid fa-arrow-left"></i> Kembali ke Blogs
            </a>
            <h1 style="font-size: 2.75rem; color: var(--color-secondary); line-height: 1.2;">{{ $blog->title }}</h1>
            <div class="detail-meta">
                <span><i class="fa-regular fa-calendar-days"></i> {{ $blog->created_at->format('d M Y') }}</span>
                <span><i class="fa-regular fa-user"></i> Oleh Admin</span>
                <span><i class="fa-regular fa-folder-open"></i> Informasi</span>
            </div>
        </div>

        <div class="detail-img">
            <img src="{{ $blog->image }}" style="width: 100%; height: auto; display: block;" alt="{{ $blog->title }}">
        </div>

        <div class="detail-body">
            {!! $blog->content !!}

            @include('components.share-buttons', ['title' => $blog->title])
        </div>
    </article>
@endsection
