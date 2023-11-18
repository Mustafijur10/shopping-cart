<?php
include '../session.php';
include '../db.php';
include 'nav.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $gallery_name = $_POST['gname'];
    $rand = rand(111, 999);
    $shortcode = $gallery_name . $rand;

    if (empty($_FILES['image']['name'])) {
        echo "Gallery wont create. File is empty";
    } else {
        $query = "INSERT INTO gallery (title, shortcode) VALUES ('$gallery_name','$shortcode') ";
        $result = mysqli_query($connection, $query);
        $last_id = mysqli_insert_id($connection);

        foreach ($_FILES['image']['name'] as $key => $value) {
            $rand = rand(111, 999);
            $images = $value . $rand;
            move_uploaded_file($_FILES['image']['tmp_name'][$key], '../images/' . $images);

            $query3 = "INSERT INTO gallery_images (gallery_id, images) VALUES ('$last_id','$images') ";
            $result3 = mysqli_query($connection, $query3);

            if ($result3) {
                $_SESSION['message'] = "Successfuly";
                header("location:gallery.php");
            } else {
                header("location:add-products.php");
            }
        }
    }
}
?>

<form action="#" method="POST" class="w-50" enctype="multipart/form-data">
    <div class="gallery-fields">
        <div id="gallery-title">
            <label for='cname'>Gallery Title</label>
            <input type='text' name='gname' class='form-control' required>
        </div>
        <div class="image-fields">
            <div id="select-image " class="select-image">
                <label for="image">Select Image</label>
                <input type="file" class="form-control" accept=".jpg, .jpeg, .png" name="image[]" required>
            </div>
        </div>
    </div>
    <div class="add-category-btn w-50 gap-5 container-fluid d-flex">
        <button id="clickonbtn" class="form-control btn-info mt-5 text-light">Add More</button>
        <button id="deletebtn" class="form-control btn-danger mt-5 text-light">Remove</button>
    </div>
    <div class="add-category-btn">
        <input type="submit" value="Add Gallery" class="form-control btn-success mt-5 w-50 container-fluid"
            name="Add-Category">
    </div>
</form>


<script>
    document.querySelector('form').addEventListener('click', function (event) {
        if (event.target && event.target.id === 'clickonbtn') {

            const galleryFields = document.querySelector('.image-fields');
            const newImageInput = document.createElement("div");
            newImageInput.innerHTML = "<label for='image'>Select Image</label><input type='file' class='form-control' accept='.jpg, .jpeg, .png' name='image[]' required>";

            galleryFields.appendChild(newImageInput);
        }
        else if (event.target && event.target.id === 'deletebtn') {

            const galleryFields = document.querySelector('.image-fields');
            const galleryInputs = galleryFields.querySelectorAll('div');

            galleryFields.removeChild(galleryInputs[galleryInputs.length - 1]);
        }
    });
</script>

</body>

</html>