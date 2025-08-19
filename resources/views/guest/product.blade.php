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
    border-bottom: 1px solid #eee;
    font-weight: 400;
    color: #000;
    font-size: 0.9rem;
}

.nav-list li:last-child {
    border-bottom: none;
}

.nav-list li.active {
    font-weight: 700;
    color: #3c8c42;
}

.nav-list li .chevron {
    font-size: 0.9rem;
    color: #000;
    transition: color 0.3s ease;
}

.nav-list li.active .chevron {
    color: #3c8c42;
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
                <a href="#" class="text-decoration-none">
                    <li class="{{ request()->is('intalsi-ducting') ? 'active' : '' }}">
                        Instalasi Ducting Udara
                        <span class="chevron">›</span>
                    </li>
                </a>
                <a href="#" class="text-decoration-none">
                    <li>
                        Instalasi Central Gas
                        <span class="chevron">›</span>
                    </li>
                </a>
                <a href="#" class="text-decoration-none">
                    <li>
                        Instalasi Fresh Air
                        <span class="chevron">›</span>
                    </li>
                </a>
                <a href="#" class="text-decoration-none">
                    <li>
                        Scaler (Pengeras kapur)
                        <span class="chevron">›</span>
                    </li>
                </a>
                <a href="#" class="text-decoration-none">
                    <li>
                        Reverses Osmosis
                        <span class="chevron">›</span>
                    </li>
                </a>
                <a href="#" class="text-decoration-none">
                    <li>
                        Mesin Boiler Pemanas air
                        <span class="chevron">›</span>
                    </li>
                </a>
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
        <div class="container py-4">
            <div class="d-flex  align-item-center">
                <img src="{{asset('images/header-new-second-background.jpg')}}" alt="IMG Product" width="300px"
                    class="image-fuild">

                <div class="ms-4">
                    <h3>title</h3>
                    <p class="fw-bold">code</p>
                    <p>Description</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection