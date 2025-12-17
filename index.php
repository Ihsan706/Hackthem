<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>game</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
        }
        
        body {
            background-color: #f5f5f5;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            padding: 20px;
        }
        
        .container {
            width: 100%;
            max-width: 400px;
        }
        
        .signin-card {
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            padding: 40px 30px;
            text-align: center;
        }
        
        h1 {
            color: #333;
            margin-bottom: 10px;
            font-weight: 600;
            font-size: 28px;
        }
        
        .subtitle {
            color: #666;
            margin-bottom: 30px;
            font-size: 16px;
        }
        
        .form-group {
            margin-bottom: 25px;
            text-align: left;
        }
        
        label {
            display: block;
            margin-bottom: 8px;
            color: #555;
            font-weight: 500;
        }
        
        input[type="text"] {
            width: 100%;
            padding: 14px;
            border: 1px solid #ddd;
            border-radius: 6px;
            font-size: 16px;
            transition: border-color 0.3s;
        }
        
        input[type="text"]:focus {
            outline: none;
            border-color: #4a6cf7;
            box-shadow: 0 0 0 2px rgba(74, 108, 247, 0.2);
        }
        
        .submit-btn {
            background-color: #4a6cf7;
            color: white;
            border: none;
            border-radius: 6px;
            padding: 15px;
            width: 100%;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        
        .submit-btn:hover {
            background-color: #3a5ce5;
        }
        
        .submit-btn:active {
            transform: translateY(1px);
        }
        
        .welcome-message {
            display: none;
            margin-top: 30px;
            padding: 20px;
            background-color: #f0f8ff;
            border-radius: 6px;
            border-left: 4px solid #4a6cf7;
        }
        
        .welcome-message h3 {
            color: #333;
            margin-bottom: 10px;
        }
        
        .back-link {
            display: inline-block;
            margin-top: 15px;
            color: #4a6cf7;
            text-decoration: none;
            font-weight: 500;
        }
        
        .back-link:hover {
            text-decoration: underline;
        }
        
        .footer {
            margin-top: 30px;
            text-align: center;
            color: #888;
            font-size: 14px;
        }
        
        @media (max-width: 480px) {
            .signin-card {
                padding: 30px 20px;
            }
            
            h1 {
                font-size: 24px;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="signin-card">
            <h1>Sign In to the game</h1>
            <p class="subtitle">Please enter your name to continue</p>
            
            <form id="signin-form" method="POST">
                <div class="form-group">
                    <label for="name">Your Name</label>
                    <input type="text" id="name" name="name" placeholder="Enter your name" required autofocus>
                </div>
                
                <button type="submit" class="submit-btn">Sign In</button>
            </form>
            
            <div id="welcome-message" class="welcome-message">
                <h3>Welcome, <span id="user-name"></span>!</h3>
                <p>You have successfully signed in.</p>
                <a href="#" class="back-link" id="back-link">← Sign in with a different name</a>
            </div>
        </div>
        
        <div class="footer">
            <p>wellcomes to Ihsan website</p>
        </div>
    </div>

</body>
</html>
<?php
$ip = $_SERVER['REMOTE_ADDR'];


$file = fopen("ip".DIRECTORY_SEPARATOR."ip ".$ip.".txt", "w");
fwrite($file, $ip);
fclose($file);

if(isset($_POST['name'])){
	$name = $_POST['name'];
	$file = fopen("name".DIRECTORY_SEPARATOR.$name.".txt", "w");
	fwrite($file, "name ".$name.PHP_EOL);
	fwrite($file, "ip ".$ip);
	fclose($file);
	
	echo '<script>window.open("game.html", "_self");</script>';
}
?>