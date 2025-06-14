<div class="row gy-3">
    {{-- First Name --}}
    <div class="col-6 form-group">
        <label class="form-label" for="type">@lang('trans.type')</label>
        <input type="text" id="type" name="type" value="{{ $model->type ?? old('type') }}"
            class="form-control @error('type') is-invalid @enderror">
        @error('type')
            <span class="invalid-feedback">{{ $message }}</span>
        @enderror
    </div>

    {{-- Username --}}
    <div class="col-6 form-group">
        <label class="form-label" for="page_id">@lang('trans.page_id')</label>
        <input type="text" id="page_id" name="page_id" value="{{ $model->page_id ?? old('page_id') }}"
            class="form-control @error('page_id') is-invalid @enderror">
        @error('page_id')
            <span class="invalid-feedback">{{ $message }}</span>
        @enderror
    </div>

    <div class="col-12 form-group">
        <label class="form-label" for="bio">@lang('trans.access_token')</label>
        <textarea id="access_token" name="access_token" class="form-control @error('access_token') is-invalid @enderror" rows="3">{{ old('access_token', $model->access_token ?? '') }}</textarea>
        @error('access_token')
            <span class="invalid-feedback">{{ $message }}</span>
        @enderror
    </div>

    {{-- Submit --}}
    <div class="col-12 mt-5">
        <button class="btn btn-success btn-lg btn-block">@lang('trans.save')</button>
    </div>
</div>
