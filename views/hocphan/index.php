<h1>Danh sách học phần</h1>
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
<a href="index.php?controller=hocphan&action=create" class="btn">Thêm học phần</a>
<table>
    <thead>
        <tr>
            <th>Mã HP</th>
            <th>Tên HP</th>
            <th>Số tín chỉ</th>
            <th>Hành động</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($hocPhan as $hp): ?>
            <tr>
                <td><?= $hp['MaHP'] ?></td>
                <td><?= $hp['TenHP'] ?></td>
                <td><?= $hp['SoTinChi'] ?></td>
                <td>
                    <a href="index.php?controller=hocphan&action=delete&MaHP=<?= $hp['MaHP'] ?>" class="btn btn-danger">Dang ky</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
