@section('title', '| ' . __('trans.add_new'))
@section('breadcrumb')
    <li class="breadcrumb-item">
        <a href="{{ route('midade.users.admin.users.all') }}">
            {{ __('trans.users') }}
        </a>
    </li>
    <li class="breadcrumb-item">{{ $model->display_name }}</li>
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
                    <form action="{{ route('midade.users.admin.users.update',
                        $model->id
                    ) }}" method="post">
                        @csrf
                        @method('PUT')
                    @include('admin.users.form')
                    </form>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
