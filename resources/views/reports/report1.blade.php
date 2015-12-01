<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<style>
		html,body{
			margin: 0;
			padding:0;
			width: 100%;
			height: 100%;

		}
		.memdetails{
			float: left;
		}
		.date{
			float: right;
		}
		.container{
			font-family: serif;
			margin:0 auto;
			text-align: center;
			width: 90%;
		}
		.memdetails>h3{
			margin-bottom: 0;
			margin-top: 0;
		}

		.memdetails>h4{
			margin-bottom: 0;
			margin-top: 0;
		}

		.content{
			clear: both;
			float: left;
			text-align: left;
		}
		.content>h3{
			display: inline-block;
		}
		.content>table{
			margin-left: 40px;
			text-align: left;
		}
		.amnt{
			margin-left: 160px;
		}
		.name{
			clear: both;
			float: left;
		}
		.denom{
			margin-top: 20px;
			text-align: center;
		}
		.cashagain{
			text-align: right;
		}

		.sub-con{
			width: 100%;
			clear: left;
			float: left;
			text-align: center;
		}
		th, td {
    		overflow: hidden;
    		width: 300px;
		}
		.cash{
			height: 60px;
		}
	</style>
</head>
<body>
	<div class="container">
		<div class="memdetails">
			<h3>name</h3>
			<h4>address</h4>
		</div>
		<div class="date">
			<h4>date</h4>
		</div>

		<div class="content">
			<h3>loantype</h3>
			<h3 class="amnt">loan amount</h3>
			<table>
				<tr>
					<td>UID</td>
					<td>theuid</td>
				</tr>
				<tr>
					<td>Service Fee</td>
					<td>SFee</td>
				</tr>
				<tr>
					<td>Insurance Premium</td>
					<td>0.00</td>
				</tr>
				<tr>
					<td>Saving's Deposit</td>
					<td>0.00</td>
				</tr>
				<tr>
					<td>Mortuary</td>
					<td>0.00</td>
				</tr>
				<tr class="cash">
					<td>Cash</td>
					<td>cash</td>
				</tr>
			</table>
		</div>
		<div class="sub-con">
			<div class="denom">inwords</div>
			<div class="cashagain">cashhh</div>
		</div>
		<div class="name">
			<h3>name</h3>
		</div>
	</div>
</body>
</html>