<?php
include 'includes/connection.php';
$a=1;

?>
<!DOCTYPE html>
<html style="font-size: 16px;">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="page_type" content="np-template-header-footer-from-plugin">
    <title>Rebranding/Wholesale</title>
    <link rel="stylesheet" href="nicepage.css" media="screen">
    <link rel="stylesheet" href="all-products.css" media="screen">
    <script class="u-script" type="text/javascript" src="jquery.js" defer=""></script>
    <script class="u-script" type="text/javascript" src="nicepage.js" defer=""></script>
    <meta name="generator" content="Nicepage 4.10.2, nicepage.com">
    <link id="u-theme-google-font" rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i|Open+Sans:300,300i,400,400i,500,500i,600,600i,700,700i,800,800i">
    <link id="u-page-google-font" rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Montserrat:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i|Montserrat:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i|Caudex:400,400i,700,700i">



    <script type="application/ld+json">
    {
        "@context": "http://schema.org",
        "@type": "Organization",
        "name": "Labonita",
        "logo": "images/Labonita.png",
        "sameAs": [
            "https://www.facebook.com/LaBonitaCosmeticsByAnafara",
            "https://twitter.com/LaAnafara ",
            " https://www.instagram.com/la_bonita_cosmetics/",
            " https://www.linkedin.com/in/la-bonita-cosmetics-incorporated-ltd-073360232/",
            "https://www.pinterest.ph/labonitacosmeticsbyanafara/_saved/ ",
            "https://www.tiktok.com/@labonitacosmetics.ph?lang=en/ "
        ]
    }
    </script>
    <meta name="theme-color" content="#478ac9">
    <meta name="twitter:site" content="@">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="rw">
    <meta name="twitter:description" content="Labonita">
    <meta property="og:title" content="rw">
    <meta property="og:type" content="website">
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
    <section class="u-clearfix u-custom-color-3 u-section-1" id="sec-881b">
        <div class="u-align-left u-clearfix u-sheet u-sheet-1">
            <img class="u-hover-feature u-image u-image-round u-radius-35 u-image-1" src="images/Untitleddesign5-39.png"
                alt="" data-image-width="1600" data-image-height="900">
        </div>

    </section>
    <section class="u-align-center u-clearfix u-custom-color-3 u-section-2" id="sec-e548">
        <div class="u-clearfix u-sheet u-sheet-1">
            <p class="u-custom-font u-text u-text-default u-text-1">Rebrand & Wholesale</p>
            <div class="u-clearfix u-expanded-width u-layout-wrap u-layout-wrap-1">
                <div class="u-layout">
                    <div class="u-layout-row">
                        <?php
                        $sql = "SELECT * FROM products WHERE prod_category ='Rebranding/Wholesale' ORDER BY date_created desc";
                        $result = $conn->query($sql);
                        while($row=$result->fetch_assoc()){ 
                    ?>
                        <div
                            class="u-align-center u-container-style u-layout-cell u-size-15 u-size-30-md u-layout-cell-1">

                            <div class="u-container-layout u-container-layout-1">


                                <?php echo '<img alt="products"
                                class=" u-hover-feature u-image u-image-round u-preserve-proportions u-radius-22 u-image-1"
                                src="admin/includes/prodpic/'.$row['prod_image'].'" alt="" data-image-width="500" data-image-height="500">'
                                ?>
                                <p class="u-text u-text-2"><?= $row['prod_name'];?></p>
                                <p class="u-text u-text-3"><?= $row['prod_price'];?></p>
                                <a href="<?= $row['link'];?>"
                                    class="u-border-2 u-border-custom-color-5 u-btn u-btn-round u-button-style u-custom-font u-font-montserrat u-hover-custom-color-4 u-none u-radius-10 u-text-hover-white u-btn-1">BUY
                                    NOW</a>
                            </div>
                        </div>
                        <?php
            }?>

                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php include './includes/footer.php'?>
</body>

</html>