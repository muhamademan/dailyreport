<!-- Footer-->
<footer class="bg-primary py-4">
    <div class="container text-light">
        <span>Copyright &copy; JNE - Daily Report <?= date('Y'); ?></span>
    </div>
</footer>

<!-- Bootstrap core JS-->
<script
    src="https://static.codepen.io/assets/common/stopExecutionOnTimeout-157cd5b220a5c80d4ff8e0e70ac069bffd87a61252088146915e8726e5d9f147.js">
</script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.bundle.min.js"></script>
<!-- Third party plugin JS-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.min.js"></script>
<!-- Core theme JS-->
<script src="<?= base_url('assets/js/beranda/script.js') ?>"></script>
<script>
function CekEmail() {
    DataEmail = $('input#email').val();
    $.ajax({
        url: "<?= base_url('registration/cekemail') ?>",
        method: 'post',
        dataType: 'json',
        data: {
            email: DataEmail
        },
        success: function(data) {
            $('.response-email').text(data['response']);
        }
    });
}
</script>
</body>

</html>