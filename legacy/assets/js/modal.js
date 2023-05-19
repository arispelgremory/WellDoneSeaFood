$(document).ready(() => {
  $(".img-cap").on("click", "span", function () {
    var name = "#Modal" + $(this).attr("id");
    $(name).addClass("open");
  });
  $(".modal-content .close").click(() => {
    $(".modal").removeClass("open");
  });
});
