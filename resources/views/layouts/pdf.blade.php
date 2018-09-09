<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>

	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="msvalidate.01" content="D7FA5F3C1C35DD21C8BEC2F91C49053C" />
	<style>
		body {
			margin: 30px;
			font-family: 'sans-serif';
		}

		.page-break{
			page-break-after: always;
		}

		table {
			border-collapse: separate;
			border-spacing: 0;
			min-width: 100%;
			margin-bottom: 15px;

		}
		table tr th,
		table tr td {
			border-right: 1px solid #eee;
			border-bottom: 1px solid #eee;
			padding: 5px;
		}
		table tr th:first-child,
		table tr td:first-child {
			border-left: 1px solid #eee;
		}
		table tr th {
			background: #eee;
			border-top: 1px solid #eee;
			text-align: left;
		}



		/* top-left border-radius */
		table tr:first-child th:first-child {
			border-top-left-radius: 6px;
		}

		/* top-right border-radius */
		table tr:first-child th:last-child {
			border-top-right-radius: 6px;
		}

		/* bottom-left border-radius */
		table tr:last-child td:first-child {
			border-bottom-left-radius: 6px;
		}

		/* bottom-right border-radius */
		table tr:last-child td:last-child {
			border-bottom-right-radius: 6px;
		}


		.panel{
			border: solid 1px #eee;
			border-radius: 6px;
			margin-bottom: 15px;
		}

		.panel__header{
			padding: 15px;
			border-bottom: solid 1px #ddd;
			background: #eee;
			color: #000;
		}
		.panel__body{
			padding: 15px;
		}

		.hero__logo{
			max-width: 200px;
		}

		.contacts{
			width: 49%;
			float: left;
			font-size: 11px;
		}

		.contacts:first-child{
			margin-right: 2%;
		}

		.row{
			width: 100%;
			*zoom: 1
		}

		.row::before,
		.row::after{
			display: table;
			content: '';
		}

		.row::after{
			clear: both;
		}

</style>
</head>
<body>
	<div id="app">
		@yield('content')
	</div>
</body>
</html>
