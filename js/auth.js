// Firebase Config (exemple)
const firebaseConfig = {
  apiKey: "YOUR_API_KEY",
  authDomain: "ishep-gestion.firebaseapp.com"
};

// Initialisation
firebase.initializeApp(firebaseConfig);

// Gestion Connexion
document.getElementById('loginForm').addEventListener('submit', (e) => {
  e.preventDefault();
  
  const email = document.getElementById('email').value;
  const password = document.getElementById('password').value;

  firebase.auth().signInWithEmailAndPassword(email, password)
    .then((userCredential) => {
      redirectBasedOnRole(userCredential.user.uid);
    })
    .catch((error) => {
      showError(error.message);
    });
});
