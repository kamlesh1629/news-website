<?php
include "../include/connection.php";
 
$query = "DELETE FROM tbl_addnews WHERE NEWS_ID = '$_GET[news_id]' ";
$data = mysqli_query($conn,$query);

if($data){
    echo "
        <script>
        	alert('News Deleted..');
            window.location.href='dashboard.php';
        </script>
    ";
}else{
    echo "
        <script>
        	alert('News not Deleted..');
        </script>
    ";
}

?>