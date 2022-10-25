            <div id="main">
                <header class="mb-3">
                    <a href="#" class="burger-btn d-block d-xl-none">
                        <i class="bi bi-justify fs-3"></i>
                    </a>
                </header>
                <div id="main-content">

                    <div class="page-heading">
                        <?php 
                        echo form_open('/estructura');
                        echo form_input(array('name' => 'name'));
                        echo form_close();
                        
                        ?>
                    </div>

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