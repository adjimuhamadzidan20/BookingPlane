    <!-- Bootstrap core JavaScript-->
    <script src="<?= URL_UTAMA; ?>/vendor/jquery/jquery.min.js"></script>
    <script src="<?= URL_UTAMA; ?>/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="<?= URL_UTAMA; ?>/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="<?= URL_UTAMA; ?>/js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="<?= URL_UTAMA; ?>/vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="<?= URL_UTAMA; ?>/vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="<?= URL_UTAMA; ?>/js/demo/datatables-demo.js"></script>

    <script type="text/javascript">
        setTimeout(function() {
            let elemen = document.getElementById('flash');
            elemen.style.opacity = "0";
            elemen.style.transition = "1s ease-in-out";

            setTimeout(function() {
                elemen.style.display = "none";
            }, 1000);
        }, 2000);

    </script>

</body>

</html>