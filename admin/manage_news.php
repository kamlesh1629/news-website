<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage News - Admin Panel</title>
    <link rel="stylesheet" href="./styles/manage.css">
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">

</head>
<body>
    <aside class="sidebar">
        <h2>News Admin</h2>
        <ul>
            <li><a href="dashboard.php" style="color: white; text-decoration: none;"><i class="fas fa-tachometer-alt"></i> Dashboard</a></li>
            <li><a href="add_news.php" style="color: white; text-decoration: none;"><i class="fas fa-plus"></i> Add News</a></li>
            <li><a href="manage_news.php" style="color: white; text-decoration: none;"><i class="fas fa-tasks"></i> Manage News</a></li>
        </ul>
    </aside>
    <main class="main-content">
        <div class="table-container">
            <h2>Manage News Articles</h2>
            <table>


                <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Category</th>
                    <th>Date</th>
                    <th>Actions</th>
                </tr>

                <?php
                        include "../include/connection.php";

                        $query = "SELECT * FROM tbl_addnews";
                        $data = mysqli_query($conn, $query);

                        while ($row = mysqli_fetch_assoc($data)) {
                            $NewsId= $row["NEWS_ID"];
                            $Title = $row["TITLE"];
                            $Category = $row["CATEGORY"];
                            $Content = $row["CONTENT"];
                            $time = $row["TIME"];

                            $onlydate = date("Y-m-d",strtotime($time));
                    ?>
                <tr>
                    <td><?php echo $NewsId; ?></td>
                    <td class="title"><?php echo $Title; ?></td>
                    <td><?php echo $Category; ?></td>
                    <td><?php echo $onlydate; ?></td>
                    <td>
                            <a href="editNews.php?news_id=<?php echo $NewsId ?>"><button class="action-btn edit-btn" onclick="return confirm('Are you sure you want to edit this news?');">Edit</button></a>
                            <a href="deleteNews.php?news_id=<?php echo $NewsId ?>"><button class="action-btn delete-btn" onclick="return confirm('Are you sure you want to delete this news?');">Delete</button></a>
                        </td>
                </tr>
             
                <?php } ?>

            </table>
        </div>
    </main>
</body>
</html>
