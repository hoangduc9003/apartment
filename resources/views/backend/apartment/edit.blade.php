@extends('backend.layouts.app')

@section('title', __('labels.backend.apartment.management') . ' | ' . __('labels.backend.apartment.edit'))

@section('breadcrumb-links')
    @include('backend.auth.user.includes.breadcrumb-links')
@endsection

@section('content')
{{ html()->modelForm($apartment, 'PATCH', route('admin.apartment.update', $apartment->id))->class('form-horizontal')->open() }}
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-sm-5">
                    <h4 class="card-title mb-0">
                        @lang('labels.backend.apartment.management')
                        <small class="text-muted">@lang('labels.backend.apartment.edit')</small>
                    </h4>
                </div><!--col-->
            </div><!--row-->

            <hr>

            <div class="row mt-4 mb-4">
                <div class="col">
                    <div class="form-group row">
                        {{ html()->label(__('validation.attributes.backend.apartment.apartment_name'))->class('col-md-2 form-control-label')->for('apartment_name') }}

                        <div class="col-md-10">
                            <input class="form-control"
                                   type="text"
                                   value="{{old('apartment_name', $apartment->apartment_name)}}"
                                   name="apartment_name" id="apartment_name"
                                   placeholder="{{__('validation.attributes.backend.apartment.apartment_name')}}"
                                   maxlength="191"
                                   required="">
                        </div><!--col-->
                    </div><!--form-group-->


                    <div class="form-group row">
                        <label class="col-md-2 col-form-label" for="number_of_floors">{{__('validation.attributes.backend.apartment.number_of_floors')}}</label>

                        <div class="col-md-10">
                            <input class="form-control"
                                   type="number"
                                   value="{{old('number_of_floors', $apartment->number_of_floors)}}"
                                   name="number_of_floors" id="number_of_floors"
                                   placeholder="{{__('validation.attributes.backend.apartment.number_of_floors')}}"
                                   required="">
                        </div><!--col-->
                    </div><!--form-group-->

                    <div class="form-group row">
                        <label class="col-md-2 col-form-label" for="number_of_rooms">{{__('validation.attributes.backend.apartment.number_of_rooms')}}</label>

                        <div class="col-md-10">
                            <input class="form-control"
                                   type="number"
                                   name="number_of_rooms"
                                   value="{{old('number_of_rooms', $apartment->number_of_rooms)}}"
                                   id="number_of_rooms"
                                   placeholder="{{__('validation.attributes.backend.apartment.number_of_rooms')}}"
                                   maxlength="191" required="">
                        </div><!--col-->
                    </div><!--form-group-->

                    <div class="form-group row">
                        {{ html()->label(__('validation.attributes.backend.apartment.color'))->class('col-md-2 form-control-label')->for('color') }}

                        <div class="col-md-10">
                            <input class="form-control"
                                   type="text"
                                   value="{{old('color', $apartment->color)}}"
                                   name="color" id="color"
                                   placeholder="{{__('validation.attributes.backend.apartment.color')}}"
                                   maxlength="191"
                                   required="">
                        </div><!--col-->
                    </div><!--form-group-->
                </div><!--col-->
            </div><!--row-->
        </div><!--card-body-->

        <div class="card-footer">
            <div class="row">
                <div class="col">
                    {{ form_cancel(route('admin.apartment.index'), __('buttons.general.cancel')) }}
                </div><!--col-->

                <div class="col text-right">
                    {{ form_submit(__('buttons.general.crud.update')) }}
                </div><!--row-->
            </div><!--row-->
        </div><!--card-footer-->
    </div><!--card-->
{{ html()->closeModelForm() }}
@endsection
