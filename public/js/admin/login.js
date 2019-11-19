$("document").ready(() => {
  const form = $("#loggin_form");

  function tryParseJson(data) {
    try {
      const o = JSON.parse(data);
      
      if (o && typeof o === "object") {
        return o;
      }
    } catch (error) {
      
    }
    return false;
  }

  form.on("submit", function(e) {
    e.preventDefault();
    const user = $("#user").val();
    const password = $("#password").val();
    $("#response").html("");
    $.ajax({
      method:"POST",
      url:"./doLoggin",
      data: {user, password},
      success: (data) => {
        const response = tryParseJson(data);
        console.log(response);
        if(response) {
          $("#response").html(response.response);
        } else {
          location.href = "./index.php";
        }
      }
    })
  })
})