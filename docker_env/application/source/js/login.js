
document.querySelector(".login").addEventListener('click', ()=>{
    document.querySelector(".popUpFormLogin").style.display = "flex";
});

document.querySelector(".close").addEventListener('click', ()=>{
    document.querySelector(".popUpFormLogin").style.display = "none";
});