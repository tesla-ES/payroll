<HTML dir=rtl>
<META content="text/html; charset=windows-1256" http-equiv=Content-Type>
	<meta http-equiv="Content-Language" content="it">
<head>
<center>
<table width=100% cellpadding=0 cellspacing=0 align=center border=0 bgcolor="#7A7A7A"  >
        <TR  >

                 <TH  align=center ><font size ="5" color="#FFCC00"> المكاتبات الواردة
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

$fin=mysql_query("select * from import_table");
$n_res=mysql_num_rows($fin);

if(!($Text1=="")&&!($date1==""))

{
   ////////////insert values
   print"$date1";
$query = "INSERT INTO import_table ( Import_ser,import_rec_dt,import_send_dt,import_kind,import_sender,import_send_place,import_memo,import_to,import_to_date,import_notes )
values ( '$Text1','$date1','$date2', '$Text4','$Text5','$Text6','$Text7','$Text8','$date3','$Text10')";
mysql_query($query) or  die (mysql_error());







}

//}
else
{

include(“cst.php”);

}
    mysql_close( $link);
$Text1="";
$date1="";
$date2="";
$Text4="";
$Text5="";
$Text6="";
$Text7="";
$Text8="";
$date3="";
$Text10="";

	header("Location: http://localhost/cst2.php");

?>




<BR>




</FORM>





</BODY>

</HTML>
