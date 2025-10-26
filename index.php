<html>
	<head>
		<title>DRIVE IT HARD</title>
		<link rel="stylesheet" href="style.css" type="text/css">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
	</head>
	<body>
		<main>
			<header>	
				<img src="/static/hd.png">
				<h1>
					hard drive
				</h1>
			</header>
			<?php
			$directory = ".";
			$files = scandir($directory);

			foreach ($files as $file) {
				if ($file == '.' || $file == '..' || $file == '.git') continue;
				
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
