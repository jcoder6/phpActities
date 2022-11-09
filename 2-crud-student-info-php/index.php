<?php include('./partials/header.php'); ?>
<!-- TABLE OF STUDENT INFORMATION -->

<div class="container table-container">
    <div class="table-header">
        <h5>Student Information Table</h5>
        <button class="add-student-btn button-secondary"><i class="fa-solid fa-plus"></i>Add new Student</button>
    </div>
    <table class="table">
        <thead>
            <tr>
                <th>Student ID</th>
                <th>Name</th>
                <th>Address</th>
                <th>Email</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody class="table-group-divider">
            <?php $studentsInfo = getStudentInfo($pdo) ?>
            <?php foreach($studentsInfo as $student): ?>
            <tr>
                <td><?= $student->idNumber ?></td>
                <td><?= $student->name ?></td>
                <td><?= $student->address ?></td>
                <td><?= $student->email ?></td>
                <td>
                    <a href="<?= ROOT_URL ?>index.php?view-student=<?=$student->id?>" class="button-primary">View</a>
                    <a href="" class="button-danger">Delete</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
<?php showMessage(); ?>
<!-- MODAL IN ADDING NEW STUDENT -->
<div class="overlay display-none"></div>
<div class="add-new-student-modal display-none">
    <div class="close-btn"><i class="fa-solid fa-xmark"></i></div>
    <h3>Add New Student</h3>
    <form action="#">
        <div class="form-group">
            <label for="fname">Firstname:</label>
            <input type="text" placeholder="Firstname" name="fname" id="fname">
        </div>

        <div class="form-group">
            <label for="mname">Middlename:</label>
            <input type="text" placeholder="Middlename" name="mname" id="mname">
        </div>

        <div class="form-group">
            <label for="lname">Lastname:</label>
            <input type="text" placeholder="Lastname" name="lname" id="lname">
        </div>

        <div class="form-groups">
            <div class="form-group">
                <label for="brgy">Barangay:</label>
                <input type="text" placeholder="Barangay" name="brgy" id="brgy">
            </div>

            <div class="form-group">
                <label for="municipal">Municipality:</label>
                <input type="text" placeholder="Municipality" name="municipal" id="municipal">
            </div>

            <div class="form-group">
                <label for="province">Province:</label>
                <input type="text" placeholder="Province" name="province" id="province">
            </div>
        </div>

        <div class="form-group">
            <label for="email">Email:</label>
            <input type="text" placeholder="Email" name="email" id="email">
        </div>

        <input type="submit" value="Submit" name="submit" class="button-secondary submit-btn">
    </form>
</div>

<?php displayViewStudent($pdo) ?>
<?php include('./partials/footer.php'); ?>

<?php
    function getStudentInfo($pdo) {
        $query = "SELECT * FROM studentsinfo";
        $stmt = $pdo->prepare($query);

        if($stmt->execute()){
            return $stmt->fetchAll(PDO::FETCH_OBJ);
        } else {
            echo 'SOMETHING WENT WRONG';
        }
    }

    function displayViewStudent($pdo) {
        if(isset($_GET['view-student'])){
            include('./view-student.php');
        }
    }
?>