@section('title',__('trans.conversations'))
@section('breadcrumb')
    <li class="breadcrumb-item">
        <a href="{{ route('midade.facebookpages.admin.facebookpages.all') }}">
            {{ __('trans.pages') }}
        </a>
    </li>
    <li class="breadcrumb-item">{{ $page->type }}</li>
@endsection
<x-app-layout>
    <div class="row">
        <div class="col-12">
            <div class="card custom-card">
                <div class="card-header justify-content-between">
                    <div class="card-title">
                       {{ $page->type }}
                    </div>
                    <div class="prism-toggle">
                        <a class="btn btn-primary-light m-1" href="{{ route('midade.facebookpages.admin.facebookpages.create') }}">@lang('trans.add_new')<i
                                class="bi bi-plus-lg ms-2"></i></a>
                    </div>
                </div>
                <div class="card-body">
                 
                        @livewire('facebook.pages.table.conversation', ['page_id' => $page->page_id], key($page->page_id))


                  
                </div>
            </div>
        </div>
    </div>  

</x-app-layout>
 
