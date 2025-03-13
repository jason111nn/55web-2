<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>2025國際交響樂團演奏會(ISOC)</title>
    <link rel="icon" href="./img/logo.png">
    <link rel="stylesheet" href="./css/bootstrap.css">
    <link rel="stylesheet" href="./css/style.css">
</head>

<body>
    <header id="navbar">
        <h2 id="site-title">2025國際交響樂團演奏會(ISOC)</h2>
        <img src="./img/logo.png" alt="logo" id="logo">
        <a href="home.html" id="home">Home</a>
        <a href="news.html" id="news">News</a>
        <a href="performance.html" id="performance">Performance</a>
        <a href="tickets.html" id="tickets">Tickets</a>
        <a href="search.html" id="search">Search</a>
        <a href="admin.php" id="admin">Admin</a>
    </header>
    <main>
        <div>
            <table id="panel" class="table table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Phone</th>
                        <th>Password</th>
                        <th>操作</th>
                    </tr>
                </thead>
                <tbody id="ticket-table-body">
                    <?php
                        $dsn = "mysql:host=localhost;charset=utf8;dbname=db11";
                        $conn = new PDO($dsn, "admin", "1234");
                        
                        $sql = "SELECT * FROM tickets";
                        $stmt = $conn->prepare($sql);
                        $stmt->execute();

                        if ($stmt->rowCount() > 0) {
                            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                echo "<tr id='row-{$row['id']}'>";
                                echo "<td>{$row['id']}</td>";
                                echo "<td>{$row['firstname']}</td>";
                                echo "<td>{$row['lastname']}</td>";
                                echo "<td>{$row['phone']}</td>";
                                echo "<td>{$row['password']}</td>";
                                echo "
                                <td>
                                    <button type='button' class='btn delete-btn' data-id='{$row['id']}'>刪除</button>
                                </td>";
                                echo "</tr>";
                            }
                        } else {
                            echo "<tr><td colspan='6'>沒有任何資料</td></tr>";
                        }
                    ?>
                </tbody>
            </table>
        </div>
    </main>
    <footer>
        <div id="share-info">
            <img src="./img/facebook.png" alt="fb" id="fb">
            <img src="./img/google.png" alt="google" id="google">
        </div>
        <span id="footer">Copyright &copy; 2025 ISOC All Rights Reserved</span>
    </footer>
    <script src="./js/jquery.js"></script>
    <script src="./js/jquery-ui.min.js"></script>
    <script src="./js/bootstrap.js"></script>
    <script>
        $(document).ready(function () {
            $(".delete-btn").click(function () {
                var id = $(this).data("id");
                if (confirm("確定要刪除這筆資料嗎？")) {
                    $.ajax({
                        url: 'del.php',
                        type: 'POST',
                        data: { id: id },
                        success: function (response) {
                            if (response == "success") {
                                $('#row-' + id).remove();
                                alert("資料已刪除");
                            } else {
                                alert("刪除失敗");
                            }
                        },
                        error: function () {
                            alert("刪除錯誤");
                        }
                    });
                }
            });
        });
    </script>
</body>

</html>
