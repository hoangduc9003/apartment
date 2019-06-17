@extends('backend.layouts.app')

@section('title', __('labels.backend.room.management') . ' | ' . __('labels.backend.room.view'))

{{--@section('breadcrumb-links')--}}
{{--    @include('backend.auth.user.includes.breadcrumb-links')--}}
{{--@endsection--}}

@section('content')
<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-sm-5">
                <h4 class="card-title mb-0">
                    @lang('labels.backend.room.management')
                    <small class="text-muted">@lang('labels.backend.room.view')</small>
                </h4>
            </div><!--col-->
        </div><!--row-->

        <div class="row mt-4 mb-4">
            <div class="col">
                <ul class="nav nav-tabs" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" data-toggle="tab" href="#overview" role="tab" aria-controls="overview" aria-expanded="true"><i class="fas fa-user"></i> @lang('labels.backend.room.overview')</a>
                    </li>
                </ul>

                <div class="tab-content">
                    <div class="tab-pane active" id="overview" role="tabpanel" aria-expanded="true">
                        <div class="col">
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <tr>
                                        <th>@lang('labels.backend.room.feature')</th>
                                        <td>{{ $room->feature }}</td>
                                    </tr>

                                    <tr>
                                        <th>@lang('labels.backend.room.bed')</th>
                                        <td>{{ $apartment->bed }}</td>
                                    </tr>

                                    <tr>
                                        <th>@lang('labels.backend.apartment.number_of_rooms')</th>
                                        <td>{!! $apartment->number_of_rooms !!}</td>
                                    </tr>

                                    <tr>
                                        <th>@lang('labels.backend.apartment.color')</th>
                                        <td>{!! $apartment->color !!}</td>
                                    </tr>

                                    <tr>
                                        <th>@lang('labels.backend.apartment.full_address')</th>
                                        <td>{!! $apartment->full_address !!}</td>
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
                    <strong>@lang('labels.backend.access.users.tabs.content.overview.created_at'):</strong> {{ timezone()->convertToLocal($apartment->created_at) }} ({{ $apartment->created_at->diffForHumans() }}),
                    <strong>@lang('labels.backend.access.users.tabs.content.overview.last_updated'):</strong> {{ timezone()->convertToLocal($apartment->updated_at) }} ({{ $apartment->updated_at->diffForHumans() }})
                    @if($apartment->trashed())
                        <strong>@lang('labels.backend.access.users.tabs.content.overview.deleted_at'):</strong> {{ timezone()->convertToLocal($apartment->deleted_at) }} ({{ $apartment->deleted_at->diffForHumans() }})
                    @endif
                </small>
            </div><!--col-->
        </div><!--row-->
    </div><!--card-footer-->
</div><!--card-->
@endsection
