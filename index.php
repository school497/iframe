<!DOCTYPE html>
<html>
<head>
    <title>Calculate Value</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="icon" type="image/png" href="icon/favicon.png">
</head>
<body>
<blockquote class="blockquote text-left">
    <div class="container">
    <footer class="blockquote-footer">1 Grade 5 dollar<cite title="Source Title"> =</cite></footer>
    </blockquote>
        <?php
        session_start();
        // connect to MySQL database
        $servername = "https://db4free.net/";
        $username = "exexexex";
        $password = "exexexex";
        $dbname = "exexexex";
        $conn = mysqli_connect($servername, $username, $password, $dbname);

        // check if connection was successful
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }

        // get number of rows from four tables in the database
        $tables = array("hyunmu", "baekho", "jujak", "cheongyong");
        $total_count = 0;
        foreach ($tables as $table) {
            $sql = "SELECT COUNT(*) FROM $table";
            $result = mysqli_query($conn, $sql);
            $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
            $total_count += $row["COUNT(*)"];
        }
        
        // calculate value
        if ($total_count > 0) {
            $value = 11 / $total_count;
            $value = round($value, 2);
            $_SESSION["count"] = $total_count;
            $_SESSION["value"] = $value;
            echo '<div class="alert alert-success"> ' . $value . ' Dwight Dollars</div>';
        } else {
            echo '<div class="alert alert-danger">10 Dwight Dollars</div>';
        }

        // close MySQL connection
        mysqli_close($conn);
        ?>
    </div>
    <a class="btn btn-primary" href="insert.php" role="button">Add New</a>
    <script>
        // auto-refresh the page every 5 seconds
        setTimeout(function(){
            location.reload();
        }, 5000);
    </script>
</body>
</html>
