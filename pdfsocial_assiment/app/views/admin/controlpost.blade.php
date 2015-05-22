@extends('admin.index')

@section('content')
    <div class = "col-sm-9">

        <h4 class = "text-primary">Quản lý bài viết</h4>
        <table class = "table table-hover">
            <thead>
            <tr>
                <th class="center">#</th>
                <th>Tiêu đề</th>
                <th>Người đăng</th>
                <th>Mô tả</th>
                <th>Url file</th>
                <th>Chuyên mục</th>
                <th class="center">Xóa</th>
                <th class="center">Sửa</th>
            </tr>
            </thead>
            <tbody>
            @foreach($allRows as $row)
                <tr>
                    <td></td>
                    <td>{{ $row->title }}</td>
                    <td>{{ $row->email }}</td>
                    <td>{{ $row->content }}</td>
                    <td>{{ $row->link_file }}</td>
                    <td>{{ $row->cat_title }}</td>
                    <td class="center pointer" onclick="removePost({{ $admin.','.$row->post_id }})">
                        <span class="fa fa-times"></span>
                    </td>
                    <td class="center pointer">
                        <span class="fa fa-cogs"></span>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>

    </div>


@stop