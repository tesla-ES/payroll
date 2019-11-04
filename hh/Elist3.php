<HTML dir=rtl>
<META content="text/html; charset=windows-1256" http-equiv=Content-Type>
	<meta http-equiv="Content-Language" content="it">
<head>
	

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

$result = mysql_query("SELECT export_id,export_ser,export_rec_dt,export_send_place,export_kind,export_sender,export_memo
						FROM export_table
						ORDER BY export_id");

$query="select export_id,export_ser,export_rec_dt,
	CASE export_kind when '1' then 'صادر الرئاسة'
	when '2' then 'صادر مراكز الخدمة'
	when '3' then 'صادر الأنشطة الرياضية'
	when '4' then 'جهات أخرى'

END 
	
,export_sender,export_send_place,export_memo from export_table where";
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

$query .="ORDER BY export_id ";

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
	$headers[3]="نوع المكاتبة";
	$headers[4]="المرسل إليه";
	$headers[5]="جهة الإرسال";
	$headers[6]="الموضوع";

	  

		
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
	if($j<7){
		

	  echo "<td ALIGN=RIGHT  > <FONT color='#000000'> $rows[$j]</td>";

	  
	}
	$j++;

      }

    }
  }else{
    echo "<tr><FONT color='#AADFFB'><td ALIGN=CENTER colspan='" . ($i+1) . "'>No Results found!</td></tr>";
  }
  echo "</table>";
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
