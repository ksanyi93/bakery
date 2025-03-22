@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <a href="{{ route('welcome') }}" class="btn btn-light mb-3">
        <i class="bi bi-arrow-left"></i> Vissza
    </a>
    <div class="card">
        <div class="card-header">
            <h1 class="h3 mb-0">Utolsó hét árbevétele</h1>
        </div>
        <div class="card-body">
            <p class="display-4 text-center">{{ $formattedRevenue }} Ft</p>
        </div>
    </div>
</div>
@endsection