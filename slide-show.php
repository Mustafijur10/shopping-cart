<?php
include 'db.php';
if (!isset($_SESSION)) {
    session_start();
}
if (isset($_SESSION['usersname'])) {
    include 'navUser.php';
} else {
    include 'header.php';
}

$page_id = $_GET['ids'];

?>

<section class="container-fluid w-50">

    <?php
    $sql = "SELECT * FROM pages where id='$page_id'";
    $result = mysqli_query($connection, $sql);

    if ($result) {
        while ($row = mysqli_fetch_assoc($result)) {
            $id = $row["id"];
            $name = $row["name"];
            $content = $row["content"];


            echo ' <h1 class="text-center text-uppercase">' . $name . '</h1>';

            $pattern = '/\[Name="(.*?)" Animation="(.*?)"\]/';
            if (preg_match_all('/\[Name="(.*?)" Animation="(.*?)"\]/', $content, $matches, PREG_SET_ORDER)) {
                foreach ($matches as $match) {
                    $name = $match[1];
                    $animation = $match[2];

                    $find_gallery = "SELECT * from gallery where shortcode='$name'";
                    $find_gallery_result = mysqli_query($connection, $find_gallery);
                    while ($rows = mysqli_fetch_assoc($find_gallery_result)) {
                        $galleries_id = $rows['id'];

                        $find_images = "SELECT images from gallery_images where gallery_id = '$galleries_id'";
                        $find_image_result = mysqli_query($connection, $find_images);

                        if ($find_image_result) {
                            $image_tag = '';
                            while ($row3 = mysqli_fetch_assoc($find_image_result)) {
                                $image = $row3['images'];
                                $image_tag .= "<img src='images/$image' class='s$animation' width='100px'> ";
                            }
                            // $replacement = $image_tag;
                            $replacement = '<div class="text-center main-' . $animation . '">' . $image_tag . '</div>';
                            $content = preg_replace($pattern, $replacement, $content, 1);
                        }
                    }
                }
                echo ' <p class="text-center text-dark" id="page-content">' . $content . '</p>';
                // echo '<div class="text-center gap-3"><button class="border border-dark" onclick="goPrev()">Previous</button><button class="ml-3 border border-dark" onclick="goNext()">Next</button></div>';
            } else {
                echo ' <p class="text-center text-dark" id="page-content">' . $content . '</p>';
            }
        }
    }
    ?>
</section>



<script>

    // slide animation 
    const slides = document.querySelectorAll('.sslide');
    let currentSlide = 0;

    function showSlide(index) {
        slides.forEach((slide, i) => {
            if (i === index) {
                slide.style.transform = 'translateX(0)';
            } else if (i < index) {
                slide.style.transform = `translateX(-${100 * (index - i)}%)`;
            } else {
                slide.style.transform = `translateX(${100 * (i - index)}%)`;
            }
        });
    }

    function nextSlide() {
        currentSlide = (currentSlide + 1) % slides.length;
        showSlide(currentSlide);
    }

    showSlide(currentSlide);

    const slideInterval = 2000;
    setInterval(nextSlide, slideInterval);

    // scroll animation 

    const scrolls = document.querySelectorAll('.sscroll');
    let currentScroll = 0;

    function showScroll(index) {
        scrolls.forEach((scroll, i) => {
            if (i === index) {
                scroll.style.transform = 'translateY(0)';
            } else if (i < index) {
                scroll.style.transform = `translateY(-${100 * (index - i)}%)`;
            } else {
                scroll.style.transform = `translateY(${100 * (i - index)}%)`;
            }
        });
    }

    function nextScroll() {
        currentScroll = (currentScroll + 1) % scrolls.length;
        showScroll(currentScroll);
    }

    nextScroll(currentScroll);

    const scrollInterval = 3000;
    setInterval(nextScroll, scrollInterval);

</script>

<script>

    // disappear animation 
    //  const mainDisappear = document.querySelector('.main-disappear');
    const disappearImages = document.querySelectorAll('.sdisappear');
    let currentImage = 0;

    function showImage(index) {
        disappearImages.forEach((image, i) => {
            if (i === index) {
                image.style.opacity = 1;
            } else {
                image.style.opacity = 0;
            }
        });
    }

    function nextImage() {
        showImage(currentImage);
        const nextImageIndex = (currentImage + 1) % disappearImages.length;

        const duration = 100;
        let startTime;

        function animate(time) {
            if (!startTime) {
                startTime = time;
            }
            const progress = (time - startTime) / duration;

            if (progress < 1) {
                disappearImages[currentImage].style.opacity = 1 - progress;
                requestAnimationFrame(animate);
            } else {
                disappearImages[currentImage].style.opacity = 0;
                currentImage = nextImageIndex;
                showImage(currentImage);
                setTimeout(nextImage, fadeInterval);
            }
        }

        requestAnimationFrame(animate);
    }
    const fadeInterval = 1000;
    setTimeout(nextImage, fadeInterval);

</script>

</body>

</html>