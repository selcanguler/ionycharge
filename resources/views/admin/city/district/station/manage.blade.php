@extends("admin.layouts.default")
@section('breadcrumbs')
    <li class="breadcrumb-item active"><a href="{{ route("admin.city.index") }}">City/District/Station Management</a></li>
<li class="breadcrumb-item active"><a href="{{ route("admin.district.index",[Request()->admiko_city_id]) }}">İlçe Yönetimi</a></li>
<li class="breadcrumb-item active"><a href="{{ route("admin.station.index",[Request()->admiko_city_id,Request()->admiko_district_id]) }}">İstasyon Yönetimi</a></li>
    @if(isset($data))
        <li class="breadcrumb-item active" aria-current="page">{{trans('admiko.page_breadcrumbs_edit')}}</li>
    @else
        <li class="breadcrumb-item active" aria-current="page">{{trans('admiko.page_breadcrumbs_add')}}</li>
    @endIf
@endsection
@section('pageTitle')
<h1>İstasyon Yönetimi</h1>
@endsection
@section('pageInfo')
@endsection
@section('backBtn')
<a href="{{ route("admin.station.index",[Request()->admiko_city_id,Request()->admiko_district_id]) }}"><i class="fas fa-angle-left"></i> {{trans('admiko.page_back_btn')}}</a>
@endsection
@section('content')
<div class="card formPage station_manage admikoForm">
    <legend class="action">{{ isset($data) ? trans('admiko.update') : trans('admiko.add_new') }}</legend>
    <form method="POST" action="{{ $admiko_data['formAction'] }}" enctype="multipart/form-data" class="needs-validation" novalidate>
        @if(isset($data)) @method('PUT') @endIf
        @csrf
        <div class="card-body">
            @if ($errors->any())<div class="row"><div class="col-2"></div><div class="col"><div class="invalid-feedback d-block">@foreach($errors->all() as $error) {{$error}}<br> @endforeach</div></div></div>@endif
            <div class="row">
                
                <div class=" col-12">
                    <div class="form-group row">
                        <label for="title" class="col-md-2 col-form-label">Başlık:</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" id="title" name="title"  placeholder="Başlık"  value="{{{ old('title', isset($data)?$data->title : '') }}}">
                            <div class="invalid-feedback @if ($errors->has('title')) d-block @endif">{{trans('admiko.required_text')}}</div>
                            <small id="title_help" class="text-muted"></small>
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
                    <a href="{{ route("admin.station.index",[Request()->admiko_city_id,Request()->admiko_district_id]) }}" class="btn btn-secondary float-end" role="button">{{trans('admiko.table_cancel')}}</a>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection