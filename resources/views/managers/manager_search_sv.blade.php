@extends('layouts.app')
@section('content')
    <div class="content">
        <div class="container">
            <div class="search-content">
                Kết quả tìm kiếm cho <span style="color: red">{{ $search_content }}</span> 
            </div>
            <table class="table table-bordered table-striped datatable" id="table_export">
                <tr>
                    <th>Mssv</th>
                    <th>Họ tên</th>
                    <th>Số điện thoại</th>
                    <th>Khóa</th>
                    <th>Email</th>
                    <th>Phòng</th>
                    <th>Thông tin</th>
                </tr>
                @foreach($sv_info as $l)
                    <tr>
                        <td>{{$l->mssv}}</td>
                        <td>{{$l->name}}</td>
                        <td>{{$l->sdt}}</td>
                        <td>{{$l->khoa}}</td>
                        <td>{{$l->email}}</td>
                        <td>                
                            @foreach($room_registrations as $room_registration)
                                    @if($room_registration->mssv == $l->mssv)
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
                        <td><a href="{{ route('admin.users.show', $l->id) }}" class="btn btn-primary"><i class="material-icons">preview</i></a></td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
    
@endsection