
<body>
    <div id="auth">

        <div class="row h-100">
            <div class="col-lg-5 col-12">
                <div id="auth-left">
                    <?php session() ?>
                    <div class="auth-logo">
                        <img src="<?php echo base_url();?>/public/logo/logo-cam.png" alt="Logo">
                    </div>
                    <h1 class="auth-title">Iniciar</h1>
                    <?php echo form_open('/Login/aute', array('class' => 'form form-horizontal')) ?>
                        <div class="form-group position-relative has-icon-left mb-4">
                            <?php echo form_input(array('name'=>'name', 'class'=>'form-control','type'=> 'text')) ?>
                            <div class="form-control-icon">
                                <i class="bi bi-person"></i>
                            </div>
                        </div>
                        <div class="form-group position-relative has-icon-left mb-4">
                            <?php echo form_input(array('name'=>'pass', 'class'=>'form-control','type'=> 'password')) ?>
                            <div class="form-control-icon">
                                <i class="bi bi-shield-lock"></i>
                            </div>
                        </div>
                        <?php 
                        if (isset($error)){
                        echo 'El Usuario o la Contraseña en incorrecta'; 
                        }?>
                        <?php echo form_submit(array('class'=>'btn btn-primary btn-block shadow-lg mt-3', 'value'=>'Iniciar Sesios'));?>
                    <?php echo form_close() ?>                   
                </div>
            </div>
            <div class="col-lg-7 d-none d-lg-block">
                <div id="auth-right">

                </div>
            </div>
        </div>
       
    </div>
    <?php
    if (isset($_GET['est'])) {
    if ($_GET['est'] == true) { ?>
        <script type="text/javascript">
            window.onload = function alerta() {
                Swal.fire({
  position: 'center',
  icon: 'error',
  title: 'Usuario o Contraseña incorrecta',
  showConfirmButton: false,
  timer: 2000
})
                setTimeout(function() {
                    window.location.href = "<?php echo base_url(); ?>/";
                }, 2100);
            };
        </script>
<?php }
} ?>
</body>

</html>

