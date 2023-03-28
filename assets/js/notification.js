// notification
function notification(type, message){
    $('body').append(`<div class="notification">
        <div class="alert alert-`+type+`" role="alert">`+message+`</div>
    </div>`);
  
    setTimeout(function(){
        $('.notification').remove();
    }, 1500);
}