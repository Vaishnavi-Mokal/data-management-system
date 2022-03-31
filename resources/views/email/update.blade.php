

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
    Your Update is successfully!!!
    </p>
    <p>
      <br>
      Following are the Updated Deails :
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
   <th><b>Role :</b></th>
   <td>{{$role}}</td>
   </tr>
   <tr>
   <th><b>Staus :</b></th>
   <td>{{$status}}</td>
   </tr>
  </tbody>
</table>
<div class="container">
  <p>
    <h2>Thanks & Regards,</h2>
  </p>
</div>


</body>
</html>