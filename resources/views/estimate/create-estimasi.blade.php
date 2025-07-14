@extends('layouts.main-view')
@section('content')
<div class="card shadow mb-3">
    <div class="card-header bg-info">
        <p class="m-0 text-white font-weight-bolder">KETERANGAN ALAT</p>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-borderless">
                <tr>
                    <th>Instansi</th>
                    <td>:</td>
                    <td>{{ $informationTools->instansi->name }}</td>
                    <th>Nama Product</th>
                    <td>:</td>
                    <td>{{$informationTools->poducts->name}}</td>
                </tr>
                <tr>
                    <th>Serial Number</th>
                    <td>:</td>
                    <td>{{ $informationTools->serial_number }}</td>
                    <th>Kode Product</th>
                    <td>:</td>
                    <td>{{ $informationTools->poducts->code }}</td>
                </tr>
                <tr>
                    <th>Merek</th>
                    <td>:</td>
                    <td>{{ $informationTools->brands->name }}</td>
                    <th>Instalasi</th>
                    <td>:</td>
                    <td>{{ $informationTools->installation }}</td>
                </tr>
                <tr>
                    <th>Status Alat</th>
                    <td>:</td>
                    <td>{{$informationTools->description}}</td>
                </tr>
            </table>
        </div>
    </div>
</div>
<div class="card shadow p-4 border-left-primary">
    <form action="{{url('/store-estimasi-biaya')}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <input name="id_instansi" value="{{$informationTools->instansi->id}}" hidden>
            <input name="equipment_id" value="{{$informationTools->id}}" hidden>
            <div class="form-group col-md-6" id="cate-group" style="display:none;">
                <label for="kategori-select">Kategori</label>
                <select name="category_id" id="kategori-select" class="form-control">
                    <option value="">Pilih</option>
                    @foreach($kategori as $item)
                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group col-md-6" id="part-group" style="display:none;">
                <label for="part-select">Part</label>
                <select name="parts_id" id="part-select" class="form-control">
                    <option value="">Pilih</option>
                </select>
            </div>
            <div class="form-group col-md-6">
                <label for="level">Harga</label>
                <input required type="number" name="price" class="form-control">
            </div>
            <div class="form-group col-md-6" id="quantity-group" style="display:none;">
                <label for="level">Quantity</label>
                <input  type="number" name="quantity" class="form-control">
            </div>
            <div class="form-group col-md-6">
                <label for="level">keterangan</label>
                <input required type="text" name="description" class="form-control">
            </div>
            <div class="form-group col-md-6">
                <label for="level">Upload surat penawaran harga</label>
                <input required type="file" name="photo" class="p-0 form-control">
                <small>file format : pdf, png, jpg, jpeg</small>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Tambahkan</button> <br>
        <input type="checkbox" class="mt-3" id="reqPart"> terdapat pergantian part
    </form>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const kategoriGroup = document.getElementById('cate-group');
    const kategoriSelect = document.getElementById('kategori-select');
    const partSelect = document.getElementById('part-select');
    const quantityGroup = document.getElementById('quantity-group');
    const pergantianPart = document.getElementById('reqPart');
    const formGroupInput = document.getElementById('part-group');
    const parts = @json($part); // Data part dari controller

    pergantianPart.addEventListener('change', function() {
        if (this.checked) {
            kategoriGroup.style.display = 'block';
            partSelect.style.display = 'block';
            quantityGroup.style.display = 'block';
            formGroupInput.style.display = 'block'; // Show part group
        } else {
            kategoriGroup.style.display = 'none';
            partSelect.style.display = 'none';
            quantityGroup.style.display = 'none';
            formGroupInput.style.display = 'none'; // Hide part group
        }
    });

    kategoriSelect.addEventListener('change', function() {
        const selectedCategoryId = kategoriSelect.value;

        partSelect.innerHTML = '<option value="">Pilih</option>';

        if (selectedCategoryId === '') {
            formGroupInput.style.display = 'none';
            return;
        } else {
            formGroupInput.style.display = 'block';
        }

        const filteredParts = parts.filter(part => part.id_kategori == selectedCategoryId);

        filteredParts.forEach(part => {
            const option = document.createElement('option');
            option.value = part.id;
            option.textContent = part.nama_part;
            partSelect.appendChild(option);
        });
    });
});
</script>
@endsection