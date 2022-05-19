<?php
include 'includes/connection.php';
$a = 1;

?>

<!DOCTYPE html>
<html style="font-size: 16px;">

<head>
    <meta name="keywords" content="">
    <title>All Products</title>
    <link rel="stylesheet" href="all-products.css" media="screen">
    <?php include './includes/meta/meta.php'; ?>
    <?php include './includes/meta/script.php'; ?>
    <?php include './includes/meta/favicons.php'; ?>
    <meta name="twitter:title" content="All Products">
    <meta property="og:title" content="All Products">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body class="u-body u-xl-mode">
    <header class="u-clearfix u-custom-color-3 u-header u-sticky u-header" id="sec-3417">
        <div class="u-clearfix u-sheet u-valign-middle-xs u-sheet-1">
            <a href="home.php" data-page-id="235967989" class="u-hover-feature u-image u-logo u-image-1" data-image-width="500" data-image-height="500" title="Home">
                <img src="images/Labonita.png" class="u-logo-image u-logo-image-1">
            </a>
            <?php include './includes/navigation-bar.php'; ?>
        </div>
    </header>
    <section class="u-clearfix u-custom-color-3 u-section-1" id="sec-ff46">
        <div class="u-align-left u-clearfix u-sheet u-sheet-1">
            <img class="u-hover-feature u-image u-image-round u-radius-35 u-image-1" src="images/Untitleddesign4-38.png" alt="" data-image-width="1600" data-image-height="900">
        </div>
    </section>
    <section class="u-align-center u-clearfix u-custom-color-3 u-section-2" id="sec-e02f">
        <div class="u-clearfix u-sheet u-sheet-1">
            <p class="u-custom-font u-text u-text-default u-text-1">All Products</p>
            <div class="u-clearfix u-expanded-width u-layout-wrap u-layout-wrap-1">
                <div class="u-layout">
                    <div class="u-layout-row">
                        <?php
                        $sql = "SELECT * FROM products ORDER BY date_created desc";
                        $result = $conn->query($sql);
                        while ($row = $result->fetch_assoc()) {
                        ?>
                            <div class="u-align-center u-container-style u-layout-cell u-size-15 u-size-30-md u-layout-cell-1">
                                <div class="u-container-layout u-container-layout-1">
                                    <?php echo '<img alt="products"
                                class=" u-hover-feature u-image u-image-round u-preserve-proportions u-radius-22 u-image-1"
                                src="admin/includes/prodpic/' . $row['prod_image'] . '" alt="" data-image-width="500" data-image-height="500">'
                                    ?>
                                    <p class="u-text u-text-2"><?= $row['prod_name']; ?></p>
                                    <p class="u-text u-text-4 u-text-custom-color-5" style="margin-bottom: 10px">
                                        <?= $row['prod_price']; ?></p>
                                    <?php echo '<a class="u-text u-text-4 u-text-custom-color-4 u-hover-color-5" target="_blank"  href=single-product.php?id=' . $row['id'] . '>See More <i class="fas fa-arrow-right"></i></a>' ?>
                                    <a target="_blank" href="<?= $row['link']; ?>" class="u-border-2 u-border-custom-color-5 u-btn u-btn-round u-button-style u-custom-font u-font-montserrat u-hover-custom-color-4 u-none u-radius-10 u-text-hover-white u-btn-1">BUY
                                        NOW</a>
                                </div>
                            </div>
                        <?php
                        } ?>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>
    <?php include './includes/footer.php'; ?>
</body>

</html>