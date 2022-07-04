
<form @if($request->req_type == 'create') action="{{route('add_package')}}" @else action="{{route('package_update',[$id])}}" @endif method="post">
    @csrf

    @if($request->req_type == 'edit')
        @php
          $package_type = $package->package_type;
          $price = $package->price;
          $shot_description = $package->shot_description;
          $event_registation = $package->event_registation;
          $comunity = $package->comunity;
          $track_events = $package->track_events;
          $max_session_duration = $package->max_session_duration;
          $sociall_lounge = $package->sociall_lounge;
          $sociall_lounge = $package->sociall_lounge;
        $speed_networking = $package->speed_networking;
        $tickting = $package->tickting;
        $allow_recording = $package->allow_recording;
        $event_branding = $package->event_branding;
        $allow_priority_support = $package->allow_priority_support;
        $public_api = $package->public_api;
        $custom_registration = $package->custom_registration;
        
        $event_support = $package->event_support;
          $package_name = $package->package_name;
          $package_duration_days = $package->package_duration_days;
          $package_duration_days = $package->package_duration_days;
          
        @endphp
        @else 
        @php
          $package_type = null;
          $price = null;
          $shot_description = null;
          $event_registation = null;
          $comunity = null;
          $track_events = null;
          $max_session_duration = null;
          $sociall_lounge = null;
          $sociall_lounge = null;
        $speed_networking = null;
        $tickting = null;
        $allow_recording = null;
        $event_branding = null;
        $allow_priority_support = null;
        $public_api = null;
        $custom_registration = null;
        $event_support = null;
        $package_duration = null;
        @endphp
    @endif

    <style>
        .form-check-input{
            width: 1.5rem;height: 1.5rem;top: 0.5rem;
        }
       
    </style>
    @php
        $package_types = App\Models\PackagesType::where('is_active',1)->get();
    @endphp
    <div class="row">
        <div class="container col-6">
            <label for="package_type">Package Type</label>
            <select name="package_type" id="package_type" required class="form-control">
                @foreach ($package_types as $item)
                    <option value="{{$item->id}}">{{$item->package_type}}</option>
                @endforeach
            </select>
            {{-- <input type="text" name="package_type" value="{{$package_type ?? ''}}" id="package_type" class="form-control"> --}}
        </div>
        <div class="container col-6">
            <label for="price">Package Price</label>
            <input type="text" name="price" required id="price" value="{{$price ?? ''}}" class="form-control">
        </div>
        <div class="container col-12 py-4">
            <label for="package_name">Package Name</label>
            <input type="text" name="package_name" required id="package_name" value="{{$package_name ?? ''}}" class="form-control">
        </div>
        <div class="container col-6 py-4">
            <label for="package_duration">Package Days</label>
            <select name="package_duration" id="package_duration" class="form-control">
                <option value="1" @if($package_duration == 1) selected @endif>1</option>
                <option value="2" @if($package_duration == 2) selected @endif>2</option>
                <option value="3" @if($package_duration == 3) selected @endif>3</option>
                <option value="4" @if($package_duration == 4) selected @endif>4</option>
                <option value="5" @if($package_duration == 5) selected @endif>5</option>
                <option value="6" @if($package_duration == 6) selected @endif>6</option>
                <option value="7" @if($package_duration == 7) selected @endif>7</option>
                <option value="8" @if($package_duration == 8) selected @endif>8</option>
                <option value="9" @if($package_duration == 9) selected @endif>9</option>
                <option value="10" @if($package_duration == 10) selected @endif>10</option>
                <option value="11" @if($package_duration == 11) selected @endif>11</option>
                <option value="12" @if($package_duration == 12) selected @endif>12</option>
            </select>
        </div>
        <div class="container col-6 py-4">
            <label for="package_duration_days">Package Duration</label>
            <select name="package_duration_days"class="form-control" id="">
                <option value="0">Monthly</option>
                <option value="1">Yearly</option>
            </select>
        </div>
        <div class="container col-12 py-2">
            <textarea name="shot_description" required id="" class="form-control">{{$shot_description ?? 'Short Description'}}</textarea>
        </div>
    </div>

    <div class="row py-2">
        <div class="container col-4">
            <div class="form-check form-check-inline">
                <label class="form-check-label" for="event_registation">Allow Event Registration</label>&nbsp;
                <input class="form-check-input" type="checkbox" @if($event_registation == 1) value="0" checked @else value="1" @endif name="event_registation" id="event_registation">
            </div>
        </div>
        <div class="container col-4">
            <div class="form-check form-check-inline">
                <label class="form-check-label" for="comunity">Allow Comunity</label>&nbsp;
                <input class="form-check-input" type="checkbox" name="comunity" @if($comunity == 1) value="0" checked @else value="1" @endif id="comunity">
            </div>
        </div>
        <div class="container col-4 py-2">
            <div class="form-check form-check-inline">
                <label class="form-check-label" for="track_events">Allow Track Events</label>&nbsp;
                <input class="form-check-input" type="checkbox" name="track_events" @if($track_events == 1) value="0" checked @else value="1" @endif>
            </div>
        </div>

        <div class="container col-4 py-2">
            <div class="form-check form-check-inline">
                <label class="form-check-label" for="max_session_duration">Max Session Duration</label>&nbsp;
                <input style="width: 58px;"type="number" min="1" name="max_session_duration" id="max_session_duration"@if($max_session_duration == 1) value="0" checked @else value="1" @endif>
            </div>
        </div>
        <div class="container col-4">
            <div class="form-check form-check-inline">
                <label class="form-check-label" for="sociall_lounge">Allow Social Lounge</label>&nbsp;
                <input class="form-check-input" type="checkbox" name="sociall_lounge" id="sociall_lounge" @if($sociall_lounge == 1) value="0" checked @else value="1" @endif>
            </div>
        </div>
        <div class="container col-4">
            <div class="form-check form-check-inline">
                <label class="form-check-label" for="speed_networking">Allow Speed Networking</label>&nbsp;
                <input class="form-check-input" type="checkbox" name="speed_networking" id="speed_networking"@if($speed_networking == 1) value="0" checked @else value="1" @endif>
            </div>
        </div>


        <div class="container col-4 py-2">
            <div class="form-check form-check-inline">
                <label class="form-check-label" for="tickting">Tickting</label>&nbsp;
                <input class="form-check-input" type="checkbox" name="tickting" id="tickting" @if($tickting == 1) value="0" checked @else value="1" @endif>
            </div>
        </div>
        <div class="container col-4">
            <div class="form-check form-check-inline">
                <label class="form-check-label" for="allow_recording">Allow Recording</label>&nbsp;
                <input class="form-check-input" type="checkbox" name="allow_recording" id="allow_recording" @if($allow_recording == 1) value="0" checked @else value="1" @endif>
            </div>
        </div>
        <div class="container col-4">
            <div class="form-check form-check-inline">
                <label class="form-check-label" for="event_branding">Allow Event Branding</label>&nbsp;
                <input class="form-check-input" type="checkbox" name="event_branding" id="event_branding" @if($event_branding == 1) value="0" checked @else value="1" @endif>
            </div>
        </div>


        
        <div class="container col-4 py-2">
            <div class="form-check form-check-inline">
                <label class="form-check-label" for="allow_priority_support">Allow Priority Support</label>&nbsp;
                <input class="form-check-input" type="checkbox" name="allow_priority_support" id="allow_priority_support" @if($allow_priority_support == 1) value="0" checked @else value="1" @endif>
            </div>
        </div>
        <div class="container col-4">
            <div class="form-check form-check-inline">
                <label class="form-check-label" for="public_api">Allow Public API</label>&nbsp;
                <input class="form-check-input" type="checkbox" name="public_api" id="public_api" @if($public_api == 1) value="0" checked @else value="1" @endif>
            </div>
        </div>
        <div class="container col-4">
            <div class="form-check form-check-inline">
                <label class="form-check-label" for="custom_registration">Allow Custom Registration</label>
                &nbsp;
                <input class="form-check-input" type="checkbox" name="custom_registration" id="custom_registration" @if($custom_registration == 1) value="0" checked @else value="1" @endif>
            </div>
        </div>
        <div class="container col-4 py-2">
            <div class="form-check form-check-inline">
                <label class="form-check-label" for="event_support">Allow Event Support</label>
                &nbsp;
                <input class="form-check-input" type="checkbox" name="event_support" id="event_support" @if($event_support == 1) value="0" checked @else value="1" @endif>
            </div>
        </div>
    </div>
    <hr>
    <div class="form-footer">
        <button class="btn btn-primary"><i class="fa fa-save"></i> Save</button>
        <a href="/admin/dashboard" class="btn btn-info"><i class="fa fa-save"></i> Cancel</a>

    </div>
</form>