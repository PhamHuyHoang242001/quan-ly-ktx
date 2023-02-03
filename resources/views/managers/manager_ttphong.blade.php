@extends('layouts.app')
@section('content')
    <div class="content">
        @if(Auth::user()->hasRole('admin'))
        <div class="container">
            <h3 style="">
                <a href="{{ route('manager_qlphong') }}"><i class="fa fa-arrow-circle-o-left"></i></a>
                    Danh sách sinh viên
            </h3>
            @if(count($list)==0)
                <h4>Phòng chưa có sinh viên đăng ký</h4>
            @else
            <form action=" {{ route('manager_search_day')}}" method="get" >
                @csrf
                <input type="date" name="start"/>
                <input type="date" name="end"/>
                <input type="hidden" name="room_id" value="{{ $room_id[0]->room_id }}">
                <button type="submit" class="btn btn-primary" value="search" >Tìm kiếm</button>
            </form>
            <table class="table table-bordered table-striped datatable" id="table_export">
                <tr>
                    <th>Mssv</th>
                    <th>Họ tên</th>
                    <th>Trạng thái đăng ký</th>
                    <th>Thời gian</th>
                    <th>Xem thông tin</th>
                    <th>Xóa sinh viên</th>
                </tr>
                @foreach($list as $l)
                <tr>
                    <td>{{$l->mssv}}</td>
                    <td>{{$l->name}}</td>
                    <td>
                            <span @if($l->status=="Đang chờ")
                                        class="label label-warning"
                                    @elseif($l->status=="Thành công")
                                        class="label label-success"
                                    @elseif($l->status=="Hủy")
                                        class="label label-danger"
                                    @else class="label label-success"
                                    @endif
                                    style="font-size: 15px;">{{$l->status}}</span>
                    </td>
                    <th>{{$l->created_at}}</th>
                    <td><a href="{{ route('get_manager_ttsv', $l->mssv) }}"><button type="button" class="btn btn-primary">Xem</button></a></td>
                    <td><a href="{{ route('manager_delete_sv', $l->mssv) }}"><button type="button" class="btn btn-primary">Xóa</button></a></td>
                </tr>
                @endforeach
            </table>
            @endif
        </div>
        @endif
    </div>
    
@endsection
