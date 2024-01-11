function logOut() {
    fetch('index.php?page=login&request=logout', {
        headers: {
            'Content-Type': 'application/json',
        },
        method: 'GET',
    })
        .then(() => window.location.href = 'index.php')
}