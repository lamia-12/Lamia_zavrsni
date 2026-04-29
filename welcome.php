
<?php
session_start();

if (!isset($_SESSION["user"])) {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
    <style>
    body {
        font-family: 'Segoe UI', sans-serif;
        background: #f1f5f9;
        color: #1e293b;
        text-align: center;
        padding-top: 100px;
    }

    .box {
        background: #ffffff;
        padding: 50px;
        display: inline-block;
        border-radius: 12px;
        box-shadow: 0 10px 25px rgba(0,0,0,0.15);
    }

    h1 {
        margin-bottom: 20px;
    }

    a {
        color: #2563eb;
        text-decoration: none;
    }
</style>
</head>
<body>

<div class="box">
    <h1>Dobrodošli u administratorski sustav</h1>
    <p>Autentifikacija je zaobiđena demonstracijom SQL Injection napada.</p>
    <p><a href="login.php">Odjava</a></p>
</div>

</body>
</html>

