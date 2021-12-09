<div class="mt-5">
    <div class="authincation h-100">
        <div class="container-fluid h-100">
            <div class="row justify-content-center h-100 align-items-center">
                <div class="col-md-6">
                    <div class="authincation-content">
                        <div class="row no-gutters">
                            <div class="col-xl-12">
                                <div class="auth-form">
                                    <h4 class="text-center mb-4">Panel de Control</h4>
                                    <form method="POST">
                                        <div class="form-group">
                                            <label><strong>Usuario</strong></label>
                                            <input type="text" class="form-control" name="usuario" placeholder="Usuario">
                                        </div>
                                        <div class="form-group">
                                            <label><strong>Contraseña</strong></label>
                                            <input type="password" name="password" class="form-control" placeholder="Contraseña">
                                        </div>
                                        <div class="form-row d-flex justify-content-between mt-4 mb-2">
                                
                                        </div>
                                        <div class="text-center">
                                            <button type="submit" class="btn btn-primary btn-block">Ingresar</button>
                                        </div>
                                        <?php
                                            $ingresar = new ControllerUsuario();
                                            $ingresar -> ctrIngresarUsuario();
                                        ?>
                                    </form>
                                    <div class="new-account mt-3">
                                        <p>Desea volver al sitio? <a class="text-primary" href="./page-register.html">Volver</a></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>