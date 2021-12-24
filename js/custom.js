function acall() {
  $(".loader").css("display", "block");
  $("#main").animate(
    {
      opacity: "0",
    },
    500
  );
}


function acut() {
  $(".loader").css("display", "none");
  $("#main").animate(
    {
      opacity: "1",
    },
    500
  );
}

function ajax_start() {
  $(".loader").css("display", "block");
  $("#main").animate(
    {
      opacity: "0",
    },
    500
  );
}

function ajax_complete() {
  setTimeout(() => {
    $(".loader").css("display", "none");
    $("#main").animate(
      {
        opacity: "1",
      },
      500
    );
  }, 1500);
}

function pload() {
  $(".loader").css("display", "none");
  $("#main").animate(
    {
      opacity: "1",
    },
    500
  );
}
