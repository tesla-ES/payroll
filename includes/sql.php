<?php
  //require_once('includes/load.php');   // i remove this line because of NO need

/*--------------------------------------------------------------*/
/* Function for find all database table rows by table name
/*--------------------------------------------------------------*/
function find_all($table) {
   global $db;
   if(tableExists($table))
   {
     return find_by_sql("SELECT * FROM ".$db->escape($table));
   }
}
/*--------------------------------------------------------------*/
/* Function for Perform queries
/*--------------------------------------------------------------*/
function find_by_sql($sql)
{
  global $db;
  $result = $db->query($sql);
  $result_set = $db->while_loop($result);
 return $result_set;
}

function get_period_progress($period_id){
    global $db;
    $query= "select ((100/ count(*))* (select count(*) from activity_period where period_id={$period_id} and period_state=1)) as progress_perc from activity_period where period_id={$period_id} LIMIT 1" ;
    $sql = $db->query($query);
    if($result = $db->fetch_assoc($sql))
        return $result;
    else
        return null;
}

function get_max($table,$id_fild_name=null)
{
    if ($id_fild_name === null) {
        $id_fild_name="id";
    }
    global $db;

    if(tableExists($table)){
        $sql = $db->query("SELECT max({$db->escape($id_fild_name)}) as max_id FROM {$db->escape($table)} LIMIT 1");
        if($result = $db->fetch_assoc($sql))
            return $result;
        else
            return null;
    }
}

/*--------------------------------------------------------------*/
/*  Function for Find data from table by id
/*--------------------------------------------------------------*/
function find_by_id($table,$id,$id_fild_name=null)
{
    if ($id_fild_name === null) {
        $id_fild_name="id";
    }
  global $db;
  $id = (int)$id;
    if(tableExists($table)){
          $sql = $db->query("SELECT * FROM {$db->escape($table)} WHERE $id_fild_name='{$db->escape($id)}' LIMIT 1");
          if($result = $db->fetch_assoc($sql))
            return $result;
          else
            return null;
     }
}

function get_acc_number($acc_number,$acc_up_level,$action)
{ global $db;
    $query="";
    $table='all_accounts';
    if ($action=="sibling"){
        $has_sibling_query = $db->query("select count(*) as cunt from {$table} WHERE acc_up_level ={$db->escape($acc_number)}");
        $has_sibling = $db->fetch_assoc($has_sibling_query);
        if($has_sibling['cunt']>=1){
            $query="SELECT IFNULL(max(acc_number),00)+01 as account_number FROM {$table} WHERE acc_up_level ={$db->escape($acc_number)} LIMIT 1" ;
        }else {
            $query="SELECT CONCAT({$acc_number},lpad(IFNULL(max(acc_number),0)+ 1 ,2,0 )) as account_number FROM {$table} WHERE acc_up_level ={$db->escape($acc_number)} LIMIT 1" ;
        }
    }else if ($action=="coleage"){
        $query="SELECT max(acc_number)+01 as account_number FROM {$db->escape($table)} WHERE acc_up_level ={$db->escape($acc_up_level)} LIMIT 1" ;
    }

    if(tableExists($table)){
        $sql = $db->query($query);
        if($result = $db->fetch_assoc($sql))
            return $result;
        else
            return null;
    }
}

function get_acc_balance($acc_number,$period_id,$activity_id){
    $accounts_balance=find_by_sql("select sum(account_value) as total from payments_receivables where activity_id=$activity_id and account_number= $acc_number and period_id in(select period_id from accounts_period where year(period_from) = (select  year(period_from) from accounts_period where period_id=$period_id))");
    $this_account_balance=0;
    foreach($accounts_balance as $account_balance):
        $this_account_balance =remove_junk(ucwords($account_balance['total']));
    endforeach;

    return $this_account_balance;
}
function get_activity_balance($activity_id,$period_id){
    $activites_balance=find_by_sql("select sum(account_value) as total from payments_receivables where activity_id=$activity_id and period_id in(select period_id from accounts_period where year(period_from) = (select  year(period_from) from accounts_period where period_id=$period_id))");
    $this_activity_balance=0;
    foreach($activites_balance as $activity_balance):
        $this_activity_balance =remove_junk(ucwords($activity_balance['total']));
    endforeach;

    return $this_activity_balance;
}
function get_acc_value($acc_number,$period_id,$activity_id){
    $account_found=find_count_by_parametes('payments_receivables',array('account_number','activity_id','period_id'),array($acc_number,$activity_id,$period_id));
    if($account_found['total']>0){
        $account_data=find_by_parametes('payments_receivables',array('account_number','activity_id','period_id'),array($acc_number,$activity_id,$period_id));
        return $account_data["account_value"] ;
    }else{
        return null ;
    }
}
function find_sum_by_parameters($table,$filds,$params_name ,$params_val){
    /*TODO make fields as array of element's */
    global $db;
    $x = 1;
    $param='';
    foreach($params_name as $name => $value) {
        $param .= "{$value} = ?";
        if($x < count ($params_name)) {
            $param .= ' and ';
        }
        $x++;
    }
    $sql  = "SELECT sum($filds) AS total FROM {$db->escape($table)} WHERE ";
    $sql .=$param ;
    //"SELECT firstName, lastName FROM people WHERE lastName LIKE ?"
    // echo $sql;
    $result =$db->prepare_sql($sql,$params_val);
    return($db->fetch_assoc($result));
}
function find_count_by_parametes($table,$params_name ,$params_val){
    global $db;
    $x = 1;
    $param='';
    foreach($params_name as $name => $value) {
        $param .= "{$value} = ?";
        if($x < count ($params_name)) {
            $param .= ' and ';
        }
        $x++;
    }
    $sql  = "SELECT COUNT(*) AS total FROM {$db->escape($table)} WHERE ";
    $sql .=$param ;
    //"SELECT firstName, lastName FROM people WHERE lastName LIKE ?"
   // echo $sql;
    $result =$db->prepare_sql($sql,$params_val);
    return($db->fetch_assoc($result));
}
function find_by_parametes($table,$params_name ,$params_val)
{
    global $db;
    $x = 1;
    $param='';
    foreach($params_name as $name => $value) {
        $param .= "{$value} = ?";
        if($x < count ($params_name)) {
            $param .= ' and ';
        }
        $x++;
    }
    $sql="SELECT * FROM {$db->escape($table)} WHERE ";
    $sql .=$param ;
    //"SELECT firstName, lastName FROM people WHERE lastName LIKE ?"
    $result =$db->prepare_sql($sql,$params_val);
    return($db->fetch_assoc($result));
}

/*--------------------------------------------------------------*/
/* Function for Delete data from table by id
/*--------------------------------------------------------------*/
function insert_select($into_table,$into_fiels,$from_table,$from_fields,$where_condition){
    global $db;
    if(tableExists($into_table)&&tableExists($from_table)){
        $sql = "INSERT INTO ".$db->escape($into_table);
        $sql .= " (".implode(",",$into_fiels).") (select ".implode(",",$from_fields)." FROM ".$db->escape($from_table) ." WHERE " .$where_condition .")";
        return $db->query($sql);
        //return ($db->affected_rows() === 1) ? true : false;
    }
}
function delete_by_id($table,$id,$id_fild_name=null)
    {
    if ($id_fild_name === null) {
        $id_fild_name="id";
    }

  global $db;
  if(tableExists($table))
   {
    $sql = "DELETE FROM ".$db->escape($table);
    $sql .= " WHERE $id_fild_name =". $db->escape($id);
    $db->query($sql);
    return ($db->affected_rows() >= 1) ? true : false;
      // return $sql ;
   }
}

function delete_by_where($table,$where_condition)
{
    if ($where_condition === null) {
        $where_condition="1=1";
    }

    global $db;
    if(tableExists($table))
    {
        $sql = "DELETE FROM ".$db->escape($table);
        $sql .= " WHERE $where_condition ";
        $db->query($sql);
        //return $sql ;
        return ($db->query($sql))? true : false;
       // return ($db->affected_rows() === 1) ? true : false;
    }
}
/*--------------------------------------------------------------*/
/* Function for Count id  By table name
/*--------------------------------------------------------------*/

function count_by_id($table){
  global $db;
  if(tableExists($table))
  {
    $sql = "SELECT COUNT(*) AS total FROM ".$db->escape($table);
    $result = $db->query($sql);
     return($db->fetch_assoc($result));
  }
}
/*--------------------------------------------------------------*/
/* Determine if database table exists
/*--------------------------------------------------------------*/
function tableExists($table){
  global $db;
  $table_exit = $db->query('SHOW TABLES FROM '.DB_NAME.' LIKE "'.$db->escape($table).'"');
      if($table_exit) {
        if($db->num_rows($table_exit) > 0)
              return true;
         else
              return false;
      }
  }
 /*--------------------------------------------------------------*/
 /* Login with the data provided in $_POST,
 /* coming from the login form.
/*--------------------------------------------------------------*/
  function authenticate($username='', $password='') {
    global $db;
    $username = $db->escape($username);
    $password = $db->escape($password);
    $sql  = sprintf("SELECT id,username,password,user_level FROM users WHERE username ='%s' LIMIT 1", $username);
    $result = $db->query($sql);
    if($db->num_rows($result)){
      $user = $db->fetch_assoc($result);
      $password_request = sha1($password);
      if($password_request === $user['password'] ){
        return $user['id'];
      }
    }
   return false;
  }
  /*--------------------------------------------------------------*/
  /* Login with the data provided in $_POST,
  /* coming from the login_v2.php form.
  /* If you used this method then remove authenticate function.
 /*--------------------------------------------------------------*/
   function authenticate_v2($username='', $password='') {
     global $db;
     $username = $db->escape($username);
     $password = $db->escape($password);
     $sql  = sprintf("SELECT id,username,password,user_level FROM users WHERE username ='%s' LIMIT 1", $username);
     $result = $db->query($sql);
     if($db->num_rows($result)){
       $user = $db->fetch_assoc($result);
       $password_request = sha1($password);
       if($password_request === $user['password'] ){
         return $user;
       }
     }
    return false;
   }


  /*--------------------------------------------------------------*/
  /* Find current log in user by session id
  /*--------------------------------------------------------------*/
  function current_user(){
      static $current_user;
      global $db;
      if(!$current_user){
         if(isset($_SESSION['user_id'])):
             $user_id = intval($_SESSION['user_id']);
             $current_user = find_by_id('users',$user_id);
        endif;
      }
    return $current_user;
  }
  /*--------------------------------------------------------------*/
  /* Find all user by
  /* Joining users table and user gropus table
  /*--------------------------------------------------------------*/
  function find_all_user(){
      global $db;
      $results = array();
      $sql = "SELECT u.id,u.name,u.username,u.user_level,u.status,u.last_login,";
      $sql .="g.group_name ";
      $sql .="FROM users u ";
      $sql .="LEFT JOIN user_groups g ";
      $sql .="ON g.group_level=u.user_level ORDER BY u.name ASC";
      $result = find_by_sql($sql);
      return $result;
  }



  /*--------------------------------------------------------------*/
  /* Function to update the last log in of a user
  /*--------------------------------------------------------------*/
//
//
//
  //
function find_all_page(){
    global $db;
    $results = array();
    $sql = "select LEVEL ,ITEM_NUMBER,ITEM_NAME,ITEM_UP_LEVEL, ITEM_HREF, ITEM_FUNC,ITEM_NOTS, ITEM_CLASS,ITEM_ICON,  LEAF,path FROM (SELECT  CONCAT(REPEAT('    ',LEVEL - 1), hi.ITEM_NUMBER) AS ITEM_NUMBER_string,    hierarchy_sys_connect_by_path('.', hi.ITEM_NUMBER) AS path,   hi.ITEM_NUMBER,  ITEM_UP_LEVEL, LEVEL,hi.ITEM_ICON,hi.ITEM_HREF,hi.ITEM_FUNC,hi.ITEM_NOTS,hi.ITEM_CLASS,hi.ITEM_NAME,  CASE            WHEN LEVEL >= @maxlevel THEN 1            ELSE COALESCE((SELECT  0 FROM menu hl  WHERE  (( hl.ITEM_UP_LEVEL = ho.ITEM_NUMBER) or ( hl.ITEM_UP_LEVEL=0))  LIMIT 1 ), 1) END AS leaf FROM ( SELECT hierarchy_connect_by_parent_eq_prior_id_with_level(ITEM_NUMBER, @maxlevel) AS ITEM_NUMBER, CAST(@level AS SIGNED) AS LEVEL FROM (  SELECT  @start_with := 0,@ITEM_NUMBER := @start_with, @level := 0, @maxlevel := 2 ) vars, menu  WHERE @ITEM_NUMBER IS NOT NULL  ) ho JOIN  menu hi ON hi.ITEM_NUMBER = ho.ITEM_NUMBER )all_menu order by path ";
    $result = find_by_sql($sql);
    return $result;
}
function find_all_menu(){
    global $db;
    $results = array();
    $sql = "select LEVEL ,ITEM_NUMBER,ITEM_NAME,ITEM_UP_LEVEL, ITEM_HREF, ITEM_FUNC,ITEM_NOTS, ITEM_CLASS,ITEM_ICON,  LEAF,path FROM (SELECT  CONCAT(REPEAT('    ',LEVEL - 1), hi.ITEM_NUMBER) AS ITEM_NUMBER_string,    hierarchy_sys_connect_by_path('.', hi.ITEM_NUMBER) AS path,   hi.ITEM_NUMBER,  ITEM_UP_LEVEL, LEVEL,hi.ITEM_ICON,hi.ITEM_HREF,hi.ITEM_FUNC,hi.ITEM_NOTS,hi.ITEM_CLASS,hi.ITEM_NAME,  CASE            WHEN LEVEL >= @maxlevel THEN 1            ELSE COALESCE((SELECT  0 FROM menu hl  WHERE  (( hl.ITEM_UP_LEVEL = ho.ITEM_NUMBER) or ( hl.ITEM_UP_LEVEL=0))  LIMIT 1 ), 1) END AS leaf FROM ( SELECT hierarchy_connect_by_parent_eq_prior_id_with_level(ITEM_NUMBER, @maxlevel) AS ITEM_NUMBER, CAST(@level AS SIGNED) AS LEVEL FROM (  SELECT  @start_with := 0,@ITEM_NUMBER := @start_with, @level := 0, @maxlevel := 2 ) vars, menu  WHERE @ITEM_NUMBER IS NOT NULL  ) ho JOIN  menu hi ON hi.ITEM_NUMBER = ho.ITEM_NUMBER )all_menu order by path ";
    $result = find_by_sql($sql);
    return $result;
}

 function updateLastLogIn($user_id)
	{
		global $db;
    $date = make_date();
    $sql = "UPDATE users SET last_login='{$date}' WHERE id ='{$user_id}' LIMIT 1";
    $result = $db->query($sql);
    return ($result && $db->affected_rows() === 1 ? true : false);
	}

  /*--------------------------------------------------------------*/
  /* Find all Group name
  /*--------------------------------------------------------------*/
function is_found_by_item($table,$id_fild_name=null,$val)
{
    if ($id_fild_name === null) {
        $id_fild_name="id";
    }
  global $db;

    if(tableExists($table)){
        $sql = "SELECT * FROM {$db->escape($table)} WHERE $id_fild_name= '{$db->escape($val)}' LIMIT 1 ";
    $result = $db->query($sql);
    return($db->num_rows($result) === 0 ? true : false);
}
}

  function find_by_groupName($val)
  {
    global $db;
    $sql = "SELECT group_name FROM user_groups WHERE group_name = '{$db->escape($val)}' LIMIT 1 ";
    $result = $db->query($sql);
    return($db->num_rows($result) === 0 ? true : false);
  }
  /*--------------------------------------------------------------*/
  /* Find group level
  /*--------------------------------------------------------------*/



function check_page_group($page){
    global $session;
    global $db;
    if (!$session->isUserLoggedIn(true)){
        $session->msg('d',' من فضلك قم بتسجيل الدخول ...  ');
        redirect('login.php', false);
    }

    $message=array('danger'=>"");
    $current_user = current_user();
    $login_level = find_by_groupLevel($current_user['user_level']);
    $groups=find_by_id("user_groups",$current_user['user_level'],"group_level");


    $sql = $db->query("select count(*) as cunt from menu_groups where GROUP_ID=".$current_user['user_level']." and MENU_ID = (select item_number from menu where ITEM_HREF ='".$page."') ");
    $page_fund = $db->fetch_assoc($sql);

    if($db->escape($groups['group_status']) === '0') {
        // $session->msg('d','  لم يتم تفعيل حسابك ... من فضلك قم بالاتصال بلجنه حاسبات النادى العام');
        $message = array("danger" => " لم يتم تفعيل الحساب الخاص بك ...  يرجى الاتصالا بلجنه الحاسبات بالنادى العام .. ");
        include_once("error_page.php");
        exit;

    }elseif($page_fund['cunt'] >= 1) {
        return true;

    }else {
        //$session->msg("d", "Sorry! you dont have permission to view the page." . $page);
        $message = array("danger" => "عفوا ... لا تمتلك صلاحيات لعرض هذه الصفحه ...  تكرار المحاوله يعرض حسابك للاغلاق   لذا يرجى الانتباه والتعامل بحذر ");
        include_once("error_page.php");
        exit;
    }
}

function check_screen_group($page){
    global $session;
    global $db;

    $message=array('danger'=>"");

    if (!$session->isUserLoggedIn(true)){
        $session->msg('d',' من فضلك قم بتسجيل الدخول ...  ');
        redirect('login.php', false);
    }

    $current_user = current_user();
    $login_level = find_by_groupLevel($current_user['user_level']);
    $groups=find_by_id("user_groups",$current_user['user_level'],"group_level");

    $sql = $db->query("select count(*) as cunt from pages_groups where group_level=".$current_user['user_level']." and page_id = (select page_id from pages where page_link ='".$page."') ");
    $page_fund = $db->fetch_assoc($sql);

    if($db->escape($groups['group_status']) === '0') {
        // $session->msg('d','  لم يتم تفعيل حسابك ... من فضلك قم بالاتصال بلجنه حاسبات النادى العام');
        $message = (object)array("valid" => false,"danger" => " لم يتم تفعيل الحساب الخاص بك ...  يرجى الاتصالا بلجنه الحاسبات بالنادى العام .. ");
    }elseif($page_fund['cunt'] >= 1) {
        $message=(object)array("valid"=>true);

    }else {
        //$session->msg("d", "Sorry! you dont have permission to view the page." . $page);
        $message = (object)array("valid" => false,"danger" =>"عفوا .. لا تمتلك صلاحيات كافيه ");
    }
    return $message;
}

  function find_by_groupLevel($level)
  {
    global $db;
    $sql = "SELECT group_level FROM user_groups WHERE group_level = '{$db->escape($level)}' LIMIT 1 ";
    $result = $db->query($sql);
    return($db->num_rows($result) === 0 ? true : false);
  }
  /*--------------------------------------------------------------*/
  /* Function for cheaking which user level has access to page
  /*--------------------------------------------------------------*/
   function page_require_level($require_level){
     global $session;
     $current_user = current_user();
     $login_level = find_by_groupLevel($current_user['user_level']);
     //if user not login
     if (!$session->isUserLoggedIn(true)):
            $session->msg('d',' من فضلك قم بتسجيل الدخول  ');
            redirect('login.php', false);
      //if Group status Deactive
     elseif($login_level['group_status'] === '0'):
           $session->msg('d','  لم يتم تفعيل حسابك ... من فضلك قم بالاتصال بلجنه حاسبات النادى العام');
           redirect('index.php',false);
      //cheackin log in User level and Require level is Less than or equal to
     elseif($current_user['user_level'] <= (int)$require_level):
              return true;
      else:
            $session->msg("d", "Sorry! you dont have permission to view the page.");
            redirect('index.php', false);
        endif;

     }
   /*--------------------------------------------------------------*/
   /* Function for Finding all product name
   /* JOIN with categorie  and media database table
   /*--------------------------------------------------------------*/
  function join_product_table(){
     global $db;
     $sql  =" SELECT p.id,p.name,p.quantity,p.buy_price,p.sale_price,p.media_id,p.date,c.name";
    $sql  .=" AS categorie,m.file_name AS image";
    $sql  .=" FROM products p";
    $sql  .=" LEFT JOIN categories c ON c.id = p.categorie_id";
    $sql  .=" LEFT JOIN media m ON m.id = p.media_id";
    $sql  .=" ORDER BY p.id ASC";
    return find_by_sql($sql);
   }
  /*--------------------------------------------------------------*/
  /* Function for Finding all product name
  /* Request coming from ajax.php for auto suggest
  /*--------------------------------------------------------------*/

   function find_product_by_title($product_name){
     global $db;
     $p_name = remove_junk($db->escape($product_name));
     $sql = "SELECT name FROM products WHERE name like '%$p_name%' LIMIT 5";
     $result = find_by_sql($sql);
     return $result;
   }

  /*--------------------------------------------------------------*/
  /* Function for Finding all product info by product title
  /* Request coming from ajax.php
  /*--------------------------------------------------------------*/
  function find_all_product_info_by_title($title){
    global $db;
    $sql  = "SELECT * FROM products ";
    $sql .= " WHERE name ='{$title}'";
    $sql .=" LIMIT 1";
    return find_by_sql($sql);
  }

  /*--------------------------------------------------------------*/
  /* Function for Update product quantity
  /*--------------------------------------------------------------*/
  function update_product_qty($qty,$p_id){
    global $db;
    $qty = (int) $qty;
    $id  = (int)$p_id;
    $sql = "UPDATE products SET quantity=quantity -'{$qty}' WHERE id = '{$id}'";
    $result = $db->query($sql);
    return($db->affected_rows() === 1 ? true : false);

  }
  /*--------------------------------------------------------------*/
  /* Function for Display Recent product Added
  /*--------------------------------------------------------------*/
 function find_recent_product_added($limit){
   global $db;
   $sql   = " SELECT p.id,p.name,p.sale_price,p.media_id,c.name AS categorie,";
   $sql  .= "m.file_name AS image FROM products p";
   $sql  .= " LEFT JOIN categories c ON c.id = p.categorie_id";
   $sql  .= " LEFT JOIN media m ON m.id = p.media_id";
   $sql  .= " ORDER BY p.id DESC LIMIT ".$db->escape((int)$limit);
   return find_by_sql($sql);
 }
 /*--------------------------------------------------------------*/
 /* Function for Find Highest saleing Product
 /*--------------------------------------------------------------*/
 function find_higest_saleing_product($limit){
   global $db;
   $sql  = "SELECT p.name, COUNT(s.product_id) AS totalSold, SUM(s.qty) AS totalQty";
   $sql .= " FROM sales s";
   $sql .= " LEFT JOIN products p ON p.id = s.product_id ";
   $sql .= " GROUP BY s.product_id";
   $sql .= " ORDER BY SUM(s.qty) DESC LIMIT ".$db->escape((int)$limit);
   return $db->query($sql);
 }
 /*--------------------------------------------------------------*/
 /* Function for find all sales
 /*--------------------------------------------------------------*/
 function find_all_sale(){
   global $db;
   $sql  = "SELECT s.id,s.qty,s.price,s.date,p.name";
   $sql .= " FROM sales s";
   $sql .= " LEFT JOIN products p ON s.product_id = p.id";
   $sql .= " ORDER BY s.date DESC";
   return find_by_sql($sql);
 }
 /*--------------------------------------------------------------*/
 /* Function for Display Recent sale
 /*--------------------------------------------------------------*/
function find_recent_sale_added($limit){
  global $db;
  $sql  = "SELECT s.id,s.qty,s.price,s.date,p.name";
  $sql .= " FROM sales s";
  $sql .= " LEFT JOIN products p ON s.product_id = p.id";
  $sql .= " ORDER BY s.date DESC LIMIT ".$db->escape((int)$limit);
  return find_by_sql($sql);
}
/*--------------------------------------------------------------*/
/* Function for Generate sales report by two dates
/*--------------------------------------------------------------*/
function find_sale_by_dates($start_date,$end_date){
  global $db;
  $start_date  = date("Y-m-d", strtotime($start_date));
  $end_date    = date("Y-m-d", strtotime($end_date));
  $sql  = "SELECT s.date, p.name,p.sale_price,p.buy_price,";
  $sql .= "COUNT(s.product_id) AS total_records,";
  $sql .= "SUM(s.qty) AS total_sales,";
  $sql .= "SUM(p.sale_price * s.qty) AS total_saleing_price,";
  $sql .= "SUM(p.buy_price * s.qty) AS total_buying_price ";
  $sql .= "FROM sales s ";
  $sql .= "LEFT JOIN products p ON s.product_id = p.id";
  $sql .= " WHERE s.date BETWEEN '{$start_date}' AND '{$end_date}'";
  $sql .= " GROUP BY DATE(s.date),p.name";
  $sql .= " ORDER BY DATE(s.date) DESC";
  return $db->query($sql);
}
/*--------------------------------------------------------------*/
/* Function for Generate Daily sales report
/*--------------------------------------------------------------*/
function  dailySales($year,$month){
  global $db;
  $sql  = "SELECT s.qty,";
  $sql .= " DATE_FORMAT(s.date, '%Y-%m-%e') AS date,p.name,";
  $sql .= "SUM(p.sale_price * s.qty) AS total_saleing_price";
  $sql .= " FROM sales s";
  $sql .= " LEFT JOIN products p ON s.product_id = p.id";
  $sql .= " WHERE DATE_FORMAT(s.date, '%Y-%m' ) = '{$year}-{$month}'";
  $sql .= " GROUP BY DATE_FORMAT( s.date,  '%e' ),s.product_id";
  return find_by_sql($sql);
}
/*--------------------------------------------------------------*/
/* Function for Generate Monthly sales report
/*--------------------------------------------------------------*/
function  monthlySales($year){
  global $db;
  $sql  = "SELECT s.qty,";
  $sql .= " DATE_FORMAT(s.date, '%Y-%m-%e') AS date,p.name,";
  $sql .= "SUM(p.sale_price * s.qty) AS total_saleing_price";
  $sql .= " FROM sales s";
  $sql .= " LEFT JOIN products p ON s.product_id = p.id";
  $sql .= " WHERE DATE_FORMAT(s.date, '%Y' ) = '{$year}'";
  $sql .= " GROUP BY DATE_FORMAT( s.date,  '%c' ),s.product_id";
  $sql .= " ORDER BY date_format(s.date, '%c' ) ASC";
  return find_by_sql($sql);
}

function find_as_obj($sql){
    global $db;
    $result = $db->query($sql);
    //$result_set = $db->fetch_object($result);
    return $result;
}

function  writeMainMenu($user_group){
    global $db;
   $sql="select LEVEL ,ITEM_NUMBER,ITEM_NAME,ITEM_UP_LEVEL, ITEM_HREF, ITEM_FUNC,ITEM_NOTS, ITEM_CLASS,ITEM_ICON,  LEAF,path FROM (SELECT  CONCAT(REPEAT('    ',LEVEL - 1), hi.ITEM_NUMBER) AS ITEM_NUMBER_string,    hierarchy_sys_connect_by_path('.', hi.ITEM_NUMBER) AS path,   hi.ITEM_NUMBER,  ITEM_UP_LEVEL, LEVEL,hi.ITEM_ICON,hi.ITEM_HREF,hi.ITEM_FUNC,hi.ITEM_NOTS,hi.ITEM_CLASS,hi.ITEM_NAME,  CASE            WHEN LEVEL >= @maxlevel THEN 1            ELSE COALESCE((SELECT  0 FROM menu hl  WHERE  (( hl.ITEM_UP_LEVEL = ho.ITEM_NUMBER) or ( hl.ITEM_UP_LEVEL=0))  LIMIT 1 ), 1) END AS leaf FROM ( SELECT hierarchy_connect_by_parent_eq_prior_id_with_level(ITEM_NUMBER, @maxlevel) AS ITEM_NUMBER, CAST(@level AS SIGNED) AS LEVEL FROM (  SELECT  @start_with := 0,@ITEM_NUMBER := @start_with, @level := 0, @maxlevel := 2 ) vars, menu  WHERE @ITEM_NUMBER IS NOT NULL  ) ho JOIN  menu hi ON hi.ITEM_NUMBER = ho.ITEM_NUMBER )all_menu ,MENU_GROUPS where MENU_GROUPS.MENU_ID=all_menu.ITEM_NUMBER and MENU_GROUPS.item_up_livel= all_menu.ITEM_UP_LEVEL AND MENU_GROUPS.GROUP_ID =$user_group  order by path";
    return find_as_obj($sql);
}

function  writeAllMenu(){
    global $db;
    //SELECT ACC_UP_LEVEL,is_leaf(Acc_number) ISLEAF,LEVEL, acc_name AS VAL,to_char(Acc_number) ACC_NUM FROM Accounts    CONNECT BY PRIOR Acc_number=Acc_up_level START WITH ACC_UP_LEVEL=0  ORDER SIBLINGS BY ACC_NUMBER ";
       $sql="select LEVEL ,ITEM_NUMBER,ITEM_NAME,ITEM_UP_LEVEL, ITEM_HREF, ITEM_FUNC,ITEM_NOTS, ITEM_CLASS,ITEM_ICON,  LEAF,path FROM (SELECT  CONCAT(REPEAT('    ',LEVEL - 1), hi.ITEM_NUMBER) AS ITEM_NUMBER_string,    hierarchy_sys_connect_by_path('.', hi.ITEM_NUMBER) AS path,   hi.ITEM_NUMBER,  ITEM_UP_LEVEL, LEVEL,hi.ITEM_ICON,hi.ITEM_HREF,hi.ITEM_FUNC,hi.ITEM_NOTS,hi.ITEM_CLASS,hi.ITEM_NAME,  CASE            WHEN LEVEL >= @maxlevel THEN 1            ELSE COALESCE((SELECT  0 FROM menu hl  WHERE  (( hl.ITEM_UP_LEVEL = ho.ITEM_NUMBER) or ( hl.ITEM_UP_LEVEL=0))  LIMIT 1 ), 1) END AS leaf FROM ( SELECT hierarchy_connect_by_parent_eq_prior_id_with_level(ITEM_NUMBER, @maxlevel) AS ITEM_NUMBER, CAST(@level AS SIGNED) AS LEVEL FROM (  SELECT  @start_with := 0,@ITEM_NUMBER := @start_with, @level := 0, @maxlevel := 2 ) vars, menu  WHERE @ITEM_NUMBER IS NOT NULL  ) ho JOIN  menu hi ON hi.ITEM_NUMBER = ho.ITEM_NUMBER )all_menu   order by path";
    return find_as_obj($sql);
}

function  Allaccounts(){
    global $db;
    //SELECT ACC_UP_LEVEL,is_leaf(Acc_number) ISLEAF,LEVEL, acc_name AS VAL,to_char(Acc_number) ACC_NUM FROM Accounts    CONNECT BY PRIOR Acc_number=Acc_up_level START WITH ACC_UP_LEVEL=0  ORDER SIBLINGS BY ACC_NUMBER ";
        $sql="select LEVEL ,ACC_NUMBER,ACC_NAME,ACC_UP_LEVEL, ACC_NOTS,  case  when ACC_UP_LEVEL =0 then 0 else LEAF end LEAF,path,(select name from acc_types where id= ACC_type) as type_name FROM (SELECT  CONCAT(REPEAT('    ',LEVEL - 1), hi.ACC_NUMBER) AS ACC_NUMBER_string,   ACC_hierarchy_sys_connect_by_path('.', hi.ACC_NUMBER) AS path,   hi.ACC_NUMBER,  ACC_UP_LEVEL, LEVEL,hi.ACC_NOTS,hi.ACC_NAME,ACC_type,  CASE  WHEN LEVEL >= @maxlevel THEN 1  ELSE COALESCE((SELECT  0 FROM ALL_ACCOUNTS hl  WHERE   hl.ACC_UP_LEVEL = ho.ACC_NUMBER  LIMIT 1 ), 1) END AS leaf FROM ( SELECT ACC_hierarchy_connect_by_parent_eq_prior_id(ACC_NUMBER) AS ACC_NUMBER, CAST(@level AS SIGNED) AS LEVEL FROM (  SELECT  @start_with := 0,@ACC_NUMBER := @start_with, @level := 0) vars, ALL_ACCOUNTS  WHERE @ACC_NUMBER IS NOT NULL  ) ho JOIN  ALL_ACCOUNTS hi ON hi.ACC_NUMBER = ho.ACC_NUMBER )all_ACC   order by path";
    return find_as_obj($sql);
}

function  get_accounts($path){
    global $db;
    //SELECT ACC_UP_LEVEL,is_leaf(Acc_number) ISLEAF,LEVEL, acc_name AS VAL,to_char(Acc_number) ACC_NUM FROM Accounts    CONNECT BY PRIOR Acc_number=Acc_up_level START WITH ACC_UP_LEVEL=0  ORDER SIBLINGS BY ACC_NUMBER ";
    $sql="select LEVEL ,ACC_NUMBER,ACC_NAME,ACC_UP_LEVEL, ACC_NOTS,  case  when ACC_UP_LEVEL =0 then 0 else LEAF end LEAF,path,(select name from acc_types where id= ACC_type) as type_name FROM (SELECT  CONCAT(REPEAT('    ',LEVEL - 1), hi.ACC_NUMBER) AS ACC_NUMBER_string,   ACC_hierarchy_sys_connect_by_path('.', hi.ACC_NUMBER) AS path,   hi.ACC_NUMBER,  ACC_UP_LEVEL, LEVEL,hi.ACC_NOTS,hi.ACC_NAME,ACC_type,  CASE  WHEN LEVEL >= @maxlevel THEN 1  ELSE COALESCE((SELECT  0 FROM ALL_ACCOUNTS hl  WHERE   hl.ACC_UP_LEVEL = ho.ACC_NUMBER  LIMIT 1 ), 1) END AS leaf FROM ( SELECT ACC_hierarchy_connect_by_parent_eq_prior_id(ACC_NUMBER) AS ACC_NUMBER, CAST(@level AS SIGNED) AS LEVEL FROM (  SELECT  @start_with := 0,@ACC_NUMBER := @start_with, @level := 0) vars, ALL_ACCOUNTS  WHERE @ACC_NUMBER IS NOT NULL  ) ho JOIN  ALL_ACCOUNTS hi ON hi.ACC_NUMBER = ho.ACC_NUMBER )all_ACC  where path=$path order by path";
    return find_as_obj($sql);
}

/*
function club_accounts($club_id){
    global $db;
    $sql="select LEVEL ,ACC_NUMBER,ACC_NAME,ACC_UP_LEVEL, ACC_NOTS, activity_id, case  when ACC_UP_LEVEL =0 then 0 else LEAF end LEAF,path FROM (SELECT  CONCAT(REPEAT('    ',LEVEL - 1), hi.ACC_NUMBER) AS ACC_NUMBER_string,   ACC_hierarchy_sys_connect_by_path('.', hi.ACC_NUMBER) AS path,  hi.activity_id, hi.ACC_NUMBER,  ACC_UP_LEVEL, LEVEL,hi.ACC_NOTS,hi.ACC_NAME,  CASE  WHEN LEVEL >= @maxlevel THEN 1  ELSE COALESCE((SELECT  0 FROM activity_accounts hl  WHERE activity_id=$club_id and  hl.ACC_UP_LEVEL = ho.ACC_NUMBER  LIMIT 1 ), 1) END AS leaf FROM (              SELECT ACC_hierarchy_connect_by_parent_eq_prior_id(ACC_NUMBER) AS ACC_NUMBER, CAST(@level AS SIGNED) AS LEVEL FROM (  SELECT  @start_with := 0,@ACC_NUMBER := @start_with, @level := 0) vars, activity_accounts  WHERE @ACC_NUMBER IS NOT NULL ) ho JOIN  activity_accounts hi ON hi.ACC_NUMBER = ho.ACC_NUMBER where hi.activity_id=$club_id )all_ACC  order by path";
    return find_as_obj($sql);
}
*//*select(get_leafs(ACC_NUMBER))*/
function get_total_val($leafs,$club_id,$period_id){
    global $db;
    $sql="select sum(account_value)as total_val from payments_receivables where payments_receivables.account_number in(".$leafs.") and payments_receivables.activity_id= $club_id and payments_receivables.period_id =$period_id";
    $sql = $db->query($sql);
    if($result = $db->fetch_assoc($sql)) { return $result;}else{return 0;}
}

function getleafs($account_num){
    global $db;
    $sql="select get_leafs(".$account_num.") as leafs";
    $sql = $db->query($sql);
    if($result = $db->fetch_assoc($sql)) { return $result;}else{return null;}
}
function payments_receivables($club_id,$pay_receive,$period_id){
    //$pay_receive==1  مصروفات
    //$pay_receive==2  ايرادات
    global $db;
    $sql="select LEVEL ,ACC_NUMBER,ACC_NAME,ACC_UP_LEVEL, ACC_NOTS,case  when ACC_UP_LEVEL =0 then 0 else LEAF end LEAF,path,(select sum(account_value) from payments_receivables where payments_receivables.account_number=aa.ACCOUNT_NUMBER and payments_receivables.activity_id= aa.activity_id and payments_receivables.period_id= $period_id ) as account_value  FROM (SELECT  CONCAT(REPEAT('    ',LEVEL - 1), hi.ACC_NUMBER) AS ACC_NUMBER_string,   ACC_hierarchy_sys_connect_by_path('2', hi.ACC_NUMBER) AS path,   hi.ACC_NUMBER,  ACC_UP_LEVEL, LEVEL,hi.ACC_NOTS,hi.ACC_NAME,  CASE  WHEN LEVEL >= @maxlevel THEN 1  ELSE COALESCE(( SELECT 0 FROM ALL_ACCOUNTS hl  WHERE hl.ACC_UP_LEVEL = ho.ACC_NUMBER LIMIT 1 ), 1) END AS leaf FROM ( SELECT ACC_hierarchy_connect_by_parent_eq_prior_id(ACC_NUMBER) AS ACC_NUMBER, CAST(@level AS SIGNED) AS LEVEL FROM (  SELECT  @start_with := $pay_receive,@ACC_NUMBER := @start_with, @level := 0) vars, ALL_ACCOUNTS  WHERE @ACC_NUMBER IS NOT NULL) ho JOIN  ALL_ACCOUNTS hi ON hi.ACC_NUMBER = ho.ACC_NUMBER )all_accounts  join activity_accounts aa on all_accounts.acc_number=aa.ACCOUNT_NUMBER where aa.activity_id=$club_id   order by path";
    return find_as_obj($sql);
}

function club_accounts($club_id){
       global $db;
       $sql="select LEVEL ,ACC_NUMBER,ACC_NAME,ACC_UP_LEVEL, ACC_NOTS,  case  when ACC_UP_LEVEL =0 then 0 else LEAF end LEAF,path FROM (SELECT  CONCAT(REPEAT('    ',LEVEL - 1), hi.ACC_NUMBER) AS ACC_NUMBER_string,   ACC_hierarchy_sys_connect_by_path('.', hi.ACC_NUMBER) AS path,   hi.ACC_NUMBER,  ACC_UP_LEVEL, LEVEL,hi.ACC_NOTS,hi.ACC_NAME,  CASE  WHEN LEVEL >= @maxlevel THEN 1  ELSE COALESCE((SELECT  0 FROM ALL_ACCOUNTS hl  WHERE   hl.ACC_UP_LEVEL = ho.ACC_NUMBER  LIMIT 1 ), 1) END AS leaf FROM ( SELECT ACC_hierarchy_connect_by_parent_eq_prior_id(ACC_NUMBER) AS ACC_NUMBER, CAST(@level AS SIGNED) AS LEVEL FROM (  SELECT  @start_with := 0,@ACC_NUMBER := @start_with, @level := 0) vars, ALL_ACCOUNTS  WHERE @ACC_NUMBER IS NOT NULL  ) ho JOIN  ALL_ACCOUNTS hi ON hi.ACC_NUMBER = ho.ACC_NUMBER )all_accounts  join activity_accounts aa on all_accounts.acc_number=aa.ACCOUNT_NUMBER where aa.activity_id=$club_id order by path";
    return find_as_obj($sql);
}
function get_menu_item_number($menu_up_level){
    global $db;
    $sql  ="SELECT case WHEN  menu.ITEM_UP_LEVEL >0 then  CONCAT (menu.ITEM_UP_LEVEL,SUBSTR(max(item_number),length(ITEM_UP_LEVEL)+1)+2) ELSE   max(item_number)+1 end  new_item_number FROM menu WHERE menu.ITEM_UP_LEVEL = $menu_up_level";
    $result = $db->query($sql);
    if($db->num_rows($result)){
        $item_number = $db->fetch_assoc($result);
        return $item_number['new_item_number'];
    }

}


?>
