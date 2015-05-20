@extends('admin.index')

@section('content')
    <div class = "col-sm-6">

        <h4 class = "text-primary">Quản lý chuyên mục</h4>
        <table class = "table table-hover">


            <thead>
            <tr>
                <th class="center">#</th>
                <th>Tên</th>
                <th class="center">Xóa</th>
                <th class="center">Sửa</th>
            </tr>
            </thead>


            <tbody>
                @foreach($allCats as $cat)
                    <tr>
                        <td>
                        </td>
                        <td>
                            {{ $cat->title  }}
                        </td>
                        <td class="center pointer" onclick='test( {{ $user->id.",".$cat->id  }} )'>
                            <span class="fa fa-times" ></span>
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