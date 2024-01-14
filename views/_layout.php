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
                    <div class="flex flex-1 items-center sm:items-stretch justify-start">
                        <div class="flex flex-shrink-0  items-center">
                            <a href="index.php"><img class="h-12 w-auto hover:opacity-70" src="<?= PATH . 'assets/img/wiki-Logo.png' ?>" alt="Your Company"></a>
                        </div>
                        <div class="hidden sm:ml-6 sm:block">
                            <div class="flex space-x-4">
                                <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
                                <a href="index.php?page=home" class="bg-gray-900 hover:bg-gray-700 hover:text-white m-2 text-white rounded-md px-3 py-2 text-sm" aria-current="page">Home</a>
                                <a href="index.php?page=all-wikis" class="bg-gray-900 hover:bg-gray-700 hover:text-white  m-2 text-white rounded-md px-3 py-2 text-sm" aria-current="page">See All Wikis</a>
                                <?php if (isset($user->role) && $user->role === 'admin') { ?>
                                <a href="index.php?page=dashboard" class="bg-gray-900 hover:bg-gray-700 hover:text-white m-2 text-white rounded-md px-3 py-2 text-sm">Dashboard</a>
                                <?php } elseif (isset($user->role) && $user->role === 'author') { ?>
                                <a href="index.php?page=wikis" class="bg-gray-900 hover:bg-gray-700 hover:text-white m-2 text-white rounded-md px-3 py-2 text-sm">My Wikis</a>
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

                    <!-- dropdown menu start -->
                    <?php if (isset($_SESSION['user_id'])) { ?>
                        <div class="min-h-screen py-6 flex flex-col justify-center sm:py-12" style="z-index: 999;">
                            <div class="flex items-center justify-center p-12">
                                <div class=" relative inline-block text-left dropdown">
                                    <span class="rounded-md shadow-sm">
                                        <button class="inline-flex justify-center w-full px-2 py-1 text-sm font-medium leading-5 text-gray-700 transition duration-150 ease-in-out border border-gray-300 rounded-md hover:text-gray-500 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue active:bg-gray-50 active:text-gray-800"
                                             type="button" aria-haspopup="true" aria-expanded="true" aria-controls="headlessui-menu-items-117">
                                        <img src="<?= PATH . 'assets/img/' . $user->image ?>" class="h-10 rounded-full shadow-xl">
                                        <svg class="w-5 h-5 ml-2 -mr-1" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                                        </button>
                                    </span>
                                    <div class="opacity-0 invisible dropdown-menu transition-all duration-300 transform origin-top-right -translate-y-2 scale-95">
                                        <div class="absolute right-0 w-56 mt-2 origin-top-right bg-white border border-gray-200 divide-y divide-gray-100 rounded-md shadow-lg outline-none" aria-labelledby="headlessui-menu-button-1" id="headlessui-menu-items-117" role="menu">
                                            <div class="px-4 py-3">
                                                <p class="text-sm leading-5"><?= $user->username ?></p>
                                                <p class="text-sm font-medium leading-5 text-gray-900 truncate"><?= $user->email ?></p>
                                            </div>
                                            <div class="py-1">
                                                <?php if ($user->role === 'author') : ?>
                                                <a href="index.php?page=wikis" tabindex="0" class="text-gray-700 flex justify-between w-full px-4 py-2 text-sm leading-5 text-left"  role="menuitem" >My Wikis</a>
                                                <?php endif; ?>
                                                <?php if ($user->role === 'admin') : ?>
                                                <a href="index.php?page=dashboard" tabindex="0" class="text-gray-700 flex justify-between w-full px-4 py-2 text-sm leading-5 text-left"  role="menuitem" >Dashboard</a>
                                                <?php endif; ?>
                                                <a href="index.php?page=all-wikis" tabindex="1" class="text-gray-700 flex justify-between w-full px-4 py-2 text-sm leading-5 text-left"  role="menuitem" >All Wikis</a>
                                                <span role="menuitem" tabindex="-1" class="flex justify-between w-full px-4 py-2 text-sm leading-5 text-left text-gray-700 cursor-not-allowed opacity-50" aria-disabled="true">New feature (soon)</span>
                                                <a href="javascript:void(0)" tabindex="2" class="text-gray-700 flex justify-between w-full px-4 py-2 text-sm leading-5 text-left" role="menuitem" >Home</a></div>
                                            <div class="py-1">
                                                <button onclick="logOut()" tabindex="3" class="text-gray-700 flex justify-between w-full px-4 py-2 text-sm leading-5 text-left"  role="menuitem" >Sign out</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <style>
                            .dropdown:focus-within .dropdown-menu {
                                opacity:1;
                                transform: translate(0) scale(1);
                                visibility: visible;
                            }
                        </style>
                        <!-- dropdown menu end -->

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

<!-- footer start-->
<?php if ($page !== 'dashboard' && $page !== 'wikis' && $page !== 'login' && $page !== 'register') { ?>
    <footer class="bg-white rounded-lg shadow dark:bg-gray-900 m-4">
        <div class="w-full max-w-screen-xl mx-auto p-4 md:py-8">
            <div class="sm:flex sm:items-center sm:justify-between">
                <a href="https://flowbite.com/" class="flex items-center mb-4 sm:mb-0 space-x-3 rtl:space-x-reverse">
                    <img src="<?= PATH . 'assets/img/wiki-Logo.png'?>" class="h-8" alt="Flowbite Logo" />
                    <span class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white">Wiki Website</span>
                </a>
                <ul class="flex flex-wrap items-center mb-6 text-sm font-medium text-gray-500 sm:mb-0 dark:text-gray-400">
                    <li>
                        <a href="#" class="hover:underline m-4 md:me-6">About</a>
                    </li>
                    <li>
                        <a href="#" class="hover:underline m-4 md:me-6">Privacy Policy</a>
                    </li>
                    <li>
                        <a href="#" class="hover:underline m-4 md:me-6">All Wikis</a>
                    </li>
                    <li>
                        <a href="#" class="hover:underline">Contact</a>
                    </li>
                </ul>
            </div>
            <hr class="my-6 border-gray-200 sm:mx-auto dark:border-gray-700 lg:my-8" />
            <span class="block text-sm text-gray-500 sm:text-center dark:text-gray-400">© 2023 <a href="https://flowbite.com/" class="hover:underline">Wiki™</a>. All Rights Reserved.</span>
        </div>
    </footer>
<?php } ?>
<!-- footer end -->

    <script src="<?= PATH ?>assets/js/main.js"></script>
    <script src="<?= PATH ?>assets/js/DOM.js"></script>
    <script src="<?= PATH ?>assets/js/register.js"></script>
    <script src="<?= PATH ?>assets/js/login.js"></script>
    <script src="<?= PATH ?>assets/js/logout.js"></script>
    <script src="<?= PATH ?>assets/js/wiki.js"></script>
    <script src="<?= PATH ?>/assets/js/search.js"></script>

</body>
</html>