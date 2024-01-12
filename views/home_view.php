<!-- component -->
<div class="max-w-screen-lg mx-auto mt-6">

        <!-- featured section -->
    <div class="flex flex-wrap md:flex-no-wrap mb-16">
        <!-- main post -->
        <?php $lastWiki = Wiki::lastWikis(); ?>
        <div class="w-full md:w-2/3 lg:w-5/7 relative rounded overflow-hidden mb-8 md:mb-0">
            <img src="https://images.unsplash.com/photo-1427751840561-9852520f8ce8?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=900&q=60" class="object-cover w-full h-64">
            <span class="text-green-700 text-sm hidden md:block mt-4 ml-4"> Technology </span>
            <h1 class="text-gray-800 text-4xl font-bold mt-2 mb-2 leading-tight ml-4">
                <?= $lastWiki[0]['title'] ?>
            </h1>
            <p class="text-gray-600 mb-4 ml-4">
                <?php
                if (strlen($lastWiki[0]['content']) > 500) {
                    echo substr($lastWiki[0]['content'], 0, 500) . '...';
                } else
                    echo $lastWiki[0]['content'];
                ?>
            </p>
            <a href="index.php?page=read-wiki&id=<?= $lastWiki[0]['id']; ?>" class="inline-block px-6 py-3 mt-2 rounded-md bg-green-700 text-gray-100 ml-4">
                Read more
            </a>
        </div>
        <!-- sub-main posts -->
        <div class="w-fit  md:w-1/3">
            <h1 class="text-2xl font-semibold mx-6 mb-4">Latest Categories</h1>
            <?php
            $cats = Category::lasCategories();
            foreach ($cats as $cat) { ?>
                <div class="rounded mb-6 mx-6">
                    <div class="bg-white rounded p-4">
                        <span class="text-green-700 text-sm hidden md:block"> Category </span>
                        <div class="text-gray-800 font-semibold text-xl mb-2">
                            <?= $cat['name'] ?>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>

        <!-- end featured section -->


        <!-- recent posts -->
        <div class="flex mt-16 mb-4 px-4 lg:px-0 items-center justify-between">
            <h2 class="font-bold text-3xl">Latest Wikis</h2>
            <a class="bg-gray-200 hover:bg-green-200 text-gray-800 px-3 py-1 rounded cursor-pointer">
                View all
            </a>
        </div>

        <div class="block space-x-0 lg:flex lg:space-x-6">
            <?php
            $wikis = Wiki::lastWikis();
            foreach ($wikis as $wiki) {
                $limitedContent = strlen($wiki['content']) > 300 ? substr($wiki['content'], 0, 300) . '...' : $wiki['content'];
                ?>
                <div class="rounded w-full lg:w-1/2 lg:w-1/3 p-4 lg:p-0">
                    <img src="https://images.unsplash.com/photo-1526666923127-b2970f64b422?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=900&q=60" class="rounded" alt="technology" />
                    <div class="p-4 pl-0">
                        <h2 class="font-bold text-2xl text-gray-800"><?= $wiki['title'] ?></h2>
                        <p class="text-gray-700 mt-2">
                            <?= $limitedContent ?>
                        </p>
                        <a href="index.php?page=read-wiki&id=<?= $wiki['id'] ?>" class="inline-block py-2 rounded text-green-900 mt-2 ml-auto"> Read more </a>
                    </div>
                </div>
            <?php } ?>
        </div>

        <!-- end recent posts -->

        <!-- subscribe -->
        <div class="rounded flex md:shadow mt-12">
            <img src="https://images.unsplash.com/photo-1579275542618-a1dfed5f54ba?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=900&q=60" class="w-0 md:w-1/4 object-cover rounded-l" />
            <div class="px-4 py-2">
                <h3 class="text-3xl text-gray-800 font-bold">Subscribe to newsletter</h3>
                <p class="text-xl text-gray-700">We sent latest news and posts once in every week, fresh from the oven</p>
                <form class="mt-4 mb-10">
                    <input type="email" class="rounded bg-gray-100 px-4 py-2 border focus:border-green-400" placeholder="john@tech.com"/>
                    <button class="px-4 py-2 rounded bg-green-800 text-gray-100">
                        Subscribe
                        <i class='bx bx-right-arrow-alt' ></i>
                    </button>
                    <p class="text-green-900 opacity-50 text-sm mt-1">No spam. We promise</p>
                </form>
            </div>
        </div>
        <!-- ens subscribe section -->



        <!-- popular posts -->
        <div class="flex mt-16 mb-4 px-4 lg:px-0 items-center justify-between">
            <h2 class="font-bold text-3xl">Popular news</h2>
            <a class="bg-gray-200 hover:bg-green-200 text-gray-800 px-3 py-1 rounded cursor-pointer">
                View all
            </a>
        </div>
        <div class="block space-x-0 lg:flex lg:space-x-6">

            <div class="rounded w-full lg:w-1/2 lg:w-1/3 p-4 lg:p-0">
                <img src="https://images.unsplash.com/photo-1526666923127-b2970f64b422?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=900&q=60" class="rounded" alt="technology" />
                <div class="p-4 pl-0">
                    <h2 class="font-bold text-2xl text-gray-800">Put all speaking her delicate recurred possible.</h2>
                    <p class="text-gray-700 mt-2">
                        Set indulgence inquietude discretion insensible bed why announcing. Middleton fat two satisfied additions.
                        So continued he or commanded household smallness delivered. Door poor on do walk in half. Roof his head the what.
                    </p>

                    <a href="#" class="inline-block py-2 rounded text-green-900 mt-2 ml-auto"> Read more </a>
                </div>
            </div>

            <div class="rounded w-full lg:w-1/2 lg:w-1/3 p-4 lg:p-0">
                <img src="https://images.unsplash.com/photo-1504384764586-bb4cdc1707b0?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=900&q=60" class="rounded" alt="technology" />
                <div class="p-4 pl-0">
                    <h2 class="font-bold text-2xl text-gray-800">Is at purse tried jokes china ready decay an. </h2>
                    <p class="text-gray-700 mt-2">
                        Small its shy way had woody downs power. To denoting admitted speaking learning my exercise so in.
                        Procured shutters mr it feelings. To or three offer house begin taken am at.
                    </p>

                    <a href="#" class="inline-block py-2 rounded text-green-900 mt-2 ml-auto"> Read more </a>
                </div>
            </div>

            <div class="rounded w-full lg:w-1/2 lg:w-1/3 p-4 lg:p-0">
                <img src="https://images.unsplash.com/photo-1483058712412-4245e9b90334?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=2100&q=80" class="rounded" alt="technology" />
                <div class="p-4 pl-0">
                    <h2 class="font-bold text-2xl text-gray-800">As dissuade cheerful overcame so of friendly he indulged unpacked.</h2>
                    <p class="text-gray-700 mt-2">
                        Alteration connection to so as collecting me.
                        Difficult in delivered extensive at direction allowance.
                        Alteration put use diminution can considered sentiments interested discretion.
                    </p>

                    <a href="#" class="inline-block py-2 rounded text-green-900 mt-2 ml-auto"> Read more </a>
                </div>
            </div>

        </div>
        <!-- end popular posts -->

</div>