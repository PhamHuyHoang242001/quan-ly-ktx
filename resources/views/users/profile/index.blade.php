@extends('layouts.app')

@section('content')
<div class="content">
    <div class="container">
        @if ($ttsv === null)
            <script>window.location = "/user/profile/create";</script>
        @else
            <div class="main-body">
              @include('partials.alerts')
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
                              {{ $ttsv->gender}}
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
                              {{$ttsv->khoa}}
                            </div>
                          </div>
                          <hr>
                          <div class="row">
                            <div class="col-sm-3">
                              <h6 class="mb-0">{{ __('Viện') }}</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                              {{ $ttsv->vien}}
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
                          <hr>
                          <div class="row float-right">
                              <div class="col-sm-12">
                                  <a href="{{route('user.profile.edit', $ttsv)}}" class="btn btn-primary">{{ __('Chỉnh sửa')}}</a>
                              </div>
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
</div>
@endsection
