$.ajax({
  url: `${route_path}/api/v1/branch/`,
  headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
  method: 'GET',
  dataType: 'json',
  async: 'true'
})
  .then((data) => {
    const branches = data.map((branch, index) => {  
        $(".branchName").append(`<div class="col-md-4">
        <div class="get_touch_info">
          <img src="${root_path}/images/logo/sms.png" class="img-fluid get_toch_logo me-2"/>
          <div class="get_touch">${branch.email}</div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="get_touch_info">
          <img src="${root_path}/images/logo/phone.png" class="img-fluid get_toch_logo me-2"/>
          <div class="get_touch">${branch.phone}</div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="get_touch_info">
          <img src="${root_path}/images/logo/location.png" class="img-fluid get_toch_logo me-2"/>
          <div class="get_touch">${branch.address}</div>
        </div>
      </div>` );
    })
    // $("#contact").append(branches);
  })
  .fail((jqXHR, textStatus, errorThrown) => {s
    console.log('Error: ' + textStatus + ' - ' + errorThrown);
  });
