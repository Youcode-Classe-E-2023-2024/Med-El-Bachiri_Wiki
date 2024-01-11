const catGoHere = document.querySelector('#catGoHere');
const addCatBtn = document.querySelector('#addCatBtn');

// add category
function addCat() {
    let catName = document.querySelector('#catName')
    if (catName.value !== '') {
        fetch('index.php?page=dashboard', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
            },
            body: JSON.stringify({ type: 'addCat', name: catName.value }),
        })
            .then(response => {
                console.log(response.status);
                return response.json();
            })
            .then(data => {
                if (data) {
                    catName.value = '';
                    alert('CATEGORY ADDED !');
                    getAllCatAdmin();
                }

            })
            .catch(error => console.log(error));
    } else {
        alert('MUST FILL THE INPUT');
    }
}
//

// get all categories for admin
function getAllCatAdmin() {
    if (catGoHere !== null) {
        catGoHere.innerHTML = '';
    }
    fetch('index.php?page=dashboard', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
        },
        body: JSON.stringify({type: 'getCat'}),
    })
        .then(response => {
            console.log(response.status);
            return response.json();
        })
        .then(data => {
            data.forEach(cat => {
                catGoHere.innerHTML += `
        <tr class="hover:bg-gray-50">

            <td id="currentCatName-${cat.id}" class="px-6 py-4 text-purple-600 w-full">${cat.name}</td>

            <td class="px-6 py-4">
                <div class="flex justify-end gap-4">
                    <button onclick="deleteCat(${cat.id})" class="hover:bg-gray-300 rounded-full p-2">
                        <svg
                                xmlns="http://www.w3.org/2000/svg"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke-width="1.5"
                                stroke="currentColor"
                                class="h-6 w-6"
                                x-tooltip="tooltip"
                        >
                            <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0"
                            />
                        </svg>
                    </button>
                    <button onclick="editCatAlert(${cat.id})" class="hover:bg-gray-300 rounded-full p-2">
                        <svg
                                xmlns="http://www.w3.org/2000/svg"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke-width="1.5"
                                stroke="currentColor"
                                class="h-6 w-6"
                                x-tooltip="tooltip"
                        >
                            <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L6.832 19.82a4.5 4.5 0 01-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 011.13-1.897L16.863 4.487zm0 0L19.5 7.125"
                            />
                        </svg>
                    </button>
                </div>
            </td>
        </tr>

                `;
            })
        })
        .catch(error => console.log(error));
}

getAllCatAdmin();
//

// get all categories for author
function getAllCatAuthor() {
    const categoriesGoHere = document.querySelector('.categoriesGoHere');

    categoriesGoHere.innerHTML = '';
    fetch('index.php?page=wikis', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
        },
        body: JSON.stringify({type: 'getCat'})
    })
        .then(response => {
            console.log(response.status);
            return response.json();
        })
        .then(data => {
            data.forEach(cat => {
                categoriesGoHere.innerHTML += `<option value="${cat.id}">${cat.name}</option>`;
            })
        })
        .catch(error => console.log(error));
}

getAllCatAuthor();
//

// edit category pop up / alert
function editCatAlert(id) {
    let currentCatName = document.querySelector('#currentCatName-' + id);

    window.document.body.innerHTML += `
                <div id="editCatForm" style="left: 30%; top: 33%;" class="fixed top-1/4 left-1/2 transform -translate-x-1/2 bg-white shadow-xl rounded p-8">
                    <div class="flex justify-between items-center mb-6">
                        <h2 class="text-2xl font-bold">Edit Item</h2>
                        <button onclick="closeEditForm()" class="text-gray-500 hover:text-gray-700 focus:outline-none">
                            <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                            </svg>
                        </button>
                    </div>
                    <div class="mb-4">
                        <label for="name" class="block text-gray-700 text-sm font-bold mb-2">Name:</label>
                        <input id="catName-${id}" type="text" value="${currentCatName.innerHTML}" name="" class="w-full border rounded-md px-3 py-2 focus:outline-none focus:border-blue-500">
                    </div>
                    <button onclick="editCat(${id})" type="submit" class="bg-purple-500 text-white py-2 px-4 rounded-md hover:bg-purple-600 focus:outline-none focus:shadow-outline-blue active:bg-yellow-800">
                        Save
                    </button>
                </div>
`;
}
//

// closeEditForm function
function closeEditForm() {
    document.querySelector('#editCatForm').remove();
}

// edit category
function editCat(catId) {
    const catName = document.querySelector('#catName-' + catId);
    const dataToSend = {type: 'editCat', name: catName.value, id: catId};
    fetch('index.php?page=dashboard', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
        },
        body: JSON.stringify(dataToSend),
    })
        .then(response => {
            console.log(response.status);
            return response.json();
        })
        .then(data => {
            closeEditForm();
        })
        .then(()=>{
            getAllCatAdmin();
        })
        .catch(error => console.log(error));
}
//

// delete category

function deleteCat(id) {
    fetch('index.php?page=dashboard', {
        method: 'DELETE',
        headers: {
            'Content-Type': 'application/json',
        },
        body: JSON.stringify({type: 'deleteCat', id: id}),
    })
        .then(response => {
            console.log(response.status);
            return response.json();
        })
        .then(data => console.log(data))
        .catch(error => console.error(error));

}

// add tag

function addTag() {
    const tagName = document.querySelector('#tagName');

    if (tagName.value !== '') {
        fetch('index.php?page=dashboard', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
            },
            body: JSON.stringify({ type: 'addTag', tagName: tagName.value }),
        })
            .then(response => {
                console.log(response.status);
                return response.json();
            })
            .then(data => {
                if (data) {
                    tagName.value = '';
                    alert('TAG ADDED !');
                    getAllTagsForAdmin();
                }

            })
            .catch(error => console.log(error));
    } else {
        alert('MUST FILL THE INPUT');
    }
}

// get all tags for admin
function getAllTagsForAdmin() {
    const tagsGoHere = document.querySelector('#tagsGoHere');
    if (tagsGoHere !== null) {
        tagsGoHere.innerHTML = '';
    }
    fetch('index.php?page=dashboard', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
        },
        body: JSON.stringify({ type: 'getTags' }),
    })
        .then(response => {
            console.log(response.status);
            return response.json();
        })
        .then(data => {
            data.forEach(tag => {
                tagsGoHere.innerHTML += `
                    <tr class="hover:bg-gray-50">

            <td id="currentTagName-${tag.id}" class="px-6 py-4 text-purple-600 w-full">${tag.name}</td>

            <td class="px-6 py-4">
                <div class="flex justify-end gap-4">
                    <button onclick="deleteTag(${tag.id})" class="hover:bg-gray-300 rounded-full p-2">
                        <svg
                                xmlns="http://www.w3.org/2000/svg"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke-width="1.5"
                                stroke="currentColor"
                                class="h-6 w-6"
                                x-tooltip="tooltip"
                        >
                            <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0"
                            />
                        </svg>
                    </button>
                    <button onclick="editTagAlert(${tag.id})" class="hover:bg-gray-300 rounded-full p-2">
                        <svg
                                xmlns="http://www.w3.org/2000/svg"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke-width="1.5"
                                stroke="currentColor"
                                class="h-6 w-6"
                                x-tooltip="tooltip"
                        >
                            <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L6.832 19.82a4.5 4.5 0 01-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 011.13-1.897L16.863 4.487zm0 0L19.5 7.125"
                            />
                        </svg>
                    </button>
                </div>
            </td>
        </tr>
                `;
            });
        })
        .catch(error => console.log(error));
}
//

// delete tag
function deleteTag(id) {
    fetch('index.php?page=dashboard', {
        method: 'DELETE',
        headers: {
            'Content-Type': 'application/json',
        },
        body: JSON.stringify({type: 'deleteTag', id: id}),
    })
        .then(response => {
            console.log(response.status);
            return response.json();
        })
        .then(data => console.log(data))
        .catch(error => console.error(error));
    getAllTagsForAdmin();
}
//

// edit tag alert
function editTagAlert(id) {
    let currentTagName = document.querySelector('#currentTagName-' + id);

    window.document.body.innerHTML += `
                <div id="editTagForm" style="left: 30%; top: 33%;" class="fixed top-1/4 left-1/2 transform -translate-x-1/2 bg-white shadow-xl rounded p-8">
                    <div class="flex justify-between items-center mb-6">
                        <h2 class="text-2xl font-bold">Edit Item</h2>
                        <button onclick="closeTagEditForm()" class="text-gray-500 hover:text-gray-700 focus:outline-none">
                            <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                            </svg>
                        </button>
                    </div>
                    <div class="mb-4">
                        <label for="name" class="block text-gray-700 text-sm font-bold mb-2">Name:</label>
                        <input id="tagName-${id}" type="text" value="${currentTagName.innerHTML}" name="" class="w-full border rounded-md px-3 py-2 focus:outline-none focus:border-blue-500">
                    </div>
                    <button onclick="editTag(${id})" type="submit" class="bg-purple-500 text-white py-2 px-4 rounded-md hover:bg-purple-600 focus:outline-none focus:shadow-outline-blue active:bg-yellow-800">
                        Save
                    </button>
                </div>
`;
}
//

// closeTagEditForm function
function closeTagEditForm() {
    document.querySelector('#editTagForm').remove();
}

// edit tag
function editTag(tagId) {
    const tagName = document.querySelector('#tagName-' + tagId);
    const dataToSend = {type: 'editTag', name: tagName.value, id: tagId};
    fetch('index.php?page=dashboard', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
        },
        body: JSON.stringify(dataToSend),
    })
        .then(response => {
            console.log(response.status);
            return response.json();
        })
        .then(data => {
            console.log(data);
            closeTagEditForm();
            getAllTagsForAdmin();
        })
        .catch(error => console.log(error));
}
//



// get all tags for author
function getAllTagsForAuthor() {
    const tagsGoHereAuthor = document.querySelector('#tagsGoHereAuthor');
    if (tagsGoHereAuthor !== null) {
        tagsGoHereAuthor.innerHTML = '';
    }
    fetch('index.php?page=wikis', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
        },
        body: JSON.stringify({ type: 'getTags' }),
    })
        .then(response => {
            return response.json();
        })
        .then(data => {
            data.forEach(tag => {
                tagsGoHereAuthor.innerHTML += `
                <option value="${tag.id}" class="flex rounded-sm justify-center items-center border text-black">
                    ${tag.name}
                </option>
                `;
            });
        })
        .catch(error => console.log(error));
}

getAllTagsForAuthor();
//