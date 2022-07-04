//add headers to all the ajax requests
const googleAnalyticsTrackingId = "null";
const cookieConsent = "enabled";
const socialInvitation = "Hey, check out this amazing application, where you can host video meetings!";
$.ajaxSetup({
    headers: {
        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
    },
});

// Pricing plans
document.querySelector('#plan-month') && document.querySelector('#plan-month').addEventListener("click", function() {
    document.querySelectorAll('.plan-month').forEach(element => element.classList.add('d-block'));
    document.querySelectorAll('.plan-year').forEach(element => element.classList.remove('d-block'));
});

document.querySelector('#plan-year') && document.querySelector('#plan-year').addEventListener("click", function() {
    document.querySelectorAll('.plan-year').forEach(element => element.classList.add('d-block'));
    document.querySelectorAll('.plan-month').forEach(element => element.classList.remove('d-block', 'plan-preload'));
});

//show success toaster
function showSuccess(message) {
    toastr.success(message);
}

//show warning toaster
function showInfo(message) {
    toastr.info(message);
}

//show error toaster
function showError(message) {
    toastr.error(message || languages.error_occurred);
}

//ajax call to check if the meeting exist or not
$("#meeting").on("submit", function(e) {
    e.preventDefault();

    $("#initiate").attr("disabled", true);

    $.ajax({
            url: "check-meeting",
            data: $(this).serialize(),
            type: "post",
        })
        .done(function(data) {
            data = JSON.parse(data);
            $("#initiate").attr("disabled", false);

            if (data.success) {
                location.href = "meeting/" + data.id;
            } else {
                showError(languages.no_meeting);
            }
        })
        .catch(function() {
            showError(languages.no_meeting);
            $("#initiate").attr("disabled", false);
        });
});

//dynamically add google analytics tracking ID
if (googleAnalyticsTrackingId !== "null" && googleAnalyticsTrackingId) {
    let script = document.createElement("script");
    script.src =
        "https://www.googletagmanager.com/gtag/js?id=" +
        googleAnalyticsTrackingId;
    document.body.appendChild(script);

    window.dataLayer = window.dataLayer || [];

    function gtag() {
        dataLayer.push(arguments);
    }
    gtag("js", new Date());
    gtag("config", googleAnalyticsTrackingId);
}

//check if the cookie is accepted
if (cookieConsent == "enabled" && !localStorage.getItem("cookieAccepted")) {
    setTimeout(function() {
        $(".cookie").addClass("show-cookie");
    }, 3000);
}

//store in the local storage and hide the cookie dialogue
$(document).on("click", ".confirm-cookie", function() {
    localStorage.setItem("cookieAccepted", true);
    $(".cookie").removeClass("show-cookie");
});

//scroll to top
$('.start-btn').on('click', function(e) {
    e.preventDefault();
    $('html, body').animate({ scrollTop: 0 }, 'slow');
});

//handle remove copoun
$("#remove_coupon").on("click", function(e) {
    $('input[name="coupon"]').val('');
    //remove the submit button
    document.querySelector('#form-payment').submit.remove();

    //submit the form
    document.querySelector('#form-payment').submit();
})

//update summary
let updateSummary = (type) => {
    if (type == 'month') {
        document.querySelectorAll('.checkout-month').forEach(function(element) {
            element.classList.add('d-inline-block');
        });
        document.querySelectorAll('.checkout-year').forEach(function(element) {
            element.classList.remove('d-inline-block');
        });
    } else {
        document.querySelectorAll('.checkout-month').forEach(function(element) {
            element.classList.remove('d-inline-block');
        });
        document.querySelectorAll('.checkout-year').forEach(function(element) {
            element.classList.add('d-inline-block');
        });
    }
};

//update billing type
let updateBillingType = (value) => {
    document.querySelectorAll('.checkout-subscription').forEach(function(element) {
        element.classList.remove('d-none');
    });
    document.querySelectorAll('.checkout-subscription').forEach(function(element) {
        element.classList.add('d-block');
    });
    document.querySelectorAll('.checkout-one-time').forEach(function(element) {
        element.classList.add('d-none');
    });
    document.querySelectorAll('.checkout-one-time').forEach(function(element) {
        element.classList.remove('d-block');
    });
}

//payment form
if (document.querySelector('#form-payment')) {
    let url = new URL(window.location.href);

    document.querySelectorAll('[name="interval"]').forEach(function(element) {
        if (element.checked) {
            updateSummary(element.value);
        }

        //listen to interval changes
        element.addEventListener('change', function() {
            url.searchParams.set('interval', element.value);
            history.pushState(null, null, url.href);
            updateSummary(element.value);
        });
    });

    document.querySelectorAll('[name="payment_gateway"]').forEach(function(element) {
        if (element.checked) {
            updateBillingType(element.value);
        }

        //listen to payment gateway changes
        element.addEventListener('change', function() {
            url.searchParams.set('payment', element.value);
            history.pushState(null, null, url.href);
            updateBillingType(element.value);
        });
    });

    //if the Add a coupon button is clicked
    document.querySelector('#coupon') && document.querySelector('#coupon').addEventListener('click', function(e) {
        e.preventDefault();

        this.classList.add('d-none');
        document.querySelector('#coupon-input').classList.remove('d-none');
        document.querySelector('input[name="coupon"]').removeAttribute('disabled');
    });

    //if the Cancel coupon button is clicked
    document.querySelector('#coupon-cancel') && document.querySelector('#coupon-cancel').addEventListener('click', function(e) {
        e.preventDefault();

        document.querySelector('#coupon').classList.remove('d-none');
        document.querySelector('#coupon-input').classList.add('d-none');
        document.querySelector('input[name="coupon"]').setAttribute('disabled', 'disabled');
    });

    //if the country value changes
    document.querySelector('#i-country').addEventListener('change', function() {
        document.querySelector('#form-payment').submit.remove();
        document.querySelector('#form-payment').submit();
    });
}

//copy coupon
$("#coupon_copy").on("click", function(e) {
    e.preventDefault();
    let link = $("#i-code").val();
    var inp = document.createElement("input");
    inp.style.display = "hidden";
    document.body.appendChild(inp);
    inp.value = link;
    inp.select();
    document.execCommand("copy", false);
    inp.remove();
});

//copy stripe url
$("#stripe_wh_url_copy").on("click", function(e) {
    e.preventDefault();
    let link = $("#i-stripe-wh-url").val();
    var inp = document.createElement("input");
    inp.style.display = "hidden";
    document.body.appendChild(inp);
    inp.value = link;
    inp.select();
    document.execCommand("copy", false);
    inp.remove();
});

//copy paypal wh url
$("#paypal_wh_url_url").on("click", function(e) {
    e.preventDefault();
    let link = $("#i-paypal-wh-url").val();
    var inp = document.createElement("input");
    inp.style.display = "hidden";
    document.body.appendChild(inp);
    inp.value = link;
    inp.select();
    document.execCommand("copy", false);
    inp.remove();
});

//auto login feature for demo mode
$("#autoLogin").on('change', function() {
    let email;

    if (this.value == "admin") {
        email = "admin@jupiters.tech";
    } else if (this.value == "user_1") {
        email = "user1@jupiters.tech";
    } else if (this.value == "user_2") {
        email = "user2@jupiters.tech";
    }

    $("#email").val(email);
    $("#password").val('123456');
    $("#login").trigger('submit');
});

//set href into the social links
$('#fbShare').attr('href', 'https://www.facebook.com/sharer/sharer.php?u=' + location.hostname + '&quote=' + socialInvitation);
$('#twitterShare').attr('href', 'https://twitter.com/share?url=' + location.hostname + '&text=' + socialInvitation);
$('#waShare').attr('href', 'https://api.whatsapp.com/send?text=' + socialInvitation + ' \n ' + location.hostname);

//to prevent XSS vulnerability
function htmlEscape(input) {
    return input
        .replace(/&/g, '&amp;')
        .replace(/"/g, '&quot;')
        .replace(/'/g, '&#39;')
        .replace(/</g, '&lt;')
        .replace(/>/g, '&gt;');
}

//make sure this document is always at top due to media permission
if (window != top) top.location.href = window.location.href;