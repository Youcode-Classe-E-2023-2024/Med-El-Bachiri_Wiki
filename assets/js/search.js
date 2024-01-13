const displayWikiCards = document.querySelector('#displayWikiCards');
const searchBy = document.querySelector('#searchBy');
const searchInput = document.querySelector('#searchInput');

function searchWiki() {
    displayWikiCards.innerHTML = '';
    fetch('index.php?page=all-wikis&search_by_' + searchBy.value + '=' + searchInput.value, {
        method: 'GET',
        headers: {
            'Content-Type': 'application/json',
        },
    })
        .then(response => response.json())
        .then(data => {
            console.log(data);
            data.forEach((wiki) => {
                const tagsArray = wiki.tag_names.split(', ');
                let tagsString = tagsArray.map(tag => `<p class="bg-gray-400 p-2 rounded-full text-white mr-2">${tag}</p>`).join('\n');
                displayWikiCards.innerHTML += `
                <div class="h-fit bg-white shadow-md border border-gray-200 rounded-lg max-w-sm dark:bg-gray-800 dark:border-gray-700 overflow-hidden">
                         <a href="index.php?page=read-wiki&id=<?= $wiki['id'] ?>">
                             <p style="z-index: 999;" class="absolute rounded-sm text-sm text-gray-600 px-2 py-1 bg-yellow-200">${wiki.category_name}</p>
                             <img class="w-full h-40 relative" src="https://flowbite.com/docs/images/blog/image-1.jpg" alt="<?= $wiki['title'] ?>">
                         </a>
                         <div class="p-4">
                             <div>
                                 <h5 class="text-gray-900 font-bold text-lg mb-2 dark:text-white">${wiki.title}</h5>
                             </div>
                             <p class="font-normal text-gray-700 mb-3 dark:text-gray-400">${wiki.content.substring(0, 300)}</p>
                             <div class="flex flex-wrap my-2">
                                 ${tagsString}
                             </div>
                             <a href="index.php?page=read-wiki&id=${wiki.id}" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-3 py-2 text-center inline-flex items-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                 Read more
                                 <svg class="-mr-1 ml-2 h-4 w-4" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                     <path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                                 </svg>
                             </a>
                         </div>
                     </div>
                `;

            });
        })
        .catch(error => console.log(error));
}