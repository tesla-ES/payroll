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



<FORM NAME="FORM1"  action="http://localhost/list2.php?start=0" method="post">



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






?>
<center>
	<script language="JavaScript" src="ts_picker.js"></script>
<table>
<thead>
</thead>
<tbody>

<TR  align="middle">

<TH><FONT size='4'  >مسلسل : </TH><TH align="right"> <INPUT TYPE="TEXT" NAME="Text1" style="font-size: 10pt; padding-top:5px;height:25 px;width:200 px" value="">
</TH>
</TR>


<TR  align="middle">
<TH><FONT size='4'  >تاريخ الإستلام: </TH><TH align="right">

	<input type="text" style="font-size: 10pt; padding-top:5px;height:25 px;width:65 px" name="date1" />
	<a href="javascript:show_calendar('document.FORM1.date1',document.FORM1.date1.value);">
	<img src="img/cal.gif" width="16" height="16" border="0" alt="Click Here to Pick up the timestamp"></a>
</TH>
</TR>

<TR  align="middle">
<TH><FONT size='4'  > رقم المكاتبة :</TH><TH align="right"><INPUT TYPE="TEXT" NAME="Text6" style="font-size: 10pt; padding-top:5px;height:25 px;width:200 px" value=""></TH>
</TR>



<TR  align="middle">
<TH><FONT size='4'  >تاريخ المكاتبة: </TH><TH align="right">

	<input type="text" style="font-size: 10pt; padding-top:5px;height:25 px;width:65 px" name="date2" />
	<a href="javascript:show_calendar('document.FORM1.date2',document.FORM1.date2.value);">
	<img src="img/cal.gif" width="16" height="16" border="0" alt="Click Here to Pick up the timestamp"></a>

</TH>
 </TR>

<TR  align="middle">
<TH><FONT size='4'  >نوع المكاتبة:</TH><TH align="right"><select name="Text4" style="font-size: 10pt; padding-top:5px;height:25 px;width:200 px">
<option value="0"> </option>
<option value="1">وارد الرئاسة</option>
<option value="2">وارد مراكز الخدمة</option>
<option value="3">وارد الأنشطة الرياضية</option>
<option value="4">جهات أخرى</option>
</select></TH>
</TR>

<TR  align="middle">
<TH><FONT size='4'  >الراسل :</TH><TH align="right"><INPUT TYPE="TEXT" NAME="Text5" style="font-size: 10pt; padding-top:5px;height:25 px;width:200 px" value=""></TH>
</TR>



<TR  align="middle">
<TH><FONT size='4'  >الموضوع :</TH><TH align="right"><textarea rows="5" cols="20" style="font-size: 10pt; padding-top:5px;height:50 px;width:200 px" NAME="Text7"  value="">
</textarea></TH>
</TR>


<TR  align="middle">
<TH><FONT size='4'  >محول إلى:</TH><TH align="right"><select name="Text8" style="font-size: 10pt; padding-top:5px;height:25 px;width:200 px">
<option value="0"> </option>
<option value="1">مجلس الإدارة</option>
<option value="2">قسم العضوية</option>
<option value="3">قسم الأنشطة الرياضية</option>

</select></TH>
</TR>



<TR  align="middle">
<TH><FONT size='4'  >تاريخ التحويل:</TH><TH align="right">
	<input type="text" style="font-size: 10pt; padding-top:5px;height:25 px;width:65 px" name="date3" />
	<a href="javascript:show_calendar('document.FORM1.date3',document.FORM1.date3.value);">
	<img src="img/cal.gif" width="16" height="16" border="0" alt="Click Here to Pick up the timestamp"></a>
</TH>
</TR>

<TR  align="middle">
<TH><FONT size='4'  >ملاحظات:</TH><TH align="right"><textarea rows="5" cols="20" style="font-size: 10pt; padding-top:5px;height:50 px;width:200 px" NAME="Text10"  value=""></textarea></TH>
</TR>



</tbody>

</table>
<br><br>

<INPUT type="image" name="b1"  src="img/search.png">

<br><br><br><br>

</strong>
</font>


</FORM>


</BODY>

</HTML>
