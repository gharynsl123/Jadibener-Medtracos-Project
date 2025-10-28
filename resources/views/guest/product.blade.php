@extends('layouts.welcome')

@section('content')
<style>
.sidebar {
    background-color: #fff;
    padding: 1rem;
    overflow-y: auto;
    position: sticky;
    top: 1rem;
    height: calc(100vh - 35px);
    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
    max-width: 300px;
    min-width: 300px;
}

.sidebar-header {
    background-color: #188552;
    color: white;
    font-weight: 700;
    padding: 8px 16px;
    border-radius: 5px;
    text-transform: uppercase !important;
    font-size: 1rem;
    margin-top: 1rem;
    margin-bottom: 0.5rem;
}


.nav-list {
    list-style: none;
    margin: 0;
    padding: 0;
}


.nav-list li {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 5px 16px;
    cursor: pointer;
    font-weight: 400;
    color: #000;
    font-size: 0.9rem;
}

.nav-list li:last-child {
    border-bottom: none;
}

.nav-list li.active a {
    font-weight: 700;
    color: #3c8c42 !important;
}

.nav-list li .chevron {
    font-size: 0.9rem;
    color: #000;
    transition: color 0.3s ease;
}

.nav-list li.active .chevron {
    color: #3c8c42 !important;
}

.nav-list li:hover {
    background-color: #f7f7f7;
}
</style>

<div class="d-flex flex-column flex-lg-row">
    <div>
        <div class="sidebar shadow-sm">
            <div class="sidebar-header">Produk Instalasi</div>
            <ul class="nav-list mt-0">
                <li class="{{ request()->is('our-product/ducting_udara') ? 'active' : '' }}">
                    <a href="{{ route('our-product.show', 'ducting_udara') }}" class="text-decoration-none"
                        style="color: #000000;">
                        Instalasi Ducting Udara
                        <span class="chevron">›</span>
                    </a>
                </li>
                <li class="{{ request()->is('our-product/central_gas') ? 'active' : '' }}">
                    <a href="{{ route('our-product.show', 'central_gas') }}" class="text-decoration-none"
                        style="color: #000000;">
                        Instalasi Central Gas
                        <span class="chevron">›</span>
                    </a>
                </li>
                <li class="{{ request()->is('our-product/fresh_air') ? 'active' : '' }}">
                    <a href="{{ route('our-product.show', 'fresh_air') }}" class="text-decoration-none"
                        style="color: #000000;">
                        Instalasi Fresh Air
                        <span class="chevron">›</span>
                    </a>
                </li>
                <li class="{{ request()->is('our-product/scaler') ? 'active' : '' }}">
                    <a href="{{ route('our-product.show', 'scaler') }}" class="text-decoration-none"
                        style="color: #000000;">
                        Scaler (Pengeras kapur)
                        <span class="chevron">›</span>
                    </a>
                </li>
                <li class="{{ request()->is('our-product/ro') ? 'active' : '' }}">
                    <a href="{{ route('our-product.show', 'ro') }}" class="text-decoration-none"
                        style="color: #000000;">
                        Reverses Osmosis
                        <span class="chevron">›</span>
                    </a>
                </li>
                <li class="{{ request()->is('our-product/boiler_air') ? 'active' : '' }}">
                    <a href="{{route('our-product.show', 'boiler_air')}}" class="text-decoration-none"
                        style="color: #000000;">
                        Mesin Boiler Pemanas air
                        <span class="chevron">›</span>
                    </a>
                </li>
                <li class="{{ request()->is('our-product/temperature-monitor') ? 'active' : '' }}">
                    <a href="{{route('our-product.show', 'temperature-monitor')}}" class="text-decoration-none"
                        style="color: #000000;">
                        Temperature Monitoring
                        <span class="chevron">›</span>
                    </a>
                </li>
                <li class="{{ request()->is('our-product/roda-trolley') ? 'active' : '' }}">
                    <a href="{{route('our-product.show', 'roda-trolley')}}" class="text-decoration-none"
                        style="color: #000000;">
                        Instalasi Roda Trolley
                        <span class="chevron">›</span>
                    </a>
                </li>
            </ul>
            <div class="sidebar-header">DETERGENT & TRETMENT</div>
            <ul class="nav-list mt-0">
                <li class="{{ request()->is('our-product/rinse-pro') ? 'active' : '' }}">
                    <a href="{{route('our-product.show', 'rinse-pro')}}" class="text-decoration-none"
                        style="color: #000000;">
                        Rinse Pro Dish Auto
                        <span class="chevron">›</span>
                    </a>
                </li>
                <li class="{{ request()->is('our-product/dish-cleaner') ? 'active' : '' }}">
                    <a href="{{route('our-product.show', 'dish-cleaner')}}" class="text-decoration-none"
                        style="color: #000000;">
                        Steri Dish Cleaner
                        <span class="chevron">›</span>
                    </a>
                </li>
                <li class="{{ request()->is('our-product/medic-plate') ? 'active' : '' }}">
                    <a href="{{route('our-product.show', 'medic-plate')}}" class="text-decoration-none"
                        style="color: #000000;">
                        Medic Plate Safe
                        <span class="chevron">›</span>
                    </a>
                </li>
                <li class="{{ request()->is('our-product/foam_cleaning') ? 'active' : '' }}">
                    <a href="{{route('our-product.show', 'foam_cleaning')}}" class="text-decoration-none"
                        style="color: #000000;">
                        Kitchen Cleaner Foam Spray
                        <span class="chevron">›</span>
                    </a>
                </li>
                <li class="{{ request()->is('our-product/enzyme-auto') ? 'active' : '' }}">
                    <a href="{{route('our-product.show', 'enzyme-auto')}}" class="text-decoration-none"
                        style="color: #000000;">
                        Enzyme Dish Auto
                        <span class="chevron">›</span>
                    </a>
                </li>
            </ul>
            <div class="sidebar-header">KONTRAK SERVICE KITCHEN</div>
            <ul class="nav-list mt-0">
                <li class="{{ request()->is('our-product/kontrak_kitchen') ? 'active' : '' }}">
                    <a href="{{route('our-product.show', 'kontrak_kitchen')}}" class="text-decoration-none"
                        style="color: #000000;">
                        Kontrak Service Kitchen
                        <span class="chevron">›</span>
                    </a>
                </li>
                <li class="{{ request()->is('our-product/jasa_service') ? 'active' : '' }}">
                    <a href="{{route('our-product.show', 'jasa_service')}}" class="text-decoration-none"
                        style="color: #000000;">
                        Jasa Service
                        <span class="chevron">›</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
    <div>
        <div class="p-4">
            <div class="d-flex flex-column flex-md-row align-items-center gap-4">
                <div>
                    <img src="{{ asset($product['image']) }}" alt="{{ $product['name'] }}"
                        class="img-fluid rounded shadow-sm"
                        style="min-height: 100px; min-width:350px; object-fit: contain; ">
                </div>
                <div>
                    <h2 class="fw-bold mb-2">{{ $product['name'] }}</h2>
                    <p class="my-4" style="text-align: justify; text-justify: inter-word;">{!! $product['description']
                        !!}
                    </p>

                    <a href="/kontak" class="btn btn-success px-4 py-2 rounded-pill">
                        Contact Us
                    </a>
                </div>
            </div>
            @if($product['additional_info'])
            @php
            $info = $product['additional_info'];
            @endphp
            <div class="mt-3 p-3 rounded bg-light border">
                <h5 class="fw-bold mb-2">{{ $info['judul'] }}</h5>

                <ul class="mb-2">
                    @foreach($info['poin'] as $poin)
                    <li>{{ $poin }}</li>
                    @endforeach
                </ul>

                <p class="mb-0 mt-3">
                    {!! $info['catatan'] !!}
                </p>
            </div>
            @else
            @endif
        </div>
    </div>

</div>
@endsection