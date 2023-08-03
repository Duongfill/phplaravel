@extends('admin/Templateadmin')
@section('content')
<div class="container">
    <h1>Tạo hoá đơn bán</h1>
    <form action="{{ route('create_bill_ban') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="id_kh">Mã khách hàng:</label>
            <input type="text" name="id_kh" id="id_kh" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="date_order">Ngày đặt hàng:</label>
            <input type="date" name="date_order" id="date_order" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="tong_tien">Tổng tiền:</label>
            <input type="number" name="tong_tien" id="tong_tien" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="payment">Phương thức thanh toán:</label>
            <input type="text" name="payment" id="payment" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="note">Ghi chú:</label>
            <input type="text" name="note" id="note" class="form-control">
        </div>

        <h2>Chi tiết hoá đơn</h2>
        <div id="bill_details">
            <div class="bill_detail">
                <div class="form-group">
                    <label for="id_sp">Mã sản phẩm:</label>
                    <input type="text" name="bill_details[0][id_sp]" class="form-control" required>
                </div>

                <div class="form-group">
                    <label for="sl">Số lượng:</label>
                    <input type="number" name="bill_details[0][sl]" class="form-control" required>
                </div>
            </div>
        </div>

        <button type="button" id="add_bill_detail" class="btn btn-primary">Thêm chi tiết</button>

        <button type="submit" class="btn btn-primary">Thêm hoá đơn bán</button>
    </form>
</div>

<script>
    // Script để thêm mới các trường chi tiết hoá đơn
    let billDetailCount = 1;
    const addBillDetailButton = document.getElementById('add_bill_detail');
    const billDetailsContainer = document.getElementById('bill_details');

    addBillDetailButton.addEventListener('click', () => {
        const billDetail = document.createElement('div');
        billDetail.className = 'bill_detail';

        const html = `
            <div class="form-group">
                <label for="id_sp">Mã sản phẩm:</label>
                <input type="text" name="bill_details[${billDetailCount}][id_sp]" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="sl">Số lượng:</label>
                <input type="number" name="bill_details[${billDetailCount}][sl]" class="form-control" required>
            </div>
        `;

        billDetail.innerHTML = html;
        billDetailsContainer.appendChild(billDetail);

        billDetailCount++;
    });
</script>
@endsection