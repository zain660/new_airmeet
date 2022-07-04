@extends('layouts.app')
@section('content')
    <!-- Page Sidebar Ends-->
    <div class="page-body">
        <div class="container-fluid">
            <div class="page-header">
                <div class="row">
                    <div class="col-sm-10 mt-3">
                        <h3>Inquiry Details</h3>
                    </div>
                </div>
            </div>
            <!-- Container-fluid starts-->
            <div class="container-fluid search-page">
                <div class="row">
                    <div class="col-sm-12">
                        Status:
                        @if ($my_inquiry->status == 0)
                            <div class="badge badge-warning">Pending</div>
                        @elseif($item->status == 1)
                            <div class="badge badge-primary">Active</div>
                        @elseif($item->status == 2)
                            <div class="badge badge-success">Solved</div>
                        @elseif($item->status == 3)
                            <div class="badge badge-danger">Declined</div>
                        @endif
                        <br>
                        @foreach ($my_inquiry_details as $item)
                            <div class="card border px-4 py-2">
                                <p class="pb-3 border-bottom">From : @if ($item->sender_id == Auth::user()->id)
                                        Me
                                    @else
                                        Admin <i class="fa fa-check-circle" aria-hidden="true"
                                            style="color: cornflowerblue"></i>
                                    @endif
                                </p>
                                @if($item->has_file != 0)
                                <img src="{{asset('/inquiry_files')}}/{{$item->file}}" alt="">
                                @endif
                                <p class="text py-4"><strong>{{ $item->message }}</strong></p>
                            </div>
                        @endforeach

                        <form action="/admin/send_inquiry/{{ $id }}/{{ $item->sender_id }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="d-flex mt-5">
                                <textarea name="message" id="" rows="3" class="w-100" placeholder="Write a Message"></textarea>
                            </div>
                            <div class="d-flex mt-5">
                                <input type="file" name="files" id="" class="w-100">
                            </div>
                            <button type="submit" class="btn btn-primary mt-3">
                                Send
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- Container-fluid Ends-->
    </div>
@endsection
