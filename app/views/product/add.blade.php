@extends('layout.main')
@section('content')
    @if(isset($_SESSION['error']) && isset($_GET['msg']))
        <ul>
            @foreach($_SESSION['error'] as $er)
                <li style="color: red">{{$er}}</li>
            @endforeach
        </ul>
    @endif
    @if(isset($_SESSION['success']) && isset($_GET['msg']))
        <span style="color: green">{{ $_SESSION['success'] }}</span>
    @endif
<form action="{{ route('post-add-product') }}" method="post">
    <input type="text" name="ten_sp" placeholder="Tên sản phẩm">
    <input type="text" name="gia" placeholder="Giá sản phẩm">
    <input type="submit" value="Thêm">
</form>
@endsection