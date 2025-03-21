<?php
require_once 'models/SinhVien.php';

class SinhVienController
{
    public function index()
    {
        $students = SinhVien::all();
        require 'views/sinhvien/index.php';
    }
public function login() {
    // Hiển thị form đăng nhập
    require 'views/sinhvien/login.php';
}

 public function doLogin() {
        $username = $_POST['username'] ?? '';
        $password = $_POST['password'] ?? '';

        // Lưu trạng thái đăng nhập (không kiểm tra username/password)
        $_SESSION['user'] = $username;

        // Chuyển hướng về trang danh sách sinh viên
        header('Location: ?controller=sinhvien&action=index');
        exit;
    }
    // Xử lý đăng xuất
    public function logout() {
        session_destroy();
        header('Location: ?controller=sinhvien&action=login');
        exit;
    }

   public function create() {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $MaSV = $_POST['MaSV'] ?? null;
        $HoTen = $_POST['HoTen'] ?? null;
        $GioiTinh = $_POST['GioiTinh'] ?? null;
        $NgaySinh = $_POST['NgaySinh'] ?? null;
        $MaNganh = $_POST['MaNganh'] ?? null; // Lấy ngành học từ form

        // Xử lý upload hình ảnh
        $Hinh = null;
        if (isset($_FILES['Hinh']) && $_FILES['Hinh']['error'] === UPLOAD_ERR_OK) {
            $Hinh = basename($_FILES['Hinh']['name']);
            move_uploaded_file($_FILES['Hinh']['tmp_name'], "uploads/$Hinh");
        }

        // Gọi model để thêm dữ liệu
        SinhVien::create([
            'MaSV' => $MaSV,
            'HoTen' => $HoTen,
            'GioiTinh' => $GioiTinh,
            'NgaySinh' => $NgaySinh,
            'MaNganh' => $MaNganh, // Truyền ngành học vào đây
            'Hinh' => $Hinh,
        ]);

        // Chuyển hướng về danh sách sinh viên
        header('Location: ?controller=sinhvien&action=index');
        exit;
    }

    // Hiển thị form tạo
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
