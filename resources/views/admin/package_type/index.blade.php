@extends('layouts.admin_layout')
@section('content')

    <div class="content-page">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-body">
                            <a href="{{ route('add_package_type', ['req_type' => 'create']) }}" class="btn btn-primary"><i
                                class="fa fa-plus"></i> Create Package Type</a><hr>
                            <table id="datatable" class="table data-table table-striped table-bordered py-4">
                                <thead>
                                   <tr>
                                      <th>No.</th>
                                      <th>Name</th>
                                      <th>Description</th>
                                      <th>CreatedAt</th>
                                      <th>Action</th>
                                      
                                   </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $count = 1;
                                    @endphp
                                   @foreach ($package_type as $item)
                                   <tr>
                                    <td>{{$count ++}}</td>
                                    <td>{{$item->package_type}}</td>
                                    <td>{{$item->short_desc}}</td>
                                    <td>{{$item->created_at->diffForHumans()}} </td>
                                    <td><a href="/admin/packages/edit-package-type/{{$item->id}}?req_type=edit" class="btn btn-info"><i class="fa fa-pencil"></i> Edit</a> |
                                    <a href="/admin/packages/remove_package_type/{{$item->id}}" class="btn btn-danger">Remove</a>
                                    
                                    </td>
                                 </tr> 
                                   @endforeach
                             </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection