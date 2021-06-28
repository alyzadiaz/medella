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

    //Get elements
    const txtEmail = document.getElementById('txtEmail');
    const txtPassword = document.getElementById('txtPassword');
    const btnLogin = document.getElementById('btnLogin');
    const btnSignUp = document.getElementById('btnSignUp');

    //Add login event
    btnLogin.addEventListener('click', e=> {
        //get email and password
        const email = txtEmail.value
        const pass = txtPassword.value;
        const auth = firebase.auth();
        //sign in
        
        const promise = auth.signInWithEmailAndPassword(email,pass).then(function(user){
            console.log("login successful");
            //console.log(auth.currentUser.uid);
            location.href = "../HTML-CSS/home.html";
        }).catch(function(error){
            console.log(error.message);

            if(error.message.includes("password")){
                const password_field = document.getElementById("txtPassword");
                password_field.classList.add("field-error");
            }

            if(error.message.includes("badly formatted")){
                const email_field = document.getElementById("txtEmail");
                email_field.classList.add("field-error");
            }
        });
    });

    btnSignUp.addEventListener('click', e=> {
        //get email and password
        //TODO; check for real email
        const email = txtEmail.value
        const pass = txtPassword.value;
        const auth = firebase.auth();
        //sign in
        const promise = auth.createUserWithEmailAndPassword(email,pass).then(function(user){
            console.log("account creation successful");
            location.href = "../HTML-CSS/new-user.html";
        }).catch(function(error){
            if(error.message.includes("password")){
                const password_field = document.getElementById("txtPassword");
                password_field.classList.add("field-error");
            }

            if(error.message.includes("badly formatted")){
                const email_field = document.getElementById("txtEmail");
                email_field.classList.add("field-error");
            }
        }); 
    });

    firebase.auth().onAuthStateChanged(firebaseUser => {
        if(firebaseUser) {
            console.log(firebaseUser);
            document.getElementById("uid").innerHTML = firebaseUser.uid;
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

function clearError(id){
    const field = document.getElementById(id);
    
    if(field.classList.contains("field-error")){
        field.classList.remove("field-error");
    }
}