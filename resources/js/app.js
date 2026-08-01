import 'bootstrap/dist/css/bootstrap.min.css';
import * as bootstrap from 'bootstrap';
import '../css/app.css';

window.bootstrap = bootstrap;

(() => {
  const navbar = document.querySelector('.mc-navbar');
  const syncNav = () => navbar?.classList.toggle('is-scrolled', window.scrollY > 18);
  syncNav();
  window.addEventListener('scroll', syncNav, {passive: true});
  document.querySelectorAll('#siteNav a').forEach((link) => link.addEventListener('click', () => {
    const panel = document.getElementById('siteNav');
    const instance = panel ? bootstrap.Offcanvas.getInstance(panel) : null;
    instance?.hide();
  }));
})();
