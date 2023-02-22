@extends('layouts.app')
@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" style="text-align: center; font-size: 20px">{{ __('Thông tin sinh viên') }}</div>
    
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead class=" text-primary">
                                    <th>{{ __('Tên') }}</th>
                                    <th>{{ __('MSSV') }}</th>
                                    <th>{{ __('Giới tính') }}</th>
                                    {{-- <th>{{ __('Email') }}</th> --}}
                                    {{-- <th>{{ __('Số điện thoại') }}</th> --}}
                                    <th>{{ __('Phòng hiện tại') }}</th>
                                    <th>{{ __('Viện') }}</th>
                                    <th>{{ __('Khóa') }}</th>
                                    {{-- <th>{{ __('Quê quán') }}</th> --}}
                                    <th></th>
                                </thead>
                                <tbody>
                                    @foreach($profiles as $profile)
                                        <tr>
                                            <td>{{ $profile->name }}</td>
                                            <td>{{ $profile->mssv }}</td>
                                            <td>{{ $profile->gender }}</td>
                                            {{-- <td>{{ $profile->email }}</td>
                                             
                                            <td>{{ $profile->sdt }}</td> --}}
                                            

                                            <td>
                                               
                                                @foreach($room_registrations as $room_registration)
                                                        @if($room_registration->mssv == $profile->mssv)
                                                                @if($room_registration->status == 'Thành công')
                                                                    @foreach($rooms as $room)
                                                                        @if($room->id==$room_registration->room_id)
                                                                            @if($room->area_id==1)
                                                                                B1-{{$room->room_number}}
                                                                        
                                                                            @elseif($room->area_id==2)
                                                                                B2-{{$room->room_number}}
                                                                            @else
                                                                                B3-{{$room->room_number}}
                                                                            @endif
                                                                        @endif
                                                                    @endforeach
                                                                @elseif($room_registration->status == 'Đang chờ')
                                                                    {{ 'Đang chờ duyệt' }}
                                                                @else {{'Chưa đăng ký'}}
                                                                @endif
                                                        @endif
                                                @endforeach
                                                

                                            </td>
                                            <td>{{ $profile->vien }}</td>
                                            <td>{{ $profile->khoa }}</td>
                                            {{-- <td>{{ $profile->quequan }}</td> --}}
                                            <td>
                                                {{-- <a href="{{ route('admin.users.edit', $profile->id) }}" class="btn btn-primary"><i class="material-icons">edit</i></a> --}}
                                                <a href="{{ route('admin.users.show', $profile->id) }}" class="btn btn-primary"><i class="material-icons">preview</i></a>
                                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#basicExampleModal">
                                                        <i class="material-icons">delete</i>
                                                </button>
                                            </td>
                                            <!-- Modal -->
                                            <div class="modal fade" id="basicExampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        {{ __('Bạn chắc chắn muốn xóa?')}}
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                        {{--Form delete  --}}
                                                        <form action="{{ route('admin.users.destroy', $profile->id) }}" method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-danger">{{ __('Xóa')}}</button>
                                                        </form>
                                                    </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection