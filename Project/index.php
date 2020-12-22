<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Tab Logo -->
    <link href="/Project/pages/images/tab_logo.png" rel="shortcut icon">
    
    <style type="text/css">
       button
       {
           margin: 40px;
           width: 120px;
           height: 40px;
           background: #337ab7;
           border: none;
           border-radius: 16px;
           color: #fff;
           font-family: sans-serif;
           font-weight: 500;
           text-transform: uppercase;
           transition: 0.2s ease;
           cursor: pointer;
       }

        button:hover,
        button:focus
        {
            background: #23527c;
            transition: 0.2s ease;
        }
        img
        {
            max-width: 100%; 
            height: auto;
            margin-top:40px;
            margin-bottom:40px;
        }
    </style>
    
    <title>Outlet</title>
</head>

<body>
     <div style = "text-align:center; margin:auto;">
        
        <img src="/Project/pages/images/outlet.png" alt="Outlet">
        
        <form action="/Project/pages/index.php" method="post">
            <p><button type="submit" name="start-button" class="button">Start</button></p>
        </form>
    </div>
</body>

</html>