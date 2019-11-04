<HTML dir=rtl>
<META content="text/html; charset=windows-1256" http-equiv=Content-Type>
	<meta http-equiv="Content-Language" content="it">
<head>
<center>
<table width=100% cellpadding=0 cellspacing=0 align=center border=0 bgcolor="#7A7A7A"  >
        <TR  >

                 <TH  align=center ><font size ="5" color="#FFCC00"> المكاتبات الصادرة
                 <BR>
                 </TH>
                 </TR>
                 </Table>
<table width=100% cellpadding=0 cellspacing=0 align=center border=0 background="img/sperator.gif"  >
        <TR  >


            <TD VALIGN="top"  >

                <img src="img/sperator.gif" border="0" width="2" height="40"></TH>
                 <TH  align=center background="img/sperator.gif"><A href="Ecst.php" ><img src="img/nfolbtn.gif" border="0" width="26" height="26"><br clear="all"> إضافة </A></TH>
                <TH  align=center background="img/sperator.gif"><img src="img/sperator.gif" border="0" width="2" height="40"></TH>
                <TH   align=center background="img/sperator.gif"><A href="Esearch.php" ><img src="img/search.gif" border="0" width="26" height="26"><br clear="all"> بحث </A></TH>
                <TH  align=center background="img/sperator.gif"><img src="img/sperator.gif" border="0" width="2" height="40"></TH>
                <TH   align=center background="img/sperator.gif"><A href="Esearch2.php" ><img src="img/search.gif" border="0" width="26" height="26"><br clear="all"> طباعة تقرير </A></TH>                	
                <TH  align=center background="img/sperator.gif"><img src="img/sperator.gif" border="0" width="2" height="40"></TH>
                <TH   align=center background="img/sperator.gif"><A href="Ecst2.php?start=0" ><img src="img/main.gif" border="0" width="26" height="26"><br clear="all"> الصفحة الرئيسية </A></TH>
                <TH  align=center background="img/sperator.gif"><img src="img/sperator.gif" border="0" width="2" height="40"></TH>
                <TH   align=center background="img/sperator.gif"><A href="main.php" ><img src="img/home.gif" border="0" width="26" height="26"><br clear="all"> الصفحة الأساسية </A></TH>

        </TD>


        </TR>

    </TABLE>



</head>
<body topmargin="0" leftmargin="0" rightmargin="0" bottommargin="0" bgcolor="#F2F2F2">

<FORM NAME="FORM2"  action="http://localhost/Ecst2.php" method="post">


<?PHP

$dbname="scclub";
session_start();
if(session_is_registered(myusername)){
$link =mysql_connect();

if(!$link)
{
print "can not connect to the server";
}
if(!mysql_select_db($dbname,$link))
{
print "sorry";
$dberror=mysql_error();
return false;
}
}

$fin=mysql_query("select * from export_table");
$n_res=mysql_num_rows($fin);

if(!($Text1=="")&&!($date1==""))

{
   ////////////insert values
$query = "INSERT INTO export_table ( export_ser,export_rec_dt,export_kind,export_sender,export_send_place,export_memo,export_to,export_notes )
values ( '$Text1','$date1', '$Text4','$Text5','$Text6','$Text7','$Text8','$Text10')";
mysql_query($query) or  die (mysql_error());




// uploading files
/*
if ((($_FILES["file"]["type"] == "image/gif")|| ($_FILES["file"]["type"] == "image/jpeg")|| ($_FILES["file"]["type"] == "image/pjpeg"))&& ($_FILES["file"]["size"] < 20000))
  {
  if ($_FILES["file"]["error"] > 0)
    {
    echo "Return Code: " . $_FILES["file"]["error"] . "<br />";
    }
  else
    {


    if (file_exists("upload/" . $_FILES["file"]["name"]))
      {
      echo $_FILES["file"]["name"] . " already exists. ";
      }
    else
      {



      move_uploaded_file($_FILES["file"]["tmp_name"],
      "upload/" . $_FILES["file"]["name"]);

      //echo "Stored in: " . "upload/" . $_FILES["file"]["name"];

      }
    }
  }
else
  {
  echo "Invalid file";
  }
   $max_id=mysql_query("select max(export_id) from export_table");

   while($rows = mysql_fetch_array($max_id,MYSQL_NUM))
	{
 		$first_column=$rows[0];
 	}

if (($_FILES["file"]["type"] == "image/gif"))
{	$type=".gif";}
if(($_FILES["file"]["type"] == "image/jpeg")||($_FILES["file"]["type"] == "image/pjpeg"))
{	$type=".jpg";}

    rename ( "upload/" . $_FILES["file"]["name"],"upload/img".$first_column .$type);

   $second_column=  "img".$first_column .$type;


   $query1 = "insert into export_file(export_id,file_name) values ('$first_column','$second_column')";

	mysql_query($query1)or  	die (mysql_error());
	///////////////////////////////////////////////////


  */
}

//}
else
{

include(“Ecst.php”);

}
    mysql_close( $link);
$Text1="";
$date1="";
$Text4="";
$Text5="";
$Text6="";
$Text7="";
$Text8="";
$Text10="";

	header("Location: http://localhost/Ecst2.php");

?>




<BR>




</FORM>





</BODY>

</HTML>
