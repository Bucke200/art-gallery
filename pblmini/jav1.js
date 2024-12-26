function _defineProperty(obj, key, value) {
    if (key in obj) {
        Object.defineProperty(obj, key, {
            value: value,
            enumerable: true,
            configurable: true,
            writable: true,
        });
    } else {
        obj[key] = value;
    }
    return obj;
}

const cursor = document.getElementById("cursor");
const amount = 20;
const sineDots = Math.floor(amount * 0.3);
const width = 26;
const idleTimeout = 150;
let lastFrame = 0;
let mousePosition = { x: 0, y: 0 };
let dots = [];
let timeoutID;
let idle = false;

class Dot {
    constructor(index = 0) {
        this.index = index;
        this.anglespeed = 0.05;
        this.x = 0;
        this.y = 0;
        this.scale = 1 - 0.05 * index;
        this.range = width / 2 - (width / 2) * this.scale + 2;
        this.limit = (width * 0.75) * this.scale;
        this.element = document.createElement("span");
        TweenMax.set(this.element, { scale: this.scale });
        cursor.appendChild(this.element);
    }

    lock() {
        this.lockX = this.x;
        this.lockY = this.y;
        this.angleX = Math.PI * 2 * Math.random();
        this.angleY = Math.PI * 2 * Math.random();
    }

    draw(delta) {
        if (!idle || this.index <= sineDots) {
            TweenMax.set(this.element, { x: this.x, y: this.y });
        } else {
            this.angleX += this.anglespeed;
            this.angleY += this.anglespeed;
            this.y = this.lockY + Math.sin(this.angleY) * this.range;
            this.x = this.lockX + Math.sin(this.angleX) * this.range;
            TweenMax.set(this.element, { x: this.x, y: this.y });
        }
    }
}

function init() {
    window.addEventListener("mousemove", onMouseMove);
    window.addEventListener("touchmove", onTouchMove);
    lastFrame += new Date();
    buildDots();
    render();
}
function startIdleTimer() {
    timeoutID = setTimeout(goInactive, idleTimeout);
    idle = false;
}

function resetIdleTimer() {
    clearTimeout(timeoutID);
    startIdleTimer();
}

function goInactive() {
    idle = true;
    for (let dot of dots) {
        dot.lock();
    }
}

function buildDots() {
    for (let i = 0; i < amount; i++) {
        let dot = new Dot(i);
        dots.push(dot);
    }
}

const onMouseMove = event => {
    mousePosition.x = event.clientX - width / 2;
    mousePosition.y = event.clientY - width / 2;
    resetIdleTimer();
};

const onTouchMove = event => {
    mousePosition.x = event.touches[0].clientX - width / 2;
    mousePosition.y = event.touches[0].clientY - width / 2;
    resetIdleTimer();
};

const render = timestamp => {
    const delta = timestamp - lastFrame;
    positionCursor(delta);
    lastFrame = timestamp;
    requestAnimationFrame(render);
};

const positionCursor = delta => {
    let x = mousePosition.x;
    let y = mousePosition.y;
    dots.forEach((dot, index, dots) => {
        let nextDot = dots[index + 1] || dots[0];
        dot.x = x;
        dot.y = y;
        dot.draw(delta);
        if (!idle || index <= sineDots) {
            const dx = (nextDot.x - dot.x) * 0.35;
            const dy = (nextDot.y - dot.y) * 0.35;
            x += dx;
            y += dy;
        }
    });
};
init();
const boxes = document.querySelectorAll(".box");
const overlays = document.querySelectorAll(".overlay");
const mainSection = document.querySelector(".main-section");
const textEl = document.querySelector(".text");
let currentIndex = 0;
let intervalID = null;

// Event listener
boxes.forEach((box, index) => {
    box.addEventListener("click", () => {
        overlays[currentIndex].classList.remove("active");
        boxes[currentIndex].classList.remove("active");
        currentIndex = index;
        overlays[currentIndex].classList.add("active");
        boxes[currentIndex].classList.add("active");
        const imageUrl = box.getAttribute('data-url');
        const imageText = box.getAttribute('data-text');
        mainSection.style.backgroundImage = `url(${imageUrl})`;
        textEl.innerHTML = imageText;
        clearInterval(intervalID);
        startInterval();
    });
});

// Function to automatically change active class and update content
function addClass() {
    overlays[currentIndex].classList.remove("active");
    boxes[currentIndex].classList.remove("active");
    currentIndex = (currentIndex + 1) % overlays.length;
    overlays[currentIndex].classList.add("active");
    boxes[currentIndex].classList.add("active");
    const imageUrl = boxes[currentIndex].getAttribute('data-url');
    const imageText = boxes[currentIndex].getAttribute('data-text');
    mainSection.style.backgroundImage = `url(${imageUrl})`;
    textEl.innerHTML = imageText;
}

// Start interval for automatic image change
function startInterval() {
    intervalID = setInterval(addClass, 3000);
}

// Initial setup when page loads
startInterval();
overlays[currentIndex].classList.add("active");
boxes[currentIndex].classList.add("active");
const initialImageUrl = boxes[currentIndex].getAttribute('data-url');
const initialImageText = boxes[currentIndex].getAttribute('data-text');
mainSection.style.backgroundImage = `url(${initialImageUrl})`;
textEl.innerHTML = initialImageText;

document.addEventListener('DOMContentLoaded', function() {
    const searchBox = document.querySelector('.search-box');

    // Apply pulsing animation on focus and remove on blur (if desired)
    searchBox.addEventListener('focus', () => {
        searchBox.classList.add('pulsing');
    });
    searchBox.addEventListener('blur', () => {
        searchBox.classList.remove('pulsing');
    });
});