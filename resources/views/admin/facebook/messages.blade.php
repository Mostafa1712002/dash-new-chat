@section('title', __('trans.messages'))
@section('breadcrumb')
    <li class="breadcrumb-item"><a
            href="{{ route('midade.facebookpages.admin.facebookpages.all') }}">{{ __('trans.pages') }}</a></li>
    <li class="breadcrumb-item"><a
            href="{{ route('midade.facebookpages.admin.facebookpages.conversations', $model->page_id) }}">{{ $model->page->type }}</a>
    </li>

    <li class="breadcrumb-item">{{ __('trans.messages') }}</li>

@endsection
<x-app-layout>


    <div class="row">
        <div class="col-12">
            <div class="card custom-card">
                <div class="card-body">
                    <div class="main-chart-wrapper p-2 gap-2 d-lg-flex">

                        <div class="main-chat-area border">
                            <div class="d-flex align-items-center p-2 border-bottom">
                                <div class="me-2 lh-1"> <span
                                        class="avatar avatar-lg online me-2 avatar avatar-md bg-secondary">{{ \Str::substr($to->name, 0, 2) }}
                                    </span> </div>
                                <div class="flex-fill">
                                    <p class="mb-0 fw-semibold fs-14"> <a href="javascript:void(0);"
                                            class="chatnameperson responsive-userinfo-open">{{ $to->name }}</a> </p>

                                </div>

                            </div>
                            <div class="chat-content" id="main-chat-content" data-simplebar="init">
                                <div class="simplebar-wrapper" style="margin: -40px;">
                                    <div class="simplebar-height-auto-observer-wrapper">
                                        <div class="simplebar-height-auto-observer"></div>
                                    </div>
                                    <div class="simplebar-mask">
                                        <div class="simplebar-offset" style="right: 0px; bottom: 0px;">
                                            <div class="simplebar-content-wrapper" tabindex="0" role="region"
                                                aria-label="scrollable content"
                                                style="height: auto; overflow: hidden scroll;">
                                                <div class="simplebar-content" style="padding: 40px;">
                                                    <ul class="list-unstyled">
                                                        {{-- <li class="chat-day-label"> <span>Today</span> </li> --}}
                                                        @foreach ($messages as $message)
                                                            @php
                                                                $from = (object) json_decode($message->from, true);
                                                            @endphp
                                                            @if ($from->id == $to->id)
                                                                <li class="chat-item-start">
                                                                    <div class="chat-list-inner">
                                                                        <div class="chat-user-profile"> <span
                                                                                class="avatar avatar-md avatar avatar-md bg-secondary">
                                                                                {{ \Str::substr($to->name, 0, 2) }}
                                                                            </span>
                                                                        </div>
                                                                        <div class="ms-3"> <span
                                                                                class="chatting-user-info">
                                                                                <span
                                                                                    class="chatnameperson">{{ $to->name }}</span>
                                                                                <span class="msg-sent-time">
                                                                                    {{ \Carbon\Carbon::parse($message->created_time)->format('Y-m-d
                                                                                                                                                            h:i A') }}
                                                                                </span>
                                                                            </span>
                                                                            <div class="main-chat-msg">
                                                                                <div>
                                                                                    <p class="mb-0">
                                                                                        {{ $message->message }}
                                                                                    </p>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                            @else
                                                                <li class="chat-item-end">
                                                                    <div class="chat-list-inner">
                                                                        <div class="me-3"> <span
                                                                                class="chatting-user-info">
                                                                                <span class="msg-sent-time"><span
                                                                                        class="chat-read-mark align-middle d-inline-flex"><i
                                                                                            class="ri-check-double-line"></i></span>
                                                                                    {{ \Carbon\Carbon::parse($message->created_time)->format('y-m-d h:i A') }}
                                                                                </span>
                                                                                {{ __('trans.you') }} </span>
                                                                            <div class="main-chat-msg">
                                                                                <div>
                                                                                    <p class="mb-0">
                                                                                        {{ $message->message }}
                                                                                    </p>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="chat-user-profile"> <span
                                                                                class="avatar avatar-md online avatar-rounded">
                                                                                <img src="{{ asset('assets/images/brand-logos/logo.svg') }}"
                                                                                    alt="img"> </span> </div>
                                                                    </div>
                                                                </li>
                                                            @endif
                                                        @endforeach

                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="simplebar-placeholder" style="width: auto; height: 903px;"></div>
                                </div>

                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
