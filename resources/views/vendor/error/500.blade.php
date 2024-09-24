<!DOCTYPE html>
<html lang="fr">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
	<meta name="description" content="">
	<meta name="author" content="">

	<title>{{config('app.name')}} - Error</title>
	<link rel="stylesheet" href="assets/styles/style.min.css">

	<!-- Waves Effect -->
	<link rel="stylesheet" href="assets/plugin/waves/waves.min.css">

</head>

<body>

<div id="page-500">
	<div class="content">
		<div class="title-on-desktop">
			<svg style="width: 600px; height: 200px" alignment-baseline="middle">
				<defs>
					<clipPath id="clip2">
						<path d="M 0 0 L 600 0 L 600 80 L 0 80 L 0 0 L 0 125 L 600 125 L 600 200 L 0 200 Z" />
					</clipPath>
				</defs>
				<text x="300" y="190" style="width: 600px; height: 200px" text-anchor="middle" font-family="Lato" font-weight="700" font-size="250" fill="#505458" clip-path="url(#clip2)">5<tspan fill="#001e60">0</tspan>0</text>
			</svg>
			<div class="title">LA PAGE N'EXISTE PAS</div>
		</div>
		<h1 class="title-on-mobile">Erreur 500: Erreur</h1>
		<p>Il semble que vous ayez pris un mauvais virage. Ne vous inquiétez pas... cela arrive aux meilleurs d'entre nous. Vous voudrez peut-être vérifier votre connexion Internet ou accès réseau. Voici une petite astuce qui pourrait vous aider à vous remettre sur la bonne voie.</p>
		<a href="{{ route('login') }}" class="btn btn-info">Retour à la page de connexion</a>
		
	</div>
</div>
<script src="assets/scripts/jquery.min.js"></script>
	<script src="assets/scripts/modernizr.min.js"></script>
	<script src="assets/plugin/bootstrap/js/bootstrap.min.js"></script>
	<script src="assets/plugin/nprogress/nprogress.js"></script>
	<script src="assets/plugin/waves/waves.min.js"></script>

	<script src="assets/scripts/main.min.js"></script>
</body>
</html>