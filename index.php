<!DOCTYPE html>
<html>
	<head>
		<title>my hard drive</title>
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

				<img src="/static/banner.jpg">
			</header>

			<ul>
				<?php
				$directory = ".";
				$files = scandir($directory);
				// really ugly 
				foreach ($files as $f) {
					if ($f == '.' || $f == '..' || $f == '.git' || $f == "static") continue;

					if (is_dir($f)) {

						$board_dir = scandir($f);

						echo "<li><a href=\"$f\">$f</a>";

						foreach ($board_dir as $ff) {
							$file_path = "$f/$ff";

							// get date file
							if (is_file($file_path) && $ff === "date") {
								$file_handle = fopen($file_path, "r");
								if ($file_handle) {
									while (!feof($file_handle)) {
										$line = fgets($file_handle);		
									}
									fclose($file_handle);
									echo " | $line";

								} else { echo "<p>Could not open $file_path</p>"; }
							}
						}
						echo "</li>";
						
					}
				}
				?>
			</ul>
		</main>

		<footer>
			<?php
			$footer_array = array("/static/soriginal.jpg", "/static/lunch.jpeg", "/static/dusk.jpeg", "/static/still.gif", "/static/att.jpg");

			$footer_image_key = array_rand($footer_array, 1);

			$footer_img = $footer_array[$footer_image_key];
			
			echo "<img src=$footer_img >"


			?>

			<p>
				You may like:
			</p>

			<a href="https://rm2000.app">rm2000 tape recorder for macintosh</a>
			<br>
			<a href="https://wiki.xxiivv.com">devine lu linvega</a>
			<br>
			<a href="https://valvearchive.com">valve archive</a>
			<br>
			<a href="https://stanleylieber.com/">stanley lieber</a>
			<br>
			<a href="https://www.epiclylaterd.com/">epicly later'd</a>
			<br>
			<a href="https://howcouldyoudothisto.us/">how could you do this to us</a>
			<br>
			<a href="https://otto-b.info/" >otto benson</a>
			<br>
			<a href="https://www.johnnyhardstaff.com/home/future-of-gaming">hardstaff at his best</a>
			<br>
			<a href="https://orllewin.uk/pcr/">pudsey clough radio</a>
			<br>
			<a href="https://emacsformacos.com/">emacs for mac os</a>
			<br>
			<a href="http://www.danamania.com/print/">cool nerdy posters</a>
			<br>
			
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

				echo "<p>hosted on debian</p>"; //in bytes
				?>

			<br>	<br>
			<p>
				marcelo mendez 2025
			</p>

			
		</footer>

	</body>

</html>
