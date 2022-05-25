<!-- Footer of the Website -->

<?php
include 'includes/connection.php';
$sql = mysqli_query($conn, "SELECT * FROM settings");
$fetch = mysqli_fetch_array($sql);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>La Bonita Cosmetics</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
        integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
    .aa {
        color: white !important;
    }

    .aa {
        text-decoration: none;
    }

    .aa:hover {
        color: #fb914f !important;
    }
    </style>
</head>

<body>

    <footer class="text-white" style="background-color: #68322e">
        <!-- Grid container -->
        <div class="container p-4 pb-0">
            <!-- Section: Links -->
            <section class="">
                <!--Grid row-->
                <div class="row">
                    <!-- Grid column -->
                    <div class="col-md-12 col-lg-3 col-xl-3 mx-auto mt-3">
                        <h5 class="mb-4 font-weight-bold" style="color: #fb914f;">
                            La Bonita Cosmetics
                        </h5>
                        <p class="paragraph" style="font-size: 15px;">
                            La Bonita is a health and beauty product supplier located in Quezon City, Philippines, and
                            was established on 2020, 14th of July under Anafara Cosmetic Products Trading.
                        </p>
                    </div>
                    <!-- Grid column -->

                    <hr class="w-100 clearfix d-md-none" />

                    <!-- Grid column -->
                    <div class="col-md-4 col-lg-2 col-xl-2 mx-auto mt-3">
                        <h6 class="text-uppercase mb-4 font-weight-bold" style="color: #fb914f;">Products</h6>
                        <p class="paragraph" style="font-size: 15px;">
                            <a class="aa" href="all-products.php"> All Products</a>
                        </p>
                        <p class="paragraph" style="font-size: 15px;">
                            <a class="aa" href="retail-sample.php"> Retail</a>
                        </p>
                        <p class="paragraph" style="font-size: 15px;">
                            <a class="aa" href="rebranding-wholesale.php"> Rebranding</a>
                        </p>
                    </div>

                    <!-- Grid column -->
                    <hr class="w-100 clearfix d-md-none" />

                    <!-- Grid column -->
                    <div class="col-md-4 col-lg-2 col-xl-2 mx-auto mt-3">
                        <h6 class="text-uppercase mb-4 font-weight-bold" style="color: #fb914f;">Links</h6>
                        <p class="paragraph" style="font-size: 15px;">
                            <a class="aa" href="home.php"> Home</a>
                        </p>
                        <p class="paragraph" style="font-size: 15px;">
                            </i><a class="aa" href="about-us.php"> About Us</a>
                        </p>
                        <p class="paragraph" style="font-size: 15px;">
                            <a class="aa" href="objectives.php"> Objectives</a>
                        </p>
                    </div>

                    <!-- Grid column -->
                    <div class="col-md-4 col-lg-2 col-xl-2 mx-auto mt-3">
                        <h6 class="text-uppercase mb-4 font-weight-bold" style="color: #fb914f;">Follow us</h6>

                        <!-- Facebook -->
                        <a class="btn btn-primary btn-floating m-1"
                            style="background-color: #3b5998; border-radius: 25px; font-size: 12px;" target="_blank"
                            href="<?= $fetch['facebook']; ?>" role="button"><i class="fab fa-facebook-f"></i></a>

                        <!-- Twitter -->
                        <a class="btn btn-primary btn-floating m-1"
                            style="background-color: #55acee; border-radius: 25px; font-size: 12px;" target="_blank"
                            href="<?= $fetch['twitter']; ?>" role="button"><i class="fab fa-twitter"></i></a>

                        <!-- Google -->
                        <a class="btn btn-primary btn-floating m-1"
                            style="background-color: #dd4b39; border-radius: 25px; font-size: 12px;" target="_blank"
                            href="mailto: <?= $fetch['email']; ?>" role="button"><i class="fab fa-google"></i></a>

                        <!-- Instagram -->
                        <a class="btn btn-primary btn-floating m-1"
                            style="background-color: #ac2bac; border-radius: 25px; font-size: 12px;" target="_blank"
                            href="<?= $fetch['instagram']; ?>" role="button"><i class="fab fa-instagram"></i></a>

                        <!-- Linkedin -->
                        <a class="btn btn-primary btn-floating m-1"
                            style="background-color: #0082ca; border-radius: 25px; font-size: 12px;" target="_blank"
                            href="<?= $fetch['linkedin']; ?>" role="button"><i class="fab fa-linkedin-in"></i></a>

                        <!-- tiktok -->
                        <a class="btn btn-primary btn-floating m-1"
                            style="background-color: #333333; border-radius: 25px; font-size: 12px;" target="_blank"
                            href="<?= $fetch['tiktok']; ?>" role="button"><i class="fab fa-tiktok"></i></a>
                    </div>
                </div>
                <!--Grid row-->
            </section>
            <!-- Section: Links -->
        </div>
        <!-- Grid container -->

        <!-- Copyright -->
        <div class="text-center p-3 mt-3" style="background-color: rgba(0, 0, 0, 0.2)">
            Ⓒ 2022 created by UIP Dev Interns
        </div>
        <!-- Copyright -->
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous">
    </script>
</body>
</body>

</html>