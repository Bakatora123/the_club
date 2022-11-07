<div id="main">
                <header class="mb-3">
                    <a href="#" class="burger-btn d-block d-xl-none">
                        <i class="bi bi-justify fs-3"></i>
                    </a>
                </header>
                <div id="main-content">

                <section class="section">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between">
                            <p class="card-title">Lista de Pagos</p>
                            <?php if($usuario['rol']==4 || $usuario['rol']==5 || $usuario['rol']==1 ){ ?>
                            <a href="<?php echo base_url(); ?>/Pagos/addPago" class="btn btn-primary">Agregar Pago</a>
                            <?php }?>
                        </div>
                        <hr>
                        <div class="card-body">
                            <table class="table table-striped" id="table1">
                                <thead>
                                    <tr>
                                        <th>Encargado</th>
                                        <th>Socio</th>
                                        <th>Monto</th>
                                        <th>Fecha</th>
                                        <th>Accion</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php foreach ($pagos as $pago) { ?>
                                <tr>
                                    <td><?php echo $pago['nombre_encargado'];?></td>
                                    <td><?php echo $pago['nombre_socio']; ?></td>
                                    <td><?php echo $pago['monto']; ?></td>
                                    <td><?php echo $pago['fecha']; ?></td>
                                    <td>

                                        <?php

                                        echo form_open('/Pagos/delete');
                                        echo form_input(array('name' => 'id_pago', 'type' => 'hidden', 'value' => $pago['id_pago']));
                                        //echo form_submit(array('name' => 'Cargar', 'value' => 'Eliminar', 'class' => 'badge bg-success', 'onclick' => 'return confirm()'));
                                        ?>
                                        <button class="badge bg-danger" style="border-width: 0 ;" onclick="return confirm()">Eliminar</button>
                                        <?php
                                        echo form_close();
                                        ?>
                                         <?php if($usuario['rol']==1 || $usuario['rol']==2 ){ ?>
                                        <a href="<?php echo base_url(); ?>/Pagos/editPago?id_pago=<?php echo $pago['id_pago']; ?>" class="badge bg-success">Modificar</span>
                                        <?php }?>
                                    </td>
                                </tr>
                            <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    </div>
                </section>
                </div>
            </div>

            <script type="text/javascript">
    
    <?php
    if (isset($_GET['etd'])) {
        if ($_GET['etd'] == true) { ?>

            window.onload = function alerta() {
                Swal.fire({
                    position: 'top-end',
                    icon: 'success',
                    title: 'Verificado',
                    showConfirmButton: false,
                    timer: 1500
                })
                setTimeout(function() {
                    window.location.href = "<?php echo base_url(); ?>/Pagos";
                }, 1600);
            };
            
</script>
    <?php }
    } ?>