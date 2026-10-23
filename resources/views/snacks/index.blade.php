@extends('layouts.app')

@section('title', 'BAVO SNACKVERSE')

@section('content')
    <div class="container">
        <section class="hero-banner">
            <img class="hero-image" src="{{ asset('assets/images/landscape.jpg') }}" alt="Aneka camilan renyah">
            <div class="hero-text">
                <p class="hero-small">SNACK TIME</p>
                <h1 class="hero-big">SNACKS</h1>
            </div>
            <a href="#produk" class="btn btn-outline-light rounded-pill px-4 hero-btn">Lihat Produk</a>
        </section>
    </div>

    <div class="container text-center section-gap" id="produk">
        <div id="brand-menu">
            <h2 class="section-title">MEREK SNACK</h2>
            <p class="section-sub">Jelajahi camilan dari merek favoritmu</p>

            <div class="row row-cols-2 row-cols-lg-4 g-3 mt-3 justify-content-center">
                @forelse ($brands as $brand)
                    @php($brandSnack = $brandSnacks->firstWhere('brand', $brand))
                    @php($brandLogos = [
                        'Chitato' => 'logo chitato.png',
                        "Lay's" => 'logo lays.jpg',
                        'Piattos' => 'logo piattos.jpg',
                        'Taro' => 'logo taro.webp',
                        'Qtela' => 'logo qtela.webp',
                        'Kusuka' => 'logo kusuka.jpg',
                    ])
                    @php($brandLogo = $brandLogos[$brand] ?? $brandSnack->image)
                    <div class="col">
                        <a href="{{ route('snacks.brand', ['brand' => Illuminate\Support\Str::slug($brand)]) }}" class="brand-card" aria-label="Buka halaman {{ $brand }}">
                            <img src="{{ asset('assets/images/' . rawurlencode($brandLogo)) }}" alt="Logo {{ $brand }}">
                            <span class="photo-label">{{ $brand }}</span>
                        </a>
                    </div>
                @empty
                    <div class="col-12">
                        <div class="alert alert-warning">Belum ada data merek. Jalankan <code>php artisan migrate --seed</code>.</div>
                    </div>
                @endforelse
            </div>
        </div>

        <div id="brand-variants">
            @if ($selectedBrand)
                <a href="{{ route('snacks.index') }}#produk" class="btn btn-outline-dark rounded-pill mb-3">
                    &larr; Semua Snack
                </a>
            @endif
            <h2 class="section-title">{{ $searchTerm ? 'HASIL PENCARIAN' : ($selectedBrand ?? 'SEMUA SNACK') }}</h2>
            <p class="section-sub">
                @if ($searchTerm)
                    Hasil untuk "{{ $searchTerm }}"
                    <a href="{{ route('snacks.index') }}#produk" class="ms-2">Hapus pencarian</a>
                @else
                    {{ $selectedBrand ? 'Pilih varian yang kamu suka' : 'Pilih camilan favoritmu' }}
                @endif
            </p>

            <div class="row row-cols-2 row-cols-lg-4 g-3 mt-3 justify-content-center">
                @forelse ($snacks as $snack)
                    <div class="col snack-item">
                        <div class="photo-card product-card">
                            <a href="{{ route('snacks.show', $snack) }}" class="stretched-link-wrap">
                                <img src="{{ asset('assets/images/' . $snack->image) }}" alt="{{ $snack->name }} {{ $snack->flavor }}">
                            </a>
                            <span class="badge-weight">{{ $snack->weight }} g</span>
                            <div class="product-info">
                            <span class="product-brand">{{ $snack->brand }}</span>
                                <a href="{{ route('snacks.show', $snack) }}" class="product-name">{{ $snack->name }}</a>
                                <small class="d-block product-flavor">{{ $snack->flavor }}</small>
                                <div class="d-flex justify-content-between align-items-center mt-2 gap-2">
                                    <span class="price-tag">Rp {{ number_format($snack->price, 0, ',', '.') }}</span>
                                    <a href="{{ route('snacks.show', $snack) }}" class="btn btn-light btn-sm fw-medium">Pilih</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-12">
                        <p class="alert alert-info">{{ $searchTerm ? 'Snack tidak ditemukan. Coba kata kunci lain.' : 'Belum ada data snack.' }}</p>
                    </div>
                @endforelse
            </div>
            <div class="d-flex justify-content-center mt-4">
                {{ $snacks->onEachSide(1)->links('pagination::bootstrap-5') }}
            </div>
        </div>
    </div>
@endsection
