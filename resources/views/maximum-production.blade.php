@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <a href="{{ route('welcome') }}" class="btn btn-light mb-3">
        <i class="bi bi-arrow-left"></i> Vissza
    </a>
    <div class="card">
        <div class="card-header">
            <h1 class="h3 mb-0">Maximális gyártható mennyiségek</h1>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>Termék</th>
                            <th class="text-end">Max. gyártható mennyiség (db)</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($maxProduction as $product => $quantity)
                            <tr>
                                <td>{{ $product }}</td>
                                <td class="text-end">{{ number_format($quantity, 0, ',', ' ') }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="3" class="text-center">Nincs elérhető termék információ</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection