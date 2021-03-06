<?php
    $headerTitle = "The Oregon State Book Exchange || Account Info";
    $loginNav = "active";
    ?>
<?php include("_header.php");?>
<?php $uid = checkAuth(true);?>

<h3>Account Information</h3></br>
<div class="panel panel-default"><div class="panel-body">
<h4><?php echo "$uid"."'s Posts"; ?></h4></br>

<?php
    //User Textbook Table
    echo "<table class='table' id='userTable'>";
    echo "<thead>";
    echo "<tr>";
    echo "<th>Date</th>";
    echo "<th>Title</th>";
    echo "<th>Author</th>";
    echo "<th>ISBN</th>";
    echo "<th>CRN</th>";
    echo "<th>Lcoation</th>";
    echo "</tr>";
    echo "</thead>";
    echo "<tbody>";
    
    //Fill table
    $stmt = $mysqli->prepare("select tbTitle,tbAuthor,isbn,crn,date,location from tbList where userName = ?");
    $stmt->bind_param("s", $uid);
    if ($stmt->execute()) {
        $stmt->bind_result($title, $author, $isbn, $crn, $date, $location);
        
        while($stmt->fetch()){
            echo "<tr>";
            echo "<td>".htmlspecialchars($date)."</td>";
            echo "<td>".htmlspecialchars($title)."</td>";
            echo "<td>".htmlspecialchars($author)."</td>";
            echo "<td>".htmlspecialchars($isbn)."</td>";
            echo "<td>".htmlspecialchars($crn)."</td>";
            echo "<td>".htmlspecialchars($location)."</td>";
            echo "</tr>";
        }
        $stmt->close();
    }
    echo "</tbody></table>";
?>

</div></div>

<?php include("_footer.php"); ?>
