@extends('layouts.admin_layout')
@section('content')

    <div class="content-page">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-body">
                            @include('admin.packages.form')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection