<?php
if (isset($_GET['id']) && !empty($_GET['id'])) {
    try {
        $currentWiki = Wiki::getWiki($_GET['id']);
    } catch (Exception $e) {
        echo $e->getMessage();
    }
}
?>

<!-- component -->
<div class="max-w-screen-lg mx-auto mt-8">
    <div class="mb-4 md:mb-0 w-full mx-auto relative">
        <div class="px-4 lg:px-0">
            <h2 class="text-4xl font-semibold text-gray-800 leading-tight">
                <?= $currentWiki['title']; ?>
            </h2>
            <div class="flex justify-between">
                <p
                    class="py-2 text-green-700 inline-flex items-center justify-center mb-2"
                >
                    <?= $currentWiki['tag_names']; ?>
                </p>
                <p class="bg-gray-400 text-white rounded-lg px-4 py-1  h-8"><?= $currentWiki['category_name'] ?></p>
            </div>
        </div>

        <img src="https://images.unsplash.com/photo-1587614387466-0a72ca909e16?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=2100&q=80" class="w-full object-cover lg:rounded" style="height: 28em;"/>
    </div>

    <div class="flex flex-col lg:flex-row lg:space-x-12">

        <div class="px-4 lg:px-0 mt-12 text-gray-700 text-lg leading-relaxed w-full lg:w-3/4">
            <p class="pb-6">
                <?= $currentWiki['content']; ?>
            </p>

        </div>

        <div class="w-full lg:w-1/4 m-auto mt-12 max-w-screen-sm">
            <div class="p-4 border-t border-b md:border md:rounded">
                <div class="flex py-2">
                    <img src="<?= PATH . 'assets/img/' . $currentWiki['image']; ?>"
                         class="h-10 w-10 rounded-full mr-2 object-cover" />
                    <div>
                        <p class="font-semibold text-gray-700 text-sm"> <?= $currentWiki['username']; ?></p>
                        <p class="font-semibold text-gray-600 text-xs"> <?= $currentWiki['role']; ?> </p>
                    </div>
                </div>
                <p class="text-gray-700 py-3">
                    <?= $currentWiki['email']; ?>
                </p>
                <button class="px-2 py-1 text-gray-100 bg-green-700 flex w-full items-center justify-center rounded">
                    Follow
                    <i class='bx bx-user-plus ml-2' ></i>
                </button>
            </div>
        </div>

    </div>
        <p class="text-gray-500 w-full items-end"><?= $currentWiki['status']?> <span class="text-sm underline"><?= 'since ' . $currentWiki['create_at']  ?></span></p>

</div>