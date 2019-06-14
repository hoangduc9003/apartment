@extends('backend.layouts.app')

@section('title', __('labels.backend.customer.management') . ' | ' . __('labels.backend.customer.view'))


@section('content')
<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-sm-5">
                <h4 class="card-title mb-0">
                    @lang('labels.backend.customer.management')
                    <small class="text-muted">@lang('labels.backend.customer.view')</small>
                </h4>
            </div><!--col-->
        </div><!--row-->

        <div class="row mt-4 mb-4">
            <div class="col">
                <ul class="nav nav-tabs" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" data-toggle="tab" href="#overview" role="tab" aria-controls="overview" aria-expanded="true"><i class="fas fa-user"></i> @lang('labels.backend.access.users.tabs.titles.overview')</a>
                    </li>
                </ul>

                <div class="tab-content">
                    <div class="tab-pane active" id="overview" role="tabpanel" aria-expanded="true">
                        <div class="col">
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <tr>
                                        <th>@lang('labels.backend.access.users.tabs.content.overview.name')</th>
                                        <td>{{ $customer->name }}</td>
                                    </tr>

                                    <tr>
                                        <th>@lang('labels.backend.access.users.tabs.content.overview.email')</th>
                                        <td>{{ $customer->email }}</td>
                                    </tr>

                                    <tr>
                                        <th>@lang('labels.backend.access.users.tabs.content.overview.status')</th>
                                        <td>{!! $customer->gender !!}</td>
                                    </tr>

                                    <tr>
                                        <th>@lang('labels.backend.access.users.tabs.content.overview.confirmed')</th>
                                        <td>{!! $customer->phone !!}</td>
                                    </tr>

                                    
                                </table>
                            </div>
                        </div><!--table-responsive-->
                    </div><!--tab-->
                </div><!--tab-content-->
            </div><!--col-->
        </div><!--row-->
    </div><!--card-body-->

    <div class="card-footer">
        <div class="row">
            <div class="col">
                <small class="float-right text-muted">
                    <strong>@lang('labels.backend.access.users.tabs.content.overview.created_at'):</strong> {{ timezone()->convertToLocal($customer->created_at) }} ({{ $customer->created_at->diffForHumans() }}),
                    <strong>@lang('labels.backend.access.users.tabs.content.overview.last_updated'):</strong> {{ timezone()->convertToLocal($customer->updated_at) }} ({{ $customer->updated_at->diffForHumans() }})
                    @if($customer->trashed())
                        <strong>@lang('labels.backend.access.users.tabs.content.overview.deleted_at'):</strong> {{ timezone()->convertToLocal($customer->deleted_at) }} ({{ $customer->deleted_at->diffForHumans() }})
                    @endif
                </small>
            </div><!--col-->
        </div><!--row-->
    </div><!--card-footer-->
</div><!--card-->
@endsection
