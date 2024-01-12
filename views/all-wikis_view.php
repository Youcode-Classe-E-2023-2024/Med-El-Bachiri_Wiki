
<section class="dark:bg-gray-800 dark:text-gray-100">
     <div class="container max-w-6xl p-6 mx-auto space-y-6 sm:space-y-12">
         <div class="grid justify-center grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-3">
             <?php
             $wikis = Wiki::getAll();
             foreach ($wikis as $wiki) {
                 $limitedContent = strlen($wiki['content']) > 300 ? substr($wiki['content'], 0, 300) . '...' : $wiki['content'];
                 ?>
             <div rel="noopener noreferrer" class="max-w-sm mx-auto group hover:no-underline focus:no-underline dark:bg-gray-900">
                 <img role="presentation" class="object-cover w-full rounded h-44 dark:bg-gray-500" src="https://source.unsplash.com/random/480x360?1">
                 <div class="p-6 space-y-2">
                     <h3 class="text-2xl font-semibold group-hover:underline group-focus:underline"><?= $wiki['title'] ?></h3>
                     <span class="text-xs dark:text-gray-400"><?= $wiki['edit_at'] === null ? $wiki['create_at'] : $wiki['edit_at']; ?></span>
                     <p>
                         <?= $limitedContent ?>
                     </p>
                 </div>
                 <a href="index.php?page=read-wiki&id=<?= $wiki['id'] ?>" class="text-blue-500 underline">read more</a>
             </div>
             <?php } ?>
         </div>
     </div>
 </section>