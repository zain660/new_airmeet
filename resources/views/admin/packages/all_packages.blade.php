@extends('layouts.admin_layout')
@section('content')

    <div class="content-page">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive pricing pt-2">
                                <table id="my-table" class="table">
                                   <thead>
                                      <tr>
                                         <th class="text-center prc-wrap"></th>
                                         @if($all_packages->count() > 0)
                                            @foreach ($all_packages as $item)
                                            <th class="text-center prc-wrap">
                                                <div class="prc-box">
                                                   <div class="h3 pt-4">{{env('CURRENCY_SYMBOL')}}{{$item->price}}<small> / Per month</small>
                                                   </div> <span class="type">{{$item->package_type_details->package_type}}</span>
                                                </div>
                                             </th>
                                            @endforeach 
                                         @endif
                                      </tr>
                                   </thead>
                                   <tbody>
                                    @if($all_packages->count() > 0)
                                      <tr>
                                         <th class="text-center" scope="row">Event Registration</th>
                                         @foreach ($all_packages as $items)
                                         @if ($items->event_registation == 1)
                                         <td class="text-center child-cell"><i class="ri-check-line ri-2x"></i></td>
                                         @else
                                         <td class="text-center child-cell"><i class="ri-close-line i_close"></i></td>
                                         @endif
                                         @endforeach
                                      </tr> 
                                     <tr>
                                        <th class="text-center" scope="row">Comunity</th>
                                        @foreach ($all_packages as $items)
                                        @if ($items->comunity == 1)
                                        <td class="text-center child-cell"><i class="ri-check-line ri-2x"></i></td>
                                        @else
                                        <td class="text-center child-cell"><i class="ri-close-line i_close"></i></td>
                                        @endif
                                        @endforeach
                                     </tr>
                                     <tr>
                                        <th class="text-center" scope="row">Track Events</th>
                                        @foreach ($all_packages as $items)
                                        @if ($items->track_events == 1)
                                        <td class="text-center child-cell"><i class="ri-check-line ri-2x"></i></td>
                                        @else
                                        <td class="text-center child-cell"><i class="ri-close-line i_close"></i></td>
                                        @endif
                                        @endforeach
                                     </tr>
                                     <tr>
                                        <th class="text-center" scope="row">Max Sassion Duration</th>
                                        @foreach ($all_packages as $items)
                                        <td class="text-center child-cell"> {{$items->max_session_duration}}</td>
                                        @endforeach
                                     </tr>
                                     <tr>
                                        <th class="text-center" scope="row">Social Lounge</th>
                                        @foreach ($all_packages as $items)
                                        @if ($items->sociall_lounge == 1)
                                        <td class="text-center child-cell"><i class="ri-check-line ri-2x"></i></td>
                                        @else
                                        <td class="text-center child-cell"><i class="ri-close-line i_close"></i></td>
                                        @endif
                                        @endforeach
                                     </tr>
                                     <tr>
                                        <th class="text-center" scope="row">Speed Networking</th>
                                        @foreach ($all_packages as $items)
                                        @if ($items->speed_networking == 1)
                                        <td class="text-center child-cell"><i class="ri-check-line ri-2x"></i></td>
                                        @else
                                        <td class="text-center child-cell"><i class="ri-close-line i_close"></i></td>
                                        @endif
                                        @endforeach
                                     </tr>
                                     <tr>
                                        <th class="text-center" scope="row">Tickting</th>
                                        @foreach ($all_packages as $items)
                                        @if ($items->tickting == 1)
                                        <td class="text-center child-cell"><i class="ri-check-line ri-2x"></i></td>
                                        @else
                                        <td class="text-center child-cell"><i class="ri-close-line i_close"></i></td>
                                        @endif
                                        @endforeach
                                     </tr>
                                     <tr>
                                        <th class="text-center" scope="row">Envent Support</th>
                                        @foreach ($all_packages as $items)
                                        @if ($items->event_support == 1)
                                        <td class="text-center child-cell"><i class="ri-check-line ri-2x"></i></td>
                                        @else
                                        <td class="text-center child-cell"><i class="ri-close-line i_close"></i></td>
                                        @endif
                                        @endforeach
                                     </tr>
                                     <tr>
                                        <th class="text-center" scope="row">Allow Recording</th>
                                        @foreach ($all_packages as $items)
                                        @if ($items->allow_recording == 1)
                                        <td class="text-center child-cell"><i class="ri-check-line ri-2x"></i></td>
                                        @else
                                        <td class="text-center child-cell"><i class="ri-close-line i_close"></i></td>
                                        @endif
                                        @endforeach
                                     </tr>
                                     <tr>
                                        <th class="text-center" scope="row">Allow Event Branding</th>
                                        @foreach ($all_packages as $items)
                                        @if ($items->event_branding == 1)
                                        <td class="text-center child-cell"><i class="ri-check-line ri-2x"></i></td>
                                        @else
                                        <td class="text-center child-cell"><i class="ri-close-line i_close"></i></td>
                                        @endif
                                        @endforeach
                                     </tr>
                                     <tr>
                                        <th class="text-center" scope="row">Allow Priority Support</th>
                                        @foreach ($all_packages as $items)
                                        @if ($items->allow_priority_support == 1)
                                        <td class="text-center child-cell"><i class="ri-check-line ri-2x"></i></td>
                                        @else
                                        <td class="text-center child-cell"><i class="ri-close-line i_close"></i></td>
                                        @endif
                                        @endforeach
                                     </tr>

                                     <tr>
                                        <th class="text-center" scope="row">Allow Public API</th>
                                        @foreach ($all_packages as $items)
                                        @if ($items->public_api == 1)
                                        <td class="text-center child-cell"><i class="ri-check-line ri-2x"></i></td>
                                        @else
                                        <td class="text-center child-cell"><i class="ri-close-line i_close"></i></td>
                                        @endif
                                        @endforeach
                                     </tr>
                                     <tr>
                                        <th class="text-center" scope="row">Custom Registration</th>
                                        @foreach ($all_packages as $items)
                                        @if ($items->custom_registration == 1)
                                        <td class="text-center child-cell"><i class="ri-check-line ri-2x"></i></td>
                                        @else
                                        <td class="text-center child-cell"><i class="ri-close-line i_close"></i></td>
                                        @endif
                                        @endforeach
                                     </tr>

                                     <tr>
                                        <th class="text-center" scope="row">Actions</th>
                                        @foreach ($all_packages as $items)
                                        <td class="text-center child-cell">
                                            <a href="/admin/packages/packages/edit/{{$items->id}}?req_type=edit" class="btn btn-info">Edit</a> | <a href="{{route('destroy_package',$item->id)}}" class="btn btn-danger">Delete</a> | <a href="{{route('subscription',$item->id)}}" class="btn btn-warning">Subscriptions</a>
                                        </td>
                                        @endforeach
                                     </tr>
                                    @endif
                                   </tbody>
                                </table>
                             <div></div></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection