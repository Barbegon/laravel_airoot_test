@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Catalog</div>

                    <div class="card-body">
                        <form action="{{ url('/updatecat/' . $editcat->id) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div>
                                <input type="text" class="form-control" name="title" value="{{ $editcat->title }}">
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
@endsection
