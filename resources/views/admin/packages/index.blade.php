@extends('layouts.admin_layout')
@section('content')

    <div class="content-page">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-body">
                            <a href="{{ route('create_package', ['req_type' => 'create']) }}" class="btn btn-primary"><i
                                    class="fa fa-plus"></i> Create Packages</a>



                                <div class="container">
                                    @if ($all_package_type->count() > 0)
                                    <div class="row py-4">
                                        @foreach ($all_package_type as $all_package_types)
                                            <a href="{{route('packages',$all_package_types->id)}}">
                                                <div class="container col-6 py-4 shadow p-3 mb-5 bg-white rounded">
                                                    <p class="ml-2">{{$all_package_types->package_type}}</p>
                                                </div>
                                            </a>
                                        @endforeach
    
                                    </ul>
                                @endif
                                </div>
           

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
