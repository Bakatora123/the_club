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
                            <p class="card-title">Lista de Gastos</p>
                            <a href="<?php echo base_url(); ?>/Gastos/addGasto" class="btn btn-primary">Agregar Gasto</a>
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
                                <?php foreach ($ingresos as $ingreso) { ?>
                                <tr>
                                    <td><?php echo $ingreso['monto'] ?></td>
                                    <td><?php echo $ingreso['fecha'] ?></td>
                                    <td><?php echo $ingreso['detalles'] ?></td>
                                    <td>

                                        <?php
                                        echo form_open('/Ingresos/delete');
                                        echo form_input(array('name' => 'id_gasto', 'type' => 'hidden', 'value' => $ingreso['id_ingreso']));
                                        //echo form_submit(array('name' => 'Cargar', 'value' => 'Eliminar', 'class' => 'badge bg-danger', 'onclick' => 'return confirm()'));
                                        ?>
                                        <button class="badge bg-danger" style="border-width: 0 ;" onclick="return confirm()">Eliminar</button>
                                        <?php
                                        echo form_close();
                                        ?>
                                        <a href="<?php echo base_url(); ?>/Ingresos/editIngreso?id_ingreso=<?php echo $ingreso['id_gasto']; ?>" class="badge bg-success">Modificar</span>

                                    </td>
                                </tr>
                            <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    </div>
                </section>

                    <footer>
                        <div class="footer clearfix mb-0 text-muted">
                            <div class="float-start">
                                
                            </div>
                            <div class="float-end">
                                
                            </div>
                        </div>
                    </footer>
                </div>
            </div>