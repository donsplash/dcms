<?php
class Madmin
{
public $perpage = 20; /*Uploads perpage*/
private $db;

public function __construct($db)
{
	$this->db = $db;
}
//GO LIVE
public function golive(){
	$query=mysqli_query($this->db, "UPDATE configurations SET mode =1");
	return $query;
}

//MAINTENANCE MODE
public function gom(){
	$query=mysqli_query($this->db, "UPDATE configurations SET mode =2");
	return $query;
}
public function GetConfig()
{
$query = mysqli_query($this->db, "SELECT * FROM configurations WHERE con_id='1' ")or die (mysqli_error($this->db));
$data = mysqli_fetch_array($query, MYSQLI_ASSOC);
return $data;
}
public function allHp($id)
{
$query = mysqli_query($this->db, "SELECT * FROM homepic WHERE id='$id' ")or die (mysqli_error($this->db));
$data = mysqli_fetch_array($query, MYSQLI_ASSOC);
return $data;
}
public function Uconfig($tit, $des, $pp, $fb, $tw, $in, $ft, $ft2, $em, $add, $t1, $t2) {
	$des=mysqli_real_escape_string($this->db,$des);
	$tit=mysqli_real_escape_string($this->db,$tit);
	$fb=mysqli_real_escape_string($this->db,$fb);
	$pp=mysqli_real_escape_string($this->db,$pp);
	$tw=mysqli_real_escape_string($this->db,$tw);
	$in=mysqli_real_escape_string($this->db,$in);
	$ft=mysqli_real_escape_string($this->db,$ft);
	$query = mysqli_query($this->db, "UPDATE configurations SET  appName='$tit', appDesc='$des', perpage='$pp', footer1='$ft',footer2='$ft2', fb='$fb', tw='$tw', ins='$in',email='$em', addr='$add', tel1='$t1',tel2='$t2' WHERE con_id='1'")or die(mysqli_error($this->db));
	//return $query;
	if($query){
		return $id;	
	}else{
		return false;
	}
}
//content count
	 public function ccount()
    {
    $query=mysqli_query($this->db,"SELECT content_id FROM content")or die(mysqli_error($this->db));
    return mysqli_num_rows($query);
    }
     public function Ncount()
    {
    $query=mysqli_query($this->db,"SELECT content_id FROM content WHERE category='News'")or die(mysqli_error($this->db));
    return mysqli_num_rows($query);
    }
  //views count
    public function Sviews() {
	$query = mysqli_query($this->db, "SELECT  SUM(views) FROM content ")or die(mysqli_error($this->db));
	$data = mysqli_fetch_array($query, MYSQLI_ASSOC);
	return $data;
}

 public function Sorders() {
	$query = mysqli_query($this->db, "SELECT  SUM(price) FROM invo WHERE st = 10")or die(mysqli_error($this->db));
	$data = mysqli_fetch_array($query, MYSQLI_ASSOC);
	return $data;
}


public function Corders() {
	$query = mysqli_query($this->db, "SELECT  SUM(price) FROM invo WHERE st = 3138")or die(mysqli_error($this->db));
	$data = mysqli_fetch_array($query, MYSQLI_ASSOC);
	return $data;
}

	public function slcount()
    {
    $query=mysqli_query($this->db,"SELECT sublink_id FROM sub_links")or die(mysqli_error($this->db));
    return mysqli_num_rows($query);
    }
    //ORDERS

    public function corder()
    {
    $query=mysqli_query($this->db,"SELECT oid FROM orders")or die(mysqli_error($this->db));
    return mysqli_num_rows($query);
    }
    //tetimonials
    public function ctest()
    {
    $query=mysqli_query($this->db,"SELECT tid FROM testi")or die(mysqli_error($this->db));
    return mysqli_num_rows($query);
    }

    public function csorder()
    {
    $query=mysqli_query($this->db,"SELECT invoice_id FROM invo")or die(mysqli_error($this->db));
    return mysqli_num_rows($query);
    }
    // Products
    public function cprod()
    {
    $query=mysqli_query($this->db,"SELECT pid FROM prods")or die(mysqli_error($this->db));
    return mysqli_num_rows($query);
    }
 //Users Count
    public function Users_Count()
    {
    $query=mysqli_query($this->db,"SELECT uid FROM myusers")or die(mysqli_error($this->db));
    return mysqli_num_rows($query);
    }
	public function Puser()
    {
    $query=mysqli_query($this->db,"SELECT uid FROM myusers WHERE membership ='Premiumn'")or die(mysqli_error($this->db));
    return mysqli_num_rows($query);
    }
	public function Fuser()
    {
    $query=mysqli_query($this->db,"SELECT uid FROM myusers WHERE membership ='Free'")or die(mysqli_error($this->db));
    return mysqli_num_rows($query);
    }
	public function Lkcounts()
    {
    $query=mysqli_query($this->db,"SELECT link_id FROM links")or die(mysqli_error($this->db));
    return mysqli_num_rows($query);
    }
	public function SubLcount()
    {
    $query=mysqli_query($this->db,"SELECT sublink_id FROM sub_links")or die(mysqli_error($this->db));
    return mysqli_num_rows($query);
    }
    //New STATS NURSING
    public function nurc()
    {
    $query=mysqli_query($this->db,"SELECT nid FROM nurses")or die(mysqli_error($this->db));
    return mysqli_num_rows($query);
    }
//request count
    public function reqc()
    {
    $query=mysqli_query($this->db,"SELECT reqid FROM req")or die(mysqli_error($this->db));
    return mysqli_num_rows($query);
    }
//Pending Request
public function reqcp()
    {
    $query=mysqli_query($this->db,"SELECT reqid FROM req WHERE st='1'")or die(mysqli_error($this->db));
    return mysqli_num_rows($query);
    }
  //Active Nurse
public function anurc()
    {
    $query=mysqli_query($this->db,"SELECT nid FROM nurses WHERE st='102'")or die(mysqli_error($this->db));
    return mysqli_num_rows($query);
    }
 public function plc()
    {
    $query=mysqli_query($this->db,"SELECT pid FROM placement")or die(mysqli_error($this->db));
    return mysqli_num_rows($query);
    }

	public function EmptCount()
    {
    $query=mysqli_query($this->db,"SELECT id FROM empt")or die(mysqli_error($this->db));
    return mysqli_num_rows($query);
    }
	public function EthCount()
    {
    $query=mysqli_query($this->db,"SELECT id FROM ethnicity")or die(mysqli_error($this->db));
    return mysqli_num_rows($query);
    }
	public function slogCount()
    {
    $query=mysqli_query($this->db,"SELECT logid FROM slog")or die(mysqli_error($this->db));
    return mysqli_num_rows($query);
    }
	public function MessCount()
    {
    $query=mysqli_query($this->db,"SELECT c_id FROM conversation")or die(mysqli_error($this->db));
    return mysqli_num_rows($query);
    }
	 //Users Count
    public function VUsers()
    {
    $query=mysqli_query($this->db,"SELECT uid FROM myusers WHERE st ='10' OR st = '11'")or die(mysqli_error($this->db));
    return mysqli_num_rows($query);
    }
	
	public function AdvertsC()
    {
    $query=mysqli_query($this->db,"SELECT a_id FROM advertisments WHERE status ='1'")or die(mysqli_error($this->db));
    return mysqli_num_rows($query);
    }
	
	public function content_count($search) {
	$search=mysqli_real_escape_string($this->db,$search);
	$query = mysqli_query($this->db, "SELECT content_id, title, content  FROM content WHERE title LIKE '%$search%'")or die(mysqli_error($this->db));
	return mysqli_num_rows($query);

}

//product Count Search
public function p_count($search) {
	$search=mysqli_real_escape_string($this->db,$search);
	$query = mysqli_query($this->db, "SELECT *  FROM prods WHERE name LIKE '%$search%'")or die(mysqli_error($this->db));
	return mysqli_num_rows($query);

}

//Orders Search Count
public function o_count($search) {
	$search=mysqli_real_escape_string($this->db,$search);
	$query = mysqli_query($this->db, "SELECT *  FROM orders WHERE oid LIKE '%$search%'")or die(mysqli_error($this->db));
	return mysqli_num_rows($query);

}

//count Authors
public function a_count($search) {
	$search=mysqli_real_escape_string($this->db,$search);
	$query = mysqli_query($this->db, "SELECT *  FROM author WHERE auid LIKE '%$search%'")or die(mysqli_error($this->db));
	return mysqli_num_rows($query);

}

public function i_count($search) {
	$search=mysqli_real_escape_string($this->db,$search);
	$query = mysqli_query($this->db, "SELECT *  FROM invo WHERE invoice_id LIKE '%$search%'")or die(mysqli_error($this->db));
	return mysqli_num_rows($query);

}

public function os_count($search) {
	$search=mysqli_real_escape_string($this->db,$search);
	$query = mysqli_query($this->db, "SELECT *  FROM sorder WHERE soid LIKE '%$search%'")or die(mysqli_error($this->db));
	return mysqli_num_rows($query);

}
public function add_count($search) {
	$search=mysqli_real_escape_string($this->db,$search);
	$query = mysqli_query($this->db, "SELECT a_id, a_title  FROM advertisments WHERE a_title LIKE '%$search%'")or die(mysqli_error($this->db));
	return mysqli_num_rows($query);

}
public function adminuser($id) {
		$id = mysqli_real_escape_string($this->db, $id);
		$query = mysqli_query($this->db, "SELECT * FROM sud WHERE md_id = '$id'")or die(mysqli_error($this->db));
		$data = mysqli_fetch_array($query, MYSQLI_ASSOC);
		return $data;

}
public function econ($contid) {
	$contid=mysqli_real_escape_string($this->db,$contid);
	$query = mysqli_query($this->db, "SELECT content_id, title, pic, content, category FROM content WHERE content_id = '$contid'")or die(mysqli_error($this->db));
	$data = mysqli_fetch_array($query, MYSQLI_ASSOC);
	return $data;
}
	
public function eprod($pid) {
	$pid=mysqli_real_escape_string($this->db,$pid);
	$query = mysqli_query($this->db, "SELECT * FROM prods WHERE pid = '$pid'")or die(mysqli_error($this->db));
	$data = mysqli_fetch_array($query, MYSQLI_ASSOC);
	return $data;
}

// ID to Username
public function idtoU($id)
{
$id=mysqli_real_escape_string($this->db,$id);
$query = mysqli_query($this->db, "SELECT name FROM myusers WHERE uid='$id'")or die (mysqli_error($this->db));
$data = mysqli_fetch_array($query, MYSQLI_ASSOC);
return $data['name'];
}
// ID to Product Name
public function idtoP($id)
{
$id=mysqli_real_escape_string($this->db,$id);
$query = mysqli_query($this->db, "SELECT name FROM prods WHERE pid='$id'")or die (mysqli_error($this->db));
$data = mysqli_fetch_array($query, MYSQLI_ASSOC);
return $data['name'];
}
//Get Author or Product Owner
public function Author($id)
{
$id=mysqli_real_escape_string($this->db,$id);
$query = mysqli_query($this->db, "SELECT manifac FROM prod WHERE pid='$id'")or die (mysqli_error($this->db));
$data = mysqli_fetch_array($query, MYSQLI_ASSOC);
return $data['manifac'];
}

public function eorder($oid) {
	$oid=mysqli_real_escape_string($this->db,$oid);
	$query = mysqli_query($this->db, "SELECT * FROM orders WHERE oid = '$oid'")or die(mysqli_error($this->db));
	$data = mysqli_fetch_array($query, MYSQLI_ASSOC);
	return $data;
	}

public function editc($id, $tit, $pic, $cont, $cat) {
	$id=mysqli_real_escape_string($this->db,$id);
	$tit=mysqli_real_escape_string($this->db,$tit);
	$pic=mysqli_real_escape_string($this->db,$pic);
	$cont=mysqli_real_escape_string($this->db,$cont);
	$cat=mysqli_real_escape_string($this->db,$cat);
	$query = mysqli_query($this->db, "UPDATE content SET  title='$tit', content='$cont', category='$cat', pic='$pic' WHERE content_id='$id'")or die(mysqli_error($this->db));
	//return $query;
	if($query){
		return $id;	
	}else{
		return false;
	}
}

	//ADmin Login	
	public function Adlogin($username,$password)
     {
	 $n ="block";	
     $username=mysqli_real_escape_string($this->db,$username);
     $password=mysqli_real_escape_string($this->db,$password);
     $md5_password=md5($password);
      $query=mysqli_query($this->db,"SELECT md_id,enteru, secret FROM sud WHERE enteru = '$username' AND st=10 LIMIT 1");
     if(mysqli_num_rows($query)==1)
     {
     $row=mysqli_fetch_array($query,MYSQLI_ASSOC);
	 $uid=$row['md_id'];
	 $time=time();
	 $p = $row['secret'];
	 $hash = substr($p, 0, 13);
	 
	 if(password_verify($md5_password, $hash) == $hash){
   /* Count Reset */
   	// mysqli_query($this->db,"UPDATE bizu SET lastlogin='$time' WHERE uid='$uid'") or die(mysqli_error($this->db));
	 return $uid;
	// }
     }
	 }
     else
     {
     return false;
     }
     }
	 
	 public function PinC($id, $sec) {
	$id=mysqli_real_escape_string($this->db,$id);
	$sec=mysqli_real_escape_string($this->db,$sec);
	$query = mysqli_query($this->db, "SELECT seccode FROM sud WHERE md_id = '$id'")or die(mysqli_error($this->db));
	$data = mysqli_fetch_array($query, MYSQLI_ASSOC);
	if($query){
		return $data;
	}else{
		return false;
	}
			
}
public function ChangP($id, $np) {
	$id=mysqli_real_escape_string($this->db,$id);
	$np=mysqli_real_escape_string($this->db,$np);
	$query = mysqli_query($this->db, "UPDATE sud SET  secret='$np' WHERE md_id='$id'")or die(mysqli_error($this->db));
	return $query;
}
public function ChangePin($id, $op, $np) {
	$id=mysqli_real_escape_string($this->db,$id);
	$np=mysqli_real_escape_string($this->db,$np);
	$op=mysqli_real_escape_string($this->db,$op);
	$query= mysqli_query($this->db,"SELECT seccode FROM sud WHERE md_id='$id'");
	$data=mysqli_fetch_array($query, MYSQLI_ASSOC);
	return $data;
}

public function Cpin($id, $np){
$np=mysqli_real_escape_string($this->db,$np);
$query = mysqli_query($this->db, "UPDATE sud SET  seccode='$np' WHERE md_id='$id'")or die(mysqli_error($this->db));
return $query;
}
	 
//Add Content	 
public function addcon($tit, $cont, $cat, $postby, $pic, $time, $link, $key, $lnkst, $sbst, $lnk, $lnkid) {
	$tit=mysqli_real_escape_string($this->db,$tit);
	$cont=mysqli_real_escape_string($this->db,$cont);
	$cat=mysqli_real_escape_string($this->db,$cat);
	$postby=mysqli_real_escape_string($this->db,$postby);
	$pic=mysqli_real_escape_string($this->db,$pic);
	$link=mysqli_real_escape_string($this->db,$link);
	$key=mysqli_real_escape_string($this->db,$key);
	$lnkst=mysqli_real_escape_string($this->db,$lnkst);
	$sbst=mysqli_real_escape_string($this->db,$sbst);
	$lnk=mysqli_real_escape_string($this->db,$lnk);
	$lnkid=mysqli_real_escape_string($this->db,$lnkid);
	$query = mysqli_query($this->db, "INSERT INTO content (content_id, title, content, category, postby, pic, created, link, keyword) VALUES ('','$tit','$cont', '$cat', '$postby', '$pic','$time','$link', '$key')")or die(mysqli_error($this->db));
	//return $query;
	if($query){
		$last_id = mysqli_insert_id($this->db);
	
	if($lnkst ==2){
		$slink = '';
		$st = 1;
		$alt = '';
		$ext ='';
		$extl= '';
		$queryi = mysqli_query($this->db, "INSERT INTO links (content_id, links, sublink, status, alt, external, extlink) VALUES ('$last_id','$lnk','$slink', '$st', '$alt', '$ext','$extl')")or die(mysqli_error($this->db));

	}
	if($sbst == 2){
		$st = 1;
		$alt = '';
		$ext ='';
		$extl= '';
		$querys = mysqli_query($this->db, "INSERT INTO sub_links (content_id, link_idkf, link, status, ext, extlink) VALUES ('$last_id','$lnkid','$lnk', '$st', '$ext', '$extl')")or die(mysqli_error($this->db));
	}
	return $last_id;	
	}else{
		return false;
	}
}
//add bnk
public function addbnk($nm, $num, $acn) {
	$nm=mysqli_real_escape_string($this->db,$nm);
	$num=mysqli_real_escape_string($this->db,$num);
	$acn=mysqli_real_escape_string($this->db,$acn);
	
	$query = mysqli_query($this->db, "INSERT INTO bnk (bid, bank, accn, name) VALUES ('','$nm','$num','$acn')")or die(mysqli_error($this->db));
	//return $query;
	if($query){
		$last_id = mysqli_insert_id($this->db);
	return $last_id;	
	}else{
		return false;
	}
}
// Add Widget
public function addw($tit, $con) {
	$tit=mysqli_real_escape_string($this->db,$tit);
	$con=mysqli_real_escape_string($this->db,$con);
	$query = mysqli_query($this->db, "INSERT INTO widget (wid, title, content) VALUES ('','$tit','$con')")or die(mysqli_error($this->db));
	//return $query;
	if($query){
		$last_id = mysqli_insert_id($this->db);
	return $last_id;	
	}else{
		return false;
	}
}
//Edit Widget
public function edw($tit, $con, $id) {
	$tit=mysqli_real_escape_string($this->db,$tit);
	$con=mysqli_real_escape_string($this->db,$con);
	$query = mysqli_query($this->db, "UPDATE widget SET title='$tit', content='$con' WHERE wid='$id' ")or die(mysqli_error($this->db));
	//return $query;
	if($query){
	return true;	
	}else{
	return false;
	}
}
//View Widget
public function vwid(){
	
	$query=mysqli_query($this->db, "SELECT * FROM widget ORDER BY wid DESC LIMIT 50");
	while($row=mysqli_fetch_array($query,MYSQLI_ASSOC))
	{
	$data[]=$row;
	}
	return $data;
}
//Get SIngle Wid
public function gww($id){
	$query = mysqli_query($this->db, "SELECT * FROM widget WHERE wid='$id'");
	$data=mysqli_fetch_array($query, MYSQLI_ASSOC);
	return $data;
}
//Add Testimonials
public function addtest($nm, $con, $des, $em, $mes) {
	$nm=mysqli_real_escape_string($this->db,$nm);
	$query = mysqli_query($this->db, "INSERT INTO testi (tid, name, comp, desg, email, mes) VALUES ('','$nm','$con','$des','$em', '$mes')")or die(mysqli_error($this->db));
	//return $query;
	if($query){
		$last_id = mysqli_insert_id($this->db);
	return $last_id;	
	}else{
		return false;
	}
}
//add Cats
public function addcat($cat) {
	$cat=mysqli_real_escape_string($this->db,$cat);
		
	$query = mysqli_query($this->db, "INSERT INTO cat (ctid, cat) VALUES ('','$cat')")or die(mysqli_error($this->db));
	//return $query;
	if($query){
		$last_id = mysqli_insert_id($this->db);
	return $last_id;	
	}else{
		return false;
	}
}
//add Sort Cats
public function addscat($cat) {
	$cat=mysqli_real_escape_string($this->db,$cat);
		
	$query = mysqli_query($this->db, "INSERT INTO scat (scatid, scat) VALUES ('','$cat')")or die(mysqli_error($this->db));
	//return $query;
	if($query){
		$last_id = mysqli_insert_id($this->db);
	return $last_id;	
	}else{
		return false;
	}
}
//Add Authors
public function addAuth($nm, $em, $ps) {
	$nm=mysqli_real_escape_string($this->db,$nm);
	$em=mysqli_real_escape_string($this->db,$em);
	$ps=mysqli_real_escape_string($this->db,$ps);
	$st = 10;
	$query = mysqli_query($this->db, "INSERT INTO author (auid, name, email, pass, st) VALUES ('','$nm','$em','$ps', '$st')")or die(mysqli_error($this->db));
	//return $query;
	if($query){
		$last_id = mysqli_insert_id($this->db);
	return $last_id;	
	}else{
		return false;
	}
}
//Add Products pid, name, price, det, cat, st, pic
public function addprod($nm, $cat, $price, $decs, $pic) {
	$nm=mysqli_real_escape_string($this->db,$nm);
	$price=mysqli_real_escape_string($this->db,$price);
	$cat=mysqli_real_escape_string($this->db,$cat);
	$decs=mysqli_real_escape_string($this->db,$decs);
	$st = 11;
	$query = mysqli_query($this->db, "INSERT INTO prods(pid, name, price, det, cat, st, pic) VALUES ('','$nm','$price', '$decs', '$cat', '$st', '$pic')")or die(mysqli_error($this->db));
	//return $query;
	if($query){
		$last_id = mysqli_insert_id($this->db);
	return $last_id;	
	}else{
		return false;
	}
}

public function edpro($nm, $cat, $price, $decs, $pic, $id) {
	$nm=mysqli_real_escape_string($this->db,$nm);
	$price=mysqli_real_escape_string($this->db,$price);
	$cat=mysqli_real_escape_string($this->db,$cat);
	$decs=mysqli_real_escape_string($this->db,$decs);
	$query = mysqli_query($this->db, "UPDATE prods SET name='$nm' , price='$price', det='$decs', pic='$pic' WHERE pid='$id' ")or die(mysqli_error($this->db));
	//return $query;
	if($query){
	return true;	
	}else{
	return false;
	}
}
public function prcode(){
	$query = mysqli_query($this->db, "SELECT * FROM prod ORDER BY pid DESC LIMIT 1");
	$data=mysqli_fetch_array($query, MYSQLI_ASSOC);
	return $data['prcode'];
}
//Add Products
//public function addprods($nm, $cat, $price, $pic, $decs, $dt, $man, $ty, $siz, $yr, $pre, $pc, $gen) {
public function addprods($nm, $cat, $price, $pic, $decs, $dt, $ty,$pre, $pc, $pic1, $pic2, $pic3) {
	$nm=mysqli_real_escape_string($this->db,$nm);
	$price=mysqli_real_escape_string($this->db,$price);
	$cat=mysqli_real_escape_string($this->db,$cat);
	$decs=mysqli_real_escape_string($this->db,$decs);
	$dt=mysqli_real_escape_string($this->db,$dt);
	$man=mysqli_real_escape_string($this->db,$man);
	$ty=mysqli_real_escape_string($this->db,$ty);
	$pre=mysqli_real_escape_string($this->db,$pre);
	$pc=mysqli_real_escape_string($this->db,$pc);
	$gen=mysqli_real_escape_string($this->db,$gen);
	$st = 11;
	
$query = mysqli_query($this->db, "INSERT INTO prod (pid, name, price, pic, cat, descc, st, dtadd, type, preview, prcode) VALUES ('','$nm','$price', '$pic', '$cat', '$decs', '$st', '$dt', '$ty', '$pre', '$pc')")or die(mysqli_error($this->db));
	//return $query;
	if($query){
		$last_id = mysqli_insert_id($this->db);
	
	$queryp = mysqli_query($this->db, "INSERT INTO pro_pic (ppid,proid, pic1, pic2, pic3, pic4) VALUES('', '$last_id', '$pic', '$pic1', '$pic2', '$pic3')");
	return $last_id;	
	}else{
		return false;
	}
}

//Add Products Pics

public function addpp($pid, $p1, $p2, $p3, $p4){

$query = mysqli_query($this->db, "INSERT INTO pro_pic (ppid, proid, pic1, pic2, pic3, pic4 ) VALUES('', '$pid', '$p1', '$p2', '$p3', '$p4')")or die(mysqli_error($this->db));

if($query){
	return $pid;
}else{
	return false;
}
}

//edit product
public function editpro($pid, $nm, $price, $cat, $decs, $man, $ty, $siz, $yr, $pre, $gen) {
	$pid=mysqli_real_escape_string($this->db,$pid);
	$nm=mysqli_real_escape_string($this->db,$nm);
	$price=mysqli_real_escape_string($this->db,$price);
	$cat=mysqli_real_escape_string($this->db,$cat);
	$decs=mysqli_real_escape_string($this->db,$decs);
	$man=mysqli_real_escape_string($this->db,$man);
	$ty=mysqli_real_escape_string($this->db,$ty);
	$siz=mysqli_real_escape_string($this->db,$siz);
	$yr=mysqli_real_escape_string($this->db,$yr);
	$pre=mysqli_real_escape_string($this->db,$pre);
	$gen=mysqli_real_escape_string($this->db,$gen);
	
	
	$query = mysqli_query($this->db, "UPDATE prod SET name='$nm', price='$price', cat='$cat', descc='$decs', manifac='$man', type='$ty', size='$siz', year='$yr', preview='$pre', gen='$gen' WHERE pid='$pid'")or die(mysqli_error($this->db));
	//return $query;
	if($query){
		return $pid;	
	}else{
		return false;
	}
}
//PUT product on sale

public function Psale($id, $amt){
	$id=mysqli_real_escape_string($this->db,$id);
	$amt=mysqli_real_escape_string($this->db,$amt);

	$query=mysqli_query($this->db, "UPDATE prod SET sprice='$amt', pss=1  WHERE pid='$id' ");
	if($query){
		return true;
	}
}
public function Rsale($id){
	$id=mysqli_real_escape_string($this->db,$id);
	$query=mysqli_query($this->db, "UPDATE prod SET  pss=0  WHERE pid='$id' ");
	if($query){
		return true;
	}
}

//Invioce Generation

public function ginvo($id)
{
$id=mysqli_real_escape_string($this->db,$id);
$query = mysqli_query($this->db, "SELECT * FROM invo WHERE invoice_id='$id'")or die (mysqli_error($this->db));
$data = mysqli_fetch_array($query, MYSQLI_ASSOC);
return $data;
}
//GET product Pic
public function proP($id)
{
$id=mysqli_real_escape_string($this->db,$id);
$query = mysqli_query($this->db, "SELECT pic FROM prod WHERE pid='$id'")or die (mysqli_error($this->db));
$data = mysqli_fetch_array($query, MYSQLI_ASSOC);
return $data['pic'];
}
// Invoice Completion Processing
public function proInv($id, $pt, $pr, $dt)
{
$id=mysqli_real_escape_string($this->db,$id);
$query = mysqli_query($this->db, "UPDATE invo SET st=3138, payt='$pt', pref='$pr', pdt='$dt' WHERE invoice_id ='$id'")or die (mysqli_error($this->db));
if($query){
		return true;
	}
}

public function orderInv($id)
{
$id=mysqli_real_escape_string($this->db,$id);
$query = mysqli_query($this->db, "SELECT * FROM orders WHERE invn='$id'")or die (mysqli_error($this->db));
while($row=mysqli_fetch_array($query,MYSQLI_ASSOC))
	{
	$data[]=$row;
	}
	return $data;
}

public function Comorder($id){
	$id=mysqli_real_escape_string($this->db,$id);
	$query=mysqli_query($this->db, "UPDATE orders SET  st=3138  WHERE invn='$id' ");
	if($query){
		return true;
	}
}


// Get Orders of particular Order number
public function gord($id)
{
$id=mysqli_real_escape_string($this->db,$id);
$query = mysqli_query($this->db, "SELECT * FROM orders WHERE orn='$id'")or die (mysqli_error($this->db));
while($row=mysqli_fetch_array($query,MYSQLI_ASSOC))
	{
	$data[]=$row;
	}
	return $data;
}
// Admin USers
public function adminusers($id) {
	$id = mysqli_real_escape_string($this->db, $id);
	$query = mysqli_query($this->db, "SELECT md_id, secret, enteru, sec_level, fname, email FROM sud WHERE md_id = '$id'")or die(mysqli_error($this->db));
	$data = mysqli_fetch_array($query, MYSQLI_ASSOC);
	return $data;

	}
	
	 public function Users_Details($usearch,$ssearch,$start,$per_page)
    {
	$start=mysqli_real_escape_string($this->db,$start);
	$usearch=mysqli_real_escape_string($this->db,$usearch);
	$ssearch=mysqli_real_escape_string($this->db,$ssearch);
	$per_page=mysqli_real_escape_string($this->db,$per_page);
    $query=mysqli_query($this->db,"SELECT * FROM myusers WHERE st='10' or st= '11' AND uid like '%$usearch%'  ORDER BY uid DESC LIMIT $start,$per_page")or die(mysqli_error($this->db));
    while($row=mysqli_fetch_array($query,MYSQLI_ASSOC))
	{
	$data[]=$row;
	}
	return $data;
    }
//REquest
     public function nReq($usearch,$ssearch,$start,$per_page)
    {
	$start=mysqli_real_escape_string($this->db,$start);
	$usearch=mysqli_real_escape_string($this->db,$usearch);
	$ssearch=mysqli_real_escape_string($this->db,$ssearch);
	$per_page=mysqli_real_escape_string($this->db,$per_page);
    $query=mysqli_query($this->db,"SELECT * FROM req WHERE  reqid like '%$usearch%'  ORDER BY reqid DESC LIMIT $start,$per_page")or die(mysqli_error($this->db));
    while($row=mysqli_fetch_array($query,MYSQLI_ASSOC))
	{
	$data[]=$row;
	}
	return $data;
    }

    //Nurses All
     public function NurA($usearch,$ssearch,$start,$per_page)
    {
	$start=mysqli_real_escape_string($this->db,$start);
	$usearch=mysqli_real_escape_string($this->db,$usearch);
	$ssearch=mysqli_real_escape_string($this->db,$ssearch);
	$per_page=mysqli_real_escape_string($this->db,$per_page);
    $query=mysqli_query($this->db,"SELECT * FROM nurses WHERE  nid like '%$usearch%'  ORDER BY nid DESC LIMIT $start,$per_page")or die(mysqli_error($this->db));
    while($row=mysqli_fetch_array($query,MYSQLI_ASSOC))
	{
	$data[]=$row;
	}
	return $data;
    }

	public function checkuser($uid){
	$uid = mysqli_real_escape_string($this->db, $uid);
	$query = mysqli_query($this->db, "SELECT uid, membership FROM myusers WHERE uid = '$uid'")or die(mysqli_error($this->db));
	$data = mysqli_fetch_array($query, MYSQLI_ASSOC);
	return $data;

		
		
	}
	public function vcon($start, $per_page, $search) {
	$start=mysqli_real_escape_string($this->db,$start);
	$search=mysqli_real_escape_string($this->db,$search);
	$per_page=mysqli_real_escape_string($this->db,$per_page);
	$query = mysqli_query($this->db, "SELECT content_id, title, content, category,pic, postby, status, views  FROM content  WHERE title like '%$search%' ORDER BY content_id DESC LIMIT $start,$per_page")or die(mysqli_error($this->db));
	while($row=mysqli_fetch_array($query,MYSQLI_ASSOC))
	{
	$data[]=$row;
	}
	return $data;
    }
	
	public function vadd($start, $per_page, $search) {
	$start=mysqli_real_escape_string($this->db,$start);
	$search=mysqli_real_escape_string($this->db,$search);
	$per_page=mysqli_real_escape_string($this->db,$per_page);
	$query = mysqli_query($this->db, "SELECT *  FROM advertisments  WHERE a_title like '%$search%' ORDER BY a_id DESC LIMIT $start,$per_page")or die(mysqli_error($this->db));
	while($row=mysqli_fetch_array($query,MYSQLI_ASSOC))
	{
	$data[]=$row;
	}
	return $data;
    }
	/* Admin User */
	public function AdminFull($start,$per_page)
    {
	$start=mysqli_real_escape_string($this->db,$start);
	$per_page=mysqli_real_escape_string($this->db,$per_page);
    $query=mysqli_query($this->db,"SELECT * FROM admin  ORDER BY adminid DESC LIMIT $start, $per_page")or die(mysqli_error($this->db));
    while($row=mysqli_fetch_array($query,MYSQLI_ASSOC))
	{
	$data[]=$row;
	}
	return $data;
    }

	public function Admin_Details($uid)
{
	$username=mysqli_real_escape_string($this->db,$uid);
	$query=mysqli_query($this->db,"SELECT * FROM sud WHERE md_id='$uid' ");
	$data=mysqli_fetch_array($query,MYSQLI_ASSOC);
	return $data;
}
 
public function Mre($start, $per_page){
	
	$query=mysqli_query($this->db, "SELECT id, name FROM mr ORDER BY id DESC LIMIT $start, $per_page");
	while($row=mysqli_fetch_array($query,MYSQLI_ASSOC))
	{
	$data[]=$row;
	}
	return $data;
}

// View Banks
public function vbnk(){
	
	$query=mysqli_query($this->db, "SELECT * FROM bnk ORDER BY bid DESC LIMIT 10");
	while($row=mysqli_fetch_array($query,MYSQLI_ASSOC))
	{
	$data[]=$row;
	}
	return $data;
}
// View Testimonies
public function vtest(){
	
	$query=mysqli_query($this->db, "SELECT * FROM testi ORDER BY tid DESC LIMIT 10");
	while($row=mysqli_fetch_array($query,MYSQLI_ASSOC))
	{
	$data[]=$row;
	}
	return $data;
}


//View Cat
public function vcat(){
	
	$query=mysqli_query($this->db, "SELECT * FROM cat ORDER BY ctid DESC LIMIT 20");
	while($row=mysqli_fetch_array($query,MYSQLI_ASSOC))
	{
	$data[]=$row;
	}
	return $data;
}

//View Sort Cat
public function vscat(){
	
	$query=mysqli_query($this->db, "SELECT * FROM scat ORDER BY scatid DESC LIMIT 20");
	while($row=mysqli_fetch_array($query,MYSQLI_ASSOC))
	{
	$data[]=$row;
	}
	return $data;
}
//Add Admin Users
public function addu($fn, $u, $p, $sec, $s, $em) {
	$u=mysqli_real_escape_string($this->db,$u);
	$sec=mysqli_real_escape_string($this->db,$sec);
	$query = mysqli_query($this->db, "INSERT INTO sud (md_id, secret, enteru, sec_level, seccode, fname, email) VALUES ('','$p','$u', '$sec', '$s', '$fn', '$em')")or die(mysqli_error($this->db));
	if($query){
		return true;
	}else{
		return false;
	}

}
// Disable Admin
public function Dadmin($id){
	$id=mysqli_real_escape_string($this->db,$id);
$query = mysqli_query($this->db, "UPDATE sud SET st =1 WHERE md_id ='$id'") or die(mysqli_error($this->db));
if($query){
	return true;
}
}

// Enable Admin
public function Aadmin($id){
	$id=mysqli_real_escape_string($this->db,$id);
$query = mysqli_query($this->db, "UPDATE sud SET st =10 WHERE md_id ='$id'") or die(mysqli_error($this->db));
if($query){
	return true;
}
}
public function AddMre($name){
	$name=mysqli_real_escape_string($this->db,$name);
	$querry = mysqli_query($this->db, "INSERT INTO mr (name) VALUES('$name')");
	if($querry){
		return true;
	}else{
		return false;
	}
}
public function vadmin() {
	$query = mysqli_query($this->db, "SELECT md_id, enteru, secret, sec_level, st  FROM sud ORDER BY md_id DESC LIMIT 10")or die(mysqli_error($this->db));
	while($row=mysqli_fetch_array($query,MYSQLI_ASSOC))
	{
	$data[]=$row;
	}
	return $data;
}
//DELETE
public function Dmr($id){
	$name=mysqli_real_escape_string($this->db,$name);
	$querry = mysqli_query($this->db, "DELETE FROM mr WHERE id ='$id'");
	if($querry){
		return true;
	}else{
		return false;
	}
}
// DELETE Content
public function delc($contid) {
	$contid=mysqli_real_escape_string($this->db,$contid);
	$query = mysqli_query($this->db, "DELETE from content WHERE content_id = '$contid'")or die(mysqli_error($this->db));
	return true;
}
//DELETE CAT
public function delcat($cid) {
	$cid=mysqli_real_escape_string($this->db,$cid);
	$query = mysqli_query($this->db, "DELETE from cat WHERE ctid = '$cid'")or die(mysqli_error($this->db));
	return true;
}
//DELETE WIDGET
public function delw($wid) {
	$wid=mysqli_real_escape_string($this->db,$wid);
	$query = mysqli_query($this->db, "DELETE from widget WHERE wid = '$wid'")or die(mysqli_error($this->db));
	return true;
}
//DELETE SORT CAT
public function delscat($cid) {
	$cid=mysqli_real_escape_string($this->db,$cid);
	$query = mysqli_query($this->db, "DELETE from scat WHERE scatid = '$cid'")or die(mysqli_error($this->db));
	return true;
}

//DELETE USERS

public function delu($id) {
	$id=mysqli_real_escape_string($this->db,$id);
	$query = mysqli_query($this->db, "DELETE from myusers WHERE uid = '$id'")or die(mysqli_error($this->db));
	return true;
}
///DELETE ADMI USER
public function delad($id) {
	$id=mysqli_real_escape_string($this->db,$id);
	$query = mysqli_query($this->db, "DELETE from sud WHERE md_id = '$id'")or die(mysqli_error($this->db));
	return true;
}

public function delp($id) {
	$id=mysqli_real_escape_string($this->db,$id);
	$query = mysqli_query($this->db, "DELETE from prods WHERE pid = '$id'")or die(mysqli_error($this->db));
	return true;
}
//delete Content Pic
public function delcp($id, $p) {
	$id=mysqli_real_escape_string($this->db,$id);
	$query = mysqli_query($this->db, "UPDATE content SET pic='' WHERE content_id = '$id'")or die(mysqli_error($this->db));
	if($query){
		$this->delpic($p);
		return true;
	}else{
		return false;
	}
}
public function delbnk($id) {
	$id=mysqli_real_escape_string($this->db,$id);
	$query = mysqli_query($this->db, "DELETE from bnk WHERE bid = '$id'")or die(mysqli_error($this->db));
	return true;
}
//DELETE order
public function delorder($id) {
	$id=mysqli_real_escape_string($this->db,$id);
	$query = mysqli_query($this->db, "DELETE from orders WHERE oid = '$id'")or die(mysqli_error($this->db));
	return true;
}
//DELETE invice
public function delinv($id) {
	$id=mysqli_real_escape_string($this->db,$id);
	$query = mysqli_query($this->db, "DELETE from invo WHERE invoice_id = '$id'")or die(mysqli_error($this->db));
	return true;
}


public function Eth($start, $per_page){
	
	$query=mysqli_query($this->db, "SELECT id, name FROM ethnicity");
	while($row=mysqli_fetch_array($query,MYSQLI_ASSOC))
	{
	$data[]=$row;
	}
	return $data;
}
public function AddEth($name){
	$name=mysqli_real_escape_string($this->db,$name);
	$querry = mysqli_query($this->db, "INSERT INTO ethnicity (name) VALUES('$name')");
	if($querry){
		return true;
	}else{
		return false;
	}
}
public function Deth($id){
	$name=mysqli_real_escape_string($this->db,$name);
	$querry = mysqli_query($this->db, "DELETE FROM ethnicity WHERE id ='$id'");
	if($querry){
		return true;
	}else{
		return false;
	}
}
public function Loc($start, $per_page){
	
	$query=mysqli_query($this->db, "SELECT id, name FROM loc");
	while($row=mysqli_fetch_array($query,MYSQLI_ASSOC))
	{
	$data[]=$row;
	}
	return $data;
}
public function AddLoc($name){
	$name=mysqli_real_escape_string($this->db,$name);
	$querry = mysqli_query($this->db, "INSERT INTO loc (name) VALUES('$name')");
	if($querry){
		return true;
	}else{
		return false;
	}
}
public function DLoc($id){
	$name=mysqli_real_escape_string($this->db,$name);
	$querry = mysqli_query($this->db, "DELETE FROM loc WHERE id ='$id'");
	if($querry){
		return true;
	}else{
		return false;
	}
}
public function EmpT(){
	
	$query=mysqli_query($this->db, "SELECT id, name FROM empt");
	while($row=mysqli_fetch_array($query,MYSQLI_ASSOC))
	{
	$data[]=$row;
	}
	return $data;
}
public function AddEmpt($name){
	$name=mysqli_real_escape_string($this->db,$name);
	$querry = mysqli_query($this->db, "INSERT INTO empt (name) VALUES('$name')");
	if($querry){
		return true;
	}else{
		return false;
	}
}
public function DEmpt($id){
	$name=mysqli_real_escape_string($this->db,$name);
	$querry = mysqli_query($this->db, "DELETE FROM empt WHERE id ='$id'");
	if($querry){
		return true;
	}else{
		return false;
	}
}
public function Dadv($id){
	$name=mysqli_real_escape_string($this->db,$name);
	$querry = mysqli_query($this->db, "DELETE FROM advertisments WHERE a_id ='$id'");
	if($querry){
		return true;
	}else{
		return false;
	}
}
//logs
public function logs($u, $ac, $ip){
	$id=mysqli_real_escape_string($this->db,$id);
	$u=mysqli_real_escape_string($this->db,$u);
	$ac=mysqli_real_escape_string($this->db,$ac);
	$ip=mysqli_real_escape_string($this->db,$ip);
	$query = mysqli_query($this->db, "INSERT INTO slog (logid, user, action, ip) VALUES ('','$u', '$ac','$ip')")or die(mysqli_error($this->db));
	return $query;
}

public function AddAdv($t, $u, $des, $sd, $ed, $pic, $cat){
	$pic=mysqli_real_escape_string($this->db,$pic);
	$t=mysqli_real_escape_string($this->db,$t);
	$u=mysqli_real_escape_string($this->db,$u);
	$des=mysqli_real_escape_string($this->db,$des);
	$sd=mysqli_real_escape_string($this->db,$sd);
	$ed=mysqli_real_escape_string($this->db,$ed);
	$cat=mysqli_real_escape_string($this->db,$cat);
	$query = mysqli_query($this->db, "INSERT INTO advertisments (a_title, a_desc, a_url, a_img, startd, endd, cat) VALUES ('$t', '$des', '$u', '$pic', '$sd','$ed', '$cat')")or die(mysqli_error($this->db));
	return $query;
}
// Activte User
public function ActU($id) {
	$id=mysqli_real_escape_string($this->db,$id);
	$query = mysqli_query($this->db, "UPDATE myusers SET st='11' WHERE uid = '$id'")or die(mysqli_error($this->db));
	return true;
}
public function BlcU($id) {
	$id=mysqli_real_escape_string($this->db,$id);
	$query = mysqli_query($this->db, "UPDATE myusers SET st='10' WHERE uid = '$id'")or die(mysqli_error($this->db));
	return true;
}

//ORDER PROCESSING

public function appO($id) {
	$id=mysqli_real_escape_string($this->db,$id);
	$query = mysqli_query($this->db, "UPDATE orders SET st='11' WHERE oid = '$id'")or die(mysqli_error($this->db));
	return true;
}
public function ComO($id) {
	$id=mysqli_real_escape_string($this->db,$id);
	$query = mysqli_query($this->db, "UPDATE orders SET st='13' WHERE oid = '$id'")or die(mysqli_error($this->db));
	return true;
}

public function Aadvert($id) {
	$id=mysqli_real_escape_string($this->db,$id);
	$query = mysqli_query($this->db, "UPDATE advertisments SET status='1' WHERE a_id = '$id'")or die(mysqli_error($this->db));
	return true;
}
public function Dadvert($id) {
	$id=mysqli_real_escape_string($this->db,$id);
	$query = mysqli_query($this->db, "UPDATE advertisments SET status='0' WHERE a_id = '$id'")or die(mysqli_error($this->db));
	return true;
}
// Get SIngle User Deatails
public function Suser($id) {
	$id = mysqli_real_escape_string($this->db, $id);
	$query = mysqli_query($this->db, "SELECT * FROM myusers WHERE uid = '$id'")or die(mysqli_error($this->db));
	$data = mysqli_fetch_array($query, MYSQLI_ASSOC);
	return $data;

	}
public function Sbnk($id) {
	$id = mysqli_real_escape_string($this->db, $id);
	$query = mysqli_query($this->db, "SELECT * FROM bnk WHERE bid = '$id'")or die(mysqli_error($this->db));
	$data = mysqli_fetch_array($query, MYSQLI_ASSOC);
	return $data;

	}

public function Upgrade($id, $p) {
	$id=mysqli_real_escape_string($this->db,$id);
	$query = mysqli_query($this->db, "UPDATE users SET membership='$p' WHERE uid = '$id'")or die(mysqli_error($this->db));
	return true;
}

public function hmpic() {
	$query = mysqli_query($this->db, "SELECT *  FROM homepic ORDER BY id DESC LIMIT 10")or die(mysqli_error($this->db));
	while($row=mysqli_fetch_array($query,MYSQLI_ASSOC))
	{
	$data[]=$row;
	}
	return $data;
	}
public function AllLinks() {
	$query = mysqli_query($this->db, "SELECT *  FROM links ORDER BY link_id DESC LIMIT 20")or die(mysqli_error($this->db));
	while($row=mysqli_fetch_array($query,MYSQLI_ASSOC))
	{
	$data[]=$row;
	}
	return $data;
	}
public function Allslog($start, $per_page) {
	$query = mysqli_query($this->db, "SELECT *  FROM slog ORDER BY logid DESC LIMIT $start,$per_page")or die(mysqli_error($this->db));
	while($row=mysqli_fetch_array($query,MYSQLI_ASSOC))
	{
	$data[]=$row;
	}
	return $data;
	}
	public function AllSLinks() {
	$query = mysqli_query($this->db, "SELECT *  FROM sub_links ORDER BY  sublink_id DESC LIMIT 50")or die(mysqli_error($this->db));
	while($row=mysqli_fetch_array($query,MYSQLI_ASSOC))
	{
	$data[]=$row;
	}
	return $data;
	}
public function delhmp($id) {
	$contid=mysqli_real_escape_string($this->db,$id);
	$query = mysqli_query($this->db, "DELETE from homepic WHERE id = '$id'")or die(mysqli_error($this->db));
	return true;
}
public function delaph($id) {
	$contid=mysqli_real_escape_string($this->db,$id);
	$query = mysqli_query($this->db, "DELETE from a_photos WHERE picid = '$id'")or die(mysqli_error($this->db));
	return true;
}
public function delLink($id) {
	$contid=mysqli_real_escape_string($this->db,$id);
	$query = mysqli_query($this->db, "DELETE from links WHERE link_id = '$id'")or die(mysqli_error($this->db));
	return true;
}
public function delSLink($id) {
	$contid=mysqli_real_escape_string($this->db,$id);
	$query = mysqli_query($this->db, "DELETE from sub_links WHERE sublink_id = '$id'")or die(mysqli_error($this->db));
	return true;
}
	public function sinlink($id) {
		$id = mysqli_real_escape_string($this->db, $id);
		$query = mysqli_query($this->db, "SELECT *  FROM links WHERE link_id = '$id'")or die(mysqli_error($this->db));
		$data = mysqli_fetch_array($query, MYSQLI_ASSOC);
		return $data;
		}
// Add Links
public function addLink($cid, $links, $slink, $st, $alt, $ext, $extl) {
	$cid=mysqli_real_escape_string($this->db,$cid);
	$links=mysqli_real_escape_string($this->db,$links);
	$slink=mysqli_real_escape_string($this->db,$slink);
	$alt=mysqli_real_escape_string($this->db,$alt);
	$ext=mysqli_real_escape_string($this->db,$ext);
	$extl=mysqli_real_escape_string($this->db,$extl);
	$st= 1;
	$query = mysqli_query($this->db, "INSERT INTO links (content_id, links, sublink, status, alt, external, extlink) VALUES ('$cid','$links','$slink', '$st', '$alt', '$ext','$extl')")or die(mysqli_error($this->db));
	return $query;
}
//Add Sub Links
public function addsubLink($cid, $link, $linkid, $st, $ext, $extl) {
	$cid=mysqli_real_escape_string($this->db,$cid);
	$linkid=mysqli_real_escape_string($this->db,$linkid);
	$link=mysqli_real_escape_string($this->db,$link);
	$ext=mysqli_real_escape_string($this->db,$ext);
	$extl=mysqli_real_escape_string($this->db,$extl);
	$st= 1;
	$query = mysqli_query($this->db, "INSERT INTO sub_links (content_id, link_idkf, link, status, ext, extlink) VALUES ('$cid','$linkid','$link', '$st', '$ext', '$extl')")or die(mysqli_error($this->db));
	return $query;
}
// Get Sub Links
public function sblink($start, $per_page) {
	$start=mysqli_real_escape_string($this->db,$start);
	$per_page=mysqli_real_escape_string($this->db,$per_page);
	$query = mysqli_query($this->db, "SELECT content_id, sublink_id, link, link_idkf,  ext, extlink, status  FROM sub_links ORDER BY sublink_id DESC LIMIT $start,$per_page")or die(mysqli_error($this->db));
	while($row=mysqli_fetch_array($query,MYSQLI_ASSOC))
	{
	$data[]=$row;
	}
	return $data;
    }
// All Orders
public function myorders($start, $per_page) {
	$start=mysqli_real_escape_string($this->db,$start);
	$per_page=mysqli_real_escape_string($this->db,$per_page);
	$query = mysqli_query($this->db, "SELECT *  FROM orders ORDER BY oid DESC LIMIT $start,$per_page")or die(mysqli_error($this->db));
	while($row=mysqli_fetch_array($query,MYSQLI_ASSOC))
	{
	$data[]=$row;
	}
	return $data;
    }
  // All Authors
public function myauthor($start, $per_page) {
	$start=mysqli_real_escape_string($this->db,$start);
	$per_page=mysqli_real_escape_string($this->db,$per_page);
	$query = mysqli_query($this->db, "SELECT auid, name, email, st  FROM author ORDER BY auid DESC LIMIT $start,$per_page")or die(mysqli_error($this->db));
	while($row=mysqli_fetch_array($query,MYSQLI_ASSOC))
	{
	$data[]=$row;
	}
	return $data;
    }

//Invoice
public function myinvo($start, $per_page) {
	$start=mysqli_real_escape_string($this->db,$start);
	$per_page=mysqli_real_escape_string($this->db,$per_page);
	$query = mysqli_query($this->db, "SELECT *  FROM invo ORDER BY invoice_id DESC LIMIT $start,$per_page")or die(mysqli_error($this->db));
	while($row=mysqli_fetch_array($query,MYSQLI_ASSOC))
	{
	$data[]=$row;
	}
	return $data;
    }

    public function mysorders($start, $per_page) {
	$start=mysqli_real_escape_string($this->db,$start);
	$per_page=mysqli_real_escape_string($this->db,$per_page);
	$query = mysqli_query($this->db, "SELECT *  FROM sorder ORDER BY soid DESC LIMIT $start,$per_page")or die(mysqli_error($this->db));
	while($row=mysqli_fetch_array($query,MYSQLI_ASSOC))
	{
	$data[]=$row;
	}
	return $data;
    }
  //All Products
public function myprod($start, $per_page) {
	$start=mysqli_real_escape_string($this->db,$start);
	$per_page=mysqli_real_escape_string($this->db,$per_page);
	$query = mysqli_query($this->db, "SELECT *  FROM prods ORDER BY pid DESC LIMIT $start,$per_page")or die(mysqli_error($this->db));
	while($row=mysqli_fetch_array($query,MYSQLI_ASSOC))
	{
	$data[]=$row;
	}
	return $data;
    }
//Edit Product
  	public function editord($id, $tit, $cont, $cat) {
	$id=mysqli_real_escape_string($this->db,$id);
	$tit=mysqli_real_escape_string($this->db,$tit);
	$cont=mysqli_real_escape_string($this->db,$cont);
	$cat=mysqli_real_escape_string($this->db,$cat);
	$query = mysqli_query($this->db, "UPDATE content SET  title='$tit', content='$cont', category='$cat' WHERE content_id='$id'")or die(mysqli_error($this->db));
	//return $query;
	if($query){
		return $id;	
	}else{
		return false;
	}
}
//Activate Product
public function ActPro($id) {
	$id=mysqli_real_escape_string($this->db,$id);
	$query = mysqli_query($this->db, "UPDATE prods SET st='11' WHERE pid = '$id'")or die(mysqli_error($this->db));
	return true;
}
public function BlcPro($id) {
	$id=mysqli_real_escape_string($this->db,$id);
	$query = mysqli_query($this->db, "UPDATE prods SET st='10' WHERE pid = '$id'")or die(mysqli_error($this->db));
	return true;
}

public function csord($id) {
	$id=mysqli_real_escape_string($this->db,$id);
	$query = mysqli_query($this->db, "UPDATE sorder SET st='2' WHERE soid = '$id'")or die(mysqli_error($this->db));
	return true;
}

public function ulink($id, $link, $cid, $slink, $ext, $exts){
	$id=mysqli_real_escape_string($this->db,$id);
	$query = mysqli_query($this->db, "UPDATE links SET links='$link', content_id='$cid', sublink='$slink', external='$exts', extlink='$ext' WHERE link_id = '$id'")or die(mysqli_error($this->db));
	return true;
	
}
public function uslink($id, $link, $cid, $ext, $exts){
	$id=mysqli_real_escape_string($this->db,$id);
	$query = mysqli_query($this->db, "UPDATE sub_links SET link='$link', content_id='$cid',  ext='$exts', extlink='$ext' WHERE sublink_id = '$id'")or die(mysqli_error($this->db));
	return true;
	
}
public function sbinlink($id) {
		$id = mysqli_real_escape_string($this->db, $id);
		$query = mysqli_query($this->db, "SELECT * FROM sub_links WHERE sublink_id = '$id'")or die(mysqli_error($this->db));
		$data = mysqli_fetch_array($query, MYSQLI_ASSOC);
		return $data;
}

public function idprod($id) {
		$id = mysqli_real_escape_string($this->db, $id);
		$query = mysqli_query($this->db, "SELECT * FROM prod WHERE pid = '$id'")or die(mysqli_error($this->db));
		$data = mysqli_fetch_array($query, MYSQLI_ASSOC);
		return $data['name'];
}
public function iduser($id) {
		$id = mysqli_real_escape_string($this->db, $id);
		$query = mysqli_query($this->db, "SELECT * FROM myusers WHERE uid = '$id'")or die(mysqli_error($this->db));
		$data = mysqli_fetch_array($query, MYSQLI_ASSOC);
		return $data['username'];
}
public function delpic($lnk){
	$p = "../images/".$lnk;
	$u = unlink($p);
	if ($u) {
		return true;
	}else{
		return false;
	}
}
public function delpicn($lnk){
	$p = "../images/".$lnk;
	$u = unlink($lnk);
	if ($u) {
		return true;
	}else{
		return false;
	}
}
public function AllAlbulm(){
	$start=mysqli_real_escape_string($this->db,$start);
	$per_page=mysqli_real_escape_string($this->db,$per_page);
	$query = mysqli_query($this->db, "SELECT *  FROM albulm ORDER BY aid DESC LIMIT 50")or die(mysqli_error($this->db));
	while($row=mysqli_fetch_array($query,MYSQLI_ASSOC))
	{
	$data[]=$row;
	}
	return $data;
}
public function alphoto($aid){
	$aid=mysqli_real_escape_string($this->db,$aid);
	$query = mysqli_query($this->db, "SELECT *  FROM a_photos WHERE aid='$aid' ORDER BY picid DESC LIMIT 50")or die(mysqli_error($this->db));
	while($row=mysqli_fetch_array($query,MYSQLI_ASSOC))
	{
	$data[]=$row;
	}
	return $data;
}
public function Calbulm($nm, $pc, $dt, $des){
	$nm=mysqli_real_escape_string($this->db,$nm);
	$pc=mysqli_real_escape_string($this->db,$pc);
	$dt=mysqli_real_escape_string($this->db,$dt);
	$des=mysqli_real_escape_string($this->db,$des);
	
	$query = mysqli_query($this->db, "INSERT INTO albulm (name, cover, created, des) VALUES ('$nm','$pc','$dt','$des')")or die(mysqli_error($this->db));
	//return $query;
	if($query){
		$last_id = mysqli_insert_id($this->db);
	return $last_id;	
	}else{
		return false;
	}

}
public function addPhoto($nm, $pc, $aid, $dt ){
	$nm=mysqli_real_escape_string($this->db,$nm);
	$pc=mysqli_real_escape_string($this->db,$pc);
	$dt=mysqli_real_escape_string($this->db,$dt);
	
	$query = mysqli_query($this->db, "INSERT INTO a_photos (pname, pic, dt, aid) VALUES ('$nm','$pc','$dt','$aid')")or die(mysqli_error($this->db));
	//return $query;
	if($query){
		$last_id = mysqli_insert_id($this->db);
	return $last_id;	
	}else{
		return false;
	}

}
public function Ealbulm($nm, $des){
	$id=mysqli_real_escape_string($this->db,$id);
	$nm=mysqli_real_escape_string($this->db,$mm);
	$des=mysqli_real_escape_string($this->db,$des);
	$query = mysqli_query($this->db, "UPDATE albulm SET  name='$nm', des='$des' WHERE aid='$id'")or die(mysqli_error($this->db));
	return $query;
}
public function DelAl($id){
$id=mysqli_real_escape_string($this->db,$id);
	$querry = mysqli_query($this->db, "DELETE FROM albulm WHERE aid ='$id'");
	if($querry){
		return true;
	}else{
		return false;
	}
}
public function notify($to, $sub, $mes, $usa){
  	$from = "Donsplash CMS X <noreply@donsplashitc.com>";
		$subject = $sub;
		$message = '<!DOCTYPE html><html><head><meta charset="UTF-8"><title>Donsplash ITC</title></head><body style="margin:0px; font-family:Tahoma, Geneva, sans-serif;"><div style="border: 5px solid #CF6476;"><div style="padding:10px; background:#CF6476; font-size:14px; color:#fff;"><a href="https://www.donsplashitc.com"><img src="https://www.donsplashitc.com/images/logo.png" width="120" height="55" style="border:none; float:left;"></a>Donsplash ITC</div>
<div style="padding:24px; font-size:17px;"><p>Hello '.$usa.',<br /> 
'.$mes.'
  <p><strong id="yui_3_16_0_1_1400457885519_22883">Kind regards,<br>
Donsplash ITC Support Staff</strong> </p>
  <p>&nbsp;  </p></div></div></body></html>';
		$headers = "From: $from\n";
        $headers .= "MIME-Version: 1.0\n";
        $headers .= "Content-type: text/html; charset=iso-8859-1\n";
		$m =mail($to, $subject, $message, $headers);
		if ($m) {
			return true;
		}else{
			return false;
		}

  }

}

?>