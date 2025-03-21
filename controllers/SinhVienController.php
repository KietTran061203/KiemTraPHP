<?php
require_once 'models/SinhVien.php';

class SinhVienController
{
    public function index()
    {
        $students = SinhVien::all();
        require 'views/sinhvien/index.php';
    }

   public function create()
{
    global $conn;

    // Lấy danh sách ngành học từ cơ sở dữ liệu
    $stmt = $conn->prepare("SELECT * FROM nganhhoc");
    $stmt->execute();
    $majors = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Xử lý dữ liệu form
        $maSV = $_POST['MaSV'];
        $hoTen = $_POST['HoTen'];
        $gioiTinh = $_POST['GioiTinh'];
        $ngaySinh = $_POST['NgaySinh'];
        $maNganh = $_POST['MaNganh'];
        $hinh = null;

        // Xử lý file hình ảnh
        if (!empty($_FILES['Hinh']['name'])) {
            $hinh = 'uploads/' . basename($_FILES['Hinh']['name']);
            move_uploaded_file($_FILES['Hinh']['tmp_name'], $hinh);
        }

        // Gọi hàm tạo sinh viên mới
        SinhVien::create([
            'MaSV' => $maSV,
            'HoTen' => $hoTen,
            'GioiTinh' => $gioiTinh,
            'NgaySinh' => $ngaySinh,
            'Hinh' => $hinh,
            'MaNganh' => $maNganh
        ]);

        // Điều hướng về trang danh sách
        header('Location: index.php');
        exit;
    }

    // Truyền danh sách ngành học xuống view
    require 'views/sinhvien/create.php';
}




    public function edit($id)
{
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Lấy dữ liệu từ form
        $data = [
            'MaSV' => $_POST['MaSV'],
            'HoTen' => $_POST['HoTen'],
            'GioiTinh' => $_POST['GioiTinh'],
            'NgaySinh' => $_POST['NgaySinh'],
            'Hinh' => $_POST['Hinh'],
            'MaNganh' => $_POST['MaNganh'],
        ];

        // Cập nhật sinh viên
        SinhVien::update($id, $data);
        header('Location: index.php');
        exit;
    }

    // Lấy thông tin sinh viên cần chỉnh sửa
    $sinhvien = SinhVien::find($id);

    // Nếu sinh viên không tồn tại, báo lỗi
    if (!$sinhvien) {
        die("Không tìm thấy sinh viên với Mã SV: $id");
    }

    // Truyền dữ liệu cho view
    require 'views/sinhvien/edit.php';
}


    public function delete($id)
    {
        SinhVien::delete($id);
        header('Location: index.php');
        exit;
    }

    public function detail($id)
{
    // Tìm sinh viên với mã ID
    $sinhvien = SinhVien::find($id);

    // Nếu không tìm thấy sinh viên, báo lỗi
    if (!$sinhvien) {
        die("Không tìm thấy sinh viên với Mã SV: $id");
    }

    // Truyền dữ liệu cho view
    require 'views/sinhvien/detail.php';
}
}
?>
