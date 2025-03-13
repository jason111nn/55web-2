<?php
$dsn = "mysql:host=localhost;charset=utf8;dbname=db11";
$conn = new PDO($dsn, "admin", "1234");
if (isset($_POST['id'])) {
    $id = $_POST['id'];
    $sql = "DELETE FROM tickets WHERE id = :id";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);

    if ($stmt->execute()) {
        echo "success";
    } else {
        echo "error";
    }
} else {
    echo "error";
}
?>
