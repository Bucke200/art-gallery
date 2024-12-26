document.getElementById('artForm').addEventListener('submit', function(event) {
    event.preventDefault();

    const artistName = document.getElementById('artistName').value;
    const email = document.getElementById('email').value;
    const phone = document.getElementById('phone').value;
    const address = document.getElementById('address').value;
    const artistBio = document.getElementById('artistBio').value;
    const socialMedia = document.getElementById('socialMedia').value;
    const artTitle = document.getElementById('artTitle').value;
    const artDescription = document.getElementById('artDescription').value;
    const artImage = document.getElementById('artImage').value;
    const artMedium = document.getElementById('artMedium').value;
    const yearCreated = document.getElementById('yearCreated').value;
    const dimensions = document.getElementById('dimensions').value;
    const colorPalette = document.getElementById('colorPalette').value;
    const artPrice = document.getElementById('artPrice').value;
    const availability = document.getElementById('availability').value;
    const artThemes = document.getElementById('artThemes').value;
    const artStyle = document.getElementById('artStyle').value;

    const gallery = document.getElementById('gallery');
    const artItem = document.createElement('div');
    artItem.classList.add('art-item');

    artItem.innerHTML = `
        <h2>${artTitle}</h2>
        <p><strong>Artist:</strong> ${artistName}</p>
        <p><strong>Email:</strong> ${email}</p>
        <p><strong>Phone:</strong> ${phone}</p>
        <p><strong>Address:</strong> ${address}</p>
        <p><strong>Biography:</strong> ${artistBio}</p>
        <p><strong>Social Media:</strong> ${socialMedia}</p>
        <p><strong>Medium:</strong> ${artMedium}</p>
        <p><strong>Year Created:</strong> ${yearCreated}</p>
        <p><strong>Dimensions:</strong> ${dimensions} cm</p>
        <p><strong>Color Palette:</strong> ${colorPalette}</p>
        <p><strong>Themes:</strong> ${artThemes}</p>
        <p><strong>Style:</strong> ${artStyle}</p>
        <p><strong>Price:</strong> $${artPrice}</p>
        <p><strong>Availability:</strong> ${availability.charAt(0).toUpperCase() + availability.slice(1)}</p>
        <img src="${artImage}" alt="${artTitle}">
        <p>${artDescription}</p>
    `;

    gallery.appendChild(artItem);
    document.getElementById('artForm').reset();
});
