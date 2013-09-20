<?
session_start();
if(!isset($_SESSION['u'])){
header('Location: login');
}
require_once('snaphax/snaphax.php');

    $opts = array();
    $opts['username'] = $_SESSION['u'];
    $opts['password'] = $_SESSION['p'];
    $opts['debug'] = 0; 

    $s = new Snaphax($opts);
    $result = $s->login();
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
              <a href="logout">Logout</a>
            </p>
            <ul class="nav">
              <li class="active"><a href="#">Home</a></li>
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
			if($s_u==1){
			$most_recent_id=$snap['id'];
			}
             echo '<li><a href="get?id_img='.$snap['id'].'">'.$snap['sn'].'</a></li>';
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
            <h1>Welcome Back, <?echo $_SESSION['u'];?></h1>
            <?
            if($s_u==1){
            $snaps_unseen='You have 1 snap unseen';
            }
            elseif($s_u>=2){
            $snaps_unseen='You have '.$s_u.' snaps unseen';
            }
            else{
            $snaps_unseen='There are no new snaps';
            }
            ?>
            <h3><?echo $snaps_unseen;?></h3>
            <p><a href="get?id_img=<?echo $most_recent_id?>" class="btn btn-primary btn-large">View most recent snap</a></p>
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