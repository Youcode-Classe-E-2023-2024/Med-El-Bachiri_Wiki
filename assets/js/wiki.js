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
