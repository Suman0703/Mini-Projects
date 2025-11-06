// Wait for the DOM (the-page) to be fully loaded
document.addEventListener('DOMContentLoaded', () => {

    // --- BURGER MENU ---
    const burgerMenu = document.getElementById('burger-menu');
    const navLinks = document.getElementById('nav-links');

    if (burgerMenu && navLinks) {
        burgerMenu.addEventListener('click', () => {
            burgerMenu.classList.toggle('active');
            navLinks.classList.toggle('active');
        });

        navLinks.querySelectorAll('a').forEach(link => {
            link.addEventListener('click', () => {
                if (navLinks.classList.contains('active')) {
                    burgerMenu.classList.remove('active');
                    navLinks.classList.remove('active');
                }
            });
        });
    }

    // --- AJAX SIGNUP FORM ---
    const signupForm = document.getElementById('signup-form');

    if (signupForm) {
        const messageDiv = document.getElementById('form-message');

        signupForm.addEventListener('submit', async (event) => {
            event.preventDefault(); // Prevent page reload
            messageDiv.innerText = 'Creating account...';
            messageDiv.style.color = '#555';

            const formData = new FormData(signupForm);

            try {
                const response = await fetch('handle_signup.php', {
                    method: 'POST',
                    body: formData
                });
                
                // This gets the text from the response, even if it's not valid JSON
                const responseText = await response.text();

                // Try to parse it as JSON
                let result;
                try {
                     result = JSON.parse(responseText);
                } catch (jsonError) {
                    // This happens if PHP had a fatal error and didn't send JSON
                    console.error("JSON Parse Error:", jsonError);
                    console.error("Server Response:", responseText);
                    messageDiv.innerText = 'A server error occurred. Please check console.';
                    messageDiv.style.color = 'red';
                    return; // Stop here
                }
               
                // We have valid JSON
                if (result.status === 'success') {
                    messageDiv.innerText = result.message;
                    messageDiv.style.color = 'var(--primary-color)';
                    
                    // Redirect to login page on success
                    setTimeout(() => {
                        window.location.href = 'login.php?signup=success';
                    }, 2000);

                } else {
                    messageDiv.innerText = result.message;
                    messageDiv.style.color = 'red';
                }

            } catch (error) {
                // This catches the "network error"
                console.error('Fetch Error:', error);
                messageDiv.innerText = 'A network error occurred. Please try again.';
                messageDiv.style.color = 'red';
            }
        });
    }


    // --- AJAX LOGIN FORM ---
    const loginForm = document.getElementById('login-form');

    if (loginForm) {
        const messageDiv = document.getElementById('form-message');

        loginForm.addEventListener('submit', async (event) => {
            event.preventDefault(); // Prevent page reload
            messageDiv.innerText = 'Logging in...';
            messageDiv.style.color = '#555';

            const formData = new FormData(loginForm);

            try {
                const response = await fetch('handle_login.php', {
                    method: 'POST',
                    body: formData
                });

                // This gets the text from the response, even if it's not valid JSON
                const responseText = await response.text();

                // Try to parse it as JSON
                let result;
                try {
                     result = JSON.parse(responseText);
                } catch (jsonError) {
                    // This happens if PHP had a fatal error and didn't send JSON
                    console.error("JSON Parse Error:", jsonError);
                    console.error("Server Response:", responseText);
                    messageDiv.innerText = 'A server error occurred. Please check console.';
                    messageDiv.style.color = 'red';
                    return; // Stop here
                }

                if (result.status === 'success') {
                    messageDiv.innerText = result.message;
                    messageDiv.style.color = 'var(--primary-color)';
                    
                    // Redirect to home page on success
                    setTimeout(() => {
                        window.location.href = 'index.php';
                    }, 1500);

                } else {
                    messageDiv.innerText = result.message;
                    messageDiv.style.color = 'red';
                }

            } catch (error) {
                console.error('Fetch Error:', error);
                messageDiv.innerText = 'A network error occurred. Please try again.';
                messageDiv.style.color = 'red';
            }
        });
    }

});