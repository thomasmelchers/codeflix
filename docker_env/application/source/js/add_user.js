document.querySelector(".addUser").addEventListener('click', ()=>{
    document.querySelector(".popUpForm").style.display = "flex";
    console.log('click like open');
});

var close = document.querySelector(".close1");
var popup = document.querySelector(".popUpForm");
close.addEventListener('click', ()=>{
    popup.style.display = "none"; 
    /* popup.style.color = "#FFF"; */
    console.log('click like close');
});
console.log(close);
console.log(popup);
