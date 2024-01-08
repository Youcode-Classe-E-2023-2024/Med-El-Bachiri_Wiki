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
    <nav>

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



    <script src="<?= PATH ?>assets/js/main.js"></script>
    <script src="<?= PATH ?>assets/js/DOM.js"></script>
</body>
</html>