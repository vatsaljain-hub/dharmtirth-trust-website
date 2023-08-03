<?php
echo ' <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">';
echo '<link rel="stylesheet" type="text/css" href="css/style.css">';
echo '<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">';
echo '    <link rel="apple-touch-icon" sizes="57x57" href="images/fav/apple-icon-57x57.png">
<link rel="apple-touch-icon" sizes="60x60" href="images/fav/apple-icon-60x60.png">
<link rel="apple-touch-icon" sizes="72x72" href="images/fav/apple-icon-72x72.png">
<link rel="apple-touch-icon" sizes="76x76" href="images/fav/apple-icon-76x76.png">
<link rel="apple-touch-icon" sizes="114x114" href="images/fav/apple-icon-114x114.png">
<link rel="apple-touch-icon" sizes="120x120" href="images/fav/apple-icon-120x120.png">
<link rel="apple-touch-icon" sizes="144x144" href="images/fav/apple-icon-144x144.png">
<link rel="apple-touch-icon" sizes="152x152" href="images/fav/apple-icon-152x152.png">
<link rel="apple-touch-icon" sizes="180x180" href="images/fav/apple-icon-180x180.png">
<link rel="icon" type="image/png" sizes="192x192"  href="images/fav/android-icon-192x192.png">
<link rel="icon" type="image/png" sizes="32x32" href="images/fav/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="96x96" href="images/fav/favicon-96x96.png">
<link rel="icon" type="image/png" sizes="16x16" href="images/fav/favicon-16x16.png">
<link rel="manifest" href="images/fav/manifest.json">
<meta name="msapplication-TileColor" content="#ffffff">
<meta name="msapplication-TileImage" content="images/fav/ms-icon-144x144.png">';
include 'admincp/config.php';
$user_ip = $_SERVER['REMOTE_ADDR'];
$browser_info = $_SERVER['HTTP_USER_AGENT'];$browser = get_browser();
$sql = "INSERT INTO IP VALUES (NULL,'$user_ip','$browser_info')";
if ($fire = mysqli_query($con,$sql)) {
	
}
?>
 <div class="container">
 	<div id="google_translate_element"></div>

<script type="text/javascript">

	function googleTranslateElementInit() {
    new google.translate.TranslateElement({pageLanguage: 'en' , includedLanguages : 'hi,MR,en'}, 'google_translate_element');
    // new google.translate.TranslateElement({pageLanguage: 'en' , includedLanguages : 'hi,MR,en'}, 'google_translate_element');
  }
</script>
<!-- <script type="text/javascript">
function googleTranslateElementInit() {
  new google.translate.TranslateElement({pageLanguage: 'hindi', layout: google.translate.TranslateElement.InlineLayout.SIMPLE}, 'google_translate_element');
}
</script> -->

<script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
 </div>