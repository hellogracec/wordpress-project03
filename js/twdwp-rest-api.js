// ** Modal Window
jQuery(document).ready(function($) {
  // Open Modal Window
  $(".open-modal").click(function(e) {
    e.preventDefault();
    var api_ID = $(this).data("id");
    $.ajax({
      type: "GET",
      url: rest_object.api_url + "posts/" + api_ID,
      dataType: "json",
      success: function(data) {
        $("#modal-window-content").html(
          "<h1>" +
            data["title"]["rendered"] +
            "</h1>" +
            data["content"]["rendered"]
        );
        $("#modal-window").fadeIn();
        $("#dimmer").fadeIn();
      }
    });
  });

  // Close Modal Window
  $(".close-modal, #dimmer").click(function() {
    $("#modal-window").fadeOut();
    $("#dimmer").fadeOut();
  });
});
