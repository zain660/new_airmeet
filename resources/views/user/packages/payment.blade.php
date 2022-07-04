@extends('layouts.app')
@section('content')

<link rel="stylesheet" href="{{asset('country_picker/css/countrySelect.css')}}">
		<link rel="stylesheet" href="{{asset('country_picker/css/demo.css')}}">
<style>
    .page-body {
        margin-top: 120px;
    }

    .setting-back {
        font-size: 20px;
        padding: 20px;
        margin-right: 10px;

    }

    .setting-back2 {
        font-size: 20px;
        padding: 20px;
        margin-right: 10px;
        margin-top: -10px;

    }

    .pricing-simple h3 {

        font-weight: 600;
        color: #24695c;
    }

    .pricing-simple h4 {
        padding-top: 20px;
        font-weight: 600;
    }

    .pricing-simple .btn {
        margin-top: 20px;

    }

    .pricing-simple {
        border-radius: 25px;
    }


    /* Style the active class, and buttons on mouse-over */
    .current,
    .pricing-simple:hover {
        border-color: #24695c;
    }

    .current1,
    .pricing-simple:hover {
        border-color: #24695c;
    }

    .current2,
    .pricing-simple:hover {
        border-color: #24695c;
    }

    .current3,
    .pricing-simple:hover {
        border-color: #24695c;
    }
    .form-check-input{
        display: block;
    }

    .country-select{
        width: 100%
    }

    .Tabs input{
        height: 0 !important;
        width: 0 !important;
    }
</style>
    <div class="page-body">
        <div class="container">
            <div class="d-inline d-flex">
                <a class="setting-back" href="billing.php"><i class="fa fa-arrow-left"></i></a>
                <h2>Upgrade to {{$PackagesType->package_type}}</h2>
            </div>
        </div>

        <div class="container mt-5">
            <div class="d-inline d-flex">
                <a class="setting-back2" href="billing.php"><img
                        src="https://d2xqcdy5rl17k2.cloudfront.net/images/community/Calendar.svg" alt=""></a>
                <h5 style="font-weight: 600;">Choose billing type</h5>
            </div>
            <div class="row">
                <div class="col-xxl-12 col-md-6 col-sm-12 ">
                    <div class="btn-radio d-flex justify-content-center">
                        <div class="btn-group" data-bs-toggle="buttons">
                            <div class="btn btn-primary active btn-lg Tabs d-flex" style="width: min-content;line-height: -3;">
                                <div class="radio radio-primary d-flex">
                                    <input id="radio7" onclick="Show(); ShowHideDiv()" type="radio" name="radio1"
                                        value="option1" checked="">
                                    <label for="radio7">Subscriptions</label>
                                </div>
                            </div>
                            <div class="btn btn-primary btn-lg Tabs d-flex" style="width: min-content;line-height: -3;">
                                <div class="radio radio-primary">
                                    <input id="radio8" onclick="Show(); ShowHideDiv()" type="radio" name="radio1"
                                        value="option1">
                                    <label for="radio8" style="width: max-content">One-Time payment</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <div class="container mt-5" id="show1">
            <div class="row">
                <div class="col-xl-12">
                    <div class="container mt-5">
                        <div class="row" id="myDIV">
                            @if ($monthly_subscription->count() > 0)
                                @foreach ($monthly_subscription as $item)
                                    <div class="col-xl-3 col-sm-6 xl-25 box-col-6">
                                        <div class="card text-center pricing-simple current">
                                            <div class="card-body">
                                                <h3><del>$99</del> $89</h3>
                                                <h6 class="mb-0">per month</h6>
                                                <h4>100</h4>
                                                <h6 class="mb-0">registrations per event</h6>
                                            </div>
                                        </div>
                                    </div>
                                    
                                @endforeach
                            @else
                                No subscription found.
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container mt-5" id="show2" style="display: none;">
            <div class="row">
                <div class="col-xl-12">
                    <div class="container mt-5">
                        <div class="row" id="myDIV2">
                            @if ($yearly_subscription->count() > 0)
                                @foreach ($yearly_subscription as $item)
                                    <div class="col-xl-3 col-sm-6 xl-25 box-col-6" onclick="update_form_details()">
                                        <div class="card text-center pricing-simple" id="subs_{{$item->id}}">
                                            <div class="card-body">
                                                <h3>{{env('CURRENCY_SYMBOL')}}{{$item->price}}</h3>
                                                <h6 class="mb-0">billed once.</h6>
                                                <h6 class="mb-0">No auto-renewals</h6>
                                                <h4>{{$item->total_registration}}</h4>
                                                <h6 class="mb-0">registrations per event</h6>
                                                <hr>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" value="{{$item->id}}" name="flexRadioDefault" id="subscription" style=" display: block;">
                                                </div>
                                            </div>
                                        </div>
                                    </div> 
                                    <script>
                                        function update_form_details(){
                                            var billing_type = '<h6>Yearly</h6>';
                                            $('#billing_type').empty();
                                            $('#billing_type').append(billing_type);

                                            var registration_limit = '<h6>{{$item->total_registration}} Participants per event</h6>';
                                            $('#registration_limit').empty();
                                            $('#registration_limit').append(registration_limit);

                                            var chraged_amount = '<h5 style="font-weight: 600;">{{env('CURRENCY_SYMBOL')}}{{$item->price}}</h5>';
                                            $('#chraged_amount').empty();
                                            $('#chraged_amount').append(chraged_amount);
                                            document.getElementById('price').value = '';
                                            document.getElementById('price').value ='{{$item->price}}';

                                            document.getElementById('subs_id').value = '';
                                            document.getElementById('subs_id').value ='{{$item->id}}';
                                        }
                                    </script>
                                @endforeach
                            @else
                                No subscription found.
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="container mt-5">
            <div class="row">
                <div class="col-xxl-7 col-lg-6 box-col-6 debit-card">
                    <div class="card">
                        <div class="card-header pb-0">
                            <div class="d-inline d-flex">
                                <a class="setting-back2"><img
                                        src="https://d2xqcdy5rl17k2.cloudfront.net/images/community/Billing.svg" alt=""></a>
                                <h5 style="font-weight: 600;">Add billing details</h5>
                            </div>
                        </div>
                        <form class="theme-form e-commerce-form row require-validation" method="post" action="{{route('user.payment')}}" data-cc-on-file="false"
                        data-stripe-publishable-key="{{ env('STRIPE_KEY') }}" id="payment-form">
                        @csrf
                        <div class="card-body row">
                            <input type="hidden" name="price" id="price">
                            <input type="hidden" name="subs_id" id="subs_id">
                           
                                <div class="mb-3 col-sm-12">
                                    <input class="form-control" name="name" required type="text" placeholder="Name">
                                </div>
                                <div class="mb-3 col-sm-12">
                                    <input class="form-control" type="text" required name="company_name" placeholder="Company Name(Optional)">
                                </div>

                                <div class="mb-3 col-sm-6 p-r-0">
                                    <input type="text" id="country_selector" required name="country" name="country"placeholder="Selected country code will appear here" class="form-select w-100"/>
                                </div>
                                <div class="mb-3 col-sm-6">
                                    <input class="form-control" type="text" required name="state" placeholder="State">
                                </div>
                                <div class="mb-3 col-sm-6">
                                    <input class="form-control" type="text" name="vat_num" placeholder="VAT number(Optional)">
                                </div>
                                <div class="mb-3 col-sm-6">
                                    <input class="form-control" type="text" required name="post_zip_code" placeholder="Zip/Postal Code">
                                </div>
                            
                        </div>
                    </div>
                    <div class="card mt-5">
                        <div class="card-header pb-0">
                            <div class="d-inline d-flex">
                                <a class="setting-back2"><img
                                        src="https://d2xqcdy5rl17k2.cloudfront.net/images/community/Cart.svg" alt=""></a>
                                <h5 style="font-weight: 600;">Credit card information</h5>
                            </div>
                        </div>
                        <div class="card-body row">
                            <div class="col-lg-12 col-md-6 col-sm-12">
                                <div class="form-group required">
                                    <label>Card holder Name<i class="req">*</i></label>
                                    <input type="text" name="name" class="form-control"
                                        value="{{ Auth::user()->name }}">
                                </div>
                            </div>

                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <div class="form-group expiration required">
                                    <label>Exp month</label>
                                    <input type="text" name="month" class="form-control card-expiry-month"
                                        placeholder='MM' size='2'>
                                </div>
                            </div>


                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <div class="form-group expiration required">
                                    <label>Exp year</label>
                                    <input type="text" name="year" placeholder='YYYY' size='4'
                                        class="form-control card-expiry-year">
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <div class="form-group card required">
                                    <label>Card Number<i class="req">*</i></label>
                                    <input type="text" autocomplete='off' size='20' name="card_number"
                                        class="form-control card-number" value="">
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <div class="form-group cvc required">
                                    <label>CVC</label>
                                    <input type="text" name="cvc" placeholder='ex. 311' size='4'
                                        class="form-control card-cvc">
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="col-xxl-5 col-lg-6 box-col-6 debit-card">
                    <div class="card">
                        <div class="card-header pb-0">
                            <div class="d-inline d-flex">
                                <a class="setting-back2"><img
                                        src="https://d2xqcdy5rl17k2.cloudfront.net/images/community/Summary.svg" alt=""></a>
                                <h5 style="font-weight: 600;">Plan summary</h5>
                            </div>
                        </div>
                        <div class="card-body row">
                                <div class="mb-3 col-sm-9">
                                    <input class="form-control" type="text" placeholder="Coupon code (optional)">
                                </div>
                                <div class="mb-3 col-sm-2">
                                    <button class="btn btn-primary">Apply</button>
                                </div>

                                <div class="mb-3 col-sm-6 mt-3">
                                    <p>Plan type</p>
                                </div>
                                <div class="mb-3 col-sm-6 mt-3">
                                    <h6>{{$PackagesType->package_type}}</h6>
                                </div>
                                <div class="mb-3 col-sm-6">
                                    <p>Billing type</p>
                                </div>
                                <div class="mb-3 col-sm-6" id="billing_type">
                                    <h6>Subscriptions - Annually</h6>
                                </div>
                                <div class="mb-3 col-sm-6">
                                    <p>Registration limit</p>
                                </div>
                                <div class="mb-3 col-sm-6" id="registration_limit">
                                    <h6>300 Participants per event</h6>
                                </div>
                                <div class="mb-3 col-sm-6">
                                    <h6 style="font-weight: 600;">Amount being charged today</h6>
                                </div>
                                <div class="mb-3 col-sm-6" id="chraged_amount">
                                    <h5 style="font-weight: 600;">$2688</h5>
                                </div>
                            
                        </div>
                    </div>
                    <button class="btn col-sm-12 btn-primary btn-lg mb-3">Upgrade My Account</button>
                </form>
                    <p style="font-weight: 600;">I authorize Airmeet Inc. to save my payment method and automatically charge
                        this payment method whenever a subscription is associated with it.</p>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript" src="https://js.stripe.com/v2/"></script>
    <script type="text/javascript">
        $(function() {
            var $form = $(".require-validation");
            $('form.require-validation').bind('submit', function(e) {
                var $form = $(".require-validation"),
                    inputSelector = ['input[type=text]', 'input[type=text]',
                        'input[type=text]', 'input[type=text]',
                        'textarea'
                    ].join(', '),
                    $inputs = $form.find('.required').find(inputSelector),
                    $errorMessage = $form.find('div.error'),
                    valid = true;
                $errorMessage.addClass('hide');
                $('.has-error').removeClass('has-error');
                $inputs.each(function(i, el) {
                    var $input = $(el);
                    if ($input.val() === '') {
                        $input.parent().addClass('has-error');
                        $errorMessage.removeClass('hide');
                        e.preventDefault();
                    }
                });
                if (!$form.data('cc-on-file')) {
                    e.preventDefault();
                    Stripe.setPublishableKey($form.data('stripe-publishable-key'));
                    Stripe.createToken({
                        number: $('.card-number').val(),
                        cvc: $('.card-cvc').val(),
                        exp_month: $('.card-expiry-month').val(),
                        exp_year: $('.card-expiry-year').val()
                    }, stripeResponseHandler);
                }
            });

            function stripeResponseHandler(status, response) {
                if (response.error) {
                    $('.error')
                        .removeClass('hide')
                        .find('.alert')
                        .text(response.error.message);
                } else {
                    /* token contains id, last4, and card type */
                    var token = response['id'];
                    $form.find('input[type=text]').empty();
                    $form.append("<input type='hidden' name='stripeToken' value='" + token + "'/>");
                    $form.get(0).submit();
                }
            }
        });
    </script>
    <script src="{{asset('country_picker/js/countrySelect.js')}}"></script>
		<script>
			$("#country_selector").countrySelect({
				// defaultCountry: "jp",
				// onlyCountries: ['us', 'gb', 'ch', 'ca', 'do'],
				// responsiveDropdown: true,
				preferredCountries: ['pk', 'gb', 'us']
			});
		</script>

    <script type="text/javascript">
        function ShowHideDiv() {
            var chkYes = document.getElementById("radio7");
            var dvPassport = document.getElementById("show1");
            dvPassport.style.display = chkYes.checked ? "block" : "none";
        }
    </script>
    <script type="text/javascript">
        function Show() {
            var btns = document.getElementById("radio8");
            var showDiv = document.getElementById("show2");
            showDiv.style.display = btns.checked ? "block" : "none";
        }
    </script>

    
{{-- 
    <script>
        // Add active class to the current button (highlight it)
        var header = document.getElementById("myDIV");
        var btns = header.getElementsByClassName("pricing-simple");
        for (var i = 0; i < btns.length; i++) {
            btns[i].addEventListener("click", function() {
                var current = document.getElementsByClassName("current");
                current[0].className = current[0].className.replace(" current", "");
                this.className += " current";
            });
        }
    </script>
    <script>
        // Add active class to the current button (highlight it)
        var header = document.getElementById("myDIV1");
        var btns = header.getElementsByClassName("pricing-simple");
        for (var i = 0; i < btns.length; i++) {
            btns[i].addEventListener("click", function() {
                var current = document.getElementsByClassName("current1");
                current[0].className = current[0].className.replace(" current1", "");
                this.className += " current1";
            });
        }
    </script>
    
    <script>
        // Add active class to the current button (highlight it)
        var header = document.getElementById("myDIV3");
        var btns = header.getElementsByClassName("pricing-simple");
        for (var i = 0; i < btns.length; i++) {
            btns[i].addEventListener("click", function() {
                var current = document.getElementsByClassName("current3");
                current[0].className = current[0].className.replace(" current3", "");
                this.className += " current3";
            });
        }
    </script> --}}
@endsection
