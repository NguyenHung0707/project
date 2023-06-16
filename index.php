<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script scr="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.js"></script>
    <style type="text/css">
        .wrapper{
            width: 1200px;
            margin: 0 auto;
        }
        .page-header {
            margin-top: 0;
        }
        table tr td:last-child a{
            margin-right: 15px;
        }
    </style>
    <script type="text/javascript">
        $(document).ready(function (){
            $('[data-toggle="tooltip"]').tooltip();
        });
    </script>
</head>
<body>
<div class="wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="page-header clear-fix">
                    <h2 class="pullleft">Course Details</h2>
                    <a href="create.php" class="btn btn-success pull-right">Add New Employee</a>
                </div>

                <?php

                // Include config file
                require_once 'config.php';

                //Attempt select query execution
                $sql = "SELECT * FROM course";
                if($result = mysqli_query($conn, $sql)) {
                    if(mysqli_num_rows($result) > 0) {
                        echo "<table class='table table-bordered table-striped'>";
                        echo "<thead>";
                        echo "<tr>";
                        echo "<th>Mã Khóa Học</th>";
                        echo "<th>Tên Khóa Học</th>";
                        echo "<th>Tên Giảng Viên</th>";
                        echo "<th>Mô Tả</th>";
                        echo "<th>Kiến Thức</th>";
                        echo "<th>Image</th>";
                        echo "<th>Giá Tiền</th>";
                        echo "<th>Giáo Trình</th>";
                        echo "</tr>";
                        echo "</thead>";
                        echo "<tbody>";
                        while ($row = mysqli_fetch_array($result)) {
                            echo "<tr>";
                            echo"<td>" . $row['maKhoaHoc'] . "</td>";
                            echo"<td>" . $row['tenKhoaHoc'] . "</td>";
                            echo"<td>" . $row['tenGiangVien'] . "</td>";
                            echo"<td>" . $row['moTa'] . "</td>";
                            echo"<td>" . $row['kienThuc'] . "</td>";
                            echo"<td>" . $row['img'] . "</td>";
                            echo"<td>" . $row['giaTien'] . "</td>";
                            echo"<td>" . $row['giaoTrinh'] . "</td>";

                            echo "<td>";
                            echo "<a href='read.php?id=" .$row['maKhoaHoc']."' title='View Record' data-toggle='tooltip'><span class='glyphicon glyphicon-eye-open'></span></a>";
                            echo "<a href='update.php?id=" .$row['maKhoaHoc']."' title='Update Record' data-toggle='tooltip'><span class='glyphicon glyphicon-pencil'></span></a>";
                            echo "<a href='delete.php?maKhoaHoc=" .$row['maKhoaHoc']."' title='Delete Record' data-toggle='tooltip'><span class='glyphicon glyphicon-trash'></span></a>";
                            echo "</td>";
                            echo "</tr>";
                        }
                        echo "</tbody>";
                        echo "</table>";

                        // Free result set
                        mysqli_free_result($result);


                    }else {
                        echo "<p class='lead'><em>No records were found.</em></p>";
                    }

                }else {
                    echo "ERROR: Could not able to execute $sql ".mysqli_error($conn);
                }

                // Close connection
                mysqli_close($conn);
                ?>
            </div>
        </div>
    </div>
</div>
</body>
</html>