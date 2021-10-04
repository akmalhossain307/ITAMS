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
  <h4 style="text-decoration:underline">Asset Cost Repot</h4>
  <table class="table table-bordered table-sm">
    <thead>
      <tr>
        <th>Sl No.</th>
        <th>Asset Name</th>
        <th>Purchase price</th>
      </tr>
    </thead>
    <tbody>
    @php 
    $total=0;
    @endphp

    @foreach($assets as $key=>$asset)
                <tr>
                    <td>{{$key+1}}</td>
                    <td>{{$asset->asset_name}}</td>
                    <td>Tk-{{$asset->purchase_price}}</td>
                    @php 
                    $total+=$asset->purchase_price;
                    @endphp 
                <tr>
        @endforeach      
             <tr>
                    <td style="text-align:right"colspan="2"><strong >Total Cost:</strong></td>
                    <td >Tk-@php 
                    echo$total;
                    @endphp
                    </td>
                   
                <tr>
       
     
    </tbody>
  </table>
</div>

    <script> 
        window.print()

    </script>

</body>
</html>
