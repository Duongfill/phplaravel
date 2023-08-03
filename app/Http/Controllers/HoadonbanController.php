<?php

namespace App\Http\Controllers;

use App\Models\bills_ban;
use App\Models\bill_detail_ban;
use Illuminate\Http\Request;

class HoadonbanController extends Controller
{
    public function danhsach_hoadon()
    {
        $hdb = bills_ban::all();
        return view('admin/hoadon_ban', ['hoadonban' => $hdb]);
    }

    public function showCreateHDBForm()
    {
        $hoadonban = bills_ban::all();
        $chitiethdb = bill_detail_ban::all();
        return view('admin.create_hoadon_ban', compact('hoadonban', 'chitiethdb'));
    }

    public function createBillBan(Request $request)
    {
        // Validate dữ liệu đầu vào
        $validatedData = $request->validate([
            'id_kh' => 'required',
            'date_order' => 'required|date',
            'tong_tien' => 'required|numeric',
            'payment' => 'required',
            'note' => 'nullable',
            'bill_details' => 'required|array',
            'bill_details.*.id_sp' => 'required',
            'bill_details.*.sl' => 'required|numeric',
        ]);

        // Tạo hoá đơn bán mới
        $billBan = new bills_ban();
        $billBan->id_kh = $validatedData['id_kh'];
        $billBan->date_order = $validatedData['date_order'];
        $billBan->tong_tien = $validatedData['tong_tien'];
        $billBan->payment = $validatedData['payment'];
        $billBan->note = $validatedData['note'];

        // Lưu hoá đơn bán vào cơ sở dữ liệu
        $billBan->save();

        // Lưu chi tiết hoá đơn
        foreach ($validatedData['bill_details'] as $billDetailData) {
            $billDetail = new bill_detail_ban();
            $billDetail->id_bill_ban = $billBan->id;
            $billDetail->id_sp = $billDetailData['id_sp'];
            $billDetail->sl = $billDetailData['sl'];
            $billDetail->save();
        }

        return redirect()->route('danhsach_hoadon')->with('success', 'Hoá đơn bán đã được thêm thành công.');
    }
    // public function createBillBan(Request $request)
    // {
    //     $billBanData = $request->except('bill_details');
    //     $billBan = bills_ban::create($billBanData);

    //     $billDetails = $request->input('bill_details');
    //     foreach ($billDetails as $billDetail) {
    //         bill_detail_ban::create([
    //             'id_bill_ban' => $billBan->id,
    //             'id_sp' => $billDetail['id_sp'],
    //             'sl' => $billDetail['sl'],
    //         ]);
    //     }

    //     return redirect()->route('danhsach_hoadon')->with('success', 'Hoá đơn bán đã được tạo thành công');
    // }
}
