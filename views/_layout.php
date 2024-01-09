<?php isset($_SESSION['user_id']) ? $user = new User($_SESSION['user_id']) : $user = null; ?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?= ucfirst($page) ?></title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">

</head>
<body class="bg-gray-100" style="scroll-behavior: smooth;">

<!-- navbar start -->
    <?php if (isset($_SESSION['user_id'])) { ?>
        <nav class="bg-white border-gray-200 dark:bg-gray-900 fixed w-full z-50 bg-blue-900 bg-gradient-to-l from-indigo-500">
            <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
<!--                <img src="--><?//= PATH . 'assets/img/logo.png' ?><!--" alt="" class="h-10">-->

                <div class="flex items-center md:order-2 space-x-3 md:space-x-0 rtl:space-x-reverse">
                    <button type="button" class="flex text-sm bg-gray-800 rounded-full md:me-0 focus:ring-4 focus:ring-gray-300 dark:focus:ring-gray-600" id="user-menu-button" aria-expanded="false" data-dropdown-toggle="user-dropdown" data-dropdown-placement="bottom">
                        <img class="w-8 h-8 rounded-full border border-black" src="<?= PATH . 'assets/img/' . $user->image ?>" alt="user photo">
                    </button>
                    <!-- Dropdown menu -->
                    <div class="z-50 my-4 text-base list-none bg-white divide-y divide-gray-100 rounded-lg shadow dark:bg-gray-700 dark:divide-gray-600 absolute shadow-xl border border-gray-600" style="top: 50px; right: 9%; display: none;" id="user-dropdown">
                        <div class="px-4 py-3">
                            <span class="block text-sm text-gray-900 dark:text-white"><?= $user->username ?></span>
                            <span class="block text-sm  text-gray-500 truncate dark:text-gray-400"><?= $user->email ?></span>
                        </div>
                        <ul class="py-2" aria-labelledby="user-menu-button">
                            <li>
                                <a href="index.php?page=dashboard" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Dashboard</a>
                            </li>
                            <li>
                                <a href="index.php?page=product" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Products</a>
                            </li>
                            <li>
                                <a href="index.php?page=user" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Users</a>
                            </li>
                            <li>
                                <form method="post" action="index.php?page=login" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white"><button name="logout_btn">Log Out</button></form>
                            </li>
                        </ul>
                    </div>
                    <button data-collapse-toggle="navbar-user" type="button" class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600" aria-controls="navbar-user" aria-expanded="false">
                        <span class="sr-only">Open main menu</span>
                        <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h15M1 7h15M1 13h15"/>
                        </svg>
                    </button>
                </div>
            </div>
        </nav>
    <?php } ?>
<!-- end navbar -->

<!-- main start -->
    <main>
        <?php include_once 'views/' . $page . '_view.php'; ?>
    </main>
<!-- main end -->

<!-- footer start -->
    <footer>

    </footer>
<!-- footer end -->


<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Get the necessary elements
        const userMenuButton = document.getElementById('user-menu-button');
        const userDropdown = document.getElementById('user-dropdown');

        userMenuButton.addEventListener('click', ()=>{
            userDropdown.style.display = userDropdown.style.display === 'none' ? 'block' : 'none';

        });
    });

    function openNForm() {
        let form = document.querySelector('#notification_form');
        form.style.display = form.style.display === 'none' ? 'block' : 'none';
    }
</script>
    <script src="<?= PATH ?>assets/js/main.js"></script>
    <script src="<?= PATH ?>assets/js/DOM.js"></script>
</body>
</html>