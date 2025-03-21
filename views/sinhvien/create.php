<head>
    <style>
        /* Global styles */
body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    background-color: #f4f4f9;
    color: #333;
}

h1, h2 {
    text-align: center;
    margin-top: 20px;
    color: #444;
}

/* Navigation bar */
nav {
    background-color: #007bff;
    color: #fff;
    padding: 10px;
    display: flex;
    justify-content: center;
    gap: 15px;
}

nav a {
    color: #fff;
    text-decoration: none;
    font-weight: bold;
}

nav a:hover {
    text-decoration: underline;
}

/* Table styles */
table {
    width: 90%;
    margin: 20px auto;
    border-collapse: collapse;
    background-color: #fff;
    box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
}

table th, table td {
    border: 1px solid #ddd;
    padding: 10px;
    text-align: center;
}

table th {
    background-color: #007bff;
    color: #fff;
    font-weight: bold;
}

table tr:nth-child(even) {
    background-color: #f2f2f2;
}

table tr:hover {
    background-color: #f1f1f1;
}

/* Buttons */
button, .btn {
    background-color: #007bff;
    color: white;
    border: none;
    padding: 10px 15px;
    margin: 5px;
    border-radius: 5px;
    cursor: pointer;
    text-decoration: none;
    display: inline-block;
    text-align: center;
}

button:hover, .btn:hover {
    background-color: #0056b3;
}

.btn-danger {
    background-color: #dc3545;
}

.btn-danger:hover {
    background-color: #a71d2a;
}

/* Form styles */
form {
    width: 60%;
    margin: 20px auto;
    background-color: #fff;
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
}

form label {
    font-weight: bold;
    margin-top: 10px;
    display: block;
    color: #555;
}

form input, form select, form textarea {
    width: 100%;
    padding: 10px;
    margin: 10px 0;
    border: 1px solid #ccc;
    border-radius: 5px;
}

form input[type="submit"], form button {
    width: auto;
    background-color: #28a745;
    color: #fff;
    border: none;
    cursor: pointer;
    padding: 10px 15px;
    border-radius: 5px;
}

form input[type="submit"]:hover, form button:hover {
    background-color: #218838;
}

/* Footer */
footer {
    text-align: center;
    padding: 10px;
    background-color: #007bff;
    color: white;
    position: fixed;
    bottom: 0;
    width: 100%;
}

    </style>
</head>
<h1>Thêm Sinh viên</h1>
<form method="POST">
    <label>Mã SV:</label>
    <input type="text" name="MaSV" required><br>

    <label>Họ Tên:</label>
    <input type="text" name="HoTen" required><br>

    <label>Giới Tính:</label>
    <input type="text" name="GioiTinh"><br>

    <label>Ngày Sinh:</label>
    <input type="date" name="NgaySinh"><br>

    <label for="Hinh">Hình Ảnh:</label>
        <input type="file" id="Hinh" name="Hinh" accept="image/*">
    <label for="MaNganh">Ngành học:</label>
    <select id="MaNganh" name="MaNganh" required>
        <?php if (!empty($majors)): ?>
            <?php foreach ($majors as $major): ?>
                <option value="<?= $major['MaNganh'] ?>"><?= $major['TenNganh'] ?></option>
            <?php endforeach; ?>
        <?php else: ?>
            <option value="">Không có ngành học nào</option>
        <?php endif; ?>
    </select>

    <button type="submit">Thêm</button>
</form>
