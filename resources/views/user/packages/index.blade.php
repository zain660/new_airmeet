@extends('layouts.app')
@section('content')
    <style>
        .active,
        .pricing-simple:hover {
            border: 4px solid #24695c;

        }

        .pricing-list p {
            font-weight: 500;
        }

        .table th,
        .table td {
            width: 200px;
        }

    </style>

    <div class="page-body">

        <!-- Container-fluid starts-->
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-body row pricing-content" id="myHead">
                            @if ($package_type->count() > 0)
                                @foreach ($package_type as $item)
                                    <div class="col-xl-5 col-sm-6 xl-50 box-col-6 ">
                                        <a href="#" onclick="get_package_function({{ $item->id }})">
                                            <div class="card text-center pricing-simple">
                                                <div class="card-body">
                                                    <h3>{{ $item->package_type }}</h3>
                                                    <p class="mb-0">{{ $item->short_desc }}</p>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                @endforeach
                            @endif
                        </div>
                    </div>
                </div>

                <div class="col-sm-12 ">
                    <div class="card">
                        <div class="card-body row pricing-content">
                            <div id="spinner" style="display: none;">
                                <div class="spinner-border text-success" role="status">
                                    <span class="sr-only">Loading...</span>
                                </div>
                                Loading Packages...
                            </div>
                            <div class="row" id="display_packages">

                            </div>
                        </div> 
                    </div>
                </div>

               
            </div>
        </div>
        <!-- Container-fluid Ends-->
    </div>

    <script>
        function get_package_function(package_id) {
            $("#display_packages").empty();
            var spinner = document.getElementById('spinner');
            spinner.style.display = "block";
            $.ajax({
                url: '/user/organization/get_packages_ajax/' + package_id + ' ',
                type: 'get',
                cache: false,
                contentType: false, //must, tell jQuery not to process the data
                processData: false,
                success: function(response) {
                    spinner.style.display = "none";
                    var data = response.data;
                    if(data != ''){
                    $.each(data, function(index) {
                        if (data[index].track_events == 1) {
                            var track_events = '<i class="fa fa-check text-success"></i>';
                        } else {
                            var track_events = '<i class="fa fa-ban text-danger"></i>';
                        }
                        if (data[index].sociall_lounge == 1) {
                            var sociall_lounge = '<i class="fa fa-check text-success"></i>';
                        } else {
                            var sociall_lounge = '<i class="fa fa-ban text-danger"></i>';
                        }
                        if (data[index].speed_networking == 1) {
                            var speed_networking = '<i class="fa fa-check text-success"></i>';
                        } else {
                            var speed_networking = '<i class="fa fa-ban text-danger"></i>';
                        }
                        if (data[index].tickting == 1) {
                            var tickting = '<i class="fa fa-check text-success"></i>';
                        } else {
                            var tickting = '<i class="fa fa-ban text-danger"></i>';
                        }
                        if (data[index].event_support == 1) {
                            var event_support = '<i class="fa fa-check text-success"></i>';
                        } else {
                            var event_support = '<i class="fa fa-ban text-danger"></i>';
                        }
                        if (data[index].allow_recording == 1) {
                            var allow_recording = '<i class="fa fa-check text-success"></i>';
                        } else {
                            var allow_recording = '<i class="fa fa-ban text-danger"></i>';
                        }
                        if (data[index].event_branding == 1) {
                            var event_branding = '<i class="fa fa-check text-success"></i>';
                        } else {
                            var event_branding = '<i class="fa fa-ban text-danger"></i>';
                        }
                        if (data[index].allow_priority_support == 1) {
                            var allow_priority_support = '<i class="fa fa-check text-success"></i>';
                        } else {
                            var allow_priority_support = '<i class="fa fa-ban text-danger"></i>';
                        }
                        if (data[index].public_api == 1) {
                            var public_api = '<i class="fa fa-check text-success"></i>';
                        } else {
                            var public_api = '<i class="fa fa-ban text-danger"></i>';
                        }
                        if (data[index].custom_registration == 1) {
                            var custom_registration = '<i class="fa fa-check text-success"></i>';
                        } else {
                            var custom_registration = '<i class="fa fa-ban text-danger"></i>';
                        }
                        if (data[index].package_duration_days == 1) {
                            var package_duration_days = 'year';
                        } else {
                            var package_duration_days = 'month';
                        }
                        var block =
                            '<div class="col-md-4"><div class="pricing-block card text-center"><div class="pricing-header"><h2>' +
                            data[index].package_name +
                            '</h2><div class="price-box"><div><h3>{{ env('CURRENCY_SYMBOL') }}' + data[
                                index].price + '</h3><p>/ ' + data[index].package_duration + ' ' +
                            package_duration_days +
                            '</p></div></div></div><div class="pricing-list"><p>Small yet highly engaging webinars with up to ' +
                            data[index].event_registation +
                            ' registrations</p><ul class="pricing-inner"><li><h6>' + data[index]
                            .event_registation +
                            ' Registrations/event</h6></li><li><h6>Single track events ' +
                            track_events + '</h6></li><li><h6>Max Session duration ' + data[index]
                            .max_session_duration + '</h6></li><li><h6>Social lounge ' +
                            sociall_lounge + '</h6></li><li><h6>Speed networking ' + speed_networking +
                            '</h6></li> <li><h6>Ticketing ' + tickting +
                            '</h6></li><li><h6>Event support ' + event_support +
                            '</h6></li><li><h6>Allow Recording ' + allow_recording +
                            '</h6></li><h6>Event Branding ' + event_branding +
                            '</h6></li></li><h6>Priority Support ' + allow_priority_support +
                            '</h6></li></li><h6>Public API ' + public_api +
                            '</h6></li><a href="/user/upgrade-plan/card-payment/' + data[index].id + '" class="btn btn-primary">View Details &nbsp;&nbsp;<img src="{{asset("/assets/images/rightarrow.png")}}" style="height: 25px;" class="img-fluid"></a></ul></div></div></div>';
                        $("#display_packages").append(block);
                    });
                }else{
                    var block = 'No package found.';
                    $("#display_packages").append(block);
                }

                }
            });

        }
    </script>

    <script>
        // Add active class to the current button (highlight it)
        var header = document.getElementById("myHead");
        var btns = header.getElementsByClassName("pricing-simple");
        for (var i = 0; i < btns.length; i++) {
            btns[i].addEventListener("click", function() {
                var current = document.getElementsByClassName("active");
                current[0].className = current[0].className.replace(" active", "");
                this.className += " active";
            });
        }
    </script>


@endsection
