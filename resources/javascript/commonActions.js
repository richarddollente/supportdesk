$(document).ready(function(){

    $(".nav-show-hide").on("click", function() {

        var mainSection = $("#main-section-container");
        var navigation = $("#side-nav-container");
    
        if(mainSection.hasClass("left-padding")) {
            navigation.hide();
        }
        else{
            navigation.show();
        }
        
        mainSection.toggleClass("left-padding");
    
    });
    
});

function notLoggedIn(){

    alert("You are not logged in!");

}