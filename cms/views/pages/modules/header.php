<div class="header">
    <div class="header-content">
        <nav class="navbar navbar-expand">
            <div class="collapse navbar-collapse justify-content-between">
                <div class="header-left">
                    <div class="search_bar dropdown">
                       
                    </div>
                </div>

                <ul class="navbar-nav header-right">
                    <li class="nav-item dropdown header-profile">
                        Hola, <?php echo $_SESSION['nombre'] ?>
                        <img src="<?php echo $_SESSION['foto'] ?>" class="ml-2" style="width: 40px; height: 40px">
                    </li>
                    <li class="nav-item dropdown header-profile">
                        <a class="nav-link" href="#" role="button" data-toggle="dropdown">
                            <i class="fas fa-cog"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a href="#" onclick="editarPerfil(<?php echo $_SESSION['id'] ?>)" data-toggle="modal" data-target="#usuarioEditModalP" class="dropdown-item">
                                <i class="fas fa-user"></i>
                                <span class="ml-2">Perfil </span>
                            </a>
                            <a href="salir" class="dropdown-item">
                                <i class="fas fa-sign-out-alt"></i>
                                <span class="ml-2">Salir </span>
                            </a>
                        </div>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="usuarioEditModalP" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Editar Mi Perfil</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="form-group">
                        <input type="hidden" name="idP" id="idP">
                        <input type="text" id="nombreP" class="form-control" name="nombreP" placeholder="Nombre y Apellido" required>
                    </div>
                    <div class="form-group">
                        <input type="text" id="usuarioP" class="form-control" name="usuarioP" placeholder="Usuario" required readonly>
                    </div>
                    <div class="form-group">
                        <input type="email" id="emailP" class="form-control" name="emailP" placeholder="Correo electrónico">
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control" name="passwordP" placeholder="Nueva Contraseña" >
                        <input type="hidden" class="form-control" name="passwordActual" id="passwordP">
                    </div>
                    <div class="form-group">
                        <select name="rolP" class="form-control" id="rolP">
                           <option selected></option>
                            <option value="administrador">Administrador</option>
                            <option value="editor">Editor</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Foto</label>
                        <input class="form-control-file imagen" name="fotoP" type="file">
                        <input type="hidden" name="fotoActual" id="fotoP">
                    </div>
                    <div class="form-group mt-2" id="visualizar">
                        <img src="" id="fotoP" class="img-fluid p-3 previsualizar" style="width: 150px; height: 150px;">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-primary">Actualizar</button>
                </div>
                <?php
                $editUsuarios = new ControllerUsuario();
                $editUsuarios->ctrEditarPerfil();
                ?>
            </form>
        </div>
    </div>
</div>