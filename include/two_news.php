<link rel="stylesheet" href="../styles/style.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">


<div class="container">
    <div class="grid-container">

    <!-- php code -->
     <?php
        include "connection.php";        

        $query = "SELECT * FROM tbl_addnews order by NEWS_ID DESC LIMIT 2 OFFSET 4";
        $data = mysqli_query($conn,$query);

        while($row = mysqli_fetch_assoc($data)){
            $news_id = $row["NEWS_ID"];
            $category = $row["CATEGORY"];
            $content = substr($row["CONTENT"],0,199)."<a href='/news/include/readmore.php?NEWS_ID2=$news_id'>...Read More</a>";
            $image = "/news/uploads/".$row["IMAGE"];
            
     ?>
        <div class="image-container">
            <img src="<?php echo $image; ?>" alt=" Image">
            <div class="overlay-text">
                <p><span><i class="fa-solid fa-filter"></i></span> <?php echo $category; ?></p>
                <p><?php echo $content; ?></p>
            </div>
        </div>

        <?php } ?>

        <!-- <div class="image-container">
            <img src="/news/img/uzbekistan's.avif" alt="Image">
            <div class="overlay"></div>
            <div class="overlay-text">
                <p><span><i class="fa-solid fa-filter"></i></span> Olympics</p>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Architecto iste ut autem nulla!</p>
            </div>
        </div> -->

    </div>
</div>