@extends('layouts.app')

@section('title', $brand . ' - Katalog Snack')

@section('content')
    <div class="container section-gap text-center">
        <a href="{{ route('snacks.index') }}#produk" class="btn btn-outline-dark rounded-pill mb-4">
            &larr; Semua Merek
        </a>

        @if ($brandLogo)
            <div class="brand-page-logo-wrap mb-4">
                <img class="brand-page-logo" src="{{ asset('assets/images/' . rawurlencode($brandLogo)) }}" alt="Logo {{ $brand }}">
            </div>
        @endif

        <h1 class="section-title">{{ $brand }}</h1>
        <p class="section-sub">Pilih varian {{ $brand }} favoritmu</p>

        <div class="row row-cols-2 row-cols-lg-4 g-3 mt-3 justify-content-center">
            @forelse ($snacks as $snack)
                <div class="col">
                    <div class="photo-card product-card">
                        <a href="{{ route('snacks.show', $snack) }}" class="stretched-link-wrap">
                            <img src="{{ asset('assets/images/' . $snack->image) }}" alt="{{ $snack->name }} {{ $snack->flavor }}">
                        </a>
                        <span class="badge-weight">{{ $snack->weight }} g</span>
                        <div class="product-info">
                            <span class="product-brand">{{ $snack->brand }}</span>
                            <a href="{{ route('snacks.show', $snack) }}" class="product-name">{{ $snack->name }}</a>
                            <small class="d-block product-flavor">{{ $snack->flavor }}</small>
                            <div class="d-flex justify-content-center align-items-center mt-2 gap-2 flex-wrap">
                                <span class="price-tag">Rp {{ number_format($snack->price, 0, ',', '.') }}</span>
                                <a href="{{ route('snacks.show', $snack) }}" class="btn btn-light btn-sm fw-medium">Pilih</a>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12">
                    <p class="alert alert-info">Belum ada varian untuk merek {{ $brand }}.</p>
                </div>
            @endforelse
        </div>

        <div class="d-flex justify-content-center mt-4">
            {{ $snacks->onEachSide(1)->links('pagination::bootstrap-5') }}
        </div>
    </div>
@endsection
