@extends('adminlte::layouts.app')

@section('htmlheader_title')
    Quản lý nhân sự
@endsection

@section('contentheader_title')
    Quản lý nhân sự
@stop
@section('main-content')
    <div class="user-manager-content col-sm-12 m-2">
        {{--<div class="add-notice-area col-sm-12 align-content-sm-center alert" style="display: none">
            <div id="notice-content"></div>
        </div>--}}
        <div class="add-action-area row" style="margin: 10px 0 30px">
            <form id="search-user-form" class="col-sm-10 row">
                <button id="search-user-btn" class="btn btn-primary"><i class="fa fa-search"></i></button>
                <div class="form-group col-sm-4">
                    <input class="form-control" id="search-user-input" type="text" placeholder="Nhập nhân viên cần tìm..." name="user">
                </div>
                <div class="form-group col-sm-3">
                    <input class="form-control" list="role" name="role" placeholder="Vị trí làm việc...">
                    <datalist id="role">
                        <option value="Lễ tân">
                        <option value="Quản lý">
                        <option value="Phục vụ phòng">
                        <option value="Phục vụ Bar">
                        <option value="Phục vụ bếp">
                    </datalist>
                </div>
                <div class="form-group col-sm-4">
                    <input class="form-control" list="hotel-name" name="hotel" placeholder="Khách sạn làm việc...">
                    <datalist id="hotel-name">
                       @if(!$hotelsList->isEmpty())
                            @foreach($hotelsList as $hotel)
                                <option value="{{ $hotel }}">
                            @endforeach
                        @endif
                    </datalist>
                </div>
            </form>
            <div class="col-sm-2 text-right">
                <button id="add-user-btn" class="btn btn-success">Thêm mới</button>
            </div>
        </div>
        <div id="user-list" class="col-sm-12">

        </div>
        @include('hotelmanagement.components.store_user_modal')
    </div>
@endsection
@section('private_script')
    <script src="{{ asset('/js/ajax_user.js') }}" type="text/javascript"></script>
@stop

