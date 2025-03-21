<?php
require_once 'db.php';

class HocPhan {
    public static function all() {
        global $conn;
        $stmt = $conn->prepare("SELECT * FROM HocPhan");
        $stmt->execute();
        return $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    }

    public static function find($maHP) {
        global $conn;
        $stmt = $conn->prepare("SELECT * FROM HocPhan WHERE MaHP = ?");
        $stmt->bind_param("s", $maHP);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc();
    }

    public static function create($data) {
        global $conn;
        $stmt = $conn->prepare("INSERT INTO HocPhan (MaHP, TenHP, SoTinChi) VALUES (?, ?, ?)");
        $stmt->bind_param("ssi", $data['MaHP'], $data['TenHP'], $data['SoTinChi']);
        $stmt->execute();
    }

    public static function update($data) {
        global $conn;
        $stmt = $conn->prepare("UPDATE HocPhan SET TenHP = ?, SoTinChi = ? WHERE MaHP = ?");
        $stmt->bind_param("sis", $data['TenHP'], $data['SoTinChi'], $data['MaHP']);
        $stmt->execute();
    }

    public static function delete($maHP) {
        global $conn;
        $stmt = $conn->prepare("DELETE FROM HocPhan WHERE MaHP = ?");
        $stmt->bind_param("s", $maHP);
        $stmt->execute();
    }
}
