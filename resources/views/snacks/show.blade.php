@extends('layouts.app')

@section('title', $snack->name)

@section('content')
    <div class="container mt-4">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('snacks.index') }}">Daftar Produk</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ $snack->name }}</li>
            </ol>
        </nav>

        <div class="card shadow-sm">
            <div class="row g-0">
                <div class="col-md-5">
                    <img src="{{ asset('assets/images/' . $snack->image) }}" class="img-fluid rounded-start w-100"
                        alt="{{ $snack->name }}">
                </div>
                <div class="col-md-7">
                    <div class="card-body p-4">
                        <h1 class="h3 fw-bold">{{ $snack->name }}</h1>
                        <p class="fs-4 fw-bold text-success">Rp {{ number_format($snack->price, 0, ',', '.') }}</p>

                        <table class="table table-sm w-auto">
                            <tbody>
                                @if ($snack->brand)
                                    <tr>
                                        <th class="pe-4">Merek</th>
                                        <td>{{ $snack->brand }}</td>
                                    </tr>
                                @endif
                                <tr>
                                    <th class="pe-4">Rasa</th>
                                    <td>{{ $snack->flavor }}</td>
                                </tr>
                                <tr>
                                    <th class="pe-4">Berat</th>
                                    <td>{{ $snack->weight }} gram</td>
                                </tr>
                            </tbody>
                        </table>

                        <h2 class="h6 fw-bold mt-3">Deskripsi</h2>
                        <p>{{ $snack->description }}</p>

                        <a href="{{ route('snacks.index') }}" class="btn btn-secondary">&larr; Kembali</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
