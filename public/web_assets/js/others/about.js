// start about tab show hide
$(function() {
  $('.column').css('color', '#ff9d00');
    $('.column:not(:first)').fadeOut(); // Hide all columns except the first
    setInterval(showColumn, 5000); // Start the periodic calls (5 secs)
});

var colIndex = 1;

function showColumn() {
// $('#column1').parent().addClass('primary_color');
    colIndex = (colIndex % 2) + 1; // Next index with cycling
    $('.column').fadeOut(2500).css('color', 'white').parent().removeClass('primary_color col_fadeInUp').addClass('col_fadeInDown h-0').find('h3 span img').attr("src", root_path+"/images/about/other/round_unact.png"); // Hide current ones
    $('#column' + colIndex).fadeIn(2500).css('color', '#ff9d00').parent().addClass('primary_color col_fadeInUp ').removeClass('col_fadeInDown h-0').find('h3 span img').attr("src", root_path+"/images/about/other/round_act.png"); // Show next one
}
// window resize for mobile animation in chef card
       $(window).on("resize", function () {
        if($(window).width() <= 767.5){
          $('.mbv_anim_sec').addClass('animatable fadeInUp');
          $('.mbv_anim_sec').removeClass('fadeInLeft fadeInRight');
        }
    }).resize();

