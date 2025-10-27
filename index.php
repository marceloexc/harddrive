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
					
					<video class="hdr" id="bright" autoplay muted loop playsinline>
						<source src="/static/hdr.webm" type="video/webm">
						<source src="/static/hdr.mp4" type="video/mp4">
					</video>

					<video class="sdr" id="fallback" autoplay muted loop playsinline>
						<source src="/static/black.mp4" type="video/mp4">
					</video>
					

					<svg class="hdr-compatible" id="hdr" viewBox="0 -40 500 120" preserveAspectRatio="xMidYMid meet">
						<defs>
							<clipPath id="clip" clipPathUnits="userSpaceOnUse">
								<text x="0%" y="100%"
									  text-anchor="start"

									  font-family="HappyTimes, Tahoma"
									  font-weight="100"
									  font-size="160"
									  letter-spacing="-12">
									<tspan>Hard</tspan>
									<tspan x="0%" y="248">Drive</tspan>
								</text>
							</clipPath>
						</defs>
					</svg>
				</div>

				<!-- <div class="sdr-only" id="sdr">
					 <svg viewBox="0 0 500 200" preserveAspectRatio="xMidYMid meet" style="border: 1px solid red;">
					 <text x="0%" y="100%"
					 text-anchor="start"
					 fill="black"
					 font-family="HappyTimes, Tahoma"
					 font-weight="100"
					 font-size="160"
					 letter-spacing="-12">
					 <tspan>Hard</tspan>
					 <tspan x="0%" y="248">Drive</tspan>
					 </text>
					 </svg>
					 </div> -->

				<img src="/static/banner.jpg">
			</header>

			<ul>
				<?php
				$directory = ".";
				$files = scandir($directory);

				foreach ($files as $f) {
					if ($f == '.' || $f == '..' || $f == '.git' || $f == "static") continue;

					if (is_dir($f)) {
						echo "<li><a href=\"$f\">$f</a></li>";
					}
				}
				?>

			</ul>
		</main>

		<footer>
			<img src="/static/soriginal.jpg" >
			<!-- <p>
				 such a funny life I lead
				 </p> -->

			<?php

			function formatBytes($bytes, $precision = 2) {
				$units = ['B', 'KB', 'mb', 'GB', 'TB'];

				$bytes = max($bytes, 0);
				$pow = floor(($bytes ? log($bytes) : 0) / log(1024));
				$pow = min($pow, count($units) - 1);

				$bytes /= pow(1024, $pow);
				// this will also work in place of the above line:
				// $bytes /= (1 << (10 * $pow));

				return round($bytes, $precision) . $units[$pow];
			}


			$total_size = 0;
			$di = new RecursiveDirectoryIterator('.');
			foreach (new RecursiveIteratorIterator($di) as $filename => $file) {
				if($file->isFile()) {
					/* echo $filename . ' - ' . $file->getSize() . ' bytes <br/>'; */
					$total_size += $file->getSize();
				}
			}

			$total_size_formatted = formatBytes($total_size);

			echo "serving $total_size_formatted from debian linux"; //in bytes
			?>
		</footer>

	</body>

</html>
