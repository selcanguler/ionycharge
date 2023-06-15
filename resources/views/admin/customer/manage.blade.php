@extends("admin.layouts.default")
@section('breadcrumbs')
    <li class="breadcrumb-item active"><a href="{{ route("admin.customer.index") }}">Customer Management</a></li>
    @if(isset($data))
        <li class="breadcrumb-item active" aria-current="page">{{trans('admiko.page_breadcrumbs_edit')}}</li>
    @else
        <li class="breadcrumb-item active" aria-current="page">{{trans('admiko.page_breadcrumbs_add')}}</li>
    @endIf
@endsection
@section('pageTitle')
<h1>Customer Management</h1>
@endsection
@section('pageInfo')
@endsection
@section('backBtn')
<a href="{{ route("admin.customer.index") }}"><i class="fas fa-angle-left"></i> {{trans('admiko.page_back_btn')}}</a>
@endsection
@section('content')
<div class="card formPage customer_manage admikoForm">
    <legend class="action">{{ isset($data) ? trans('admiko.update') : trans('admiko.add_new') }}</legend>
    <form method="POST" action="{{ $admiko_data['formAction'] }}" enctype="multipart/form-data" class="needs-validation" novalidate>
        @if(isset($data)) @method('PUT') @endIf
        @csrf
        <div class="card-body">
            @if ($errors->any())<div class="row"><div class="col-2"></div><div class="col"><div class="invalid-feedback d-block">@foreach($errors->all() as $error) {{$error}}<br> @endforeach</div></div></div>@endif
            <div class="row">
                
                <div class=" col-12">
                    <div class="form-group row">
                        <label for="firstname" class="col-md-2 col-form-label">Ad:*</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" id="firstname" name="firstname" required="true" placeholder="Ad"  value="{{{ old('firstname', isset($data)?$data->firstname : '') }}}">
                            <div class="invalid-feedback @if ($errors->has('firstname')) d-block @endif">{{trans('admiko.required_text')}}</div>
                            <small id="firstname_help" class="text-muted"></small>
                        </div>
                    </div>
                </div>
                <div class=" col-12">
                    <div class="form-group row">
                        <label for="lastname" class="col-md-2 col-form-label">Soyad:*</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" id="lastname" name="lastname" required="true" placeholder="Soyad"  value="{{{ old('lastname', isset($data)?$data->lastname : '') }}}">
                            <div class="invalid-feedback @if ($errors->has('lastname')) d-block @endif">{{trans('admiko.required_text')}}</div>
                            <small id="lastname_help" class="text-muted"></small>
                        </div>
                    </div>
                </div>
                <div class=" col-12">
                    <div class="form-group row">
                        <label for="email" class="col-md-2 col-form-label">E-Posta:*</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" id="email" name="email" required="true" placeholder="E-Posta"  value="{{{ old('email', isset($data)?$data->email : '') }}}">
                            <div class="invalid-feedback @if ($errors->has('email')) d-block @endif">{{trans('admiko.required_text')}}</div>
                            <small id="email_help" class="text-muted"></small>
                        </div>
                    </div>
                </div>
                <div class=" col-12">
                    <div class="form-group row">
                        <label for="password" class="col-md-2 col-form-label">Şifre:</label>
                        <div class="col-md-10">
                            <input type="password" class="form-control" id="password" name="password"  placeholder="Şifre"  value="">
                            @if ($errors->has('password'))<div class="invalid-feedback d-block">{{ $errors->first('password') }}</div>@endif
                            <div class="invalid-feedback @if ($errors->has('password')) d-block @endif">{{trans('admiko.required_text')}}</div>
                            <small id="password_help" class="text-muted"></small>
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
                    <a href="{{ route("admin.customer.index") }}" class="btn btn-secondary float-end" role="button">{{trans('admiko.table_cancel')}}</a>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection