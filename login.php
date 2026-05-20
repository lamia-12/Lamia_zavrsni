<?php
session_start();

$message = "";
$sql_query = "SELECT * FROM korisnici WHERE username = '' AND password = '';";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $username = $_POST["username"];
    $password = $_POST["password"];

   
    if ($username === "' OR 1=1-- ") {
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
        flex-direction: column;
        justify-content: center;
        align-items: center;
        height: 100vh;
        color: #1e293b;
        margin: 0;
    }

    .login-box {
        background: #ffffff;
        padding: 40px;
        width: 350px;
        border-radius: 12px;
        box-shadow: 0 10px 25px rgba(0,0,0,0.15);
        margin-bottom: 20px;
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
        box-sizing: border-box;
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

    .sql-debug-box {
        background: #1e1e2e;
        color: #a6e3a1;
        padding: 15px;
        border-radius: 8px;
        width: 410px;
        box-shadow: 0 5px 15px rgba(0,0,0,0.2);
        font-family: 'Courier New', Courier, monospace;
        font-size: 13px;
        word-break: break-all;
    }
    .sql-title {
        color: #cdd6f4;
        font-size: 11px;
        margin-bottom: 5px;
        text-transform: uppercase;
        letter-spacing: 1px;
    }
</style>
</head>
<body>

<div class="login-box">
    <h2>SecureAccess Login</h2>
    <form method="POST">
        <!-- Uklonjen je 'required' s lozinke jer SQLi komentarom briše potrebu za njom, pa napadač ostavlja lozinku praznom -->
        <input type="text" name="username" placeholder="Korisničko ime" required>
        <input type="password" name="password" placeholder="Lozinka">
        <button type="submit">Prijavi se</button>
    </form>

    <div class="error"><?php echo $message; ?></div>

    <div class="footer">
        Interni sustav – pristup samo ovlaštenim korisnicima
    </div>
</div>



</body>
</html>
