<div class="form-group row">
    <label for="name" class="col-sm-4 control-label text-sm-end pt-2">
        Nome <span class="required">*</span>
    </label>
    <div class="col-sm-8">
        <input type="text" class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}"
               name="name" id="name" value="{{ old('name', $permission->name ?? null) }}" required />

        @if ($errors->has('name'))
            <div class="invalid-feedback">
                <strong>{{ $errors->first('name') }}</strong>
            </div>
        @endif
    </div>
</div>