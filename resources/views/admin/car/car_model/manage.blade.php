@extends("admin.layouts.default")
@section('breadcrumbs')
    <li class="breadcrumb-item active"><a href="{{ route("admin.car.index") }}">Cars Management</a></li>
<li class="breadcrumb-item active"><a href="{{ route("admin.car_model.index",[Request()->admiko_car_id]) }}">Model Yönetimi</a></li>
    @if(isset($data))
        <li class="breadcrumb-item active" aria-current="page">{{trans('admiko.page_breadcrumbs_edit')}}</li>
    @else
        <li class="breadcrumb-item active" aria-current="page">{{trans('admiko.page_breadcrumbs_add')}}</li>
    @endIf
@endsection
@section('pageTitle')
<h1>Model Yönetimi</h1>
@endsection
@section('pageInfo')
@endsection
@section('backBtn')
<a href="{{ route("admin.car_model.index",[Request()->admiko_car_id]) }}"><i class="fas fa-angle-left"></i> {{trans('admiko.page_back_btn')}}</a>
@endsection
@section('content')
<div class="card formPage car_model_manage admikoForm">
    <legend class="action">{{ isset($data) ? trans('admiko.update') : trans('admiko.add_new') }}</legend>
    <form method="POST" action="{{ $admiko_data['formAction'] }}" enctype="multipart/form-data" class="needs-validation" novalidate>
        @if(isset($data)) @method('PUT') @endIf
        @csrf
        <div class="card-body">
            @if ($errors->any())<div class="row"><div class="col-2"></div><div class="col"><div class="invalid-feedback d-block">@foreach($errors->all() as $error) {{$error}}<br> @endforeach</div></div></div>@endif
            <div class="row">
                
                <div class=" col-12">
                    <div class="form-group row">
                        <label for="model_name" class="col-md-2 col-form-label">Model:*</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" id="model_name" name="model_name" required="true" placeholder="Model"  value="{{{ old('model_name', isset($data)?$data->model_name : '') }}}">
                            <div class="invalid-feedback @if ($errors->has('model_name')) d-block @endif">{{trans('admiko.required_text')}}</div>
                            <small id="model_name_help" class="text-muted"></small>
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
                    <a href="{{ route("admin.car_model.index",[Request()->admiko_car_id]) }}" class="btn btn-secondary float-end" role="button">{{trans('admiko.table_cancel')}}</a>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection