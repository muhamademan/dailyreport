        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="">
                <div class="sidebar-brand-icon rotate-n-15">
                    <img src="<?= base_url('assets/img/jne.png'); ?>" alt="" width="45px">
                </div>
                <div class="sidebar-brand-text mx-2">Daily Report</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider">



            <!-- Query Menu dari database sesuai wewenang -->
            <?php
            $role_id = $this->session->userdata('role_id');

            $queryMenu = "SELECT `user_menu`.`id`, `menu`
                            FROM `user_menu` JOIN `user_akses_menu`
                            ON `user_menu`.`id` = `user_akses_menu`.`id`
                            WHERE `user_akses_menu`.`role_id` = $role_id
                            ORDER BY `user_akses_menu`.`menu_id` ASC";

            $menu = $this->db->query($queryMenu)->result_array();
            ?>


            <!-- LOOPING Menu -->
            <?php foreach ($menu as $m) : ?>
            <div class="sidebar-heading">
                <?= $m['menu']; ?>
            </div>

            <!-- LOOPING SUBMENU -->
            <!-- siapkan sub-menu sesuai menu -->
            <?php
                $menuId = $m['id'];
                $querySubmenu = "SELECT * FROM `user_submenu`
                                WHERE `menu_id` = $menuId
                                AND `status` = 1";

                $subMenu = $this->db->query($querySubmenu)->result_array();
                ?>
            <!-- End Looping Submenu -->


            <?php foreach ($subMenu as $sm) : ?>
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url($sm['url']); ?>">
                    <i class="<?= $sm['icon']; ?>"></i>
                    <span><?= $sm['title']; ?></span></a>
            </li>
            <?php endforeach; ?>

            <hr class="sidebar-divider">

            <?php endforeach; ?>
            <!-- End LOOPING Menu -->


            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->