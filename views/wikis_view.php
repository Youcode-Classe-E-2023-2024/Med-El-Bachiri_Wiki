<p onclick="addWikiShowFrom()" class="bg-purple-600 m-2 w-32 flex justify-center hover:opacity-80 shadow-xl border-black border cursor-pointer rounded-full py-2 px-4 text-white">Add Wiki</p>

<div id="wikiBody">

</div>

<div id="addWikiForm" class="absolute shadow-xl bg-gray-800 text-white" style="top: 15%; right: 36%; width: 400px; padding: 20px; border-radius: 10px; display: none;">
    <button class="float-right text-gray-400 hover:text-gray-200" onclick="closeWikiForm()">X</button>
    <h2 class="text-2xl font-bold mb-4">Create a Wiki</h2>

    <div class="mb-4">
        <label for="wikiTitle" class="block text-gray-400">Title</label>
        <input type="text" id="wikiTitle" placeholder="" class="text-black px-3 py-1 form-input mt-1 block w-full rounded-md">
    </div>

    <div class="mb-4">
        <label for="wikiContent" class="block text-gray-400">Description</label>
        <textarea rows="4" id="wikiContent" placeholder="" class="form-input mt-1 text-black px-3 py-1 block w-full rounded-md"></textarea>
    </div>

    <div class="grid grid-cols-2 gap-4 my-4">
        <div>
            <label for="category" class="block text-gray-400">
                Category
                <select id="wiki_id_category" class="categoriesGoHere border-none form-select mt-1 block w-full rounded-md text-gray-800">
                    <!-- display categories here -->
                </select>
            </label>
        </div>
    </div>

    <div class="my-4">
        <label for="tagsGoHereAuthor" class="block text-gray-400">Choose Tags</label>
        <select id="tagsGoHereAuthor" class="selectedTags text-black form-multiselect mt-1 block w-full rounded-md" multiple>
            <!-- display tags here  -->
        </select>
    </div>

    <button id="submitWiki" type="button" onclick="" class="bg-purple-700 w-full text-white py-2 px-4 rounded-md hover:bg-purple-600">Submit</button>
    <button id="editWikiSubmit" style="display: none;" type="button" onclick="saveWikiEdit()" class="bg-yellow-500 w-full text-white py-2 px-4 rounded-md hover:bg-purple-600">Save</button>
    <input type="hidden" id="currentWikiID">

</div>

<script>
    // add wiki form dom
    const addWikiForm = document.querySelector('#addWikiForm');

    function addWikiShowFrom() {
        addWikiForm.style.display = (addWikiForm.style.display === 'block') ? 'none' : 'block';
    }

    function closeWikiForm() {
        addWikiForm.style.display = 'none';
    }
</script>