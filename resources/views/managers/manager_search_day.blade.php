@extends('layouts.app')
@section('content')
    <div class="content">
        <div class="container">
            <div class="search-content">
                Kết quả tìm kiếm từ {{date('d/m/Y', strtotime($start))}} đến {{date('d/m/Y', strtotime($end))}} 
            </div>
            @if(count($list)==0)
                <h4>Không có kết quả</h4>
            @else
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
                        <td>{{$l->status}}</td>
                        <td>{{$l->created_at}}</td>
                        <td><a href="{{ route('get_manager_ttsv', $l->mssv) }}"><button type="button" class="btn btn-primary">Xem</button></a></td>
                        <td><a href="{{ route('manager_delete_sv', $l->mssv) }}"><button type="button" class="btn btn-primary">Xóa</button></a></td>
                    </tr>
                @endforeach
            </table>
            @endif
            <a href="{{ url()->previous() }}"><button type="button" class="btn btn-primary">Quay lại</button></a>
        </div>
    </div>
    
@endsection