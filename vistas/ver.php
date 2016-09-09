<?php require "layout.php"; ?>
    <body>
        <div class="col-xs-offset-3 col-xs-6">
            <legend>Ver cliente</legend>
            <div class="form-group">
                <label class="col-xs-4 control-label" for="nombre"><b>Nombre:</b></label>
                <div class="col-xs-8">
                    <input type="text" id="nombre" name="nombre" class="form-control" placeholder="Nombre" disabled>
                </div>
            </div>
            <div class="form-group">
                <label class="col-xs-4 control-label" for="apellido"><b>Apellido:</b></label>
                <div class="col-xs-8">
                    <input type="text" id="apellido" name="apellido" class="form-control" placeholder="Apellido" disabled>
                </div>
            </div>
            <div class="form-group">
                <label class="col-xs-4 control-label" for="fecha"><b>Fecha de nacimiento:</b></label>
                <div class="col-xs-8">
                    <input type="date" id="fecha" name="fecha" class="form-control" disabled>
                </div>
            </div>
            <div class="form-group">
                <label for="nacionalidad" class="col-xs-4 control-label">Nacionalidad:</label>
                <div class="col-xs-8">
                    <select class="form-control" id="nacionalidad" name="nacionalidad" disabled>
                        <c:forEach var="pais" items="${nacionalidad}">
                            <option value="${pais}">${nacionalidad}</option>
                        </c:forEach>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label class="col-xs-4 control-label" for="activo"><b>Activo:</b></label>
                <div class="col-xs-8">
                    <input type="radio" id="activo" name="activo" value="si" checked disabled> Si<br>
                    <input type="radio" id="activo" name="activo" value="no" disabled> No<br>
                </div>
            </div>
            <div class="form-group">
                <div class="col-xs-offset-4 col-xs-8">
                    <a class="btn btn-primary" href="home.php">
                        <span class="glyphicon glyphicon-chevron-left"></span> Volver al listado
                    </a>
                </div>
            </div>
        </div>
    </body>
</html>