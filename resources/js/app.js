import './bootstrap';
import './elements/turbo-echo-stream-tag';
import './libs';

document.addEventListener('DOMContentLoaded', () => {
  const menuBtn = document.getElementById('mobile-open');
  const menu = document.getElementById('mobile-menu');
  if (menuBtn && menu) menuBtn.addEventListener('click', () => menu.classList.toggle('hidden'));

  // Slider Katalog
  const container = document.getElementById('catalog-container');
  const prev = document.getElementById('catalog-prev');
  const next = document.getElementById('catalog-next');
  if (container && prev && next) {
    const scroller = container.querySelector('div');
    prev.addEventListener('click', () => scroller.scrollBy({ left: -320, behavior: 'smooth' }));
    next.addEventListener('click', () => scroller.scrollBy({ left: 320, behavior: 'smooth' }));
  }

  // Reveal on scroll
  const io = new IntersectionObserver((entries) => {
    entries.forEach(e => { if (e.isIntersecting) e.target.classList.add('is-visible'); });
  }, { threshold: 0.2 });
  document.querySelectorAll('.reveal').forEach(el => io.observe(el));

  // Count-up stats
  document.querySelectorAll('.stat-number').forEach(el => {
    const to = parseInt(el.getAttribute('data-count-to') || '0', 10);
    let cur = 0;
    const step = Math.max(1, Math.round(to / 40));
    const timer = setInterval(() => {
      cur += step; if (cur >= to) { cur = to; clearInterval(timer); }
      el.textContent = (to >= 100 ? `${cur}+` : cur);
    }, 40);
  });
});