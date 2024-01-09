<?php
if (!isset($_SESSION['user_id'])) {
    header('location: index.php?page=login');
}

if ($_SESSION['role'] === 'admin') {
    header('location: index.php?page=dashboard');
}
