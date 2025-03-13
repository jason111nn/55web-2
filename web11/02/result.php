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
            <table id="resulttable" class="table table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Phone</th>
                        <th>Password</th>
                    </tr>
                </thead>
                <tbody id="ticket-table-body">
                <?php
                    $dsn = "mysql:host=localhost;charset=utf8;dbname=db11";
                    $conn = new PDO($dsn, "admin", "1234");
                    
                    $searchItem = $_GET['SearchItem'];
                    $item = "%" . $_GET['Item'] . "%";

                    $sql = "SELECT * FROM tickets WHERE $searchItem LIKE :item";
                    $stmt = $conn->prepare($sql);
                    $stmt->bindParam(':item', $item, PDO::PARAM_STR);
                    $stmt->execute();

                    if ($stmt->rowCount() > 0) {
                        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                            echo "<tr id='row-{$row['id']}'>";
                            echo "<td>{$row['id']}</td>";
                            echo "<td>{$row['firstname']}</td>";
                            echo "<td>{$row['lastname']}</td>";
                            echo "<td>{$row['phone']}</td>";
                            echo "<td>{$row['password']}</td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='5'>沒搜尋到任何項目</td></tr>";
                    }
                ?>

                </tbody>
            </table>
            <button id="back-button" class="btn w-100" style="font-size: 1.5em;" onclick="location.href = 'search.html';">重新查詢</button>
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