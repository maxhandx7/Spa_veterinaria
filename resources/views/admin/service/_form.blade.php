<div class="form-group">
    <label for="nom_servicio">Nombre</label>
    <input type="text" name="nom_servicio" id="nom_servicio" class="form-control" placeholder="Nombre de Servicio" required>
</div>

<div class="form-group">
    <label for="category_id">Categoria</label>
    <select id="category_id"  class="form-control" name="category_id">
        <option selected disabled value="">Seleccione Categoria</option>
        @foreach ($categories as $category)
        <option value="{{ $category->id }}">{{$category->name}}</option>
        @endforeach
        
    </select>
</div>

<div class="form-group">
    <label for="desc_servicio">Descripcion</label>
    <input type="text" name="desc_servicio" id="desc_servicio" class="form-control" placeholder="Descripcion de Servicio" required>
</div>

<div class="form-group">
    <label for="cost_servicio">Costo</label>
    <input type="number" name="cost_servicio" id="cost_servicio" class="form-control" placeholder="Costo del servicio" required>
</div>

<div class="form-group">
    <label for="dur_servicio">Duración</label>
    <input type="number" name="dur_servicio" id="dur_servicio" class="form-control" placeholder="Duración del servicio" required>
</div>

<input type="text" name="estado" id="estado" class="form-control" hidden value="disable">


<div class="form-group">
    <label for="mascota_id">Mascota</label>
    <select id="mascota_id" class="form-control selectize" name="mascota_id">
        <option selected disabled value="">Seleccione Mascota</option>
        @foreach ($pets as $pet)
        <option value="{{ $pet->id }}">{{$pet->nom_mascota}}</option>
        @endforeach

    </select>
</div>

