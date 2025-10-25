document.addEventListener('DOMContentLoaded', () => {
    const burgerMenu = document.getElementById('burger-menu');
    const navLinks = document.getElementById('nav-links');

    if (burgerMenu && navLinks) {
        burgerMenu.addEventListener('click', () => {
            // Toggle 'active' class on nav links to show/hide
            navLinks.classList.toggle('active');
            
            // Toggle 'active' class on burger for 'X' animation
            burgerMenu.classList.toggle('active');
        });
    }
});