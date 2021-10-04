<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  <h4 style="text-decoration:underline">Vendor Repot</h4>
  <table class="table table-bordered table-sm">
    <thead>
      <tr>
        <th>Sl No.</th>
        <th>Name</th>
        <th>Contact Person</th>
        <th>Email</th>
        <th>Phone No.</th>
        <th>Address</th>
      </tr>
    </thead>
    <tbody>

    @foreach($alldata as $key=>$ven)
                <tr>
                    <td>{{$key+1}}</td>
                    <td>{{$ven->name}}</td>
                    <td>{{$ven->contact_person}}</td>
                    <td>{{$ven->email}}</td>
                    <td>{{$ven->phone_no}}</td>
                    <td>{{$ven->address}}</td>
                <tr>
        @endforeach      
    
       
     
    </tbody>
  </table>
</div>

    <script> 
        window.print()

    </script>

</body>
</html>
