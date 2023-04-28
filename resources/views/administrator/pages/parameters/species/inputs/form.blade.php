<div class="form-group row pb-4 pt-4">
    <label class="col-lg-3 control-label text-lg-end pt-2" for="name">
        Nome <span class="required">*</span>
    </label>
    <div class="col-lg-6">
        <input type="text" class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" name="name"
                id="name" value="{{ old('name', $specie->name ?? null) }}" required />

        @if ($errors->has('name'))
            <div class="invalid-feedback">
                <strong>{{ $errors->first('name') }}</strong>
            </div>
        @endif
    </div>
</div>

<div class="form-group row pb-4 pt-4">
    <label class="col-lg-3 control-label text-lg-end pt-2" for="animal_type_id">
        Tipo de Animal <span class="required">*</span>
    </label>
    <div class="col-lg-6">
        <select name="animal_type_id" id="animal_type_id" class="form-control populate {{ $errors->has('animal_type_id') ? 'is-invalid' : '' }}" 
                data-plugin-selectTwo required>
            <option value="" {{ !isset($specie->animal_type_id) ? 'selected' : '' }}>Selecione...</option>
            @foreach($animalTypes ?? [] as $animalType)
                <option value="{{ $animalType->id }}" {{ isset($specie->animal_type_id) && $animalType->id == $specie->animal_type_id ? 'selected' : '' }}>
                    {{ $animalType->name }}
                </option>
            @endforeach
        </select>

        @if ($errors->has('animal_type_id'))
            <div class="invalid-feedback">
                <strong>{{ $errors->first('animal_type_id') }}</strong>
            </div>
        @endif
    </div>
</div>