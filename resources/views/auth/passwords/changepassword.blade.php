@extends('layouts.app', ['class' => 'off-canvas-sidebar', 'title' => __('Change Password')])
@section('content')
<div class="content">

  <div class="container-fluid">
    @if ($errors->any())
      <div class="alert alert-danger">
        <a href="#" class="close" data-dismiss="alert" arial-label="close">&times;</a>
        <ul>
          @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
    @endif
    @if (session('error'))
      <div class="alert alert-danger" role="alert">
        <a href="#" class="close" data-dismiss="alert" arial-label="close">&times;</a>
        {{ session('error')}}
      </div>
    @endif
    @if (session()->get('message'))
      <div class="alert alert-success" role="alert">
        <a href="#" class="close" data-dismiss="alert" arial-label="close">&times;</a>
        <strong>Thành công:</strong>&nbsp;{{ session()->get('message')}}
      </div>
    @endif
      <div class="row">
          <div class="col-md-12">
              <div class="card">
                  <div class="card-header"><h4>Thay đổi mật khẩu</h4></div>
                  <div class="card-body">
                      @if (session('status'))
                          <div class="alert alert-success" role="alert">
                              {{ session('status') }}
                          </div>
                      @endif
                      <form method="post" action="{{route('changepassword')}}" class="form-horizontal">
                        @csrf
                        <div class="card ">
                          <div class="card-body">
                              <div class="row">
                                <label class="col-sm-2 col-form-label" for="current_password">{{ __('Mật khẩu hiện tại') }}</label>
                                <div class="col-sm-7">
                                  <div class="form-group">
                                    <input class="form-control" type="password" name="current_password" id="current_password" placeholder="{{ __('Mật khẩu hiện tại') }}" required />
                                  </div>
                                </div>
                              </div>
                              <div class="row">
                                <label class="col-sm-2 col-form-label" for="new_password">{{ __('Mật khẩu mới') }}</label>
                                <div class="col-sm-7">
                                  <div class="form-group">
                                    <input class="form-control" name="new_password" id="new_password" type="password" placeholder="{{ __('Mật khẩu mới') }}" required />
                                  </div>
                                </div>
                              </div>
                              <div class="row">
                                <label class="col-sm-2 col-form-label" for="new_password_confirmation">{{ __('Xác nhận mật khẩu') }}</label>
                                <div class="col-sm-7">
                                  <div class="form-group">
                                    <input class="form-control" name="new_password_confirmation" id="new_password_confirmation" type="password" placeholder="{{ __('Xác nhận mật khẩu') }}" value="" required />
                                  </div>
                                </div>
                              </div>
                          </div>
                          <div class="card-footer ml-auto mr-auto">
                            <button type="submit" class="btn btn-primary">{{ __('Thay đổi mật khẩu') }}</button>
                          </div>
                        </div>
                      </form>
              </div>
          </div>
      </div>
  </div>
</div>
@endsection



