<?php
if (isset($_SESSION['message'])):

    ?>
    <div class="alert alert-warnin alert-dismissible fade show" role="alert">
        <strong>Product Added!</strong>
        <?= $_SESSION['message']; ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria_label="close"></button>
    </div>

    <?php
    unset($_SESSION['message']);
endif;
?>