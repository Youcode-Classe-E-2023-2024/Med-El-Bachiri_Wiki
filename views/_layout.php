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
        <nav id="NAV" class="m-auto bg-gray-800">
            <div class="mx-auto max-w-7xl px-2 sm:px-6 lg:px-8">
                <div class="relative flex h-16 items-center justify-between">
                    <div class="absolute inset-y-0 left-0 flex items-center sm:hidden">
                        <!-- Mobile menu button-->
                        <button type="button" class="relative inline-flex items-center justify-center rounded-md p-2 text-gray-400 hover:bg-gray-700 hover:text-white focus:outline-none focus:ring-2 focus:ring-inset focus:ring-white" aria-controls="mobile-menu" aria-expanded="false">
                            <span class="absolute -inset-0.5"></span>
                            <span class="sr-only">Open main menu</span>
                            <svg class="hidden h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>
                    <div class="flex flex-1 items-center justify-center sm:items-stretch sm:justify-start">
                        <div class="flex flex-shrink-0  items-center">
                            <a href="index.php"><img class="h-12 w-auto hover:opacity-70" src="<?= PATH . 'assets/img/wiki-Logo.png' ?>" alt="Your Company"></a>
                        </div>
                        <div class="hidden sm:ml-6 sm:block">
                            <div class="flex space-x-4">
                                <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
                                <a href="index.php?page=home" class="bg-gray-900 hover:bg-gray-800 m-2 text-white rounded-md px-3 py-2 text-sm" aria-current="page">Home</a>
                                <?php if (isset($user->role) && $user->role === 'admin') { ?>
                                <a href="index.php?page=dashboard" class="text-gray-300 m-2 hover:bg-gray-700 hover:text-white rounded-md px-3 py-2 text-sm font-medium">Dashboard</a>
                                <?php } elseif (isset($user->role) && $user->role === 'author') { ?>
                                <a href="index.php?page=wikis" class="text-gray-300 m-2 hover:bg-gray-700 hover:text-white rounded-md px-3 py-2 text-sm font-medium">Wikis</a>
                                <?php } ?>
                            </div>
                        </div>
                    </div>

                    <?php if (!isset($_SESSION['user_id'])) { ?>
                    <div class="absolute inset-y-0 right-0 flex items-center pr-2 sm:static sm:inset-auto sm:ml-6 sm:pr-0">
                        <div class="inline-flex items-center ml-5 space-x-6 lg:justify-end">
                            <a href="index.php?page=register" class="text-white font-medium leading-6 text-fuchsia-50 whitespace-no-wrap transition duration-150 ease-in-out hover:text-gray-500">
                                Register
                            </a>
                            <a href="index.php?page=login" class="inline-flex items-center justify-center px-4 py-2 text-base font-medium leading-6 text-white whitespace-no-wrap bg-orange-700 border border-transparent rounded-md shadow-sm hover:bg-indigo-400 bg-indigo-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-600">
                                Login
                            </a>
                        </div>
                    </div> <?php } ?>

                    <?php if (isset($_SESSION['user_id'])) { ?>
                        <button type="button" class="flex text-sm bg-gray-800 rounded-full md:me-0 focus:ring-4 focus:ring-gray-300 dark:focus:ring-gray-600" id="user-menu-button" aria-expanded="false" data-dropdown-toggle="user-dropdown" data-dropdown-placement="bottom">
                            <img class="w-8 h-8 rounded-full border border-black" src="<?= PATH . 'assets/img/' . $user->image ?>" alt="user photo">
                        </button>
                        <!-- Dropdown menu -->
                        <div class="z-50 my-4 text-base list-none bg-white divide-y divide-gray-100 rounded-lg shadow dark:bg-gray-700 dark:divide-gray-600 absolute shadow-xl border border-gray-600" style="top: 50px; right: 0; display: none;" id="user-dropdown">
                            <div class="px-4 py-3">
                                <span class="block text-sm text-gray-900 dark:text-white"><?= $user->username ?></span>
                                <span class="block text-sm  text-gray-500 truncate dark:text-gray-400"><?= $user->email ?></span>
                            </div>
                            <ul class="py-2" aria-labelledby="user-menu-button">
                                <li>
                                    <form method="post" action="index.php?page=login" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">
                                        <button name="logout_btn">Log Out</button>
                                    </form>
                                </li>
                            </ul>
                        </div>
                    <?php }?>

                </div>
            </div>
        </nav>
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
</script>
    <script src="<?= PATH ?>assets/js/main.js"></script>
    <script src="<?= PATH ?>assets/js/DOM.js"></script>
    <script src="<?= PATH ?>assets/js/register.js"></script>
    <script src="<?= PATH ?>assets/js/login.js"></script>
</body>
</html>