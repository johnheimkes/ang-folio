<?
if(isset($_POST['submit'])){

  $name = $_POST['name'];
  $email = $_POST['email'];
  $message = $_POST['message'];
  $url = $_POST['url'];
  substr_replace($url ,"",-1);
  $host  = $_SERVER['HTTP_HOST'];
  $uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');

  function check_email_address($email) {
    if (!ereg("^[^@]{1,64}@[^@]{1,255}$", $email)) { 
      return false; 
    }
    $email_array = explode("@", $email); 
    $local_array = explode(".", $email_array[0]); 
    for ($i = 0; $i < sizeof($local_array); $i++) { 
      if (!ereg("^(([A-Za-z0-9!#$%&'*+/=?^_`{|}~-][A-Za-z0-9!#$%&'*+/=?^_`{|}~\.-]{0,63})|(\"[^(\\|\")]{0,62}\"))$", 
      $local_array[$i])) { 
        return false; 
      } 
    } 
    if (!ereg("^\[?[0-9\.]+\]?$", $email_array[1])) {  
      $domain_array = explode(".", $email_array[1]); 
      if (sizeof($domain_array) < 2) { 
        return false; 
      } 
      for ($i = 0; $i < sizeof($domain_array); $i++) { 
        if (!ereg("^(([A-Za-z0-9][A-Za-z0-9-]{0,61}[A-Za-z0-9])|([A-Za-z0-9]+))$", $domain_array[$i])) { 
          return false; 
        } 
      } 
    } 
    return true; 
  }

  if (check_email_address($email)) {
    $complete_message = "";
    $complete_message .= "Name: " . $name . "\n";
    $complete_message .= "E-mail: " . $email . "\n";
    $complete_message .= "Message: " . $message . "\n";

    $send_to_user = "Thanks for sending me a message. I will get back to you in two shakes of a lamb's tail. \r\n http://www.angelinaallen.com \r\n\r\nYour submission:\r\n" . $complete_message;

    $send_to_me = "Someone has used the contact form on angelinaallen.com. Their message is below.\r\n\r\n" . $complete_message;

    mail("hello@angelinaallen.com", "Portfolio | Website Contact Request", $send_to_me, "From:" . $email);
    mail($email, "Thank you for contacting Angelina Allen", $send_to_user, "From: hello@angelinaallen.com");

    $success = true;
    $error = false;
    unset($_POST);
  }
  else{
    $error = true;
    $success = false;
    unset($success);
  }
}
unset($_POST);

if($success){
  $name = '';
  $email = '';
  $message = '';
  $url = '';
}
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
  <meta http-equiv="content-type" content="text/html; charset=utf-8" />
  <title>The Portfolio of Angelina Allen</title>
  <?php
if( strstr($_SERVER['HTTP_USER_AGENT'],'Android') ||
  strstr($_SERVER['HTTP_USER_AGENT'],'webOS') ||
  strstr($_SERVER['HTTP_USER_AGENT'],'iPhone') ||
  strstr($_SERVER['HTTP_USER_AGENT'],'iPod') ||
  strstr($_SERVER['HTTP_USER_AGENT'],'iPad')
){
  $stylesheet="mobile";
}
else {
  $stylesheet = 'style';
}
?>
<link rel="stylesheet" href="css/<?=$stylesheet;?>.css" type="text/css" media="screen" />
<link rel="shortcut icon" href="/favicon.ico" type="image/x-icon" />
<link rel="apple-touch-icon" href="/image_name.png"/>
 <meta name="Keywords" content="Angelina Allen, Web Designer, Web Design, Design, Minneapolis, Typography, Saint Paul, Angelina_Allen, 1017allen" />
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script>
<script type="text/javascript" src="js/jquery.scrollable.js"></script>
<script type="text/javascript" src="js/application.js"></script>
<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-23993932-3']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>
</head>

<body>
  <div id="wrapper">
    <div id="mast-head">
      <div id="header">
        <h1><a href="http://www.angelinaallen.com">Angelina Allen's Portfolio</a></h1>
      </div>
    </div>
    <div id="mast-slideshow">
      <div id="slideshow">
        <div id="nav">
          <ul class="navi">
            <li><a href="#">Work</a></li>
            <li><a href="#">About</a></li>
            <li><a href="#">Contact</a></li>
          </ul>
        </div>
        <div id="slides">
          <div class="slide">
            <p id="welcome">Hi there! Welcome to my portfolio.</p>
          </div>
          <div class="slide">
            <p id="about">My name is Angelina Allen. Although I am a designer for both web and print, I often find myself thinking as an artist. I believe that like great art, a successful design needs a concept that is not only strong but also connects to its audience. Our world is filled with beautiful things and I am striving to add to it’s collection.</p>
          </div>
          

        <div class="slide" id="form">
          <?php
          //-------BEGIN FORM AREA -----------
                      function curPageURL() {
                       $pageURL = 'http';
                       if ($_SERVER["HTTPS"] == "on") {$pageURL .= "s";}
                       $pageURL .= "://";
                       if ($_SERVER["SERVER_PORT"] != "80") {
                        $pageURL .= $_SERVER["SERVER_NAME"].":".$_SERVER["SERVER_PORT"].$_SERVER["REQUEST_URI"];
                       } else {
                        $pageURL .= $_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
                       }
                       return $pageURL;
                      }
          ?>
                    <form method="post" action="<?=curPageURL();?>">
                      <label for="name">Name: </label><input type="text" name="name" id="name" value="<?= @$name;?>" class="clearit" />
                      <label for="email">Email: </label><input type="text" name="email" id="email" value="<?= @$email;?>" class="clearit" />
                      <label for="message">Message: </label><textarea name="message" id="message" class="clearit"><?= @$message;?></textarea>
                      <input type="hidden" value="<?=curPageURL();?>" name="url">
                      <input type="submit" value="Say Hello" name="submit" id="submit"/>
          <? if ($error){echo '            <p class="message error">Please enter a valid E-mail address.</p>';}?>
          <? if ($success){echo '            <p class="message success">Thank you for contacting Angelina Allen. A copy of your message was delivered to the E-mail address provided.</p>';}?>
                    </form>
          <?
                    unset($error);
                    unset($success);
          ?>
          <div id="links">
            <ul>
              <li id="email_link"><a href="mailto:hello@angelinaallen.com?subject=Hi there!" />Email</a></li>
              <li id="resume"><a href="resume.html">Resume</a></li>
              <li id="vcard"><a href="angelinaallen.vcf">vCard</a></li>
              <li id="twitter"><a href="http://twitter.com/#!/Angelina_Allen" target="_blank">Twitter</a></li>
              <li id="linkedin"><a href="http://www.linkedin.com/in/angelinaallen" target="_blank">Linkedin</a></li>
              <li id="google"><a href="https://plus.google.com/108229045776128877760/posts?hl=en" target="_blank">Google+</a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div id="mast-content">
    <div id="content">
      <!-- Project 1 -->
      <div class="project">
        <div class="project_info" id="cwtk">
          <h3 class="project_name">Create With The Kids</h3>
          <p class="project_about">For our graduation event, my fellow graduates and I decided to do things a little differently. We decided to hold a charity event to raise money for the Minneapolis Children's Hospital to raise money for their art therapy program. We wanted to have a simple and beautiful site that displayed all the information about our event with some little extras.</p>
          <div class="role_info"><h3 class="role">Role</h3>
          <p class="role_about">Project Manager, Co-Designer, Illustrator</p>
          </div>
        </div>
        <div class="project_images">
          <ul class="col1">
            <li><img src="images/cwtk/1.png" alt="Website for Create With The Kids" /></li>
            <li><img src="images/cwtk/2.png" alt="Website for Create With The Kids" /></li>
          </ul>
          <ul class="col2">
            <li><img src="images/cwtk/3.png" alt="Website for Create With The Kids" /></li>
          </ul>
        </div>
      </div>
      <!-- Project 2 -->
      <div class="project">
        <div class="project_info">
          <h3 class="project_name">The First Feature</h3>
          <p class="project_about">The First Feature is a small startup film company in St. Paul, MN. They came to my partner and I because they wanted a place on the web where they could display their work and weekly webisodes about themselves and their journey in starting their own company.</p>
          <div class="role_info">
          <h3 class="role">Role</h3>
          <p class="role_about">Designer, UX/IA, Branding</p>
          <h3 class="role">Status</h3>
          <p class="role_about">In Development</p>
          </div>
        </div>
        <div class="project_images">
            <ul class="col1">
              <li><img src="images/firstfeature/1.png" alt="Home page for The First Feature" /></li>
              <li id="scrollable">
                <a class="prev"><img src="images/firstfeature/back.png" /></span></a>
                <div class="scrollable">   
                  <div class="items">
                    <div><img src="images/firstfeature/pross3.jpg" alt="Home page for The First Feature" /></div>
                    <div><img src="images/firstfeature/pross2.jpg" alt="Home page for The First Feature" /></div>
                    <div><img src="images/firstfeature/pross1.jpg" alt="Home page for The First Feature" /></div>
                  </div>

                </div>
                <a class="next"><img src="images/firstfeature/next.png" /></span></a>
              </li>
            </ul>
            <ul class="col2">
              <li><img src="images/firstfeature/2.png" alt="Home page for The First Feature" /></li>
              <li><img src="images/firstfeature/3.png" alt="Home page for The First Feature" /></li>
              <li><img src="images/firstfeature/4.png" alt="Home page for The First Feature" /></li>
              <li><img src="images/firstfeature/5.png" alt="Home page for The First Feature" /></li>
            </ul>
          </div>
        </div>
        <!-- Project 3 -->
        <div class="project">
          <div class="project_info">
            <h3 class="project_name" >Kyle Fredrick's Portfolio</h3>
            <p class="project_about">Kyle Fredrick was in need of a portfolio site. Being a photo student, he needed something that would be easy to update on his own. We both decided that a custom WordPress theme was just what he needed.</p>
            <div class="role_info">
            <h3 class="role">Role</h3>
            <p class="role_about">Designer, HTML/CSS, Javascript, WordPress</p>
            <h3 class="role">Status</h3>
            <p class="role_about">In Development</p>
            </div>
          </div>
          <div class="project_images">
            <ul class="col1">
              <li><img src="images/phototheme/1.png" alt="A custom wordpress theme" /></li>
              <li><img src="images/phototheme/2.png" alt="A custom wordpress theme" /></li>
            </ul>
            <ul class="col2">
              <li><img src="images/phototheme/3.png" alt="A custom wordpress theme" /></li>
              <li><img src="images/phototheme/4.png" alt="A custom wordpress theme" /></li>
            </ul>
          </div>
        </div>
        <!-- Project 4 -->
        <div class="project">
          <div class="project_info" id="wco">
            <h3 class="project_name">WebCheckout Training</h3>
            <p class="project_about">Learning WebCheckout was developed to help train new employees of The Art Institutes International of Minnesota's Equipment Cage on a web based checkout system. It consists of a series of instructional videos paired with written step-by-step instructions on how to complete specific tasks. Finally, there is a quiz at the end for the new employees to prove their knowledge of WebCheckout.</p>
            <div class="role_info">
            <h3 class="role">Role</h3>
            <p class="role_about">Co-Designer, Copy Writer, Video Editor</p>
            </div>
          </div>
          <div class="project_images">
            <ul class="col1">
              <li><img src="images/wco/1.png" alt="A site to train people how to use Web Check Out." /></li>
              <li><img src="images/wco/2.png" alt="A site to train people how to use Web Check Out." /></li>
            </ul>
            <ul class="col2">
              <li><img src="images/wco/3.png" alt="A site to train people how to use Web Check Out." /></li>
            </ul>
          </div>
        </div>
        <!-- Project 5 -->
        <div class="project">
          <div class="project_info">
            <h3 class="project_name" id="streetcar">The Minnesota Streetcar Museum</h3>
            <p class="project_about">Client project for class. The Members of The Minnesota Streetcar Museum told us they wanted something easy to use and update. With seven members on the team, we had six weeks to do a full content audit of their site, redesign, development, QA and training.</p>
            <div class="role_info">
            <h3 class="role">Roles</h3>
            <p class="role_about">Project Manager, Lead Designer, UX/IA</p>
            </div>
          </div>
          <div class="project_images">
            <ul class="col1">
              <li><img src="images/trollyride/1.png" alt="The Minnesota Streetcar Museum new site design." /></li>
              <li><img src="images/trollyride/2.png" alt="The Minnesota Streetcar Museum new site design." /></li>
            </ul>
            <ul class="col2">
              <li><img src="images/trollyride/3.png" alt="The Minnesota Streetcar Museum new site design." /></li>
              <li><img src="images/trollyride/4.png" alt="The Minnesota Streetcar Museum new site design." /></li>
            </ul>
          </div>
        </div>
      </div></div>

      <div id="footer">
        <p class='copy'>Copyright &copy; 2012 &mdash; Angelina Allen</p>
      </div>
    </div>
  </body>
  </html>
