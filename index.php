<?php
// Tải controller tương ứng
$controller = $_GET['controller'] ?? 'sinhvien'; // Mặc định là 'sinhvien'
$action = $_GET['action'] ?? 'index'; // Mặc định là 'index'
$id = $_GET['id'] ?? null; // ID tùy chọn
session_start();

// Kiểm tra trạng thái đăng nhập
if (!isset($_SESSION['user']) && !in_array($action, ['login', 'doLogin'])) {
    header('Location: ?controller=sinhvien&action=login');
    exit;
}

// Xác định file controller và class controller tương ứng
$controllerFile = 'controllers/' . ucfirst($controller) . 'Controller.php';
$controllerClass = ucfirst($controller) . 'Controller';

if (file_exists($controllerFile)) {
    require_once $controllerFile;

    // Kiểm tra class controller
    if (class_exists($controllerClass)) {
        $controllerInstance = new $controllerClass();

        // Kiểm tra method (action)
        if (method_exists($controllerInstance, $action)) {
            if ($id !== null) {
                $controllerInstance->$action($id); // Gọi action có ID
            } else {
                $controllerInstance->$action(); // Gọi action không có ID
            }
        } else {
            echo "Action '$action' không tồn tại trong controller '$controllerClass'.";
        }
    } else {
        echo "Controller class '$controllerClass' không tồn tại.";
    }
} else {
    echo "File controller '$controllerFile' không tồn tại.";
}
?>
