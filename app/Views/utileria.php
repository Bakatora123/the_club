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
                    <p class="card-title">Lista de Utileria</p>
                    <a href="<?php echo base_url(); ?>/Utileria/addArticulo" class="btn btn-primary">Agregar Articulo</a>
                </div>
                <hr>
                <div class="card-body">
                    <table class="table table-striped" id="table1">
                        <thead>
                            <tr>
                                <th>Nombre</th>
                                <th>Cantidad</th>
                                <th>Locker</th>
                                <th>Detalles</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($articulos as $articulo) {  ?>
                                <tr>

                                    <td><?php echo $articulo['nombre'] ?></td>
                                    <td><?php echo $articulo['cantidad'] ?></td>
                                    <td><?php echo $articulo['locker'] ?></td>
                                    <td><?php echo $articulo['detalle'] ?></td>
                                    <td>

                                        <?php
                                        echo form_open('/Utileria/delete');
                                        echo form_input(array('name' => 'id_articulo', 'type' => 'hidden', 'value' => $articulo['id_articulo']));
                                        //echo form_submit(array('name' => 'Cargar', 'value' => 'Eliminar', 'class' => 'badge bg-danger', 'onclick' => 'return confirm()'));
                                        ?>
                                        <button class="badge bg-danger" style="border-width: 0 ;" onclick="return confirm()">Eliminar</button>
                                        <?php
                                        echo form_close();
                                        ?>
                                        <a href="<?php echo base_url(); ?>/Utileria/editArticulo?id_articulo=<?php echo $articulo['id_articulo']; ?>" class="badge bg-success">Modificar</span>

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


<?php
if (isset($_GET['est'])) {
    if ($_GET['est'] == true) { ?>
        <script type="text/javascript">
            window.onload = function alerta() {
                Swal.fire({
                    position: 'top-end',
                    icon: 'success',
                    title: 'Verificado',
                    showConfirmButton: false,
                    timer: 1500
                })
                setTimeout(function() {
                    window.location.href = "<?php echo base_url(); ?>/Utileria";
                }, 1600);
            };
        </script>
<?php }
} ?>