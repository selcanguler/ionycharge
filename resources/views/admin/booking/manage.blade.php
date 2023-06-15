@extends("admin.layouts.default")
@section('breadcrumbs')
    <li class="breadcrumb-item active"><a href="{{ route("admin.booking.index") }}">Reservation Management</a></li>
    @if(isset($data))
        <li class="breadcrumb-item active" aria-current="page">{{trans('admiko.page_breadcrumbs_edit')}}</li>
    @else
        <li class="breadcrumb-item active" aria-current="page">{{trans('admiko.page_breadcrumbs_add')}}</li>
    @endIf
@endsection
@section('pageTitle')
<h1>Reservation Management</h1>
@endsection
@section('pageInfo')
@endsection
@section('backBtn')
<a href="{{ route("admin.booking.index") }}"><i class="fas fa-angle-left"></i> {{trans('admiko.page_back_btn')}}</a>
@endsection
@section('content')
<div class="card formPage booking_manage admikoForm">
    <legend class="action">{{ isset($data) ? trans('admiko.update') : trans('admiko.add_new') }}</legend>
    <form method="POST" action="{{ $admiko_data['formAction'] }}" enctype="multipart/form-data" class="needs-validation" novalidate>
        @if(isset($data)) @method('PUT') @endIf
        @csrf
        <div class="card-body">
            @if ($errors->any())<div class="row"><div class="col-2"></div><div class="col"><div class="invalid-feedback d-block">@foreach($errors->all() as $error) {{$error}}<br> @endforeach</div></div></div>@endif
            <div class="row">
                
                <div class=" col-12">
                    <div class="form-group row multiSelect">
                        <label for="customer" class="col-md-2 col-form-label">Müşteri:*</label>
                        <div class="col-md-10" style="position: relative">
                            <select class="form-select" id="customer" name="customer" required="true" data-placeholder="{{trans('admiko.select')}}" style="width: 100%" data-width="100%" data-allow-clear="true">
                                
                                @foreach($customer_all as $id => $value)
                                    <option value="{{ $id }}" {{ (old('customer') ? old('customer') : $data->customer ?? '') == $id ? 'selected' : '' }}>{{ $value }}</option>
                                @endforeach
                            </select>
                            <div class="invalid-feedback @if ($errors->has('customer')) d-block @endif">{{trans('admiko.required_text')}}</div>
                            <small id="customer_help" class="text-muted"></small>
                        </div>
                    </div>
                </div>

                <div class=" col-12">
                    <div class="form-group row multiSelect">
                        <label for="car_brand" class="col-md-2 col-form-label">Araç Marka:*</label>
                        <div class="col-md-10" style="position: relative">
                            <select class="form-select" id="car_brand" name="car_brand" required="true" data-placeholder="{{trans('admiko.select')}}" style="width: 100%" data-width="100%" data-allow-clear="true">
                                
                                @foreach($car_all as $id => $value)
                                    <option value="{{ $id }}" {{ (old('car_brand') ? old('car_brand') : $data->car_brand ?? '') == $id ? 'selected' : '' }}>{{ $value }}</option>
                                @endforeach
                            </select>
                            <div class="invalid-feedback @if ($errors->has('car_brand')) d-block @endif">{{trans('admiko.required_text')}}</div>
                            <small id="car_brand_help" class="text-muted"></small>
                        </div>
                    </div>
                </div>

                <div class=" col-12">
                    <div class="form-group row multiSelect">
                        <label for="car_model" class="col-md-2 col-form-label">Araç Model:*</label>
                        <div class="col-md-10" style="position: relative">
                            <select class="form-select" id="car_model" name="car_model" required="true" data-placeholder="{{trans('admiko.select')}}" style="width: 100%" data-width="100%" data-allow-clear="true">
                                
                                @foreach($car_model_all as $id => $value)
                                    <option value="{{ $id }}" {{ (old('car_model') ? old('car_model') : $data->car_model ?? '') == $id ? 'selected' : '' }}>{{ $value }}</option>
                                @endforeach
                            </select>
                            <div class="invalid-feedback @if ($errors->has('car_model')) d-block @endif">{{trans('admiko.required_text')}}</div>
                            <small id="car_model_help" class="text-muted"></small>
                        </div>
                    </div>
                </div>

                <div class=" col-12">
                    <div class="form-group row">
                        <label for="car_type" class="col-md-2 col-form-label">Araç Tipi:*</label>
                        <div class="col-md-10">
                            <select class="form-select" id="car_type" name="car_type" required="true">
                                
                                @foreach($car_type_all as $id => $value)
                                    <option value="{{ $id }}" {{ (old('car_type') ? old('car_type') : $data->car_type ?? '') == $id ? 'selected' : '' }}>{{ $value }}</option>
                                @endforeach
                            </select>
                            <div class="invalid-feedback @if ($errors->has('car_type')) d-block @endif">{{trans('admiko.required_text')}}</div>
                            <small id="car_type_help" class="text-muted"></small>
                        </div>
                    </div>
                </div>

                <div class=" col-12">
                    <div class="form-group row multiSelect">
                        <label for="city" class="col-md-2 col-form-label">İl:*</label>
                        <div class="col-md-10" style="position: relative">
                            <select class="form-select" id="city" name="city" required="true" data-placeholder="{{trans('admiko.select')}}" style="width: 100%" data-width="100%" data-allow-clear="true">
                                
                                @foreach($city_all as $id => $value)
                                    <option value="{{ $id }}" {{ (old('city') ? old('city') : $data->city ?? '') == $id ? 'selected' : '' }}>{{ $value }}</option>
                                @endforeach
                            </select>
                            <div class="invalid-feedback @if ($errors->has('city')) d-block @endif">{{trans('admiko.required_text')}}</div>
                            <small id="city_help" class="text-muted"></small>
                        </div>
                    </div>
                </div>

                <div class=" col-12">
                    <div class="form-group row multiSelect">
                        <label for="district" class="col-md-2 col-form-label">İlçe:*</label>
                        <div class="col-md-10" style="position: relative">
                            <select class="form-select" id="district" name="district" required="true" data-placeholder="{{trans('admiko.select')}}" style="width: 100%" data-width="100%" data-allow-clear="true">
                                
                                @foreach($district_all as $id => $value)
                                    <option value="{{ $id }}" {{ (old('district') ? old('district') : $data->district ?? '') == $id ? 'selected' : '' }}>{{ $value }}</option>
                                @endforeach
                            </select>
                            <div class="invalid-feedback @if ($errors->has('district')) d-block @endif">{{trans('admiko.required_text')}}</div>
                            <small id="district_help" class="text-muted"></small>
                        </div>
                    </div>
                </div>

                <div class=" col-12">
                    <div class="form-group row multiSelect">
                        <label for="station" class="col-md-2 col-form-label">İstasyon:*</label>
                        <div class="col-md-10" style="position: relative">
                            <select class="form-select" id="station" name="station" required="true" data-placeholder="{{trans('admiko.select')}}" style="width: 100%" data-width="100%" data-allow-clear="true">
                                
                                @foreach($station_all as $id => $value)
                                    <option value="{{ $id }}" {{ (old('station') ? old('station') : $data->station ?? '') == $id ? 'selected' : '' }}>{{ $value }}</option>
                                @endforeach
                            </select>
                            <div class="invalid-feedback @if ($errors->has('station')) d-block @endif">{{trans('admiko.required_text')}}</div>
                            <small id="station_help" class="text-muted"></small>
                        </div>
                    </div>
                </div>

                <div class=" col-12">
                    <div class="form-group row">
                        <label for="booking_date" class="col-md-2 col-form-label">Tarih:*</label>
                        <div class="col-md-10">
                            <div class="input-group" id="datePicker_booking_date" data-target-input="nearest">
                                <input type="text" autocomplete="off" style="max-width: 170px;border-right: unset;"
                                       data-date_time_format="{{config('admiko_config.form_date_format')}}"
                                       class="form-control datetimepicker-input datePicker"
                                       data-target="#datePicker_booking_date" required="true" id="booking_date" data-toggle="datetimepicker"
                                       placeholder="Tarih" name="booking_date" value="{{{ old('booking_date', isset($data)?$data->booking_date : '') }}}">
                                <div class="input-group-append input-group-text" data-target="#datePicker_booking_date" data-toggle="datetimepicker">
                                    <i class="fas fa-calendar-alt fa-fw"></i>
                                </div>
                            </div>
                            <div class="invalid-feedback @if ($errors->has('booking_date')) d-block @endif">{{trans('admiko.required_text')}}</div>
                            <small id="booking_date_help" class="text-muted"></small>
                        </div>
                    </div>
                </div>
                <div class=" col-12">
                    <div class="form-group row">
                        <label for="booking_time" class="col-md-2 col-form-label">Rezervasyon Saati:*</label>
                        <div class="col-md-10">
                            <select class="form-select" id="booking_time" name="booking_time" required="true">
                                
                                @foreach($booking_time_all as $id => $value)
                                    <option value="{{ $id }}" {{ (old('booking_time') ? old('booking_time') : $data->booking_time ?? '') == $id ? 'selected' : '' }}>{{ $value }}</option>
                                @endforeach
                            </select>
                            <div class="invalid-feedback @if ($errors->has('booking_time')) d-block @endif">{{trans('admiko.required_text')}}</div>
                            <small id="booking_time_help" class="text-muted"></small>
                        </div>
                    </div>
                </div>

                <div class=" col-12">
                    <div class="form-group row">
                        <label for="cost" class="col-md-2 col-form-label">Fiyat:*</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" id="cost" name="cost" required="true" placeholder="Fiyat"  value="{{{ old('cost', isset($data)?$data->cost : '') }}}">
                            <div class="invalid-feedback @if ($errors->has('cost')) d-block @endif">{{trans('admiko.required_text')}}</div>
                            <small id="cost_help" class="text-muted"></small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-footer form-actions" id="form-group-buttons">
            <div class="row">
                <div class="col-2"></div>
                <div class="col-sm-10">
                    <button type="submit" class="btn btn-primary float-start me-1 mb-1 mb-sm-0 save-button">{{trans('admiko.table_save')}}</button>
                    <a href="{{ route("admin.booking.index") }}" class="btn btn-secondary float-end" role="button">{{trans('admiko.table_cancel')}}</a>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection