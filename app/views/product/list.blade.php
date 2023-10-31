@extends('layout.main')
@section('content')
    <h1>{{$header}}</h1>
    <button><a href="{{route('add-product')}}">Thêm</a></button>
    <table>
        <tr>
            <td>Stt</td>
            <td>Tên sản phẩm</td>
            <td>Giá sản phẩm</td>
            <td>Hành động</td>
        </tr>
        @foreach($products as $i => $pr)
            <tr>
                <td>{{ $pr->id }}</td>
                <td>{{ $pr->ten_sp }}</td>
                <td>{{ $pr->gia }}</td>
                <td>
                    <a href="{{ route('update-product/'.$pr->id) }}">Sửa</a>
                    <a href="{{ route('delete-product/'.$pr->id) }}">Xóa</a>
                </td>
            </tr>
        @endforeach
    </table>
@endsection