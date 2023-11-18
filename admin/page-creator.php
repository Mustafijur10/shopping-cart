<?php
include '../session.php';
include '../db.php';
include 'nav.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $cname = $_POST['cname'];
    $tarea = $_POST['tarea'];


    $query = "INSERT INTO pages (name, content) VALUES ('$cname','$tarea')";
    $results = mysqli_query($connection, $query);

    if ($results) {
        header("location:page-edit.php");
    } else {
        header("location:page-creator.php");
    }
}
?>

<form action="#" method="POST" class="w-50">

    <h1 class="text-center">Create a New Page</h1>

    <div class="category-content">
        <div>
            <label for="cname">Page Name</label>
            <input type="text" name="cname" id="" class="form-control" required>
        </div>
        <div class="description">
            <label for="tarea">Page Content</label>
            <textarea name="tarea" id="" cols="21" rows="5" class="form-control" required></textarea>
        </div>

        <div class="add-category-btn">
            <input type="submit" value="Create Page" class="form-control btn-success mt-5" name="Add-Category">

        </div>
    </div>
</form>

<script>

</script>
</body>

</html>