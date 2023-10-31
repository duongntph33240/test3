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
    @foreach($product as $pr)
    <form action="{{ route('post-update-product/'.$pr->id) }}" method="post">
        <input type="text" name="ten_sp" placeholder="Tên sản phẩm" value="{{$pr->ten_sp}}">
        <input type="text" name="gia" placeholder="Giá sản phẩm" value="{{$pr->gia}}">
        <input type="hidden" name="id" value="{{$pr->id}}">
        <input type="submit" value="Thêm">
    </form>
    @endforeach
@endsection