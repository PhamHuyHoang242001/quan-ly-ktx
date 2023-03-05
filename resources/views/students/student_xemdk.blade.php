@extends('layouts.app')
@section('content')
    <div class="content">
        <div class="container">
            <h3 style="">
                <a href="{{ route('dashboard') }}"><i class="fa fa-arrow-circle-o-left"></i></a>
                Trạng thái đăng ký
            </h3>
            @if(count($lsdk)!=0)
                <div class="lsdk">
                    <table class="table table-bordered table-striped datatable" id="table_export">
                        <thead>
                        <tr>
                            <th>Phòng đã đăng ký</th>
                            <th>Trạng thái đăng ký</th>
                            <th>Ngày đăng ký</th>
                            <th>Ngày duyệt</th>
                            <th>Lệ phí ở</th>
                            <th>Hủy đăng ký</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($lsdk as $l)
                            <tr>
                                <td>
                                    @foreach($ttphong as $t)
                                        @if($t->id == $l->room_id)
                                            @foreach($ttkhu as $k)
                                                @if($k->id == $t->area_id)
                                                    {{$k->area_name."-".$t->room_number}}
                                                @endif
                                            @endforeach
                                        @endif
                                    @endforeach
                                </td>
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
                                <td>{{$l->created_at}}</td>
                                <td>{{$l->updated_at}}</td>
                                <td>{{$l->cost}}</td>
                                <td>@if($l->status=="Đang chờ")
                                    <a href="{{ route('get_student_huydk', $l->mssv) }}"><button class="btn btn-primary">Hủy</button></a>
                                @else 
                                    <a>Không thể hủy đăng ký</a>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                </div>
            @else
                <div>
                    <h4 class="thongbaoNull">Lịch sử đăng ký trống</h4>
                </div>
            @endif
        </div>
    </div>
    
@endsection
