@extends('layouts.app')

@section('content')
    <div class="content">
        <div class="container">
            <h3 style="">
                <a href="{{ route('dashboard') }}"><i class="fa fa-arrow-circle-o-left"></i></a>
                Thông tin cán bộ quản lý
            </h3>
                <div class="lsdk">
                    <table class="table table-bordered table-striped datatable" id="table_export">
                        <thead>
                        <tr>
                            <th>Ảnh</th>
                            <th>Họ tên</th>
                            <th>Email</th>
                        </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <img src="{{ URL::to('/') }}/uploads/mng.png" alt="" style="width: 70px;">
                                </td>
                                <td>Phạm Huy Hoàng</td>
                                <td>ph242001@gmail.com</td>
                            </tr>
                            <tr>
                                <td>
                                    <img src="{{ URL::to('/') }}/uploads/mng.png" alt="" style="width: 70px;">
                                </td>
                                <td>Lê Huy Hùng</td>
                                <td>hunglh28112001@gmail.com</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
        </div>
    </div>
    
@endsection