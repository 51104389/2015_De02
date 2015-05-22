@extends('admin.index')

@section('content')
    <div class = "col-sm-9">

        <h4 class = "text-primary">Quản lý người dùng</h4>
        <table class = "table table-hover">
            <thead>
            <tr>
                <th class="center">#</th>
                <th>Tên</th>
                <th>Email</th>
                <th>Số điện thoại</th>
                <th>Địa chỉ</th>
                <th class="center">Quyền</th>
                <th class="center">Xóa</th>
                <th class="center">Sửa</th>
            </tr>
            </thead>
            <tbody>
            @foreach($allUsers as $user)
                <tr>
                    <td>
                        {{ $user->id  }}
                    </td>
                    <td>
                        {{ $user->name  }}
                    </td>
                    <td>
                        {{ $user->email  }}
                    </td>
                    <td>
                        {{ $user->phone  }}
                    </td>
                    <td>
                        {{ $user->address  }}
                    </td>
                    <td class="center">
                        @if($user->role == 1)
                            Admin
                        @else
                            User
                        @endif
                    </td>
                    <td class="center pointer">
                        <span class="fa fa-times" onclick="removeUser( {{ $admin->id.",".$user->id  }}  )"></span>
                    </td>
                    <td class="center pointer">
                        <span class="fa fa-cogs"></span>
                    </td>
            @endforeach
            </tbody>
        </table>

    </div>


@stop