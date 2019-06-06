@extends('backend.layouts.app')

@section('title', app_name() . ' | ' . __('labels.backend.customer.management'))
@section('title', 'Customer'))

@section('breadcrumb-links')
{{--    @include('backend.auth.user.includes.breadcrumb-links')--}}
@endsection

@section('content')
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-sm-5">
                    <h4 class="card-title mb-0">
                        {{ __('labels.backend.customer.management') }}
                    </h4>
                </div><!--col-->

                <div class="col-sm-7">
                    <div class="btn-toolbar float-right" role="toolbar" aria-label="@lang('labels.general.toolbar_btn_groups')">
                        <a href="{{ route('admin.customer.create') }}" class="btn btn-success ml-1" data-toggle="tooltip" title="@lang('labels.general.create_new')"><i class="fas fa-plus-circle"></i></a>
                    </div><!--btn-toolbar-->
                </div><!--col-->
            </div><!--row-->

            <div class="row mt-4">
                <div class="col">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                            <tr>
                                <th>@lang('labels.backend.common.last_name')</th>
                                <th>@lang('labels.backend.common.first_name')</th>
                                <th>@lang('labels.backend.common.email')</th>
                                <th>@lang('labels.backend.common.age')</th>
                                <th>@lang('labels.backend.common.phone')</th>
                                <th>@lang('labels.backend.common.gender')</th>
                                <th>@lang('labels.general.actions')</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($customers as $customer)
                               <tr>
                                    <td>{{ $customer->last_name }}</td>
                                    <td>{{ $customer->first_name }}</td>
                                    <td>{{ $customer->email }}</td>
                                    <td>{{ $customer->age }}</td>
                                    <td>{{ $customer->phone }}</td>                                    
                                    <td>{{ $customer->gender }}</td>
                                    <td>{!! $customer->action_buttons !!}</td>
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
                       {!! $customers->total() !!} {{ trans_choice('labels.backend.customer.total', $customers->total()) }}
                    </div>
                </div><!--col-->

                <div class="col-5">
                    <div class="float-right">
                        {!! $customers->render() !!}
                    </div>
                </div><!--col-->
            </div><!--row-->
        </div><!--card-body-->
    </div><!--card-->
@endsection
