<?php
	if(isset($_GET['type'])){
		switch($_GET['type']) {
		case "adam.linscott":
			$datatmp = json_decode(file_get_contents("settings.json"),true);
			$datatmp['rotate'] = false;
			file_put_contents("settings.json", json_encode($datatmp));
			file_put_contents("show.txt", "adam.linscott");
			break;
		case "zachary.claretscott":
			$datatmp = json_decode(file_get_contents("settings.json"),true);
			$datatmp['rotate'] = false;
			file_put_contents("settings.json", json_encode($datatmp));
			file_put_contents("show.txt", "zachary.claretscott");
			break;
		case "nick.jennett":
			$datatmp = json_decode(file_get_contents("settings.json"),true);
			$datatmp['rotate'] = false;
			file_put_contents("settings.json", json_encode($datatmp));
			file_put_contents("show.txt", "nick.jennett");
			break;
		case "camera":
			$datatmp = json_decode(file_get_contents("settings.json"),true);
			$datatmp['rotate'] = false;
			file_put_contents("settings.json", json_encode($datatmp));
			file_put_contents("show.txt", "camera");
			break;
		case "Change":
			$datatmp = json_decode(file_get_contents("settings.json"),true);
			$_GET['current'] = $datatmp['current'];
			$_GET['currentView'] = $datatmp['currentView'];
			$_GET['timeView'] = $datatmp['timeView'];
			$_GET['rotate'] = $datatmp['rotate'];
			$_GET['next'] = $datatmp['next'];
			file_put_contents("settings.json", json_encode($_GET));
			break;
		default:
			$datatmp = json_decode(file_get_contents("settings.json"),true);
			$datatmp['rotate'] = true;
			file_put_contents("settings.json", json_encode($datatmp));
		}
	}
	$data = json_decode(file_get_contents("settings.json"),true);
?>
<html>
	<head>
		<title>Probably Jam</title>
		<style>
@import url("http://fonts.googleapis.com/css?family=OpenSansCondensed");
body {
  font-family: "Open Sans Condensed" sans-serif;
  display: -webkit-box;
  display: -webkit-flex;
  display: -ms-flexbox;
  display: flex;
  -webkit-box-pack: center;
  -webkit-justify-content: center;
      -ms-flex-pack: center;
          justify-content: center;
  height: 100vh;
  background: #2c3e50;
  overflow: hidden;
}
nav, form {
  -webkit-box-flex: 1;
  -webkit-flex: 1 1 1;
      -ms-flex: 1 1 1;
          flex: 1 1 1;
  -webkit-align-self: center;
      -ms-flex-item-align: center;
          align-self: center;
}
form{
  position: absolute;
  left: 0px;
  top: 0px;
  width: 100%;
}
#message{
  width: calc(100% - 328px);
  text-transform: none;
}
a, input {
  font-size: 0.7rem;
  text-decoration: none;
  padding: 1rem;
  background: #34495e;
  color: rgba(255,255,255,0.8);
  text-transform: uppercase;
  letter-spacing: 0.2rem;
  -webkit-transform: rotateX(0deg);
          transform: rotateX(0deg);
  display: inline-block;
}
a:hover, input:hover {
  background: #233140;
  color: #fff;
}
a:active, input:active {
  background: #1a242f;
}
a:first-child, input:first-child {
  border-radius: 2rem 0 0 2rem;
  padding-left: 2rem;
}
a:last-child, input:last-child {
  border-radius: 0 2rem 2rem 0;
  padding-right: 2rem;
}
h3 {
position: absolute;
left: calc(50% - 175px);
top: 30%;
color: rgb(255, 255, 255);
}
		</style>
	</head>
	<body>
		<?php if($data['rotate']==true) {?><h3>The next swap will be in <?php echo $data['next']; ?> seconds.</h3><?php } ?>
		<nav>
			<a href="/index.php?type=rotate">Rotate</a>
			<a href="/index.php?type=camera">Camera</a>
			<a href="/index.php?type=zachary.claretscott">Zachary Claret-Scott</a>
			<a href="/index.php?type=adam.linscott">Adam Linscott</a>
			<a href="/index.php?type=nick.jennett">Nick Jennett</a>
		</nav>
<br />
		<form>
			<input type="text" name="finish" value="<?php echo $data['finish']; ?>">
			<input type="text" name="message" value="<?php echo $data['message']; ?>" id="message">
			<input type="submit" value="Change" name="type">
		</form>
	</body>
</html>
