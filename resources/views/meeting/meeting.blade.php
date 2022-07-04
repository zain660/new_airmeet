@extends('layouts.app')

@section('page', $page)
@section('title', getSetting('APPLICATION_NAME') . ' | ' . $page . ' | ' . $meeting->title)

@section('style')
<link href="{{ asset('css/meeting.css') }}" rel="stylesheet">
<style>
    .whiteboard {
  height: 100%;
  width: 100%;
  position: absolute;
  left: 0;
  right: 0;
  bottom: 0;
  top: 0;
}

.colors {
  position: fixed;
}

.color {
  display: inline-block;
  height: 48px;
  width: 48px;
}
.color.black { background-color: black; }
.color.red { background-color: red; }
.color.green { background-color: green; }
.color.blue { background-color: blue; }
.color.yellow { background-color: yellow; }
</style>
@endsection

@section('content')
<div class="container meeting-details">
    <canvas id="audioOnly" hidden=""></canvas>
    <div class="row h-100 justify-content-center align-items-center">
        <div class="col-lg-7 video-detail">
            <div class="video-Section">
                <video id="previewVideo" autoplay="" playsinline="" muted="" style="z-index: 5;"></video>
                <div class="cameraText">Camera is off</div>
                <div class="video-controls">
                    <ul>
                        <li id="toggleVideoPreview" class="" data-toggle="tooltip" data-placement="top" title="Toggle video"><i class="fa fa-video"></i></li>
                        <li data-toggle="tooltip" data-placement="top" title="Settings" class="openSettings">
                            <em class="fa fa-cog"></em>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="text-show" style="color: red;"></div>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-lg-5">
            <div class="card">
                <div class="card-header">
                    <h5>{{ $meeting->title }}</h5>
                </div>
                <div class="card-body pb-0">
                    <div class="ribbon-wrapper ribbon-lg">
                        <div class="ribbon bg-primary" title="Time Limit">
                            {{ $meeting->limitedTimeMeeting ? getSetting('TIME_LIMIT') . ' Minutes' : 'Unlimited' }}
                        </div>
                    </div>
                    <form id="passwordCheck">
                        <div class="form-group">
                            <h5><i class="fa fa-id-badge mr-1"></i> {{ $meeting->meeting_id }}</h5>
                        </div>
                        <div class="form-group">
                            <p class="mb-1">{{ $meeting->description ? $meeting->description : '-' }}</p>
                        </div>

                        <div class="form-group row" @if(Auth::check()) hidden @endif>
                            <label for="username" class="col-md-3">Name</label>
                            <div class="col-md-9">
                                <input type="text" id="username" class="form-control" value="{{ $meeting->username }}" placeholder="Enter your name" maxlength="8" />
                            </div>
                        </div>

                        @if($meeting->password)
                        <div class="form-group row">
                            <label for="password" class="col-md-3">Password</label>
                            <div class="col-md-9">
                                <input id="password" type="text" class="form-control" name="password" placeholder="Enter meeting password" maxlength="8" required />
                                <input type="hidden" name="id" value="{{ $meeting->id }}" />
                            </div>
                        </div>
                        @endif

                        <div class="form-group row">
                            <div class="col-md-9 offset-md-3">
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" id="muteCamera" />
                                    <label class="form-check-label" for="muteCamera">Mute Camera</label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-9 offset-md-3">
                                <button class="btn btn-primary" id="joinMeeting" data-toggle="tooltip" data-placement="top" title="Join Meeting"  type="submit" disabled>Join</button>
                                <button class="btn btn-secondary updateDevices" type="button" data-toggle="tooltip" data-placement="top" title="Settings"><i class="fa fa-cog"></i></button>
                                <button class="btn btn-info" type="button" data-toggle="modal" data-target="#shortcutInfo" data-toggle="tooltip" data-placement="top" title="Shortcut Keys information"><i class="fa fa-info"></i></button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid meeting-section">
    <div class="row">
        <div id="videos">
            <div class="videoContainer">
                <img src="{{ asset('storage/images/SECONDARY_LOGO.png') }}" class="meeting-logo" alt="{{ getSetting('APPLICATION_NAME') }}" />
                <video id="localVideo" autoplay playsinline muted></video>
                <span class="local-user-name"></span>
            </div> 
        </div>
         <div id="whiteboardSection">
             
         </div>
    </div>

    <div class="meeting-info text-center">
        <span id="meetingIdInfo" class="text-center"></span>
        <span id="timer" class="text-center"></span>
    </div>

    <div class="chat-panel">
        <div class="chat-box">
            <div class="chat-header">
                Chat
                <i class="fas fa-times close-panel"></i>
            </div>
            <div class="chat-body">
                <div class="empty-chat-body">
                    <i class="fa fa-comments chat-icon"></i>
                </div>
            </div>
            <div class="chat-footer">
                <form id="chatForm">
                    <div class="input-group">
                        <input type="text" id="messageInput" class="form-control note-input" placeholder="Type a message..." autocomplete="off" maxlength="250" />
                        <div class="input-group-append">
                            <button id="sendMessage" class="btn btn-outline-secondary" type="submit" title="Send">
                                <i class="far fa-paper-plane"></i>
                            </button>
                            <button id="selectFile" class="btn btn-outline-secondary" title="Attach File" type="button">
                                <i class="fas fa-paperclip"></i>
                            </button>
                        </div>
                    </div>
                </form>
                <input type="file" name="file" id="file" data-max="50" hidden />
            </div>
        </div>
    </div>

    <div class="meeting-options">
        <button class="btn meeting-option" title="Chat" id="openChat">
            <i class="far fa-comment-alt"></i>
        </button>
        <button class="btn meeting-option" title="Invite" id="add">
            <i class="fas fa-user-plus"></i>
        </button>
        <button class="btn meeting-option" title="Mute/Unmute Mic" id="toggleMic">
            <i class="fa fa-microphone"></i>
        </button>
        
        <button class="btn btn-danger" title="Leave Meeting" id="leave">
            <i class="fas fa-phone"></i>
        </button>
        <button class="btn meeting-option" title="{{ __('Whiteboard') }}" id="whiteboard">
            <i class="fa fa-chalkboard"></i>
        </button>
        <button class="btn meeting-option" title="On/Off Camera" id="toggleVideo">
            <i class="fa fa-video"></i>
        </button>
        <button class="btn meeting-option" title="Rotate Camera" id="toggleCam">
            <i class="fas fa-camera"></i>
        </button>
        <button class="btn meeting-option" title="Start/Stop ScreenShare" id="screenShare">
            <i class="fa fa-desktop"></i>
        </button>
        <button class="btn meeting-option updateDevices" title="Update Devices">
            <i class="fa fa-cog"></i>
        </button>
    </div>
</div>

<div class="modal fade" id="previewModal" tabindex="-1" role="dialog" aria-labelledby="previewModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="previewModalLabel">File Preview</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <img id="previewImage" src="" />
                <p id="previewFilename"></p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <button type="button" id="sendFile" class="btn btn-primary">Send</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="displayModal" tabindex="-1" role="dialog" aria-labelledby="displayModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="displayModalLabel">File Display</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <img id="displayImage" src="" />
                <p id="displayFilename"></p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" id="downloadFile" class="btn btn-primary">Download</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="deviceSettings" tabindex="-1" role="dialog" aria-labelledby="deviceSettingsLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deviceSettingsLabel">Device Settings</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group row">
                    <div class="col-lg-3 col-md-4 text-left">
                        <label for="videoQualitySelect">Video Quality </label>
                    </div>
                    <div class="col-lg-9 col-md-8">
                        <select id="videoQualitySelect" class="form-control">
                            <option id="QVGA" data-width="320" data-height="240">QVGA</option>
                            <option id="VGA" data-width="640" data-height="480">VGA</option>
                            <option id="HD" data-width="1280" data-height="720">HD</option>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-lg-3 col-md-4 text-left">
                        <label for="audioSource">Audio input source </label>
                    </div>
                    <div class="col-lg-9 col-md-8">
                        <select id="audioSource" class="form-control"></select>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-lg-3 col-md-4 text-left">
                        <label for="videoSource">Video source </label>
                    </div>
                    <div class="col-lg-9 col-md-8">
                        <select id="videoSource" class="form-control"></select>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-lg-3 col-md-4 text-left">
                        <label for="videoSource">Recording preference </label>
                    </div>
                    <div class="col-lg-9 col-md-8">
                        <select id="recordingPreference" class="form-control">
                            <option value="with">With whiteboard</option>
                            <option value="without">Without whiteboard</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="shortcutInfo" tabindex="-1" role="dialog" aria-labelledby="shortcutInfoLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="shortcutInfoLabel">Settings</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <table class="table table-borderless">
                    <thead>
                        <tr>
                            <th scope="col">Shortcut Key</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">C</th>
                            <td>Chat</td>
                        </tr>
                        <tr>
                            <th scope="row">F</th>
                            <td>Attach File</td>
                        </tr>
                        <tr>
                            <th scope="row">A</th>
                            <td>Mute/Unmute Audio</td>
                        </tr>
                        <tr>
                            <th scope="row">L</th>
                            <td>Leave Meeting</td>
                        </tr>
                        <tr>
                            <th scope="row">V</th>
                            <td>On/Off Video</td>
                        </tr>
                        <tr>
                            <th scope="row">S</th>
                            <td>Screen Share</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

@endsection

@section('script')
<script>
    const languages = {
        error_occurred: "An error occurred, please try again.",
        data_updated: "Data updated successfully",
        no_meeting: "The meeting does not exist",
        meeting_created: "The meeting has been created",
        confirmation: "Are you sure?",
        meeting_deleted: "The meeting has been deleted",
        link_copied: "Meeting link has been copied to the clipboard",
        meeting_updated: "The meeting has been updated",
        sending_invite: "Sending the invitation...",
        invite_sent: "Invitation has been sent",
        inviteMessage: "Hey there! Join me for a meeting at this link: ",
        no_session: "Could not get the session details.",
        kicked: "You have been kicked out of the meeting!",
        uploading: "Uploading the file...",
        meeting_ended: "Meeting ended!",
        cant_connect: "Could not connect to the server, please try again later.",
        invalid_password: "The password is invalid",
        no_device: "Could not get the devices, please check the permissions and try again. Error: ",
        approve: "Approve",
        decline: "Decline",
        request_join_meeting: "Request to join the meeting: ",
        request_declined: "Your request has been declined by the moderator.",
        double_click: "Double click on the video to make it bigger",
        single_click: "Single click on the video to turn picture-in-picture mode on.",
        error_message: "An error occurred: ",
        kick_user: "Kick this user",
        participant_joined: "A participant has joined the meeting: ",
        confirmation_kick: "Are you sure you want to kick this user?",
        participant_left: "A participant has left the meeting: ",
        camera_on: "Camera has been turned on.",
        camera_off: "Camera has been turned off.",
        mic_unmute: "Mic has been unmute.",
        mic_mute: "Mic has been muted.",
        no_video: "The video is not playing or has no video track.",
        no_pip: "Picture-in-picture mode is not supported in this browser.",
        link_copied: "The meeting invitation link has been copied to the clipboard!",
        cant_share_screen: "Could not share the screen, please check the permissions and try again.",
        max_file_size: "Maximum file size allowed (MB): ",
        view_file: "View File",
        hand_raised: "Hand raised",
        hand_raised_self: "You raised hand",
        your_screen: "Your screen",
        not_started: "The meeting has not been started yet",
        meeting_full: "The meeting is full",
        please_wait: "Please wait while the moderator check your request",
        request_record_meeting: "Request to record the meeting: ",
        record_request_declined: "You recording request was not approved",
        feature_not_supported: "This feature is not yet supported in your browser",
        feature_not_available: "This feature is not available in the current meeting plan"
    }
</script>
    <script type="text/javascript">
        const userInfo = {
            username: username.value,
            meetingId: "{{ $meeting->meeting_id }}"
        };
        const meetingTitle = "{{ $meeting->title }}";
        const passwordRequired = "{{ $meeting->password }}";
        const isModerator = "{{ $meeting->isModerator }}";
        const timeLimit = "{{ $meeting->limitedTimeMeeting }}";
        const features = JSON.parse("{&quot;text_chat&quot;:&quot;1&quot;,&quot;file_share&quot;:&quot;1&quot;,&quot;screen_share&quot;:&quot;1&quot;,&quot;whiteboard&quot;:&quot;1&quot;,&quot;hand_raise&quot;:&quot;1&quot;,&quot;recording&quot;:&quot;1&quot;,&quot;meeting_no&quot;:&quot;100&quot;,&quot;time_limit&quot;:&quot;1000&quot;}".replace(/&quot;/g, '"'));
        Object.freeze(features);
    </script>
    {{-- <script src="https://cdn.socket.io/4.5.0/socket.io.min.js" integrity="sha384-7EyYLQZgWBi67fBtVxw60/OWl1kjsfrPFcaU0pp0nAh+i8FD068QogUvg85Ewy1k" crossorigin="anonymous"></script> --}}
    <script src="{{ asset('js/socket.io.js') }}"></script>
    <script src="{{ asset('js/easytimer.min.js') }}"></script>
    <script src="{{ asset('js/adapter.min.js') }}"></script>
    <script src="{{ asset('js/siofu.min.js') }}"></script>
    <script src="{{ asset('js/MultiStreamsMixer.min.js') }}"></script>
    <script src="{{ asset('js/opentok-layout.min.js') }}"></script>
    <script src="{{ asset('js/canvas-designer-widget.js') }}"></script>
    <script src="{{ asset('js/widget.min.js') }}"></script>

    <script src="{{ asset('js/meeting.js') }}"></script>
@endsection
