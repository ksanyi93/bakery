@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <a href="{{ route('welcome') }}" class="btn btn-light mb-3">
                <i class="bi bi-arrow-left"></i> Vissza
            </a>
            <div class="card">
                <div class="card-header">Rendelés összegzése</div>
                <div class="card-body">
                    <div class="table-responsive mt-3">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Terméke neve (db)</th>
                                    <th>Alapanyag költsége</th>
                                    <th>Profit</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($data['results'] as $item)
                                <tr>
                                    <td>{{ $item['product_name'] }}</td>
                                    <td>{{ number_format($item['total_ingredient_cost'], 0, ',', ' ') }} Ft</td>
                                    <td>{{ number_format($item['profit'], 0, ',', ' ') }} Ft</td>
                                </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr class="table-secondary">
                                    <th>Összesen</th>
                                    <th>{{ number_format($data['total_ingredient_cost'], 0, ',', ' ') }} Ft</th>
                                    <th>{{ number_format($data['total_profit'], 0, ',', ' ') }} Ft</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection