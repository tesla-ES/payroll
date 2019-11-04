<HTML dir=rtl>
<META content="text/html; charset=windows-1256" http-equiv=Content-Type>
	<meta http-equiv="Content-Language" content="it">
<head>
<center>
<table width=100% cellpadding=0 cellspacing=0 align=center border=0 bgcolor="#7A7A7A"  >
        <TR  >

                 <TH  align=center ><font size ="5" color="#FFCC00">   المكاتبات الواردة
                 <BR>
                 </TH>
                 </TR>
                 </Table>
<table width=100% cellpadding=0 cellspacing=0 align=center border=0 background="img/sperator.gif"  >
        <TR  >

            <TD VALIGN="top"  >

                <img src="img/sperator.gif" border="0" width="2" height="40"></TH>
                 <TH  align=center background="img/sperator.gif"><A href="cst.php" ><img src="img/nfolbtn.gif" border="0" width="26" height="26"><br clear="all"> إضافة </A></TH>
                <TH  align=center background="img/sperator.gif"><img src="img/sperator.gif" border="0" width="2" height="40"></TH>
                <TH   align=center background="img/sperator.gif"><A href="search.php" ><img src="img/search.gif" border="0" width="26" height="26"><br clear="all"> بحث </A></TH>
                <TH  align=center background="img/sperator.gif"><img src="img/sperator.gif" border="0" width="2" height="40"></TH>
                <TH   align=center background="img/sperator.gif"><A href="search2.php" ><img src="img/search.gif" border="0" width="26" height="26"><br clear="all"> طباعة تقرير </A></TH>                	
                <TH  align=center background="img/sperator.gif"><img src="img/sperator.gif" border="0" width="2" height="40"></TH>
                <TH   align=center background="img/sperator.gif"><A href="cst2.php?start=0" ><img src="img/main.gif" border="0" width="26" height="26"><br clear="all"> الصفحة الرئيسية </A></TH>
                <TH  align=center background="img/sperator.gif"><img src="img/sperator.gif" border="0" width="2" height="40"></TH>
                <TH   align=center background="img/sperator.gif"><A href="main.php" ><img src="img/home.gif" border="0" width="26" height="26"><br clear="all"> الصفحة الأساسية </A></TH>

        </TD>


        </TR>

    </TABLE>


</head>
<body topmargin="0" leftmargin="0" rightmargin="0" bottommargin="0" bgcolor="#F2F2F2">
<FORM NAME="FORM2"  action="http://localhost/cst2.php" method="post">
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
////////////assign vars//////////
$id_item=$_POST["Text0"];
$ser_item=$_POST["Text1"];
$rec_dt_item=$_POST["date1"];
$send_dt_item=$_POST["date2"];
$kind_item=$_POST["Text4"];
$sender_item=$_POST["Text5"];
$send_place_item=$_POST["Text6"];
$memo_item=$_POST["Text7"];
$to_item=$_POST["Text8"];
$to_dt_item=$_POST["date3"];
$notes_item=$_POST["Text10"];
$file_item=$_POST["file"];

///////////////////////////////////////update function
$fin=mysql_query("UPDATE import_table SET import_ser = '$ser_item',import_rec_dt='$rec_dt_item',

import_send_dt = '$send_dt_item',import_kind = '$kind_item',import_sender = '$sender_item',
import_send_place = '$send_place_item',
import_memo = '$memo_item',import_to = '$to_item',
import_to_date = '$to_dt_item',
import_notes= '$notes_item'
where import_id='$id_item' ")or die(mysql_error());


////////////////////////////////////////////////////

 // uploading files

if ((($_FILES["file"]["type"] == "image/gif")|| ($_FILES["file"]["type"] == "image/jpeg")|| ($_FILES["file"]["type"] == "image/pjpeg"))&& ($_FILES["file"]["size"] < 2000000))
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


if (($_FILES["file"]["type"] == "image/gif"))
{
	$type=".gif";
}
if(($_FILES["file"]["type"] == "image/jpeg")||($_FILES["file"]["type"] == "image/pjpeg"))
{
	$type=".jpg";
}

/////////////////////////////////////////////////////////////////////replace the file exist
if (file_exists("upload/" . $_FILES["file"]["name"]))
      {
       		unlink("upload/img".$id_item .$type);
    		rename ( "upload/" . $_FILES["file"]["name"],"upload/img".$id_item .$type);
      }
    
   

   $second_column=  "img".$id_item .$type;

 $fin1=mysql_query("select * from import_file where import_id='$id_item' ")or die(mysql_error());
 $n_res1=mysql_num_rows($fin1);

 if($n_res1==0){
   $query1 = "insert into import_file(import_id,file_name) values ('$id_item','$second_column')";

	mysql_query($query1)or  	die (mysql_error());
	}else{
	$query1 = "UPDATE import_file SET  import_id = '$id_item',file_name = '$second_column' where import_id='$id_item'";

	mysql_query($query1)or  	die (mysql_error());	}
	///////////////////////////////////////////////////





////////////////////////////////////////////////////
mysql_close( $link);


	header("Location: http://localhost/cst2.php?start=0");

?>
</FORM>
</BODY>
</HTML>
