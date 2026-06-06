/**
 * Portfolio Theme JavaScript
 * Animations handled by js/animations.js
 */

document.addEventListener('DOMContentLoaded', function () {
    const navLinks = document.querySelectorAll('nav a');
    const currentPath = window.location.pathname.replace(/\/$/, '') || '/';

    // Highlight active nav link based on current page
    navLinks.forEach(link => {
        const href = link.getAttribute('href');
        if (!href) return;

        try {
            const linkPath = new URL(href, window.location.origin).pathname.replace(/\/$/, '') || '/';
            if (linkPath === currentPath) {
                link.classList.add('active');
            }
        } catch (e) { }
    });

    // Contact form
    const contactForm = document.getElementById('contact-form');
    if (contactForm) {
        contactForm.addEventListener('submit', function (e) {
            e.preventDefault();

            const formData = {
                name: document.getElementById('name').value,
                email: document.getElementById('email').value,
                subject: document.getElementById('subject').value,
                message: document.getElementById('message').value
            };

            if (!formData.name || !formData.email || !formData.subject || !formData.message) {
                alert('Please fill in all fields');
                return;
            }

            const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (!emailRegex.test(formData.email)) {
                alert('Please enter a valid email address');
                return;
            }

            const mailtoLink = `mailto:janithcamitha@gmail.com?subject=${encodeURIComponent(formData.subject)}&body=${encodeURIComponent('From: ' + formData.name + ' (' + formData.email + ')\n\n' + formData.message)}`;
            window.location.href = mailtoLink;
            contactForm.reset();
        });
    }

    document.body.classList.add('loaded');
});
