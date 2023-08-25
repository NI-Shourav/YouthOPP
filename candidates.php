<?php

session_start();

include 'connectDB/config.php';


if (!isset($_SESSION['admin_id'])) {
    header('location: login.php');
}

$sql2 = "SELECT * FROM applycv INNER JOIN users ON users.id = applycv.id";

$result2 = mysqli_query($conn, $sql2);

$arr2 = mysqli_fetch_all($result2, MYSQLI_ASSOC);

$sql = "SELECT * FROM `users` INNER JOIN gencv WHERE users.id = gencv.id";

$result = mysqli_query($conn, $sql);

$arr = mysqli_fetch_all($result, MYSQLI_ASSOC);

if (isset($_POST['download'])) {
    $file = $_POST['file'];
    $file = 'uploads/' . $file;
    if (file_exists($file)) {
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename="' . basename($file) . '"');
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        header('Content-Length: ' . filesize('uploads/' . $file));
        readfile('uploads/' . $file);
        exit;
    }
}


?>

<!DOCTYPE html>
<html lang="en">
<!-- for posted opportunity-->
<!DOCTYPE html>
<!-- Path: post.html -->
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>YouthOPP</title>
    <link rel="stylesheet" href="searchHistory.css">
    <link rel="shortcut icon" href="icons/opportunity.png" type="image/png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
</head>

<body>

    <!-- navbar-->
    <div class="wrapper">
        <header>
            <div class="logo">
                <a href="index.html"><img src="icons/opportunity.png" alt=""></a>
            </div>
            <nav class="nav-margin">
                <ul>
                    <li>
                        <h4 class="t-white"> <a href="admin.php"> Admin Panel </a></h4>
                    </li>
                    <li>
                        <h6 class="t-white"> <a href="admin.php"> Back </a></h6>
                    </li>
                    <li>
                        <h6 class="t-red"> <a href="logout.php">Log out</a></h6>
                    </li>
                </ul>
            </nav>
        </header>
    </div>

    <div class="container-fluid post-margin bg-header">
        <div class="row">
            <div class="col-md-12 mt-4 mb-0">
                <h1 class="text-left t-blue mb-4 ">Search History</h1>
            </div>
        </div>
    </div>

    <div>

        <div class="container-fluid ">
            <div class="row ">
                <div class="col-md-5 ">
                    <div class="title_color">
                        <h4 class="t-orange"><br>Generate CV</h4>
                    </div>
                </div>
            </div>
        </div>


        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr class="t-white">
                                <th scope="col">ID</th>
                                <th scope="col">Name</th>
                                <th scope="col">Email</th>
                                <th scope="col">Count</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($arr as $row) { ?>

                                <tr>
                                    <th scope="row " class="t-white"><?php echo $row['id']; ?></th>
                                    <td class="t-white"><?php echo $row['name']; ?></td>
                                    <td class="t-white"><?php echo $row['email']; ?></td>
                                    <td class="t-white"><?php echo $row['count']; ?></td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>


    <div>

        <div class="container-fluid ">
            <div class="row ">
                <div class="col-md-5 ">
                    <div class="title_color">
                        <h4 class="t-orange"><br>Applied by CV</h4>
                    </div>
                </div>
            </div>
        </div>


        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr class="t-white">
                                <th scope="col">ID</th>
                                <th scope="col">Name</th>
                                <th scope="col">Email</th>
                                <th scope="col">Officer's Email</th>
                                <th scope="col">Subject</th>
                                <th scope="col">CV</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($arr2 as $row) { ?>

                                <tr>
                                    <th scope="row " class="t-white"><?php echo $row['id']; ?></th>
                                    <td class="t-white"><?php echo $row['name']; ?></td>
                                    <td class="t-white"><?php echo $row['email']; ?></td>
                                    <td class="t-white"><?php echo $row['o_email']; ?></td>
                                    <td class="t-white"><?php echo $row['subject']; ?></td>
                                    <td class="t-white"> <a href="<?php echo $row['file']; ?>" target="_thapa" class="btn btn-primary">Download</a></td>
                                </tr>
                            <?php } ?>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>











    <!-- footer -->
    <?php include 'footer.php'; ?>



</body>

</html>