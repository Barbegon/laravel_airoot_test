@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Upload</div>

                    <div class="card-body">
                        <form action="{{ url('/store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div>
                                <input type="file" name="photo" required>
                            </div>
                            <div style="margin-top: 10px">
                                <input type="submit" class="btn btn-primary" value="ตกลง">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container" style="margin-top: 25px">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Dlsplay</div>

                    <div class="card-body">
                        <div style="margin-bottom: 25px">
                            <h3>ขนาดรูปรวมทั้งหมด {{ $sum }}</h3>
                        </div>
                        <div class="row">
                            @foreach ($view as $display)
                                <div class="col-lg-4 mb-3 d-flex align-items-stretch">
                                    <div class="card">
                                        <img src="{{ asset('storage/images/' . $display->name) }}" class="card-img-top"
                                            alt="Card Image">
                                        <div class="card-body d-flex flex-column">
                                            <h5 class="card-title">{{ $display->type }} {{ $display->size }}</h5>
                                            <p class="card-text mb-4">{{ $display->created_at }}</p>
                                            <a href="{{ url('/edit/' . $display->id) }}" class="btn btn-warning">แก้ไข</a>
                                            <a href="{{ url('/delete/' . $display->id) }}" class="btn btn-danger">ลบ</a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
