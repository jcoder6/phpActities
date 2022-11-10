<div class="overlay display-none"></div>
<div class="add-new-student-modal display-none">
    <div class="close-btn"><i class="fa-solid fa-xmark"></i></div>
    <h3>Add New Student</h3>
    <form action="#" method="POST">
        <div class="form-group">
            <label for="fname">Firstname:</label>
            <input type="text" placeholder="Firstname" name="fname" id="fname" required>
        </div>

        <div class="form-group">
            <label for="mname">Middlename:</label>
            <input type="text" placeholder="Middlename" name="mname" id="mname" required>
        </div>

        <div class="form-group">
            <label for="lname">Lastname:</label>
            <input type="text" placeholder="Lastname" name="lname" id="lname" required>
        </div>

        <div class="form-groups">
            <div class="form-group">
                <label for="brgy">Barangay:</label>
                <input type="text" placeholder="Barangay" name="brgy" id="brgy" required>
            </div>

            <div class="form-group">
                <label for="municipal">Municipality:</label>
                <input type="text" placeholder="Municipality" name="municipal" id="municipal" required>
            </div>

            <div class="form-group">
                <label for="province">Province:</label>
                <input type="text" placeholder="Province" name="province" id="province" required>
            </div>
        </div>

        <div class="form-group">
            <label for="email">Email:</label>
            <input type="text" placeholder="Email" name="email" id="email" required>
        </div>

        <input type="submit" value="Submit" name="submit" class="button-secondary submit-btn">
    </form>
</div>

<?php 
    if(isset($_POST['submit'])){
        $fullname = $_POST['fname'] . ' ' . $_POST['mname'] . ' ' . $_POST['lname'];
        $address = $_POST['brgy'] . ', ' . $_POST['municipal'] . ', ' . $_POST['province'];
        $studentID = 'STU-ID-00' . rand(0000, 9999);
        $email = $_POST['email'];

        $studentInputData = [
            'name' => sanitize($fullname),
            'stid' => sanitize($studentID),
            'addr' => sanitize($address),
            'email' => sanitize($email)
        ];

        $query = "INSERT INTO studentsinfo(name, address, idNumber, email) VALUES (:name, :addr, :stid, :email)";
        $stmt = $pdo->prepare($query);

        if($stmt->execute($studentInputData)){
            messageNotif('success', 'New Student Added!');
            echo '<script>location.href="'. ROOT_URL .'";</script>';
        } else {
            messageNotif('error', 'Something went wrong');
            echo '<script>location.href="'. ROOT_URL .'";</script>';
        }
    }

?>