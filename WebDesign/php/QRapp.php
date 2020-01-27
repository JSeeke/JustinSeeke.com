<?php
class QRapp {
        public $activeName = "";
        public $activeURL = "";
        public $activeIndex = -1;
        public $savedDestinations = [];
        
        function __construct() {
            $jsonString = file_get_contents('./data/QRappdata.json', true);
            if ($jsonString == false) {
                die("Unable to open qr active target!");
            }
            $appData = json_decode ($jsonString);
	        $this->activeIndex = $appData->{'activeDestination'};
	        $this->activeName = strval($appData->{'savedDestinations'}[$this->activeIndex]->{'name'});
	        $this->activeURL = strval($appData->{'savedDestinations'}[$this->activeIndex]->{'URL'});
	        $this->savedDestinations = $appData->{'savedDestinations'};
        }
        
        public function set() {
            
        }
        
        public function add() {
            
        }
        
        public function delete() {
            
        }

        public function render() {
            ?>
            <!doctype html>
			<html lang="en">
			<head>
				<title>QR App</title>

				<!-- Required meta tags -->
			    <meta charset="utf-8">
			    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

			    <!-- Bootstrap CSS -->
			    <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous"> -->

				<!-- Custom CSS -->
				<link rel="stylesheet" type="text/css" href="../css/fonts.css" media="all">
				<link rel="stylesheet" type="text/css" href="../css/styles.css" media="all">

				<!-- Custom JavaScript -->

			</head>
			<body>
				<header>
					<div id="navbar">
						<ul id="navList">
							<li><a href='../html/homepage.html#aboutMe'>About Me</a></li>
							<li><a href='../html/homepage.html#myStory'>My Story</a></li>
							<li><a href='../html/homepage.html#myProjects'>Projects</a></li>
						</ul>
					</div>
				</header>

				<div id="QRapp">
					<div id="QRtitleSection">
						<h1>QR Code Web App</h1>
						<div id="activeDestination">
							<div>
								<?php
								echo '<a id="activeURL" href="' . $this->activeURL . '"><img src="../images/QRcode.png"></a>';
								echo '<h2 id="activeName">Current Destination: ' . $this->activeName . '</h2>';
								?>
							</div>
						</div>
					</div>

					<!-- QR destination Data Entry Section -->
					<div id="destinationEntrySection">
						<h2>Enter QR Code Destination</h2>
						<div class="dataEntry">
							<input id="newName" value="Name">
							<input id="newURL" value="URL">
							<button>Add</button>
						</div>
					</div>

					<!-- Saved Desitnations -->
					<div id="savedDestinations">
						<h2>Saved Destinations</h2>
						<table>
						    <?php
						    for ($i = 0; $i < count($this->savedDestinations); $i++) {
                                $currentDestination = $this->savedDestinations[$i];    
    							echo '<tr class="savedDestination">';
    							echo '<td class="targetName">' . $currentDestination->{'name'} . '</td>';
    							echo '<td class="targetURL">' . $currentDestination->{'URL'} . '</td>';
    							echo '<td><button class="setActiveButton">Set Active</button></td>';
    							echo '<td><button class="removeButton">Remove</button></td>';
    							echo '</tr>';
						    }
							?>
						</table>
					</div>
					
				</div>
			</body>
			</html>
			<?php
        }
   }
?>