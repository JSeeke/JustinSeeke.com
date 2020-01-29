<?php
class QRapp {
        public $activeName = "";
        public $activeURL = "";
        public $activeIndex = -1;
        public $savedDestinations = [];
        
        function __construct() {
            $this->updateData();
        }
        
        public function set($index) {
            $this->activeIndex = $index;
            $this->acitveName = $this->savedDestinations[$index]->name;
            $this->activeURL = $this->savedDestinations[$index]->URL;
            $this->writeAppData();
        }
        
        public function add($name, $URL) {
            $newDestination = json_decode('{"name":"' . $name . '","URL":"' . $URL . '"}');
			array_push($this->savedDestinations, $newDestination);
            $this->writeAppData();
        }
        
        public function delete($index) {
        	array_splice($this->savedDestinations, $index, 1);
            $this->writeAppData();
        }

        private function writeAppData() {
        	$jsonStringSavedDestinations = json_encode($this->savedDestinations);
        	$jsonStringAppData = '{"activeDestination":' . $this->activeIndex . ',"savedDestinations":' . $jsonStringSavedDestinations . '}';
		    file_put_contents('./data/QRappdata.json', stripcslashes($jsonStringAppData));
        }

        private function updateData(){
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

        public function render() {
        	$this->updateData();
            ?>
            <!doctype html>
			<html lang="en">
			<head>
				<title>QR App</title>

				<!-- Required meta tags -->
			    <meta charset="utf-8">
			    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

				<!-- Custom CSS -->
				<link rel="stylesheet" type="text/css" href="../css/fonts.css" media="all">
				<link rel="stylesheet" type="text/css" href="../css/styles.css" media="all">

				<!-- Custom JavaScript -->
				<script src="../javascript/QRapp.js"></script>

			</head>
			<body>
				<header>
					<a id="home" href="https://www.justinseeke.com">JS</a>
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
								<a id="activeURL" href="https://www.justinseeke.com?qr"><img src="../images/dynamicQRcode.png"></a>';
								<?php
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
							<button onclick="sendAddRequest();">Add</button>
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
    							echo '<td><button class="setActiveButton" onclick="sendSetRequest(' . $i . ')">Set Active</button></td>';
    							echo '<td><button class="removeButton" onclick="sendDeleteRequest(' . $i . ')">Remove</button></td>';
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