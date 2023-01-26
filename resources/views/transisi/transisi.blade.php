<!DOCTYPE html>
<html>

<head>
	<title>Transisi Option</title>
</head>
<link rel="stylesheet" type="text/css" href="{{ asset('assets/transisi/style.css') }}">
<script type="text/javascript" href='{{ asset('assets/transisi/style.js') }}'></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>

<body>
	<div class="projcard-container">

		<div class="projcard projcard-blue animate__animated animate__fadeInRight"><a href="">
			<div class="projcard-innerbox">
				<img class="projcard-img" src="{{ asset('assets/transisi/img/depo.png') }}" />
				<div class="projcard-textbox">
					<div class="projcard-title">Depo Dashboard</div>
					<div class="projcard-subtitle"></div>
					<div class="projcard-bar"></div>
				</div>
			</a></div>
		</div>

		<div class="projcard projcard-green animate__animated animate__fadeInLeft"><a href="/dashboard">
			<div class="projcard-innerbox">
				<img class="projcard-img" src="{{ asset('assets/transisi/img/mainline.png') }}"/>
				<div class="projcard-textbox">
					<div class="projcard-title">Mainline Dashboard</div>
					<div class="projcard-subtitle"></div>
					<div class="projcard-bar"></div>
				</div>
			</a></div>
		</div>

	</div>

</body>

</html>
