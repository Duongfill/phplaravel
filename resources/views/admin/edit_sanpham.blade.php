@extends('admin/Templateadmin')
@section('content')

<div class="container">
    <h1>Sửa sản phẩm</h1>
    <form action="{{ route('sanpham.update', ['id' => $sanpham->id]) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="image">Ảnh:</label>
            
            <input type="file" name="image" id="image" class="form-control-file">
            <img src="/asset/img/{{ $sanpham->image }}" id="image-preview" alt="Preview" style="max-width: 200px; margin-top: 10px;">
        </div>

        <div class="form-group">
            <label for="name">Tên sản phẩm:</label>
            <input type="text" name="name" id="name" value="{{ $sanpham->name }}" class="form-control">
        </div>

        <div class="form-group">
            <label for="unit_price">Đơn giá:</label>
            <input type="text" name="unit_price" id="unit_price" value="{{ $sanpham->unit_price }}" class="form-control">
        </div>

        <div class="form-group">
            <label for="id_loai_sp">Mã loại sản phẩm:</label>
            <select name="id_loai_sp" id="id_loai_sp" class="form-control">
                @foreach ($listLoaiSanPham as $loaiSanPham)
                <option value="{{ $loaiSanPham->id }}" {{ $loaiSanPham->id == $sanpham->id_loai_sp ? 'selected' : '' }}>
                    {{ $loaiSanPham->hangdienthoai }}
                </option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="id_ncc">Nhà cung cấp:</label>
            <select name="id_ncc" id="id_ncc" class="form-control">
                @foreach ($listnhacungcap as $nhacungcap)
                <option value="{{ $nhacungcap->id }}" {{ $nhacungcap->id == $sanpham->id_ncc ? 'selected' : '' }}>
                    {{ $nhacungcap->ten_ncc }}
                </option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="mota_sp">Mô tả:</label>
            <textarea name="mota_sp" id="mota_sp" class="form-control">{{ $sanpham->mota_sp }}</textarea>
        </div>

        <div class="form-group">
            <label for="phan_khuc">Phân khúc:</label>
            <input type="text" name="phan_khuc" id="phan_khuc" class="form-control" value="{{ $sanpham->phan_khuc}}">
        </div>
        <button type="submit" class="btn btn-primary">Lưu</button>
    </form>
</div>
<script>
    document.getElementById('image').addEventListener('change', function(event) {
        var input = event.target;
        var reader = new FileReader();

        reader.onload = function() {
            var dataURL = reader.result;
            var imagePreview = document.getElementById('image-preview');
            imagePreview.src = dataURL;
        };

        reader.readAsDataURL(input.files[0]);
    });
</script>
@endsection