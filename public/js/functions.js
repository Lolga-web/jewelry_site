
function showNav() {
    $('.catalog_subnav').slideToggle();
    // $('.show_nav').toggleClass('gold');
};

function checkSearch(){
    let searchValue = document.getElementById('search_value').value;
    if(searchValue.length < 1){
        document.getElementById('search_btn').disabled = true;
    } else {
        document.getElementById('search_btn').disabled = false;
    }
}

// document.addEventListener("DOMContentLoaded", function () {  
//     $('.main_nav_link').each(function () { 
//         let location = window.location.href; 
//         let link = this.href;  
//         if(location == link) { 
//             $(this).addClass('gold');
//         }
//     })});

// window.onload = function () {  
//     $('.main_nav_link').each(function () { 
//         let location = window.location.href; 
//         let link = this.href;  
//         if(location == link) { 
//             $(this).addClass('gold');
//         }
//     });
// };


