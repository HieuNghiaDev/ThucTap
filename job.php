<?php
include ('connect.php');
$id = $_GET['id'];
$sql_views = "UPDATE job SET views = views + 1 WHERE id_job = $id";
mysqli_query($conn, $sql_views);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thông Tin Tuyển Dụng</title>
    <link rel="icon" type="image/x-icon" href="picture/logo/fpticon.ico">
    <link rel="stylesheet" href="bootstrap-5.3.3-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/job.css">
    </script>
</head>

<body>
    <header>
        <div class="container">
            <a href="index.php"><img src="picture/logo/logo.png" alt="404"></a>
            <nav>
                <ul>
                    <li><a href="index.php">Trang chủ</a></li>
                    <li><a href="#">Dịch vụ</a></li>
                    <li><a href="#">Liên hệ</a></li>
                </ul>
            </nav>
        </div>
    </header>
    <div class="searchbox">
        <form method="post" name="truyen" action="search_job.php">
            <input class="search" type="text" name="name" placeholder="Bạn đang muốn tìm vị trí nào...." />
            <!-- <button class = "button" type = "submit" name = "tim"><i class="fa-solid fa-magnifying-glass"></i></button> -->
        </form>
    </div>

    <div class="sel-province">
        <div class="content">
            <!-- <h3>Vị Trí :</h3> -->
            <select id="province"></select>
            <script>
                var provinces = [
                    "An Giang", "Bà Rịa - Vũng Tàu", "Bắc Giang", "Bắc Kạn", "Bạc Liêu", "Bắc Ninh",
                    "Bến Tre", "Bình Định", "Bình Dương", "Bình Phước", "Bình Thuận", "Cà Mau", "Cao Bằng",
                    "Đắk Lắk", "Đắk Nông", "Điện Biên", "Đồng Nai", "Đồng Tháp", "Gia Lai", "Hà Giang",
                    "Hà Nam", "Hà Tĩnh", "Hải Dương", "Hậu Giang", "Hòa Bình", "Hưng Yên", "Khánh Hòa",
                    "Kiên Giang", "Kon Tum", "Lai Châu", "Lâm Đồng", "Lạng Sơn", "Lào Cai", "Long An",
                    "Nam Định", "Nghệ An", "Ninh Bình", "Ninh Thuận", "Phú Thọ", "Quảng Bình", "Quảng Nam",
                    "Quảng Ngãi", "Quảng Ninh", "Quảng Trị", "Sóc Trăng", "Sơn La", "Tây Ninh", "Thái Bình",
                    "Thái Nguyên", "Thanh Hóa", "Thừa Thiên Huế", "Tiền Giang", "Trà Vinh", "Tuyên Quang",
                    "Vĩnh Long", "Vĩnh Phúc", "Yên Bái", "Phú Yên", "Cần Thơ", "Đà Nẵng", "Hải Phòng",
                    "Hà Nội", "TP HCM"
                ];

                var select = document.getElementById("province");

                for (var i = 0; i < provinces.length; i++) {
                    var option = document.createElement("option");
                    option.value = i + 1;
                    option.text = provinces[i];
                    select.appendChild(option);
                }
            </script>
        </div>

        <div class="content">
            <!-- <h3>Kinh nghiệm : </h3> -->
            <select id="jobType">
                <option>Kinh nghiệm</option>
                <option value="Entry-level">Entry-level Experience</option>
                <option value="Mid-level">Mid-level Experience</option>
                <option value="Senior-level">Senior-level Experience</option>
                <option value="Specialized">Specialized Experience</option>
            </select>
        </div>

        <div class="content">
            <!-- <h3>Lương : </h3> -->
            <select id="pay">
                <option value="">Dưới 10 Triệu</option>
                <option value="">10 - 15 Triệu</option>
                <option value="">15 - 20 Triệu</option>
                <option value="">Trên 20 Triệu</option>
            </select>
        </div>

        <div class="content">
            <button class="button-search" type="submit" name="tim">Tìm kiếm</button>
        </div>
    </div>
    <hr>
    <div class="container">
        <div class="row gx-2">
            <div class="col-9">
                <div class="border-top border-warning border-5 rounded-4 bg-body-secondary p-3">
                    <?php
                    $sql_job = "SELECT * FROM job where id_job = '" . $id . "'";
                    $result_job = mysqli_query($conn, $sql_job);
                    $row_job = mysqli_fetch_assoc($result_job);

                    ?>
                    <h2 class="title-job text-warning fs-3 fw-bold text-center"><?php echo $row_job['title'] ?></h2>

                    <h3 class="text-black fs-6 fw-bold text-center">Số lượng ứng tuyển :
                        <?php echo $row_job['quantity'] ?>
                    </h3>
                    <h3 class="text-black fs-6 fw-bold text-center">Loại hình công việc :
                        <?php echo $row_job['type'] ?>
                    </h3>
                    <h3 class="text-black fs-6 fw-bold text-center">Mức lương : <?php echo $row_job['pay'] ?>
                        Triệu/Tháng</h3>
                    <h3 class="text-black fs-6 fw-bold text-center">Khu vực : <?php echo $row_job['location'] ?></h3>

                    <h3>Chi tiết công việc</h3>
                    <ul>
                        <?php
                        $details = explode("\n", $row_job['jobdescription']);
                        foreach ($details as $detail) {
                            echo "<li>" . trim($detail) . "</li>";
                        }
                        ?>
                    </ul>
                    <h3>Yêu cầu công việc</h3>
                    <ul>
                        <?php
                        $details = explode("\n", $row_job['jobrequirements']);
                        foreach ($details as $detail) {
                            echo "<li>" . trim($detail) . "</li>";
                        }
                        ?>
                    </ul>
                    <h3>Phúc lợi</h3>
                    <ul>
                        <?php
                        $details = explode("\n", $row_job['jobenefits']);
                        foreach ($details as $detail) {
                            echo "<li>" . trim($detail) . "</li>";
                        }
                        ?>
                    </ul>
                    <?
                    ?>
                    <h3>Thông tin tham khảo</h3>
                    <ul>
                        <li>Tìm hiểu về FPT Telecom <a href="https://fptjobs.com/gioi-thieu">Tại đây</a></li>
                        <li>Quy trình tuyển dụng FPT <a
                                href="https://fptjobs.com/gioi-thieu/quy-trinh-tuyen-dung-nhan-vien">Tại đây</a></li>
                    </ul>
                    <h3 class="text-warning fs-3 ">Thông tin liên hệ</h3>
                    <h4 class="fs-6"><b>Thông tin liên hệ :</b> Văn phòng tuyển dụng</h4>
                    <h4 class="fs-6"><b>Email :</b> fptjob@gmail.com</h4>
                    <h4 class="fs-6"><b>Điện thoại cố định :</b> 012341234</h4>
                    <h4 class="fs-6"><b>Điện thoại di động :</b> 088776353</h4>

                </div>
            </div>
            <div class="col-3">
                <div class="bg-warning rounded-4 p-2">
                    <H3 class="title-job fs-3 text-light fw-bold text-center">CÔNG TY TRUYỀN THÔNG FPT</H3>
                    <p class="title-job text-light fw-bold">Công ty cổ phần viễn thông FPT - FPT Telecom là nhà cung cấp
                        dịch vụ internet, truyền
                        hình và các dịch vụ gia tăng trên nền tảng internet với hơn 25 năm hình thành và phát triển.
                        HIện tại FPT Telecom đang có mặt trên 63 tỉnh thành trong nước và một số thị trường quốc tế.
                        Với phương châm “mọi dịch vụ trên một kết nối”, chúng tôi kỳ vọng mỗi gia đình việt nam đều sử
                        dụng ít
                        nhất một dịch vụ của FPT Telecom trong tương lai.</p>
                    <p class="title-job text-light fw-bold">
                        As a Sales Manager at FPT Digital, you play a pivotal role in driving business expansion by
                        actively engaging
                        in consulting service projects for organizations and businesses, cultivating strategic client
                        relationships,
                        and ensuring the seamless execution of projects, thus driving digital transformation and
                        innovation for our valued partners.
                    </p>
                </div>
            </div>
        </div>
    </div>

    <div class="footer">
        <h2>TẬP ĐOÀN FPT Telecom</h2>
        <p><i class="fas fa-map-marker-alt"></i> Toà nhà FPT Tower, số 10 Phạm Văn Bạch, phường Dịch Vọng, quận Cầu
            Giấy, Hà Nội</p>
        <p><i class="fas fa-envelope"></i> Career@fpt.com</p>
        <h3>FOLLOW US</h3>
        <a href="#"><i class="fab fa-facebook-f"></i></a>
        <a href="#"><i class="fab fa-linkedin-in"></i></a>
    </div>
    <script src="bootstrap-5.3.3-dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>