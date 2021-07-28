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
            document.getElementById("uid").value = firebaseUser.uid;
            document.getElementById("form").submit();
        }else{
            console.log('Not logged in');
        }
    })

    firebase.auth().setPersistence(firebase.auth.Auth.Persistence.SESSION).then(() => {
        return firebase.auth().signInWithEmailAndPassword(email, password);
    })
        .catch((error) => {
            var errorCode = error.code;
            var errorMessage = error.message;
    });
}());