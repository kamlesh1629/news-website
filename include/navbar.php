<?php 
    include "connection.php";
    $World ="World";
    $Politics ="Politics";
    $Bussiness ="Bussiness";
    $Sports ="Sports";
    $Tech ="Technology";
?>


<link rel="stylesheet" href="../styles/style.css">
<link
    href="https://fonts.googleapis.com/css2?family=Merriweather:wght@400;700&family=Inter:wght@400;600&family=Montserrat:wght@500&display=swap"
    rel="stylesheet">
</nav>

<nav>
    <div class="container">
        <div class="navbar">
            <a href="/news/index.php"><img src="/news/img/website-logo.png" alt="logo"></a>
            <div class="menu-items">
                <ul>
                    <li><a href="/news/index.php">Home</a></li>
                    <li><a href="/news/include/showmore.php?newsCategory=<?php echo $World;?> ">World</a></li>
                    <li><a href="/news/include/showmore.php?newsCategory=<?php echo $Politics;?> ">Politics</a></li>
                    <li><a href="/news/include/showmore.php?newsCategory=<?php echo $Bussiness;?> ">Bussiness</a></li>
                    <li><a href="/news/include/showmore.php?newsCategory=<?php echo $Sports;?> ">Sports</a></li>
                    <li><a href="/news/include/showmore.php?newsCategory=<?php echo $Tech;?> ">Tech</a></li>
                </ul>
            </div>
            <!-- responsive hamberger -->
            <div class="ham">
                <li><a href="#"><i class="fa-solid fa-bars"></i></a></li>
            </div>
        </div>
    </div>
</nav>