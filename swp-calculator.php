<!DOCTYPE html>
<html>
<head>
    <title>SWP Calculator</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
</head>
<style>
    body {
        background-image: url('https://bortolussifamilylaw.com/wp-content/uploads/2021/11/pexels-karolina-grabowska-5412200.jpg');	
}
  .text{
    margin-left:12em;
    margin-top:2em;
  }
  .form-signin {
    border-radius:6px;
  max-width: 460px;
  padding: 15px 35px 45px;
  margin: 0 auto;
  background-color:	#D6D6D6 ;
  border: 1px solid rgba(0,0,0,0.1);}
  .font{
        font-size:20px;
     }
  .form-control {
	  position: relative;
	  font-size: 16px;
	  height: auto;
	  padding: 8px;
		@include box-sizing(border-box);}
        .button{
        background-color: #663781; /* Purple */
  border: none;
  color: white;
  padding: 8px 26px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  border-radius:3px ;
     } 
.bal{
    font-size:22px;  
}
</style>
<body>
<?php
$balance = 0; // Initialize $balance to a default value

if (isset($_REQUEST['calculate'])) {
    $initial_amount = floatval($_REQUEST['initial_amount']);
$withdrawal_amount = floatval($_REQUEST['withdrawal_amount']);
$annual_return = floatval($_REQUEST['annual_return']);
$years = floatval($_REQUEST['years']);

    $monthly_return = pow(1 + $annual_return, 1/12) - 1;
    $months = $years * 12;
    $balance = $initial_amount;

    for ($i = 0; $i < $months; $i++) {
        $balance = $balance * (1 + $monthly_return) - $withdrawal_amount;
    }

    if ($_REQUEST['initial_amount'] === NULL || $_REQUEST['withdrawal_amount'] === NULL || $_REQUEST['annual_return'] === NULL || $_REQUEST['years'] === NULL) {
        echo "<script language=javascript> alert(\"Please enter correct values.\");</script>";
    } else {
        for ($i = 0; $i < $months; $i++) {
            $balance = $balance * (1 + $monthly_return) - $withdrawal_amount;
        }
    }
}

?>
<h1 class="text">SWP Calculator</h1>
<form class="form-signin">
    <table>
        <tr>
            <td class="font"><b>Initial Amount:</b></td>
            <td><input name="initial_amount"class="form-control" required type="text"></td>
        </tr>
        <tr>
            <td class="font"><b>Withdrawal Amount:</b></td>
            <td><input name="withdrawal_amount" class="form-control mt-2" required type="text"></td>
        </tr>
        <tr>
            <td class="font"><b>Annual Return (decimal):</b></td>
            <td><input name="annual_return"class="form-control" required type="text"></td>
        </tr>
        <tr>
            <td class="font"><b>Years:</b></td>
            <td><input name="years" class="form-control" required type="text"></td>
        </tr>
        <tr>
            <td></td>
            <td><input type="submit" class="button mt-3" name="calculate" value="Calculate"></td>
        </tr>
        <tr>
            <td class="bal">Remaining Balance:</td>
            <td class="bal"><?php echo $balance; ?></td>
        </tr>
    </table>
</form>
</body>
</html>
