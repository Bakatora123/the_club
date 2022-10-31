<div id="main">
    <header class="mb-3">
        <a href="#" class="burger-btn d-block d-xl-none">
            <i class="bi bi-justify fs-3"></i>
        </a>
        <div class="d-flex justify-content-end sm:disable">
            <a href="<?php echo base_url(); ?>/Pagos" class="btn btn-danger ">Atras</a>
        </div>
    </header>
    <div id="main-content">

        <section id="section">
            <div class="row match-height">
                <div class=" col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title text-center">Modificar Socio</h4>
                        </div>
                        <div class="card-content">
                            <div class="card-body">
                                <?php
                                echo form_open('/Pagos/edit', array('class' => 'form form-horizontal')) ?>
                                <div class="form-body">
                                    <div class="row text-center">
                                        <div class="col-md-6 ">
                                            <?php echo form_label('Encargado') ?>
                                        </div>
                                        <div class="col-md-5 form-group">
                                            <?php echo form_input(array('name' => 'doc_encargado', 'class' => 'form-control', 'type' => 'text','value'=>$doc_encargado)); ?>
                                        </div>
                                        <div class="col-md-6">
                                            <?php echo form_label('Socio') ?>
                                        </div>
                                        <div class="col-md-5 form-group">
                                            <?php echo form_input(array('name' => 'doc_socio', 'class' => 'form-control', 'type' => 'text','value'=>$doc_socio)); ?> </div>
                                        <div class="col-md-6">
                                            <?php echo form_label('Monto') ?>
                                        </div>
                                        <div class="col-md-5 form-group">
                                            <?php echo form_input(array('name' => 'monto', 'class' => 'form-control', 'type' => 'number','value'=>$monto)); ?> </div>
                                        <div class="col-md-6">
                                            <?php echo form_label('Fecha') ?>
                                        </div>
                                        <div class="col-md-5 form-group">
                                            <?php echo form_input(array('name' => 'fecha', 'class' => 'form-control', 'type' => 'date','value'=>$fecha)); ?> </div>
                                            <?php echo form_input(array('name' => 'id_pago', 'type' => 'hidden', 'value'=>$id_pago)); ?> 
                                            
                                        <div class="col-sm-12 d-flex justify-content-center mt-5">
                                            <?php echo form_submit(array('name' => 'Cargar', 'value' => 'Cargar', 'class' => 'btn btn-primary me-1 mb-1')); ?>
                                        </div>
                                    </div>
                                </div>
                                <?php echo form_close() ?>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </section>


    </div>
</div>