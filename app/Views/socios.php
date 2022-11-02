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
                    <p class="card-title">Lista de Socios</p>
                    <a href="<?php echo base_url(); ?>/Socios/addSocio" class="btn btn-primary">Agregar Socio</a>
                </div>
                <hr>
                <div class="card-body">
                    <table class="table table-striped" id="table1">
                        <thead>
                            <tr>
                                <th>Nombre</th>
                                <th>Apellido</th>
                                <th>DNI</th>
                                <th>Celular</th>
                                <th>Accion</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php foreach ($socios as $socio) { ?>
                                <tr>
                                    
                                    <td><?php echo $socio['nombre']; ?></td>
                                    <td><?php echo $socio['apellido']; ?></td>
                                    <td><?php echo $socio['documento']; ?></td>
                                    <td><?php echo $socio['celular']; ?></td>
                                    <td>

                                        <?php
                                        echo form_open('/Socios/delete');
                                        echo form_input(array('name' => 'Id_socio', 'type' => 'hidden', 'value' => $socio['Id_socio']));
                                        $js = ['onClick' => 'return confirm();'];
                                        //echo form_submit(array('name' => 'Cargar', 'value' => 'Eliminar', 'class' => 'badge bg-success'));
                                        ?>
                                        <button class="badge bg-danger" style="border-width: 0 ;" onclick="return confirm()">Eliminar</button>
                                        <?php
                                        echo form_close();
                                        ?>
                                        <a href="<?php echo base_url(); ?>/Socios/editSocio?id_socio=<?php echo $socio['Id_socio']; ?>" class="badge bg-success">Modificar</span>
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
                    window.location.href = "<?php echo base_url(); ?>/Socios";
                }, 1600);
            };
            
</script>
    <?php }
    } ?>
