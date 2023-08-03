<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title> webiste</title>
  <link href="https://fonts.googleapis.com/css2?family=Ubuntu:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400;1,500;1,700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.1/css/all.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.min.css">
  <link rel="stylesheet" href="css/style.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.min.js"></script>
  <script src="js/scripts.js"></script>
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
  <section id="home">
    <div class="inner-width">
      <div class="content">
        <h1>Hi I'm </h1>
        <div class="sm">
          <a href="#" class="fab fa-facebook-f"></a>
          <a href="#" class="fab fa-twitter"></a>
          <a href="#" class="fab fa-instagram"></a>
          <a href="#" class="fab fa-linkedin-in"></a>
          <a href="#" class="fab fa-youtube"></a>
        </div>
        <div class="buttons">
          <a  class="fab fa-youtube" onclick="show()" id="btn_yt">&nbsp;SUBSCRIBE TO UNLOCK LINK</a>
          <a id="yt" href=https://best-free-status.com/"  class="fa fa-download" style="background-color: green">&nbsp;Click To Download</a>
          <a id="ytv" href="https://best-free-status.com/"  class="fa fa-download" style="background-color: green">&nbsp;Checking you subscribe or not..</a>
        </div>
      </div>
    </div>
  </section>
  <button class="goTop fas fa-arrow-up"></button>
</body>
</html>
<script type="text/javascript">
  document.getElementById("yt").style.display="none";
  document.getElementById("ytv").style.display="none";
  function show()
  {
    window.open('https://www.youtube.com/channel/UCu1Hv9lMKBzpzLotl6u8d_g');
   // sleep(3000);
   setTimeout(function()
   {
    document.getElementById("yt").style.display="block";
    document.getElementById("btn_yt").style.display="none";
     document.getElementById("ytv").style.display="none";
   },5000);
   //alert();
      document.getElementById("ytv").style.display="block";
      document.getElementById("btn_yt").style.display="none";

  }
</script>