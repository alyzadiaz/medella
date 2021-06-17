document.addEventListener("DOMContentLoaded", () =>{
    const login_button = document.querySelector(".login-button")
    login_button.addEventListener("click", handleClick)
})

function handleClick(event){
    const pop = document.querySelector(".popup")
    const close_button = document.querySelector(".close")
    pop.style.display = "flex";

    const bar = document.getElementById("top-bar");
    bar.style.backgroundColor = "rgba(0,0,0,0.7)";
    

    close_button.addEventListener("click", ()=>{
        pop.style.display = "none";
        bar.style.backgroundColor = "white";
        bar.style.opacity = 1;
    })
}