
<div
        id="view"
        class="h-full w-screen flex flex-row"
        x-data="{ sidenav: true }"
>
    <button
            @click="sidenav = true"
            class="p-2 border-2 bg-white rounded-md border-gray-200 shadow-lg text-gray-500 focus:bg-teal-500 focus:outline-none focus:text-white absolute top-0 left-0 sm:hidden"
    >
        <svg
                class="w-5 h-5 fill-current"
                fill="currentColor"
                viewBox="0 0 20 20"
                xmlns="http://www.w3.org/2000/svg"
        >
            <path
                    fill-rule="evenodd"
                    d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z"
                    clip-rule="evenodd"
            ></path>
        </svg>
    </button>
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
            <input id="catName" type="text" class="block w-full px-4 py-2 rounded-md border border-gray-300 focus:outline-none focus:border-blue-500">
        </div>
        <button onclick="addCat()" type="submit" class="border border-white bg-purple-800 text-white py-2 px-4 rounded-md hover:bg-purple-600 focus:outline-none focus:shadow-outline-blue active:bg-blue-800">
            Add
        </button>
    </div>
    <div style="top: 30%; left: 43%;" class="overflow-auto max-h-96 absolute rounded-lg border border-gray-200 shadow-md m-5 w-96">
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
            <input id="tagName" type="text" class="block w-full px-4 py-2 rounded-md border border-gray-300 focus:outline-none focus:border-blue-500">
        </div>
        <button onclick="addTag()" type="submit" class="border border-white bg-purple-800 text-white py-2 px-4 rounded-md hover:bg-purple-600 focus:outline-none focus:shadow-outline-blue active:bg-blue-800">
            Add
        </button>
    </div>
    <div style="top: 30%; left: 43%;" class="overflow-auto max-h-96 absolute rounded-lg border border-gray-200 shadow-md m-5 w-96">
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
<div class="divs">
    wikis
</div>