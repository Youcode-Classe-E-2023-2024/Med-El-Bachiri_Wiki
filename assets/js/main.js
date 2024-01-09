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
                    alert('Product Added success');
                    getAllCat();
                }

            })
            .catch(error => console.log(error));
    } else {
        alert('must fill both inputs');
    }
}
//

// get all categories
function getAllCat() {
    catGoHere.innerHTML = '';
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
                <div class="flex">
                                <p id="currentCatName-${cat.id}" class="bg-purple-500 mr-2 p-1 w-12 flex justify-center text-white my-2 rounded-lg cursor-pointer shadow-xl hover:opacity-80">${cat.name}</p>
                                <p onclick="editCatAlert(${cat.id})" class="bg-purple-500 mr-2 p-1 w-12 flex justify-center text-white my-2 rounded-lg cursor-pointer shadow-xl hover:opacity-80">EDIT</p>
                                <p onclick="deleteCat(${cat.id})" class="bg-red-500 p-1 w-20 flex justify-center text-white my-2 rounded-lg cursor-pointer shadow-xl hover:opacity-80">DELETE</p>
                            </div>
                `;
            })
        })
        .catch(error => console.log(error));
}

getAllCat();
//

// edit category pop up / alert
function editCatAlert(id) {
    let currentCatName = document.querySelector('#currentCatName-' + id);

    window.document.body.innerHTML += `
                <div id="editCatForm" style="left: 50%;" class="shadow-xl fixed top-36 max-w-md mx-auto bg-white rounded p-8 shadow-md">
                    <h2 class="text-2xl font-bold mb-6">Edit Item</h2>
                    <div class="mb-4">
                        <label for="name" class="block text-gray-700 text-sm font-bold mb-2">Name:</label>
                        <input id="catName-${id}" type="text" value="${currentCatName.innerHTML}" name="" class="w-full border rounded-md px-3 py-2 focus:outline-none focus:border-blue-500">
                    </div>
                
                    <button onclick="editCat(${id})" type="submit" class="bg-yellow-500 text-white py-2 px-4 rounded-md hover:bg-yellow-600 focus:outline-none focus:shadow-outline-blue active:bg-yellow-800">
                        Save
                    </button>
                </div>`;

}
//
