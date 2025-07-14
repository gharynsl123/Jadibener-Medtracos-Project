@extends('layouts.welcome')

@section('content')
<style>
.sidebar {
    background-color: #FFFFFFFF;
    border-radius: 12px;
    padding: 1rem;
    overflow-y: auto;
    position: sticky;
    top: 1rem;
    height: calc(100vh - 35px);
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
            <div class="sidebar shadow-sm">
                <h5 class="fw-bold">List Kategori</h5>
                <ul class="nav flex-column">
                    @foreach ($mainCategories as $kategori)
                        @php
                            $collapseId = 'collapse-' . Str::slug($kategori);
                        @endphp
                        <li class="nav-item">
                            <a class="filters-list text-decoration-none d-flex justify-content-between align-items-center" 
                                data-bs-toggle="collapse" 
                                href="#{{ $collapseId }}" 
                                role="button" 
                                aria-expanded="false" 
                                aria-controls="{{ $collapseId }}">
                                {{ $kategori }}
                                <span class="bi bi-chevron-down small"></span>
                            </a>
                            <div class="collapse ps-3" id="{{ $collapseId }}">
                                <ul class="nav flex-column">
                                    @foreach ($subCategories[$kategori] as $subKategori)
                                        <li class="nav-item">
                                            <a class="filters-list text-decoration-none" href="{{ url()->current() . '?search=' . urlencode($subKategori) }}">
                                                {{ $subKategori }}
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
            <form method="GET" action="{{ url()->current() }}" class="mb-3">
                
                <div class="input-group">
                    <input type="text" name="search" class="form-control" placeholder="Cari spare part..." value="{{ request('search') }}">
                    <button class="btn btn-primary" type="submit">Cari</button>
                </div>
            </form>
            @if(request('search'))
                <div class="d-flex align-items-center">
                    <!-- button clear search -->
                    <a href="{{ url()->current() }}" class="btn btn-secondary btn-sm me-2">
                        <span class="bi bi-x-circle"></span>
                        Clear Search
                    </a>
                </div>
            @endif

            @foreach ($groupedParts as $kategori => $items)
            <h5 class="category-title">{{$kategori}}</h5>
            <div class="row g-3">
                @foreach ($items as $item)
                <div class="col-12 col-md-6 col-lg-6">
                    <a href="{{url('/spare-part', $item->name)}}" class="text-decoration-none text-black gallery-item d-flex p-2">
                        <img src="" alt="gambar" class="img-fluid rounded" style="background-color:  #656565FF; object-fit: cover; min-height: 120px; min-width: 120px; max-width: 120px;">
                        <div class="ms-2">
                            <p class="fw-medium mb-0">
                                {{ $item->name }} ({{ $item->code }})
                            </p>
                            <p class="mb-0">Rp {{ number_format($item->price, 0, ',', '.') }}</p>
                            <p class="mb-0">stock : {{$item->stock ?? '0'}}</p>
                        </div>
                    </a>
                </div>
                @endforeach
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection