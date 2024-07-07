function login(event) {
    event.preventDefault();
    const username = document.getElementById('username').value;
    const password = document.getElementById('password').value;

    let n = 5;

    // External loop
    for (let i = 1; i <= n; i++) {
        let row = '';

        // printing spaces
        for (let j = 1; j <= n - i; j++) {
            row += ' ';
        }

        // printing stars
        for (let k = 0; k < 2 * i - 1; k++) {
            row += '*';
        }

        console.log(row);
    }

    // Check if the username and password are correct
    if (username === 'admin' && password === 'admin') {
        console.log('Login successful');
        // Redirect to the dashboard PHP file
        window.location.href = 'dashboard.php';
    } else {
        alert('Invalid username or password. Please try again.');
    }
}

document.getElementById('loginLink').addEventListener('click', login);
