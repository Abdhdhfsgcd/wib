<?php
// إعداد الاتصال بقاعدة البيانات
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "blog_db";

// الاتصال بقاعدة البيانات
$conn = new mysqli($servername, $username, $password, $dbname);

// التحقق من الاتصال
if ($conn->connect_error) {
    die("فشل الاتصال: " . $conn->connect_error);
}

// استرجاع المقالات من قاعدة البيانات
$sql = "SELECT id, title, content, created_at FROM posts";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>عرض المقالات</title>
</head>
<body>

<h1>جميع المقالات</h1>

<?php
if ($result->num_rows > 0) {
    // عرض كل مقال
    while($row = $result->fetch_assoc()) {
        echo "<article>";
        echo "<h2>" . $row["title"] . "</h2>";
        echo "<p>" . $row["content"] . "</p>";
        echo "<p><small>تم نشره في: " . $row["created_at"] . "</small></p>";
        echo "</article>";
    }
} else {
    echo "لا توجد مقالات لعرضها.";
}

// إغلاق الاتصال
$conn->close();
?>

</body>
</html>