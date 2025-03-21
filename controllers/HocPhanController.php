<?php
require_once 'models/HocPhan.php';

class HocPhanController {
      public function index() {
        // Lấy danh sách học phần từ model
        $hocPhan = HocPhan::all();

        // Truyền dữ liệu sang view
        require 'views/hocphan/index.php';
    }    public function create() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = [
                'MaHP' => $_POST['MaHP'],
                'TenHP' => $_POST['TenHP'],
                'SoTinChi' => $_POST['SoTinChi'],
            ];
            HocPhan::create($data);
            header('Location: index.php?controller=hocphan&action=index');
            exit;
        }
        require 'views/hocphan/create.php';
    }

    public function delete($maHP) {
        HocPhan::delete($maHP);
        header('Location: index.php?controller=hocphan&action=index');
        exit;
    }
}
