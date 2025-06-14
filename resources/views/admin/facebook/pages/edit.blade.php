@section('title', '| ' . __('trans.pages'))
@section('breadcrumb')
<li class="breadcrumb-item">
    <a href="{{ route('midade.facebookpages.admin.facebookpages.all') }}">
        {{ __('trans.pages') }}
    </a>
</li>
    <li class="breadcrumb-item">{{ $model->type }}</li>
@endsection
<x-app-layout>
    <div class="row">
        <div class="col-12">
            <div class="card custom-card">
                <div class="card-header justify-content-between">
                    <div class="card-title">
                        @lang('trans.edit')
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{ route('midade.facebookpages.admin.facebookpages.update',
                        $model->id
                    ) }}" method="post">
                        @csrf
                        @method('PUT')
                        @include('admin.facebook.pages.form')
                    </form>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
