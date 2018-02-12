<?
    $sql_host = "...";
    $sql_db = "...";
    $sql_user = "...";
    $sql_pass = "...";

    $conn_error = "Could not connect to database";

    $con = mysqli_connect($sql_host, $sql_user, $sql_pass, $sql_db) or die($conn_error);

    $hash = htmlspecialchars($_GET["l"]);
    $hash = mysqli_real_escape_string($con, $hash);

    if (!(empty($hash))) {
        $query = "SELECT * FROM `links` WHERE hash = '$hash'";
        $row = mysqli_query($con, $query) or die($conn_error);
        if (mysqli_num_rows($row)) {
            $_ROW = mysqli_fetch_assoc($row);
            $url = $_ROW["link"];
            header("Location: $url");
            exit;
        } else {
            die("link not available");
        }
    }
?>
<html>
    <head>
        <title>gus URL Shortener</title>
    </head>
    <body>
        Type the link to be shortened:<br>
        <form action="short.php" method="post">
        <input type="text" name="url"><input type="submit" value="Shorten">
        </form>
    </body>
</html> 
