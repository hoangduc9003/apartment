@extends('backend.layouts.app')

@section('title', __('labels.backend.customer.management') . ' | ' . __('labels.backend.customer.edit'))

@section('content')
{{ html()->modelForm($customer, 'PATCH', route('admin.customer.update', $customer->id))->class('form-horizontal')->open() }}
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-sm-5">
                    <h4 class="card-title mb-0">
                        @lang('labels.backend.customer.management')
                        <small class="text-muted">@lang('labels.backend.customer.edit')</small>
                    </h4>
                </div><!--col-->
            </div><!--row-->

            <hr>

            <div class="row mt-4 mb-4">
                    <div class="col">
                        <div class="form-group row">
                            {{ html()->label(__('validation.attributes.backend.customer.first_name'))->class('col-md-2 form-control-label')->for('first_name') }}

                            <div class="col-md-10">
                                {{ html()->text('first_name')
                                    ->class('form-control')
                                    ->placeholder(__('validation.attributes.backend.customer.first_name'))
                                    ->attribute('maxlength', 191)
                                    ->required()
                                    ->autofocus() }}
                            </div><!--col-->
                        </div><!--form-group-->

                        <div class="form-group row">
                        {{ html()->label(__('validation.attributes.backend.customer.last_name'))->class('col-md-2 form-control-label')->for('last_name') }}

                            <div class="col-md-10">
                                {{ html()->text('last_name')
                                    ->class('form-control')
                                    ->placeholder(__('validation.attributes.backend.customer.last_name'))
                                    ->attribute('maxlength', 191)
                                    ->required() }}
                            </div><!--col-->
                        </div><!--form-group-->

                        <div class="form-group row">
                            {{ html()->label(__('validation.attributes.backend.customer.email'))->class('col-md-2 form-control-label')->for('email') }}

                            <div class="col-md-10">
                                {{ html()->email('email')
                                    ->class('form-control')
                                    ->placeholder(__('validation.attributes.backend.customer.email'))
                                    ->attribute('maxlength', 191)
                                    ->required() }}
                            </div><!--col-->
                        </div><!--form-group-->

                        <div class="form-group row">
                            <label class="col-md-2 col-form-label" for="gender">{{__('validation.attributes.backend.customer.gender')}}</label>
                            <div class="col-md-10 col-form-label">

                              <div class="form-check form-check-inline mr-4">
                                <input class="form-check-input" id="gender-male" type="radio" {{ $customer->gender == "Male" ? 'checked="true"' : ''}} value="Male" name="gender">
                                <label class="form-check-label" for="gender-male">Male</label>
                              </div>
                              <div class="form-check form-check-inline mr-4">
                                <input class="form-check-input" id="gender-female" type="radio" {{ $customer->gender == "Female" ? 'checked="true"' : ''}} value="Female" name="gender">
                                <label class="form-check-label" for="gender-female">Female</label>
                              </div>
                              <div class="form-check form-check-inline mr-4">
                                <input class="form-check-input" id="gender-other" type="radio" {{ $customer->gender == "Other" ? 'checked="true"' : ''}} value="Other" name="gender">
                                <label class="form-check-label" for="gender-other">Other</label>
                              </div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-2 col-form-label" for="age">{{__('validation.attributes.backend.customer.age')}}</label>

                            <div class="col-md-10">
                                <input class="form-control" type="number" name="age" value="{{old('age', $customer->age)}}" id="age" placeholder="{{__('validation.attributes.backend.customer.age')}}" maxlength="191" required="">
                            </div><!--col-->
                        </div><!--form-group-->

                        <div class="form-group row">
                            <label class="col-md-2 col-form-label" for="phone">{{__('validation.attributes.backend.customer.phone')}}</label>

                            <div class="col-md-10">
                                <input class="form-control" type="text" name="phone" value="{{old('phone', $customer->phone)}}" id="phone" placeholder="{{__('validation.attributes.backend.customer.phone')}}" maxlength="191" required="">
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
