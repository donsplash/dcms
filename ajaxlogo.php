<?php
include 'check.php';
function resize($width, $height){

  /* Get original image x y*/
  list($w, $h) = getimagesize($_FILES['image']['tmp_name']);
  /* calculate new image size with ratio */
  $ratio = max($width/$w, $height/$h);
  $h = ceil($height / $ratio);
  $x = ($w - $width / $ratio) / 2;
  $w = ceil($width / $ratio);
  $rand = time();
  /* new file name */
  $imgn = $rand.'_'.$height.'_'.$_FILES['image']['name'];
  //$path = 'uploads/'.$rand.'_'.$height.'_'.$_FILES['image']['name'];
  //$path = "../../../mi/csm/";
  $path = "../images/";
  /* read binary data from image file */
  $imgString = file_get_contents($_FILES['image']['tmp_name']);
  /* create image from string */
  $image = imagecreatefromstring($imgString);
  $tmp = imagecreatetruecolor($width, $height);
  imagecopyresampled($tmp, $image,
    0, 0,
    $x, 0,
    $width, $height,
    $w, $h);
  /* Save image */
  switch ($_FILES['image']['type']) {
    case 'image/jpeg':
      imagejpeg($tmp, $path.$imgn, 100);
      break;
    case 'image/png':
      imagepng($tmp, $path.$imgn, 0);
      break;
    case 'image/gif':
      imagegif($tmp, $path.$imgn);
      break;
    default:
      exit;
      break;
  }
  //return $path.$imgn;
  return $imgn;
  /* cleanup memory */
  imagedestroy($image);
  imagedestroy($tmp);
}

$msg = "";
$max_file_size = 2048*2048; // 200kb
$valid_exts = array('jpeg', 'jpg', 'png', 'gif');
// thumbnail sizes
$sizes = array(336 => 174);

if ($_SERVER['REQUEST_METHOD'] == 'POST' AND isset($_FILES['image'])) {
  if( $_FILES['image']['size'] < $max_file_size ){
    // get file extension
    $ext = strtolower(pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION));
    if (in_array($ext, $valid_exts)) {
      /* resize image */
      foreach ($sizes as $w => $h) {
        $files[] = resize($w, $h);
		}
    //$me = $_FILES['image']['name'];
	//$tit = $_POST['title'];
    $me = $files[0];
	//echo '<img src=uploads/100_'.$me.'>';
	$sql ="UPDATE configurations SET logo='$me' WHERE con_id='1'";				
	$query = mysqli_query($db, $sql);
	//echo "<img src=uploads/".$me."  class='preview'>";
	echo $me;
	//header("location: welcome.php");
	exit();
    } else {
      echo "Unsupported file";
	  //header("location: welcome.php");
	  exit();
    }
  } else{
    echo "Please upload image smaller than 1MB";
	//header("location: welcome.php");
	exit();
  }
  exit;
 }
 ?>