<body>
<div id="app">
 <div id="sidebar" class="active">
            <div class="sidebar-wrapper active">
                <div class="sidebar-header">
                    <div class="d-flex justify-content-between">
                        <div class="logo">
                            <a href="index.html"><img src="<?php echo base_url(); ?>/public/logo/logo-cam.png" alt="The Club" class="w-50"  srcset=""></a>
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

                        <li class="sidebar-item">
                            <a href="<?php echo base_url(); ?>/Socios" class='sidebar-link'>
                                <i class="bi bi-stack"></i>
                                <span>Socios</span>
                            </a>
                        </li>

                        <li class="sidebar-item">
                            <a href="<?php echo base_url(); ?>/Pagos" class='sidebar-link'>
                                <i class="bi bi-stack"></i>
                                <span>Pagos</span>
                            </a>
                        </li>

                        <li class="sidebar-item">
                            <a href="<?php echo base_url(); ?>/Utileria" class='sidebar-link'>
                                <i class="bi bi-collection-fill"></i>
                                <span>Utileria</span>
                            </a>

                        </li>

                        <li class="sidebar-item  has-sub">
                            <a href="#" class='sidebar-link'>
                                <i class="bi bi-grid-1x2-fill"></i>
                                <span>Cuenta</span>
                            </a>
                            <ul class="submenu ">
                                <li class="submenu-item ">
                                    <a href="<?php echo base_url(); ?>/Gastos">Gastos</a>
                                </li>
                                <li class="submenu-item ">
                                    <a href="<?php echo base_url(); ?>/Ingresos">Ingresos</a>
                                </li>
                            </ul>
                        </li>
                </div>
                <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
            </div>
        </div>

 
        



