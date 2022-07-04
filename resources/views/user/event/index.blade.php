@extends('layouts.app')
@section('content')

<style>
 
  .data-table img {
    border-radius: 25px;

    height: 150px;
  }

  .data-tabled h5 {
    font-size: 20px;
    font-weight: 700;
    padding: 20px 0 0 10px;
  }

  .data-tabled span {
    font-size: 14px;
    padding: 30px 0 0 10px;
    margin-top: 100px;
  }

  .data-tabled p {
    font-size: 14px;
    padding: 0 0 0 10px;
  }

  .box {
    margin-top: 25%;
    font-weight: 600;
  }

  .box1 button {
    font-weight: 600;
    margin-top: 32%;
    background: none;
    color: #000;
    border: none;
  }

  .card {
    border-radius: 25px;
  }

  .table-responsive {
    border-radius: 25px;
  }
</style>
<!-- Page Sidebar Ends-->
<div class="page-body">
  <div class="container-fluid">
    <div class="page-header">
      <div class="row">
        <div class="col-sm-10 mt-3">
          <h3>My Events</h3>
        </div>
        <div class="col-sm-2 mt-3">
          <!-- Button trigger modal -->
          <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
            Create Events
          </button>
          <!-- Modal -->
          <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-xl">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="staticBackdropLabel">Create Event</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <div class="col-md-6">
                    <div class="create-event">
                      <span>Choose an event format to use for your event</span>
                      <p>Create and host workshops, webinars, meet ups, expos, or large summits. Experience demo events, get inspired from existing events, and run your own event from here.</p>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-5">
                      <div class="btn" data-bs-target="#exampleModalToggle2" data-bs-toggle="modal" data-bs-dismiss="modal">
                        <div class="basicComponents__FlexDiv-sc-1i9v37i-1 sc-pdbHO ZSQXf">
                          <div class="sc-ptTkw dwanuC">Included with Social Webinar plans</div>
                          <div class="basicComponents__FlexDiv-sc-1i9v37i-1 iFVVrb">
                            <div class="basicComponents__FlexDiv-sc-1i9v37i-1 sc-qWeMO fjEuKG">
                              <img src="https://d2xqcdy5rl17k2.cloudfront.net/images/dashboard/event_type_meetup.png" onclick="meetup()" class="sc-plWxd bRWbKp">
                            </div>
                            <div class="basicComponents__Box-sc-1i9v37i-0 izlgwB">
                              <div class="basicComponents__FlexDiv-sc-1i9v37i-1 iPtqwu">
                                <p color="ambience.1" font-size="3" class="sc-Axmtr dgFXpo" style="opacity: 1;">Meetup</p>
                              </div>
                              <p color="ambience.1" font-size="1" class="sc-Axmtr hRodaN" style="opacity: 1;">Great for webinars, workshops, networking, and single-track events.</p>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="btn" data-bs-target="#exampleModalToggle2" data-bs-toggle="modal" data-bs-dismiss="modal">
                        <div class="basicComponents__FlexDiv-sc-1i9v37i-1 sc-pdbHO ZSQXf">
                          <div class="sc-ptTkw dwanuC">Included with Conference plans</div>
                          <div class="basicComponents__FlexDiv-sc-1i9v37i-1 iFVVrb">
                            <div class="basicComponents__FlexDiv-sc-1i9v37i-1 sc-qWeMO fjEuKG">
                              <img src="https://d2xqcdy5rl17k2.cloudfront.net/images/dashboard/event_type_meetup.png" onclick="new_conference()" class="sc-plWxd bRWbKp">
                            </div>
                            <div class="basicComponents__Box-sc-1i9v37i-0 izlgwB">
                              <div class="basicComponents__FlexDiv-sc-1i9v37i-1 iPtqwu">
                                <p color="ambience.1" font-size="3" class="sc-Axmtr dgFXpo" style="opacity: 1;">Conference</p>
                              </div>
                              <p color="ambience.1" font-size="1" class="sc-Axmtr hRodaN" style="opacity: 1;">Ideal for large events like summits, fairs or multi-track events.</p>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="modal right fade" id="exampleModalToggle2" aria-hidden="true" aria-labelledby="exampleModalToggleLabel2" tabindex="-1">
            <div class="modal-dialog modal-dialog-centered modal-xl">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalToggleLabel3"></h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <div class="row">
                    <div class="col-md-12">
                      <form method="post" action="{{route('user.create_event')}}" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="event_type" id="event_type" value="">
                        <div class="mb-3">
                          <label for="exampleInputname3" class="form-label">Event Thumbnail</label>
                          <input type="file" name="img_thumbnail" required class="form-control" id="exampleInputname1" aria-describedby="emailHelp" placeholder="Name">
                        </div>
                        <div class="mb-3">
                          <label for="exampleInputname3" class="form-label">Event name</label>
                          <input type="text" name="event_title" required class="form-control" id="exampleInputname1" aria-describedby="emailHelp" placeholder="Name">
                        </div>
                        <div class="form-group row">
                          <div class="col-xl-6 col-sm-9">
                            <label for="exampleInputname1" class="form-label">Start date</label>
                            <input class="datepicker-here form-control digits" required name="event_start_date" type="text" data-language="en">
                          </div>
                          <div class="col-xl-6 col-sm-9">

                            <div class="clockpicker">
                              <label for="exampleInputname1" class="form-label">Start time</label>
                              <input class="form-control" required type="time"name="event_start_time" value="09:30"><span class="input-group-addon"><span class="glyphicon glyphicon-time"></span></span>
                            </div>

                          </div>
                        </div>
                        <div class="form-group row">
                          <div class="col-xl-6 col-sm-9">
                            <label for="exampleInputname1" class="form-label">End date</label>
                            <input class="datepicker-here form-control digits" required name="event_end_date" type="text" data-language="en">
                          </div>
                          <div class="col-xl-6 col-sm-9">
                            <div class="clockpicker">
                              <label for="exampleInputname1" class="form-label">End time</label>
                              <input class="form-control" required type="time" name="event_end_time" value="09:30"><span class="input-group-addon"><span class="glyphicon glyphicon-time"></span></span>
                            </div>
                          </div>
                        </div>
                        <div class="mb-3">
                          <label for="exampleInputname3" class="form-label">Time Zone</label>
                          <select name="time_zone_id" required id="" class="form-control">
                            @foreach($timezone as $timezones)
                             <option value="{{$timezones->id}}">{{$timezones->utc}}</option>
                            @endforeach
                          </select>
                        </div>
                        <div class="mb-3">
                          <label for="exampleInputname3" class="form-label">Event Status</label>
                          <select name="" id="" class="form-control">
                            <option value="Upcoming">Upcoming</option>
                            <option value="Ongoing">Ongoing</option>
                            <option value="Paused">Paused</option>
                            <option value="Completed">Completed</option>
                          </select>
                        </div>
                        <button type="submit" class="btn btn-primary mb-3">Create Event</button>
                      </form>
                    </div> 
                  </div>
                  {{-- <div class="modal-footer">
                    <button class="btn btn-primary" data-bs-target="#exampleModalToggle" data-bs-toggle="modal" data-bs-dismiss="modal">Save</button>
                  </div> --}}
                </div>
              </div>
            </div>
          </div>

        </div>
      </div>
    </div>
    <script>
      function meetup(){
        document.getElementById('exampleModalToggleLabel3').innerHTML = "New Meetup";
        document.getElementById('event_type').value = "New Meetup";
      }
      function new_conference(){
        document.getElementById('exampleModalToggleLabel3').innerHTML = "New Confrence";
        document.getElementById('event_type').value = "New Confrence";

      }
    </script>
    <!-- Container-fluid starts-->
    <div class="container-fluid search-page">
      <div class="row">
        <div class="col-sm-12">
          <div class="card">
            <div class="card-header pb-0">
              <form class="search-form">
                <div class="form-group m-0">
                  <label class="sr-only">Email</label>
                </div>
                <div class="form-group mb-0">
                  <div class="input-group"><span class="input-group-text"><i class="icon-search"></i></span>
                    <input class="form-control-plaintext" type="search" placeholder="Search..">
                  </div>
                </div>
              </form>
            </div>
            <div class="card-body">
              <ul class="nav nav-tabs search-list" id="top-tab" role="tablist">
                <li class="nav-item"><a class="nav-link active" id="all-link" data-bs-toggle="tab" href="#all-links" role="tab" aria-selected="true">All</a>
                  <div class="material-border"></div>
                </li>
                <li class="nav-item"><a class="nav-link" id="image-link" data-bs-toggle="tab" href="#image-links" role="tab" aria-selected="false">Upcoming</a>
                  <div class="material-border"></div>
                </li>
                <li class="nav-item"><a class="nav-link" id="video-link" data-bs-toggle="tab" href="#video-links" role="tab" aria-selected="false">Ongoing</a>
                  <div class="material-border"></div>
                </li>
                <li class="nav-item"><a class="nav-link" id="map-link" data-bs-toggle="tab" href="#map-links" role="tab" aria-selected="false">Paused</a>
                  <div class="material-border"></div>
                </li>
                <li class="nav-item"><a class="nav-link" id="setting-link" data-bs-toggle="tab" href="#setting-links" role="tab" aria-selected="false">Completed</a>
                  <div class="material-border"></div>
                </li>
              </ul>
              <div class="tab-content" id="top-tabContent">
                {{-- All Events --}}
                <div class="search-links tab-pane fade show active" id="all-links" role="tabpanel" aria-labelledby="all-link">
                  <div class="row">
                    <div class="col-sm-12">
                      <div class="card">

                        <div class="table-responsive">
                          <table class="table table-xl">
                            <thead>
                              <tr>
                                <th>Event Name</th>
                                <th>Airmeet Status</th>
                                <th>Actions</th>
                              </tr>
                            </thead>
                            <tbody>
                              @if($all_events != null)
                                @foreach ($all_events as $item)
                              <tr>
                                <th>
                                  <div class="row">
                                    <div class="col-md-4">
                                      <div class="data-table">
                                        <img class="img-fluid " src="{{asset('/assets/images/event')}}/{{$item->img_thumbnail}}" alt="">
                                      </div>
                                    </div>
                                    <div class="col-md-8">
                                      <div class="data-tabled">
                                        <h5><a href="basicinfo.php">{{$item->event_title}}</a></h5>
                                        <span>{{$item->event_start_date}} - {{$item->event_end_date}}</span>
                                        <p>{{$item->event_start_time}} - {{$item->event_end_time}}</p>
                                      </div>
                                    </div>
                                  </div>
                                </th>
                                <td>
                                  <div class="box"> {{$item->event_label}}</div>
                                </td>
                                <td>
                                  <div class="box1"> <a href=""><i class="fa fa-eye" style="padding-right: 10px;"></i>Preview</a>
                                  </div>
                                </td>
                              </tr>
                              @endforeach
                              @else 
                              <tr>
                                <td>No event found.</td>
                              </tr>
                              @endif
                            </tbody>
                          </table>
                        </div>
                      </div>
                    </div>

                  </div>
                </div>
                {{-- All events end --}}

                {{-- Upcoming Events start --}}
                @php
                    $upcoming = App\Models\Event::where('event_label','Upcoming')->get();
                @endphp
                <div class="tab-pane fade" id="image-links" role="tabpanel" aria-labelledby="image-link">
                  <div class="search-links tab-pane fade show active" id="all-links" role="tabpanel" aria-labelledby="all-link">
                    <div class="row">
                      <div class="col-sm-12">
                        <div class="card">
  
                          <div class="table-responsive">
                            <table class="table table-xl">
                              <thead>
                                <tr>
                                  <th>Event Name</th>
                                  <th>Airmeet Status</th>
                                  <th>Actions</th>
                                </tr>
                              </thead>
                              <tbody>
                                @if($upcoming != null)
                                  @foreach ($upcoming as $item)
                                <tr>
                                  <th>
                                    <div class="row">
                                      <div class="col-md-4">
                                        <div class="data-table">
                                          <img class="img-fluid " src="{{asset('/assets/images/event')}}/{{$item->img_thumbnail}}" alt="">
                                        </div>
                                      </div>
                                      <div class="col-md-8">
                                        <div class="data-tabled">
                                          <h5><a href="basicinfo.php">{{$item->event_title}}</a></h5>
                                          <span>{{$item->event_start_date}} - {{$item->event_end_date}}</span>
                                          <p>{{$item->event_start_time}} - {{$item->event_end_time}}</p>
                                        </div>
                                      </div>
                                    </div>
                                  </th>
                                  <td>
                                    <div class="box"> {{$item->event_label}}</div>
                                  </td>
                                  <td>
                                    <div class="box1"> <a href=""><i class="fa fa-eye" style="padding-right: 10px;"></i>Preview</a>
                                    </div>
                                  </td>
                                </tr>
                                @endforeach
                                @else 
                                <tr>
                                  <td>No event found.</td>
                                </tr>
                                @endif
                              </tbody>
                            </table>
                          </div>
                        </div>
                      </div>
  
                    </div>
                  </div>
                </div>
                {{-- Upcoming events end --}}
                @php
                    $ongoing = App\Models\Event::where('event_label','Ongoing')->get();
                @endphp
                {{-- Ongoing envents start --}}
                <div class="tab-pane fade" id="video-links" role="tabpanel" aria-labelledby="video-link">
                  <div class="row">
                    <div class="col-sm-12">
                      <div class="card">

                        <div class="table-responsive">
                          <table class="table table-xl">
                            <thead>
                              <tr>
                                <th>Event Name</th>
                                <th>Airmeet Status</th>
                                <th>Actions</th>
                              </tr>
                            </thead>
                            <tbody>
                              @if($ongoing != null)
                                @foreach ($ongoing as $item)
                                <tr>
                                  <th>
                                    <div class="row">
                                      <div class="col-md-4">
                                        <div class="data-table">
                                          <img class="img-fluid " src="{{asset('/assets/images/event')}}/{{$item->img_thumbnail}}" alt="">
                                        </div>
                                      </div>
                                      <div class="col-md-8">
                                        <div class="data-tabled">
                                          <h5><a href="basicinfo.php">{{$item->event_title}}</a></h5>
                                          <span>{{$item->event_start_date}} - {{$item->event_end_date}}</span>
                                          <p>{{$item->event_start_time}} - {{$item->event_end_time}}</p>
                                        </div>
                                      </div>
                                    </div>
                                  </th>
                                  <td>
                                    <div class="box"> {{$item->event_label}}</div>
                                  </td>
                                  <td>
                                    <div class="box1"> <a href=""><i class="fa fa-eye" style="padding-right: 10px;"></i>Preview</a>
                                    </div>
                                  </td>
                                </tr>
                                @endforeach
                                @else 
                                  No event you created.
                              @endif

                            </tbody>
                          </table>
                        </div>
                      </div>
                    </div>

                  </div>
                </div>
                {{-- Ongoing events end --}}

                {{-- Paused events start --}}
                @php
                    $paused = App\Models\Event::where('event_label','Paused')->get();
                @endphp
                <div class="tab-pane fade" id="map-links" role="tabpanel" aria-labelledby="map-link">
                  <div class="row">
                    <div class="col-sm-12">
                      <div class="card">

                        <div class="table-responsive">
                          <table class="table table-xl">
                            <thead>
                              <tr>
                                <th>Event Name</th>
                                <th>Airmeet Status</th>
                                <th>Actions</th>
                              </tr>
                            </thead>
                            <tbody>
                              @if($paused != null)
                                @foreach ($paused as $item)
                                <tr>
                                  <th>
                                    <div class="row">
                                      <div class="col-md-4">
                                        <div class="data-table">
                                          <img class="img-fluid " src="{{asset('/assets/images/event')}}/{{$item->img_thumbnail}}" alt="">
                                        </div>
                                      </div>
                                      <div class="col-md-8">
                                        <div class="data-tabled">
                                          <h5><a href="basicinfo.php">{{$item->event_title}}</a></h5>
                                          <span>{{$item->event_start_date}} - {{$item->event_end_date}}</span>
                                          <p>{{$item->event_start_time}} - {{$item->event_end_time}}</p>
                                        </div>
                                      </div>
                                    </div>
                                  </th>
                                  <td>
                                    <div class="box"> {{$item->event_label}}</div>
                                  </td>
                                  <td>
                                    <div class="box1"> <a href=""><i class="fa fa-eye" style="padding-right: 10px;"></i>Preview</a>
                                    </div>
                                  </td>
                                </tr>
                                @endforeach
                                @else 
                                  No event you created.
                              @endif

                            </tbody>
                          </table>
                        </div>
                      </div>
                    </div>

                  </div>
                </div>
                {{-- Paused events end --}}
                @php
                    $completed = App\Models\Event::where('event_label','Completed')->get();
                @endphp
                {{-- Completed events end --}}
                <div class="tab-pane fade" id="setting-links" role="tabpanel" aria-labelledby="setting-link">
                  <div class="row">
                    <div class="col-sm-12">
                      <div class="card">

                        <div class="table-responsive">
                          <table class="table table-xl">
                            <thead>
                              <tr>
                                <th>Event Name</th>
                                <th>Airmeet Status</th>
                                <th>Actions</th>
                              </tr>
                            </thead>
                            <tbody>
                              @if($completed != null)
                                @foreach ($completed as $item)
                                <tr>
                                  <th>
                                    <div class="row">
                                      <div class="col-md-4">
                                        <div class="data-table">
                                          <img class="img-fluid " src="{{asset('/assets/images/event')}}/{{$item->img_thumbnail}}" alt="">
                                        </div>
                                      </div>
                                      <div class="col-md-8">
                                        <div class="data-tabled">
                                          <h5><a href="basicinfo.php">{{$item->event_title}}</a></h5>
                                          <span>{{$item->event_start_date}} - {{$item->event_end_date}}</span>
                                          <p>{{$item->event_start_time}} - {{$item->event_end_time}}</p>
                                        </div>
                                      </div>
                                    </div>
                                  </th>
                                  <td>
                                    <div class="box"> {{$item->event_label}}</div>
                                  </td>
                                  <td>
                                    <div class="box1"> <a href=""><i class="fa fa-eye" style="padding-right: 10px;"></i>Preview</a>
                                    </div>
                                  </td>
                                </tr>
                                @endforeach
                                @else 
                                  No event you created.
                              @endif

                            </tbody>
                          </table>
                        </div>
                      </div>
                    </div>

                  </div>
                </div>
                {{-- Completed events end --}}
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Container-fluid Ends-->
</div>
@endsection