@extends('layouts.welcome')

@section('content')
<style>
.sidebar {
    background-color: #fff;
    border-radius: 12px;
    padding: 1rem;
    overflow-y: auto;
    position: sticky;
    top: 1rem;
    height: calc(100vh - 35px);
    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
    max-width: 300px;
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

<div class="row">
    <div class="col-md-3 d-flex justify-content-center ">
        <div class="sidebar shadow-sm">
            <div class="sidebar-header">Produk Instalasi</div>
            <ul class="nav-list mt-0">
                <li class="{{ request()->is('our-product/ducting_udara') ? 'active' : '' }}">
                    <a href="{{ route('our-product.show', 'ducting_udara') }}" class="text-decoration-none" style="color: #000000;">
                        Instalasi Ducting Udara
                        <span class="chevron">›</span>
                    </a>
                </li>
                <li class="{{ request()->is('our-product/central_gas') ? 'active' : '' }}">
                    <a href="{{ route('our-product.show', 'central_gas') }}" class="text-decoration-none" style="color: #000000;">
                        Instalasi Central Gas
                        <span class="chevron">›</span>
                    </a>
                </li>
                <li class="{{ request()->is('our-product/fresh_air') ? 'active' : '' }}">
                    <a href="{{ route('our-product.show', 'fresh_air') }}" class="text-decoration-none" style="color: #000000;">
                        Instalasi Fresh Air
                        <span class="chevron">›</span>
                    </a>
                </li>
                <li class="{{ request()->is('our-product/scaler') ? 'active' : '' }}">
                    <a href="{{ route('our-product.show', 'scaler') }}" class="text-decoration-none" style="color: #000000;">
                        Scaler (Pengeras kapur)
                        <span class="chevron">›</span>
                    </a>
                </li>
                <li class="{{ request()->is('our-product/ro') ? 'active' : '' }}">
                    <a href="{{ route('our-product.show', 'ro') }}" class="text-decoration-none" style="color: #000000;">
                        Reverses Osmosis
                        <span class="chevron">›</span>
                    </a>
                </li>
                <li class="{{ request()->is('our-product/boiler_air') ? 'active' : '' }}">
                    <a href="{{route('our-product.show', 'boiler_air')}}" class="text-decoration-none" style="color: #000000;">
                        Mesin Boiler Pemanas air
                        <span class="chevron">›</span>
                    </a>
                </li>
            </ul>
            <div class="sidebar-header">DETERGENT & TRETMENT</div>
            <ul class="nav-list mt-0">
                <a href="#" class="text-decoration-none">
                    <li class="">
                        Detergent Riswasher (Auto)
                        <span class="chevron">›</span>
                    </li>
                </a>
                <a href="#" class="text-decoration-none">
                    <li>
                        Detergent Rins Aid (Auto)
                        <span class="chevron">›</span>
                    </li>
                </a>
                <a href="#" class="text-decoration-none">
                    <li>
                        Detergent Cuci Piring (Manual)
                        <span class="chevron">›</span>
                    </li>
                </a>
                <a href="#" class="text-decoration-none">
                    <li>
                        Disinfestan Kitchen (Manual)
                        <span class="chevron">›</span>
                    </li>
                </a>
                <a href="#" class="text-decoration-none">
                    <li>
                        Foam Cleaning Spray
                        <span class="chevron">›</span>
                    </li>
                </a>
            </ul>
            <div class="sidebar-header">KONTRAK SERVICE KITCHEN</div>
            <ul class="nav-list mt-0">
                <a href="#" class="text-decoration-none">
                    <li class="">
                        Kontrak Service Kitchen
                        <span class="chevron">›</span>
                    </li>
                </a>
                <a href="#" class="text-decoration-none">
                    <li>
                        Jasa Service
                        <span class="chevron">›</span>
                    </li>
                </a>
            </ul>
        </div>
    </div>
    <div class="col-md-9">
        @if(!empty($product))
            <div class="container py-5">
                <div class="row align-items-center">
                    <div class="col-md-5 text-center">
                        <img src="{{ $product['image'] }}" 
                            alt="{{ $product['name'] }}" 
                            class="img-fluid rounded shadow-sm">
                    </div>
                    <div class="col-md-7">
                        <h2 class="fw-bold mb-2">{{ $product['name'] }}</h2>
                        <p class="text-muted fw-semibold mb-3">{{ $product['code'] }}</p>
                        <p class="mb-4">{{ $product['description'] }}</p>

                        <a href="/contact" class="btn btn-success px-4 py-2 rounded-pill">
                            Contact Us
                        </a>
                    </div>
                </div>
            </div>
        @else
            <div class="d-flex justify-content-center align-items-center py-5">
                <h3 class="text-muted">This is our product</h3>
            </div>
        @endif
    </div>

</div>
@endsection