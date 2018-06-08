<?php
class UserInfo{
public $user_id;
public $user_card_id;
public $user_tel;
public $user_stu_id;
public $user_name;
public $user_type;
public $user_status;
public $user_balance;
public $user_regcode;
public $user_reg_date;
public $user_last_mid;
public $user_last_sid;
}
class Borrow{
public $borrow_id;
public $borrow_userid;
public $borrow_datetime;
public $borrow_mid;
public $borrow_sid;
public $borrow_type;
public $borrow_status;
}
class Back{
public $back_id;
public $back_datetime;
public $back_type;
public $back_status;
}
class Machine{
	public $mac_id;
	public $mac_sid;
	public $mac_type;
	public $mac_status;
}
class Umbrella{
	public $umbrella_id;
	public $umbrella_type;
	public $umbrella_status;
}

?>