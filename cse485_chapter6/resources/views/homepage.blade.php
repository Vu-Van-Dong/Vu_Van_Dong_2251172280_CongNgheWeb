{{-- Kế thừa từ file layouts/app.blade.php --}}
@extends('layouts.app')

{{-- Định nghĩa nội dung cho vùng 'content' --}}
@section('content')

    {{-- Hiển thị biến được truyền từ Controller --}}
    <h2>{{ $page_title }}</h2>
    <p><i>{{ $page_description }}</i></p>

    <hr>

    <h3>Danh sách công việc (Lấy từ Controller):</h3>
    <ul>
        {{-- Vòng lặp foreach trong Blade --}}
        @foreach($tasks as $task)
            <li>{{ $task }}</li>
        @endforeach
    </ul>

@endsection