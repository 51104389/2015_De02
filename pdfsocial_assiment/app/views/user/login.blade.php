@extends("hello")
@section('content')
    {{trans('pagination.hello')}}
    <form action="/user/login" method="post">
        <input type="text" name="username">
        <input type="password" name="password">
        <input type="submit">
    </form>
@stop