function showNav() {
    $('.catalog_subnav').slideToggle();
};


function checkSearch(){
    let searchValue = document.getElementById('search_value').value;
    if(searchValue.length < 1){
        document.getElementById('search_btn').disabled = true;
    } else {
        document.getElementById('search_btn').disabled = false;
    }
}

