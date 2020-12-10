
$(".ph-menu-btn").click(function(){
    let menu = $(".ph-menu");
    if(menu.hasClass('active')){
        menu.removeClass('active');
        $(this).html(`<i class="feather-menu text-white h3"></i>`);
    }
    else{
        menu.addClass('active');
        $(this).html(`<i class="feather-x text-white h2"></i>`);
    }
});

function go(url) {
    window.location.href = url;
}