<?php
require_once 'db.php';

class SinhVien
{
   public static function all() 
{
    global $conn;
    $query = $conn->query("SELECT * FROM SinhVien");
    
    if (!$query) {
        die("Lỗi truy vấn: " . $conn->error); // Kiểm tra lỗi truy vấn
    }
    
    return $query->fetch_all(MYSQLI_ASSOC); // Sử dụng fetch_all với MYSQLI_ASSOC
}

public static function getAllMajors()
{
    global $conn;

    $query = $conn->query("SELECT * FROM NganhHoc");
    return $query->fetch_all(MYSQLI_ASSOC);
}
   public static function find($id)
{
    global $conn;

    $stmt = $conn->prepare("SELECT * FROM SinhVien WHERE MaSV = ?");
    $stmt->bind_param("s", $id);
    $stmt->execute();

    // Sử dụng get_result() để lấy kết quả dưới dạng associative array
    $result = $stmt->get_result();

    // Trả về một mảng hoặc null nếu không tìm thấy
    return $result->fetch_assoc();
}
    public static function create($data)
{
    global $conn;

    $stmt = $conn->prepare("INSERT INTO SinhVien (MaSV, HoTen, GioiTinh, NgaySinh, Hinh, MaNganh) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssss", $data[0], $data[1], $data[2], $data[3], $data[4], $data[5]);
    $stmt->execute();
}


    public static function update($id, $data)
{
    global $conn;

    $stmt = $conn->prepare("UPDATE SinhVien SET HoTen = ?, GioiTinh = ?, NgaySinh = ?, Hinh = ?, MaNganh = ? WHERE MaSV = ?");
    $stmt->bind_param(
        "ssssss",
        $data['HoTen'],
        $data['GioiTinh'],
        $data['NgaySinh'],
        $data['Hinh'],
        $data['MaNganh'],
        $id
    );

    $stmt->execute();
    $stmt->close();
}


    public static function delete($id)
    {
        global $conn;
        $stmt = $conn->prepare("DELETE FROM SinhVien WHERE MaSV = ?");
        return $stmt->execute([$id]);
    }
}
?>
