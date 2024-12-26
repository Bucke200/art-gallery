const track = document.getElementById("image-track");
const fullScreen = document.getElementById("full-screen");
const fullScreenImage = document.getElementById("full-screen-image");
const imageDescription = document.getElementById("image-description");

let isDragging = false;
let dragThreshold = 5; // pixels to consider as drag
let mouseDownAt = 0;

const handleOnDown = e => {
    mouseDownAt = e.clientX;
    isDragging = false; // Reset dragging state
    track.dataset.mouseDownAt = mouseDownAt;
};

const handleOnUp = () => {
    track.dataset.mouseDownAt = "0";  
    track.dataset.prevPercentage = track.dataset.percentage;

    if (!isDragging) {
        // Handle click event if needed
    }
};

const handleOnMove = e => {
    if (track.dataset.mouseDownAt === "0") return;
    
    const mouseDelta = parseFloat(track.dataset.mouseDownAt) - e.clientX,
          maxDelta = window.innerWidth / 2;

    if (Math.abs(mouseDelta) > dragThreshold) {
        isDragging = true; // Set dragging state
    }

    const percentage = (mouseDelta / maxDelta) * -100,
          nextPercentageUnconstrained = parseFloat(track.dataset.prevPercentage) + percentage,
          nextPercentage = Math.max(Math.min(nextPercentageUnconstrained, 0), -100);
    
    track.dataset.percentage = nextPercentage;
    
    track.animate({
        transform: `translate(${nextPercentage}%, -50%)`
    }, { duration: 1200, fill: "forwards" });
    
    for (const image of track.getElementsByClassName("image")) {
        image.animate({
            objectPosition: `${100 + nextPercentage}% center`
        }, { duration: 1200, fill: "forwards" });
    }
}

const openFullScreenImage = (src, description) => {
    fullScreen.style.display = 'flex'; // Show the overlay first
    fullScreenImage.src = src;
    imageDescription.textContent = description || "No description available.";
    setTimeout(() => {
        fullScreen.classList.add('active'); // Add active class after displaying
    }, 10); // Slight delay to allow display to take effect
};

const closeFullScreenImage = () => {
    fullScreen.classList.remove('active'); // Remove active class to trigger exit animation
    document.body.style.overflow = ''; // Re-enable scrolling
    
    // Optional: Add a slight delay before hiding the element
    setTimeout(() => {
        fullScreen.style.display = 'none';
    }, 500); // Match this delay with the CSS transition duration
};

for (const image of track.getElementsByClassName("image")) {
    image.addEventListener('click', (event) => {
        if (!isDragging) {
            const description = image.getAttribute("data-description");
            openFullScreenImage(image.src, description);
        }
    });
}

fullScreen.addEventListener('click', closeFullScreenImage);

window.onmousedown = e => handleOnDown(e);
window.ontouchstart = e => handleOnDown(e.touches[0]);
window.onmouseup = e => handleOnUp(e);
window.ontouchend = e => handleOnUp(e.touches[0]);
window.onmousemove = e => handleOnMove(e);
window.ontouchmove = e => handleOnMove(e.touches[0]);
