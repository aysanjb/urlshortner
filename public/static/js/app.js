$(document).ready(function () {
    $("#url").focus();
    $("#shrinkedurl").select();
});


// Tooltip

$('#shrinkedbtn').tooltip({
  trigger: 'click',
  placement: 'bottom'
});

function setTooltip(message) {
  $('#shrinkedbtn').tooltip('hide')
    .attr('data-original-title', message)
    .tooltip('show');
}

function hideTooltip() {
  setTimeout(function() {
    $('#shrinkedbtn').tooltip('hide');
  }, 1000);
}

// Clipboard

var clipboard = new Clipboard('#shrinkedbtn');

clipboard.on('success', function(e) {
  setTooltip('Copied!');
  hideTooltip();
});

clipboard.on('error', function(e) {
  setTooltip('Failed!');
  hideTooltip();
});


// Api
$(document).ready(function(){
    $("#shrinkbtn").click(function(event){
        event.preventDefault();

        var request = $.ajax({
            url: "/create",
            method: "POST",
            data: {
                link: $("#url").val()
            },

            success: function(response){
                console.log(response.status);
                if (response.status === "success"){
                    $("#urlform").trigger("reset");
                    console.log(response.url);
                    $("#shrinkresult").replaceWith("<div id='shrinkresult'><div class='input-group'> <input type='text' name='shrinkedurl' id='shrinkedurl' class='form-control input-lg' value='" +response.url+ "' tabindex='2'> <span class='input-group-btn'> <button id='shrinkedbtn' class='btn btn-primary btn-block btn-lg' type='button' data-clipboard-text='" +response.url+ "'><i class='glyphicon glyphicon-copy'></i></button> </span> </div></div> ");
                }else if (response.status === "error"){
                    $("#shrinkresult").replaceWith("<div id='shrinkresult'><div class='alert alert-danger fade in alert-dismissable'> <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a> <strong>SOS! </strong> "+response.errors.link+"</div></div>");
                }

            }

        });
    });
});
