console.log('im loaded');

var sidebar_tigger = document.getElementsByClassName('sidebar-trigger');
var sidebar_menu = document.getElementsByClassName('sidebar-menu');
var sidebar = document.getElementsByClassName('sidebar');
var maincontent = document.getElementsByClassName('mainContent');

sidebar_tigger[0].addEventListener('click', function(evt){
    sidebar_tigger[0].classList.toggle('active');
    sidebar_menu[0].classList.toggle('active');
    sidebar[0].classList.toggle('active');
    maincontent[0].classList.toggle('active');
})
