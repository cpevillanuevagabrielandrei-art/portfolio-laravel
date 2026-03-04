// Portfolio Frontend JavaScript

function toggleMenu() {
    const menu = document.querySelector('.menu-links');
    const icon = document.querySelector('.hamburger-icon');
    if (menu && icon) {
        menu.classList.toggle('open');
        icon.classList.toggle('open');
    }
}

// Smooth scroll highlight active nav link
document.addEventListener('DOMContentLoaded', function () {
    const sections = document.querySelectorAll('section[id]');
    const navLinks = document.querySelectorAll('.nav-links a');

    function highlightNav() {
        let scrollY = window.pageYOffset;
        sections.forEach(section => {
            const sectionHeight = section.offsetHeight;
            const sectionTop = section.offsetTop - 100;
            const sectionId = section.getAttribute('id');
            navLinks.forEach(link => {
                if (link.getAttribute('href') === '#' + sectionId) {
                    if (scrollY > sectionTop && scrollY <= sectionTop + sectionHeight) {
                        link.style.color = '#000';
                        link.style.fontWeight = '600';
                    } else {
                        link.style.color = '';
                        link.style.fontWeight = '';
                    }
                }
            });
        });
    }

    window.addEventListener('scroll', highlightNav);
});
