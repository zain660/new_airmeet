@extends('layouts.app')
@section('content')
    <div class="page-body">
        <div class="container-fluid">
            <div class="page-header">
                <div class="row">
                    <div class="col-sm-10 mt-3">
                        <h3>Team (1 member)</h3>
                        <p class="mt-2">A team can consist of Community manager and multiple Event managers.
                            Together they form the organizing team. The Community manager is the creator of the account and
                            can add additional team members.</p>
                        <p class="mt-2">Only members of the team can create events and be part of sessions as hosts
                            and co-hosts.</p>
                    </div>
                    <div class="col-sm-2">
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal"
                            data-bs-whatever="@getbootstrap">+ Invite team member</button>
                        <p class="text-center" style="padding-right: 35px; font-size:15px;">@if (Auth::user()->invitation_team != 0) {{Auth::user()->invitation_team}} @else 0 @endif invites left</p>
                    </div>
                </div>
            </div>
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-lg modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Invite team member</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form method="post" action="{{route('user.send_invitation')}}">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="recipient-name" class="col-form-label">First Name</label>
                                            <input type="text" name="f_name" class="form-control" id="recipient-name"
                                                placeholder="Enter First Name">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="recipient-name" class="col-form-label">Last Name</label>
                                            <input type="text" name="l_name" class="form-control" id="recipient-name"
                                                placeholder="Enter Last Name">
                                        </div>
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label for="email" class="col-form-label">Team member email*</label>
                                    <input type="email" class="form-control" name="team_member_email" id="email"
                                        placeholder="Enter the email address to invite your team member">
                                </div>
                           
                        </div>
                        <div class="modal-footer ">
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary">Send Invitation</button>
                            </div>
                        </div>
                    </form>
                    </div>
                </div>
            </div>


            <div class="container-fluid">
                <div class="row learning-block">
                    <div class="col-xl-8 col-sm-6">
                        @if($invited_team->count() > 0)
                        @foreach($invited_team as $invited_teams)
                        <div class="card" style="border-radius:40px;">
                            <div class="blog-box blog-list row">
                                <div class="col-xl-3 col-12">
                                    @if (Auth::user()->is_social_avatar == 1)
                                    <img class="img-fluid" src="{{ Auth::user()->avatar }}" alt="">
                                    @else
                                        <img class="img-fluid"src="{{ asset('/assets/images/user') }}/{{ Auth::user()->avatar }}" alt="">
                                    @endif
                                </div>
                                <div class="col-xl-8 col-12">
                                    <div class="blog-details">
                                        <span class="badge rounded-pill badge-secondary mb-2">Community Manager</span>
                                        <a href="#">
                                            <h6>{{Auth::user()->name}}</h6>
                                        </a>
                                        <div class="blog-bottom-content">
                                            <ul class="blog-social">
                                                <li>{{$invited_teams->team_member_email}}</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        @endif
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
