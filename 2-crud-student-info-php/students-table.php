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
                    <a href="<?= ROOT_URL ?>index.php?del-student=<?=$student->id?>" class="button-danger">Delete</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

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
?>