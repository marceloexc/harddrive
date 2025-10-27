<html>
	<head>
		<title>DRIVE IT HARD</title>
		<link rel="stylesheet" href="style.css" type="text/css">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<script src="hdr.js"> </script>
	</head>
	<body>
		<main>
			<header>
				<div class="video-text">
					<video autoplay muted loop playsinline>
						<source src="/static/hdr.webm" type="video/webm">
						<source src="/static/hdr.mp4" type="video/mp4">
					</video>

					<svg viewBox="0 -40 500 120" preserveAspectRatio="xMidYMid meet">
						<defs>
							<clipPath id="clip" clipPathUnits="userSpaceOnUse">
								<text x="0%" y="100%"
									  text-anchor="start"
								
									  font-family="HappyTimes, Tahoma"
									  font-weight="100"
									  font-size="160"
										 letter-spacing="-12">
									<tspan >Hard</tspan>
									<tspan x="0%" y="248">Drive</tspan>
								</text>
							</clipPath>
						</defs>
					</svg>

				</div>

				<img src="/static/banner.jpg">
			</header>
			<?php
			$directory = ".";
			$files = scandir($directory);

			foreach ($files as $file) {
				if ($file == '.' || $file == '..' || $file == '.git' || $file == "static") continue;
				
				if (is_dir($file)) {
					echo "<p><a href=\"$file\">$file</a></p>";
				}
			}
			?>
		</main>

		<footer>
			Such a funny life I lead
		</footer>
		
	</body>

</html>
