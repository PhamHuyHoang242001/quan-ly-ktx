@extends('layouts.app')
@section('content')
    <div class="content">
        @if(Auth::user()->hasRole('admin'))
        <div class="container">
            <h3 style="">
                <a href="{{ route('dashboard') }}"><i class="fa fa-arrow-circle-o-left"></i></a>
                    Thông tin sinh viên     
            </h3>
            <div class="row gutters-sm">
            <div class="col-md-4 mb-3">
                <div style="margin-top:30px;">
                    <img src="{{ URL::to('/') }}/uploads/{{ $ttsv->image }}" alt="Avatar" class="rounded mx-auto d-block img-thumbnail" width="200">
                </div>
            </div>
            <div class="col-md-8">
                <div class="card mb-3">
                <div class="card-body">
                    <div class="row">
                    <div class="col-sm-3">
                        <h6 class="mb-0">{{ __('Tên')}}</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                        {{$ttsv->name}}
                    </div>
                    </div>
                    <hr>
                    <div class="row">
                    <div class="col-sm-3">
                        <h6 class="mb-0">{{ __('Email')}}</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                        {{$ttsv->email}}
                    </div>
                    </div>
                    <hr>
                    <div class="row">
                    <div class="col-sm-3">
                        <h6 class="mb-0">{{ __('Giới tính') }}</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                        {{ $gender}}
                    </div>
                    </div>
                    <hr>
                    <div class="row">
                    <div class="col-sm-3">
                        <h6 class="mb-0">{{ __('Số điện thoại')}}</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                        {{$ttsv->sdt}}
                    </div>
                    </div>
                    <hr>
                    <div class="row">
                    <div class="col-sm-3">
                        <h6 class="mb-0">{{ __('Mã số sinh viên') }}</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                        {{ $ttsv->mssv}}
                    </div>
                    </div>
                    <hr>
                    <div class="row">
                    <div class="col-sm-3">
                        <h6 class="mb-0">{{__('Khóa')}}</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                        {{$khoa}}
                    </div>
                    </div>
                    <hr>
                    <div class="row">
                    <div class="col-sm-3">
                        <h6 class="mb-0">{{ __('Viện') }}</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                        {{ $vien}}
                    </div>
                    </div>
                    <hr>
                    <div class="row">
                    <div class="col-sm-3">
                        <h6 class="mb-0">{{ __('Quê quán') }}</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                        {{ $ttsv->quequan}}
                    </div>
                    </div>
                </div>
                </div>
                </div>
                </div>
            </div>
            </div>
        </div>
        @endif
    </div>
    
@endsection
