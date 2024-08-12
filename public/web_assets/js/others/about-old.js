// start about tab show hide
$(function() {
  $('.column').css('color', '#ff9d00');
    $('.column:not(:first)').hide(); // Hide all columns except the first
    setInterval(showColumn, 5000); // Start the periodic calls (5 secs)
});

var colIndex = 1;

function showColumn() {
// $('#column1').parent().addClass('primary_color');
    colIndex = (colIndex % 2) + 1; // Next index with cycling
    $('.column').fadeOut(600).css('color', 'white').parent().removeClass('primary_color col_fadeInUp').addClass('col_fadeInDown').find('h3 span img').attr("src", "asset/images/about/other/round_unact.png"); // Hide current ones
    $('#column' + colIndex).fadeIn(1000).css('color', '#ff9d00').parent().addClass('primary_color col_fadeInUp').removeClass('col_fadeInDown').find('h3 span img').attr("src", "asset/images/about/other/round_act.png"); // Show next one

    // $('.column').fadeOut(600).css('color', 'white').parent().removeClass('primary_color col_fadeInUp').addClass('col_fadedown').find('h3 span img').attr("src", "asset/images/about/other/round_unact.png"); // Hide current ones
    // $('#column' + colIndex).fadeIn(1000).css('color', '#ff9d00').parent().addClass('primary_color col_fadeInUp').removeClass('col_fadedown').find('h3 span img').attr("src", "asset/images/about/other/round_act.png"); // Show next one

}
// end about tab show hide

// start chef details
let chef_json_data = [
    {
        "id" : 1,
        "chefprofile":"chef.png",
        "chef_name":"Breeza Quix - ",
        "chef_position":"Head Chef",
        "chef_para":"Hey! I'm Breez Quix. I am the head chef of Let's Dine. I have been a food connoisseur since the age of 23. Advanced culinary techniques and team management are my areas of specialty. I am well-versed in preparing Indian and Mexican dishes. I look forward to delighting you with my dishes.",
        "flex_direction":"me-auto",
        "profile_position":"order-first",
        "chef_bg_shadow":"chef_shadow_left",


    },
    {
        "id" : 2,
        "chefprofile":"chef.png",
        "chef_name":"Breeza Quix - ",
        "chef_position":"Head Chef",
        "chef_para":"Hey! I'm Breez Quix. I am the head chef of Let's Dine. I have been a food connoisseur since the age of 23. Advanced culinary techniques and team management are my areas of specialty. I am well-versed in preparing Indian and Mexican dishes. I look forward to delighting you with my dishes.",
        "flex_direction":"ms-auto",
        "profile_position":"order-md-1",
        "chef_bg_shadow":"chef_shadow_right",
    },
    {
        "id" : 3,
        "chefprofile":"chef.png",
        "chef_name":"Breeza Quix - ",
        "chef_position":"Head Chef",
        "chef_para":"Hey! I'm Breez Quix. I am the head chef of Let's Dine. I have been a food connoisseur since the age of 23. Advanced culinary techniques and team management are my areas of specialty. I am well-versed in preparing Indian and Mexican dishes. I look forward to delighting you with my dishes.",
        "flex_direction":"me-auto",
        "profile_position":"order-first",
        "chef_bg_shadow":"chef_shadow_left",
    },
    {
        "id" : 4,
        "chefprofile":"chef.png",
        "chef_name":"Breeza Quix - ",
        "chef_position":"Head Chef",
        "chef_para":"Hey! I'm Breez Quix. I am the head chef of Let's Dine. I have been a food connoisseur since the age of 23. Advanced culinary techniques and team management are my areas of specialty. I am well-versed in preparing Indian and Mexican dishes. I look forward to delighting you with my dishes.",
        "flex_direction":"ms-auto",
        "profile_position":"order-md-1",
        "chef_bg_shadow":"chef_shadow_right",
    },
  ];

    let chef_data = chef_json_data.map(function(data){
      return `
      <!-- start column  -->
      <div class="col-lg-8 mb-5 ${data.flex_direction}">
        <div class="">
          <!-- Row -->
          <div class="row g-0">
            <div class="col-md-4 ${data.profile_position}" style="">
              <div style="margin: 0 auto;display: table;">
                <img src="asset/images/about/other/${data.chefprofile}" class="img-fluid w-100"/>
              </div>
            </div>
            <div class="col-md-8 align-self-center">
              <div class="chef_details ${data.chef_bg_shadow}">
                <h3 class="mb-3">
                  <span class="chef_name primary_color">${data.chef_name}</span>
                  <span class="cheff_position">${data.chef_position}</span>
                </h3>
                <p>${data.chef_para}</p>
              </div>
            </div>
          </div>
          <!-- Row -->
        </div>
      </div>
      <!-- end column  -->
      `;
      });

    // $('#feedback_data').append(cutstomerfb_data);
    document.getElementById('chef_profile_list').innerHTML = chef_data.join('');
