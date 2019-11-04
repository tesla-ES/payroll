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
$delted_item=$id;
$fin=mysql_query("delete from import_table where import_id='$delted_item' ")or die(mysql_error());
$fin2=mysql_query("select file_name from import_file where import_id='$delted_item' ")or die(mysql_error());
$pop = mysql_fetch_row($fin2);
unlink("upload/".$pop[0]);$fin1=mysql_query("delete from import_file where import_id='$delted_item' ")or die(mysql_error());
mysql_close( $link);

header("Location: http://localhost/cst2.php?start=0");
?>
</FORM>
</BODY>
</HTML>
