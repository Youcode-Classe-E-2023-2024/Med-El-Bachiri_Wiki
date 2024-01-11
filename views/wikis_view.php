<button onclick="addWikiAlert()" class="bg-purple-600 m-2 hover:opacity-80 shadow-xl rounded-full py-2 px-4 text-white">Add Wiki</button>

<div value="${ticket.ticketId}" class="ticketDiv bg-white max-w-4xl px-10 py-6 mx-auto rounded-lg shadow-sm border mb-4">
    <div class="flex justify-between">
        <div class="usersAndProfiles flex bg-gray-100 rounded-xl p-2">
            <!-- User names and profiles will be displayed here -->
        </div>
        <div class="flex items-end">
            <p rel="noopener noreferrer" class="mt-2 mr-4 opacity-70 text-center  bg-gradient-to-l text-black p-2 from-gray-400 font-medium rounded bg-white">${ticket.status}</p>
            <p rel="noopener noreferrer" class="bg-gradient-to-l from-purple-700  p-2 font-bold rounded bg-blue-700 text-white">${ticket.priority}</p>
        </div>
    </div>
    <div class="flex items-center justify-between">
        <p class="hover:underline text-green-500 text-sm text-gray-700 my-2">#${ticket.tag}</p>
    </div>
    <div class="mt-3">
        <a rel="noopener noreferrer" href="#" class="text-black text-2xl font-bold hover:underline">${ticket.title}</a>
        <p class="text-black mt-2">${ticket.description}</p>
    </div>
    <div class="flex items-center justify-between m-4">
        <form action="pages/ticketDetail.php" method="post">
            <button rel="readMreBtn noopener noreferrer" class="hover:underline text-blue-400">Read more</button>
            <input name="ticketId" type="hidden" value="${ticket.ticketId}">
            <input name="userId" type="hidden" value="${ticket.userId}">
        </form>
        <div>
            <a rel="noopener noreferrer" href="#" class="flex items-center">
                <p class="text-sm text-gray-600">Created By</p>
                <img src="img/${ticket.imagePath}" alt="avatar" class="object-cover w-10 h-10 mx-4 rounded-full bg-gray-500">
                <p class="text-black">${ticket.username}</p>
            </a>
        </div>
    </div>
</div>


<div>
    <div class="max-w-md mx-auto p-6 bg-white rounded-md shadow-md">
        <h2 class="text-2xl font-bold mb-4">Create a Wiki</h2>

        <div class="mb-4">
            <label for="wikiTitle" class="block text-gray-600">Title</label>
            <input type="text" id="wikiTitle" placeholder="" class="border form-input mt-1 block w-full rounded-md">
        </div>

        <div class="mb-4">
            <label for="wikiContent" class="block text-gray-600">Description</label>
            <textarea rows="4" id="wikiContent" placeholder="" class="border form-input mt-1 block w-full rounded-md"></textarea>
        </div>

        <div class="grid grid-cols-2 gap-4 border my-4">

            <div>
                <label for="category" class="block text-gray-600">
                    Category

                    <select id="wiki_id_category" class="categoriesGoHere border form-select mt-1 block w-full rounded-md">
                        <!-- display categories here -->
                    </select>
                </label>
            </div>
        </div>

        <div class="my-4 border">
            <label for="tagsGoHereAuthor" class="block text-gray-600">Choose Tags</label>
            <select id="tagsGoHereAuthor" class="selectedTags form-multiselect mt-1 block w-full rounded-md" multiple>
                <!-- display tags here  -->
            </select>
        </div>

        <button id="submitWiki" type="button" onclick="" class="bg-purple-700 w-full text-white py-2 px-4 rounded-md hover:bg-purple-600">Submit</button>
    </div>

</div>
