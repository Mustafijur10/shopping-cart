<?php
include '../session.php';
include '../db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $cname = $_POST['cname'];
    $tarea = $_POST['tarea'];

    $existedCategory = "select * from categories where name ='" . $cname . "'";
    $searchInCategory = mysqli_query($connection, $existedCategory);
    $row = mysqli_fetch_array($searchInCategory);

    if ($row["status"] === '1') {
        header("location:adminPage.php");
    } else {
        $query = "INSERT INTO categories (name, description, status) VALUES ('$cname','$tarea', 1)";
        $results = mysqli_query($connection, $query);

        if ($results) {
            header("location:category-details.php");
        } else {
            header("location:add-category.php");
        }
    }
}
include 'nav.php';
?>



<form action="#" method="POST" class="w-50">

    <h1>Create Category</h1>

    <div class="category-content">
        <div>
            <label for="cname">Enter Category Name</label>
            <input type="text" name="cname" id="" class="form-control" required>
        </div>
        <div class="description">
            <label for="tarea">Category Description</label>
            <textarea name="tarea" id="" cols="21" rows="5" class="form-control"></textarea>
        </div>

        <div class="add-category-btn">
            <input type="submit" value="Add Category" class="form-control btn-success mt-5" name="Add-Category">
        </div>
    </div>
</form>
</div>
</div>
</div>
</div>
</body>

</html>