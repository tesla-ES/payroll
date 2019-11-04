
<?php
// -----------------------------------------------------------------------
// DEFINE SEPERATOR ALIASES
// -----------------------------------------------------------------------
define("URL_SEPARATOR", '/');

define("DS", DIRECTORY_SEPARATOR);

// -----------------------------------------------------------------------
// DEFINE ROOT PATHS
// -----------------------------------------------------------------------
defined('SITE_ROOT')? null: define('SITE_ROOT', realpath(dirname(__FILE__)));
defined('site_dir')? null: define('site_dir','/new_Membership');
define("LIB_PATH_INC", SITE_ROOT.DS);
require_once(LIB_PATH_INC.'config.php');
require_once(LIB_PATH_INC.'functions.php');
require_once(LIB_PATH_INC.'session.php');
require_once(LIB_PATH_INC.'upload.php');
require_once(LIB_PATH_INC.'database.php');
require_once(LIB_PATH_INC.'sql.php');

/*
if(basename($_SERVER['PHP_SELF'])!="login.php"){
$message=check_screen_group(basename($_SERVER['PHP_SELF']));
}
*/
function print_image($image_field,$gender,$alt,$class)
{
     $image_src = null;
    if($image_field!=Null){
        if (file_exists($image_field)) {
            $image_src=$image_field;
        } else {
            //   الملف غير موجود
            $image_src="assets/images/users_img/ImgNotAvailable.jpg";
        }
    }else {// لم يتم ادراج صوره
        if ($gender==1) // check if is male or female
        {  // male
            $image_src="assets/images/users_img/male.png";
        }else
        { // female
            $image_src="assets/images/users_img/femalenotadd.png";
        }
    }
    //end print image
    echo"<img class = \"$class\" src='$image_src' alt=\"$alt\">";
}

?>
