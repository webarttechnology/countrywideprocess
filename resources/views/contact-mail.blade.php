<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
      .pTag {
        font-size: 14px;
        margin: 0;
        color: black;
        padding:0;
      }
    </style>  
    <title>Contact US</title>
</head>
<body>
  
  <h1>Hello!!</h1>
  <p class="pTag">Name: {{ $fname }} </p>
  <p class="pTag">E-Mail: {{ $email }}</p>
  <p class="pTag">Mobile No: {{ $mobile_no }}</p>
  <p class="pTag">City: {{ $city }}</p>
  <p class="pTag">service: {{ $service }}</p>
  <p class="pTag">Comment: {{ $content }}</p>


  

    </body>
    </html>