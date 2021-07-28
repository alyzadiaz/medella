const button = document.getElementById("bookmark");
const empty_bookmark = document.getElementById("empty-mark");
const filled_bookmark = document.getElementById("filled-mark");
const uid_field = document.getElementById("uid");
const uid_form = document.getElementById("submit-save");
const check = document.getElementById("check");

(function is_logged_in() {
    firebase.auth().onAuthStateChanged(firebaseUser => {
        if(firebaseUser) {
            uid_field.value = firebaseUser.uid;
        }
    })
}());

button.onclick = function(){
    firebase.auth().onAuthStateChanged(firebaseUser => {
        if(firebaseUser){
            if(empty_bookmark.classList.contains("none")){  //removing from saved
                check.checked = false;
                empty_bookmark.classList.remove("none")
                filled_bookmark.classList.add("none");
            }else{  //adding to saved
                check.checked = true;
                empty_bookmark.classList.add("none");
                filled_bookmark.classList.remove("none");
            }
            
            uid_form.submit();
        }else{
            alert("Please sign in to save articles!");
        }
    })
}