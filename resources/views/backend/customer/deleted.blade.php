@extends('backend.layouts.app')

@section('title', __('labels.backend.customer.management') . ' | ' . __('labels.backend.customer.deleted'))

@section('content')
<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-sm-5">
                <h4 class="card-title mb-0">
                    @lang('labels.backend.customer.management')
                    <small class="text-muted">@lang('labels.backend.customer.deleted')</small>
                </h4>
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
