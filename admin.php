<?php
include ('connect.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bootstrap-5.3.3-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/admin.css">
    <title>ADMIN</title>
    <link rel="icon" type="image/x-icon" href="picture/logo/fpticon.ico">
</head>

<body>
    <!-- <div class="alert alert-success m-2 alert-dismissibl" role="alert">
        Bạn đã đăng nhập thành công
        <button class="btn-close" aria-label="close" data-bs-dismiss="alert"></button>
    </div> -->
    <header>
        <div class="container">
            <a href="admin.php"><img src="picture/logo/logo.png" alt="404"></a>
        </div>
    </header>
    <nav class="nav_menu">
        <div class="header_menu">
            <ul>
                <li><a href="admin.php">Danh Sách Tuyển Dụng</a></li>
                <li><a href="addjob.php">Thêm Bài Đăng</a></li>
            </ul>
        </div>
    </nav>
    <div class="container">
        <button class="btn btn-primary position-absolute bottom-0 end-0" data-bs-toggle="modal"
            data-bs-target="#modal"><i class="bi bi-file-earmark-plus-fill"></i>(+) Thêm Bài Đăng</button>
        <div class="modal" id="modal" data-bs-backdrop="static">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Vui Lòng Nhập Thông Tin Vào Form</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="" method="POST">
                            <label for="jobTitle">Vị Trí Tuyển Dụng:</label>
                            <input type="text" id="jobTitle" name="jobTitle" required>

                            <label for="jobType">Loại Kinh Nghiệm:</label>
                            <select id="jobType" name="jobType">
                                <option value="Specialized">Specialized Experience</option>
                                <option value="Senior-level">Senior-level Experience</option>
                                <option value="Mid-level">Mid-level Experience</option>
                                <option value="Entry-level">Entry-level Experience</option>
                            </select>

                            <select id="pay" name="salary">
                                <?php
                                $salary = 7;
                                $increment = 1;
                                $maxSalary = 25;

                                while ($salary <= $maxSalary) {
                                    $nextSalary = $salary + $increment;
                                    echo "<option value='$salary'>$salary Triệu</option>";
                                    $salary = $nextSalary;
                                }
                                ?>
                            </select>

                            <select id="province" name="location">
                                <?php
                                $provinceNames = [
                                    "An Giang",
                                    "Bà Rịa - Vũng Tàu",
                                    "Bắc Giang",
                                    "Bắc Kạn",
                                    "Bạc Liêu",
                                    "Bắc Ninh",
                                    "Bến Tre",
                                    "Bình Định",
                                    "Bình Dương",
                                    "Bình Phước",
                                    "Bình Thuận",
                                    "Cà Mau",
                                    "Cao Bằng",
                                    "Đắk Lắk",
                                    "Đắk Nông",
                                    "Điện Biên",
                                    "Đồng Nai",
                                    "Đồng Tháp",
                                    "Gia Lai",
                                    "Hà Giang",
                                    "Hà Nam",
                                    "Hà Tĩnh",
                                    "Hải Dương",
                                    "Hậu Giang",
                                    "Hòa Bình",
                                    "Hưng Yên",
                                    "Khánh Hòa",
                                    "Kiên Giang",
                                    "Kon Tum",
                                    "Lai Châu",
                                    "Lâm Đồng",
                                    "Lạng Sơn",
                                    "Lào Cai",
                                    "Long An",
                                    "Nam Định",
                                    "Nghệ An",
                                    "Ninh Bình",
                                    "Ninh Thuận",
                                    "Phú Thọ",
                                    "Quảng Bình",
                                    "Quảng Nam",
                                    "Quảng Ngãi",
                                    "Quảng Ninh",
                                    "Quảng Trị",
                                    "Sóc Trăng",
                                    "Sơn La",
                                    "Tây Ninh",
                                    "Thái Bình",
                                    "Thái Nguyên",
                                    "Thanh Hóa",
                                    "Thừa Thiên Huế",
                                    "Tiền Giang",
                                    "Trà Vinh",
                                    "Tuyên Quang",
                                    "Vĩnh Long",
                                    "Vĩnh Phúc",
                                    "Yên Bái",
                                    "Phú Yên",
                                    "Cần Thơ",
                                    "Đà Nẵng",
                                    "Hải Phòng",
                                    "Hà Nội",
                                    "TP HCM"
                                ];

                                foreach ($provinceNames as $provinceName) {
                                    echo "<option value='$provinceName'>$provinceName</option>";
                                }
                                ?>
                            </select>

                            <label for="jobDescription">Mô Tả Công Việc:</label>
                            <textarea id="jobDescription" name="jobDescription" rows="5" required></textarea>

                            <label for="jobRequirements">Yêu Cầu Công Việc:</label>
                            <textarea id="jobRequirements" name="jobRequirements" rows="5" required></textarea>

                            <label for="jobBenefits">Quyền Lợi:</label>
                            <textarea id="jobBenefits" name="jobBenefits" rows="5" required></textarea>

                            <label for="Type">Loại hình công việc:</label>
                            <select id="Type" name="Type">
                                <option value="Fulltime">Fulltime</option>
                                <option value="Freelance">Freelance</option>
                                <option value="Part-time">Part-time</option>
                            </select>

                            <label for="jobquantity">Số lượng tuyển dụng:</label>
                            <textarea id="jobquantity" name="jobquantity" rows="1" required></textarea>

                            <button name="add_job" type="submit">Thêm Bài Tuyển Dụng</button>
                        </form>
                        <?php
                        if (isset($_POST['add_job'])) {
                            $jobTitle = $_POST["jobTitle"];
                            $jobType = $_POST["jobType"];
                            $jobDescription = $_POST["jobDescription"];
                            $jobRequirements = $_POST["jobRequirements"];
                            $jobBenefits = $_POST["jobBenefits"];
                            $jobquantity = $_POST["jobquantity"];
                            $salary = $_POST["salary"];
                            $location = $_POST["location"];
                            $Type = $_POST["Type"];
                            $sql = "INSERT INTO job (title, experience, pay, jobdescription, jobrequirements, jobenefits, location, quantity, type) 
                                        VALUES ('$jobTitle', '$jobType',  '$salary', '$jobDescription', '$jobRequirements', '$jobBenefits', '$location', '$jobquantity', '$Type')";

                            if ($conn->query($sql) === TRUE) {
                                echo "Thêm bài tuyển dụng thành công.";
                            } else {
                                echo "Lỗi: " . $sql . "<br>" . $conn->error;
                            }
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="left-div">
        <h4>QUẢN LÝ DANH SÁCH TUYỂN DỤNG :</h4>
        <div class="job-main">
            <?php
            $limit = 4;

            $page = isset($_GET['page']) ? $_GET['page'] : 1;

            $start = ($page - 1) * $limit;

            $sql = "SELECT * FROM job LIMIT $start, $limit";
            $result = mysqli_query($conn, $sql);

            while ($row = mysqli_fetch_array($result)) {
                ?>
                <div class="job-info position-relative">
                    <a href="job.php?id=<?= $row['id_job'] ?>">
                        <h4><?php echo $row['title'] ?></h4>
                    </a>
                    <img src="picture/logo/logo.png" alt="Ảnh minh họa">
                    <p class="salary">Mức lương: <?php echo $row['pay'] ?> Triệu</p>
                    <p class="location">Khu vực: <?php echo $row['location'] ?></p>
                    <!-- Nút Sửa -->
                    <button class="btn btn-primary position-absolute" data-bs-toggle="modal"
                        data-bs-target="#modal<?= $row['id_job'] ?>"
                        style="bottom: 0; right: 60px; margin: 4px;">Sửa</button>
                    <!-- Nút Xóa -->
                    <a href="delete_job.php?id=<?= $row['id_job'] ?>" class="btn btn-danger position-absolute"
                        style="bottom: 0; right: 0; margin: 4px;">Xóa</a>
                </div>
                <!-- Form Sửa -->
                <div class="modal fade" id="modal<?= $row['id_job'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Sửa Thông Tin Tuyển Dụng</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form method="POST">
                                    <input type="hidden" name="job_id" value="<?= $row['id_job'] ?>">
                                    <label for="jobTitle<?= $row['id_job'] ?>">Vị Trí Tuyển Dụng:</label>
                                    <input type="text" id="jobTitle<?= $row['id_job'] ?>" name="jobTitle"
                                        value="<?= $row['title'] ?>" required>
                                    <input type="hidden" name="experience" value="<?= $row['experience'] ?>">
                                    <label for="jobType<?= $row['experience'] ?>">Loại Kinh Nghiệm:</label>
                                    <select id="jobType<?= $row['experience'] ?>" name="jobType">
                                        <option value="Specialized" <?php if ($row['experience'] == 'Specialized')
                                            echo 'selected'; ?>>Specialized
                                            Experience</option>
                                        <option value="Senior-level" <?php if ($row['experience'] == 'Senior-level')
                                            echo 'selected'; ?>>Senior-level
                                            Experience</option>
                                        <option value="Mid-level" <?php if ($row['experience'] == 'Mid-level')
                                            echo 'selected'; ?>>Mid-level
                                            Experience</option>
                                        <option value="Entry-level" <?php if ($row['experience'] == 'Entry-level')
                                            echo 'selected'; ?>>Entry-level
                                            Experience</option>
                                    </select>

                                    <label for="pay<?= $row['pay'] ?>">Lương:</label>
                                    <select id="pay<?= $row['pay'] ?>" name="salary">
                                        <?php
                                        $salary = 7;
                                        $increment = 1;
                                        $maxSalary = 25;

                                        $salaryFromDB = $row['pay'];

                                        while ($salary <= $maxSalary) {
                                            if ($salaryFromDB == $salary) {
                                                echo "<option value='$salary' selected>$salary Triệu</option>";
                                            } else {
                                                echo "<option value='$salary'>$salary Triệu</option>";
                                            }
                                            $salary += $increment;
                                        }
                                        ?>
                                    </select>

                                    <label>Khu Vực:</label>
                                    <select id="province" name="location">
                                        <?php
                                        $provinceNames = [
                                            "An Giang",
                                            "Bà Rịa - Vũng Tàu",
                                            "Bắc Giang",
                                            "Bắc Kạn",
                                            "Bạc Liêu",
                                            "Bắc Ninh",
                                            "Bến Tre",
                                            "Bình Định",
                                            "Bình Dương",
                                            "Bình Phước",
                                            "Bình Thuận",
                                            "Cà Mau",
                                            "Cao Bằng",
                                            "Đắk Lắk",
                                            "Đắk Nông",
                                            "Điện Biên",
                                            "Đồng Nai",
                                            "Đồng Tháp",
                                            "Gia Lai",
                                            "Hà Giang",
                                            "Hà Nam",
                                            "Hà Tĩnh",
                                            "Hải Dương",
                                            "Hậu Giang",
                                            "Hòa Bình",
                                            "Hưng Yên",
                                            "Khánh Hòa",
                                            "Kiên Giang",
                                            "Kon Tum",
                                            "Lai Châu",
                                            "Lâm Đồng",
                                            "Lạng Sơn",
                                            "Lào Cai",
                                            "Long An",
                                            "Nam Định",
                                            "Nghệ An",
                                            "Ninh Bình",
                                            "Ninh Thuận",
                                            "Phú Thọ",
                                            "Quảng Bình",
                                            "Quảng Nam",
                                            "Quảng Ngãi",
                                            "Quảng Ninh",
                                            "Quảng Trị",
                                            "Sóc Trăng",
                                            "Sơn La",
                                            "Tây Ninh",
                                            "Thái Bình",
                                            "Thái Nguyên",
                                            "Thanh Hóa",
                                            "Thừa Thiên Huế",
                                            "Tiền Giang",
                                            "Trà Vinh",
                                            "Tuyên Quang",
                                            "Vĩnh Long",
                                            "Vĩnh Phúc",
                                            "Yên Bái",
                                            "Phú Yên",
                                            "Cần Thơ",
                                            "Đà Nẵng",
                                            "Hải Phòng",
                                            "Hà Nội",
                                            "TP HCM"
                                        ];

                                        foreach ($provinceNames as $provinceName) {
                                            if ($provinceName == $row['location']) {
                                                echo "<option value='$provinceName' selected>$provinceName</option>";
                                            } else {
                                                echo "<option value='$provinceName'>$provinceName</option>";
                                            }
                                        }
                                        ?>
                                    </select>

                                    <label for="jobDescription">Mô Tả Công Việc:</label>
                                    <textarea id="jobDescription" name="jobDescription" rows="5"
                                        required><?= $row['jobdescription'] ?></textarea>

                                    <label for="jobRequirements">Yêu Cầu Công Việc:</label>
                                    <textarea id="jobRequirements" name="jobRequirements" rows="5"
                                        required><?= $row['jobrequirements'] ?></textarea>

                                    <label for="jobBenefits">Quyền Lợi:</label>
                                    <textarea id="jobBenefits" name="jobBenefits" rows="5"
                                        required><?= $row['jobenefits'] ?></textarea>

                                    <label for="Type">Loại hình công việc:</label>
                                    <select id="Type" name="Type">
                                        <option value="Fulltime" <?php if ($row['type'] == 'Fulltime')
                                            echo 'selected'; ?>>Fulltime</option>
                                        <option value="Freelance" <?php if ($row['type'] == 'Freelance')
                                            echo 'selected'; ?>>Freelance</option>
                                        <option value="Part-time" <?php if ($row['type'] == 'Part-time')
                                            echo 'selected'; ?>>Part-time</option>
                                    </select>

                                    <label for="jobquantity">Số lượng tuyển dụng:</label>
                                    <textarea id="jobquantity" name="jobquantity" rows="1"
                                        required><?= $row['quantity'] ?></textarea>
                                    <button name="update_job" type="submit" class="btn btn-primary">Cập Nhật</button>
                                </form>
                                <?php
                                if (isset($_POST['update_job'])) {
                                    $job_id = $_POST["job_id"];
                                    $jobTitle = $_POST["jobTitle"];
                                    $jobType = $_POST["jobType"];
                                    $jobDescription = $_POST["jobDescription"];
                                    $jobRequirements = $_POST["jobRequirements"];
                                    $jobBenefits = $_POST["jobBenefits"];
                                    $jobquantity = $_POST["jobquantity"];
                                    $salary = $_POST["salary"];
                                    $location = $_POST["location"];
                                    $Type = $_POST["Type"];

                                    $sql = "UPDATE job SET title='$jobTitle', experience='$jobType', pay='$salary', jobdescription='$jobDescription', jobrequirements='$jobRequirements', jobenefits='$jobBenefits', location='$location', quantity='$jobquantity', type='$Type' WHERE id_job='$job_id'";
                                    //$sql = "UPDATE job SET title='$jobTitle', experience='$jobType', pay='$salary', jobdescription='$jobDescription', jobrequirements='$jobRequirements', jobenefits='$jobBenefits', location='$location', quantity='$jobquantity' WHERE id_job='$job_id'";
                            
                                    if ($conn->query($sql) === TRUE) {
                                        echo "Cập nhật thông tin tuyển dụng thành công.";
                                    } else {
                                        echo "Lỗi: " . $sql . "<br>" . $conn->error;
                                    }
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
            }
            ?>
        </div>
        <?php
        $countSql = "SELECT COUNT(*) as total FROM job";
        $countResult = mysqli_query($conn, $countSql);
        $countRow = mysqli_fetch_array($countResult);
        $totalPages = ceil($countRow['total'] / $limit);
        ?>
        <div class="pagination">
            <?php
            for ($i = 1; $i <= $totalPages; $i++) {
                if ($i == $page) {
                    echo "<strong>$i</strong> ";
                } else {
                    echo "<a href=\"?page=$i\">$i</a> ";
                }
            }
            ?>
        </div>

    </div>
    <script src="bootstrap-5.3.3-dist/js/bootstrap.bundle.min.js">
    </script>
</body>

</html>