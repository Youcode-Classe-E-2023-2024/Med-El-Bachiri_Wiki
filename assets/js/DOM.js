const btnDiv = document.querySelectorAll('.btnDiv');
let divs = document.querySelectorAll('.divs');

// hide all divs except the param of the function
function hideDivs(except) {
    divs.forEach((div, i) => {
        div.style.display = 'none';
        btnDiv[i].style.backgroundColor = 'white';
    });
    divs[except].style.display = 'block';
    btnDiv[except].style.backgroundColor = 'rgba(83,30,238,0.73)';
    if (except === 1) {
        getAllTagsForAdmin();
    }
}

// hide all divs except the first div by default
hideDivs(0);
