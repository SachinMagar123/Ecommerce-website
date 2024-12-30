
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>
        Order Id : {{Session::get('order_id')}}
    </h1>

    <h1>
        Order Price :  {{Session::get('totalprice')}}
    </h1>

   <button>Pay Now</button> 
</body>
</html>