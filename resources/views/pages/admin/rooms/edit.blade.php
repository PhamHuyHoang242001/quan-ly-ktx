@extends('layouts.app')
@section('content')

<div class="content">
    <div class="container">
        @if(Session::has('flag'))
            <div class="error" style="color: red;"><p>{{Session::get('message')}}</p></div>
        @endif
        <div class="card">
            <div class="card-body">
                <form method="POST" action="{{ route('admin.rooms.update', $room->id) }}">
                    <!-- Grid row -->
                    @csrf
                    @method('PUT')
                    <div class="form-row">
                        <div class="col-md-12">
                            <div class="md-form form-group">
                                <select class="custom-select custom-select-md @error('area') is-invalid @enderror" name="area">
                                    <option value="" selected>{{ __('Khu') }}</option>
                                    @foreach($areas as $area)
                                    <option value="{{$area->id}}" {{$room->area_id == $area->id ? 'selected' : ''}}>{{ $area->area_name }}</option>
                                    @endforeach
                                </select>
                                @error('area')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            </div>
                            <!-- Material input -->
                        </div>
                    <!-- Grid column -->
                        <div class="col-md-12">
                            <!-- Material input -->
                            <div class="md-form form-group">
                                <select class="custom-select custom-select-md @error('gender') is-invalid @enderror" name="gender">
                                    <option value="" selected>{{ __('Giới tính') }}</option>
                                    <option value="nam" {{$room->gender == 'nam' ? 'selected' : ''}}>{{ __('Nam')}}</option>
                                    <option value="nu" {{$room->gender == 'nu' ?'selected' : ''}}>{{ __('Nữ') }}</option>
                                </select>
                                @error('gender')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-12">
                            <!-- Material input -->
                            <div class="md-form form-group">
                            <input type="text" class="form-control @error('room_number') is-invalid @enderror" id="room_number" name="room_number" value={{ $room->room_number }}>
                            @error('room_number')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            <label for="room_number">Số phòng</label>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <!-- Material input -->
                            <div class="md-form form-group">
                            <input type="text" class="form-control @error('max_numbers') is-invalid @enderror" id="max_numbers" name="max_numbers" value={{ $room->max_numbers }}>
                            @error('max_numbers')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            <label for="max_numbers">Số người tối đa</label>
                            </div>
                        </div>
                        <!-- Grid column -->
                    
                        <!-- Grid column -->
                    <!-- Grid column -->
                    </div>
                    <!-- Grid row -->
                
                    <!-- Grid row -->
                    
                    <!-- Grid row -->
                    <button type="submit" class="btn btn-primary btn-md">Sửa</button>
                </form>
              <!-- Extended material form grid -->
            </div>
          <!-- Extended material form grid -->
        </div>
</div>
@endsection