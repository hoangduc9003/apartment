@extends('backend.layouts.app')

@section('title', __('labels.backend.apartment.management') . ' | ' . __('labels.backend.apartment.deleted'))

@section('breadcrumb-links')
    <!-- @include('backend.auth.user.includes.breadcrumb-links') -->
@endsection

@section('content')
<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-sm-5">
                <h4 class="card-title mb-0">
                    @lang('labels.backend.apartment.management')
                    <small class="text-muted">@lang('labels.backend.apartment.deleted')</small>
                </h4>
            </div><!--col-->
        </div><!--row-->

        <div class="row mt-4">
            <div class="col">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                        <tr>
                            <th>@lang('labels.backend.apartment.apartment_name')</th>
                            <th>@lang('labels.backend.apartment.owner')</th>
                            <th>@lang('labels.backend.apartment.number_of_floors')</th>
                            <th>@lang('labels.backend.apartment.number_of_rooms')</th>
                            <th>@lang('labels.backend.apartment.color')</th>
                            <th>@lang('labels.backend.common.full_address')</th>
                            <th>@lang('labels.general.actions')</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($apartments as $apartment)
                            <tr>
                                <td>{{ $apartment->apartment_name }}</td>
                                <td></td>
                                <td>{{ $apartment->number_of_floors }}</td>
                                <td>{{ $apartment->number_of_rooms }}</td>
                                <td>{{ $apartment->color }}</td>
                                <td>{{ $apartment->full_address }}</td>
                                <td>{!! $apartment->action_buttons !!}</td>
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
                    {!! $apartments->total() !!} {{ trans_choice('labels.backend.apartment.total', $apartments->total()) }}
                </div>
            </div><!--col-->

            <div class="col-5">
                <div class="float-right">
                    {!! $apartments->render() !!}
                </div>
            </div><!--col-->
        </div><!--row-->
    </div><!--card-body-->
</div><!--card-->
@endsection
