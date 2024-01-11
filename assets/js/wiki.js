// add wiki
let submitWiki = document.querySelector('#submitWiki');
const tags = document.querySelector('.selectedTags');
submitWiki.addEventListener('click', function (event) {
    let selectedTags = [];
    const options = tags.selectedOptions;
    for (let i = 0; i < options.length; i++) {
        selectedTags.push(options[i].value);
    }

    let title = document.querySelector('#wikiTitle');
    let content = document.querySelector('#wikiContent');
    let idCategory = document.querySelector('#wiki_id_category');

    if (title.value !== '' && content.value !== '' && idCategory.value !== '' && selectedTags.length !== 0) {
        let dataToSend = {
            type: 'addWiki',
            title: title.value,
            content: content.value,
            id_category: idCategory.value,
            tags: selectedTags
        };

        fetch('index.php?page=wikis', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
            },
            body: JSON.stringify(dataToSend),
        })
            .then(response => response.json())
            .then(data => {
                console.log(data);
                title.value = '';
                content.value = '';
                alert('WIKI ADDED!');
                displayUserWikis();
            })
            .catch(error => {
                console.error('Error:', error);
            });
    } else {
        alert('MUST FILL ALL INPUTS');
    }
});
//

// display wikis
function displayUserWikis() {
    const wikiBody = document.querySelector('#wikiBody');
    wikiBody.innerHTML = '';
    fetch('index.php?page=wikis', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
        },
        body: JSON.stringify({ type: 'getMyWikis' }),
    })
        .then(response => {
            return response.json();
        })
        .then(data => {
            data.forEach(wiki => {
                wikiBody.innerHTML += `
                <div id="${wiki.id}" class="ticketDiv bg-white max-w-4xl px-10 py-6 mx-auto rounded-lg shadow-sm border mb-4">
                    <div class="flex justify-between">
                        <div class="flex items-end">
                            <p rel="noopener noreferrer" class="mt-2 mr-4 opacity-70 text-center  bg-gradient-to-l text-black p-2 from-gray-400 font-medium rounded bg-white">${wiki.category_name}</p>
                            <p rel="noopener noreferrer" class="bg-gradient-to-l from-purple-700  p-2 font-bold rounded bg-blue-700 text-white">${wiki.status}</p>
                        </div>
                        <div class="flex h-10">
                            <button type="submit" onclick="deleteWiki(${wiki.id})" class="bg-red-500 p-2 mx-1 rounded-lg text-white shadow-xl hover:opacity-80">Delete</button>
                            <button type="submit" onclick="editWikiAlert(${wiki.id})" class="bg-purple-500 p-2 rounded-lg text-white shadow-xl hover:opacity-80">Edit</button>
                            <input id="titleWiki-${wiki.id}" type="hidden" value="${wiki.title}">
                            <input id="contentWiki-${wiki.id}" type="hidden" value="${wiki.content}">
                        </div>
                    </div>
                    <div class="flex items-center justify-between">
                        <p class="hover:underline text-green-500 text-sm text-gray-700 my-2">${wiki.tag_names}</p>
                    </div>
                    <div class="mt-3">
                        <p rel="noopener noreferrer" class="text-black text-2xl font-bold hover:underline">${wiki.title}</p>
                        <p class="text-black mt-2">${wiki.content.substring(0, 400)}...</p>
                    </div>
                    <div class="flex items-center justify-between m-4">
                        <form action="pages/ticketDetail.php" method="post">
                            <button rel="readMreBtn noopener noreferrer" class="hover:underline text-blue-400">Read more</button>
                            <input name="wikiId" type="hidden" value="${wiki.id}">
                            <input name="userId" type="hidden" value="${wiki.id_user}">
                        </form>
                    </div>
                </div>

                `;
            });
        })
        .catch(error => console.log(error));
}

displayUserWikis();
//
