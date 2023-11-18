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
            echo ' <p class="text-center text-dark" id="page-content">' . $content . '</p>';
        }
    }
    ?>
    <div class="text-center mt-5 d-flex justify-content-center">
        <p id="demo"></p>
    </div>
</section>
<script>
    window.onload = function () {
        myFunction();
    }

    function myFunction() {
        let text = document.getElementById("page-content").innerText;
        var squareBox = text.match(/\[.*\]/);
        const count = (text.match(/\[/g) || []).length;
        var matches = text.match(/"([^"]*)"/g);

        if (squareBox) {
            if (matches) {
                if (matches.length >= 1) {
                    var Name = matches[0].slice(1, -1);

                    var imageHTML = "";

                    <?php
                    $name = $_COOKIE['hello'];
                    $animName = $_COOKIE['animation_name'];
                    $sql = "SELECT id from gallery where shortcode='$name'";
                    $result = mysqli_query($connection, $sql);
                    $row = mysqli_fetch_assoc($result);
                    $gallery_id = $row['id'];
                    $sql2 = "SELECT images from gallery_images where gallery_id = '$gallery_id'";
                    $result2 = mysqli_query($connection, $sql2);

                    if ($result2) {
                        while ($row2 = mysqli_fetch_assoc($result2)) {
                            echo "imageHTML += '<div class=\"$animName\"><a href=\"\" class=\"mt-5 $animName\" ><img src=\"images/" . $row2['images'] . "\" class=\"w-25\" style=\"w-25\"></a></div>';";
                        }
                    }
                    ?>

                    document.cookie = "hello=" + Name;
                    var replacedText = text.replace(/\[.*\]/, imageHTML);
                }
                if (matches.length >= 2) {
                    var Animation = matches[1].slice(1, -1);
                    var replacedText2 = text.replace(/\[.*\]/, 'hello');
                    document.cookie = "animation_name=" + Animation;
                }
                // document.getElementById("demo").innerHTML = "Name: " + Name + "<br>Animation: " + Animation;
                document.getElementById("page-content").innerHTML = replacedText + count + Animation;
            } else {
                document.getElementById("demo").innerHTML = "not found";
            }
        } else {
            document.getElementById("demo").innerHTML = "not found";
        }
    }
</script>
</body>

</html>

<!-- <script>
    const sliders = document.querySelectorAll(".sslide");
    var counter = 0;

    sliders.forEach(
        (sslide, index) => {
            sslide.style.left = `${index * 100}%`
        }
    )

    const goPrev = () => {
        counter--
        slideImage()
    }
    const goNext = () => {
        counter++
        slideImage()
    }
    const slideImage = () => {
        sliders.forEach(
            (sslide) => {
                sslide.style.transform = `translateX(-${counter * 100}%)`
            }
        )
    }


</script> -->