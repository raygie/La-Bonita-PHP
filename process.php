<!-- backup email when up na hosting, nothing to do with code  -->
<?php 

    if(isset($_POST['btn-send']))
    {
       $name = $_POST['name'];
       $email = $_POST['email'];
       $subject = $_POST['subject'];
       $msg = $_POST['msg'];

       if(empty($name) || empty($email) || empty($subject) || empty($msg))
       {
           header('location:Contacts.php?error');
       }
       else
       {
           $to = "labonitacosmeticsofficial@gmail.com";

           if(mail($to,$subject,$msg,$email))
           {
            // header('location:Contacts.php?sucess');
            echo "<script>alert('Posted Successfully');</script>
	        <script>window.location.href = 'Contact.php'";
           }
       }
    }
    else
    {
        header("location:Contacts.php");
    }



?>