@extends('admin/Templateadmin')
@section('content')
<div class="container">
    <h1>Thêm sản phẩm</h1>
    <form action="{{ route('create_sanpham') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="name">Tên sản phẩm:</label>
            <input type="text" name="name" id="name" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="id_loai_sp">Mã loại sản phẩm:</label>
            <select name="id_loai_sp" id="id_loai_sp" class="form-control" required>
                <option value="">Chọn loại sản phẩm</option>
                @foreach ($listLoaiSanPham as $loaiSanPham)
                <option value="{{ $loaiSanPham->id }}">
                    {{ $loaiSanPham->hangdienthoai }}
                </option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="id_ncc">Nhà cung cấp:</label>
            <select name="id_ncc" id="id_ncc" class="form-control" required>
                <option value="">Chọn nhà cung cấp</option>
                @foreach ($listnhacungcap as $nhaCungCap)
                <option value="{{ $nhaCungCap->id }}">{{ $nhaCungCap->ten_ncc }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="mota_sp">Mô tả sản phẩm:</label>
            <textarea name="mota_sp" id="mota_sp" class="form-control" required></textarea>
            
        </div>

        <div class="form-group">
            <label for="unit_price">Đơn giá:</label>
            <input type="number" name="unit_price" id="unit_price" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="image">Ảnh:</label>
            <input type="file" name="image" id="image" class="form-control-file" required>
        </div>

        <!-- Các trường dữ liệu khác -->

        <button type="submit" class="btn btn-primary">Thêm sản phẩm</button>
    </form>
</div>
@endsection