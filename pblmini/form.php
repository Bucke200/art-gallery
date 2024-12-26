<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Art Exhibition Form</title>
    <link rel="stylesheet" href="form_light.css?v=1.5">
    <link rel="stylesheet" href="mouse.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
</head>
<body>
<svg xmlns="http://www.w3.org/2000/svg" version="1.1" width="800">
        <defs>
            <filter id="goo">
                <feGaussianBlur in="SourceGraphic" stdDeviation="6" result="blur" />
                <feColorMatrix in="blur" mode="matrix" values="1 0 0 0 0  0 1 0 0 0  0 0 1 0 0  0 0 0 35 -15" result="goo" />
                <feComposite in="SourceGraphic" in2="goo" operator="atop"/>
            </filter>
        </defs>
    </svg>
    <div id="cursor" class="Cursor">
    </div>
    <div class="navbar">
    <div class="logo">Art Exhibition</div>
    <div class="nav-links">
    <a href="index.php" class="home">Home</a>
    <a href="exhibition.php" class="links">Exhibition</a>
    <a href="gallery.php" class="links">Gallery</a>
    <a href="Artists.php" class="links">Artists</a>
    </div>
</div>

    
    <div class="container">
        <h1>Athlete Entry Form</h1>
        <div class="form-preview-container">
            <form id="artForm" action="#">
                <label for="name">Name</label>
                <input type="text" id="name" name="name" placeholder="Enter your name" required>
                <div id="nameError" class="error-message"></div> <!-- Error message for name -->

                <label for="email">Email</label>
                <input type="email" id="email" name="email" placeholder="Enter your email" required>
                <div id="emailError" class="error-message"></div> <!-- Error message for email -->

                <label for="phone">Phone</label>
                <input type="tel" id="phone" name="phone" placeholder="Enter your phone number" required>
                <div id="phoneError" class="error-message"></div> <!-- Error message for phone -->

                <label for="artwork-title">Art Title</label>
                <input type="text" id="artwork-title" name="artwork-title" placeholder="Enter artwork title" required>
                <div id="artworkTitleError" class="error-message"></div> <!-- Error message for artwork title -->

                <label for="artwork-url">Art Image URL</label>
                <input type="url" id="artwork-url" name="artwork-url" placeholder="Enter artwork image URL" required>
                <div id="artworkUrlError" class="error-message"></div> <!-- Error message for artwork URL -->

                <button type="submit" id="submitBtn" disabled>Submit</button> <!-- Added ID and disabled initially -->
            </form>

            <div class="gallery">
                <div class="art-item">
                    <h2>Preview</h2>
                    <img id="artPreview" src="https://via.placeholder.com/150" alt="Artwork Preview">
                </div>
            </div>
        </div>
    </div>

    <footer>
        <div class="footer-container">
            <p>Get Featured On Our Page</p>
        </div>
    </footer>

    <script>
        $(document).ready(function() {
            var formValid = {
                name: false,
                email: false,
                phone: false,
                artworkTitle: false,
                artworkUrl: false
            };

            function checkFormValidity() {
                // Enable submit button only if all fields are valid
                if (formValid.name && formValid.email && formValid.phone && formValid.artworkTitle && formValid.artworkUrl) {
                    $('#submitBtn').removeAttr('disabled');
                } else {
                    $('#submitBtn').attr('disabled', 'disabled');
                }
            }

            // Validate name field
            $('#name').on('keyup', function(){
                var name = $(this).val();
                $.ajax({
                    url: 'validate.php',
                    method: 'POST',
                    data: {name: name},
                    success: function(response){
                        $('#nameError').text(response);
                        formValid.name = response === "";
                        checkFormValidity();
                    }
                });
            });

            // Validate email field
            $('#email').on('keyup', function(){
                var email = $(this).val();
                $.ajax({
                    url: 'validate.php',
                    method: 'POST',
                    data: {email: email},
                    success: function(response){
                        $('#emailError').text(response);
                        formValid.email = response === "";
                        checkFormValidity();
                    }
                });
            });

            // Validate phone field
            $('#phone').on('keyup', function(){
                var phone = $(this).val();
                $.ajax({
                    url: 'validate.php',
                    method: 'POST',
                    data: {phone: phone},
                    success: function(response){
                        $('#phoneError').text(response);
                        formValid.phone = response === "";
                        checkFormValidity();
                    }
                });
            });

            // Validate artwork title field
            $('#artwork-title').on('keyup', function(){
                var artworkTitle = $(this).val();
                $.ajax({
                    url: 'validate.php',
                    method: 'POST',
                    data: {artworkTitle: artworkTitle},
                    success: function(response){
                        $('#artworkTitleError').text(response);
                        formValid.artworkTitle = response === "";
                        checkFormValidity();
                    }
                });
            });

            // Validate artwork URL field and update image preview
            $('#artwork-url').on('keyup', function(){
                var artworkUrl = $(this).val();
                $.ajax({
                    url: 'validate.php',
                    method: 'POST',
                    data: {artworkUrl: artworkUrl},
                    success: function(response){
                        $('#artworkUrlError').text(response);
                        formValid.artworkUrl = response === "";
                        checkFormValidity();

                        if (response === "") {
                            $('#artPreview').attr('src', artworkUrl).on('error', function() {
                                $(this).attr('src', 'https://via.placeholder.com/150'); // Reset if URL fails
                            });
                        }
                    }
                });
            });

            // Submit the form if there are no errors
            $('#artForm').on('submit', function(e) {
                e.preventDefault();
                if ($('#submitBtn').is(':disabled')) {
                    alert("Please fix the errors before submitting.");
                    return;
                }

                // Collect form data
                var formData = {
                    name: $('#name').val(),
                    email: $('#email').val(),
                    phone: $('#phone').val(),
                    artworkTitle: $('#artwork-title').val(),
                    artworkUrl: $('#artwork-url').val()
                };

                // Send data via AJAX to insert into the database
                $.ajax({
                    url: 'submit.php',
                    method: 'POST',
                    data: formData,
                    success: function(response) {
                        if (response === "success") {
                            alert("Your artwork has been successfully submitted.");
                            $('#artForm')[0].reset();
                            $('#artPreview').attr('src', 'https://via.placeholder.com/150'); // Reset preview
                            formValid = {name: false, email: false, phone: false, artworkTitle: false, artworkUrl: false};
                            checkFormValidity(); // Disable the button again
                        } else {
                            alert("There was an error submitting your data.");
                        }
                    }
                });
            });
        });
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/gsap/2.0.1/TweenMax.min.js'></script><script  src="jav1.js"></script>
    <script>
        const cursor = document.querySelector(".Cursor");
window.addEventListener("mousemove", (e) => {
    cursor.style.left = e.pageX + "px";
    cursor.style.top = e.pageY + "px";
});
    </script>
</body>
</html>
