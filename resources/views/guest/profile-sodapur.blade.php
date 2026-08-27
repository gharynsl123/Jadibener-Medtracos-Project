@extends('layouts.welcome')

@section('content')
<style>
    .sidebar {
        height: 100vh;
        position: sticky;
    }
    .sidebar a {
        font-size: 15px;
        transition: background-color 0.2s ease;
    }
    .sidebar a:hover {
        background-color: #f8f9fa;
    }
    .sidebar .bi {
        font-size: 14px;
    }

    .gallery-item {
        background-color: #ffffff;
        border-radius: 10px;
        min-height: 120px;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    }

    .category-title {
        font-weight: bold;
        margin: 2rem 0 1rem;
    }

    .filters-list {
        cursor: pointer;
        font-weight: 500;
        color: #333;
    }
    .filters-list:hover {
        color: #0d6efd;
    }
    .collapse .filters-list {
        font-weight: normal;
        font-size: 0.95rem;
    }

    .list-group-item {
        padding: 8px 12px;
        border-color: #ffffff;
    }
    .list-group-item:hover {
        background-color: #f8f9fa;
    }
    .bg-light {
        background-color: #f5f5f5 !important;
    }


    /* if median is not in desktop/laptop mode */
    @media (max-width: 991px) {
        .sidebar {
            position: static;
            height: auto;
        }
    }
</style>
<div id="carousel" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img src="{{ asset('images/sodapur-banner.png') }}" class="d-block w-100" alt="Sodapur Banner">
        </div>
    </div>
</div>
@endsection