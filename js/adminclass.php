<?php  

class Admin {
	
	private $db;
	
	public function __construct($db)
	{
	$this->db = $db;
	}

 //Users Count
    public function Users_Count()
    {
    $query=mysqli_query($this->db,"SELECT uid FROM users")or die(mysqli_error($this->db));
    return mysqli_num_rows($query);
    }	
	
	public function Active_user()
    {
    $query=mysqli_query($this->db,"SELECT uid FROM users WHERE status = '1'")or die(mysqli_error($this->db));
    return mysqli_num_rows($query);
    }
	
	public function Users_Details($usearch,$ssearch,$start,$per_page)
    {
	$start=mysqli_real_escape_string($this->db,$start);
	$usearch=mysqli_real_escape_string($this->db,$usearch);
	$ssearch=mysqli_real_escape_string($this->db,$ssearch);
	$per_page=mysqli_real_escape_string($this->db,$per_page);
    $query=mysqli_query($this->db,"SELECT uid,username,email,mobile,friend_count,profile_pic,bio,conversation_count,updates_count,profile_bg,group_count,
	profile_pic_status,verified,provider,last_login,name,gender  FROM users WHERE status='1' AND uid like '%$usearch%' AND bio like '%$ssearch%' ORDER BY uid DESC LIMIT $start, $per_page")or die(mysqli_error($this->db));
    while($row=mysqli_fetch_array($query,MYSQLI_ASSOC))
	{
	$data[]=$row;
	}
	return $data;
    }
	
	
	public function User_Verify($uid,$type)
    {
	$uid=mysqli_real_escape_string($this->db,$uid);
	$type=mysqli_real_escape_string($this->db,$type);
	if(strlen($type))
	{
	/* Unverified */
	$query=mysqli_query($this->db,"UPDATE users SET verified='0' WHERE uid='$uid'")or die(mysqli_error($this->db));
	}
	else
	{
	echo "UPDATE users SET verified='1' WHERE uid='$uid'";
	/* Verified */
    $query=mysqli_query($this->db,"UPDATE users SET verified='1' WHERE uid='$uid'")or die(mysqli_error($this->db));
     }

	return $query;
    }
	
	
	
	
}

























?>