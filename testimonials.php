<?php
include 'includes/connection.php';
$a=1;

?>

<!DOCTYPE html>
<html style="font-size: 16px;">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
    <meta name="keywords" content="What our customers say?">
    <meta name="description" content="">
    <meta name="page_type" content="np-template-header-footer-from-plugin">
    <title>Testimonials</title>
    <link rel="stylesheet" href="nicepage.css" media="screen">
    <link rel="stylesheet" href="testimonials.css" media="screen">
    <script class="u-script" type="text/javascript" src="jquery.js" defer=""></script>
    <script class="u-script" type="text/javascript" src="nicepage.js" defer=""></script>
    <meta name="generator" content="Nicepage 4.10.2, nicepage.com">
    <link id="u-theme-google-font" rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i|Open+Sans:300,300i,400,400i,500,500i,600,600i,700,700i,800,800i">
    <link id="u-page-google-font" rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Montserrat:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i|Montserrat:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i|Caudex:400,400i,700,700i">

    <?php include './includes/meta/script.php' ?>
    <?php include './includes/meta/favicons.php' ?>

    <meta name="theme-color" content="#478ac9">
    <meta name="twitter:site" content="@">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="Testimonials">
    <meta name="twitter:description" content="Labonita">
    <meta property="og:title" content="Testimonials">
    <meta property="og:type" content="website">
</head>

<body class="u-body u-xl-mode">
    <header class="u-clearfix u-custom-color-3 u-header u-sticky u-header" id="sec-3417">
        <div class="u-clearfix u-sheet u-valign-middle-xs u-sheet-1">
            <a href="home.php" data-page-id="235967989" class="u-hover-feature u-image u-logo u-image-1"
                data-image-width="500" data-image-height="500" title="Home">
                <img src="images/Labonita.png" class="u-logo-image u-logo-image-1">
            </a>
            <nav class="u-dropdown-icon u-menu u-menu-dropdown u-offcanvas u-menu-1">
                <div class="menu-collapse u-custom-font"
                    style="font-size: 1rem; letter-spacing: 0px; font-family: Montserrat;">
                    <a class="u-button-style u-custom-left-right-menu-spacing u-custom-padding-bottom u-custom-text-active-color u-custom-text-hover-color u-custom-top-bottom-menu-spacing u-nav-link u-text-active-palette-1-base u-text-hover-palette-2-base"
                        href="#">
                        <svg class="u-svg-link" viewBox="0 0 24 24">
                            <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#menu-hamburger"></use>
                        </svg>
                        <svg class="u-svg-content" version="1.1" id="menu-hamburger" viewBox="0 0 16 16" x="0px" y="0px"
                            xmlns:xlink="http://www.w3.org/1999/xlink" xmlns="http://www.w3.org/2000/svg">
                            <g>
                                <rect y="1" width="16" height="2"></rect>
                                <rect y="7" width="16" height="2"></rect>
                                <rect y="13" width="16" height="2"></rect>
                            </g>
                        </svg>
                    </a>
                </div>
                <div class="u-custom-menu u-nav-container">
                    <ul class="u-custom-font u-nav u-unstyled u-nav-1">
                        <li class="u-nav-item"><a
                                class="u-button-style u-nav-link u-text-active-palette-2-base u-text-hover-custom-color-5"
                                href="home.php" style="padding: 10px 20px;">Home</a>
                        </li>
                        <li class="u-nav-item"><a
                                class="u-button-style u-nav-link u-text-active-palette-2-base u-text-hover-custom-color-5"
                                href="about-us.php" style="padding: 10px 20px;">About Us</a>
                        </li>
                        <li class="u-nav-item"><a
                                class="u-button-style u-nav-link u-text-active-palette-2-base u-text-hover-custom-color-5"
                                href="objectives.php" style="padding: 10px 20px;">Objectives</a>
                        </li>
                        <li class="u-nav-item"><a
                                class="u-button-style u-nav-link u-text-active-palette-2-base u-text-hover-custom-color-5"
                                href="products.php" style="padding: 10px 20px;">Products</a>
                            <div class="u-nav-popup">
                                <ul class="u-h-spacing-20 u-nav u-unstyled u-v-spacing-10">
                                    <li class="u-nav-item"><a class="u-button-style u-custom-color-3 u-nav-link"
                                            href="all-products.php">All Products</a>
                                    </li>
                                    <li class="u-nav-item"><a class="u-button-style u-custom-color-3 u-nav-link"
                                            href="retail-sample.php">Retail/Samples</a>
                                    </li>
                                    <li class="u-nav-item"><a class="u-button-style u-custom-color-3 u-nav-link"
                                            href="rebranding-wholesale.php">Rebranding/Wholesale</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="u-nav-item"><a
                                class="u-button-style u-nav-link u-text-active-palette-2-base u-text-hover-custom-color-5"
                                href="contacts.php" style="padding: 10px 20px;">Contacts</a>
                        </li>
                        <li class="u-nav-item"><a
                                class="u-button-style u-nav-link u-text-active-palette-2-base u-text-hover-custom-color-5"
                                href="testimonials.php" style="padding: 10px 20px;">Testimonials</a>
                        </li>
                    </ul>
                </div>

                <div class="u-custom-menu u-nav-container-collapse">
                    <div class="u-black u-container-style u-inner-container-layout u-opacity u-opacity-95 u-sidenav">
                        <div class="u-inner-container-layout u-sidenav-overflow">
                            <div class="u-menu-close"></div>
                            <ul class="u-align-center u-nav u-popupmenu-items u-unstyled u-nav-3">
                                <li class="u-nav-item"><a class="u-button-style u-nav-link" href="home.php">Home</a>
                                </li>
                                <li class="u-nav-item"><a class="u-button-style u-nav-link" href="about-us.php">About
                                        Us</a>
                                </li>
                                <li class="u-nav-item"><a class="u-button-style u-nav-link"
                                        href="objectives.php">Objectives</a>
                                </li>
                                <li class="u-nav-item"><a class="u-button-style u-nav-link"
                                        href="products.php">Products</a>
                                    <div class="u-nav-popup">
                                        <ul class="u-h-spacing-20 u-nav u-unstyled u-v-spacing-10">
                                            <li class="u-nav-item"><a class="u-button-style u-custom-color-3 u-nav-link"
                                                    href="all-products.php">All Products</a>
                                            </li>
                                            <li class="u-nav-item"><a class="u-button-style u-custom-color-3 u-nav-link"
                                                    href="retail-sample.php">Retail/Samples</a>
                                            </li>
                                            <li class="u-nav-item"><a class="u-button-style u-custom-color-3 u-nav-link"
                                                    href="rebranding-wholesale.php">Rebranding/Wholesale</a>
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                                <li class="u-nav-item"><a class="u-button-style u-nav-link"
                                        href="contacts.php">Contacts</a>
                                </li>
                                <li class="u-nav-item"><a class="u-button-style u-nav-link"
                                        href="testimonials.php">Testimonials</a>
                                </li>
                            </ul>
                        </div>

                    </div>
                    <div class="u-black u-menu-overlay u-opacity u-opacity-70"></div>
                </div>
            </nav>
        </div>
    </header>
    <section class="u-align-center u-clearfix u-custom-color-3 u-section-1" id="sec-847c">
        <div class="u-clearfix u-sheet u-valign-middle-md u-valign-middle-sm u-valign-middle-xs u-sheet-1">
            <h2 class="u-custom-font u-text u-text-1">What our customers say?</h2>
            <p class="u-text u-text-2"><a href=""
                    class="u-active-none u-border-1 u-border-grey-75 u-btn u-button-link u-button-style u-hover-none u-none u-text-body-color u-btn-1"
                    target="_blank"></a>
            </p>
            <div class="u-expanded-width u-list u-list-1">
                <div class="u-repeater u-repeater-1">
                    <style>
                    .avatar {
                        vertical-align: middle;
                        width: 6.8rem;
                        height: 6.8rem;
                        border-radius: 50%;
                        margin: 0 auto;
                    }
                    </style>
                    <?php
                        $sql = "SELECT * FROM testimonials ORDER BY date_created desc";
                        $result = $conn->query($sql);
                        while($row=$result->fetch_assoc()){ 
                    ?>
                    <div class="u-container-style u-list-item u-repeater-item">
                        <div
                            class="u-container-layout u-similar-container u-valign-bottom-md u-valign-bottom-sm u-valign-bottom-xs u-valign-top-lg u-valign-top-xl u-container-layout-1">
                            <?php echo '<img src="admin/includes/testipic/'.$row['testi_image'].'"alt="Avatar" class="avatar">'?>
                            <p class="u-align-justify u-text u-text-3">“<?php echo $row['input_testi']?>”
                            </p>
                            <h5 class="u-align-center u-text u-text-4"><?php echo $row['input_name']?></h5>
                            <h6 class="u-align-center u-text u-text-5"><?php echo $row['input_position']?></h6>
                        </div>
                    </div>
                    <?php 
                        }
                    ?>
                </div>
            </div>
        </div>
    </section>


    <?php include './includes/footer.php'?>

</body>

</html>