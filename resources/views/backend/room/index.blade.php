@extends('backend.layouts.app')

@section('title', app_name() . ' | ' . __('labels.backend.room.management'))
@section('title', 'room'))

@section('breadcrumb-links')
{{--    @include('backend.auth.user.includes.breadcrumb-links')--}}
@endsection

@section('content')
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-sm-5">
                    <h4 class="card-title mb-0">
                        {{ __('labels.backend.room.management') }}
                    </h4>
                </div><!--col-->

                <div class="col-sm-7">
                    <div class="btn-toolbar float-right" role="toolbar" aria-label="@lang('labels.general.toolbar_btn_groups')">
                        <a href="{{ route('admin.room.create') }}" class="btn btn-success ml-1" data-toggle="tooltip" title="@lang('labels.general.create_new')"><i class="fas fa-plus-circle"></i></a>
                    </div><!--btn-toolbar-->
                </div><!--col-->
            </div><!--row-->

            <div class="row mt-4">
                <div class="col">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                            <tr>
                                <th>@lang('labels.backend.room.feature')</th>
                                <th>@lang('labels.backend.room.bed')</th>
                                <th>@lang('labels.backend.room.cabinet')</th>
                                <th>@lang('labels.backend.room.bath_room')</th>
                                <th>@lang('labels.backend.room.electric_water_heater')</th>
                                <th>@lang('labels.backend.room.air_conditional')</th>
                                <th>@lang('labels.backend.room.floor')</th>
                                <th>@lang('labels.backend.room.width')</th>
                                <th>@lang('labels.backend.room.way')</th>
                                <th>@lang('labels.backend.common.full_address')</th>
                                <th>@lang('labels.general.actions')</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($rooms as $room)
                               <tr>
                                    <td>{{ $room->feature }}</td>
                                    <td>{{ $room->bed }}</td>
                                    <td>{{ $room->cabinet }}</td>
                                    <td>{{ $room->bath_room }}</td>
                                    <td>{{ $room->electric_water_heater }}</td>
                                    <td>{{ $room->air_conditional }}</td>
                                    <td>{{ $room->floor }}</td>
                                    <td>{{ $room->width }}</td>
                                    <td>{{ $room->way }}</td>
                                    <td>{!! $room->action_buttons !!}</td>
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
                       {!! $rooms->total() !!} {{ trans_choice('labels.backend.apartment.total', $rooms->total()) }}
                    </div>
                </div><!--col-->

                <div class="col-5">
                    <div class="float-right">
                        {!! $rooms->render() !!}
                    </div>
                </div><!--col-->
            </div><!--row-->
        </div><!--card-body-->
    </div><!--card-->
@endsection
