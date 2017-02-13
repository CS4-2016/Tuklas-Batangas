$(document).ready(function() {
  $("#showPassword").click(function() {
    if ($(".tuklasbatangas-password").attr("type") == "password") {
        $(".tuklasbatangas-password").attr("type", "text");
        $(".show-off").attr("class", "fa fa-eye show-on");
    } 
    else {
        $(".tuklasbatangas-password").attr("type", "password");
        $(".show-on").attr("class", "fa fa-eye show-off");
    }
  });
    
    $("#showPassword2").click(function() {
    if ($(".tuklasbatangas-password2").attr("type") == "password") {
        $(".tuklasbatangas-password2").attr("type", "text");
        $(".show-off2").attr("class", "fa fa-eye show-on2");
    } 
    else {
        $(".tuklasbatangas-password2").attr("type", "password");
        $(".show-on2").attr("class", "fa fa-eye show-off2");
    }
  });
    
    $("#showPassword3").click(function() {
    if ($(".tuklasbatangas-password3").attr("type") == "password") {
        $(".tuklasbatangas-password3").attr("type", "text");
        $(".show-off3").attr("class", "fa fa-eye show-on3");
    } 
    else {
        $(".tuklasbatangas-password3").attr("type", "password");
        $(".show-on3").attr("class", "fa fa-eye show-off3");
    }
  });
});

