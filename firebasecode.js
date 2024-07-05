
        // Import the functions you need from the SDKs you need
        import { initializeApp } from "https://www.gstatic.com/firebasejs/10.10.0/firebase-app.js";
        import { getDatabase, ref, update, set, get, child } from "https://www.gstatic.com/firebasejs/10.10.0/firebase-database.js";
        import { getAuth, createUserWithEmailAndPassword, signInWithEmailAndPassword,getIdToken } from "https://www.gstatic.com/firebasejs/10.10.0/firebase-auth.js";
        // TODO: Add SDKs for Firebase products that you want to use
        // https://firebase.google.com/docs/web/setup#available-libraries

        // Your web app's Firebase configuration
        // For Firebase JS SDK v7.20.0 and later, measurementId is optional
        const firebaseConfig = {
          apiKey: "AIzaSyDIKgIRcoTWgWKocJ-sSI1J5uN44My0rhc",
          authDomain: "petbook-69b1e.firebaseapp.com",
          databaseURL: "https://petbook-69b1e-default-rtdb.asia-southeast1.firebasedatabase.app",
          projectId: "petbook-69b1e",
          storageBucket: "petbook-69b1e.appspot.com",
          messagingSenderId: "287346842196",
          appId: "1:287346842196:web:bf0783523ca3880fd32bc1",
          measurementId: "G-CDQD87KGXE"
        };

        // Initialize Firebase
        const app = initializeApp(firebaseConfig);
        const db = getDatabase(app);
        const auth = getAuth();

        
        signup.addEventListener('click', (e) => {

          var email = document.getElementById('email').value;
          var password = document.getElementById('password').value;
          var confirmpassword = document.getElementById('password').value;
          var username = document.getElementById('lastname').value;

           if (password === confirmpassword) {

            createUserWithEmailAndPassword(auth, email, password)
              .then((userCredential) => {
              // Signed up 
              const user = userCredential.user;
            
              set(ref(db, 'signup/' + user.uid),
              {
                  firstname: document.getElementById("firstname").value,
                  lastname: document.getElementById("lastname").value,
                  email: document.getElementById("email").value,
                  password: document.getElementById("password").value,
                  confirmpassword: document.getElementById("confpassword").value
              });
                document.getElementById("signupform").reset();
                alert("Sign up success!");
              })
              .catch((error) => {
                const errorCode = error.code;
                const errorMessage = error.message;

                alert(errorMessage);
              });

            }else {
              alert("Password Not match!");
          }
          
        })


        login.addEventListener('click', (e) => {

          var email = document.getElementById('emaillog').value;
          var password = document.getElementById('passwordlog').value;

          signInWithEmailAndPassword(auth, email, password)
          .then((userCredential) => {
            // Signed in 
            const user = userCredential.user;
            const dt = new Date();
            if( user.uid === "A69gRKhnmOfhMy72QPaQXWoXVMB3"){
            update(ref(db, 'signup/' + user.uid),
            {
                last_login: dt

            });
            alert("Login Success");
            window.location.href = "adminhomepage.html";
            }
            else{
            update(ref(db, 'signup/' + user.uid),
            {
                last_login: dt
            });
            alert("Login Success");
            window.location.href = "home.html";
            }
          })
          .catch((error) => {
            const errorCode = error.code;
            const errorMessage = error.message;

            alert(errorMessage);
          });

        })

        
        sendmsg.addEventListener('click',(e) => {
            set(ref(db, 'contact/' + user.uid),
            {
                email: document.getElementById("email1").value,
                contact: document.getElementById("contact1").value,
                comment: document.getElementById("comment").value
            });
            document.getElementById("contactform").reset();
            alert("Message Sent!");
        })