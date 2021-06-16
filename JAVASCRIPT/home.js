document.addEventListener("DOMContentLoaded", () =>{
    const login_button = document.querySelector(".login-button")
    login_button.addEventListener("click", handleClick)
})

function handleClick(event){
    const pop = document.querySelector(".popup")
    const close_button = document.querySelector(".close")
    pop.style.display = "block";

    close_button.addEventListener("click", ()=>{
        pop.style.display = "none";
    })
}