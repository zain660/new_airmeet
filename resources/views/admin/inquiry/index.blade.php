@extends('layouts.admin_layout')
@section('content') <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <div class="content-page">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-4 chat-left-wrapper">
                    <div class="chat-list">
                        <div class="card">
                            <div class="card-header">
                                <div class="d-flex justify-content-between align-items-center mb-2">
                                    <h4 class="card-title">Inquiry</h4>
                                    <button class="btn text-primary bg-primary-light btn-sm d-block d-lg-none"
                                        data-toggel-extra="side-nav-close" data-expand-extra=".chat-left-wrapper">
                                        <i class="las la-arrow-left"></i>
                                    </button>
                                </div>
                                <div class="form-group mb-0">
                                    <div class="input-group input-group-sm">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon1">
                                                <svg class="svg-icon text-primary" id="search" width="16" height="16"
                                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                    stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                                                </svg>
                                            </span>
                                        </div>
                                        <input type="text" class="form-control form-control-sm" placeholder="Enter name"
                                            aria-label="Username" aria-describedby="basic-addon1">

                                    </div>
                                </div>
                            </div>
                            <nav>
                                <ul class="nav nav-tabs justify-content-around" id="nav-tab" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home"
                                            role="tab" aria-controls="nav-home" aria-selected="true">All Inquiries</a>
                                    </li>

                                </ul>
                            </nav>
                            <div class="card-body item-list">
                                <ul id="chat-list" role="custom-tab">
                                    @if ($all_inquiry->count() > 0)
                                        @foreach ($all_inquiry as $item)
                                            <a href="{{ route('all_inquiry', ['chat_with' => $item->id]) }}"
                                                target="_blank" rel="noopener noreferrer">
                                                <li class="simple-item hover" data-toggle-extra="tab"
                                                    data-target-extra="#user-content-1">
                                                    <div class="img-container">
                                                        <div class="avatar avatar-60">
                                                            @if ($item->user->is_social_avatar == 1)
                                                                <img src="{{ $item->user->avatar }}" alt="users"
                                                                    class="img-fluid avatar-borderd avatar-rounded">
                                                            @else
                                                                <img src="{{ asset('user_avatar') }}/{{ $item->user->avatar }}"
                                                                    alt="users"
                                                                    class="img-fluid avatar-borderd avatar-rounded">
                                                            @endif
                                                            <span class="avatar-status">
                                                                <i class="ri-checkbox-blank-circle-fill text-success"></i>
                                                            </span>
                                                        </div>
                                                    </div>
                                                    <div class="simple-item-body">
                                                        <div class="simple-item-title">
                                                            <h5 class="title-text">{{ $item->user->name }}</h5>
                                                            <div class="simple-item-time">
                                                                <span>{{ $item->created_at->diffForHumans() }}</span> </div>
                                                        </div>
                                                        <div class="simple-item-content">
                                                            <span class="simple-item-text short">
                                                                I have share some media you can enjoy.
                                                            </span>
                                                            <div class="dropdown">
                                                                <button class="btn btn-link " type="button"
                                                                    id="chat-dropdown-1" data-toggle="dropdown"
                                                                    aria-haspopup="true" aria-expanded="false">
                                                                    <i class="las la-caret-down"></i>
                                                                </button>
                                                                <div class="dropdown-menu"
                                                                    aria-labelledby="chat-dropdown-1">
                                                                    <a class="dropdown-item" href="#">Move Archive</a>
                                                                    <a class="dropdown-item" href="#">Favourite</a>
                                                                    <a class="dropdown-item" href="#">Delete</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                            </a>
                                        @endforeach
                                    @else
                                        No inquiry found.
                                    @endif
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8 chat-right-wrapper">
                    <div class="chat-content animate__animated animate__fadeIn active" data-toggle-extra="tab-content"
                        id="user-content-1">
                        <div class="card">
                            @if ($request->has('chat_with'))
                                <div class="card-header chat-content-header">
                                    <div class="d-flex align-items-center">
                                        <button class="btn text-primary bg-primary-light btn-sm d-block d-lg-none mr-2"
                                            data-toggel-extra="side-nav" data-expand-extra=".chat-left-wrapper">
                                            <i class="las la-arrow-right"></i>
                                        </button>
                                        <div class="avatar-50 avatar-borderd avatar-rounded"
                                            data-toggel-extra="right-sidenav" data-target="#first-sidenav">
                                            @if ($item->user->is_social_avatar == 1)
                                                <img src="{{ $item->user->avatar }}" alt="users"
                                                    class="img-fluid avatar-borderd avatar-rounded">
                                            @else
                                                <img src="{{ asset('user_avatar') }}/{{ $item->user->avatar }}" alt="users"
                                                    class="img-fluid avatar-borderd avatar-rounded">
                                            @endif
                                        </div>
                                        <div class="chat-title">
                                            <h5>{{ $item->user->name }}</h5>
                                            {{-- <small>Online</small> --}}
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body msg-content" id="user-1-chat-content">
                                    <div class="msg-list">
                                        @php
                                            $message= App\Models\InquiryDetail::where('inquiry_id',$item->id)->get();
                                        @endphp
                                        @foreach ($message as $messages)
                                            @if ($messages->sender_id == Auth::user()->id)
                                            <div class="single-msg user">
                                                <div class="triangle-topright single-msg-shap">
                                                </div>
                                                <div class="single-msg-content user">
                                                    <div class="msg-detail"  style="width: 200px;">
                                                        <span>{{$messages->message}}</span>
                                                    </div>
                                                    <div class="msg-action">
                                                        <span>{{$messages->created_at->diffForHumans()}}</span>
    
                                                    </div>
                                                </div>
                                            </div> 
                                            @else
                                            <div class="single-msg">
                                                <div class="triangle-topright single-msg-shap">
                                                </div>
                                                <div class="single-msg-content">
                                                    <div class="msg-detail"  style="width: 200px;">
                                                        <span>{{$messages->message}}</span>
                                                    </div>
                                                    <div class="msg-action">
                                                        <span>{{$messages->created_at->diffForHumans()}}</span>
    
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            @endif
                                        @endforeach

                                    </div>
                                </div>
                                <div class="card-footer px-3 py-3">
                                    <form method="post" action="/admin/send_inquiry/{{$item->id}}/{{$item->user->id}}" enctype="multipart/form-data">
                                        @csrf
                                        <div class="input-group input-group-sm">
                                            <input type="text" class="form-control" id="chat-input"
                                                placeholder="Enter here..." aria-label="Recipient's username"
                                                aria-describedby="basic-addon2" name="message">
                                            <div class="input-group-append">
                                                <button type="button" class="input-group-text chat-icon" id="basic-addon1"
                                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <svg class="hw-20 mr-2 file_choosen_trigger" fill="none" viewBox="0 0 24 24" stroke="currentColor" style="width: 23px;">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                                     </svg>
                                                </button>
                                                <input type="file" class="hide_file" name="files" onchange="readURL(this);" id="image" style="display: none;">
                                            </div>
                                            <div class="input-group-append">
                                                <button class="input-group-text chat-icon" type="submit">
                                                        <i class="lab la-telegram-plane"></i>
                                                </button>
                                            </div>
                                            <div class="container shadow p-3 mb-5 bg-white rounded"id="image_display">
                                                <button type="reset" onclick="myFunction()" class="close" >
                                                 <span aria-hidden="true">&times;</span>
                                               </button>
                                               <img class="injectable hw-20 img-thumbnail" id="blah" src="#">
                   
                                           </div>
                                        </div>
                                    </form>
                                </div>
                            @else
                                <div class="card-body">
                                    Select Inquiry To Start Replaying On that.
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        $('.file_choosen_trigger').bind("click", function() {
            $('#image').click();
        });
    </script>
    <script type="text/javascript">
        var x = document.getElementById("image_display");
        x.style.display = "none";

        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    $('#blah')
                        .attr('src', e.target.result)
                        .width(200)
                        .height(100);
                };
                var name = document.getElementById('image');
                x.style.display = "block";
                $('#files').val(name.files.item(0).name);
                reader.readAsDataURL(input.files[0]);
            }
        }
        function myFunction() {
            var xdiv = document.getElementById("image_display");
            xdiv.style.display = "none";
        }
    </script>
