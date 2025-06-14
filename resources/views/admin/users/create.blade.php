@section('title', '| ' . __('trans.add_new'))
@section('breadcrumb')
    <li class="breadcrumb-item">
        <a href="{{ route('midade.users.admin.users.all') }}">
            {{ __('trans.users') }}
        </a>
    </li>
    <li class="breadcrumb-item">{{ __('trans.add_new') }}</li>
@endsection
<x-app-layout>
    <div class="row">
        <div class="col-12">
            <div class="card custom-card">
                <div class="card-header justify-content-between">
                    <div class="card-title">
                        @lang('trans.add_new')
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{ route('midade.users.admin.users.store') }}" method="post">
                        @csrf
                    @include('admin.users.form')
                    </form>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
