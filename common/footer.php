<!-- Footer Start -->
<div class="container-fluid bg-dark text-white-50 footer pt-5 mt-5 wow fadeIn" data-wow-delay="0.1s">
    <div class="container py-5">
        <div class="row g-5">

            <div class="col-lg-3 col-md-6">
                <h5 class="text-white mb-4">Contact</h5>
                <p class="mb-2"><i class="fa fa-map-marker-alt me-3"></i>Kathmandu, Nepal</p>
                <p class="mb-2"><i class="fa fa-phone-alt me-3"></i>+977 9823575991</p>
                <p class="mb-2"><i class="fa fa-envelope me-3"></i>onlinejobportal@gmail.com</p>
                <div class="d-flex pt-2">
                    <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-twitter"></i></a>
                    <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-facebook-f"></i></a>
                    <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-youtube"></i></a>
                    <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-linkedin-in"></i></a>
                </div>
            </div>

        </div>
    </div>
    <div class="container">
        <div class="copyright">
            <div class="row">
                <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                    &copy; <a class="border-bottom" href="./index.php">ONLINE JOB Portal</a>,


                    Designed By <a class="border-bottom" href="">Code By Pukar & Ajay</a>
                </div>
                <div class="col-md-6 text-center text-md-end">
                    <div class="footer-menu">
                        <a href="index.php">Home</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Footer End -->


<!-- Back to Top -->
<a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
</div>

<!-- JavaScript Libraries -->
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="lib/wow/wow.min.js"></script>
<script src="lib/easing/easing.min.js"></script>
<script src="lib/owlcarousel/owl.carousel.min.js"></script>


<script src="js/main.js"></script>
<script src="js/sweetalert.js"></script>
<?php
if (isset($_SESSION['status']) && $_SESSION['status'] != '') {
?>

    <script>
        swal({
            title: "<?php echo $_SESSION['status']; ?>",
            icon: "<?php echo $_SESSION['status_code']; ?>",
            button: "OK dismiss!",
        });
    </script>

<?php

    unset($_SESSION['status']);
}
?>

</body>

</html>