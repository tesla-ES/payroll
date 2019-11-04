


<HTML dir=rtl>
<META content="text/html; charset=windows-1256" http-equiv=Content-Type>
	<meta http-equiv="Content-Language" content="it">
<head >

	
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

                 <TH  align=center ><font size ="5" color="#FFCC00">   نظام المكاتبات الصادرة و الواردة
                 <BR>
                 </TH>
                 <TH>
                 <img src="img/logo.png" border="0" >
                 </TH>
                 </TR>
                 </Table>

</head>
<body topmargin="0" leftmargin="0" rightmargin="0" bottommargin="0" bgcolor="#F2F2F2">



<FORM NAME="FORM1"  action="http://localhost/cst2.php" method="post">

<BR>
<BR>
<BR>
<BR>
<table width=100% cellpadding=0 cellspacing=0 align=center border=0  >
        <TR  >


            <TD VALIGN="top"  >


                 <TH  align=center ><A href="cst2.php?start=0" ><img src="img/inbox.png" border="0" ><br clear="all"><font size ="3" color="#FFCC00"> المكاتبات الواردة</A></TH>

                <TH   align=center ><A href="Ecst2.php?start=0" ><img src="img/outbox.png" border="0" ><br clear="all"><font size ="3" color="#FFCC00"> المكاتبات الصادرة</A></TH>



        </TD>


        </TR>

    </TABLE>
      </form>
</body>
</html>