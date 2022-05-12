<?php
include 'includes/connection.php';
$a=1;
$id = $_GET['id'];
$products = mysqli_query($conn,"SELECT * FROM products WHERE id=$id");
$fetch = mysqli_fetch_array($products);

?>

<!DOCTYPE html>
<html style="font-size: 16px;">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="page_type" content="np-template-header-footer-from-plugin">
    <title>Product</title>
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
    <meta name="twitter:title" content="All Products">
    <meta name="twitter:description" content="Labonita">
    <meta property="og:title" content="All Products">
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

        </div>
        <div class="u-black u-menu-overlay u-opacity u-opacity-70"></div>
        </div>
        </nav>
        </div>
    </header>
    <section class="u-clearfix u-custom-color-3 u-section-1" id="sec-ff46">
        <div class="u-align-left u-clearfix u-sheet u-sheet-1">
            <img class="u-hover-feature u-image u-image-round u-radius-35 u-image-1" src="images/Untitleddesign4-38.png"
                alt="" data-image-width="1600" data-image-height="900">
        </div>

    </section>

    <section class="u-clearfix u-custom-color-3 u-section-2" id="sec-bb70">
        <div class="u-clearfix u-sheet u-sheet-1">
            <?php echo '<img alt="products"
                                class=" u-hover-feature u-image u-image-round u-preserve-proportions u-radius-22 u-image-1"
                                src="admin/includes/prodpic/'.$fetch['prod_image'].'" alt="" data-image-width="500" data-image-height="500">'
                                ?>
            <p class="u-custom-font u-text u-text-default u-text-1"><?= $fetch['prod_name'];?></p>
            <p class="u-align-justify u-custom-font u-font-montserrat u-large-text u-text u-text-variant u-text-2">
                <?= $fetch['prod_desc'];?></p>
            <div class="u-price u-text-custom-color-5" style="font-size: 1.5rem; font-weight: 700; margin-top: 20px">
                <?= $fetch['prod_price'];?>
            </div>
            <!-- <p class="u-text u-text-3"><?= $fetch['prod_price'];?></p> -->
            <a target="_blank" href="<?= $fetch['link'];?>"
                class="u-border-2 u-border-custom-color-5 u-btn u-btn-round u-button-style u-custom-font u-font-montserrat u-hover-custom-color-4 u-none u-radius-10 u-text-hover-white u-btn-1">BUY
                NOW</a>
        </div>
    </section>
    <?php include './includes/footer.php'?>
</body>

</html>