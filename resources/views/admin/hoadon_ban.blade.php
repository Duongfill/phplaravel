@extends('admin/Templateadmin')
@section('content')

<div class="container-fluid">

    <!-- Page Heading -->

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Hoá đơn bán trong cửa hàng F TELECOM</h6>
        </div>
        <form action="{{ route('create_bill_ban') }}" method="GET">
            @csrf
            <button type="submit" class="btn btn-primary">Thêm sản phẩm</button>
        </form>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>STT</th>
                            <th>Ảnh minh hoạ</th>
                            <th>Tên sản phẩm</th>
                            <th>Giá</th>
                            <th>Chức năng</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($hoadonban as $hdb)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $hdb->id_kh }}</td>
                            <td>{{ $hdb->date_order }}</td>
                            <td>{{ $hdb->tong_tien }}</td>
                            <td>{{ $hdb->payment }}</td>
                            
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection