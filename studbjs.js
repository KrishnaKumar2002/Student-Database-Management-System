  const firebaseConfig = {
    apiKey: "AIzaSyAzK7tsFo0vw9ea3kFcitLbgzBBa-6mt5U",
    authDomain: "student-database-project.firebaseapp.com",
    projectId: "student-database-project",
    storageBucket: "student-database-project.appspot.com",
    messagingSenderId: "1019015111070",
    appId: "1:1019015111070:web:7891af7c7f085790c2768f",
    measurementId: "G-4BNJQW967D"
  };

  // Initialize Firebase
  const app = initializeApp(firebaseConfig);
  const analytics = getAnalytics(app);

/*ready data*/
var nameV,emailV,genderV,dobV,religionV,stateV;

function Ready(){
    
    nameV=document.getElementById('namebox').value;
    emailV=document.getElementById('emailbox').value;
    genderV=document.getElementById('genderbox').value;
    dobV=document.getElementById('dobbox').value;
    religionV=document.getElementById('religionbox').value;
    stateV=document.getElementById('statebox').value;

}

/*insert process*/

document.getElementById('insert').onclick=function(){
    Ready();
    firebase.database().ref('students/'+name).set({
        Name:nameV,
        Date Of Birth:dobV,
        Email:emailV,
        Gender:genderV,
        Religion:religionV,
        State:stateV
    });
}