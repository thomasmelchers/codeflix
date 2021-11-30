document.querySelector("button").addEventListener('click', ()=>{
    document.querySelector(".popUpForm").style.display = "flex";
});

document.querySelector(".close").addEventListener('click', ()=>{
    document.querySelector(".popUpForm").style.display = "none";
});