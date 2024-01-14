<div
        id="view"
        class="flex h-full flex-row"
>
    <div
            id="sidebar"
            class="bg-white h-screen md:block shadow-xl px-3 w-30 md:w-60 lg:w-60 overflow-x-hidden transition-transform duration-300 ease-in-out"
            x-show="sidenav"
            @click.away="sidenav = false"
    >
        <div class="space-y-6 md:space-y-10 mt-10">
            <div id="profile" class="space-y-3">
                <img
                        src="<?= PATH . 'assets/img/' . $user->image ?>"
                        alt="Avatar user"
                        class="w-10 md:w-16 rounded-full mx-auto"
                />
                <div>
                    <h2
                            class="font-medium text-xs md:text-sm text-center text-teal-500"
                    >
                        <?= $user->username; ?>
                    </h2>
                    <p class="text-xs text-gray-500 text-center">Administrator</p>
                </div>
            </div>

            <div id="menu" class="flex flex-col space-y-2">
                <div
                        onclick="hideDivs(0)"
                        class="btnDiv text-sm cursor-pointer font-medium text-gray-700 py-2 px-2 hover:text-base rounded-md transition duration-150 ease-in-out"
                >
                    <svg
                            class="w-6 h-6 fill-current inline-block"
                            fill="currentColor"
                            viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg"
                    >
                        <path
                                d="M5 3a2 2 0 00-2 2v2a2 2 0 002 2h2a2 2 0 002-2V5a2 2 0 00-2-2H5zM5 11a2 2 0 00-2 2v2a2 2 0 002 2h2a2 2 0 002-2v-2a2 2 0 00-2-2H5zM11 5a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V5zM11 13a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"
                        ></path>
                    </svg>
                    <span class="">Categories</span>
                </div>

                <div
                        onclick="hideDivs(1)"
                        class="btnDiv text-sm cursor-pointer font-medium text-gray-700 py-2 px-2 rounded-md transition duration-150 ease-in-out"
                >
                    <svg
                            class="w-6 h-6 fill-current inline-block"
                            fill="currentColor"
                            viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg"
                    >
                        <path
                                fill-rule="evenodd"
                                d="M3 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm0 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm0 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm0 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z"
                                clip-rule="evenodd"
                        ></path>
                    </svg>
                    <span class="">Tags</span>
                </div>

                <div
                        onclick="hideDivs(2)"
                        class="btnDiv text-sm font-medium text-gray-700 py-2 px-2 cursor-pointer rounded-md transition duration-150 ease-in-out"
                >
                    <svg
                            class="w-6 h-6 fill-current inline-block"
                            fill="currentColor"
                            viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg"
                    >
                        <path
                                d="M11 17a1 1 0 001.447.894l4-2A1 1 0 0017 15V9.236a1 1 0 00-1.447-.894l-4 2a1 1 0 00-.553.894V17zM15.211 6.276a1 1 0 000-1.788l-4.764-2.382a1 1 0 00-.894 0L4.789 4.488a1 1 0 000 1.788l4.764 2.382a1 1 0 00.894 0l4.764-2.382zM4.447 8.342A1 1 0 003 9.236V15a1 1 0 00.553.894l4 2A1 1 0 009 17v-5.764a1 1 0 00-.553-.894l-4-2z"
                        ></path>
                    </svg>
                    <span class="">Wikis</span>
                </div>
                <div
                        onclick="hideDivs(3)"
                        class="btnDiv text-sm font-medium text-gray-700 py-2 px-2 cursor-pointer rounded-md transition duration-150 ease-in-out"
                >
                    <svg
                            class="w-6 h-6 fill-current inline-block"
                            fill="currentColor"
                            viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg"
                    >
                        <path
                                d="M11 17a1 1 0 001.447.894l4-2A1 1 0 0017 15V9.236a1 1 0 00-1.447-.894l-4 2a1 1 0 00-.553.894V17zM15.211 6.276a1 1 0 000-1.788l-4.764-2.382a1 1 0 00-.894 0L4.789 4.488a1 1 0 000 1.788l4.764 2.382a1 1 0 00.894 0l4.764-2.382zM4.447 8.342A1 1 0 003 9.236V15a1 1 0 00.553.894l4 2A1 1 0 009 17v-5.764a1 1 0 00-.553-.894l-4-2z"
                        ></path>
                    </svg>
                    <span class="">Statistic</span>
                </div>


            </div>
        </div>
    </div>

    <div class="divs">
        <!-- add cat div -->
        <div class="py-6 px-8 bg-gray-600 rounded-md shadow-md absolute" style="top: 33%; right: 5%;">
            <h1 class="text-white text-2xl font-bold mb-4">Add Category</h1>
            <div class="mb-4">
                <label for="catName" class="text-white">Category Name:</label>
                <input id="catName" type="text"
                       class="block w-full px-4 py-2 rounded-md border border-gray-300 focus:outline-none focus:border-blue-500">
            </div>
            <button onclick="addCat()" type="submit"
                    class="border border-white bg-purple-800 text-white py-2 px-4 rounded-md hover:bg-purple-600 focus:outline-none focus:shadow-outline-blue active:bg-blue-800">
                Add
            </button>
        </div>
        <div style="top: 30%; left: 43%;"
             class="overflow-auto max-h-96 absolute rounded-lg border border-gray-200 shadow-md m-5 w-96">
            <table class="w-full border-collapse bg-white text-left text-sm text-gray-500">
                <thead class="bg-gray-50">
                <tr>
                    <th scope="col" class="px-6 py-4 font-medium text-gray-900">Category Name</th>
                </tr>
                </thead>
                <tbody id="catGoHere" class="divide-y divide-gray-100 border-t border-gray-100">
                <!-- display category here -->

                </tbody>
            </table>
        </div>
    </div>

    <div class="divs">
        <div class="py-6 px-8 bg-gray-600 rounded-md shadow-md absolute" style="top: 33%; right: 5%;">
            <h1 class="text-white text-2xl font-bold mb-4">Add Tag</h1>
            <div class="mb-4">
                <label for="tagName" class="text-white">Tag Name:</label>
                <input id="tagName" type="text"
                       class="block w-full px-4 py-2 rounded-md border border-gray-300 focus:outline-none focus:border-blue-500">
            </div>
            <button onclick="addTag()" type="submit"
                    class="border border-white bg-purple-800 text-white py-2 px-4 rounded-md hover:bg-purple-600 focus:outline-none focus:shadow-outline-blue active:bg-blue-800">
                Add
            </button>
        </div>
        <div style="top: 30%; left: 43%;"
             class="overflow-auto max-h-96 absolute rounded-lg border border-gray-200 shadow-md m-5 w-96">
            <table class="w-full border-collapse bg-white text-left text-sm text-gray-500">
                <thead class="bg-gray-50">
                <tr>
                    <th scope="col" class="px-6 py-4 font-medium text-gray-900">Tag Name</th>
                </tr>
                </thead>
                <tbody id="tagsGoHere" class="divide-y divide-gray-100 border-t border-gray-100">
                <!-- display tags here -->

                </tbody>
            </table>
        </div>
    </div>
    <div class="divs container mx-auto p-4 md:p-8">
        <div class="flex items-center justify-between mb-4">
            <a href="index.php?page=wikis" class="btn-add-wiki">
                <p class="text-white bg-purple-500 w-20 flex justify-center rounded-xl p-1">Add Wiki</p>
            </a>
        </div>

        <div style="max-height: 500px;" class="mt-2 overflow-y-auto grid gap-8 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4">
            <?php foreach (Wiki::getAll() as $wiki) : ?>
                <div class="wiki-card bg-blue-800 rounded-xl p-4">
                    <p class="text-2xl font-semibold text-white"><?= substr($wiki['title'], 0, 50) . '...' ?></p>
                    <p class="pb-8 text-sm text-white"><?= substr($wiki['content'], 0, 150) . '...';?></p>
                    <p class="text-sm text-green-400"><?= $wiki['tag_names'] ?></p>
                    <p class="text-sm text-blue-200 my-2"><?= $wiki['category_name'] ?></p>
                    <p class="text-sm text-white my-2" style="font-size: 10px">Created At :<?= $wiki['create_at'] ?></p>
                    <div class="flex justify-between items-center">
                        <form action="index.php?page=dashboard" method="post">
                            <button name="archiveWikiBtn" class="text-red-500 bg-white p-2 rounded-xl">
                                Archive
                            </button>
                            <input type="hidden" value="<?= $wiki['id'] ?>" name="wikiID">
                        </form>

                        <a href="index.php?page=read-wiki&id=<?= $wiki['id'] ?>" class="text-white underline">
                            View
                        </a>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>

    <div class="divs container mx-auto p-4 md:p-8">
        <!-- Statistics Cards -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 p-4 gap-4">
            <div class="bg-blue-500 dark:bg-gray-800 shadow-lg rounded-md flex items-center justify-between p-3 border-b-4 border-blue-600 dark:border-gray-600 text-white font-medium group">
                <div class="flex justify-center items-center w-14 h-14 bg-white rounded-full transition-all duration-300 transform group-hover:rotate-12">
                    <svg width="30" height="30" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                         class="stroke-current text-blue-800 dark:text-gray-800 transform transition-transform duration-500 ease-in-out">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                    </svg>
                </div>
                <div class="text-right">
                    <p class="text-2xl"><?= User::countUsers() ?></p>
                    <p>Users</p>
                </div>
            </div>
            <div class="bg-blue-500 dark:bg-gray-800 shadow-lg rounded-md flex items-center justify-between p-3 border-b-4 border-blue-600 dark:border-gray-600 text-white font-medium group">
                <div class="flex justify-center items-center w-14 h-14 bg-white rounded-full transition-all duration-300 transform group-hover:rotate-12">
                    <svg width="30" height="30" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                         class="stroke-current text-blue-800 dark:text-gray-800 transform transition-transform duration-500 ease-in-out">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path>
                    </svg>
                </div>
                <div class="text-right">
                    <p class="text-2xl"><?= Wiki::countWikis() ?></p>
                    <p>Wikis</p>
                </div>
            </div>
            <div class="bg-blue-500 dark:bg-gray-800 shadow-lg rounded-md flex items-center justify-between p-3 border-b-4 border-blue-600 dark:border-gray-600 text-white font-medium group">
                <div class="flex justify-center items-center w-14 h-14 bg-white rounded-full transition-all duration-300 transform group-hover:rotate-12">
                    <svg width="30" height="30" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                         class="stroke-current text-blue-800 dark:text-gray-800 transform transition-transform duration-500 ease-in-out">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"></path>
                    </svg>
                </div>
                <div class="text-right">
                    <p class="text-2xl"><?= Category::countCategories() ?></p>
                    <p>Categories</p>
                </div>
            </div>
            <div class="bg-blue-500 dark:bg-gray-800 shadow-lg rounded-md flex items-center justify-between p-3 border-b-4 border-blue-600 dark:border-gray-600 text-white font-medium group">
                <div class="flex justify-center items-center w-14 h-14 bg-white rounded-full transition-all duration-300 transform group-hover:rotate-12">
                    <svg fill="#000000" stroke="currentColor" height="30px" width="30px" version="1.1" id="Capa_1"
                         xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                         viewBox="0 0 490 490" xml:space="preserve">
                            <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                        <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                        <g id="SVGRepo_iconCarrier">
                            <path d="M64.333,490h58.401l33.878-137.69h122.259L245.39,490h58.401l33.878-137.69h119.92v-48.162h-108.24l29.2-117.324h79.04 v-48.162H390.23L424.108,0H365.31l-33.878,138.661H208.79L242.668,0h-58.415l-33.864,138.661H32.411v48.162h106.298l-28.818,117.324 h-77.48v48.162h65.8L64.333,490z M197.11,186.824h122.642l-29.2,117.324H168.292L197.11,186.824z"></path>
                        </g>
                        </svg>

                </div>
                <div class="text-right">
                    <p class="text-2xl"><?= Tag::countTags() ?></p>
                    <p>Tags</p>
                </div>
            </div>
        </div>
        <!-- ./Statistics Cards -->
        <div class="flex justify-center">
            <canvas id="myChart" style="width:100%;max-width:600px"></canvas>
        </div>
    </div>
</div>

<script>
    var xValues = ["Wikis", "Categories", "Tags", "Users"];
    var yValues = [<?= Wiki::countWikis() ?>, <?= Category::countCategories() ?>, <?= Tag::countTags() ?>, <?= User::countUsers() ?>];
    var barColors = [
        "#b91d47",
        "#00aba9",
        "#2b5797",
        "#e8c3b9",
        "#1e7145"
    ];

    new Chart("myChart", {
        type: "pie",
        data: {
            labels: xValues,
            datasets: [{
                backgroundColor: barColors,
                data: yValues
            }]
        },
        options: {
            title: {
                display: true,
                text: "Wiki Statistics"
            }
        }
    });
</script>