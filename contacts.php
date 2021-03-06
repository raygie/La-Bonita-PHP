<!-- Fetch setting information -->
<?php
include 'includes/connection.php';
$sql = mysqli_query($conn, "SELECT * FROM settings");
$fetch = mysqli_fetch_array($sql);
?>
<!DOCTYPE html>
<html style="font-size: 16px;">

<head>
    <meta name="keywords" content="Contact us, follow us, contact form">
    <title>Contacts</title>
    <link rel="stylesheet" href="contacts.css" media="screen">
    <?php include './includes/meta/meta.php'; ?>
    <?php include './includes/meta/script.php'; ?>
    <?php include './includes/meta/favicons.php'; ?>
    <meta name="twitter:title" content="Contacts">
    <meta property="og:title" content="Contacts">
</head>

<body class="u-body u-xl-mode">
    <header class="u-clearfix u-custom-color-3 u-header u-sticky u-header" id="sec-3417">
        <div class="u-clearfix u-sheet u-valign-middle-xs u-sheet-1">
            <a href="home.php" data-page-id="235967989" class="u-hover-feature u-image u-logo u-image-1"
                data-image-width="500" data-image-height="500" title="Home">
                <img src="images/Labonita.png" class="u-logo-image u-logo-image-1">
            </a>
            <?php include './includes/navigation-bar.php'; ?>
        </div>
    </header>
    <section class="u-clearfix u-custom-color-3 u-section-1" id="carousel_fd98">
        <div class="u-clearfix u-sheet u-valign-middle-lg u-sheet-1">
            <h2 class="u-custom-font u-text u-text-1">Contact us</h2>
            <a href="tel:<?= $fetch['phone']; ?>"
                class="u-active-none u-bottom-left-radius-0 u-bottom-right-radius-0 u-btn u-btn-rectangle u-button-style u-hover-none u-none u-radius-0 u-top-left-radius-0 u-top-right-radius-0 u-btn-1"><span
                    class="u-icon u-text-custom-color-5"><svg class="u-svg-content" viewBox="0 0 405.333 405.333"
                        x="0px" y="0px" style="width: 1em; height: 1em;">
                        <path
                            d="M373.333,266.88c-25.003,0-49.493-3.904-72.704-11.563c-11.328-3.904-24.192-0.896-31.637,6.699l-46.016,34.752    c-52.8-28.181-86.592-61.952-114.389-114.368l33.813-44.928c8.512-8.512,11.563-20.971,7.915-32.64    C142.592,81.472,138.667,56.96,138.667,32c0-17.643-14.357-32-32-32H32C14.357,0,0,14.357,0,32    c0,205.845,167.488,373.333,373.333,373.333c17.643,0,32-14.357,32-32V298.88C405.333,281.237,390.976,266.88,373.333,266.88z">
                        </path>
                    </svg><img></span> <?= $fetch['phone']; ?>
            </a>
            <h2 class="u-text u-text-2">follow us</h2>
            <div class="u-social-icons u-spacing-20 u-social-icons-1">
                <a class="u-social-url" target="_blank" href="<?= $fetch['facebook']; ?>" title="Facebook"><span
                        class="u-icon u-icon-circle u-social-facebook u-social-icon u-text-custom-color-5 u-icon-2">
                        <svg class="u-svg-link" preserveAspectRatio="xMidYMin slice" viewBox="0 0 112.2 112.2">
                            <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#svg-60de"></use>
                        </svg>
                        <svg x="0px" y="0px" viewBox="0 0 112.2 112.2" style="enable-background:new 0 0 112.2 112.2;"
                            xml:space="preserve" id="svg-60de" class="u-svg-content">
                            <path
                                d="M56.1,0C25.1,0,0,25.1,0,56.1c0,31,25.1,56.1,56.1,56.1c31,0,56.1-25.1,56.1-56.1C112.2,25.1,87.1,0,56.1,0z M71.6,34.3h-8.2c-1.3,0-3.2,0.7-3.2,3.5v7.6h11.3l-1.3,12.9h-10V95H45V58.3h-7.2V45.4H45v-8.3c0-6,2.8-15.3,15.3-15.3l11.2,0V34.3z ">
                            </path>
                        </svg>
                    </span>
                </a>
                <a class="u-social-url" target="_blank" href="<?= $fetch['twitter']; ?> " title="Twitter"><span
                        class="u-icon u-icon-circle u-social-icon u-social-twitter u-text-custom-color-5 u-icon-3">
                        <svg class="u-svg-link" preserveAspectRatio="xMidYMin slice" viewBox="0 0 112.2 112.2">
                            <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#svg-b336"></use>
                        </svg>
                        <svg x="0px" y="0px" viewBox="0 0 112.2 112.2" style="enable-background:new 0 0 112.2 112.2;"
                            xml:space="preserve" id="svg-b336" class="u-svg-content">
                            <path
                                d="M56.1,0C25.1,0,0,25.1,0,56.1s25.1,56.1,56.1,56.1s56.1-25.1,56.1-56.1S87.1,0,56.1,0z M83.8,47.3 c0,0.6,0,1.2,0,1.7c0,17.7-13.5,38.2-38.2,38.2c-7.6,0-14.6-2.2-20.6-6c1,0.1,2.1,0.2,3.2,0.2c6.3,0,12.1-2.1,16.7-5.7 c-5.9-0.1-10.8-4-12.5-9.3c0.8,0.2,1.7,0.2,2.5,0.2c1.2,0,2.4-0.2,3.5-0.5c-6.1-1.2-10.8-6.7-10.8-13.1c0-0.1,0-0.1,0-0.2 c1.8,1,3.9,1.6,6.1,1.7c-3.6-2.4-6-6.5-6-11.2c0-2.5,0.7-4.8,1.8-6.7c6.6,8.1,16.5,13.5,27.6,14c-0.2-1-0.3-2-0.3-3.1 c0-7.4,6-13.4,13.4-13.4c3.9,0,7.3,1.6,9.8,4.2c3.1-0.6,5.9-1.7,8.5-3.3c-1,3.1-3.1,5.8-5.9,7.4c2.7-0.3,5.3-1,7.7-2.1 C88.7,43,86.4,45.4,83.8,47.3z">
                            </path>
                        </svg>
                    </span>
                </a>
                <a class="u-social-url" target="_blank" href="<?= $fetch['instagram']; ?>" title="Instagram"><span
                        class="u-icon u-icon-circle u-social-icon u-social-instagram u-text-custom-color-5 u-icon-4">
                        <svg class="u-svg-link" preserveAspectRatio="xMidYMin slice" viewBox="0 0 112.2 112.2">
                            <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#svg-1dc5"></use>
                        </svg>
                        <svg x="0px" y="0px" viewBox="0 0 112.2 112.2" style="enable-background:new 0 0 112.2 112.2;"
                            xml:space="preserve" id="svg-1dc5" class="u-svg-content">
                            <path
                                d="M56.1,0C25.1,0,0,25.1,0,56.1c0,31,25.1,56.1,56.1,56.1c31,0,56.1-25.1,56.1-56.1C112.2,25.1,87.1,0,56.1,0z M90.6,73.4c0,9.6-7.8,17.5-17.5,17.5H38.6c-9.6,0-17.5-7.9-17.5-17.6V38.8c0-9.6,7.8-17.5,17.5-17.5h34.5c9.6,0,17.5,7.8,17.5,17.5 V73.4z">
                            </path>
                            <path
                                d="M73.1,28.9H38.6c-5.4,0-9.9,4.4-9.9,9.9v34.5c0,5.4,4.4,9.9,9.9,9.9h34.5c5.4,0,9.9-4.4,9.9-9.9V38.8 C83,33.4,78.6,28.9,73.1,28.9z M55.9,74C46,74,38,66,38,56.1c0-9.9,8-17.9,17.9-17.9c9.9,0,17.9,8,17.9,17.9 C73.8,66,65.8,74,55.9,74z M74.3,41.9c-2.3,0-4.2-1.9-4.2-4.2s1.9-4.2,4.2-4.2c2.3,0,4.2,1.9,4.2,4.2S76.6,41.9,74.3,41.9z">
                            </path>
                            <path
                                d="M55.9,45.8c-5.7,0-10.4,4.6-10.3,10.3c0,5.7,4.6,10.3,10.3,10.3s10.3-4.6,10.3-10.3 C66.2,50.4,61.6,45.8,55.9,45.8z">
                            </path>
                        </svg>
                    </span>
                </a>
                <a class="u-social-url" target="_blank" href="mailto: <?= $fetch['email']; ?>" title="Google"><span
                        class="u-file-icon u-icon u-social-google u-social-icon u-text-custom-color-5 u-icon-5"><img
                            src="images/30.png" alt=""></span>
                </a>
            </div>
            <p class="u-text u-text-3">??2022 Privacy policy</p>
            <img class="u-image u-image-round u-radius-27 u-image-1"
                src="images/4d42760e0badd8ce459d19f7e943f5ecd2b2c942447af5aab19ad01127c281aae2c4d2a0723f535b8eec674f65c195da31468d9a647f2726b74152_1280.jpg"
                alt="" data-image-width="852" data-image-height="1280">
        </div>
    </section>
    <section class="u-clearfix u-custom-color-3 u-expanded-width-xl u-section-2" id="carousel_6062">
        <div class="u-clearfix u-sheet u-sheet-1">
            <div class="u-clearfix u-gutter-0 u-layout-wrap u-layout-wrap-1">
                <div class="u-gutter-0 u-layout">
                    <div class="u-layout-row">
                        <div class="u-size-60">
                            <div class="u-layout-row">
                                <div class="u-container-style u-layout-cell u-right-cell u-size-60 u-layout-cell-1">
                                    <div class="u-container-layout u-container-layout-1">
                                        <h2 class="u-custom-font u-text u-text-1">Contact form</h2>
                                        <div class="u-expanded-width u-form u-form-1">
                                            <!-- <form action="./includes/email.php" method="POST"> -->
                                            <form method="POST">
                                                <div class="u-form-group u-form-name">
                                                    <label for="name-e4cc"
                                                        class="u-custom-font u-font-montserrat u-form-control-hidden u-label">Name</label>
                                                    <input type="text" placeholder="Enter your Name" id="name-e4cc"
                                                        name="name" onkeypress="return /[A-Za-z ]/i.test(event.key)"
                                                        class="u-border-no-bottom u-border-no-left u-border-no-right u-border-no-top u-grey-5 u-input u-input-rectangle u-radius-10"
                                                        required="">
                                                </div>
                                                <br>
                                                <div class="u-form-email u-form-group">
                                                    <label for="email-e4cc"
                                                        class="u-custom-font u-font-montserrat u-form-control-hidden u-label">Email</label>
                                                    <input type="email" placeholder="Enter a valid email address"
                                                        id="email-e4cc" name="email"
                                                        class="u-border-no-bottom u-border-no-left u-border-no-right u-border-no-top u-grey-5 u-input u-input-rectangle u-radius-10"
                                                        required="">
                                                </div>
                                                <br>
                                                <div class="u-form-group u-form-select u-form-group-3">
                                                    <label for="select-24cd"
                                                        class="u-custom-font u-font-montserrat u-label">Message
                                                        Type:</label>
                                                    <div class="u-form-select-wrapper">
                                                        <select id="select-24cd" name="subject"
                                                            class="u-border-no-bottom u-border-no-left u-border-no-right u-border-no-top u-grey-5 u-input u-input-rectangle u-radius-10">
                                                            <option value="Inquiry">Inquiry</option>
                                                            <option value="Feedback">Feedback</option>
                                                            <option value="Concerns">Concerns</option>
                                                        </select>
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="12"
                                                            version="1" class="u-caret">
                                                            <path fill="currentColor" d="M4 8L0 4h8z"></path>
                                                        </svg>
                                                    </div>
                                                    <br>
                                                </div>
                                                <div class="u-form-group u-form-message">
                                                    <label for="message-e4cc"
                                                        class="u-custom-font u-font-montserrat u-form-control-hidden u-label">Message</label>
                                                    <textarea placeholder="Enter your message" rows="4" cols="50"
                                                        id="message-e4cc" name="msg"
                                                        class="u-border-no-bottom u-border-no-left u-border-no-right u-border-no-top u-grey-5 u-input u-input-rectangle u-radius-10"
                                                        required=""></textarea>
                                                </div>
                                                <br>
                                                <div class="u-align-center u-form-group u-form-submit">
                                                    <button
                                                        class="u-border-2 u-border-custom-color-5 u-border-hover-custom-color-4 u-btn u-btn-round u-btn-submit u-button-style u-radius-20 u-btn-1"
                                                        name="btn-send">Submit</button>
                                                </div>
                                            </form>
                                            <!-- PHPMailer Function -->
                                            <?php

                                            use PHPMailer\PHPMailer\PHPMailer;
                                            use PHPMailer\PHPMailer\SMTP;
                                            use PHPMailer\PHPMailer\Exception;

                                            // Add required dependencies
                                            require('PHPMailer/Exception.php');
                                            require('PHPMailer/PHPMailer.php');
                                            require('PHPMailer/SMTP.php');

                                            // Form validation
                                            if (isset($_POST['btn-send'])) {
                                                $name = $_POST['name'];
                                                $email = $_POST['email'];
                                                $subject = $_POST['subject'];
                                                $msg = $_POST['msg'];
                                                $mail = new PHPMailer(true);

                                                try {
                                                    //Server settings
                                                    // $mail->isSMTP();                                         //Send using SMTP
                                                    $mail->Host       = 'smtp.gmail.com';                       //Set the SMTP server to send through
                                                    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
                                                    $mail->Username   = 'labonitacosmeticsofficial@gmail.com';  //SMTP username
                                                    $mail->Password   = '!@labonita';                           //SMTP password
                                                    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
                                                    $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

                                                    //Recipients
                                                    $mail->setFrom($email, $name);
                                                    $mail->addAddress('labonitacosmeticsofficial@gmail.com');    //Name is optional

                                                    //Content
                                                    $mail->isHTML(true);                                         //Set email format to HTML
                                                    $mail->Subject = "$subject";
                                                    $mail->Body    = "Name: $name <br> Email: $email <br> Message: $msg <br>";
                                                    // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

                                                    $mail->send();
                                                    echo "<script>alert('Message has been sent')</script>";
                                                } catch (Exception $e) {
                                                    echo "<script>alert('Message could not be sent. Mailer Error: {$mail->ErrorInfo}')</script>";
                                                }
                                            }
                                            ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <footer class="u-align-left-md u-align-left-sm u-align-left-xs u-clearfix u-custom-color-4 u-footer" id="sec-84aa">
        <div class="u-clearfix u-sheet u-valign-left-lg u-valign-left-md u-sheet-1">

            <?php include './includes/footer.php'; ?>

    </footer>
</body>

</html>