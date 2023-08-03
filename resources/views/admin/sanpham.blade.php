@extends('admin/Templateadmin')

@section('content')

<div class="container-fluid">

    <!-- Page Heading -->

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Sản phẩm trong cửa hàng F TELECOM</h6>
        </div>
        <form action="{{ route('create_sanpham') }}" method="GET">
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
                        
                        @foreach ($sanphams as $sp)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td><img src="/asset/img/{{$sp->image}}" alt="" style="width:100px"></td>
                            <td>{{$sp->name}}</td>
                            <td>{{number_format($sp->unit_price)}} đ</td>
                            <td style="display: flexbox;">

                                <button style="border-radius: 30%;"><a href=""><i class="fa-sharp fa-regular fa-eye"></i></a></button>
                                <button style="border-radius: 30%;color: rgb(37, 122, 94);"><a href="{{ route('sanpham.edit', ['id' => $sp->id]) }}"><i class="fa-solid fa-pen"></i></a></button>
                                <button style="border-radius: 30%;background-color: rgb(224, 48, 48);"><a href="{{ route('delete_sanpham', ['id' => $sp->id]) }}"><i class="fa-solid fa-trash"></i></a> </button>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection