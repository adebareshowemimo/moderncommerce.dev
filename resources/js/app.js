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

document.querySelectorAll('.mc-video-shell').forEach((shell) => {
  shell.querySelector('.mc-video-launch')?.addEventListener('click', () => {
    const iframe = document.createElement('iframe');
    iframe.src = `https://www.youtube-nocookie.com/embed/${shell.dataset.youtubeId}?autoplay=1&rel=0`;
    iframe.title = 'ModernCommerce tutorial video';
    iframe.allow = 'accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share';
    iframe.allowFullscreen = true;
    shell.replaceChildren(iframe);
  });
});
