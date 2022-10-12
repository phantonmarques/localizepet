<!-- Start Fields in Form Line -->
<div class="form-group row justify-content-center pb-3">

    <!-- Field Name -->
    <label for="name" class="col-12 col-lg-2 col-xl-1 control-label text-lg-end pt-2">
        Nome <span class="required">*</span>
    </label>
    <div class="col-12 col-lg-4">

        <input type="text" name="name" id="name" class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}"
               value="{{ old('name', $user->name ?? null) }}" required>

        @if ($errors->has('name'))
            <div class="invalid-feedback">
                <strong>{{ $errors->first('name') }}</strong>
            </div>
        @endif
    </div>

    <!-- Field E-mail -->
    <label for="email" class="col-12 col-lg-2 col-xl-1 control-label text-lg-end pt-2">
        E-mail <span class="required">*</span>
    </label>
    <div class="col-12 col-lg-4">

        <input type="email" name="email" id="email" class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}"
               value="{{ old('email', $user->email ?? null) }}" required>

        @if ($errors->has('email'))
            <div class="invalid-feedback">
                <strong>{{ $errors->first('email') }}</strong>
            </div>
        @endif
    </div>
</div>
<!-- End Fields in Form Line -->

<!-- Start Fields in Form Line -->
<div class="form-group row justify-content-center pb-3">

    <!-- Field Password -->
    <label for="password" class="col-12 col-lg-2 col-xl-1 control-label text-lg-end pt-2">
        Senha
        @if (false == isset($user))
            <span class="required">*</span>
        @endif
    </label>
    <div class="col-12 col-lg-4">

        <input type="password" name="password" class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }}"
               id="password" value="" minlength="8" @if (false == isset($user)) required @endif>

        @if ($errors->has('password'))
            <div class="invalid-feedback">
                <strong>{{ $errors->first('password') }}</strong>
            </div>
        @endif
    </div>

    <!-- Select Role -->
    <label for="role" class="col-12 col-lg-2 col-xl-1 control-label text-lg-end pt-2">
        Função
    </label>
    <div class="col-12 col-lg-4">

        <select name="role_id" id="role" class="form-control {{ $errors->has('role_id') ? 'is-invalid' : '' }}"
                data-plugin-selectTwo>
            @foreach($roles as $role)
                <option value="{{ $role->id }}" {{ old('role_id', $user->role_id ?? null) == $role->id ? 'selected' : '' }}>
                    {{ $role->name }}
                </option>
            @endforeach
            <option value="" {{ empty(old('role_id', $user->role_id ?? null)) ? 'selected' : '' }}>
                Usuário Comum
            </option>
        </select>

        @if ($errors->has('role_id'))
            <div class="invalid-feedback">
                <strong>{{ $errors->first('role_id') }}</strong>
            </div>
        @endif
    </div>
</div>
<!-- End Fields in Form Line -->

<!-- Start Fields in Form Line -->
<div class="form-group row justify-content-center pb-3">

    <!-- Field States -->
    <label for="states" class="col-12 col-lg-2 col-xl-1 control-label text-lg-end pt-2">
        Estado <span class="required">*</span>
    </label>
    <div class="col-12 col-lg-4">

        <select name="states" id="states" class="form-control" data-plugin-selectTwo required
                data-initial="{{ old('states', (isset($user) && $user->city ? $user->city->state_id : null)) }}">
            <option {{ empty(old('states', (isset($user) && $user->city ? $user->city->state_id : null))) ? 'selected' : '' }}>
                Necessário selecionar um estado!
            </option>
            @foreach($states as $state)
                <option {{ old('states', (isset($user) && $user->city ? $user->city->state_id : null)) == $state->id ? 'selected' : '' }}
                        value="{{ $state->id }}">
                    {{ $state->name }}
                </option>
            @endforeach
        </select>

    </div>

    <!-- Field Cities -->
    <label for="cities" class="col-12 col-lg-2 col-xl-1 control-label text-lg-end pt-2">
        Cidade <span class="required">*</span>
    </label>
    <div class="col-12 col-lg-4">

        <select name="city_id" id="cities" class="form-control {{ $errors->has('city_id') ? 'is-invalid' : '' }}"
                data-initial="{{ old('city_id', $user->city_id ?? null) }}" data-plugin-selectTwo required>
            <option {{ empty(old('city_id', $user->city_id ?? null)) ? 'selected' : '' }}>
                Necessário selecionar antes um estado!
            </option>
        </select>

        @if ($errors->has('city_id'))
            <div class="invalid-feedback">
                <strong>{{ $errors->first('city_id') }}</strong>
            </div>
        @endif
    </div>
</div>
<!-- End Fields in Form Line -->

<!-- Field Phones Listing -->
@foreach($phoneTypes as $phoneType)

    <div class="form-group row justify-content-center pb-3">

        <!-- Field Number -->
        <label class="col-12 col-lg-2 col-xl-1 control-label text-lg-end pt-2"
               for="{{ $phoneType->slug }}">
            {{ $phoneType->name }}
        </label>
        <div class="col-12 col-lg-4">

            <input type="text" name="phones[{{ $loop->index }}][number]" class="form-control phone-mask"
                   {{ $loop->index == 0 ? 'required' : '' }} id="{{ $phoneType->slug }}" placeholder="(00) 00000-0000"
                   value="{{ old("phones.{$loop->index}.number", $userPhones[ $phoneType->id ]->number ?? null) }}">

            @if ($errors->has("phones.{$loop->index}.number"))
                <div class="invalid-feedback">
                    <strong>{{ $errors->first("phones.{$loop->index}.number") }}</strong>
                </div>
            @endif

        </div>

        <!-- Checkbox Main -->
        <label class="col-6 col-lg-2 col-xl-1 control-label text-lg-end pt-2" for="{{ $phoneType->slug }}_main">
            Principal
        </label>
        <div class="col-6 col-lg-1 switch-only switch switch-sm switch-primary pt-1">

            <input type="checkbox" name="phones[{{ $loop->index }}][main]" id="{{ $phoneType->slug }}_main"
                data-attribute-number="{{ $phoneType->slug }}" data-plugin-ios-switch class="main_phones"
                {{ $loop->index == 0 && empty(old()) && empty($userPhones) ? 'required' : '' }}
                {{ old("phones.{$loop->index}.main", $userPhones[ $phoneType->id ]->main ?? null) == 'on'
                    ? 'required checked' : '' }}/>

        </div>

        <!-- Checkbox Whatsapp -->
        <label class="col-6 col-lg-2 col-xl-1 control-label text-lg-end pt-2" for="{{ $phoneType->slug }}_whatsapp">
            Whatsapp
        </label>
        <div class="col-6 col-lg-2 switch switch-sm switch-primary pt-1">

            <input type="checkbox" name="phones[{{ $loop->index }}][whatsapp]" id="{{ $phoneType->slug }}_whatsapp"
                data-attribute-number="{{ $phoneType->slug }}" class="whatsapp_phones" data-plugin-ios-switch
                {{ $loop->index == 0 && empty(old()) && empty($userPhones) ? 'required' : '' }}
                {{ old("phones.{$loop->index}.whatsapp", $userPhones[ $phoneType->id ]->whatsapp ?? null) == 'on'
                    ? 'checked' : '' }} />

        </div>

        <input type="hidden" name="phones[{{ $loop->index }}][type_id]" value="{{ $phoneType->id }}">
    </div>
@endforeach
<!-- End Field Phones Listing -->