<HTML dir=rtl>
<META content="text/html; charset=windows-1256" http-equiv=Content-Type>
	<meta http-equiv="Content-Language" content="it">
<head>
		<? 
session_start();
if(session_is_registered(myusername)){
	echo"<H4 align='left'> ";
	echo"مرحباً   ";
echo"<B>$myusername </B> ";

}
?>

<A href="logout.php" >| خروج </A>
</H4>



<center>
<table width=100% cellpadding=0 cellspacing=0 align=center border=0 bgcolor="#7A7A7A"  >
        <TR  >

                 <TH  align=center ><font size ="5" color="#FFCC00">    المكاتبات الواردة
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


<script language="JavaScript" src="ts_picker.js"></script>



</head>
<body topmargin="0" leftmargin="0" rightmargin="0" bottommargin="0" bgcolor="#F2F2F2">



<FORM NAME="FORM1"  action="http://localhost/cst5.php" method="post" enctype="multipart/form-data">



<BR>

<?


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
///////////////////////////

$id_item=$_POST["$rows[0]"];
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
////////////////////////////////////


$fin=mysql_query("select * from import_table where import_id ='$id'");
$n_res=mysql_num_rows($fin);


while($res=mysql_fetch_array($fin))
{
$pop0=$res[import_id];
$pop1=$res[Import_ser];
$pop2=$res[import_rec_dt];
$pop3=$res[import_send_dt];
$pop4=$res[import_kind];
$pop5=$res[import_sender];
$pop6=$res[import_send_place];
$pop7=$res[import_memo];
$pop8=$res[import_to];
$pop9=$res[import_to_date];
$pop10=$res[import_notes];

}




?>
<?

echo "


<center>
<table  >
<thead>
</thead>
<tbody>


<TR  align='middle'>
<TH><FONT size='4'  >مسلسل:</TH><TH align='right'><INPUT TYPE='TEXT' NAME='Text1'style='font-size: 10pt; padding-top:5px;height:25 px;width:200 px' value=$pop1>
<INPUT TYPE='hidden' NAME='Text0'  value=$pop0>
</TH>

<TH ROWSPAN=10 ALIGN=LEFT>
";




////////////////////////////////////////////////////
$fin1=mysql_query("select * from import_file where import_id ='$id'");
if (($fin1)||(mysql_errno == 0))
{
  echo "<center><table width='100%' ><tr BGCOLOR='#7b7b7b'>";
 if (mysql_num_rows($fin1)>0)
  {
          //loop thru the field names to print the correct headers

    //display the data

    while ($rows = mysql_fetch_array($fin1,MYSQL_NUM))
    {  echo "<tr border=1>";

 	$j=1;

      foreach ($rows as $data)
      {
	if($j<2){
	 $pops="upload/".$rows[2];
	  echo "<TH ALIGN=RIGHT  BGCOLOR='#c4c4c4' border=1 > <FONT color='#FFFFFF'><img src=$pops  width='304' height='228' /></TH>";


	}
	$j++;

      }

    }
   }
   }
      echo "</TR></table>";
////////////////////////////////////////////////////




echo "</TH>

</TR>


<TR  align='middle'>
<TH><FONT size='4'  >تاريخ الإستلام: </TH><TH align='right'>

<input type='text' name='date1' style='font-size: 10pt; padding-top:5px;height:25 px;width:65 px' value='$pop2'>
	<a href=\"javascript:show_calendar('document.FORM1.date1',document.FORM1.date1.value);\">
	<img src='img/cal.gif' width='16' height='16' border='0' alt='Click Here to Pick up the timestamp'></a>
</TH>
</TR>


<TR  align='middle'>
<TH><FONT size='4'  > رقم المكاتبة :</TH><TH align='right'><INPUT TYPE='TEXT' NAME='Text6' style='font-size: 10pt; padding-top:5px;height:25 px;width:200 px' value='$pop6'></TH>
</TR>


<TR  align='middle'>
<TH><FONT size='4'  >تاريخ المكاتبة: </TH><TH align='right'>

<input type='text' name='date2' style='font-size: 10pt; padding-top:5px;height:25 px;width:65 px' value='$pop3'>
	<a href=\"javascript:show_calendar('document.FORM1.date2',document.FORM1.date2.value);\">
	<img src='img/cal.gif' width='16' height='16' border='0' alt='Click Here to Pick up the timestamp'></a>

</TH>
 </TR>

<TR  align='middle'>
<TH><FONT size='4'  >نوع المكاتبة:</TH><TH align='right'><select name='Text4' style='font-size: 10pt; padding-top:5px;height:25 px;width:200 px' value=$pop4>



<option value='1'";
if ($pop4==1)
 {echo" selected='yes'>";}
else echo ">"; echo "وارد الرئاسة</option>
<option value='2'";
if ($pop4==2)
 {echo" selected='yes'>";}
else echo ">"; echo "وارد مراكز الخدمة</option>
<option value='3' ";
if ($pop4==3)
 {echo" selected='yes'>";}
else echo ">"; echo " وارد الأنشطة الرياضية</option>
<option value='4'";
if ($pop4==4)
 {echo" selected='yes'>";}
else echo ">"; echo "جهات أخرى</option>
</select></TH>
</TR>

<TR  align='middle'>
<TH>
	<FONT size='4'  >الراسل :</TH><TH align='right'><INPUT TYPE='TEXT' NAME='Text5' style='font-size: 10pt; padding-top:5px;height:25 px;width:200 px' value='$pop5'></TH>
</TR>



<TR  align='middle'>
<TH><FONT size='4'  >الموضوع :</TH><TH align='right'> <textarea rows='5' cols='20'style='font-size: 10pt; padding-top:5px;height:50 px;width:200 px' NAME='Text7' >$pop7</textarea></TH>
</TR>


<TR  align='middle'>
<TH><FONT size='4'  >محول إلى:</TH><TH align='right'><select name='Text8' style='font-size: 10pt; padding-top:5px;height:25 px;width:200 px' value=$pop8>
<option value='1'";
if ($pop8==1)
 {echo" selected='yes'>";}
else echo ">"; echo "مجلس الإدارة</option>
<option value='2'";
if ($pop8==2)
 {echo" selected='yes'>";}
else echo ">"; echo "قسم العضوية</option>
<option value='3'";
if ($pop8==3)
 {echo" selected='yes'>";}
else echo ">"; echo "قسم الأنشطة الرياضية</option>

</select></TH>
</TR>



<TR  align='middle'>
<TH><FONT size='4'  >تاريخ التحويل:</TH><TH align='right'>
<input type='text' name='date3' style='font-size: 10pt; padding-top:5px;height:25 px;width:65 px' value='$pop9'>
	<a href=\"javascript:show_calendar('document.FORM1.date3',document.FORM1.date3.value);\">
	<img src='img/cal.gif' width='16' height='16' border='0' alt='Click Here to Pick up the timestamp'></a>

</TH>
</TR>


<TR  align='middle'>
<TH><FONT size='4'  >ملاحظات:</TH><TH align='right'><textarea rows='5' cols='20' style='font-size: 10pt; padding-top:5px;height:50 px;width:200 px' NAME='Text10' >$pop10</textarea></TH>
</TR>



<TR  align='middle'>
<TH><FONT size='4'  >تحميل الملف:</TH><TH align='right'><input type='file' name='file' id='file' />
</TH>
</TR>



</tbody>

</table>







<br>
<hr />
<table width=100% cellpadding=0 cellspacing=0 align=center border=0 background='img/sperator.gif'  >
        <TR  >


            <TD VALIGN='top'  >

                <img src='img/sperator.gif' border='0' width='2' height='40'></TH>

<TH   align=center background='img/sperator.gif'><A href='cst4.php?id=$pop0' ><img src='img/delete.png' border='0' width='26' height='26'><br clear='all'> حذف </A></TH>
<TH  align=center background='img/sperator.gif'><img src='img/sperator.gif' border='0' width='2' height='40'></TH>
<TH   align=center background='img/sperator.gif'><INPUT type='image' name='b3'src='img/update.gif' width='26' height='26'><br clear='all'> تعديل  </A></TH>
<TH  align=center background='img/sperator.gif'><img src='img/sperator.gif' border='0' width='2' height='40'></TH>
</TD>
</TR>
</Table>
";



?>
</strong>
</font>


</FORM>


</BODY>

</HTML>
