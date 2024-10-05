<?php
include ('connect.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $search_query = $_POST['search_query'];
    // $province = $_POST['province'];
    // $jobType = $_POST['jobType'];
    // $pay = $_POST['pay'];
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/stype.css">
    <title>Trang Chu</title>
    <script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script> -->
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
            <input class="search" type="text" name="search_query"
                placeholder="Bạn đang muốn tìm vị trí nào...." />
            <!-- <button class = "button" type = "submit" name = "tim"><i class="fa-solid fa-magnifying-glass"></i></button> -->
        </form>
    </div>

    <form action="search_jobsel.php" method="post">
        <div class="sel-province">
            <div class="content">
                <!-- <h3>Vị Trí :</h3> -->
                <select name="province" id="province"></select>
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
                    option.value = provinces[i]; // Sử dụng tên tỉnh làm giá trị
                    option.text = provinces[i];
                    select.appendChild(option);
                }
                </script>
            </div>

            <div class="content">
                <!-- <h3>Kinh nghiệm : </h3> -->
                <select id="jobType" name="jobtype">
                    <option>Kinh nghiệm</option>
                    <option value="Entry-level">Entry-level Experience</option>
                    <option value="Mid-level">Mid-level Experience</option>
                    <option value="Senior-level">Senior-level Experience</option>
                    <option value="Specialized">Specialized Experience</option>
                </select>
            </div>

            <div class="content">
                <!-- <h3>Lương : </h3> -->
                <select id="pay" name="pay">
                    <option value="0-10">Dưới 10 Triệu</option>
                    <option value="10-15">10 - 15 Triệu</option>
                    <option value="15-20">15 - 20 Triệu</option>
                    <option value="20">Trên 20 Triệu</option>
                </select>
            </div>

            <div class="content">
                <button class="button-search" type="submit" name="search_button">Tìm kiếm</button>
            </div>
        </div>
    </form>

    <div id="image-container">
        <img id="display-image" src="picture/img/img1.jpg" alt="Displayed Image">
    </div>

    <script>
    var imageFilenames = ["picture/img/img2.jpg", "picture/img/img3.jpg"];

    var currentIndex = 0;
    var intervalTime = 4000;

    function changeImage() {
        currentIndex = (currentIndex + 1) % imageFilenames.length;

        var imageContainer = document.getElementById("display-image");
        imageContainer.src = imageFilenames[currentIndex];
    }

    setInterval(changeImage, intervalTime);
    </script>

    <div class="main-div">
        <div class="left-div">
            <h4>Thông tin tuyển dụng :</h4>
            <div class="job-main">
                <?php
                $limit = 8;

                $page = isset($_GET['page']) ? $_GET['page'] : 1;

                $start = ($page - 1) * $limit;

                $sql = "SELECT * FROM job WHERE title LIKE '%$search_query%'";
                $result = mysqli_query($conn, $sql);

                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        ?>
                <div class="job-info">
                    <a href="job.php?id=<?= $row['id_job'] ?>">
                        <h4><?php echo $row['title'] ?></h4>
                    </a>
                    <img src="picture/logo/logo.png" alt="Ảnh minh họa">
                    <p class="salary">Mức lương: <?php echo $row['pay'] ?> Triệu</p>
                    <p class="location">Khu vực: <?php echo $row['location'] ?></p>
                </div>
                <?php
                    }
                } else {
                    echo "Không có kết quả phù hợp.";
                }
                ?>
            </div>
        </div>
        <div class="right-div">
            <h3>Gợi ý tuyển dụng : </h3>
        </div>
    </div>
</body>

</html>