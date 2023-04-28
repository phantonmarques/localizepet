<div class="form-group row pb-4 pt-4">
    <label class="col-lg-3 control-label text-lg-end pt-2" for="name">
        Nome <span class="required">*</span>
    </label>
    <div class="col-lg-6">
        <input type="text" class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" name="name"
                id="name" value="{{ old('name', $permission->name ?? null) }}" required />

        @if ($errors->has('name'))
            <div class="invalid-feedback">
                <strong>{{ $errors->first('name') }}</strong>
            </div>
        @endif
    </div>
</div>