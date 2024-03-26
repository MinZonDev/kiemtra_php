.navbar {
    overflow: hidden;
    background-color: #333;
}

.navbar a {
    float: left;
    display: block;
    color: white;
    text-align: center;
    padding: 20px 20px;
    text-decoration: none;
}

.navbar a:hover {
    background-color: #ddd;
    color: black;
}

.navbar a.right {
    float: right;
}

table {
    width: 100%;
    border-collapse: collapse;
}

table,
th,
td {
    border: 1px solid black;
    padding: 8px;
}

th {
    background-color: #f2f2f2;
}

img {
    width: 30px;
    height: 30px;
}

.add-employee-btn {
    background-color: #4CAF50;
    /* Màu xanh lá */
    color: white;
    padding: 10px 20px;
    /* Kích thước padding */
    border: none;
    border-radius: 5px;
    /* Bo tròn viền */
    cursor: pointer;
    margin-top: 20px;
    /* Khoảng cách với phần tử trên */
}

.add-employee-btn:hover {
    background-color: #45a049;
    /* Màu xanh lá nhạt khi hover */
}

footer {
    background-color: #333;
    /* Màu nền xanh lá cây */
    padding: 10px;
    /* Khoảng cách bên trong phần footer */
    color: white;
    /* Màu văn bản */
    text-align: center;
    /* Căn giữa văn bản */
}

form label {
    display: block;
    margin-bottom: 10px;
}

form input[type="text"] {
    width: 100%;
    padding: 8px;
    margin-bottom: 20px;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
}

form input[type="submit"] {
    background-color: #4CAF50;
    color: white;
    padding: 10px 20px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    font-size: 16px;
}

form input[type="submit"]:hover {
    background-color: #45a049;
}

h1 {
    color: #333;
}

select {
    width: calc(100% - 22px);
    padding: 10px;
    margin-bottom: 20px;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
    appearance: none;
    /* Ẩn giao diện mặc định của select */
    -moz-appearance: none;
    -webkit-appearance: none;
    background-image: url('images/arrow_down.png');
    /* Thay đổi biểu tượng mũi tên */
    background-repeat: no-repeat;
    background-position: right 10px center;
}

/* Tùy chỉnh giao diện của tùy chọn trong select */
option {
    padding: 5px;
    background-color: #fff;
    color: #333;
}