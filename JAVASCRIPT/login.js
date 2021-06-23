

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
    const btnLogout = document.getElementById('btnLogout');

    //Add login event
    btnLogin.addEventListener('click', e=> {
        //get email and password
        const email = txtEmail.value
        const pass = txtPassword.value;
        const auth = firebase.auth();
        //sign in
        const promise = auth.signInWithEmailAndPassword(email,pass);
        promise.catch (e=> console.log(e.message));
        /*window.onerror = function(message, url, line) {
            alert(message + ', ' + url + ', ' + line);
          };*/
});

    btnSignUp.addEventListener('click', e=> {
        //get email and password
        //TODO; check for real email
        const email = txtEmail.value
        const pass = txtPassword.value;
        const auth = firebase.auth();
        //sign in
        const promise = auth.createUserWithEmailAndPassword(email,pass);
        promise
            .catch (e=> console.log(e.message));
            
    });

    btnLogout.addEventListener('click', e=> {
        firebase.auth().signOut();
    });

    firebase.auth().onAuthStateChanged(firebaseUser => {
        if(firebaseUser) {
            console.log(firebaseUser);
            //Authentication state observer - For each of your app's pages that need information about the signed-in user, 
            //attach an observer to the global authentication object. This observer gets called whenever the user's sign-in state changes.
            //var uid = user.id;
            btnLogout.classList.remove('hide');
            //TODO: add code here to go to home page because user is successfull signed in

        }else{
            console.log('Not logged in');
            btnLogout.classList.add('hide');
        }
    })

}());