<div class="form-group">
    <label for="cliente_id">Clientes</label>
    <select id="cliente_id" class="form-control" name="cliente_id">
        <option selected disabled>Seleccione Cliente</option>
        @foreach ($clients as $client)
        <option value="{{ $client->id }}">{{$client->nom_cliente}}</option>
        @endforeach
    </select>
</div>


<div class="form-group mascota_id" hidden>
    <label for="mascota_id">Mascotas</label>
    <select id="mascota_id" class="form-control" name="mascota_id">
        <option selected disabled value="">Seleccione Mascota</option>
        @foreach ($pets as  $pet)
        <option value="{{ $pet->_id }}">{{$pet->nom_mascota}}</option>
        @endforeach
    </select>
</div>  

<div class="form-group servicio_id" hidden>
    <label for="servicio_id">Servicios</label>
    <select id="servicio_id" class="form-control" name="servicio_id">
        <option selected disabled value="">Seleccione Servicio</option>
    </select>
</div>

<div class="form-group">
    <label for="precio">Costo</label>
    <input type="number" name="precio" id="precio" class="form-control" placeholder="$ 0.00" disabled>
</div>

<div class="form-group">
    <label for="iva">Impuesto</label>
    <input type="number" value="0" name="iva" id="iva" class="form-control">
</div>

<div class="card text-muted" >
<button type="button" id="agregar" class="btn btn-primary">Agregar</button>

<div class="form-group">
    <h4 class="card-title"></h4>
    <div class="table-responsive col-md-12">
        <table id="detalles" class="table table-striped">
            <thead>
                <tr>
                    <th>Eliminar</th>
                    <th>Servicio</th>
                    <th>Costo </th>
                    <th>Sub total</th>
                </tr>
            </thead>
            <tfoot>
             <tr>
                <th colspan="4">
                    <p align="right">TOTAL:</p>
                </th>
                <th colspan="4">
                 <p align="right"><span id="total"> 0.00</span></p>
             </th>
             </tr>
 
             <tr >
                 <th colspan="4">
                     <p align="right">IVA</p>
                 </th>
                 <th colspan="4">
                  <p align="right"><span id="total_impuesto"> 0.00</span></p>
              </th>
              </tr>
 
              <tr>
                 <th colspan="4">
                     <p align="right">TOTAL PAGAR</p>
                 </th>
                 <th colspan="4">
                  <p align="right"><span align="right" id="total_pagar_html"> 0.00</span><input type="hidden" name="total" id="total_pagar"></p>
              </th>
              </tr>
 
            </tfoot>
        </table>
    </div>
 </div>
</div>