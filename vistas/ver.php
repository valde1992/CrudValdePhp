<?php require "layout.php"; ?>
        <legend>Ver cliente <?php echo $cliente['nombre'] . " " . $cliente['apellido']; ?></legend>
        <div class="form form-horizontal responsive col-xs-offset-3 col-xs-6">
            <div class="form-group">
                <label class="col-xs-4 control-label" for="nombre"><b>Nombre:</b></label>
                <div class="col-xs-8">
                    <input type="text" value="<?php echo $cliente["nombre"]; ?>" id="nombre" name="nombre" class="form-control" placeholder="Nombre" readonly>
                </div>
            </div>
            <div class="form-group">
                <label class="col-xs-4 control-label" for="apellido"><b>Apellido:</b></label>
                <div class="col-xs-8">
                    <input type="text" value="<?php echo $cliente["apellido"]; ?>" id="apellido" name="apellido" class="form-control" placeholder="Apellido" readonly>
                </div>
            </div>
            <div class="form-group">
                <label class="col-xs-4 control-label" for="fecha"><b>Fecha de nacimiento:</b></label>
                <div class="col-xs-8">
                    <input type="date" value="<?php echo $cliente["fecha_nac"]; ?>" id="fecha" name="fecha" class="form-control" placeholder="dd/mm/yyyy" readonly>
                </div>
            </div>
            <div class="form-group">
                <label for="nacionalidad_id" class="col-xs-4 control-label">Nacionalidad:</label>
                <div class="col-xs-8">
                    <select class="form-control" id="nacionalidad_id" name="nacionalidad_id" readonly>
                        <option value="<?php echo $cliente["nacionalidad_id"]; ?>"><?php echo $cliente["nacionalidad"]; ?></option>  
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label class="col-xs-4 control-label" for="activo"><b>Activo:</b></label>
                <div class="col-xs-8">
                    <?php if($cliente["activo"] == 1): ?>
                        <input type="radio" id="activo" name="activo" value="1" readonly checked=""> Si<br>
                        <input type="radio" id="activo" name="activo" value="0" readonly> No
                    <?php else: ?>
                        <input type="radio" id="activo" name="activo" value="1" readonly> Si<br>
                        <input type="radio" id="activo" name="activo" value="0" readonly checked> No
                    <?php endif; ?>
                </div>
            </div>
            <div class="form-group">
                <div class="col-xs-offset-4 col-xs-8">
                    <a class="btn btn-default" href="homecontroller.php">
                        <span class="glyphicon glyphicon-chevron-left"></span> Volver al listado
                    </a>
                    <?php if(tienePermiso("2")): ?>
                        <a class="btn btn-primary pull-right" href="editarcontroller.php?id=<?php echo $cliente["id"] ?>">
                            Editar <span class="glyphicon glyphicon-pencil"></span>
                        </a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </body>
</html>
