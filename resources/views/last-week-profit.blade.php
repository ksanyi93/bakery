@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <a href="{{ route('welcome') }}" class="btn btn-light mb-3">
            <i class="bi bi-arrow-left"></i> Vissza
        </a>
        <div class="card">
            <div class="card-header">
                <h1 class="h3 mb-0">Utolsó heti profit</h1>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-4">
                        <div class="card bg-light mb-3">
                            <div class="card-header">Bevétel</div>
                            <div class="card-body">
                                <h5 class="card-title text-success">{{ $formattedRevenue }} Ft</h5>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card bg-light mb-3">
                            <div class="card-header">Alapanyag költség</div>
                            <div class="card-body">
                                <h5 class="card-title text-danger">{{ $formattedCost }} Ft</h5>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card bg-light mb-3">
                            <div class="card-header">Profit</div>
                            <div class="card-body">
                                <h5 class="card-title {{ $profit > 0 ? 'text-success' : 'text-danger' }}">{{ $formattedProfit }} Ft</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection