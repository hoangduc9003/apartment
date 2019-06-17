@extends('backend.layouts.app')

@section('title', app_name() . ' | ' . __('labels.backend.country.management'))
@section('title', 'country'))

@section('breadcrumb-links')
{{--    @include('backend.auth.user.includes.breadcrumb-links')--}}
@endsection

@section('content')
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-sm-5">
                    <h4 class="card-title mb-0">
                        {{ __('labels.backend.country.management') }}
                    </h4>
                </div><!--col-->

                <div class="col-sm-7">
                    <div class="btn-toolbar float-right" role="toolbar" aria-label="@lang('labels.general.toolbar_btn_groups')">
                        <a href="{{ route('admin.country.import') }}" class="btn btn-info ml-1" data-toggle="tooltip" title="@lang('labels.general.import')"><i class="fas fa-folder"></i></a>
                    </div><!--btn-toolbar-->

                    <div class="btn-toolbar float-right" role="toolbar" aria-label="@lang('labels.general.toolbar_btn_groups')">
                        <a href="{{ route('admin.country.create') }}" class="btn btn-success ml-1" data-toggle="tooltip" title="@lang('labels.general.create_new')"><i class="fas fa-plus-circle"></i></a>
                    </div><!--btn-toolbar-->
                </div><!--col-->
            </div><!--row-->

            <div class="row mt-4">
                <div class="col">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                            <tr>
                                <th>@lang('labels.backend.common.name')</th>
                                <th>@lang('labels.backend.common.code')</th>
                                <th>@lang('labels.backend.country.two_letter_iso_code')</th>
                                <th>@lang('labels.backend.country.three_letter_iso_code')</th>
                                <th>@lang('labels.backend.country.nationality')</th>
                                <th>@lang('labels.general.actions')</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($countries as $country)
                               <tr>
                                    <td>{{ $country->name }}</td>
                                    <td>{{ $country->code  }}</td>
                                    <td>{{ $country->two_letter_iso_code }}</td>
                                    <td>{{ $country->three_letter_iso_code }}</td>
                                    <td>{{ $country->nationality }}</td>
                                    <td>{!! $country->action_buttons !!}</td>
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
                       {!! $countries->total() !!} {{ trans_choice('labels.backend.country.total', $countries->total()) }}
                    </div>
                </div><!--col-->

                <div class="col-5">
                    <div class="float-right">
                        {!! $countries->render() !!}
                    </div>
                </div><!--col-->
            </div><!--row-->
        </div><!--card-body-->
    </div><!--card-->
@endsection
