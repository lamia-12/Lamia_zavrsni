<?php
session_start();

$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $username = $_POST["username"];
    $password = $_POST["password"];

    /*
     SIMULACIJA SQL INJECTION NAPADA
     Ako korisnik unese tipičan SQL injection uzorak,
     sustav će ga "prijaviti"
    */

    if (strpos($username, "OR") !== false || strpos($username, "--") !== false) {
        $_SESSION["user"] = "Administrator";
        header("Location: welcome.php");
        exit();
    } else {
        $message = "Neuspješna prijava.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>SecureAccess Portal</title>
   <style>
    body {
        font-family: 'Segoe UI', sans-serif;
        background: linear-gradient(135deg, #e0f2fe, #f8fafc);
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
        color: #1e293b;
    }

    .login-box {
        background: #ffffff;
        padding: 40px;
        width: 350px;
        border-radius: 12px;
        box-shadow: 0 10px 25px rgba(0,0,0,0.15);
    }

    h2 {
        text-align: center;
        margin-bottom: 25px;
        font-weight: 500;
    }

    
    input {
        width: 100%;
        padding: 10px;
        margin-bottom: 15px;
        border-radius: 6px;
        border: 1px solid #cbd5f5;
    }

    button {
        width: 100%;
        padding: 10px;
        border: none;
        border-radius: 6px;
        background-color: #60a5fa;
        color: white;
        font-weight: bold;
        cursor: pointer;
        transition: 0.3s;
    }

    button:hover {
        background-color: #3b82f6;
    }

    .error {
        margin-top: 10px;
        text-align: center;
        color: #dc2626;
    }

    .footer {
        margin-top: 15px;
        text-align: center;
        font-size: 12px;
        color: #64748b;
    }
</style>
</head>
<body>

<div class="login-box">
    <h2>SecureAccess Login</h2>
    <form method="POST">
        <input type="text" name="username" placeholder="Korisničko ime" required>
        <input type="password" name="password" placeholder="Lozinka" required>
        <button type="submit">Prijavi se</button>
    </form>

    <div class="error"><?php echo $message; ?></div>

    <div class="footer">
        Interni sustav – pristup samo ovlaštenim korisnicima
    </div>
</div>

</body>
</html>