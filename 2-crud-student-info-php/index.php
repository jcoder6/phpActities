<!-- FOOTER PAGE -->
<?php include('./partials/header.php'); ?>

<?php showMessage(); ?>
<!-- TABLE OF STUDENT INFORMATION -->
<?php include('./students-table.php') ?>

<!-- MODAL IN ADDING NEW STUDENT -->
<?php include('./add-student.php') ?>

<!-- MODAL IN VIEWING STUDENT -->
<?php displayViewStudent($pdo) ?>

<!-- MODAL IN DELETING STUDENT -->
<?php deleteModal($pdo) ?>

<!-- FOOTER PAGE -->
<?php include('./partials/footer.php'); ?>

<?php
    function displayViewStudent($pdo) {
        if(isset($_GET['view-student'])){
            include('./view-student.php');
        }
    }

    function deleteModal($pdo) {
        if(isset($_GET['del-student'])){
            include('./delete-student.php');
        }
    }
?>