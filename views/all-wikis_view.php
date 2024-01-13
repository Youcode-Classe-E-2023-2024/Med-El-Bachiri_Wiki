<?php //dd(Search::searchForTitles('2')); ?>
<section class="dark:bg-gray-800 dark:text-gray-100">

     <div class="container max-w-6xl p-6 mx-auto space-y-6 sm:space-y-12">

         <div class="mx-auto justify-between flex flex-col md:flex-row items-center p-4 md:p-6 space-y-2 md:space-y-0 md:space-x-4 bg-white rounded-xl shadow-lg hover:shadow-xl transform hover:scale-105 transition duration-500">
             <div class="flex bg-gray-100 p-2 md:p-4 md:w-48 w-full space-x-2 md:space-x-4 rounded-lg" style="width: 100%;">
                 <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 md:h-6 md:w-6 opacity-30" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                     <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                 </svg>
                 <input id="searchInput" class="bg-gray-100 outline-none flex-grow text-sm md:text-base w-full" type="text" placeholder="Search..." />
             </div>
             <div class="flex items-center space-x-2">
                 <select id="searchBy" class="text-sm md:text-base text-gray-800 outline-none border-2 px-2 md:px-4 py-1 md:py-2 rounded-lg focus:outline-none focus:ring focus:border-blue-300 duration-3000 cursor-pointer focus:outline">
                     <option value="title">Title</option>
                     <option value="category">Category</option>
                     <option value="tag">Tag</option>
                 </select>
                 <button onclick="searchWiki()" class="bg-gray-800 py-2 px-3 text-white font-semibold rounded-lg hover:shadow-lg transition hover:opacity-90 focus:outline-none focus:ring focus:border-blue-300 duration-3000 cursor-pointer focus:outline text-sm md:text-base">
                     <span>Search</span>
                 </button>
             </div>
         </div>



         <div id="displayWikiCards" class="grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-3">
             <?php
             $wikis = Wiki::getAll();
             foreach ($wikis as $wiki) {
                 $limitedContent = strlen($wiki['content']) > 300 ? substr($wiki['content'], 0, 300) . '...' : $wiki['content'];
                 ?>
                 <div class="h-fit bg-white shadow-md border border-gray-200 rounded-lg max-w-sm dark:bg-gray-800 dark:border-gray-700 overflow-hidden">
                     <a href="index.php?page=read-wiki&id=<?= $wiki['id'] ?>">
                         <p style="z-index: 999;" class="absolute rounded-sm text-sm text-gray-600 px-2 py-1 bg-yellow-200"><?= $wiki['category_name'] ?></p>
                         <img class="w-full h-40 relative" src="https://flowbite.com/docs/images/blog/image-1.jpg" alt="<?= $wiki['title'] ?>">
                     </a>
                     <div class="p-4">
                         <a href="index.php?page=read-wiki&id=<?= $wiki['id'] ?>">
                             <h5 class="text-gray-900 font-bold text-lg mb-2 dark:text-white"><?= $wiki['title'] ?></h5>
                         </a>
                         <p class="font-normal text-gray-700 mb-3 dark:text-gray-400"><?= $limitedContent ?></p>
                         <div class="flex flex-wrap my-2">
                             <?php
                             $tags = explode('#', $wiki['tag_names']);
                             foreach ($tags as $tag) {
                                 echo "<p class='tag text-gray-900 py-1 px-3 bg-gray-400 shadow-xl text-center rounded-full m-1'>#" . $tag . "</p>";
                             }
                             ?>
                         </div>
                         <a href="index.php?page=read-wiki&id=<?= $wiki['id'] ?>" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-3 py-2 text-center inline-flex items-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                             Read more
                             <svg class="-mr-1 ml-2 h-4 w-4" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                 <path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                             </svg>
                         </a>
                     </div>
                 </div>
             <?php } ?>
         </div>
     </div>
 </section>