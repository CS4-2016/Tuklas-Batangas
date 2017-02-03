$(document).ready(function() {
  $("#showPassword").click(function() {
    if ($(".regis-password").attr("type") == "password") {
        $(".regis-password").attr("type", "text");
        $(".show-off").attr("class", "fa fa-eye show-on");
    } else {
        $(".regis-password").attr("type", "password");
        $(".show-on").attr("class", "fa fa-eye show-off");
    }
  });
});
