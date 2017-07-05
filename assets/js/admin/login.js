
$(function () {
    $("#loginButton").click(function(event){
        event.preventDefault();
      var e = $("#emailForm").val()
      var p = $("#passwordForm").val()
      sendingLoginRequest(e, p)
    })
})

function sendingLoginRequest(e, p) {
  var options = {excludeAvailableScreenResolution: true, excludeScreenResolution: true};
  new Fingerprint2(options).get(function(result){
      devicekey = result;
      $.ajax({
          url: "../admin/LoginAPI/loginAttemptUser",
          type: "POST",
          datatype: JSON,
          data: {
              l : true,
              d : {
                email : e,
                passwd : p,
                dk : devicekey
              }
          },
          success: function(result) {
            console.log(result)
          }
      });
    });
}