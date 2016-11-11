<?php
	if (isset($_POST["submit"])) {
		$email = $_POST['email'];
		$subject = $_POST['msgTitle'];
		$message = $_POST['msgBody'];
		$to = 'jazdzyk.zaneta@gmail.com';

		$body = "From E-Mail: $email\n Message:\n $message";

		// Check if email has been entered and is valid
		if (!$_POST['email'] || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
			$errEmail = 'Please enter a valid email address';
		}

        //Check if subject has been entered
        if (!$_POST['msgTitle']) {
            $errSubject = 'Please enter subject of message';
        }

		//Check if message has been entered
		if (!$_POST['msgBody']) {
			$errMessage = 'Please enter your message';
		}

        // If there are no errors, send the email
        if (!$errSubject && !$errEmail && !$errMessage) {
            if (mail ($to, $subject, $body)) {
                $result='<div class="alert alert-success">Thank You! I will be in touch</div>';
            } else {
                $result='<div class="alert alert-danger">Sorry there was an error sending your message. Please try again later</div>';
            }
        }
	}
?>

<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Żaneta Jażdżyk. Mobile & Web Developer. Warsaw, Poland. Skill Set, Courses, Projects, Contact.">
    <meta name="keywords" content="żaneta jażdżyk, portfolio">
    <meta property="og:image" content="http://zanetajazdzyk.com/img/bg.jpg" />
    <meta property="og:title" content="Żaneta Jażdżyk ~ Portfolio" />
    <meta property="og:description" content="Żaneta Jażdżyk. Mobile & Web Developer. Warsaw, Poland. Skill Set, Courses, Projects, Contact." />
    <title>Żaneta Jażdżyk ~ Portfolio</title>
    <link href='http://fonts.googleapis.com/css?family=Open+Sans&subset=latin-ext,latin' rel='stylesheet'
          type='text/css'>
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="./css/lib/bootstrap.min.css">
    <link rel="stylesheet" href="./css/main.css">
</head>
<body data-spy="scroll" data-target=".navbar" data-offset="50">
<nav class="navbar navbar-default navbar-fixed-top">
    <div class="container-fluid">
        <div>
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#myNavbar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>
            <div class="collapse navbar-collapse" id="myNavbar">
                <ul class="nav navbar-nav">
                    <li class="active"><a href="#home" aria-controls="home">Home</a></li>
                    <li><a href="#about" aria-controls="about">About Me</a></li>
                    <li><a href="#skills" aria-controls="skills">Skill Set</a>
                    </li>
                    <li><a href="#projects" aria-controls="projects">Projects</a>
                    </li>
                    <li><a href="#contact" aria-controls="contact">Contact</a></li>
                </ul>
            </div>
        </div>
    </div>
</nav>
<div id="home" class="row banner">
</div>
<div class="container">
    <section id="about" class="row">
        <h1>About me</h1>

        <div class="section-content">
            <div class="personal-data col-md-7 col-sm-6">
                <p>Żaneta Jażdżyk</p>

                <p>jazdzyk.zaneta@gmail.com</p>

                <p>Software Developer</p>
                <p>Warsaw, Poland</p>

                <div class="social-networks-list">
                    <ul class="social-network social-circle">
                        <li><a href="https://www.facebook.com/zaneta.k.szymanska" class="icoFacebook"
                               title="Facebook" target="_blank"><i class="fa fa-facebook"></i></a></li>
                        <li><a href="https://twitter.com/ZanetaJazdzyk" class="icoTwitter" title="Twitter"
                               target="_blank"><i
                                class="fa fa-twitter"></i></a></li>
                        <li><a href="https://instagram.com/nette.j/" class="icoInstagram" title="Instagram"
                               target="_blank"><i
                                class="fa fa-instagram"></i></a></li>
                        <li><a href="https://plus.google.com/u/0/103481254524273071811" class="icoGoogle"
                               title="Google +" target="_blank"><i class="fa fa-google-plus"></i></a></li>
                        <li><a href="https://pl.linkedin.com/pub/żaneta-jażdżyk/b1/605/540" class="icoLinkedin"
                               title="Linkedin" target="_blank"><i class="fa fa-linkedin"></i></a></li>
                    </ul>
                </div>
            </div>
            <div class="photo col-md-5 col-sm-6">
            </div>
        </div>
    </section>

    <section id="skills" class="row">
        <h1>Skill set</h1>
        <p>Font size = skill's level</p>
        <div class="section-content">
            <section id="skills-list">
            </section>
        </div>
    </section>

    <section id="projects" class="row">
        <h1>Projects</h1>

        <div class="section-content">
                <div class="projects-list">
                    <section>
                        <h4>This portfolio</h4>

                        <p class="skills-in-projects">Bootstrap + HTML5 + CSS3 + JSON + JavaScript + jQuery
                            + Gulp +
                            JSHint
                            +
                            CSSLint</p>
                    </section>

                    <section>
                        <h4>Watch Faces on Gear 2 & Gear S</h4>

                        <p>Some of my Gear faces applications. All available on Galaxy Gear Market (search
                            "nette"
                            tag
                            for all my applications on Market):</p>

                        <div class="row gear-apps">
                            <div class="col-sm-3 col-xs-6 thumbnail">
                                <img src="./img/WatchFaces/wheelface.png" alt="WheelFace"
                                     class="gear-app-img">

                                <p>Wheel Face</p>
                            </div>

                            <div class="col-sm-3 col-xs-6 thumbnail">
                                <img src="./img/WatchFaces/tipNtop.png" alt="WheelFace"
                                     class="gear-app-img">

                                <p>TipNTop</p>
                            </div>

                            <div class="col-sm-3 col-xs-6 thumbnail">
                                <img src="./img/WatchFaces/blacknwhite.png" alt="WheelFace"
                                     class="gear-app-img">

                                <p>BlackNWhite</p>
                            </div>

                            <div class="col-sm-3 col-xs-6 thumbnail">
                                <img src="./img/WatchFaces/vintage.png" alt="WheelFace"
                                     class="gear-app-img">

                                <p>Vintage</p>
                            </div>
                        </div>

                        <p class="skills-in-projects">HTML5 + CSS3 + jQuery </p>
                        <p>> 10k of downloads</p>
                    </section>

                    <section>
                        <h4>TopMovies</h4>

                        <p>Cooperation on Top Movies application</p>

                        <p>
                            <a href="https://play.google.com/store/apps/details?id=com.ionicframework.topmovies283911">Application
                                available on Google store</a></p>
                    </section>
                    <section>
                        <h4>Samsung Labo</h4>

                        <p>Conducting lessons of the technological path within the Samsung Labo at West
                            Pomeranian
                            University of Technology in Szczecin (2014/10 - 2015/04).</p>
                        <a href="https://labo.samsung.pl/">Official page</a>
                    </section>
                    <section>
                        <h4>Tizen applications & articles</h4>

                        <p>Some of my articles published on developer.tizen.org *:</p>
                        <ul id="list-of-articles">
                        </ul>
                        <p>* Almost every article encloses sample application.</p>
                    </section>
                </div>
            </div>
        </section>
        <section id="contact" class="row">
            <h1>Contact</h1>
            <form method="post" role="form" action="index.php">
                <div class="form-group">
                    <input id="email" name="email" type="email" class="form-control" placeholder="Type your e-mail" value="<?php echo htmlspecialchars($_POST['email']); ?>">
                    <?php echo "<p class='text-danger'>$errEmail</p>";?>
                </div>

                <div class="form-group">
                    <input id="msgTitle" name="msgTitle" type="text" class="form-control" placeholder="Message title" value="<?php echo htmlspecialchars($_POST['msgTitle']); ?>">
                    <?php echo "<p class='text-danger'>$errSubject</p>";?>
                </div>

                <div class="form-group">
                    <textarea id="msgBody" name="msgBody" class="form-control" rows="3" placeholder="Message body" value="<?php echo htmlspecialchars($_POST['msgBody']); ?>"></textarea>
                    <?php echo "<p class='text-danger'>$errMessage</p>";?>
                </div>

                <div class="form-group">
                    <input id="submit" name="submit" type="submit" class="btn btn-default" value="Send">
                </div>

                <div class="form-group">
                    <div class="col-sm-10 col-sm-offset-2">
                        <?php echo $result; ?>
                    </div>
                </div>
            </form>
        </section>
    </section>
</div>

<footer class="footer">
    <p>Designed with <a href="http://getbootstrap.com/">Bootstrap</a>.</p>

    <p>All rights reserved © 2015-2016 Żaneta Jażdżyk </p>
</footer>

<script src="//code.jquery.com/jquery-3.1.1.min.js"></script>
<script src="./lib/jquery-3.1.1.min.js"></script>
<script src="./lib/bootstrap.min.js"></script>
<script src="./js/main.js"></script>
<script>
    (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
                (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
            m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
    })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

    ga('create', 'UA-66653114-1', 'auto');
    ga('send', 'pageview');

</script>
</body>
</html>