<div class="form-group row pb-4 pt-4">
    <label class="col-lg-3 control-label text-lg-end pt-2" for="name">
        Nome <span class="required">*</span>
    </label>
    <div class="col-lg-6">
        <input type="text" class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" name="name"
                id="name" value="{{ old('name', $breed->name ?? null) }}" required />

        @if ($errors->has('name'))
            <div class="invalid-feedback">
                <strong>{{ $errors->first('name') }}</strong>
            </div>
        @endif
    </div>
</div>

<div class="form-group row pb-4 pt-4">
    <label class="col-lg-3 control-label text-lg-end pt-2" for="specie_id">
        Espécie de Animal <span class="required">*</span>
    </label>
    <div class="col-lg-6">
        <select name="specie_id" id="specie_id" class="form-control populate {{ $errors->has('specie_id') ? 'is-invalid' : '' }}" 
                data-plugin-selectTwo required>
            <option value="" {{ !isset($breed->specie_id) ? 'selected' : '' }}>Selecione...</option>
            @foreach($species ?? [] as $specie)
                <option value="{{ $specie->id }}" {{ isset($breed->specie_id) && $specie->id == $breed->specie_id ? 'selected' : '' }}>
                    {{ $specie->name }}
                </option>
            @endforeach
        </select>

        @if ($errors->has('specie_id'))
            <div class="invalid-feedback">
                <strong>{{ $errors->first('specie_id') }}</strong>
            </div>
        @endif
    </div>
</div>