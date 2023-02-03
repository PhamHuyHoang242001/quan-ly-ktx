@extends('layouts.app')
@section('content')
    <div class="content">
        @if(Auth::user()->hasRole('admin'))
        <div class="container">
            <div class="list_phong">
                <h3 style="">
                    <a href="{{ route('dashboard') }}"><i class="fa fa-arrow-circle-o-left"></i></a>
                        Danh sách phòng
                </h3>
                <a href="{{route('admin.rooms.create')}}"><button type="button" class="btn btn-primary">Thêm phòng</button></a>
                <table class="table table-bordered table-striped datatable" id="table_export">
                    <tr>
                        <th>Số phòng</th>
                        <th>Khu</th>
                        <th>Số người hiện tại</th>
                        <th>Số người tối đa</th>
                        <th>Giới tính</th>
                        <th style="text-align: center">Sinh viên</th>
                        <th>Tình trạng</th>
                    </tr>
                    @foreach($ttphong as $p)
                    <tr>
                        <td>{{$p->room_number}}</td>
                        <td>
                            @if($p->area_id === 1) B1
                            @elseif ($p->area_id === 2) B2
                            @elseif ($p->area_id === 3) B3
                            @endif
                        </td>
                        <td>{{$p->current_numbers}}</td>
                        <td>{{$p->max_numbers}}</td>
                        <td>@if($p->gender=="nam")
                                {{"Nam"}}
                            @else {{"Nữ"}}
                            @endif
                        </td>
                        <td>
                            <a href="{{route('manager_ttphong',$p->id)}}"><button type="button" class="btn btn-primary">Xem thông tin</button></a>
                            <a href="{{route('admin.rooms.edit',$p->id)}}"><button type="button" class="btn btn-primary">Sửa</button></a>
                        </td>
                        <td>
                            @if($p->current_numbers === $p->max_numbers)
                                <p>Phòng đầy</p>
                            @else 
                                <p>Còn trống {{$p->max_numbers - $p->current_numbers}} chỗ</p>
                            @endif
                        </td>
                    </tr>
                    @endforeach
                </table>
            </div>
            <div class="row">
                <div class="col-xs-6 col-left"></div>
                <div class="col-xs-6 col-right">
                    <div class="dataTables_paginate paging_bootstrap">
                        {!! $ttphong->links() !!}
                    </div>
                </div>
            </div>
        </div>
        @endif
    </div>
    
@endsection
