import 'gsap';
import gsap from 'gsap';

document.addEventListener('DOMContentLoaded', function () {
  let tl = gsap.timeline({ paused: true });

  tl.to('.menu-overlay', {
    duration: 1,
    clipPath: 'polygon(0 0, 100% 0, 100% 100%, 0 100%)',
    ease: 'power2.out',
  });

  tl.from(
    '.menu-link',
    {
      opacity: 0,
      y: 60,
      stagger: 0.05,
      duration: 0.75,
      ease: 'power1.inOut',
    },
    '<',
  );

  tl.to(
    '.video-preview',
    {
      duration: 1,
      height: '200px',
      ease: 'power2.out',
    },
    '<',
  );

  tl.to(
    '.menu-divider',
    {
      duration: 2,
      width: '100%',
      ease: 'power4.out',
    },
    '<',
  );

  function openMenu() {
    document.querySelector('.menu-overlay').style.pointerEvents = 'all';
    tl.play();
  }

  function closeMenu() {
    document.querySelector('.menu-overlay').style.pointerEvents = 'none';
    tl.reverse();
  }

  document.querySelector('.menu-open-btn').addEventListener('click', openMenu);
  document.querySelector('.menu-close-btn').addEventListener('click', closeMenu);
  tl.reverse();
});

window.addEventListener('scroll', function () {
  let navbar = document.querySelector('.navbar-transparent, .navbar-dark');
  if (window.scrollY > window.innerHeight) {
    navbar.classList.remove('navbar-transparent');
    navbar.classList.add('navbar-dark');
  } else {
    navbar.classList.remove('navbar-dark');
    navbar.classList.add('navbar-transparent');
  }
});
