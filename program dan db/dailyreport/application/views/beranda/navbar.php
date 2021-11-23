<!-- Navigation-->
<nav class="navbar navbar-expand-lg navbar-light fixed-top py-3 text-light" id="mainNav">
    <div class="container">
        <a class="navbar-brand js-scroll-trigger" href="<?= base_url('#page-top') ?>"><img src="assets/img/jne.png"
                alt="" width="150"></a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse"
            data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false"
            aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto my-2 my-lg-0">
                <?php
                ?>
                <li class="nav-item">
                    <a class="nav-link js-scroll-trigger" href="<?= base_url(); ?>#about">Tentang</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link js-scroll-trigger" href="<?= base_url(); ?>#services">Layanan</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link js-scroll-trigger" href="<?= base_url(); ?>#contact">Kontak</a>
                </li>
                <?php
                // endif; 
                ?>
                <li class="nav-item"><a class="nav-link js-scroll-trigger btn-login rounded"
                        href="<?= base_url('auth') ?>" id="btn-login">Login</a></li>
            </ul>
        </div>
    </div>
</nav>