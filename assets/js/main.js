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
