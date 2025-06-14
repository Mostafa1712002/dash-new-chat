<div class="row gy-3">
    {{-- First Name --}}
    <div class="col-6 form-group">
        <label class="form-label" for="first_name">@lang('trans.first_name')</label>
        <input type="text" id="first_name" name="first_name" value="{{ $model->first_name ?? old('first_name') }}"
            class="form-control @error('first_name') is-invalid @enderror">
        @error('first_name')
            <span class="invalid-feedback">{{ $message }}</span>
        @enderror
    </div>

    {{-- Last Name --}}
    <div class="col-6 form-group">
        <label class="form-label" for="last_name">@lang('trans.last_name')</label>
        <input type="text" id="last_name" name="last_name" value="{{ $model->last_name ?? old('last_name') }}"
            class="form-control @error('last_name') is-invalid @enderror">
        @error('last_name')
            <span class="invalid-feedback">{{ $message }}</span>
        @enderror
    </div>

    {{-- Email --}}
    <div class="col-6 form-group">
        <label class="form-label" for="email">@lang('trans.email')</label>
        <input type="email" id="email" name="email" value="{{ $model->email ?? old('email') }}"
            class="form-control @error('email') is-invalid @enderror">
        @error('email')
            <span class="invalid-feedback">{{ $message }}</span>
        @enderror
    </div>

    {{-- Username --}}
    <div class="col-6 form-group">
        <label class="form-label" for="username">@lang('trans.username')</label>
        <input type="text" id="username" name="username" value="{{ $model->username ?? old('username') }}"
            class="form-control @error('username') is-invalid @enderror">
        @error('username')
            <span class="invalid-feedback">{{ $message }}</span>
        @enderror
    </div>

    {{-- Password --}}
    <div class="col-6 form-group">
        <label class="form-label" for="password">@lang('trans.password')</label>
        <input type="password" id="password" name="password"
            class="form-control @error('password') is-invalid @enderror">
        @error('password')
            <span class="invalid-feedback">{{ $message }}</span>
        @enderror
    </div>
    {{-- password confirmation --}}

   <div class="col-6 form-group">
        <label class="form-label" for="password_confirmation">@lang('trans.password_confirmation')</label>
        <input type="password" id="password_confirmation" name="password_confirmation"
            class="form-control @error('password_confirmation') is-invalid @enderror">
        @error('password_confirmation')
            <span class="invalid-feedback">{{ $message }}</span>
        @enderror
    </div>
    {{-- Mobile --}}
    <div class="col-6 form-group">
        <label class="form-label" for="mobile">@lang('trans.mobile')</label>
        <input type="text" id="mobile" name="mobile" value="{{ $model->mobile ?? old('mobile') }}"
            class="form-control @error('mobile') is-invalid @enderror">
        @error('mobile')
            <span class="invalid-feedback">{{ $message }}</span>
        @enderror
    </div>

    {{-- Phone Number --}}
    <div class="col-6 form-group">
        <label class="form-label" for="phone_number">@lang('trans.phone_number')</label>
        <input type="text" id="phone_number" name="phone_number" value="{{ $model->phone_number ?? old('phone_number') }}"
            class="form-control @error('phone_number') is-invalid @enderror">
        @error('phone_number')
            <span class="invalid-feedback">{{ $message }}</span>
        @enderror
    </div>

    {{-- Gender --}}
    <div class="col-6 form-group">
        <label class="form-label" for="gender">@lang('trans.gender')</label>
        <select id="gender" name="gender"
            class="form-control @error('gender') is-invalid @enderror">
            <option value="male" {{ old('gender', $model->gender ?? '') == 'male' ? 'selected' : '' }}>@lang('trans.male')</option>
            <option value="female" {{ old('gender', $model->gender ?? '') == 'female' ? 'selected' : '' }}>@lang('trans.female')</option>
        </select>
        @error('gender')
            <span class="invalid-feedback">{{ $message }}</span>
        @enderror
    </div>

    {{-- Country --}}
    {{-- <div class="col-6 form-group">
        <label class="form-label" for="country_id">@lang('trans.country')</label>
        <select id="country_id" name="country_id"
            class="form-control select2  @error('country_id') is-invalid @enderror">
            @foreach($countries as $country)
                <option value="{{ $country->id }}" {{ old('country_id', $model->country ?? '') == $country->id ? 'selected' : '' }}>
                    {{ $country->name }}
                </option>
            @endforeach
        </select>
        @error('country_id')
            <span class="invalid-feedback">{{ $message }}</span>
        @enderror
    </div> --}}

    {{-- Language --}}
    {{-- <div class="col-6 form-group">
        <label class="form-label" for="language_id">@lang('trans.language')</label>
        <select id="language_id" name="language_id"
            class="form-control  @error('language_id') is-invalid @enderror">
            @foreach($languages as $language)
                <option value="{{ $language->id }}" {{ old('language_id', $model->language_id ?? '') == $language->id ? 'selected' : '' }}>
                    {{ $language->native }}
                </option>
            @endforeach
        </select>
        @error('language_id')
            <span class="invalid-feedback">{{ $message }}</span>
        @enderror
    </div> --}}

    {{-- Bio --}}
    <div class="col-12 form-group">
        <label class="form-label" for="bio">@lang('trans.bio')</label>
        <textarea id="bio" name="bio" class="form-control @error('bio') is-invalid @enderror" rows="3">{{ old('bio', $model->bio ?? '') }}</textarea>
        @error('bio')
            <span class="invalid-feedback">{{ $message }}</span>
        @enderror
    </div>

    {{-- Birth Date --}}
    <div class="col-6 form-group">
        <label class="form-label" for="birth_date">@lang('trans.birth_date')</label>
        <input type="date" id="birth_date" name="birth_date" value="{{ old('birth_date', $model->birth_date ?? '') }}"
            class="form-control @error('birth_date') is-invalid @enderror">
        @error('birth_date')
            <span class="invalid-feedback">{{ $message }}</span>
        @enderror
    </div>

    {{-- Roles --}}
    <div class="col-6 form-group">
        <label class="form-label" for="roles">@lang('trans.roles')</label>
        <select id="roles" name="roles[]" class="form-control select2 @error('roles') is-invalid @enderror" multiple>
            @foreach($roles as $role)
                <option value="{{ $role->id }}"
                    @if (old('roles'))
                        {{ in_array($role->id, old('roles')) ? 'selected' : '' }}
                    @elseif(isset($model) && $model->roles)
                        {{ $model->roles->pluck('id')->contains($role->id) ? 'selected' : '' }}
                    @endif
                >{{ $role->display_name }}</option>
            @endforeach
        </select>
        @error('roles')
            <span class="invalid-feedback">{{ $message }}</span>
        @enderror
    </div>

    {{-- Submit --}}
    <div class="col-12 mt-5">
        <button class="btn btn-success btn-lg btn-block">@lang('trans.save')</button>
    </div>
</div>
