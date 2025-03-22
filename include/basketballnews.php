<?php
    include "connection.php";
    $query = "SELECT CATEGORY FROM tbl_addnews WHERE CATEGORY = 'Sports' ";
    $data = mysqli_query($conn,$query);

    while($row = mysqli_fetch_assoc($data)){
        $category = $row["CATEGORY"];
        // echo "$category";
    }
?>


<link rel="stylesheet" href="../styles/style.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">


    <div class="container">
        <div class="p10 ">
            <div class="article-heading flex">
                <div class="p10">
                    <h1>Sports news</h1>
                </div>
                <div class="color p10">
                    <a href="/news/include/showmore.php?newsCategory=<?php echo $category; ?>">Show More <span><i class="fa-solid fa-arrow-right"></i></span></a>
                </div>
            </div>

            <!-- card-section -->
            <div class="card">

            <?php
                  $query2 = "SELECT * FROM tbl_addnews WHERE CATEGORY = 'Sports' ";
                  $data2 = mysqli_query($conn,$query2);
              
                  while($row2 = mysqli_fetch_assoc($data2)){
                     $news_id = $row2["NEWS_ID"];
                     $category2 = $row2["CATEGORY"];
                     $title = $row2["TITLE"];
                     $content = $row2["CONTENT"];
                     $image = "/news/uploads/".$row2["IMAGE"];
                     $date = $row2["TIME"];

            ?>
                <!-- firstcard -->
                <div class="fcard">
                    <div class="card-image"><a href="/news/include/readmore.php?NEWS_ID2=<?php echo $news_id;?>"><img src="<?php echo $image; ?>" alt="image"></a></div>
                    <div class="flex article-author">
                        <div class="article-author-img flex"><img src="/news/img/1st-basketball.avif" alt="author"></div>
                        <div>
                            <p class="ml-10">chaloe merrell</p>
                        </div>
                    </div>
                    <h4 class="padd-3"><?php echo $title; ?></h4>
                    <div>
                        <h5 class="Olympics"><span><i class="fa-solid fa-filter"></i></span><a href="/news/include/showmore.php?newsCategory=<?php echo $category2;?>"> <?php echo $category; ?></a></h5>
                    </div>
                </div>

                <?php } ?>


        </div>
    </div>
</div>