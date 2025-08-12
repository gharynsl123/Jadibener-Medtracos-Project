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
<div class="p-4">
    <div class="row">
        <!-- Sidebar -->
        <div class="col-12 col-lg-3 mb-3">
            <div class="sidebar shadow-sm border border-1 rounded-4 overflow-hidden sticky-top bg-white">
                <!-- Header -->
                <div class="bg-light p-3 fw-bold">List Kategori</div>

                <!-- List -->
                <ul class="list-unstyled mb-0">
                    @foreach ($mainCategories as $kategori)
                        @php
                            $collapseId = 'collapse-' . Str::slug($kategori);
                            $isActive = request('search') == $kategori;
                        @endphp

                        <li class="">
                            <a class="filters-list text-decoration-none d-flex justify-content-between align-items-center px-3 py-2 
                                    {{ $isActive ? 'text-success fw-semibold' : 'text-dark' }}"
                            data-bs-toggle="collapse" 
                            href="#{{ $collapseId }}" 
                            role="button" 
                            aria-expanded="false" 
                            aria-controls="{{ $collapseId }}">
                                {{ $kategori }}
                                <span class="bi bi-chevron-right small"></span>
                            </a>

                            <div class="collapse ps-3" id="{{ $collapseId }}">
                                <ul class="list-unstyled mb-0">
                                    @foreach ($subCategories[$kategori] as $subKategori)
                                        <li>
                                            <a class="filters-list text-decoration-none d-flex justify-content-between align-items-center px-3 py-2 text-dark"
                                            href="{{ url()->current() . '?search=' . urlencode($subKategori) }}">
                                                {{ $subKategori }}
                                                <span class="bi bi-chevron-right small"></span>
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>

        <!-- Konten Kanan -->
        <div class="col-12 col-lg-9">
            <!-- Form Search -->
            <form method="GET" action="{{ url()->current() }}" class="mb-3">
                <div class="input-group">
                    <input type="text" name="search" class="form-control" placeholder="Cari spare part..." value="{{ request('search') }}">
                    <button class="btn btn-primary" type="submit">Cari</button>
                </div>
            </form>

            <!-- Clear Search -->
            @if(request('search'))
                <div class="d-flex align-items-center mb-3">
                    <a href="{{ url()->current() }}" class="btn btn-secondary btn-sm me-2">
                        <span class="bi bi-x-circle"></span> Clear Search
                    </a>
                </div>
            @endif

            <!-- Pagination -->
            <div class="d-flex justify-content-end align-items-center mb-2">
                <!-- Tombol Prev -->
                @if($currentPage > 1)
                    <a href="{{ request()->fullUrlWithQuery(['page' => $currentPage - 1]) }}" 
                    class="text-success me-2">
                        <i class="bi bi-chevron-left"></i>
                    </a>
                @else
                    <span class="text-muted me-2"><i class="bi bi-chevron-left"></i></span>
                @endif

                <!-- Info halaman -->
                <span class="text-success fw-medium">{{ $currentPage }}/{{ $totalPages }}</span>

                <!-- Tombol Next -->
                @if($currentPage < $totalPages)
                    <a href="{{ request()->fullUrlWithQuery(['page' => $currentPage + 1]) }}" 
                    class="text-success ms-2">
                        <i class="bi bi-chevron-right"></i>
                    </a>
                @else
                    <span class="text-muted ms-2"><i class="bi bi-chevron-right"></i></span>
                @endif
            </div>

            <!-- List Kategori & Item -->
            <div class="row g-3">
                @foreach ($groupedParts as $kategori => $items)
                    <div class="col-12 col-md-6">
                        <div class="bg-light fw-semibold px-3 py-2 rounded-top">{{ $kategori }}</div>
                        <ul class="list-group list-group-flush border rounded-bottom">
                            @foreach ($items as $item)
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    <a href="{{ url('/spare-part', $item->name) }}" class="text-decoration-none text-dark">
                                        {{ $item->name }}
                                    </a>
                                    <i class="bi bi-arrow-up-right"></i>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                @endforeach
            </div>
        </div>

    </div>
</div>
@endsection