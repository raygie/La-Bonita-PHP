  <?php
    include '../includes/sessions.php';
    require '../includes/connection.php';

    if (!empty($_POST['currentpw']) && !empty($_POST['newpw']) && !empty($_POST['renewpw'])) {
        $username = $_SESSION["username"];
        $result = mysqli_query($conn, "select password from admin_login where name='$username'");
        $currentpw = $_POST['currentpw'];
        $newpw = $_POST['newpw'];
        $renewpw = $_POST['renewpw'];

        foreach ($result as $data) {
            if (!password_verify($currentpw, $data['password']) || !($newpw == $renewpw)) {
                echo ' <p class="text-danger">Passwords do not match</p>';
            } else {
                $hashed_password = password_hash($newpw, PASSWORD_DEFAULT);
                $updatepassword = "update admin_login set password='$hashed_password'where name='$username'";
                $conn->query($updatepassword);
                echo ' <p class="text-success">Password succesfully updated</p>';
            }
        }
    } else {
        echo ' <p class="text-danger">Please fill out all the forms</p>';
    }