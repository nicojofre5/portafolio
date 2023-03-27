let menu = document.querySelector('#menu');
let menu_container=document.getElementById('menu');
let link = menu_container.getElementsByClassName("link");
for(var i=0;i<link.length;i++){
    link[i].addEventListener("click",function(){
        var current=document.getElementsByClassName("active");
        current[0].className=current[0].className.replace("active","");
        this.className +=" active";
    });
}
let menu_bar = document.querySelector('#btn-toggle');
    menu_bar.addEventListener('click',function(){
        menu.classList.toggle('btn-togler-event')
    });

