<?php $currStudent = fetchCurrentStudent($pdo, $_GET['view-student']) ?>

<div class="overlay"></div>
<div class="add-new-student-modal modal-active">
    <div class="close-btn close-btn-view"><i class="fa-solid fa-xmark"></i></div>
    <h3>View Student</h3>
    <form action="" method="POST">

        <div class="form-group align-self-center">
            <label> Student ID: <span class="st-id"><?= $currStudent->idNumber ?></span></label>
        </div>

        <div class="form-group">
            <label for="name">Fullname:</label>
            <input type="text" placeholder="Fullname" name="name" id="name" value="<?= $currStudent->name ?>">
        </div>

        <div class="form-group">
            <label for="address">Address:</label>
            <input type="text" placeholder="Address" name="address" id="address" value="<?= $currStudent->address ?>">
        </div>

        <div class="form-group">
            <label for="email">Email:</label>
            <input type="text" placeholder="Email" name="email" id="email" value="<?= $currStudent->email ?>">
        </div>

        <input type="submit" value="Edit" name="edit" class="button-secondary submit-btn">
    </form>
</div>

<?php
    function fetchCurrentStudent($pdo, $id) {
        $query = "SELECT * FROM studentsinfo WHERE id = $id";
        $stmt = $pdo->prepare($query);

        if($stmt->execute()){
            return $stmt->fetch(PDO::FETCH_OBJ);
        } else {
            echo 'SOMETHING WENT WRONG';
        }
    }

    if(isset($_POST['edit'])){
        $stdData = [
            'name' => sanitize($_POST['name']),
            'address' => sanitize($_POST['address']),
            'email' => sanitize($_POST['email']),
            'id' => $_GET['view-student']
        ];

        try {
            $query = "UPDATE studentsinfo SET name = :name, address = :address, email = :email WHERE id = :id";
            $stmt = $pdo->prepare($query);
            if($stmt->execute($stdData)){
                messageNotif('success', 'Updated Successfuly');
                echo '<script>location.href="http://localhost/phpActivity/2-crud-student-info-php/";</script>';
            } else {
                messageNotif('erorr', 'Something Went Wrong');
                echo '<script>location.href="http://localhost/phpActivity/2-crud-student-info-php/";</script>';
            }
        } catch (PDOException $e) {
            echo 'Erorr Occur: ' . $e->getMessage();
        }

    }
?>