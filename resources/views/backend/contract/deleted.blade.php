@extends('backend.layouts.app')

@section('title', __('labels.backend.contract.management') . ' | ' . __('labels.backend.contract.deleted'))

@section('breadcrumb-links')
    <!-- @include('backend.auth.user.includes.breadcrumb-links') -->
@endsection

@section('content')
<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-sm-5">
                <h4 class="card-title mb-0">
                    @lang('labels.backend.contract.management')
                    <small class="text-muted">@lang('labels.backend.contract.deleted')</small>
                </h4>
            </div><!--col-->
        </div><!--row-->

        <div class="row mt-4">
            <div class="col">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                        <tr>
                            <th>@lang('labels.backend.contract.feature')</th>
                            <th>@lang('labels.backend.contract.bed')</th>
                            <th>@lang('labels.backend.contract.cabinet')</th>
                            <th>@lang('labels.backend.contract.bath_contract')</th>
                            <th>@lang('labels.backend.contract.electric_water_heater')</th>
                            <th>@lang('labels.backend.contract.air_conditional')</th>
                            <th>@lang('labels.backend.contract.floor')</th>
                            <th>@lang('labels.backend.contract.width')</th>
                            <th>@lang('labels.backend.contract.way')</th>
                            <th>@lang('labels.backend.common.full_address')</th>
                            <th>@lang('labels.general.actions')</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($contracts as $contract)
                            <tr>
                                <td>{{ $contract->feature }}</td>
                                <td>{{ $contract->bed }}</td>
                                <td>{{ $contract->cabinet }}</td>
                                <td>{{ $contract->bath_contract }}</td>
                                <td>{{ $contract->electric_water_heater }}</td>
                                <td>{{ $contract->air_conditional }}</td>
                                <td>{{ $contract->floor }}</td>
                                <td>{{ $contract->width }}</td>
                                <td>{{ $contract->way }}</td>
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
