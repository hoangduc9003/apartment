@extends('backend.layouts.app')

@section('title', __('labels.backend.apartment.management') . ' | ' . __('labels.backend.apartment.create'))

@section('content')
    {{ html()->form('POST', route('admin.apartment.store'))->class('form-horizontal')->open() }}
        <div class="card">
            <div class="card-body">
                <input type="hidden" name="owner_id" value="1">
                <div class="row">
                    <div class="col-sm-5">
                        <h4 class="card-title mb-0">
                            @lang('labels.backend.apartment.management')
                            <small class="text-muted">@lang('labels.backend.apartment.create')</small>
                        </h4>
                    </div><!--col-->
                </div><!--row-->

                <hr>

                <div class="row mt-4 mb-4">
                    <div class="col">
                        <div class="form-group row">
                            {{ html()->label(__('validation.attributes.backend.apartment.apartment_name'))->class('col-md-2 form-control-label')->for('apartment_name') }}

                            <div class="col-md-10">
                                {{ html()->text('apartment_name')
                                    ->class('form-control')
                                    ->placeholder(__('validation.attributes.backend.apartment.apartment_name'))
                                    ->attribute('maxlength', 191)
                                    ->required()
                                    ->autofocus() }}
                            </div><!--col-->
                        </div><!--form-group-->


                        <div class="form-group row">
                            <label class="col-md-2 col-form-label" for="number_of_floors">{{__('validation.attributes.backend.apartment.number_of_floors')}}</label>

                            <div class="col-md-10">
                                <input class="form-control" type="number" name="number_of_floors" id="number_of_floors" placeholder="{{__('validation.attributes.backend.apartment.number_of_floors')}}" maxlength="191" required="">
                            </div><!--col-->
                        </div><!--form-group-->

                        <div class="form-group row">
                            <label class="col-md-2 col-form-label" for="number_of_rooms">{{__('validation.attributes.backend.apartment.number_of_rooms')}}</label>

                            <div class="col-md-10">
                                <input class="form-control" type="number" name="number_of_rooms" id="number_of_rooms" placeholder="{{__('validation.attributes.backend.apartment.number_of_rooms')}}" maxlength="191" required="">
                            </div><!--col-->
                        </div><!--form-group-->

                        <div class="form-group row">
                            {{ html()->label(__('validation.attributes.backend.apartment.color'))->class('col-md-2 form-control-label')->for('color') }}

                            <div class="col-md-10">
                                {{ html()->text('color')
                                    ->class('form-control')
                                    ->placeholder(__('validation.attributes.backend.apartment.color'))
                                    ->attribute('maxlength', 191)
                                    ->required() }}
                            </div><!--col-->
                        </div><!--form-group-->

                    </div><!--col-->
                </div><!--row-->
            </div><!--card-body-->

            <div class="card-footer clearfix">
                <div class="row">
                    <div class="col">
                        {{ form_cancel(route('admin.apartment.index'), __('buttons.general.cancel')) }}
                    </div><!--col-->

                    <div class="col text-right">
                        {{ form_submit(__('buttons.general.crud.create')) }}
                    </div><!--col-->
                </div><!--row-->
            </div><!--card-footer-->
        </div><!--card-->
    {{ html()->form()->close() }}
@endsection
