<?
session_start();
require_once('snaphax/snaphax.php');

function bajar_img($id_snap) {
    global $argv;
    $opts = array();
    $opts['username'] = $_SESSION['u'];
    $opts['password'] = $_SESSION['p'];
    $opts['debug'] = 0; 

		$s = new Snaphax($opts);
		$result = $s->login();
		//var_dump($result);
		
		foreach ($result['snaps'] as $snap) {
			if ($snap['id'] == $id_snap) {
				
				$file_i = 'received_snaps/'.$snap['sn'].$snap['id'].'.jpg';
				$file_v = 'received_snaps/'.$snap['sn'].$snap['id'].'.mp4';

if (file_exists($file_i)) {
    $img=$snap['sn'].$snap['id'].'.jpg';
    echo $img;
} elseif (file_exists($file_v)) {
    $img=$snap['sn'].$snap['id'].'.mp4';
    echo $img;
}
else{

				$blob_data = $s->fetch($id_snap);
				if ($blob_data) {
				$ruta='../public_html/snaps/snaps/';
					if ($snap['m'] == SnapHax::MEDIA_IMAGE)
						$ext = '.jpg';
					else
						$ext = '.mp4';
						
					file_put_contents('received_snaps/'.$snap['sn'].$snap['id'].$ext, $blob_data);
					$img=$snap['sn'].$snap['id'].$ext;
					echo $img;
				}
			}
		}
		
	}
}
//echo $_SESSION['u'].'aaa'.$_SESSION['p'];
	?>
	<?
session_start();
require_once('snaphax/snaphax.php');

    $opts = array();
    $opts['username'] = $_SESSION['u'];
    $opts['password'] = $_SESSION['p'];
    $opts['debug'] = 0; 

    $s = new Snaphax($opts);
    $result = $s->login();
   // $null=var_dump($result['snaps']);
    //echo json_encode($result['snaps']);
    $shop=$result['snaps'];

    ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>SnapCha7</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Le styles -->
    <link href="css/bootstrap.css" rel="stylesheet">
    <style type="text/css">
      body {
        padding-top: 60px;
        padding-bottom: 40px;
      }
      .sidebar-nav {
        padding: 9px 0;
      }

      @media (max-width: 980px) {
        /* Enable use of floated navbar text */
        .navbar-text.pull-right {
          float: none;
          padding-left: 5px;
          padding-right: 5px;
        }
      }
    </style>
    <link href="css/bootstrap-responsive.css" rel="stylesheet">

    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="js/html5shiv.js"></script>
    <![endif]-->

    <!-- Fav and touch icons -->
    
  </head>

  <body>

    <div class="navbar navbar-inverse navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container-fluid">
          <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="brand" href="#">SnapCha7</a>
          <div class="nav-collapse collapse">
            <!--<p class="navbar-text pull-right">
              Logged in as <?echo $_SESSION['u'];?>
            </p>-->
            <p class="navbar-text pull-right">
              <a href="logout">Logout from SnapCha7</a>
            </p>
            <ul class="nav">
              <li><a href="index">Home</a></li>
              <li><a href="mailto:support.slozano@gmail.com">Contact Developer</a></li>
            </ul>
          </div><!--/.nav-collapse -->
        </div>
      </div>
    </div>

    <div class="container-fluid">
      <div class="row-fluid">
        <div class="span3">
          <div class="well sidebar-nav">
            <ul class="nav nav-list">
              <li class="nav-header">Snaps Availables</li>
              <?
              $s_u=0;
              foreach ($result['snaps'] as $snap) {
			if ($snap['st'] == SnapHax::STATUS_NEW && $snap['m']!='3') {
			$s_u=$s_u+1;
			$sender=$snap['sn'];
             echo '<li><a href="#">'.$snap['sn'].'</a></li>';
             }
             }
              ?>
              <li class="nav-header">Friends</li>
              <?
              foreach ($result['friends'] as $friend) {
			//if ($friend['st'] == SnapHax::STATUS_NEW && $friend['m']!='3') {
             echo '<li>'.$friend['display'].'</li>';
             //}
             }
              ?>
            </ul>
          </div><!--/.well -->
        </div><!--/span-->
        <div class="span9">
          <div class="hero-unit">
            <h2>Snap by <?echo$sender;?></h1>
            <img align="center" src="received_snaps/<?bajar_img($_GET['id_img']);?>" />
            <p>&nbsp;</p>
            <p><a href="#" class="btn btn-primary btn-large">Set snap as viewed</a></p>
          </div>
          <div class="row-fluid">

            <div class="span4">

            </div><!--/span-->
          </div><!--/row-->
          </div>

      <hr>

      <footer>
        <p>&copy; Santiago Lozano R 2013</p>
      </footer>

    </div><!--/.fluid-container-->

    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap-transition.js"></script>
    <script src="js/bootstrap-alert.js"></script>
    <script src="js/bootstrap-modal.js"></script>
    <script src="js/bootstrap-dropdown.js"></script>
    <script src="js/bootstrap-scrollspy.js"></script>
    <script src="js/bootstrap-tab.js"></script>
    <script src="js/bootstrap-tooltip.js"></script>
    <script src="js/bootstrap-popover.js"></script>
    <script src="js/bootstrap-button.js"></script>
    <script src="js/bootstrap-collapse.js"></script>
    <script src="js/bootstrap-carousel.js"></script>
    <script src="js/bootstrap-typeahead.js"></script>

  </body>
</html>

	
	
	
	
	