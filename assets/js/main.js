const select = document.getElementById('sort');
function sort(sortBy) {
    fetch('../inc/sort.php?sortby='+sortBy)
    .then(response => {
        return response.text();
    })
    .then(data => {
        document.getElementById('cakes-listing').innerHTML += data;
    })
}

if (select) {
    select.onchange = () => {
        const sortBy = select.value;
        document.getElementsByClassName('cake-listing__container')[0].remove();
        sort(sortBy);
    }
}