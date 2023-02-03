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
                    <th>Giới tính</th>
                    <th>Email</th>
                    <th>Quê quán</th>
                </tr>
                @foreach($sv_info as $l)
                    <tr>
                        <td>{{$l->mssv}}</td>
                        <td>{{$l->name}}</td>
                        <td>{{$l->sdt}}</td>
                        <td>{{$l->gender}}</td>
                        <td>{{$l->email}}</td>
                        <td>{{$l->quequan}}</td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
    
@endsection