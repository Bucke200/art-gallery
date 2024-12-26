const images = [
    {
        src: "https://i.pinimg.com/474x/ee/f9/5c/eef95c276d3a56cf7af6f921583c240f.jpg",
        desc: "Sunset captured by Eu Bong Hi",
        link: "https://i.pinimg.com/474x/ee/f9/5c/eef95c276d3a56cf7af6f921583c240f.jpg"
    },
    {
        src: "https://i.pinimg.com/enabled_hi/236x/0d/23/89/0d23898a8c3611c228085210c6dd0fe5.jpg",
        desc: "Quote",
        link: "https://i.pinimg.com/enabled_hi/236x/0d/23/89/0d23898a8c3611c228085210c6dd0fe5.jpg"
    },
    {
        src: "https://i.pinimg.com/enabled_hi/236x/52/03/0e/52030ecdcb475de1f601504258045b33.jpg",
        desc: "Image 3",
        link: "https://i.pinimg.com/enabled_hi/236x/52/03/0e/52030ecdcb475de1f601504258045b33.jpg"
    },
    {
        src: "https://i.pinimg.com/enabled_hi/474x/80/fc/95/80fc951932c1d66cfb82fc1453970d65.jpg",
        desc: "Image 4",
        link: "https://i.pinimg.com/enabled_hi/474x/80/fc/95/80fc951932c1d66cfb82fc1453970d65.jpg"
    },
    {
        src: "https://i.pinimg.com/236x/c2/40/34/c2403432e3e25c613db311f3c5c59272.jpg",
        desc: "Image 5",
        link: "https://i.pinimg.com/236x/c2/40/34/c2403432e3e25c613db311f3c5c59272.jpg"
    },
    {
        src: "https://i.pinimg.com/enabled_hi/474x/7c/5a/9f/7c5a9f63ce465c25a1e6bdf6bc531066.jpg",
        desc: "Image 6",
        link: "https://i.pinimg.com/enabled_hi/474x/7c/5a/9f/7c5a9f63ce465c25a1e6bdf6bc531066.jpg"
    },
    {
        src: "https://i.pinimg.com/enabled_hi/236x/18/d8/9d/18d89daa36b40dd374fc1d3d874205a5.jpg",
        desc: "Image 7",
        link: "https://i.pinimg.com/enabled_hi/236x/18/d8/9d/18d89daa36b40dd374fc1d3d874205a5.jpg"
    },
    {
        src: "https://i.pinimg.com/enabled_hi/236x/02/cb/a9/02cba982f0cf7f53e6626873e85e1072.jpg",
        desc: "Image 8",
        link: "https://i.pinimg.com/enabled_hi/236x/02/cb/a9/02cba982f0cf7f53e6626873e85e1072.jpg"
    },
    {
        src: "https://i.pinimg.com/enabled_hi/236x/43/da/d1/43dad12c1db4ce5fc03e15fc5917dd8a.jpg",
        desc: "Image 9",
        link: "https://i.pinimg.com/enabled_hi/236x/43/da/d1/43dad12c1db4ce5fc03e15fc5917dd8a.jpg"
    },
    {
        src: "https://i.pinimg.com/enabled_hi/236x/b8/79/50/b87950705af6be2b5089a52ff77394ff.jpg",
        desc: "Image 10",
        link: "https://i.pinimg.com/enabled_hi/236x/b8/79/50/b87950705af6be2b5089a52ff77394ff.jpg"
    },
    {
        src: "https://i.pinimg.com/236x/e3/aa/e2/e3aae27d1ac12a0c7f51454bed3015c0.jpg",
        desc: "Image 11",
        link: "https://i.pinimg.com/236x/e3/aa/e2/e3aae27d1ac12a0c7f51454bed3015c0.jpg"
    },
    {
        src: "https://i.pinimg.com/474x/5a/92/19/5a92194de9c1582d8d49b1e5a853bd3d.jpg",
        desc: "Image 12",
        link: "https://i.pinimg.com/474x/5a/92/19/5a92194de9c1582d8d49b1e5a853bd3d.jpg"
    },
    {
        src: "https://i.pinimg.com/enabled_hi/236x/46/4b/7b/464b7b19f5f91370dfac73707e5e9a87.jpg",
        desc: "Image 13",
        link: "https://i.pinimg.com/enabled_hi/236x/46/4b/7b/464b7b19f5f91370dfac73707e5e9a87.jpg"
    },
    {
        src: "https://i.pinimg.com/enabled_hi/736x/e7/0f/18/e70f18ca413e6609e07250996cb9a1e0.jpg",
        desc: "Image 14",
        link: "https://i.pinimg.com/enabled_hi/736x/e7/0f/18/e70f18ca413e6609e07250996cb9a1e0.jpg"
    },
    {
        src: "https://i.pinimg.com/enabled_hi/474x/19/e2/24/19e2245c86bda09dab681250945ce507.jpg",
        desc: "Image 15",
        link: "https://i.pinimg.com/enabled_hi/474x/19/e2/24/19e2245c86bda09dab681250945ce507.jpg"
    },
    {
        src: "https://i.pinimg.com/enabled_hi/236x/bc/26/da/bc26da3612b739df950acdb74731ecf1.jpg",
        desc: "Image 16",
        link: "https://i.pinimg.com/enabled_hi/236x/bc/26/da/bc26da3612b739df950acdb74731ecf1.jpg"
    },
    {
        src: "https://i.pinimg.com/enabled_hi/236x/6f/5a/20/6f5a2044285619a0a272d5ea77365e66.jpg",
        desc: "Image 17",
        link: "https://i.pinimg.com/enabled_hi/236x/6f/5a/20/6f5a2044285619a0a272d5ea77365e66.jpg"
    },
    {
        src: "https://i.pinimg.com/enabled_hi/236x/98/bb/47/98bb4734180d05a01216ec182f8b61ba.jpg",
        desc: "Image 18",
        link: "https://i.pinimg.com/enabled_hi/236x/98/bb/47/98bb4734180d05a01216ec182f8b61ba.jpg"
    },
    {
        src: "https://i.pinimg.com/enabled_hi/236x/d7/52/51/d75251e44fe0404eefc905884c9a789c.jpg",
        desc: "Image 19",
        link: "https://i.pinimg.com/enabled_hi/236x/d7/52/51/d75251e44fe0404eefc905884c9a789c.jpg"
    },
    {
        src: "https://i.pinimg.com/enabled_hi/474x/8a/b8/ac/8ab8ac04670991dda3c099271f299aff.jpg",
        desc: "Image 20",
        link: "https://i.pinimg.com/enabled_hi/474x/8a/b8/ac/8ab8ac04670991dda3c099271f299aff.jpg"
    },
    {
        src: "https://i.pinimg.com/enabled_hi/236x/09/78/b3/0978b3544cdc14435f45687e22769dcb.jpg",
        desc: "Image 21",
        link: "https://i.pinimg.com/enabled_hi/236x/09/78/b3/0978b3544cdc14435f45687e22769dcb.jpg"
    },
    {
        src: "https://i.pinimg.com/enabled_hi/474x/e6/24/85/e624858c1650c04d80b99db4167577b3.jpg",
        desc: "Image 22",
        link: "https://i.pinimg.com/enabled_hi/474x/e6/24/85/e624858c1650c04d80b99db4167577b3.jpg"
    },
    {
        src: "https://i.pinimg.com/enabled_hi/236x/4e/56/da/4e56dafc89e62283d520d9ea4dad1561.jpg",
        desc: "Image 23",
        link: "https://i.pinimg.com/enabled_hi/236x/4e/56/da/4e56dafc89e62283d520d9ea4dad1561.jpg"
    },
    {
        src: "https://i.pinimg.com/474x/3d/45/2b/3d452ba447763dafca78da7baffcd6b7.jpg",
        desc: "Image 24",
        link: "https://i.pinimg.com/474x/3d/45/2b/3d452ba447763dafca78da7baffcd6b7.jpg"
    },
    {
        src: "https://i.pinimg.com/enabled_hi/474x/64/55/91/645591ffe423af536ba5e9090ab07efd.jpg",
        desc: "Image 25",
        link: "https://i.pinimg.com/enabled_hi/474x/64/55/91/645591ffe423af536ba5e9090ab07efd.jpg"
    }
];



let currentIndex = -1;

function updatePanel() {
    const imageInfo = images[currentIndex];
    document.getElementById('displayedImage').src = imageInfo.src;
    document.getElementById('description').innerHTML = `
        <p>${imageInfo.desc}</p>
        <a href="${imageInfo.link}" target="_blank">Learn more</a>
    `;
}

function openPanel(index) {
    currentIndex = index;
    updatePanel();
    document.getElementById('overlay').style.display = 'flex';
}

function closePanel() {
    document.getElementById('overlay').style.display = 'none';
}

function changeImage(direction) {
    currentIndex += direction;
    if (currentIndex < 0) {
        currentIndex = images.length - 1; // Loop back to the last image
    } else if (currentIndex >= images.length) {
        currentIndex = 0; // Loop back to the first image
    }
    updatePanel();
}

