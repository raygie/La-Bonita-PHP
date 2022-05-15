<?php
include 'includes/connection.php';
$a=1;

?>

<!DOCTYPE html>
<html style="font-size: 16px;">

<head>
    <meta name="keywords" content="What our customers say?">
    <title>Testimonials</title>
    <link rel="stylesheet" href="testimonials.css" media="screen">
    <?php include './includes/meta/meta.php'; ?>
    <?php include './includes/meta/script.php'; ?>
    <?php include './includes/meta/favicons.php'; ?>
    <meta name="twitter:title" content="Testimonials">
    <meta property="og:title" content="Testimonials">
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
    <?php include './includes/footer.php'; ?>
</body>

</html>