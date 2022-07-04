//set current nav-link active
$('a[data-name="' + location.pathname.split("/")[1] + '"]').addClass("active");

//add headers to all the ajax requests
$.ajaxSetup({
    headers: {
        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
    },
});

//initialize datatable
$("table")
    .DataTable({
        responsive: true,
        autoWidth: false,
        bPaginate: false,
        bInfo: false
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

//ajax call to meeting status
$(".meeting-status").on("click", function() {
    let currentRow = $(this);
    let meetingId = currentRow.data("id");
    let checked = currentRow.is(":checked");

    currentRow.attr("disabled", true);

    $.ajax({
            url: "/update-meeting-status",
            type: "post",
            data: {
                id: meetingId,
                checked: checked,
            },
        })
        .done(function(data) {
            data = JSON.parse(data);
            currentRow.attr("disabled", false);

            if (data.success) {
                showSuccess(languages.data_updated);
            } else {
                currentRow.prop("checked", true);
                showError(data.error);
            }
        })
        .catch(function() {
            currentRow.attr("disabled", false);
            showError();
        });
});

//ajax call to update user status
$(".user-status").on("click", function() {
    let currentRow = $(this);
    let userId = currentRow.data("id");
    let checked = currentRow.is(":checked");

    currentRow.attr("disabled", true);

    $.ajax({
            url: "/update-user-status",
            type: "post",
            data: {
                id: userId,
                checked: checked,
            },
        })
        .done(function(data) {
            data = JSON.parse(data);
            currentRow.attr("disabled", false);

            if (data.success) {
                showSuccess(languages.data_updated);
            } else {
                currentRow.prop("checked", true);
                showError(data.error);
            }
        })
        .catch(function() {
            currentRow.attr("disabled", false);
            showError();
        });
});

//ajax call to verify license
$("#verifyLicense").on("click", function() {
    $(this).attr("disabled", true);

    $.ajax({
            url: "/verify-license",
        })
        .done(function(data) {
            data = JSON.parse(data);
            $("#verifyLicense").attr("disabled", false);

            if (data.success) {
                showSuccess(languages.valid_license + data.type);
            } else {
                showError(languages.invalid_license + data.error);
            }
        })
        .catch(function() {
            $("#verifyLicense").attr("disabled", false);
            showError();
        });
});

//ajax call to uninstall license
$("#uninstallLicense").on("click", function() {
    if (!confirm(languages.confirmation)) return;

    $(this).attr("disabled", true);

    $.ajax({
            url: "/uninstall-license",
        })
        .done(function(data) {
            data = JSON.parse(data);
            $("#uninstallLicense").attr("disabled", false);

            if (data.success) {
                showSuccess(languages.license_uninstalled);
            } else {
                showError(languages.license_uninstalled_failed + data.error);
            }
        })
        .catch(function() {
            $("#uninstallLicense").attr("disabled", false);
            showError();
        });
});

//ajax call to check for update
$("#checkForUpdate").on("click", function() {
    $(this).attr("disabled", true);

    $.ajax({
            url: "/check-for-update",
        })
        .done(function(data) {
            data = JSON.parse(data);

            if (data.success) {
                $("#downloadUpdate").removeAttr("hidden");
                let changelog = '';
                $.each(data.changelog, function(key, value) {
                    changelog += '<b>V ' + key + ': </b>' + '<br>' + value + '<br><br>';
                });
                $("#changelog").html(changelog || "-");
                showSuccess(languages.update_available + data.version);
            } else if (data.error) {
                showError(data.error);
            } else {
                $("#checkForUpdate").attr("disabled", false);
                showInfo(languages.already_latest_version + data.version);
            }
        })
        .catch(function() {
            $("#checkForUpdate").attr("disabled", false);
            showError();
        });
});

//ajax call to download the update
$("#downloadUpdate").on("click", function() {
    $(this).attr("disabled", true);

    $.ajax({
            url: "/download-update",
        })
        .done(function(data) {
            data = JSON.parse(data);
            $("#downloadUpdate").removeAttr("hidden");

            if (data.success) {
                showSuccess(languages.application_updated);
            } else if (data.error) {
                showError(data.error);
            } else {
                $("#downloadUpdate").attr("disabled", false);
                showError(languages.update_failed + data.error);
            }
        })
        .catch(function() {
            $("#downloadUpdate").attr("disabled", false);
            showError();
        });
});

//ajax call to download the update
$("#checkSignaling").on("click", function() {
    $("#checkSignaling").attr("disabled", true);

    $.ajax({
            url: "/check-signaling",
        })
        .done(function(data) {
            data = JSON.parse(data);
            $("#checkSignaling").attr("disabled", false);
            $("#status").html(data.status);

            if (data.status == "Running") {
                $("#status")
                    .removeClass("badge-danger")
                    .addClass("badge-success");
            } else {
                $("#status")
                    .removeClass("badge-success")
                    .addClass("badge-danger");
            }
        })
        .catch(function() {
            $("#checkSignaling").attr("disabled", false);
            showError();
        });
});

//ajax call to delete a meeting
$(".delete-meeting-admin").on("click", function() {
    if (!confirm(languages.confirmation)) return;
    let currentRow = $(this);
    currentRow.attr("disabled", true);

    let form = new FormData();
    form.append("id", currentRow.data("id"));

    $.ajax({
            url: "/delete-meeting-admin",
            data: form,
            type: "post",
            cache: false,
            contentType: false,
            processData: false,
        })
        .done(function(data) {
            data = JSON.parse(data);

            if (data.success) {
                currentRow.parent().parent().remove();
                showSuccess(languages.data_deleted);
            } else {
                showError(data.error);
            }
        })
        .catch(function() {
            currentRow.attr("disabled", false);
            showError();
        });
});

//ajax call to delete user
$(".delete-user").on("click", function() {
    if (!confirm(languages.confirmation)) return;
    let currentRow = $(this);
    currentRow.attr("disabled", true);

    let form = new FormData();
    form.append("id", currentRow.data("id"));

    $.ajax({
            url: "/delete-user",
            data: form,
            type: "post",
            cache: false,
            contentType: false,
            processData: false,
        })
        .done(function(data) {
            data = JSON.parse(data);

            if (data.success) {
                currentRow.parent().parent().remove();
                showSuccess(languages.data_deleted);
            } else {
                showError(data.error);
            }
        })
        .catch(function() {
            currentRow.attr("disabled", false);
            showError();
        });
});

//toggle password type
$("#togglePassword").on("click", function() {
    let el = $("input[name='password']");
    el.attr("type", el.attr("type") == "text" ? "password" : "text");
});

//generate random password
$("#generateRandomPassword").on("click", function() {
    let el = $("input[name='password']");
    el.val(Math.random().toString(36).substr(2, 9));
});

//ajax call to delete the language
$(".deleteLanguage").on("click", function() {
    if (confirm(languages.confirmation)) {
        let currentRow = $(this);
        currentRow.attr("disabled", true);

        let form = new FormData();
        form.append("id", currentRow.data("id"));

        $.ajax({
                url: "languages/delete",
                data: form,
                type: "post",
                cache: false,
                contentType: false,
                processData: false,
            })
            .done(function(data) {
                data = JSON.parse(data);

                if (data.success) {
                    currentRow.parent().parent().remove();
                    showSuccess(languages.data_deleted);
                } else {
                    showError(data.error);
                    currentRow.attr("disabled", false);
                }
            })
            .catch(function() {
                showError();
            });
    }
});

//ajax call to update user status
$(".plan-status").on("click", function() {
    let currentRow = $(this);
    let planId = currentRow.data("id");
    let checked = currentRow.is(":checked");

    currentRow.attr("disabled", true);

    $.ajax({
            url: "/update-plan-status",
            type: "post",
            data: {
                id: planId,
                checked: checked,
            },
        })
        .done(function(data) {
            data = JSON.parse(data);
            currentRow.attr("disabled", false);

            if (data.success) {
                showSuccess(languages.data_updated);
            } else {
                currentRow.prop("checked", true);
                showError(data.error);
            }
        })
        .catch(function() {
            currentRow.attr("disabled", false);
            showError();
        });
});

//ajax call to update user status
$(".tax-rate-status").on("click", function() {
    let currentRow = $(this);
    let taxRateId = currentRow.data("id");
    let checked = currentRow.is(":checked");

    currentRow.attr("disabled", true);

    $.ajax({
            url: "/update-tax-rates-status",
            type: "post",
            data: {
                id: taxRateId,
                checked: checked,
            },
        })
        .done(function(data) {
            data = JSON.parse(data);
            currentRow.attr("disabled", false);

            if (data.success) {
                showSuccess(languages.data_updated);
            } else {
                currentRow.prop("checked", true);
                showError(data.error);
            }
        })
        .catch(function() {
            currentRow.attr("disabled", false);
            showError();
        });
});

//toggle input type
if (document.querySelector('#form-coupon')) {
    document.querySelector('#i-type').addEventListener('change', function() {
        if (document.querySelector('#i-type').value == 1) {
            document.querySelector('#form-group-redeemable').classList.remove('d-none');
            document.querySelector('#form-group-discount').classList.add('d-none');
            document.querySelector('#i-percentage').setAttribute('disabled', 'disabled');
        } else {
            document.querySelector('#form-group-redeemable').classList.add('d-none');
            document.querySelector('#form-group-discount').classList.remove('d-none');
            document.querySelector('#i-percentage').removeAttribute('disabled');
        }
    });
}

//show tooltip
$(".info").tooltip();