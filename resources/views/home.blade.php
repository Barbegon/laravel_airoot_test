@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Catalog</div>

                    <div class="card-body">
                        <form action="{{ url('/catalog') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div>
                                <input type="text" class="form-control" name="title" placeholder="ชื่อ">
                            </div>
                            <div style="margin-top: 10px">
                                <div class="row">
                                    @foreach ($view as $img)
                                        <div class="col-lg-4 mb-3 d-flex align-items-stretch">
                                            <div class="card">
                                                <img src="{{ asset('storage/images/' . $img->name) }}" class="card-img-top"
                                                    alt="Card Image">
                                                <input type="checkbox" name="images[]" value="{{ $img->name }}">
                                            </div>
                                        </div>
                                    @endforeach
                                </div>

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
                        <div class="row">
                            @foreach ($photo as $photos)
                                <div class="col-lg-4 mb-3 d-flex align-items-stretch">
                                    <div class="card">
                                        <img src="{{ asset('storage/images/' . $photos->images) }}" class="card-img-top"
                                            alt="Card Image">
                                        <div class="card-body d-flex flex-column">
                                            <h5 class="card-title">{{ $photos->title }}</h5>
                                            <a href="{{ url('/editcat/' . $photos->id) }}" class="btn btn-warning">แก้ไข</a>
                                            <a href="{{ url('/deletecat/' . $photos->id) }}" class="btn btn-danger">ลบ</a>
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
