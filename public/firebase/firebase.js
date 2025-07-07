// public/firebase/firebase.js
import { initializeApp } from "https://www.gstatic.com/firebasejs/9.6.1/firebase-app.js";
import { getAuth, signInWithEmailAndPassword } from "https://www.gstatic.com/firebasejs/9.6.1/firebase-auth.js";
import { getFirestore, doc, addDoc, getDoc, getDocs, deleteDoc, setDoc, collection, query, where, updateDoc, onSnapshot, writeBatch } from "https://www.gstatic.com/firebasejs/9.6.1/firebase-firestore.js";

const firebaseConfig = {
  apiKey: "AIzaSyAxZ1MMOqH-c6fFTVqXCS0FChrGE_5I6Mg",
  authDomain: "absensi-rfid-af2a8.firebaseapp.com",
  projectId: "absensi-rfid-af2a8",
  storageBucket: "absensi-rfid-af2a8.appspot.com",
  messagingSenderId: "413625192609",
  appId: "1:413625192609:web:229390e1fb359d08e0a0e0",
  measurementId: "G-NWPWSF5XQ3"
};

const app = initializeApp(firebaseConfig);
const auth = getAuth(app);
const db = getFirestore(app);

export { auth, signInWithEmailAndPassword, db, doc, addDoc, getDoc, setDoc, getDocs, deleteDoc, collection, query, where, updateDoc, onSnapshot,  writeBatch };