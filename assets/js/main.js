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
