@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Upload</div>

                    <div class="card-body">
                        <form action="{{ url('/update/' . $edit->id) }}" method="post" enctype="multipart/form-data">
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
@endsection
