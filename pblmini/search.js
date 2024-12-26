function filterResults() {
    const searchBar = document.getElementById('search-bar');
    const filter = searchBar.value.toLowerCase();
    const resultsContainer = document.getElementById('results-container');
    const resultItems = resultsContainer.getElementsByClassName('result-item');

    for (let i = 0; i < resultItems.length; i++) {
        const title = resultItems[i].getElementsByTagName('h2')[0].innerText.toLowerCase();
        const artist = resultItems[i].getElementsByTagName('p')[0].innerText.toLowerCase();

        if (title.includes(filter) || artist.includes(filter)) {
            resultItems[i].style.display = ''; // Show item
        } else {
            resultItems[i].style.display = 'none'; // Hide item
        }
    }
}