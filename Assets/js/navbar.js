
/* Hamburger animation */

/* Sidebar animation and hamburger crossing */

const menuBtn = document.querySelector('.menu-btn');
const navLinks = document.querySelector('.nav-links');
const links = document.querySelectorAll('.nav-links li');
let menuOpen= false;

menuBtn.addEventListener('click', () => {
 if(!menuOpen){
   menuBtn.classList.toggle("open");
   navLinks.classList.toggle("open");
   links.forEach(link => {
   link.classList.toggle("fade");
   });
 } else {
   menuBtn.classList.remove("open");
 }
});

