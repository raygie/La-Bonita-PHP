<?php 

    if(isset($_POST['btn-send']))
    {
       $name = $_POST['name'];
       $email = $_POST['email'];
       $subject = $_POST['subject'];
       $msg = $_POST['msg'];

       if(empty($name) || empty($email) || empty($subject) || empty($msg))
       {
        //    header('location:Contacts.php?error');
            echo "<script>alert('Please Fill out all the fields');</script>
	        <script>window.location.href = 'Contacts.php'</script>";
       }
       else
       {
           $to = "labonitacosmeticsofficial@gmail.com";

           if(mail($to,$subject,$msg,$email))
           {
            //    header("location:Contacts.php?success");
                echo "<script>alert('Send Successfully');</script>
                <script>window.location.href = 'Contacts.php'</script>";
           }
       }
    }
    else
    {
        header("location:Contacts.php");
    }
?>