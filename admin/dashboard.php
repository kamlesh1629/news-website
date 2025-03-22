<?php
include "../include/connection.php";

$query = "SELECT COUNT(REG_ID) AS total_users FROM tbl_register";
$data = mysqli_query($conn, $query);

while ($row = mysqli_fetch_assoc($data)) {
    $totalUsers = "$row[total_users]";
}
?>

<!-- to fetch total news and shown on admin panel -->
 <?php

    $query2 = "SELECT COUNT(*) AS total_news FROM tbl_addnews";
    $data2 = mysqli_query($conn,$query2);

    while($row2 = mysqli_fetch_assoc($data2)){
        $totalNews = $row2["total_news"];
    }

?>

<!-- to show today published date -->
 <?php

    $query3 = "SELECT COUNT(*) AS  total_news2 FROM tbl_addnews WHERE DATE(TIME) = CURDATE()";
    $data3 = mysqli_query($conn, $query3);

    if(mysqli_num_rows($data3)>0){
        while($row3 = mysqli_fetch_assoc($data3)){
            $todayTotalNews = $row3["total_news2"];
        }
    }else{
        $todayTotalNews =0;
    }
    

?>

<!-- to count total Bussiness news -->
<?php

    $BussinessCategory = "Bussiness";

    $query4 = "SELECT COUNT(*) AS  total_Bussiness FROM tbl_addnews WHERE CATEGORY='$BussinessCategory' ";
    $data4 = mysqli_query($conn, $query4);

        while($row4 = mysqli_fetch_assoc($data4)){
            $totalBussinessNews = $row4["total_Bussiness"];
        }

?>
<!-- to count total world news -->
<?php

    $query5 = "SELECT COUNT(*) AS  total_Bussiness FROM tbl_addnews WHERE CATEGORY='World' ";
    $data5 = mysqli_query($conn, $query5);

        while($row5 = mysqli_fetch_assoc($data5)){
            $totalWorldNews = $row5["total_Bussiness"];
        }

?>
<!-- to count total Politics news -->
<?php

    $query6 = "SELECT COUNT(*) AS  total_Bussiness FROM tbl_addnews WHERE CATEGORY='Politics' ";
    $data6 = mysqli_query($conn, $query6);

        while($row6 = mysqli_fetch_assoc($data6)){
            $totalPoliticsNews = $row6["total_Bussiness"];
        }

?>
<!-- to count total Sports news -->
<?php

    $query7 = "SELECT COUNT(*) AS  total_Bussiness FROM tbl_addnews WHERE CATEGORY='Sports' ";
    $data7 = mysqli_query($conn, $query7);

        while($row7 = mysqli_fetch_assoc($data7)){
            $totalSportsNews = $row7["total_Bussiness"];
        }

?>
<!-- to count total Technology news -->
<?php

    $query8 = "SELECT COUNT(*) AS  total_Bussiness FROM tbl_addnews WHERE CATEGORY='Technology' ";
    $data8 = mysqli_query($conn, $query8);

        while($row8 = mysqli_fetch_assoc($data8)){
            $totalTechnologyNews = $row8["total_Bussiness"];
        }

?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>News Admin Panel</title>
    <link rel="stylesheet" href="./styles/dash.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">

</head>

<body>

    <div class="admin-container">
        <aside class="sidebar">
            <h2>News Admin</h2>
            <ul>
                <li><a href="dashboard.php"><i class="fas fa-tachometer-alt"></i> Dashboard</a></li>
                <li><a href="add_news.php"><i class="fas fa-plus"></i> Add News</a></li>
                <li><a href="manage_news.php"><i class="fas fa-tasks"></i> Manage News</a></li>
            </ul>
        </aside>

        <main class="main-content">
            <h1>Admin Dashboard</h1>
            <div class="dashboard-cards">
                <div class="card">
                    <h3>Total users</h3>
                    <p><?php echo $totalUsers; ?></p>
                </div>
                <div class="card">
                    <h3>Total News</h3>
                    <p><?php echo $totalNews;?></p>
                </div>
                <div class="card">
                    <h3>Published Today</h3>
                    <p><?php  echo $todayTotalNews; ?></p>
                </div>
                <div class="card">
                    <h3>Total Bussiness News</h3>
                    <p><?php echo $totalBussinessNews; ?></p>
                </div>
                <div class="card">
                    <h3>Total World News</h3>
                    <p><?php echo $totalWorldNews; ?></p>
                </div>
                <div class="card">
                    <h3>Total Politics News</h3>
                    <p><?php echo $totalPoliticsNews; ?></p>
                </div>
                <div class="card">
                    <h3>Total Sports News</h3>
                    <p><?php echo $totalSportsNews; ?></p>
                </div>
                <div class="card">
                    <h3>Total Technology News</h3>
                    <p><?php echo $totalTechnologyNews; ?></p>
                </div>
            </div>

            <div class="table-container">
                <h2>Recent Top-5  News Articles</h2>
                <table>
                    <tr>
                        <th>Title</th>
                        <th>Category</th>
                        <!-- <th>Status</th> -->
                        <th>Actions</th>
                    </tr>

                    <?php 
                        $recentNewsQuery = "SELECT * FROM tbl_addnews ORDER BY NEWS_ID DESC LIMIT 5";
                        $recentNewsData = mysqli_query($conn,$recentNewsQuery);

                        while($recentNewsRow = mysqli_fetch_assoc($recentNewsData)){
                            $recentNews_id = $recentNewsRow["NEWS_ID"];
                            $recentNewsTitle = $recentNewsRow["TITLE"];
                            $recentNewsCategory = $recentNewsRow["CATEGORY"];

                    ?>

                    <tr>
                        <td><?php echo $recentNewsTitle; ?></td>
                        <td><?php echo $recentNewsCategory; ?></td>
                        <!-- <td>Published</td> -->
                        <td>
                            <a href="editNews.php?news_id=<?php echo $recentNews_id ?>"><button onclick="return confirm('Are you sure you want to edit this news?');">Edit</button></a>
                            <a href="deleteNews.php?news_id=<?php echo $recentNews_id ?>"><button onclick="return confirm('Are you sure you want to delete this news?');">Delete</button></a>
                        </td>
                    </tr>

                    <?php } ?>
                  
                </table>
            </div>

        </main>
    </div>

</body>

</html>