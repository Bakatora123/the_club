<body>
    <div id="app">
        <div id="sidebar" class="active">
            <div class="sidebar-wrapper active">
                <div class="sidebar-header">
                    <div class="d-flex justify-content-between">
                        <div class="logo">
                            <a href="index.html"><img src="<?php echo base_url(); ?>/public/logo/logo-cam.png" alt="The Club" class="w-50" srcset=""></a>
                        </div>
                        <div class="toggler">
                            <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
                        </div>
                    </div>
                </div>
                <div class="sidebar-menu">
                    <ul class="menu">
                        <li class="sidebar-item">
                            <a href="<?php echo base_url(); ?>/Home" class='sidebar-link'>
                                <i class="bi bi-grid-fill"></i>
                                <span>Inicio</span>
                            </a>
                        </li>
                        <?php if ($rol == 3 || $rol == 5 || $rol == 1) { ?>
                            <li class="sidebar-item">
                                <a href="<?php echo base_url(); ?>/Socios" class='sidebar-link'>
                                    <i class="bi bi-people-fill"></i>
                                    <span>Socios</span>
                                </a>
                            </li>
                        <?php } ?>
                        <?php if ($rol == 5 || $rol == 3 || $rol == 1) { ?>
                            <li class="sidebar-item">
                                <a href="<?php echo base_url(); ?>/Pagos" class='sidebar-link'>
                                    <i class="bi bi-cash-stack"></i>
                                    <span>Pagos</span>
                                </a>
                            </li>
                        <?php } ?>
                        <?php if ($rol == 4 || $rol == 1) { ?>
                            <li class="sidebar-item">
                                <a href="<?php echo base_url(); ?>/Utileria" class='sidebar-link'>
                                    <i class="bi bi-collection-fill"></i>
                                    <span>Utileria</span>
                                </a>

                            </li>
                        <?php } ?>
                        <?php if ($rol == 5 || $rol == 1) { ?>
                            <li class="sidebar-item  has-sub">
                                <a href="#" class='sidebar-link'>
                                    <i class="bi bi-wallet2"></i>
                                    <span>Cuenta</span>
                                </a>
                                <ul class="submenu ">
                                    <li class="submenu-item ">
                                        <a href="<?php echo base_url(); ?>/Gastos"><i class="bi bi-box-arrow-in-up"></i> Gastos</a>
                                    </li>
                                    <li class="submenu-item ">
                                        <a href="<?php echo base_url(); ?>/Ingresos"><i class="bi bi-box-arrow-in-down"></i> Ingresos</a>
                                    </li>
                                </ul>
                            </li>
                        <?php } ?>

                    </ul>
                    <div class="d-flex justify-content-evenly align-items-end mt-10 text-center">
                        <a class="btn" href="<?php echo base_url(); ?>/Login/cerrar"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-door-closed-fill" viewBox="0 0 16 16">
                                <path d="M12 1a1 1 0 0 1 1 1v13h1.5a.5.5 0 0 1 0 1h-13a.5.5 0 0 1 0-1H3V2a1 1 0 0 1 1-1h8zm-2 9a1 1 0 1 0 0-2 1 1 0 0 0 0 2z"></path>
                            </svg>
                            Cerrar Sesion
                        </a>

                    </div>
                    <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
                </div>



            </div>
        </div>