@section('title',__('trans.users'))
<x-app-layout>
    <div class="row">
        <div class="col-12">
            <div class="card custom-card">
                <div class="card-header justify-content-between">
                    <div class="card-title">
                        @lang("trans.users" )
                    </div>
                    <div class="prism-toggle">
                        <a class="btn btn-primary-light m-1" href="{{ route('midade.users.admin.users.create') }}">@lang('trans.add_new')<i
                                class="bi bi-plus-lg ms-2"></i></a>
                    </div>
                </div>
                <div class="card-body">
                 
                        @livewire('user.table.all')

                        @livewire('user.model.delete')

                  
                </div>
            </div>
        </div>
    </div>  

</x-app-layout>

