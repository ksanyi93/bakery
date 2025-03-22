@extends('layouts.app')

@section('content')
<div class="container">
    <a href="{{ route('welcome') }}" class="btn btn-light mb-3">
        <i class="bi bi-arrow-left"></i> Vissza
    </a>
    <h1>Mentes termékek</h1>
    <div class="row mt-4">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">Gluténmentes termékek</div>
                <div class="card-body">
                    <ul class="list-group">
                        @forelse($glutenFree as $product)
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                {{ $product->name }}
                                <span class="badge bg-primary">{{ number_format($product->price, 0, ',', ' ') }} Ft</span>
                            </li>
                        @empty
                            <li class="list-group-item">Nincs gluténmentes termék</li>
                        @endforelse
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">Laktózmentes termékek</div>
                <div class="card-body">
                    <ul class="list-group">
                        @forelse($lactoseFree as $product)
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                {{ $product->name }}
                                <span class="badge bg-primary">{{ number_format($product->price, 0, ',', ' ') }} Ft</span>
                            </li>
                        @empty
                            <li class="list-group-item">Nincs laktózmentes termék</li>
                        @endforelse
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">Glutén- és laktózmentes termékek</div>
                <div class="card-body">
                    <ul class="list-group">
                        @forelse($bothFree as $product)
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                {{ $product->name }}
                                <span class="badge bg-primary">{{ number_format($product->price, 0, ',', ' ') }} Ft</span>
                            </li>
                        @empty
                            <li class="list-group-item">Nincs glutén- és laktózmentes termék</li>
                        @endforelse
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection