(function() {
    firebase.auth().onAuthStateChanged(firebaseUser => {
        var guest_login = document.getElementById("guest");
        var registered_user = document.getElementById("registered");

        if(firebaseUser) {
            guest_login.classList.add("none");

            if(registered_user.classList.contains("none")){
                registered_user.classList.remove("none");
            }
        }else{
            if(guest_login.classList.contains("none")){
                guest_login.classList.remove("none");
            }

            registered_user.classList.add("none");
        }
    })
}());