<div class="form-group row pb-3">
    <label for="name" class="col-sm-4 control-label text-sm-end pt-2">
        Nome <span class="required">*</span>
    </label>
    <div class="col-sm-8">
        <input type="text" class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}"
               name="name" id="name" value="{{ old('name', $role->name ?? null) }}" required>

        @if ($errors->has('name'))
            <div class="invalid-feedback">
                <strong>{{ $errors->first('name') }}</strong>
            </div>
        @endif
    </div>
</div>
<div class="form-group row">
    <label for="permissions" class="col-sm-4 control-label text-sm-end pt-2">
        Permissões <span class="required">*</span>
    </label>
    <div class="col-sm-8">
        <select name="permissions[]" id="permissions" multiple data-plugin-selectTwo
                class="form-control populate" required>
            @foreach($permissions ?? [] as $permission)
                <option value="{{ $permission->id }}"
                        {{ in_array($permission->id, old('permissions', $rolePermissions ?? [])) ? "selected" : "" }}>
                    {{ $permission->name }}
                </option>
            @endforeach
        </select>
    </div>
</div>