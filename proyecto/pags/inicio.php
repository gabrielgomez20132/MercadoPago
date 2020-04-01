<div class="col-sm-8">
         <h4>Datos Personales</h4>
         <form action="proyecto/pags/pago.php" method="POST">
          <div class="form-row">
            <div class="form-group col-sm-6">
              <label>Nombre</label>
              <input type="text" name="nome" class="form-control" required/>
            </div>

            <div class="form-group col-sm-6">
              <label>Apellido</label>
              <input type="text" name="sobrenome" class="form-control" required/>
            </div>

            <div class="form-group col-sm-6">
              <label>Email</label>
              <input type="email" name="email" class="form-control" required/>
            </div>

            <div class="form-group col-sm-6">
              <label>Telefono</label>
              <input type="text" name="telefone" class="form-control" required/>
            </div>
          </div>
      </div>

      <div class="col-sm-4">
        <h4>Valores del pago</h4>
        <label>Cuanto desea pagar?</label>
        <div class="input-group mb-3">
          <div class="input-group-prepend">
            <label class="input-group-text">$</label>
          </div>
          <input type="text" name="valor" class="form-control" required/>
        </div>
        <input type="submit" value="Ir a pagar" class="btn btn-outline-success btn-lg btn-block">
         </form>
      </div>