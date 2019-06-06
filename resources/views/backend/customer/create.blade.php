@extends('backend.layouts.app')

@section('title', __('labels.backend.users.management') . ' | ' . __('labels.backend.users.create'))

@section('breadcrumb-links')
    @include('backend.auth.user.includes.breadcrumb-links')
@endsection

@section('content')
    {{ html()->form('POST', route('admin.customer.store'))->class('form-horizontal')->open() }}
        <div class="card">
            <div class="card-body">
                <input type="hidden" name="nationality_id" value="1">
                <div class="row">
                    <div class="col-sm-5">
                        <h4 class="card-title mb-0">
                            @lang('labels.backend.users.management')
                            <small class="text-muted">@lang('labels.backend.customer.create')</small>
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
                                <input class="form-check-input" id="gender-male" type="radio" checked="true" value="Male" name="gender">
                                <label class="form-check-label" for="gender-male">Male</label>
                              </div>
                              <div class="form-check form-check-inline mr-4">
                                <input class="form-check-input" id="gender-female" type="radio" value="Female" name="gender">
                                <label class="form-check-label" for="gender-female">Female</label>
                              </div>
                              <div class="form-check form-check-inline mr-4">
                                <input class="form-check-input" id="gender-other" type="radio" value="Other" name="gender">
                                <label class="form-check-label" for="gender-other">Other</label>
                              </div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-2 col-form-label" for="age">{{__('validation.attributes.backend.customer.age')}}</label>

                            <div class="col-md-10">
                                <input class="form-control" type="number" name="age" id="age" placeholder="{{__('validation.attributes.backend.customer.age')}}" maxlength="191" required="">
                            </div><!--col-->
                        </div><!--form-group-->

                        <div class="form-group row">
                            <label class="col-md-2 col-form-label" for="phone">{{__('validation.attributes.backend.customer.phone')}}</label>

                            <div class="col-md-10">
                                <input class="form-control" type="text" name="phone" id="phone" placeholder="{{__('validation.attributes.backend.customer.phone')}}" maxlength="191" required="">
                            </div><!--col-->
                        </div><!--form-group-->

                    </div><!--col-->
                </div><!--row-->
            </div><!--card-body-->

            <div class="card-footer clearfix">
                <div class="row">
                    <div class="col">
                        {{ form_cancel(route('admin.customer.index'), __('buttons.general.cancel')) }}
                    </div><!--col-->

                    <div class="col text-right">
                        {{ form_submit(__('buttons.general.crud.create')) }}
                    </div><!--col-->
                </div><!--row-->
            </div><!--card-footer-->
        </div><!--card-->
    {{ html()->form()->close() }}
@endsection
