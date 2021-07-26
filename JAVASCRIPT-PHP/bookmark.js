const button = document.getElementById("bookmark");
const empty_bookmark = document.getElementById("empty-mark");
const filled_bookmark = document.getElementById("filled-mark");

button.onclick = function(){
    if(empty_bookmark.classList.contains("none")){
        empty_bookmark.classList.remove("none")
        filled_bookmark.classList.add("none");
    }else{
        empty_bookmark.classList.add("none");
        filled_bookmark.classList.remove("none");
    }
}