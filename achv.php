<?php
// require_once('dbConnect.php');

// $connect = mysqli_connect(HOST, USER, PASS, DB)

//     or die("Can not connect");

include('db_connect.php');

session_start();

$sql = "SELECT * FROM file";
$result = mysqli_query($conn, $sql)
    or die("No sql: $sql");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Achievement</title>
    <link rel="stylesheet" href="Bcolor.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous" />
</head>

<body>
    <div class="container form-main" style="margin-top: 100px;">
        <div class="container pt-5 pb-3" style="background-color: #fff; width: 850px;">
            <!--Disply-->
            <table>
                <?php
                $i = 0;
                while ($row = mysqli_fetch_assoc($result)) {
                    if ($i % 3 == 0) {
                        echo "<tr>";
                    } else if ($i % 3 == 2) {
                        echo "</tr>";
                    }
                    echo "<td><file src='uploads/$row{'file'}' alt='$row{'title'}'></td>";
                    $i++;
                }
                ?>
            </table>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
</body>

</html>