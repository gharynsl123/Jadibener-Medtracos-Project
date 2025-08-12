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
    box-shadow: 0 2px 8px rgba(0,0,0,0.1);
    max-width: 300px;
}

.sidebar-header {
    background-color: #188552; 
    color: white;
    font-weight: 700;
    padding: 8px 16px;
    border-radius: 5px ;
    font-size: 1.1rem;
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
    font-size: 1rem;
}

.nav-list li:last-child {
    border-bottom: none;
}

.nav-list li.active {
    font-weight: 700;
    color: #3c8c42;
}

.nav-list li .chevron {
    font-size: 1rem;
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

<div class="sidebar shadow-sm">
    <div class="sidebar-header">Produk Instalasi</div>
    <ul class="nav-list mt-0">
        <li class="active">
            Kompor Masak
            <span class="chevron">›</span>
        </li>
        <li>
            Kompor Oven
            <span class="chevron">›</span>
        </li>
        <li>
            Kompor Streamer
            <span class="chevron">›</span>
        </li>
        <li>
            Kulkas/Pendingin
            <span class="chevron">›</span>
        </li>
        <li>
            Trolley Pemanas
            <span class="chevron">›</span>
        </li>
        <li>
            Kitchen Hood
            <span class="chevron">›</span>
        </li>
    </ul>
    <div class="sidebar-header">Produk Instalasi</div>
    <ul class="nav-list mt-0">
        <li class="active">
            Kompor Masak
            <span class="chevron">›</span>
        </li>
        <li>
            Kompor Oven
            <span class="chevron">›</span>
        </li>
        <li>
            Kompor Streamer
            <span class="chevron">›</span>
        </li>
        <li>
            Kulkas/Pendingin
            <span class="chevron">›</span>
        </li>
        <li>
            Trolley Pemanas
            <span class="chevron">›</span>
        </li>
        <li>
            Kitchen Hood
            <span class="chevron">›</span>
        </li>
    </ul>
    <div class="sidebar-header">Produk Instalasi</div>
    <ul class="nav-list mt-0">
        <li class="active">
            Kompor Masak
            <span class="chevron">›</span>
        </li>
        <li>
            Kompor Oven
            <span class="chevron">›</span>
        </li>
        <li>
            Kompor Streamer
            <span class="chevron">›</span>
        </li>
        <li>
            Kulkas/Pendingin
            <span class="chevron">›</span>
        </li>
        <li>
            Trolley Pemanas
            <span class="chevron">›</span>
        </li>
        <li>
            Kitchen Hood
            <span class="chevron">›</span>
        </li>
    </ul>
</div>
@endsection
