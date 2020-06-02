<?php
$username = "root";
$password = "a123456A";
$server   = "localhost";
$dbname   = "alease";
$search = "%";
$search .= $_REQUEST['search'];
$connect = mysqli_connect($server, $username, $password, $dbname);

if (!$connect) {
    die("Connect Failed :" . mysqli_connect_error());
    exit();
}
echo "Successfully Connected <br>";

$stmt = $connect->prepare("SELECT * FROM `alease`.`product` WHERE `name` like ?");
$search .="%";
$stmt->bind_param("s", $search);
$stmt->execute();
$stmt->store_result();
$stmt->bind_result($result1,$result2,$result3,$result4,$result5,$result6, $result7, $result8, $result9, $result10, $result11, $result12, $result13, $result14, $result15, $result16);
echo $stmt->fetch();
?>

    <!DOCTYPE html>
    <html lang="en">
    <head>
        <title>PHP MySQL Query Data Demo</title>
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/style.css" rel="stylesheet">
    </head>
    <body>
    <div>
        <h1>Products</h1>
        <table border="1">
            <thead border="1">
            <tr>
                <th>id_product</th>
                <th>id_category_branch</th>
                <th>name</th>
                <th>description</th>
                <th>image</th>
                <th>amount</th>
                <th>price</th>
                <th>isactive</th>
                <th>rate</th>
                <th>ratequantity</th>
                <th>market_price</th>
                <th>id_customer</th>
                <th>id_province</th>
                <th>outlook</th>
                <th>repair_history</th>
                <th>times_rent</th>
            </tr>
            </thead>
            <tbody>
            <?php while ($stmt->fetch()){ ?>
                <tr>
                    <td>jkabcsa<?php echo $result1; ?></td>
                    <td><?php echo $result2; ?></td>
                    <td><?php echo $result3; ?></td>
                    <td><?php echo $result4; ?></td>
                    <td><?php echo $result5; ?></td>
                    <td><?php echo $result6; ?></td>
                    <td><?php echo $result7; ?></td>
                    <td><?php echo $result8; ?></td>
                    <td><?php echo $result9; ?></td>
                    <td><?php echo $result10; ?></td>
                    <td><?php echo $result11; ?></td>
                    <td><?php echo $result12; ?></td>
                    <td><?php echo $result13; ?></td>
                    <td><?php echo $result14; ?></td>
                    <td><?php echo $result15; ?></td>
                    <td><?php echo $result16; ?></td>

                </tr>
            <?php } ?>
            </tbody>
        </table>
    </body>
</html>

<?php
$connect->close();
?>
