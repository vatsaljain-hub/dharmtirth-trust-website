        <?php
        //mysqli_query("SET character_set_results = 'utf8', character_set_client = 'utf8', character_set_connection = 'utf8', character_set_database = 'utf8', character_set_server = 'utf8'");

if ($con = mysqli_connect('localhost','root','','dharmtirth'))
{
    //echo "string";
}
else
{
    echo "Please wait.."; 
   header("Refresh:1");


}
?>