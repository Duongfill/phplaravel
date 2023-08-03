<?php

namespace App\Http\Controllers;

use App\Models\san_pham;
use App\Models\loai_sp;
use App\Models\nha_cung_cap;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function sanphamadmin()
    {
        $ds = san_pham::all();
        return view('admin/sanpham', ['sanphams' => $ds]);
    }
    public function timKiemSanPham(Request $request)
    {
        $keyword = $request->input('keyword');
    
        $query = san_pham::query();
    
        if ($keyword) {
            $query->where('name', 'like', '%' . $keyword . '%')
                ->orWhere('unit_price', 'like', '%' . $keyword . '%');
        }
    
        $sanPhams = $query->get();
    
        // Trả về kết quả tìm kiếm dưới dạng HTML
        return view('admin/search_sanpham', compact('sanPhams'))->render();
    }

    public function editSanPham($id)
    {
        $sanpham = san_pham::find($id);
        $hangSanPham = $sanpham->id_loai_sp; // Lấy thông tin về hãng sản phẩm của sản phẩm hiện tại
        $listLoaiSanPham = loai_sp::all();
        $listncc = $sanpham->id_ncc;
        $listnhacungcap = nha_cung_cap::all();
        return view('admin.edit_sanpham', compact('sanpham', 'listLoaiSanPham', 'listnhacungcap'));
    }
    public function deleteSanPham($id)
    {
        $sanpham = san_pham::findOrFail($id);

        // Xoá tệp ảnh liên quan (nếu có)
        // if (!empty($sanpham->image)) {
        //     Storage::disk('public')->delete($sanpham->image);
        // }

        $sanpham->delete();

        return redirect()->route('sanpham_admin')->with('success', 'Sản phẩm đã được xoá thành công.');
    }
    public function updateSanPham(Request $request, $id)
    {
        $sanpham = san_pham::findOrFail($id);


        $sanpham->name = $request->input('name');
        $sanpham->id_loai_sp = $request->input('id_loai_sp');
        $sanpham->id_ncc = $request->input('id_ncc');
        $sanpham->mota_sp = $request->input('mota_sp');

        $sanpham->unit_price = $request->input('unit_price');
        $sanpham->phan_khuc = $request->input('phan_khuc');

        // Xử lý tệp ảnh nếu được gửi lên
        if ($request->hasFile('image')) {
            // Lưu tệp ảnh vào thư mục và cập nhật đường dẫn trong cơ sở dữ liệu
            $image = $request->file('image');
            $imagePath = $image->store('images', 'public');
            $sanpham->image = $imagePath;
        }

        $sanpham->save();

        return redirect()->route('sanpham_admin')->with('success', 'Sản phẩm đã được cập nhật thành công.');
    }
    public function showCreateSanPhamForm()
    {
        $listnhacungcap = nha_cung_cap::all();
        $listLoaiSanPham = loai_sp::all();
        return view('admin.create_sanpham', compact('listLoaiSanPham', 'listnhacungcap'));
    }
    public function createSanPham(Request $request)
    {
        // Validate dữ liệu đầu vào
        $validatedData = $request->validate([
            'name' => 'required',
            'id_loai_sp' => 'required',
            'id_ncc' => 'required',
            'mota_sp' => 'required',
            'unit_price' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            // Các trường dữ liệu khác cần được validate
        ]);

        
        // Xử lý tệp ảnh
        $image = $request->file('image');
        $imagePath = $image->store('images', 'public');

        // Tạo sản phẩm mới
        $sanpham = new san_pham();
        $sanpham->name = $validatedData['name'];
        $sanpham->id_loai_sp = $validatedData['id_loai_sp'];
        $sanpham->id_ncc = $validatedData['id_ncc'];
        $sanpham->mota_sp = $validatedData['mota_sp'];
        $sanpham->unit_price = $validatedData['unit_price'];
        $sanpham->image = $imagePath;
        // Các trường dữ liệu khác

        // Lưu sản phẩm vào cơ sở dữ liệu
        $sanpham->save();

        return redirect()->route('sanpham_admin')->with('success', 'Sản phẩm đã được thêm thành công.');
    }
}
