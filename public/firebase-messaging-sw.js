importScripts('https://www.gstatic.com/firebasejs/8.6.7/firebase-app.js');
importScripts('https://www.gstatic.com/firebasejs/8.6.7/firebase-messaging.js');
 
firebase.initializeApp({
    apiKey: "AIzaSyAHeWRCgmFIlTpsAec5RCnGGo5uSaLdf5Y",
    authDomain: "electoral-e17e0.firebaseapp.com",
    databaseURL: "https://electoral-e17e0-default-rtdb.firebaseio.com",
    projectId: "electoral-e17e0",
    storageBucket: "electoral-e17e0.appspot.com",
    messagingSenderId: "842154102632",
    appId: "1:842154102632:web:bbe13ae8160de5694f10dd"
});

// Retrieve an instance of Firebase Messaging so that it can handle background
// messages.
const messaging = firebase.messaging();