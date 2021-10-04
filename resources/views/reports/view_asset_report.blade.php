<!DOCTYPE html>
<html lang="en">
<head>
  <title>Asset Report</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  <h4 style="text-decoration:underline">Asset Repot</h4>
  <table class="table table-bordered table-sm">
    <thead>
      <tr>
        <th>Sl No.</th>
        <th>Asset Name</th>
        <th>Serial No</th>
        <th>Purchase Date</th>
        <th>Purchase price</th>
      </tr>
    </thead>
    <tbody>

    @foreach($assets as $key=>$asset)
                <tr>
                    <td>{{$key+1}}</td>
                    <td>{{$asset->asset_name}}</td>
                    <td>{{$asset->serial_no}}</td>
                    <td>{{$asset->purchase_date}}</td>
                    <td>Tk-{{$asset->purchase_price}}</td>
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
