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

                 <TH  align=center ><font size ="5" color="#FFCC00">  المكاتبات الصادرة
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







<FORM NAME="FORM2"  action="http://localhost/Ecst3.php" method="post">
<BR>



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



if($n_res==0)
{
$pop=1;
}
else
{
$pop=$n_res+1;
}

$query = $fin;

$per_page=10;

//$start=$_POST["start"];
if(!($start))	$start=0;

///////////////////////////


$ser_item=$_POST["Text1"];
$rec_dt_item=$_POST["date1"];
$kind_item=$_POST["Text4"];
$sender_item=$_POST["Text5"];
$send_place_item=$_POST["Text6"];
$memo_item=$_POST["Text7"];
$to_item=$_POST["Text8"];
$notes_item=$_POST["Text10"];
////////////////////////////////////

$record_count=mysql_num_rows($query);
$max_pages=$record_count / $per_page;
$result = mysql_query("SELECT export_id,export_ser,export_rec_dt,export_memo
						FROM export_table
						ORDER BY export_id
						LIMIT $start , $per_page");

$query="select export_id,export_ser,export_rec_dt,export_memo from export_table where";
if(!empty($Text1)){	$query .=	" (export_ser like '%$Text1%')  ";}else{	$query .=	"  true  ";}
if(!empty($date1)){
	$query .=	" && (export_rec_dt like '$date1%')  ";
}else{
	$query .=	" && true  ";
}

if(!($Text4==0)){
	$query .=	" && (export_kind like '%$Text4%')  ";
}else{
	$query .=	" && true  ";
}
if(!empty($Text5)){
	$query .=	" && (export_sender like '%$Text5%')  ";
}else{
	$query .=	" && true  ";
}
if(!empty($Text6)){
	$query .=	" && (export_send_place like '%$Text6%')  ";
}else{
	$query .=	" && true  ";
}
if(!empty($Text7)){
	$query .=	" && (export_memo like '%$Text7%')  ";
}else{
	$query .=	" && true  ";
}
if(!($Text8==0)){
	$query .=	" && (export_to like '%$Text8%')  ";
}else{
	$query .=	" && true  ";
}

if(!empty($Text10)){
	$query .=	" && (export_notes like '%$Text10%') ";
}else{
	$query .=	" && true  ";
}

$query .="ORDER BY export_id  LIMIT $start , $per_page";

$result =  mysql_query($query);

/////////////////////////
if (($result)||(mysql_errno == 0))
{
  echo "<center><table width='100%' ><tr BGCOLOR='#7b7b7b'>";
 if (mysql_num_rows($result)>0)
  {
          //loop thru the field names to print the correct headers
          $i = 1;
          while ($i < mysql_num_fields($result))
          {

	$headers[1]="مسلسل";
	$headers[2]="تاريخ الإرسال";
	$headers[3]="الموضوع";

		
         echo "<th  ALIGN=CENTER><FONT color='#FFCC00' size='4'>". $headers[$i] . "</th>";

       $i++;
    }


    echo "</tr>";

////////////////////////////////////////////////////////
    //display the data
$num_rows=1;
    while ($rows = mysql_fetch_array($result,MYSQL_NUM))
    {
    			if($num_rows & 1){
      echo "<tr BGCOLOR='#c4c4c4'>";
      			}else{
      echo "<tr BGCOLOR='#ffffff'>";			
      			}
      			$num_rows++;
 	$j=1;
	
      foreach ($rows as $data)
      {
	if($j<4){
		

	  echo "<td ALIGN=RIGHT  > <FONT color='#FFFFFF'><a href='Elist.php?id={$rows[0]}'> $rows[$j]</td>";

	  
	}
	$j++;

      }

    }

/////set up previous & next vars
$prev=$start - $per_page;
$next=$start + $per_page;
$last_rec= floor($record_count/$per_page);
$last_rec=$last_rec*$per_page;

unset($data);

 /////set up previous & next vars
$prev=$start - $per_page;
$next=$start + $per_page;


  }else{
    echo "<tr><FONT color='#AADFFB'><td ALIGN=CENTER colspan='" . ($i+1) . "'>No Results found!</td></tr>";
  }
  echo "</table>";
  
  
    //show Next button
    if($num_rows>$per_page){ 	
		if(!($start>=$record_count-$per_page)){
		///////////getting the last page
			echo " <a href='Elist2.php?start=$last_rec'><img src='img/lastpage.gif' alt='Last Page'></a>";
		/////////////getting the next page
			echo " <a href='Elist2.php?start=$next'><img src='img/nextpage.gif' alt='Next Page'></a>";

	}
		}
  //show prev button
	if(!($start<=0)){
 //////////////////getting previous page
		echo " <a href='Elist2.php?start=$prev'><img src='img/backpage.gif' alt='Previous Page'></a>";
/////////////getting the first page
		echo " <a href='Elist2.php?start=0'><img src='img/first.gif' alt='First Page'></a>";
	}

	}else{
  		echo "Error in running query :". mysql_error();
	}




$ser_item="";
$rec_dt_item="";
$kind_item="";
$sender_item="";
$send_place_item="";
$memo_item="";
$to_item="";
$notes_item="";
?>

</FORM>





</BODY>

</HTML>
