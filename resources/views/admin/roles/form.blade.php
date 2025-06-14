<div class="row">
    <div class="col-6 form-group">
        <label for="name">@lang('trans.name')</label>
        <input
            class="form-control 
        @error('name')
            is-invalid
            
        @enderror
        "
            type="text" id="name" name="name" value="{{ $model->name ?$model->name :  old('name') }}">
        @error('name')
            <span class="invalid-feedback">{{ $message }}</span>
        @enderror
    </div>
    <div class="col-6 form-group">
        <label for="display_name">@lang('trans.display_name')</label>
        <input type="text" id="display_name" name="display_name" value="{{ $model->display_name ?$model->display_name :  old('display_name') }}"
            class="form-control
        @error('display_name')
            is-invalid  
        @enderror   
            ">
        @error('display_name')
            <span class="invalid-feedback">{{ $message }}</span>
        @enderror
    </div>
    {{-- description --}}
    <div class="col-12 form-group">
        <label for="description">@lang('trans.description')</label>
        <textarea id="description" name="description"
            class="form-control
        @error('description')
            is-invalid
        @enderror
            "
            rows="3">{{ $model->description ?$model->description :  old('description') }}</textarea>
        @error('description')
            <span class="invalid-feedback">{{ $message }}</span>
        @enderror

    </div>

    <div class="form-group col-12">
        <label for="permissions">@lang('trans.permissions')</label>
        <select id="permissions"
            class="form-control 
        select2
        @error('permissions')
            is-invalid
        @enderror" name="permissions[]" multiple>
            @foreach ($permissions as $permission)
                <option value="{{ $permission->id }}"
                    @if (old('permissions'))
                        {{ in_array($permission->id, old('permissions')) ? 'selected' : '' }}
                    @endif
                    @if ($model->permissions)
                  
                        {{ in_array($permission->id, $model->permissions->pluck('id')->toArray()) ? 'selected' : '' }}
                    @endif
                    >{{ $permission->display_name }}</option>
            @endforeach
        </select>
        @error('permissions')
            <span class="invalid-feedback">{{ $message }}</span>
        @enderror
    </div>
    {{-- button save --}}
    <div class="col-12 mt-5">
        <button class='btn btn-success btn-lg btn-block'>
            @lang('trans.save')
        </button>

    </div>

</div>
