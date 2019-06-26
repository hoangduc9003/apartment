@extends('backend.layouts.app')

@section('title', app_name() . ' | ' . __('labels.backend.contract.management'))
@section('title', 'contract'))

@section('breadcrumb-links')
{{--    @include('backend.auth.user.includes.breadcrumb-links')--}}
@endsection

@section('content')
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-sm-5">
                    <h4 class="card-title mb-0">
                        {{ __('labels.backend.contract.management') }}
                    </h4>
                </div><!--col-->

                <div class="col-sm-7">
                    <div class="btn-toolbar float-right" role="toolbar" aria-label="@lang('labels.general.toolbar_btn_groups')">
                        <a href="{{ route('admin.contract.create') }}" class="btn btn-success ml-1" data-toggle="tooltip" title="@lang('labels.general.create_new')"><i class="fas fa-plus-circle"></i></a>
                    </div><!--btn-toolbar-->
                </div><!--col-->
            </div><!--row-->

            <div class="row mt-4">
                <div class="col">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                            <tr>
                                <th>@lang('labels.backend.contract.apartment_id')</th>
                                <th>@lang('labels.backend.contract.room_id')</th>
                                <th>@lang('labels.backend.contract.checkin')</th>
                                <th>@lang('labels.backend.contract.service_list')</th>
                                <th>@lang('labels.general.actions')</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($contracts as $contract)
                               <tr>
                                    <td>{{ $contract->apartment_id }}</td>
                                    <td>{{ $contract->room_id }}</td>
                                    <td>{{ $contract->checkin }}</td>
                                    <td>{{ $contract->service_list }}</td>
                                    <td>{!! $contract->action_buttons !!}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div><!--col-->
            </div><!--row-->
            <div class="row">
                <div class="col-7">
                    <div class="float-left">
                       {!! $contracts->total() !!} {{ trans_choice('labels.backend.apartment.total', $contracts->total()) }}
                    </div>
                </div><!--col-->

                <div class="col-5">
                    <div class="float-right">
                        {!! $contracts->render() !!}
                    </div>
                </div><!--col-->
            </div><!--row-->
        </div><!--card-body-->
    </div><!--card-->
@endsection
