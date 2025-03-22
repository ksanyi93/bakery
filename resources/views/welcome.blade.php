@extends('layouts.app')

@section('content')
<div class="container text-center">
    <h1 class="my-4">Üdv a Bakery Projektben!</h1>
    <div class="d-flex justify-content-center">
        <a href="{{ route('last-week-revenue') }}" class="btn btn-primary mx-2">Utolsó hét árbevétele</a>
        <a href="{{ route('special-products') }}" class="btn btn-secondary mx-2">Mentes termékek</a>
        <a href="{{ route('last-week-profit') }}" class="btn btn-success mx-2">Utolsó heti profit</a>
        <a href="{{ route('maximum-production') }}" class="btn btn-danger mx-2">Maximális lehetséges termelés</a>
        <a href="{{ route('order-specified-cakes') }}" class="btn btn-primary mx-2">Rendelés összegzése</a>
    </div>
</div>
@endsection