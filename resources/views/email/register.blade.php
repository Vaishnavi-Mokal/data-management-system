<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body class="container">
   <div class="container">
    <p>
   Welcome to Our Team!!You are successfully Clear All the Paths!!
    </p>
    <p>
      <h3>Welcome {{$fname}}</h3>
      <br>
      Your Login Credentials :
    </p>
   </div>
    <table class="table text-left" style="text-align: left;">
    <tr>
      <th><b>Name :</b></th>
      <td>{{$fname}} {{$lname}}</td>
    </tr>
    <tr>
    <th><b>Email :</b></th>
    <td>{{$email}}</td>
    </tr>
   <tr>
   <th><b>Password :</b></th>
   <td>{{$password}}</td>
   </tr>
  </tbody>
</table>
<div class="container">
  <p>
    <h2>Thanks & Regards,</h2>
  </p>
</div>


</body>