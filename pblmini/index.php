<?php
include("database.php");
$sql_ex="select image,title from exhibitions
      order by upload_date desc
      limit 4;";
 
      $sql_news="select image,title from news
      order by upload_date desc
      limit 4;";

      $sql_r1="select image from news
      order by upload_date desc
      limit 1;";

      $sql_r2="SELECT image FROM art ORDER BY RAND() LIMIT 1;";

      $sql_r4="select image from artists ORDER BY RAND() limit 1;";

      $sql_r3="select image from art
      order by upload_date desc
      limit 1;";

      $sql_r5="select image from exhibitions
      order by upload_date desc
      limit 1;";
      

      $result=mysqli_query($conn,$sql_ex);
      $result1=mysqli_query($conn,$sql_news);
      $result_r1=mysqli_query($conn,$sql_r1);
      $result_r2=mysqli_query($conn,$sql_r2);
      $result_r3=mysqli_query($conn,$sql_r3);
      $result_r4=mysqli_query($conn,$sql_r4);
      $result_r5=mysqli_query($conn,$sql_r5);

      $row_r1 = mysqli_fetch_array($result_r1);
$row_r2 = mysqli_fetch_array($result_r2);
$row_r3 = mysqli_fetch_array($result_r3);
$row_r4 = mysqli_fetch_array($result_r4);
$row_r5 = mysqli_fetch_array($result_r5);


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Pbl Project</title>
    <link href="https://fonts.googleapis.com/css?family=Asul|Rubik|Work+Sans" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
    <link rel="stylesheet" href="index_light.css?v=1.5">
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
    <div class="navbar">
        <div class="logo" href="#"> <h1>Art gallery</h1></div>
        <div class="search-container">
    <form action="search.php" method="GET">
        <input type="text" name="search" placeholder="Search..." class="search-box" />
        <button type="submit">Search</button>
    </form>
</div>

        <a class="links" href="exhibition.php">
    <h4>Exhibitions</h4>
</a>

        <div class="links" href="#"><h4>Gallery</h4></div>
        <div class="links" href="#"><h4>Artists</h4></div>
        <a class="links" href="form.php"><h4>Submit Art</h4></div>
</a>
    <div id="cursor" class="Cursor"></div>

    

    <div class="container">
    <div class="main-section" style="background-image: url('data:image/jpg;base64,<?php echo base64_encode($row_r1['image']); ?>');">
        <div class="main-overlay"></div>
        <p class="text">Get the latest BITS from our Community.</p>
    </div>

    <div class="side-section">
        <div class="box active" data-url="data:image/jpg;base64,<?php echo base64_encode($row_r1['image']); ?>" data-text="Get the latest BITS from our Community.">
            <div class="overlay active"></div>
            <p>Update</p>
        </div>
        <div class="box" data-url="data:image/jpg;base64,<?php echo base64_encode($row_r2['image']); ?>" data-text="People Love This.">
            <div class="overlay"></div>
            <p>Most Views</p>
        </div>
        <div class="box" data-url="data:image/jpg;base64,<?php echo base64_encode($row_r3['image']); ?>" data-text="As Fresh as Mint.">
            <div class="overlay"></div>
            <p>New Collections</p>
        </div>
        <div class="box" data-url="data:image/jpg;base64,<?php echo base64_encode($row_r4['image']); ?>" data-text="Get to Know More About Them.">
            <div class="overlay"></div>
            <p class="text">Spotlight Artist</p>
        </div>
        <div class="box" data-url="data:image/jpg;base64,<?php echo base64_encode($row_r5['image']); ?>" data-text="Experiences to Indulge You.">
            <div class="overlay"></div>
            <p>Events</p>
        </div>
    </div>
</div>

      <br>
      <h2>RECENT EXHIBITIONS</h2>
      <div class="exhibitions">
    <?php
        while($row=mysqli_fetch_array($result)) {
    ?>
        <div class="exhibition-item">
            <div class="images">
                <?php echo '<img src="data:image/jpg;base64,'.base64_encode($row['image']).'" alt="Exhibition Image">'; ?>
            </div>
            <div class="ex-text">
                <?php echo $row['title']; ?>
            </div>
        </div>
    <?php
        }
    ?>
</div>
        <h2>RECENT News</h2>
        <div class="exhibitions">
    <?php
        while($row1=mysqli_fetch_array($result1)) {
    ?>
        <div class="exhibition-item">
            <div class="images">
                <?php echo '<img src="data:image/jpg;base64,'.base64_encode($row1['image']).'" alt="Exhibition Image">'; ?>
            </div>
            <div class="ex-text">
                <?php echo $row1['title']; ?>
            </div>
        </div>
    <?php
        }
        mysqli_close($conn);
    ?>
</div>
    <script>
        const navbar=document.querySelector(".navbar")
        let lastScrollY = window.scrollY;

        window.addEventListener("scroll",()=>{
            if(lastScrollY < window.scrollY)
        {
            navbar.classList.add("navbar--hidden");
        }
        else{
            navbar.classList.remove("navbar--hidden");
            }
            lastScrollY=window.scrollY;
        })
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/gsap/2.0.1/TweenMax.min.js'></script><script  src="jav1.js?v=1.1"></script>
</body>
<footer>
    <div class="footer-container">
        <h2>About Us</h2>
        <p>
            Welcome to our art gallery, where creativity meets inspiration. We showcase a diverse range of exhibitions and artists, fostering a community of art enthusiasts. Join us in celebrating art and culture.
        </p>
    </div>
</footer>
</html>