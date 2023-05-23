<div class="form-group">
    <label for="nom_mascota">Nombre</label>
    <input type="text" name="nom_mascota" id="nom_mascota" class="form-control" placeholder="Nombre de la mascota" required>
</div>

<div class="form-group">
    <label for="especie_mascota">Especie</label>
    <input type="text" name="especie_mascota" id="especie_mascota" class="form-control" placeholder="Perro" required>
</div>

<div class="form-group">
    <label for="raza_mascota">Raza</label>
    <input type="text" name="raza_mascota" id="raza_mascota" class="form-control" placeholder="Pitbull" required>
</div>

<div class="form-group">
    <label for="vacunas_mascota">Vacunas</label>
    <textarea name="vacunas_mascota" id="vacunas_mascota" class="form-control" placeholder="Historial de vacunas anteriores" required></textarea>
</div>


<div class="form-group">
    <label for="fechaN_mascota">Fecha de nacimiento</label>
    <input type="date" name="fechaN_mascota" id="fechaN_mascota" class="form-control" placeholder="Costo del servicio" required>
</div>


<div class="form-group">
    <label for="cliente_id">Cliente</label>
    <select id="cliente_id" class="form-control" name="cliente_id">
        <option selected disabled value="">Seleccione cliente</option>
        @foreach ($clients as $client)
        <option value="{{ $client->id }}">{{$client->nom_cliente}}</option>
        @endforeach

    </select>
</div>

