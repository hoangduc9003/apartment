@extends('backend.layouts.app')

@section('title', __('labels.backend.contract.management') . ' | ' . __('labels.backend.contract.create'))

@section('content')
    {{ html()->form('POST', route('admin.contract.store'))->class('form-horizontal')->open() }}
        <div class="card">
            <div class="card-body">
                <input type="hidden" name="owner_id" value="1">
                <div class="row">
                    <div class="col-sm-5">
                        <h4 class="card-title mb-0">
                            @lang('labels.backend.contract.management')
                            <small class="text-muted">@lang('labels.backend.contract.create')</small>
                        </h4>
                    </div><!--col-->
                </div><!--row-->

                <hr>
                <input type="hidden" name="apartment_id" value="1">

                <div class="row mt-4 mb-4">
                    <div class="col">
                        <div class="form-group row">
                            {{ html()->label(__('validation.attributes.backend.contract.feature'))->class('col-md-2 form-control-label')->for('feature') }}

                            <div class="col-md-10">
                                {{ html()->text('apartment_name')
                                    ->class('form-control')
                                    ->placeholder(__('validation.attributes.backend.contract.feature'))
                                    ->attribute('maxlength', 191)
                                    ->required()
                                    ->autofocus() }}
                            </div><!--col-->
                        </div><!--form-group-->

                        <div class="form-group row">
                            <label class="col-md-2 col-form-label" for="bed">{{__('validation.attributes.backend.contract.bed')}}</label>

                            <div class="col-md-10">
                                <input class="form-control" type="text" name="bed" id="bed" placeholder="{{__('validation.attributes.backend.contract.bed')}}" required="">
                            </div><!--col-->
                        </div><!--form-group-->

                        <div class="form-group row">
                            <label class="col-md-2 col-form-label" for="cabinet">{{__('validation.attributes.backend.contract.cabinet')}}</label>

                            <div class="col-md-10">
                                <input class="form-control" type="text" name="cabinet" id="cabinet" placeholder="{{__('validation.attributes.backend.contract.cabinet')}}" required="">
                            </div><!--col-->
                        </div><!--form-group-->

                        <div class="form-group row">
                            <label class="col-md-2 col-form-label" for="air_conditional">{{__('validation.attributes.backend.contract.air_conditional')}}</label>

                            <div class="col-md-10">
                                <input class="form-control" type="text" name="air_conditional" id="air_conditional" placeholder="{{__('validation.attributes.backend.contract.air_conditional')}}" required="">
                            </div><!--col-->
                        </div><!--form-group-->

                        <div class="form-group row">
                            <label class="col-md-2 col-form-label" for="gender">{{__('validation.attributes.backend.contract.bath_contract')}}</label>
                            <div class="col-md-10 col-form-label">
                                <div class="form-check form-check-inline mr-4">
                                    <input class="form-check-input" id="bath_contract-yes" type="radio" checked="true" value="1" name="bath_contract">
                                    <label class="form-check-label" for="bath_contract-yes">Yes</label>
                                </div>
                                <div class="form-check form-check-inline mr-4">
                                    <input class="form-check-input" id="bath_contract-no" type="radio" value="0" name="bathcontract">
                                    <label class="form-check-label" for="bath_contract-no">No</label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-2 col-form-label" for="gender">{{__('validation.attributes.backend.contract.electric_water_heater')}}</label>
                            <div class="col-md-10 col-form-label">
                                <div class="form-check form-check-inline mr-4">
                                    <input class="form-check-input" id="electric_water_heater-yes" type="radio" checked="true" value="1" name="electric_water_heater">
                                    <label class="form-check-label" for="electric_water_heater-yes">Yes</label>
                                </div>
                                <div class="form-check form-check-inline mr-4">
                                    <input class="form-check-input" id="electric_water_heater-no" type="radio" value="0" name="electric_water_heater">
                                    <label class="form-check-label" for="electric_water_heater-no">No</label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-2 col-form-label" for="floor">{{__('validation.attributes.backend.contract.floor')}}</label>

                            <div class="col-md-10">
                                <input class="form-control" type="number" name="floor" id="floor" placeholder="{{__('validation.attributes.backend.contract.floor')}}" required="">
                            </div><!--col-->
                        </div><!--form-group-->

                        <div class="form-group row">
                            <label class="col-md-2 col-form-label" for="width">{{__('validation.attributes.backend.contract.width')}}</label>

                            <div class="col-md-10">
                                <input class="form-control" type="text" name="width" id="width" placeholder="{{__('validation.attributes.backend.contract.width')}}" required="">
                            </div><!--col-->
                        </div><!--form-group-->

                        <div class="form-group row">
                            <label class="col-md-2 col-form-label" for="gender">{{__('validation.attributes.backend.contract.way')}}</label>
                            <div class="col-md-10 col-form-label">
                                <div class="form-check form-check-inline mr-4">
                                    <input class="form-check-input" id="way-left" type="radio" checked="true" value="1" name="way">
                                    <label class="form-check-label" for="way-left">Left</label>
                                </div>
                                <div class="form-check form-check-inline mr-4">
                                    <input class="form-check-input" id="way-right" type="radio" value="2" name="way">
                                    <label class="form-check-label" for="way-right">Right</label>
                                </div>
                            </div>
                        </div>

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
