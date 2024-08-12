/*================================================================================ */
// dynamic copyright year
// document.getElementById("year").innerHTML = new Date().getFullYear();
/*================================================================================ */
// rsnform_box
let seatCount;
function reservenowSiderForm() {
    $(".set_rsnform_box").html(`
        <div class="">
        <div class="rsnform_box-inner pos_relative ">
          <div class="side_tree">
            <img src="${root_path}/images/others/empty_tee.png" class="img-fluid tree_img" alt="" />
          </div>
          <svg width="40px" height="40px" viewBox="0 0 40 40" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"  class="rsnow_close">
          <!-- Generator: Sketch 47.1 (45422) - http://www.bohemiancoding.com/sketch -->
          <title>close</title>
          <desc>Created with Sketch.</desc>
          <defs/>
          <g id="Assets" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
              <g id="close" fill-rule="nonzero" fill="#FFFFFF">
                  <g id="cancel" transform="translate(2.000000, 2.000000)">
                      <path fill="#ff9d00"  d="M18,0 C8.05884677,0 0,8.05884677 0,18 C0,27.9411532 8.05884677,36 18,36 C27.9411532,36 36,27.9411532 36,18 C35.9884597,8.0636371 27.9363629,0.0115403226 18,0 Z M18,34.8387097 C8.70024194,34.8387097 1.16129032,27.2997581 1.16129032,18 C1.16129032,8.70024194 8.70024194,1.16129032 18,1.16129032 C27.2997581,1.16129032 34.8387097,8.70024194 34.8387097,18 C34.8284758,27.2955484 27.2955484,34.8284758 18,34.8387097 Z" id="Shape"/>
                      <path fill="#ff9d00"  d="M26.2114839,9.78851613 C25.9847419,9.56184677 25.6171935,9.56184677 25.3904516,9.78851613 L18,17.1789677 L10.6095484,9.78851613 C10.3867984,9.55785484 10.0191774,9.55146774 9.78851613,9.77421774 C9.55785484,9.99696774 9.55146774,10.3645887 9.77421774,10.59525 C9.7788629,10.6001129 9.78365323,10.6048306 9.78851613,10.6095484 L17.1789677,18 L9.78851613,25.3904516 C9.55785484,25.6132742 9.55146774,25.9808226 9.77429032,26.2114839 C9.9971129,26.4421452 10.3646613,26.4485323 10.5953226,26.2257097 C10.6001855,26.2210645 10.6049032,26.2162742 10.6095484,26.2114839 L18,18.8210323 L25.3904516,26.2114839 C25.6211129,26.4343065 25.9886613,26.4279194 26.2114839,26.1972581 C26.4288629,25.9722581 26.4288629,25.6154516 26.2114839,25.3904516 L18.8210323,18 L26.2114839,10.6095484 C26.4381532,10.3828065 26.4381532,10.0152581 26.2114839,9.78851613 Z" id="Shape"/>
                  </g>
              </g>
          </g>
          </svg>
          <div class="col-xxl-7 col-xl-7 col-lg-7 col-md-12 col-sm-12" id="fnl_msg">
            <div id="first_frm">
              <h4>Let us serve you better</h4>
              <p>Skip the queue. Reserve your table with us now and give your tummy a yummy treat.</p>
              <form class="" id="reserve_now">
                <div class="row">
                  <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-4 col-sm-12 field_mt">
                    <label class="lbl-mb" for="location">Locations</label>
                    <select id="location" name="location" class="form-select cus_formselect_control" >
                      <option>Select location</option>
                    </select>
                    <p class="error"></p>
                  </div>
                  <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-4 col-sm-12 field_mt">
                    <label class="lbl-mb" for="seats">Available</label>
                    <input type="text" class="form-control cus_forminput_control" value="0" id="available" readonly name="available" placeholder="Available seats" >
                    <p class="error"></p>
                  </div>
                    <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-4 col-sm-12 field_mt">
                        <label class="lbl-mb" for="seats">Seats</label>
                        <input type="text" class="form-control cus_forminput_control" id="seats" name="seats" placeholder="enter your seats" >
                        <p class="error"></p>
                    </div>
                </div>
                <div class="row mt-4">
                  <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-12 field_mt">
                    <div class="d-flex align-items-center lbl-mb">
                      <label class="me-2" for="date">Date</label>
                      <div>
                      <button type="button" class="btn lablel_btn btn-sm border_active_btn me-2 today target">Today</button>
                      <button type="button" class="btn lablel_btn btn-sm border_active_btn tomorrow target">Tomorrow</button>
                      </div>
                    </div>
                    <input type="text" id="seatDate" name="booking_date" class="form-select cus_formselect_control" >
                    <p class="error"></p>
                  </div>
                  <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-12 field_mt">
                    <div class="d-flex align-items-center lbl-mb">
                      <label class="me-2" for="date">Time</label>
                      <div>
                        <button type="button" class="btn lablel_btn btn-sm border_active_btn me-2 target" id="lunchBtn">Lunch</button>
                        <button type="button" class="btn lablel_btn btn-sm border_active_btn target" id="dinnerBtn">Dinner</button>
                      </div>
                    </div>
                    <input type="text" name="booking_time" id="seat_time" class="form-select cus_formselect_control"  >
                    <p class="error"></p>
                  </div>
                </div>
                <div class="row mt-4">
                  <div class="col-xxl-8 col-xl-8 col-lg-8 col-md-8 col-sm-12 field_mt">
                    <label class="lbl-mb " for="any">Like to Customize anything?</label>
                    <select name="special" id="timing" class="form-select cus_formselect_control">
                      <option selected>Select Time</option>
                      <option value="1">1</option>
                      <option value="2">2</option>
                      <option value="3">3</option>
                      <option value="4">4</option>
                    </select>
                    <p class="error"></p>
                  </div>
                  <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-4 col-sm-12 field_mt align-self-start">
                    <label class="lbl-mb" for=""></label>
                    <button type="button" class="btn common_btn common_btn_center border_active_btn" id="reserve">Reserve</button>
                  </div>
                </div>
              </form>
            </div>
            <div class="anim_txt">
              <div id="frm2">
                <h4>Let us serve you better</h4>
                <p>Skip the queue. Reserve your table with us now and give your tummy a yummy treat.</p>
                <div class="mt-md-mt-5 mt-4">Name</div>
                  <input type="text" class="form-control cus_input email mt-3" placeholder="Type here" id="userName" name="name" required>
                <div class="mt-md-mt-5 mt-4">Email or Mobile Number </div>
                  <input type="text" class="form-control cus_input email mt-3" placeholder="Type here" id="userEmail" name="email_or_phone" required>
                  <div class='mt-md-mt-5 mt-4 otp_dnon'>
                    <label>Enter OTP </lable>
                      <div class='mt-md-mt-4 mt-3'>
                        <input class='otp_inputs' type='text' maxlength='1' id="otp1" />
                        <input class='otp_inputs' type='text' maxlength='1' id="otp2" />
                        <input class='otp_inputs' type='text' maxlength='1' id="otp3" />
                        <input class='otp_inputs' type='text' maxlength='1' id="otp4"/>
                      </div>
                      <div class="otp-required"></div>
                  </div>
                  <button type="submit" data-btnState="booking" class="btn common_btn common_btn_center mt-md-5 mt-5 otp_btn float-xl-end" id="getOtp">GET OTP
                    <div class="loader"></div>
                  </button>
              </div>
            </div>
          </div>
        </div>
      </div>
    `);
    $.ajax({
        url: `${route_path}/api/v1/banners/branch_Details`,
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
        method: "GET",
        dataType: "json",
        async: "true",
    })
        .then((res) => {
            console.log(res);
            let location = res.map((locations) => {
                console.log(locations);
                return `<option value="${locations.id}+${locations.name}">${locations.name}</option>`;
            });
            $("#location").append(location);
            let stored_data = JSON.parse(localStorage.getItem("reserve"));
            if (stored_data && stored_data.location != "") {
                console.log("location, ", stored_data.location);
                $("#location").val(stored_data.location);
                $("#seats").val(stored_data.seats);
                $("#timing").val(stored_data.special);
                console.log("kewin" ,$("#location").val());

                if (halfValidate()) {
                    console.log(halfValidate())
                    data();
                }
            }
        })
        .fail((jqXHR, textStatus, errorThrown) => {
            console.error("Error: " + textStatus + " - " + errorThrown);
        });
    $(document).ready(function () {
        var today = new Date().toISOString().split("T")[0];
        var tomorrow = new Date();
        tomorrow.setDate(tomorrow.getDate() + 1);
        // today and tomorrow
        $('input[name="booking_date"]').val(today);
        $(".today").on("click", function () {
            var today = new Date().toISOString().split("T")[0];
            $('input[name="booking_date"]').val(formatDate(today));
            if (halfValidate()) {
                data();
            }
        });
        $(".tomorrow").on("click", function () {
            var tomorrow = new Date();
            tomorrow.setDate(tomorrow.getDate() + 1);
            var tomorrowDate = tomorrow.toISOString().split("T")[0];
            $('input[name="booking_date"]').val(formatDate(tomorrowDate));
            if (halfValidate()) {
                data();
            }
        });
        //lunch and dinner
        $("#lunchBtn").on("click", function () {
            var lunch = "13:00";
            $("#seat_time").val(lunch);
            if (halfValidate()) {
                data();
            }
        });
        $("#dinnerBtn").on("click", function () {
            var dinner = "19:00";
            $("#seat_time").val(dinner);
            if (halfValidate()) {
                data();
            }
        });
        function formatDate(dateString) {
            var dateParts = dateString.split("-");
            var day = dateParts[2];
            var month = dateParts[1];
            var year = dateParts[0];
            return day + "-" + month + "-" + year;
        }
        const seatTimeFP = flatpickr("#seat_time", {
            enableTime: true,
            noCalendar: true,
            dateFormat: "H:i",
            time_24hr: true,
            // defaultHour:11,
            // defaultMinute:0,
            // defaultDate: "13:45",
            // defaultDate: "now",
            defaultDate: new Date(),
            defaultHour: new Date().getHours(),
            defaultMinute: new Date().getMinutes(),
            // defaultSeconds: 0,
            // defaultMsec: 0,
            theme: "light",
            mode: "single",
        });
        flatpickr("#seatDate", {
            dateFormat: "d-m-Y",
            defaultDate: "today",
            theme: "light",
            minDate: "today",
        });
        const seattime_width = $("#seat_time").outerWidth(true);
        $(".flatpickr-calendar").css("width", seattime_width + "px");
    });
}
reservenowSiderForm();
//inside screens for reserve now form slider
function reserveformAnim() {
    var anpair = $(".anim_txt").closest("#fnl_msg");
    if (anpair.hasClass()) {
        $("#fnl_msg").addClass("animparent");
        anpair.removeClass("animparent");
    } else {
        anpair.addClass("animparent");
    }
}
/*================================================================================ */
// start javasscript scroll animation
jQuery(function ($) {
    // Function which adds the 'animated' class to any '.animatable' in view
    var doAnimations = function () {
        // Calc current offset and get all animatables
        var offset = $(window).scrollTop() + $(window).height(),
            $animatables = $(".animatable");
        // Unbind scroll handler if we have no animatables
        if ($animatables.length == 0) {
            $(window).off("scroll", doAnimations);
        }
        // Check all animatables and animate them if necessary
        $animatables.each(function (i) {
            var $animatable = $(this);
            if ($animatable.offset().top + $animatable.height() - 20 < offset) {
                $animatable.removeClass("animatable").addClass("animated");
            }
        });
    };
    // Hook doAnimations on scroll, and trigger a scroll
    $(window).on("scroll", doAnimations);
    $(window).trigger("scroll");
});
// home page our spacial menu card overlay
$("body").on("click", ".info_n_close_btn", function () {
    var x = $(this).closest(".special_one");
    if (x.hasClass("moreDetails")) {
        x.removeClass("moreDetails");
    } else {
        $(".special_one").removeClass("moreDetails");
        x.addClass("moreDetails");
    }
});
/*================================================================================ */
// while touch body close the nav bar
$(function () {
    $(document).click(function (event) {
        var clickover = $(event.target);
        var _opened = $(".navbar-collapse").hasClass(
            "navbar-collapse nav-list collapse show"
        );
        if (_opened === true && !clickover.hasClass("navbar-toggler")) {
            $("button.navbar-toggler").click();
        }
    });
});
/*================================================================================ */
/*=========================== */
const halfValidate = () => {
    console.log("firsst");
    let dateSelect = $("#seatDate");
    let locationSelect = $("#location");
    let timeSelect = $("#seat_time");
    let fieldRequired = "Field is Required";
    if (dateSelect.val() == "") {
        dateSelect.on("input", function () {
            let seatDate = $(this).val(),
                seatDateError = $(this).next(".error");
            if (seatDate === "") {
                seatDateError.text(fieldRequired).css("opacity", "1");
            } else {
                seatDateError.css("opacity", "0");
            }
        });
    }
    locationSelect.on("change", function () {
        let errorElement = locationSelect.next(".error");
        errorElement
            .text(fieldRequired)
            .css(
                "opacity",
                locationSelect.val() !== "Select location" ? "0" : "1"
            );
    });
    if (timeSelect.val() == "") {
        timeSelect.on("input", function () {
            let seatDate = $(this).val(),
                seatDateError = $(this).next(".error");
            if (seatDate === "") {
                seatDateError.text(fieldRequired).css("opacity", "1");
            } else {
                seatDateError.css("opacity", "0");
            }
        });
    }
    if (locationSelect && dateSelect && timeSelect != "" ) {
        console.log("null?",locationSelect.val())
        return true;
    } else {
        return false;
    }
};
function validateForm() {
    let fnval = halfValidate();
    let noRegEp = /^[0-9]*$/,
        enterValidNo = "Enter Valid Number",
        fieldRequired = "Field is Required",
        seatCheck = "Invalid seat";
    let seatsInput = $("#seats");
    let timingSelect = $("#timing");
    seatsInput.on("input", function () {
        let myTx = seatsInput.val();
        let errorElement = seatsInput.next(".error");
        if (noRegEp.test(myTx) || myTx === "") {
            errorElement.css("opacity", "0");
        }
        else {
            errorElement.text(enterValidNo).css("opacity", "1");
        }
        if (myTx === "" ) {
            errorElement.css("opacity", "1").text(fieldRequired);
        } else if(myTx > seatCount){
            errorElement.css("opacity", "1").text(seatCheck);
        }
    });
    timingSelect.on("change", function () {
        let errorElement = timingSelect.next(".error");
        errorElement
            .text(fieldRequired)
            .css("opacity", timingSelect.val() !== "Select Time" ? "0" : "1");
    });
    let seatsErrorElement = seatsInput.next(".error");
    let timingErrorElement = timingSelect.next(".error");
    if (
        seatsErrorElement.css("opacity") === "0" &&
        timingErrorElement.css("opacity") === "0"
    ) {
        $("#first_frm").hide();
        $("#frm2").show();
        reserveformAnim();
    }
}
validateForm();
const data = () => {
    const loc = $("#location").val();
    const values = loc.split("+");
    const location = {
        id: values[0],
        name: values[1],
    };
    console.log(location.id,location.name)
    const date = $("#seatDate").val();
    const time = $("#seat_time").val();
    console.log(loc, date, time);
    const jsonData = {
        location: location.name,
        branch_id: location.id,
        booking_date: date,
        booking_time: time,
    };
    $.ajax({
        url: `${route_path}/api/v1/banners/branch_seat_show`,
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
        method: "POST",
        data: jsonData,
        success: function (response) {
            console.log(response);
            seatCount = response.balance_seat;
            if (seatCount === undefined || null) {
                seatCount = 0
                $("#available").val(seatCount);
            }
            console.log(seatCount);
            var availableSeats = $("#available").val();
            $("#available").val(seatCount);
        },
        error: function (jqXHR, textStatus, errorThrown) {
            console.error("Error: " + textStatus + " - " + errorThrown + jqXHR);
        },
    });
};
$("#location,#seatDate,#seat_time").on("change", function () {
    console.log(halfValidate());
    if (halfValidate()) {
        console.log("sseconmd");
        data();
    }
});
$(document).ready(function () {
    $("#frm2").hide();
    $("body").on("click", ".reservenow,.rsnow_close", function () {
        var x = $(".rsnform_box-inner").closest(".rsnform_box");
        if (x.hasClass("boxslide")) {
            $(".rsnform_box").show();
            x.removeClass("boxslide");
            $("html").removeClass("reserve_now_scroll");
        } else {
            $(".rsnform_box").removeClass("boxslide");
            x.addClass("boxslide");
            $("html").addClass("reserve_now_scroll");
        }
    });
    $("body").on("click", "#reserve", function () {
        let noRegEp = /^[0-9]*$/,
        enterValidNo = "Enter Valid Number",
        fiedRequired = "Field is Required",
        seatsTx = $("#seats").val(),
        mySeatsThis = $("#seats").next(".error"),
        locLogic = $("#location").val() !== "Select location",
        timLogic = $("#timing").val() !== "Select Time";
    console.log(seatsTx);
    let seatsTxTest = noRegEp.test(seatsTx) || seatsTx == "";
    if (seatsTxTest) {
        mySeatsThis.css("opacity", "0");
    } else if (noRegEp.test(seatsTx)) {
        mySeatsThis.text(enterValidNo).css("opacity", "1");
    }
    if (seatsTx == "") {
        mySeatsThis.css("opacity", "1").text(fiedRequired);
    } else if (seatsTx > seatCount) {
        console.log(seatsTx, seatCount);
        mySeatsThis
            .css("opacity", "1")
            .text("Available Seats " + seatCount);
    }
    $("#location")
        .next(".error")
        .text(fiedRequired)
        .css("opacity", locLogic ? "0" : "1");
    $("#timing")
        .next(".error")
        .text(fiedRequired)
        .css("opacity", timLogic ? "0" : "1");
    let myLogic =
        seatsTx !== "" &&
        noRegEp.test(seatsTx) &&
        locLogic &&
        timLogic &&
        seatsTx <= seatCount;
        if (myLogic) {
            var loc = $("#location").val();
            var values = loc.split("+");
            var location = {
                id: values[0],
                name: values[1],
            };
            console.log("Mylogic",location.name,location.id)
            const jsonObject = {
                location: loc,
                branch_id: location.id,
                booking_date: $("#seatDate").val(),
                booking_time: $("#seat_time").val(),
                seats: $("#seats").val(),
                special: $("#timing").val(),
                available: $("#available").val()
            }
            const jsonString = JSON.stringify(jsonObject);
            // {"location":"Nero+Mcfarland","available":"60","seats":"40","booking_date":"15-09-2023","booking_time":"13:00","special":"1"}
        // var formDatas = $("#reserve_now").serialize();
        // localStorage.setItem("formDatas", formDatas);
        // console.log(formDatas);
        // var query = formDatas;
        // var params = query.split("&");
        // var json = {};
        // params.forEach(function (param) {
        //     var keyValue = param.split("=");
        //     var key = decodeURIComponent(keyValue[0]);
        //     var value = decodeURIComponent(keyValue[1]);
        //     json[key] = value;
        // });
        // var jsonString = JSON.stringify(json);
        localStorage.setItem("reserve", jsonString);
        console.log(jsonString);
        $("#first_frm").hide();
          $("#frm2").show();
          reserveformAnim();
        }
      });
    $("body").on("input", ".otp_inputs", function () {
        if (this.value.length == this.maxLength) {
            $(this).next(".otp_inputs").focus();
        }
    });
});
$(document).ready(function () {
    var datas = localStorage.getItem("reserve");
    if (datas) {
        // var formDataObject = {};
        // datas.split("&").forEach(function (param) {
        //     var keyValue = param.split("=");
        //     var key = decodeURIComponent(keyValue[0]);
        //     var value = decodeURIComponent(keyValue[1]);
        //     formDataObject[key] = value;
        // });
        // for (var fieldName in formDataObject) {
        //     var fieldValue = formDataObject[fieldName];
        //     $('[name="' + fieldName + '"]').val(fieldValue);
        // }
        const parsedData = JSON.parse(datas);
        console.log(parsedData)
    // $("#location").val(parsedData.location);
    // $('#location select option[value="' + parsedData.location + '"]').prop('selected', true);

    }
});
var validationRules = {
    userName: {
        required: true,
        errorMessage: "Please enter your name.",
        regex: /^[a-zA-Z\s]+$/,
    },
    userEmail: {
        required: true,
        errorMessage: "Please enter a valid email address or phone number.",
    },
};
$("#userName, #userEmail").on("keyup", function () {
    var field = $(this).attr("id");
    $("#" + field)
        .next(".error-message")
        .remove();
    var value = $("#" + field)
        .val()
        .trim();
    var rules = validationRules[field];
    if (field === "userName") {
        var value = $("#" + field)
            .val()
            .trim();
        var rules = validationRules[field];
        if (rules.required && value !== "" && !rules.regex.test(value)) {
            $("#" + field).after(
                '<div class="error-message">' + rules.errorMessage + "</div>"
            );
        }
    }
    if (field === "userEmail") {
        // Check if the input contains "@" to determine if it's an email
        var isEmail = value.includes("@");
        if (rules.required && value !== "") {
            if (isEmail && !/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(value)) {
                $("#" + field).after(
                    '<div class="error-message">' +
                        rules.errorMessage +
                        "</div>"
                );
            } else if (
                !isEmail &&
                (!/^[0-9]+$/.test(value) || value.length !== 10)
            ) {
                $("#" + field).after(
                    '<div class="error-message">' +
                        rules.errorMessage +
                        "</div>"
                );
            }
        }
    }
});
$(".otp_btn").on("click", function () {
    var url =
        $(".otp_btn").attr("data-btnState") === "booking"
            ? `${route_path}/admin/store-booking`
            : `${route_path}/admin/otp-store`;
    var name = $("#userName").val().trim();
    var email_or_phone = $("#userEmail").val().trim();
    var hasErrors = false;
    Object.keys(validationRules).forEach(function (field) {
        var value = $("#" + field)
            .val()
            .trim();
        var rules = validationRules[field];
        $("#" + field)
            .next(".error-message")
            .remove(); // Remove existing error message
        if (rules.required && value === "") {
            $("#" + field).after(
                '<div class="error-message">' + rules.errorMessage + "</div>"
            ); // Append error message
            hasErrors = true;
        } else if (
            field === "userEmail" &&
            rules.regex &&
            value !== "" &&
            !rules.regex.test(value)
        ) {
            $("#" + field).after(
                '<div class="error-message">' + rules.errorMessage + "</div>"
            ); // Append error message
            hasErrors = true;
        }
    });
    if (hasErrors) {
        return;
    } else {
        // $(".otp_btn").hide();
        $(".loader").css("display", "block");
        $("#fnl_msg").removeClass("animparent");
        $(".otp_dnon").removeClass("otp_dnon").hide().fadeIn();
        setTimeout(function () {
            $(".loader").css("display", "none");
            var divElement = $('<div class="loader"></div>');
            $(".otp_btn")
                .addClass(".rsnsubmit")
                .text("Submit")
                .removeClass("otp_btn")
                .append(divElement)
                .show();
        }, 2000);
        reserveformAnim();
    }
    let jsonString = localStorage.getItem("reserve");
    console.log(jsonString,"gettting data")
    var jsonData = JSON.parse(jsonString);

// Change the value of the "location" property to "location.name"
if (jsonData.location) {
    jsonData.location = jsonData.location.split("+")[1];
}

// Convert the modified object back to a JSON string
jsonString = JSON.stringify(jsonData);
console.log(jsonString,"the data code");
    var json = jsonString ? JSON.parse(jsonString) : {};
    json.name = $("#userName").val().trim();
    json.email_or_phone = $("#userEmail").val().trim();
    jsonString = JSON.stringify(json);
    console.log(jsonString,"BEFORE PARSE")
    localStorage.setItem("reserve", jsonString);
    // console.log(jsonString);
    var parsedJson = JSON.parse(jsonString);
    console.log(parsedJson)
    var emailOrPhoneJson = { email_or_phone: parsedJson.email_or_phone };
    otp1 = $("#otp1").val();
    otp2 = $("#otp2").val();
    otp3 = $("#otp3").val();
    otp4 = $("#otp4").val();
    var otp = otp1 + otp2 + otp3 + otp4;
    combinedJson = {
        email_or_phone: emailOrPhoneJson.email_or_phone,
        otp: otp,
    };
    var request;
    if (url === `${route_path}/admin/store-booking`) {
        request = reqHandler(jsonString, "post", url);
        request
            .then(function (response) {
                console.log(response);
                $(".otp_btn").attr("data-btnState", "booking");
            })
            .catch(function (err) {
                console.log(err);
            });
    } else if (url === `${route_path}/admin/otp-store`) {
        // Hide error messages for elements with the class 'otp-required'
        $(".otp-required").next(".error-message").hide();
        let verification = jsonString
        console.log("verification",verification)
        jsonString = JSON.stringify(combinedJson);
        request = reqHandler(jsonString, "post", url);
        request
            .then(function (response) {
                console.log(response);
                //thankmsg
                // $(".rsnsubmit").hide();
                $(".loader").css("display", "block");
                setTimeout(function () {
                    $(".loader").css("display", "none");
                    $("#first_frm").hide();
                    $(".tree_img")
                        .attr(
                            "src",
                            `${root_path}/images/others/reserved_tree.png`
                        )
                        .hide()
                        .fadeIn(1500);
                    $("#fnl_msg").removeClass("animparent");
                    var thankmsg =
                        "<div class='text-center anim_txt'><h4>Enjoy! your meal with us</h4><h3 class='primary_color'>Thank You</h3></div>";
                    $("#fnl_msg").html(thankmsg).hide().fadeIn();
                    reserveformAnim();
                    localStorage.removeItem("reserve");
                    localStorage.removeItem("formDatas");
                }, 2000);
            })
            .catch(function (err) {
                console.log(err.responseJSON);
                $(".otp-required").after(
                    '<div class="error-message">' +
                        err.responseJSON.msg +
                        "</div>"
                );
            });
    }
});
const otpInputs = document.querySelectorAll(".otp_inputs");
otpInputs.forEach((input) => {
    input.addEventListener("input", function (event) {
        const inputValue = this.value;
        if (!/^[0-9 && A-Z]+$/.test(inputValue)) {
            this.value = "";
        }
        if (event.inputType === "deleteContentBackward" && this.value === "") {
            const previousInput = this.previousElementSibling;
            if (previousInput) {
                previousInput.focus();
            }
        }
    });
    input.addEventListener("keydown", function (event) {
        if (event.key === "Backspace" && this.value === "") {
            const previousInput = this.previousElementSibling;
            if (previousInput) {
                previousInput.value = "";
                previousInput.focus();
            }
        }
    });
});
var combinedJson;
var otp1, otp2, otp3, otp4;
