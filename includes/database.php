<?php
require_once(LIB_PATH_INC.DS."config.php");

class MySqli_DB {

    private $con;
    public $query_id;

    function __construct() {
      $this->db_connect();
    }

/*--------------------------------------------------------------*/
/* Function for Open database connection
/*--------------------------------------------------------------*/
public function db_connect()
{
  //  $this->con = new mysqli(DB_HOST,DB_USER,DB_PASS);
  $this->con = mysqli_connect(DB_HOST,DB_USER,DB_PASS);
    mysqli_set_charset($this->con, "utf8");
   if(!$this->con)
         {
           die(" Database connection failed:". mysqli_connect_error());
         } else {
           $select_db = $this->con->select_db(DB_NAME);
             if(!$select_db)
             {
               die("Failed to Select Database". mysqli_connect_error());
             }


  }
}
/*--------------------------------------------------------------*/
/* Function for Close database connection
/*--------------------------------------------------------------*/

public function db_disconnect()
{
  if(isset($this->con))
  {
    mysqli_close($this->con);
    unset($this->con);
  }
}
/*--------------------------------------------------------------*/
/* Function for mysqli query
/*--------------------------------------------------------------*/
public function query($sql)
   {

      if (trim($sql != "")) {
          $this->query_id = $this->con->query($sql);
        }
      if (!$this->query_id)
        // only for Develope mode
              die("Error on this Query :<pre> " . $sql ."</pre>");
       // For production mode
        //  die("Error on Query");

       return $this->query_id;

   }

/*--------------------------------------------------------------*/
/* Function for Query Helper
/*--------------------------------------------------------------*/

public  function prepare_sql($sql,$params){
    $sql = $this->con->prepare($sql);

    //$GROUP_ID = '1';
   // $menu_id = '2';

    /* Bind parameters. Types: s = string, i = integer, d = double,  b = blob */
    //$sql->bind_param('is', $GROUP_ID, $menu_id);

    if ($sql) {
        $x = 0;
        $par='';
        if(count($params)) {
            foreach($params as $param) {
               $par .='s';
                $x++;
            }}
            //$sql->bind_param($par,$params[0],$params[1]);
        $bind_names[] = $par;
        for ($i=0; $i<count($params);$i++)
        {
            $bind_name = 'bind' . $i;
            $$bind_name = $params[$i];
            $bind_names[] = &$$bind_name;
        }
        $return = call_user_func_array(array($sql,'bind_param'),$bind_names);


        }
        $this->query_id = $sql->execute();

    if (!$this->query_id)
        die("Error on this Query :<pre> " . $sql ."</pre>");
    // For production mode
    //  die("Error on Query");
    $this->query_id = $sql->get_result();
    return $this->query_id;
}

public function fetch_array($statement)
{
  return mysqli_fetch_array($statement);
}
public function fetch_object($statement)
{
  return mysqli_fetch_object($statement);
}
public function fetch_assoc($statement)
{
  return mysqli_fetch_assoc($statement);
}
public function num_rows($statement)
{
  return mysqli_num_rows($statement);
}
public function insert_id()
{
  return mysqli_insert_id($this->con);
}
public function affected_rows()
{
  return mysqli_affected_rows($this->con);
}

    public  function Transaction_start()
    {
        return $this->con->autocommit(FALSE);
    }
    public  function commit()
    {
        return $this->con->commit();
    }
    public  function rollback()
    {
        return $this->con->rollback();
    }
    public  function Transaction_End()
    {
        return $this->con->autocommit(TRUE);
    }
/*--------------------------------------------------------------*/
 /* Function for Remove escapes special
 /* characters in a string for use in an SQL statement
 /*--------------------------------------------------------------*/
 public function escape($str){
   return $this->con->real_escape_string($str);
 }
/*--------------------------------------------------------------*/
/* Function for while loop
/*--------------------------------------------------------------*/
public function while_loop($loop){
 global $db;
   $results = array();
   while ($result = $this->fetch_array($loop)) {
      $results[] = $result;
   }
 return $results;
}

}

$db = new MySqli_DB();

?>
