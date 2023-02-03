@extends('layouts.app')
@section('content')
<div class="content">
    <div class="container">
        <div class="card">
            <div class="card-body">
                <form method="POST" action="{{ route('admin.users.update', $profile->id) }}" enctype="multipart/form-data">
                    <!-- Grid row -->
                    @csrf
                    @method('PUT')
                    <div class="form-row">
                    <!-- Grid column -->
                        <div class="col-md-6">
                            <!-- Material input -->
                            <div class="md-form form-group">
                            <input type="text" class="form-control  @error('sdt') is-invalid @enderror" id="sdt" name="sdt" value={{ $profile->sdt }}>
                            @error('sdt')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            <label for="sdt">Số điện thoại</label>
                            </div>
                        </div>
                        <!-- Grid column -->
                    
                        <!-- Grid column -->
                        <div class="col-md-6">
                            <!-- Material input -->
                            <div class="md-form form-group">
                            <input type="text" class="form-control @error('mssv') is-invalid @enderror" id="mssv" name="mssv" value="{{$profile->mssv}}">
                            @error('mssv')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            <label for="mssv">Mã số sinh viên</label>
                            </div>
                        </div>
                    <!-- Grid column -->
                    </div>
                    <!-- Grid row -->
                
                    <!-- Grid row -->
                    <div class="row">
                    <!-- Grid column -->
                        <div class="col-md-12">
                            <!-- Material input -->
                            <div class="md-form form-group">
                            <input type="text" class="form-control @error('quequan') is-invalid @enderror" id="quequan" name="quequan" value="{{$profile->quequan}}">
                            @error('quequan')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            <label for="quequan">Quê quán</label>
                            </div>
                        </div>
                    <!-- Grid column -->
                
                    <!-- Grid column -->

                        <div class="col-md-12">
                            <!-- Material input -->
                            <div class="md-form form-group">
                                <select class="custom-select custom-select-md @error('vien') is-invalid @enderror" name="vien">
                                    <option value="" selected>{{ __('Viện') }}</option>
                                    @foreach($viens as $vien)
                                    <option value="{{$vien}}" {{$vien == $profile->vien ? 'selected' : ''}}>{{ $vien }}</option>
                                    @endforeach
                                </select>
                                @error('vien')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        
                    <!-- Grid column -->
                    </div>
                    <!-- Grid row -->
                
                    <!-- Grid row -->
                    <div class="form-row">
                    <!-- Grid column -->
                        <div class="col-md-5">
                            <!-- Material input -->
                            <div class="md-form form-group">
                                <select class="custom-select custom-select-md @error('gender') is-invalid @enderror" name="gender">
                                    <option value="" selected>{{ __('Giới tính') }}</option>
                                    @foreach($genders as $gender)
                                    <option value="{{ $gender}}" {{$gender == $profile->gender ? 'selected' : ''}}>{{ $gender }}</option>
                                    @endforeach
                                </select>
                                @error('gender')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <!-- Grid column -->
                    
                        <!-- Grid column -->
                        <div class="col-md-5">
                            <!-- Material input -->
                            <div class="md-form form-group">
                                <select class="custom-select custom-select-md @error('khoa') is-invalid @enderror" name="khoa">
                                    <option value="" selected>Khóa</option>
                                    @foreach($khoas as $khoa)
                                    <option value="{{ $khoa}}" {{$khoa == $profile->khoa ? 'selected' : ''}}>{{ $khoa }}</option>
                                    @endforeach
                                  </select>
                                @error('khoa')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <!-- Grid column -->
                        <div class="col-md-12">
                            <div class="md-form form-group">
                                <div class="file-field">
                                    <div class="btn btn-primary btn-sm float-left">
                                    <label for="image">Select files</label>
                                    <input type="file" name="image" />
                                    <img src="{{ URL::to('/') }}/uploads/{{ $profile->image }}" class="img-thumbnail" width="100" />
                                    <input type="hidden" name="hidden_image" value="{{ $profile->image }}" />
                                    </div>
                                </div>
                            </div>
                        </div>
                        </div>
                    <!-- Grid row -->
                    <button type="submit" class="btn btn-primary btn-md">{{ __('Sửa')}}</button>
                </form>
              <!-- Extended material form grid -->
            </div>
          <!-- Extended material form grid -->
        </div>
</div>
@endsection
