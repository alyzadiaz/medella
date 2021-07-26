(function() {
    // For Firebase JS SDK v7.20.0 and later, measurementId is optional
    var firebaseConfig = {
        apiKey: "AIzaSyA7Ffj-KcNo3KYcjEDCk6nC_IUfN2VYhRE",
        authDomain: "medella-login.firebaseapp.com",
        projectId: "medella-login",
        storageBucket: "medella-login.appspot.com",
        messagingSenderId: "569506160482",
        appId: "1:569506160482:web:d344232bbcc57a3ad0563b",
        measurementId: "G-MLRF7RR7QC"
    };
    firebase.initializeApp(firebaseConfig);
    firebase.analytics();

    firebase.auth().onAuthStateChanged(firebaseUser => {
        if(firebaseUser) {
            console.log(firebaseUser);
            document.getElementById("txtEmail").value = firebaseUser.email;
            document.getElementById("uid").value = firebaseUser.uid;
            //Authentication state observer - For each of your app's pages that need information about the signed-in user, 
            //attach an observer to the global authentication object. This observer gets called whenever the user's sign-in state changes.
            //var uid = user.id;
            //btnLogout.classList.remove('hide');
            //TODO: add code here to go to home page because user is successfull signed in

        }else{
            console.log('Not logged in');
            //btnLogout.classList.add('hide');
        }
    })

    firebase.auth().setPersistence(firebase.auth.Auth.Persistence.SESSION).then(() => {
    // Existing and future Auth states are now persisted in the current
    // session only. Closing the window would clear any existing state even
    // if a user forgets to sign out.
    // ...
    // New sign-in will be persisted with session persistence.
        return firebase.auth().signInWithEmailAndPassword(email, password);
    })
        .catch((error) => {
    // Handle Errors here.
            var errorCode = error.code;
            var errorMessage = error.message;
    });
}());
