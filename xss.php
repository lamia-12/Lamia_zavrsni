<?php
// uzima input iz URL-a, npr. ?ime=Marko
$ime = $_GET['ime'] ?? '';
?>

<!DOCTYPE html>
<html>
<head>
    <title>XSS demo</title>
</head>
<body>
    <h1>Pozdrav <?php echo $ime; ?></h1>
</body>
</html>