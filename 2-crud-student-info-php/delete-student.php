<style>
    .del-modal-container{
        background-color: white;
        width: 40vw;
        position: absolute;
        top: 5rem;
        left: 50%;
        transform: translate(-50%, -50%);
        border: 1px solid var(--yellow);
        border-radius: 10px;
        z-index: 3;
    }

    .del-modal-container .modal-title {
        border-radius: 10px 10px 0 0;
        padding: .5rem 1rem;
        background-color: var(--blue);
        color: var(--yellow);
        font-weight: bold;
    }

    .del-modal-container .modal-body {
        padding: 1rem;
        border-bottom: 1px solid var(--gray);
        font-weight: bold;
    }

    .del-modal-container .modal-btns {
        /* border: 1px solid black; */
        padding: .5rem;
        display: flex;
        justify-content: flex-end;
        gap: 1rem;
    }
</style>

<div class="overlay"></div>
<form action="" method="POST">
    <div class="del-modal-container">
        <div class="modal-title">Delete Student</div>
        <div class="modal-body">Are you sure do you want to delete this student?</div>
        <div class="modal-btns">
            <input type="submit" value="Close" class="button-secondary" name="close-del-modal">
            <input type="submit" value="Delete" class="button-danger" name="del-student">
        </div>
    </div>
</form>

<?php
    if(isset($_POST['close-del-modal'])){
        echo '<script>location.href="'. ROOT_URL .'";</script>';
    }

    if(isset($_POST['del-student'])){
        $id = $_GET['del-student'];
        $query = "DELETE FROM studentsinfo WHERE id = ?";
        $stmt = $pdo->prepare($query);

        if($stmt->execute([$id])){
            messageNotif('success', 'Deleted Succesfuly');
            echo '<script>location.href="'. ROOT_URL .'";</script>';
        } else {
            messageNotif('erorr', 'Something went wrong');
            echo '<script>location.href="'. ROOT_URL .'";</script>';
        }
    }
?>

