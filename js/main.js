let menu = document.querySelector('#menu');
let menu_container=document.getElementById('menu');
let link = menu_container.getElementsByClassName("link");
let menu_bar = document.querySelector('#btn-toggle');
var prevScrollpos = window.pageYOffset;



window.onscroll = function() {
    var currentScrollPos = window.pageYOffset;
      if (prevScrollpos > currentScrollPos) {
        document.getElementById("navbar").style.top = "0";
      } else {
        document.getElementById("navbar").style.top = "-90px";
      }
      prevScrollpos = currentScrollPos;
    }
    function myFunction() {
    var element = document.body;
    element.classList.toggle("dark-mode");

    if(document.body.classList.contains('dark-mode')){
      localStorage.setItem('modo-oscuro','true');
    }
    else{
      localStorage.setItem('modo-oscuro','false');
    }
    };
    if(localStorage.getItem('modo-oscuro') === 'true'){
      document.body.classList.add('dark-mode');
    }
    else{
      document.body.classList.remove('dark-mode');
    }


    



for(var i=0;i<link.length;i++){
    link[i].addEventListener("click",function(){
        var current=document.getElementsByClassName("active");
        current[0].className=current[0].className.replace("active","");
        this.className +=" active";
    });
}

    menu_bar.addEventListener('click',function(){
        menu.classList.toggle('btn-togler-event')
    });


    