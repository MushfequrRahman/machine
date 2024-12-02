<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Model
{
	public function fac_type_insert($ftype)
	{
		$sql = "SELECT * FROM factory_type WHERE ftype='$ftype'";
		$query = $this->db->query($sql);
		if ($query->num_rows() == 1) {
			return false;
		} else {
			$sql = "INSERT INTO factory_type VALUES ('','$ftype')";
			$query = $this->db->query($sql);
			return $query;
		}
	}
	public function factory_type_list()
	{
		$query = "SELECT * FROM factory_type";
		$result = $this->db->query($query);
		return $result->result_array();
	}
	public function fac_insert($ftypeid, $facid, $facname, $fac_address)
	{
		$sql = "SELECT * FROM factory WHERE factoryid='$facid'";
		$query = $this->db->query($sql);
		if ($query->num_rows() == 1) {
			return false;
		} else {
			$sql = "INSERT INTO factory VALUES ('$ftypeid','$facid','$facname','$fac_address')";
			$query = $this->db->query($sql);
			return $query;
		}
	}
	public function factory_list()
	{
		$query = "SELECT * FROM factory";
		$result = $this->db->query($query);
		return $result->result_array();
	}
	public function factory_not_own_list($factoryid)
	{
		$query = "SELECT * FROM factory WHERE factoryid!='$factoryid'";
		$result = $this->db->query($query);
		return $result->result_array();
	}
	public function factory_list_up($facid)
	{
		$sql1 = "SELECT * FROM factory WHERE factoryid='$facid'";
		$query1 = $this->db->query($sql1);
		$result = $query1->result_array();
		return $result;
	}
	public function flup($fid, $facid, $factoryname, $factory_address)
	{
		$sql = "UPDATE factory SET factoryid='$facid',factoryname='$factoryname',factory_address='$factory_address' WHERE factoryid='$fid'";
		$query = $this->db->query($sql);
	}
	public function department_insert($department)
	{
		$sql = "SELECT * FROM department WHERE departmentname='$department'";
		$query = $this->db->query($sql);
		if ($query->num_rows() == 1) {
			return false;
		} else {
			$sql = "INSERT INTO department VALUES ('','$department')";
			$query = $this->db->query($sql);
			return $query;
		}
	}

	public function department_list()
	{
		$query = "SELECT * FROM department ORDER BY departmentname ASC";
		$result = $this->db->query($query);
		return $result->result_array();
	}
	public function department_list_up($deptid)
	{
		$sql1 = "SELECT * FROM department 
		
		WHERE deptid='$deptid'";
		$query1 = $this->db->query($sql1);
		$result = $query1->result_array();
		return $result;
	}
	public function departmentlup($deptid, $departmentname)
	{
		$sql = "UPDATE department SET deptid='$deptid',departmentname='$departmentname' WHERE deptid='$deptid'";
		$query = $this->db->query($sql);
	}

	public function designation_insert($designation)
	{
		$sql = "SELECT * FROM designation WHERE designation='$designation'";
		$query = $this->db->query($sql);
		if ($query->num_rows() == 1) {
			return false;
		} else {
			$sql = "INSERT INTO designation VALUES ('','$designation')";
			$query = $this->db->query($sql);
			return $query;
		}
	}
	public function designation_list()
	{
		$query = "SELECT * FROM designation ORDER BY designation ASC";
		$result = $this->db->query($query);
		return $result->result_array();
	}
	public function designation_list_up($designationid)
	{
		$sql1 = "SELECT * FROM designation WHERE designationid='$designationid'";
		$query1 = $this->db->query($sql1);
		$result = $query1->result_array();
		return $result;
	}
	public function designationlup($designationid, $designation)
	{

		$sql = "UPDATE designation SET designation='$designation' WHERE designationid='$designationid'";
		$query = $this->db->query($sql);
	}
	public function usertype_insert($usertype)
	{
		$sql = "SELECT * FROM usertype WHERE usertype='$usertype'";
		$query = $this->db->query($sql);
		if ($query->num_rows() == 1) {
			return false;
		} else {
			$sql = "INSERT INTO usertype VALUES ('','$usertype')";
			$query = $this->db->query($sql);
			return $query;
		}
	}
	public function usertype_list()
	{
		$query = "SELECT * FROM usertype";
		$result = $this->db->query($query);
		return $result->result_array();
	}
	public function usertype_list_up($usertypeid)
	{
		$sql1 = "SELECT * FROM usertype WHERE usertypeid='$usertypeid'";
		$query1 = $this->db->query($sql1);
		$result = $query1->result_array();
		return $result;
	}
	public function usertypelup($usertypeid, $usertype)
	{

		$sql = "UPDATE usertype SET usertype='$usertype' WHERE usertypeid='$usertypeid'";
		$query = $this->db->query($sql);
	}


	public function user_insert($factoryid, $departmentid, $name, $designationid, $oemail, $pmobile, $usertypeid, $userid, $password, $pic_file)
	{
		$sql = "SELECT * FROM user WHERE userid='$userid'";
		$query = $this->db->query($sql);
		if ($query->num_rows() == 1) {
			return false;
		} else {
			$sql = "INSERT INTO user VALUES ('$factoryid','$departmentid','$name','$designationid','$oemail','$pmobile','$usertypeid','$userid','$userid','$password','$pic_file','1','0000-00-00')";
			$query = $this->db->query($sql);

			$sql1 = "INSERT INTO ruser VALUES ('$userid')";
			$query1 = $this->db->query($sql1);
			return $query;
		}
	}
	public function factorywise_user_list($factoryid)
	{
		$query = "SELECT * FROM user 
		LEFT JOIN factory ON factory.factoryid=user.factoryid
		LEFT JOIN department ON department.deptid=user.departmentid
		LEFT JOIN designation ON designation.desigid=user.designationid
		LEFT JOIN userstatus ON userstatus.userstatusid=user.ustatus
		WHERE user.factoryid='$factoryid' ORDER BY user.userid";
		$result = $this->db->query($query);
		return $result->result_array();
	}
	public function user_list_up($userid)
	{
		$sql1 = "SELECT * FROM user 
		LEFT JOIN factory ON factory.factoryid=user.factoryid
		LEFT JOIN department ON department.deptid=user.departmentid
		LEFT JOIN designation ON designation.desigid=user.designationid
		LEFT JOIN usertype ON usertype.usertypeid=user.user_type
		LEFT JOIN userstatus ON userstatus.userstatusid=user.ustatus
		WHERE userid='$userid'";
		$query1 = $this->db->query($sql1);
		$result = $query1->result_array();
		return $result;
	}
	public function ulup($factoryid, $departmentid, $designationid, $name, $email, $mobile, $usertypeid, $userstatusid, $userid, $password, $indate)
	{
		$indate = date("Y-m-d", strtotime($indate));
		$sql = "UPDATE user SET factoryid='$factoryid',departmentid='$departmentid',designationid='$designationid',name='$name',email='$email',mobile='$mobile',user_type='$usertypeid',password='$password',ustatus='$userstatusid',indate='$indate' WHERE userid='$userid'";
		return $query = $this->db->query($sql);
	}

	public function userstatus_insert($userstatus)
	{
		$sql = "SELECT * FROM userstatus WHERE userstatus='$userstatus'";
		$query = $this->db->query($sql);
		if ($query->num_rows() == 1) {
			return false;
		} else {
			$sql = "INSERT INTO userstatus VALUES ('','$userstatus')";
			$query = $this->db->query($sql);
			return $query;
		}
	}
	public function userstatus_list()
	{
		$query = "SELECT * FROM userstatus";
		$result = $this->db->query($query);
		return $result->result_array();
	}
	public function userstatus_list_up($userstatusid)
	{
		$sql1 = "SELECT * FROM userstatus WHERE userstatusid='$userstatusid'";
		$query1 = $this->db->query($sql1);
		$result = $query1->result_array();
		return $result;
	}
	public function userstatuslup($userstatusid, $userstatus)
	{
		$sql = "UPDATE userstatus SET userstatus='$userstatus' WHERE userstatusid='$userstatusid'";
		$query = $this->db->query($sql);
	}
	public function eimglup($urid, $pic_file)
	{
		$sql = "UPDATE user SET image='$pic_file' WHERE urid='$urid'";
		return $query = $this->db->query($sql);
	}






	// MASTER DATA

	public function machine_purpose_insert($mpid, $mps)
	{

		$sql = "SELECT * FROM machine_purpose WHERE mpid='$mpid' OR mpurpose='$mps'";
		$query = $this->db->query($sql);
		if ($query->num_rows() == 1) {
			return false;
		} else {
			$sql1 = "INSERT INTO machine_purpose VALUES ('$mpid','$mps')";
			$query1 = $this->db->query($sql1);
			return $query1;
		}
	}

	public function machine_purpose_list()
	{
		$query = "SELECT * FROM machine_purpose ORDER BY mpurpose ASC";
		$result = $this->db->query($query);
		return $result->result_array();
	}

	public function machine_name_insert($mpid, $mcode, $mname, $minfo)
	{
		date_default_timezone_set('Asia/Dhaka');
		$d = date('Y-m-d');
		$t = date("H:i:s");
		$d1 = str_replace("-", "", $d);
		$t1 = str_replace(":", "", $t);
		$ccid = $d1 . $t1;

		$sql = "SELECT * FROM machine_name WHERE mcode='$mcode' OR mname='$mname'";
		$query = $this->db->query($sql);
		if ($query->num_rows() == 1) {
			return false;
		} else {
			$sql1 = "INSERT INTO machine_name VALUES ('$ccid','$mpid', '$mcode', '$mname', '$minfo')";
			$query1 = $this->db->query($sql1);
			return $query1;
		}
	}
	public function machine_name_list()
	{
		$query = "SELECT mpurpose,mcode,mnid,mname,minfo 
		FROM machine_name
		JOIN machine_purpose ON machine_purpose.mpid=machine_name.mpid 
		ORDER BY mpurpose,mname ASC";
		$result = $this->db->query($query);
		return $result->result_array();
	}
	public function show_machinename($mpid)
	{
		$query = "SELECT mpid,mnid,mcode,mname FROM machine_name WHERE mpid='$mpid' ORDER BY mname ASC";
		$result = $this->db->query($query);
		return $result->result_array();
	}
	public function show_modelname($mcode)
	{
		$query = "SELECT monid,mcode,model FROM model_name WHERE mcode='$mcode' ORDER BY model ASC";
		$result = $this->db->query($query);
		return $result->result_array();
	}
	public function model_insert($mnid, $model)
	{
		date_default_timezone_set('Asia/Dhaka');
		$d = date('Y-m-d');
		$t = date("H:i:s");
		$d1 = str_replace("-", "", $d);
		$t1 = str_replace(":", "", $t);
		$ccid = $d1 . $t1;


		$sqlm = "SELECT mcode FROM machine_name WHERE mnid='$mnid' ";
		$querym = $this->db->query($sqlm);
		$resultm = $querym->result_array();
		foreach ($resultm as $row) {
			$mcode = $row['mcode'];
		}

		$sql = "SELECT * FROM model_name WHERE mnid='$mnid' AND model='$model'";
		$query = $this->db->query($sql);
		if ($query->num_rows() == 1) {
			return false;
		} else {
			$sql1 = "INSERT INTO model_name VALUES ('$ccid','$mnid','$mcode', '$model')";
			$query1 = $this->db->query($sql1);
			return $query1;
		}
	}
	public function model_list()
	{
		$query = "SELECT mpurpose,machine_name.mcode,machine_name.mnid,mname,minfo,model 
		FROM machine_name
		JOIN machine_purpose ON machine_purpose.mpid=machine_name.mpid
		JOIN model_name ON model_name.mnid=machine_name.mnid 
		ORDER BY mpurpose,mname ASC";
		$result = $this->db->query($query);
		return $result->result_array();
	}
	public function machine_type_insert($mtid, $mtype)
	{

		$sql = "SELECT * FROM machine_type WHERE mtid='$mtid' OR mtype='$mtype'";
		$query = $this->db->query($sql);
		if ($query->num_rows() == 1) {
			return false;
		} else {
			$sql1 = "INSERT INTO machine_type VALUES ('$mtid','$mtype')";
			$query1 = $this->db->query($sql1);
			return $query1;
		}
	}
	public function machine_type_list()
	{
		$query = "SELECT * FROM machine_type ORDER BY mtype ASC";
		$result = $this->db->query($query);
		return $result->result_array();
	}
	public function brand_insert($brand)
	{
		date_default_timezone_set('Asia/Dhaka');
		$d = date('Y-m-d');
		$t = date("H:i:s");
		$d1 = str_replace("-", "", $d);
		$t1 = str_replace(":", "", $t);
		$ccid = $d1 . $t1;

		$sql = "SELECT * FROM brand_insert WHERE brandname='$brand'";
		$query = $this->db->query($sql);
		if ($query->num_rows() == 1) {
			return false;
		} else {
			$sql = "INSERT INTO brand_insert VALUES ('$ccid','$brand')";
			$query = $this->db->query($sql);
			return $query;
		}
	}
	public function brand_list()
	{
		$query = "SELECT * FROM brand_insert ORDER BY brandname ASC";
		$result = $this->db->query($query);
		return $result->result_array();
	}
	public function supplier_insert($supplier)
	{
		$sql = "SELECT * FROM supplier_insert WHERE supplier='$supplier'";
		$query = $this->db->query($sql);
		if ($query->num_rows() == 1) {
			return false;
		} else {
			$sql = "INSERT INTO supplier_insert VALUES ('','$supplier')";
			$query = $this->db->query($sql);
			return $query;
		}
	}
	public function supplier_list()
	{
		$query = "SELECT * FROM supplier_insert ORDER BY supplier ASC";
		$result = $this->db->query($query);
		return $result->result_array();
	}
	public function product_uom_insert($puom)
	{
		$sql = "SELECT * FROM product_uom_insert WHERE puom='$puom'";
		$query = $this->db->query($sql);
		if ($query->num_rows() == 1) {
			return false;
		} else {
			$sql = "INSERT INTO product_uom_insert VALUES ('','$puom')";
			$query = $this->db->query($sql);
			return $query;
		}
	}
	public function product_uom_list()
	{
		$query = "SELECT * FROM product_uom_insert";
		$result = $this->db->query($query);
		return $result->result_array();
	}
	public function product_uom_list_up($puomid)
	{
		$sql1 = "SELECT * FROM product_uom_insert WHERE puomid='$puomid'";
		$query1 = $this->db->query($sql1);
		$result = $query1->result_array();
		return $result;
	}
	public function productuomlup($puomid, $puom)
	{
		$sql = "UPDATE product_uom_insert SET puom='$puom' WHERE puomid='$puomid'";
		return $query = $this->db->query($sql);
	}
	public function machine_inventory_insert($factoryid, $mpid, $mcode, $monid, $mtid, $brandid, $supplierid, $price, $wr, $pdate, $pqty, $description)
	{
		date_default_timezone_set('Asia/Dhaka');

		$pdate = date("Y-m-d", strtotime($pdate));
		$smonth = date('F', strtotime($pdate));
		$syear = date('Y', strtotime($pdate));

		$d = date('Y-m-d');
		$t = date("H:i:s");
		$d1 = str_replace("-", "", $d);
		$t1 = str_replace(":", "", $t);
		$ccid = $d1 . $t1;

		$sql1a = "SELECT MAX(midnum) AS midnum FROM machine_asset_code WHERE mafid='$factoryid' AND mcode='$mcode' AND mtid='$mtid' ";
		$query1a = $this->db->query($sql1a);
		$result1a = $query1a->result_array();
		foreach ($result1a as $row) {
			$midnumm = $row['midnum'];
			//$midnum = $midnum + 1;
		}
		for ($i = 1; $i <= $pqty; $i++) {

			$midnum = $midnumm + $i;
			$macode = $factoryid . '-' . $mpid . '-' . $mcode . '-' . $mtid . '-' . $midnum;

			$ccid = $ccid + $i;

			$sqla = "INSERT INTO machine_asset_code VALUES ('$ccid','$macode','$factoryid','$mcode','$mtid','$midnum','$ccid')";

			$sqlr = "INSERT INTO machine_root_asset_code VALUES ('$ccid')";

			$sql = "INSERT INTO machine_inventory VALUES ('$ccid','$factoryid','$factoryid','$macode','$mcode','$mtid','$monid','$brandid','$supplierid','1','$pdate','$smonth','$syear','$price','$wr','$description','0','0000-00-00','0','$ccid')";

			//$sqll = "INSERT INTO machine_renthistory_insert VALUES ('$ccid','$macode','$factoryid','$factoryid','0','',CURDATE(),CURTIME(),CURDATE(),CURTIME(),'','','$ccid')";


			$querya = $this->db->query($sqla);
			$queryr = $this->db->query($sqlr);
			$query = $this->db->query($sql);

			//$queryl = $this->db->query($sqll);
		}
		return $query;
	}
	public function machine_inventory_list()
	{
		$query = "SELECT factoryname,pfactoryid,cfactoryid,
		mpurpose,(machine_name.mcode) AS mcode,
		minvid,rminvid,macode,mname,minfo,model,mtype,brandname,supplier,price,miqty,
		pdate,warranty,description,mistatus,rentdays,rentdate

		FROM machine_inventory
		JOIN model_name ON model_name.monid=machine_inventory.monid
		JOIN machine_type ON machine_type.mtid=machine_inventory.mtid
		JOIN factory ON factory.factoryid=machine_inventory.pfactoryid
		JOIN supplier_insert ON supplier_insert.supplierid=machine_inventory.supplierid
		JOIN brand_insert ON brand_insert.brandid=machine_inventory.brandid
		JOIN machine_name ON machine_name.mcode=model_name.mcode
		JOIN machine_purpose ON machine_purpose.mpid=machine_name.mpid 
		WHERE mistatus!='6'
		ORDER BY factoryid,mpurpose,mname,minvid ASC";
		$result = $this->db->query($query);
		return $result->result_array();
	}
	public function factory_wise_machine_inventory_list($factoryid)
	{
		$query = "SELECT factoryname,pfactoryid,cfactoryid,
		mpurpose,(machine_name.mcode) AS mcode,
		minvid,rminvid,macode,mname,minfo,model,mtype,brandname,supplier,price,miqty,
		pdate,warranty,description,mistatus,rentdays,rentdate

		FROM machine_inventory
		JOIN model_name ON model_name.monid=machine_inventory.monid
		JOIN machine_type ON machine_type.mtid=machine_inventory.mtid
		JOIN factory ON factory.factoryid=machine_inventory.pfactoryid
		JOIN supplier_insert ON supplier_insert.supplierid=machine_inventory.supplierid
		JOIN brand_insert ON brand_insert.brandid=machine_inventory.brandid
		JOIN machine_name ON machine_name.mcode=model_name.mcode
		JOIN machine_purpose ON machine_purpose.mpid=machine_name.mpid
		WHERE (pfactoryid='$factoryid' OR cfactoryid='$factoryid') AND mistatus NOT IN('6','7')
		ORDER BY factoryid,mpurpose,mname,minvid ASC";
		$result = $this->db->query($query);
		return $result->result_array();
	}
	public function machine_rent_insert($minvid, $macode, $cfactoryid, $dfid, $rd, $rp, $rentdate, $remarks, $rminvid)
	{
		date_default_timezone_set('Asia/Dhaka');

		$rentdate = date("Y-m-d", strtotime($rentdate));
		$smonth = date('F', strtotime($rentdate));
		$syear = date('Y', strtotime($rentdate));

		$d = date('Y-m-d');
		$t = date("H:i:s");
		$d1 = str_replace("-", "", $d);
		$t1 = str_replace(":", "", $t);
		$ccid = $d1 . $t1;

		$sql = "UPDATE machine_inventory SET cfactoryid='$dfid',rentdays='$rd',rentdate='$rentdate',mistatus='1' WHERE minvid='$minvid'";

		$sqll = "INSERT INTO machine_renthistory_insert VALUES ('$ccid','$macode','$cfactoryid','$dfid','1','$rd','$rp','$rentdate',CURTIME(),'','','','','','',,'','$remarks','','$rminvid')";

		$query = $this->db->query($sql);
		return $queryl = $this->db->query($sqll);
	}
	public function machine_rent_return_insert($macode, $pfactoryid, $returndate, $returnremarks)
	{
		date_default_timezone_set('Asia/Dhaka');

		$returndate = date("Y-m-d", strtotime($returndate));

		// $d = date('Y-m-d');
		// $t = date("H:i:s");
		// $d1 = str_replace("-", "", $d);
		// $t1 = str_replace(":", "", $t);
		// $ccid = $d1 . $t1;

		$sql = "UPDATE machine_inventory SET cfactoryid='$pfactoryid',rentdays='0',rentdate='0000-00-00',mistatus='0' WHERE macode='$macode'";

		$sqll = "UPDATE machine_renthistory_insert SET mistatus='0',retrdate='$returndate',retrtime=CURTIME(),rentreturnremarks='$returnremarks' WHERE macode='$macode' AND mistatus='1'";

		$query = $this->db->query($sql);
		return $queryl = $this->db->query($sqll);
	}
	public function single_machine_rent_list($rminvid)
	{
		$query = "SELECT sfactoryid,dfactoryid,mistatus,rentdays,rentprice,rentdate,renttime
		retrdate,retrtime,rentremarks,rentreturnremarks
		FROM machine_renthistory_insert WHERE rminvid='$rminvid'
		
		ORDER BY rentdate ASC";
		$result = $this->db->query($query);
		return $result->result_array();
	}
	public function date_wise_machine_transfer_list($pd, $wd)
	{
		$pd = date("Y-m-d", strtotime($pd));
		$wd = date("Y-m-d", strtotime($wd));

		$query = "SELECT sfactoryid,dfactoryid,
		mpurpose,(machine_name.mcode) AS mcode,machine_inventory.macode,
		machine_renthistory_insert_view.minvid,machine_purpose.mpid,machine_type.mtid,
		mname,model,mtype,rentprice,machine_renthistory_insert_view.rentdays,
		machine_renthistory_insert_view.rentdate,retrdate,
		machine_renthistory_insert_view.mistatus,
		DATEDIFF(retrdate,machine_renthistory_insert_view.rentdate) AS stayingday,
		odcount
		
		FROM machine_inventory
		JOIN model_name ON model_name.monid=machine_inventory.monid
		JOIN machine_type ON machine_type.mtid=machine_inventory.mtid
		
		JOIN supplier_insert ON supplier_insert.supplierid=machine_inventory.supplierid
		JOIN brand_insert ON brand_insert.brandid=machine_inventory.brandid
		JOIN machine_name ON machine_name.mcode=model_name.mcode
		JOIN machine_purpose ON machine_purpose.mpid=machine_name.mpid
		JOIN machine_renthistory_insert_view ON machine_renthistory_insert_view.minvid= machine_inventory.minvid
	
		WHERE machine_renthistory_insert_view.rentdate BETWEEN '$pd' AND '$wd'
		ORDER BY sfactoryid ASC";

		$result = $this->db->query($query);
		return $result->result_array();
	}
	public function date_wise_machine_transfer_list_id($pd, $wd)
	{

		$pd = date("Y-m-d", strtotime($pd));
		$wd = date("Y-m-d", strtotime($wd));

		$query = "SELECT risfactoryid,ridfactoryid,additionalcost,ridate,
		COUNT(machine_renthistory_insert_id.rhid) AS rhid
		FROM machine_renthistory_insert_id
		JOIN machine_renthistory_insert 
		ON machine_renthistory_insert.rhid=machine_renthistory_insert_id.rhid
		WHERE ridate BETWEEN '$pd' AND '$wd'
		ORDER BY risfactoryid ASC";

		$result = $this->db->query($query);
		return $result->result_array();
	}
	public function date_wise_factory_wise_machine_transfer_list($factoryid, $pd, $wd)
	{
		// $pd = date("Y-m-d", strtotime($pd));
		// $wd = date("Y-m-d", strtotime($wd));

		// $query = "SELECT sfactoryid,dfactoryid,
		// mpurpose,(machine_name.mcode) AS mcode,machine_inventory.macode,
		// machine_renthistory_insert.minvid,machine_purpose.mpid,machine_type.mtid,
		// mname,model,mtype,rentprice,machine_renthistory_insert.rentdays,
		// machine_renthistory_insert.rentdate,retrdate,
		// machine_renthistory_insert.mistatus

		// FROM machine_inventory
		// JOIN model_name ON model_name.monid=machine_inventory.monid
		// JOIN machine_type ON machine_type.mtid=machine_inventory.mtid

		// JOIN supplier_insert ON supplier_insert.supplierid=machine_inventory.supplierid
		// JOIN brand_insert ON brand_insert.brandid=machine_inventory.brandid
		// JOIN machine_name ON machine_name.mcode=model_name.mcode
		// JOIN machine_purpose ON machine_purpose.mpid=machine_name.mpid
		// JOIN machine_renthistory_insert ON machine_renthistory_insert.minvid= machine_inventory.minvid

		// WHERE machine_renthistory_insert.rentdate between '$pd' AND '$wd' AND sfactoryid='$factoryid'";

		// $result = $this->db->query($query);
		// return $result->result_array();


		$pd = date("Y-m-d", strtotime($pd));
		$wd = date("Y-m-d", strtotime($wd));

		$query = "SELECT sfactoryid,dfactoryid,
		mpurpose,(machine_name.mcode) AS mcode,machine_inventory.macode,
		machine_renthistory_insert_view.minvid,machine_purpose.mpid,machine_type.mtid,
		mname,model,mtype,rentprice,machine_renthistory_insert_view.rentdays,
		machine_renthistory_insert_view.rentdate,retrdate,
		machine_renthistory_insert_view.mistatus,
		DATEDIFF(retrdate,machine_renthistory_insert_view.rentdate) AS stayingday,
		odcount
		
		FROM machine_inventory
		JOIN model_name ON model_name.monid=machine_inventory.monid
		JOIN machine_type ON machine_type.mtid=machine_inventory.mtid
		
		JOIN supplier_insert ON supplier_insert.supplierid=machine_inventory.supplierid
		JOIN brand_insert ON brand_insert.brandid=machine_inventory.brandid
		JOIN machine_name ON machine_name.mcode=model_name.mcode
		JOIN machine_purpose ON machine_purpose.mpid=machine_name.mpid
		JOIN machine_renthistory_insert_view ON machine_renthistory_insert_view.minvid= machine_inventory.minvid
	
		WHERE machine_renthistory_insert_view.rentdate BETWEEN '$pd' AND '$wd' AND sfactoryid='$factoryid'
		ORDER BY sfactoryid ASC";

		$result = $this->db->query($query);
		return $result->result_array();
	}
	public function date_wise_factory_wise_machine_transfer_list_id($factoryid, $pd, $wd)
	{

		$pd = date("Y-m-d", strtotime($pd));
		$wd = date("Y-m-d", strtotime($wd));

		$query = "SELECT risfactoryid,ridfactoryid,additionalcost,ridate,
		COUNT(machine_renthistory_insert_id.rhid) AS rhid
		FROM machine_renthistory_insert_id
		JOIN machine_renthistory_insert 
		ON machine_renthistory_insert.rhid=machine_renthistory_insert_id.rhid
		WHERE ridate BETWEEN '$pd' AND '$wd' AND risfactoryid='$factoryid'
		ORDER BY risfactoryid ASC";

		$result = $this->db->query($query);
		return $result->result_array();
	}
	public function date_wise_machine_rent_list($pd, $wd)
	{
		// $pd = date("Y-m-d", strtotime($pd));
		// $wd = date("Y-m-d", strtotime($wd));

		// $query = "SELECT sfactoryid,dfactoryid,
		// mpurpose,(machine_name.mcode) AS mcode,machine_inventory.macode,
		// machine_renthistory_insert.minvid,machine_purpose.mpid,machine_type.mtid,
		// mname,model,mtype,rentprice,machine_renthistory_insert.rentdays,
		// machine_renthistory_insert.rentdate,retrdate,
		// machine_renthistory_insert.mistatus

		// FROM machine_inventory
		// JOIN model_name ON model_name.monid=machine_inventory.monid
		// JOIN machine_type ON machine_type.mtid=machine_inventory.mtid

		// JOIN supplier_insert ON supplier_insert.supplierid=machine_inventory.supplierid
		// JOIN brand_insert ON brand_insert.brandid=machine_inventory.brandid
		// JOIN machine_name ON machine_name.mcode=model_name.mcode
		// JOIN machine_purpose ON machine_purpose.mpid=machine_name.mpid
		// JOIN machine_renthistory_insert ON machine_renthistory_insert.minvid= machine_inventory.minvid

		// WHERE machine_renthistory_insert.rentdate between '$pd' AND '$wd'
		// ORDER BY dfactoryid ASC";

		// $result = $this->db->query($query);
		// return $result->result_array();

		$pd = date("Y-m-d", strtotime($pd));
		$wd = date("Y-m-d", strtotime($wd));

		$query = "SELECT sfactoryid,dfactoryid,
		mpurpose,(machine_name.mcode) AS mcode,machine_inventory.macode,
		machine_renthistory_insert_view.minvid,machine_purpose.mpid,machine_type.mtid,
		mname,model,mtype,rentprice,machine_renthistory_insert_view.rentdays,
		machine_renthistory_insert_view.rentdate,retrdate,
		machine_renthistory_insert_view.mistatus,
		DATEDIFF(retrdate,machine_renthistory_insert_view.rentdate) AS stayingday,
		odcount
		
		FROM machine_inventory
		JOIN model_name ON model_name.monid=machine_inventory.monid
		JOIN machine_type ON machine_type.mtid=machine_inventory.mtid
		
		JOIN supplier_insert ON supplier_insert.supplierid=machine_inventory.supplierid
		JOIN brand_insert ON brand_insert.brandid=machine_inventory.brandid
		JOIN machine_name ON machine_name.mcode=model_name.mcode
		JOIN machine_purpose ON machine_purpose.mpid=machine_name.mpid
		JOIN machine_renthistory_insert_view ON machine_renthistory_insert_view.minvid= machine_inventory.minvid
	
		WHERE machine_renthistory_insert_view.rentdate BETWEEN '$pd' AND '$wd'
		ORDER BY dfactoryid ASC";

		$result = $this->db->query($query);
		return $result->result_array();
	}
	public function date_wise_machine_rent_list_id($pd, $wd)
	{

		$pd = date("Y-m-d", strtotime($pd));
		$wd = date("Y-m-d", strtotime($wd));

		$query = "SELECT risfactoryid,ridfactoryid,additionalcost,ridate,
		COUNT(machine_renthistory_insert_id.rhid) AS rhid
		FROM machine_renthistory_insert_id
		JOIN machine_renthistory_insert 
		ON machine_renthistory_insert.rhid=machine_renthistory_insert_id.rhid
		WHERE ridate BETWEEN '$pd' AND '$wd'
		ORDER BY ridfactoryid ASC";

		$result = $this->db->query($query);
		return $result->result_array();
	}
	public function date_wise_factory_wise_machine_rent_list($factoryid, $pd, $wd)
	{
		// $pd = date("Y-m-d", strtotime($pd));
		// $wd = date("Y-m-d", strtotime($wd));

		// $query = "SELECT sfactoryid,dfactoryid,
		// mpurpose,(machine_name.mcode) AS mcode,machine_inventory.macode,
		// machine_renthistory_insert.minvid,machine_purpose.mpid,machine_type.mtid,
		// mname,model,mtype,rentprice,machine_renthistory_insert.rentdays,
		// machine_renthistory_insert.rentdate,retrdate,
		// machine_renthistory_insert.mistatus

		// FROM machine_inventory
		// JOIN model_name ON model_name.monid=machine_inventory.monid
		// JOIN machine_type ON machine_type.mtid=machine_inventory.mtid

		// JOIN supplier_insert ON supplier_insert.supplierid=machine_inventory.supplierid
		// JOIN brand_insert ON brand_insert.brandid=machine_inventory.brandid
		// JOIN machine_name ON machine_name.mcode=model_name.mcode
		// JOIN machine_purpose ON machine_purpose.mpid=machine_name.mpid
		// JOIN machine_renthistory_insert ON machine_renthistory_insert.minvid= machine_inventory.minvid

		// WHERE machine_renthistory_insert.rentdate between '$pd' AND '$wd' AND dfactoryid='$factoryid'
		// ORDER BY dfactoryid ASC";

		// $result = $this->db->query($query);
		// return $result->result_array();




		$pd = date("Y-m-d", strtotime($pd));
		$wd = date("Y-m-d", strtotime($wd));

		$query = "SELECT sfactoryid,dfactoryid,
		mpurpose,(machine_name.mcode) AS mcode,machine_inventory.macode,
		machine_renthistory_insert_view.minvid,machine_purpose.mpid,machine_type.mtid,
		mname,model,mtype,rentprice,machine_renthistory_insert_view.rentdays,
		machine_renthistory_insert_view.rentdate,retrdate,
		machine_renthistory_insert_view.mistatus,
		DATEDIFF(retrdate,machine_renthistory_insert_view.rentdate) AS stayingday,
		odcount
		
		FROM machine_inventory
		JOIN model_name ON model_name.monid=machine_inventory.monid
		JOIN machine_type ON machine_type.mtid=machine_inventory.mtid
		
		JOIN supplier_insert ON supplier_insert.supplierid=machine_inventory.supplierid
		JOIN brand_insert ON brand_insert.brandid=machine_inventory.brandid
		JOIN machine_name ON machine_name.mcode=model_name.mcode
		JOIN machine_purpose ON machine_purpose.mpid=machine_name.mpid
		JOIN machine_renthistory_insert_view ON machine_renthistory_insert_view.minvid= machine_inventory.minvid
	
		WHERE machine_renthistory_insert_view.rentdate BETWEEN '$pd' AND '$wd' AND dfactoryid='$factoryid'
		ORDER BY dfactoryid ASC";

		$result = $this->db->query($query);
		return $result->result_array();
	}
	public function date_wise_factory_wise_machine_rent_list_id($factoryid, $pd, $wd)
	{

		$pd = date("Y-m-d", strtotime($pd));
		$wd = date("Y-m-d", strtotime($wd));

		$query = "SELECT risfactoryid,ridfactoryid,additionalcost,ridate,
		COUNT(machine_renthistory_insert_id.rhid) AS rhid
		FROM machine_renthistory_insert_id
		JOIN machine_renthistory_insert 
		ON machine_renthistory_insert.rhid=machine_renthistory_insert_id.rhid
		WHERE ridate BETWEEN '$pd' AND '$wd' AND ridfactoryid='$factoryid'
		ORDER BY ridfactoryid ASC";

		$result = $this->db->query($query);
		return $result->result_array();
	}
	public function single_machine_repair_insert($minvid, $macode, $cfactoryid, $rp, $rd, $remarks, $rminvid)
	{
		date_default_timezone_set('Asia/Dhaka');

		$rd = date("Y-m-d", strtotime($rd));

		$d = date('Y-m-d');
		$t = date("H:i:s");
		$d1 = str_replace("-", "", $d);
		$t1 = str_replace(":", "", $t);
		$ccid = $d1 . $t1;

		$sql = "INSERT INTO machine_repair_insert VALUES ('$ccid','$minvid','$macode', '$cfactoryid', '$rp','$rd',CURTIME(),CURDATE(),CURTIME(), '$remarks','$rminvid')";

		return $query = $this->db->query($sql);
	}
	public function single_machine_repair_list($rminvid)
	{
		$query = "SELECT cfactoryid,repairprice,repairdate,repairremarks
		
		FROM machine_repair_insert WHERE rminvid='$rminvid'
		
		ORDER BY repairdate ASC";
		$result = $this->db->query($query);
		return $result->result_array();
	}

	public function purpose_wise_machine_inventory($mpid, $cfactoryid)
	{
		$query = "SELECT factoryname,pfactoryid,cfactoryid,
		mpurpose,(machine_name.mcode) AS mcode,
		minvid,rminvid,macode,mname,minfo,model,mtype,brandname,supplier,price,miqty,
		pdate,warranty,description,mistatus,rentdays,rentdate

		FROM machine_inventory
		JOIN model_name ON model_name.monid=machine_inventory.monid
		JOIN machine_type ON machine_type.mtid=machine_inventory.mtid
		JOIN factory ON factory.factoryid=machine_inventory.pfactoryid
		JOIN supplier_insert ON supplier_insert.supplierid=machine_inventory.supplierid
		JOIN brand_insert ON brand_insert.brandid=machine_inventory.brandid
		JOIN machine_name ON machine_name.mcode=model_name.mcode
		JOIN machine_purpose ON machine_purpose.mpid=machine_name.mpid 
		WHERE machine_name.mpid='$mpid' AND cfactoryid='$cfactoryid' AND mistatus='0'
		ORDER BY factoryid,mpurpose,mname,minvid ASC";
		$result = $this->db->query($query);
		return $result->result_array();
	}
	public function multiple_machine_rent_insert($data)
	{
		date_default_timezone_set('Asia/Dhaka');
		$data['rentdate'] = date("Y-m-d", strtotime($data['rentdate']));
		$data['smonth'] = date('F', strtotime($data['rentdate']));
		$data['syear'] = date('Y', strtotime($data['rentdate']));

		$d = date('Y-m-d');
		$t = date("H:i:s");
		$d1 = str_replace("-", "", $d);
		$t1 = str_replace(":", "", $t);
		$ccid = $d1 . $t1;
		$data['ccid'] = $ccid . $data['i'];

		$sql = "UPDATE machine_inventory SET cfactoryid='$data[dfid]',rentdays='$data[rd]',rentdate='$data[rentdate]',mistatus='1' WHERE minvid='$data[minvid]'";

		$sql1 = "INSERT INTO machine_renthistory_insert VALUES ('$data[ccid]','$data[rccid]','$data[minvid]','$data[macode]','$data[cfactoryid]','$data[dfid]','1','$data[rd]','$data[rp]','$data[rentdate]',CURTIME(),'$data[smonth]','$data[syear]','','','','','$data[remarks]','','$data[rminvid]')";

		$query = $this->db->query($sql);
		return $query1 = $this->db->query($sql1);
	}
	public function machine_rent_list()
	{
		$query = "SELECT factoryname,pfactoryid,cfactoryid,
		mpurpose,(machine_name.mcode) AS mcode,
		minvid,rminvid,macode,mname,minfo,model,mtype,brandname,supplier,price,miqty,
		pdate,warranty,description,mistatus,rentdays,rentdate

		FROM machine_inventory
		JOIN model_name ON model_name.monid=machine_inventory.monid
		JOIN machine_type ON machine_type.mtid=machine_inventory.mtid
		JOIN factory ON factory.factoryid=machine_inventory.pfactoryid
		JOIN supplier_insert ON supplier_insert.supplierid=machine_inventory.supplierid
		JOIN brand_insert ON brand_insert.brandid=machine_inventory.brandid
		JOIN machine_name ON machine_name.mcode=model_name.mcode
		JOIN machine_purpose ON machine_purpose.mpid=machine_name.mpid 
		WHERE mistatus='1'
		ORDER BY factoryid,mpurpose,mname,minvid ASC";
		$result = $this->db->query($query);
		return $result->result_array();
	}
	public function factory_wise_machine_rent_list($factoryid)
	{
		$query = "SELECT factoryname,pfactoryid,cfactoryid,
		mpurpose,(machine_name.mcode) AS mcode,
		minvid,rminvid,macode,mname,minfo,model,mtype,brandname,supplier,price,miqty,
		pdate,warranty,description,mistatus,rentdays,rentdate

		FROM machine_inventory
		JOIN model_name ON model_name.monid=machine_inventory.monid
		JOIN machine_type ON machine_type.mtid=machine_inventory.mtid
		JOIN factory ON factory.factoryid=machine_inventory.pfactoryid
		JOIN supplier_insert ON supplier_insert.supplierid=machine_inventory.supplierid
		JOIN brand_insert ON brand_insert.brandid=machine_inventory.brandid
		JOIN machine_name ON machine_name.mcode=model_name.mcode
		JOIN machine_purpose ON machine_purpose.mpid=machine_name.mpid 
		WHERE mistatus='1' AND cfactoryid='$factoryid'
		ORDER BY factoryid,mpurpose,mname,minvid ASC";
		$result = $this->db->query($query);
		return $result->result_array();
	}
	public function multiple_machine_rent_return_insert($data)
	{
		date_default_timezone_set('Asia/Dhaka');
		$data['returndate'] = date("Y-m-d", strtotime($data['returndate']));
		$data['smonth'] = date('F', strtotime($data['returndate']));
		$data['syear'] = date('Y', strtotime($data['returndate']));

		$d = date('Y-m-d');
		$t = date("H:i:s");
		$d1 = str_replace("-", "", $d);
		$t1 = str_replace(":", "", $t);
		$ccid = $d1 . $t1;
		$data['ccid'] = $ccid . $data['i'];


		$sql = "UPDATE machine_inventory SET cfactoryid='$data[pfactoryid]',rentdays='0',rentdate='0000-00-00',mistatus='0' WHERE minvid='$data[minvid]'";

		$sql1 = "UPDATE machine_renthistory_insert SET mistatus='0',retrdate='$data[returndate]',retrtime=CURTIME(),remonth='$data[smonth]',reyear='$data[syear]',rentreturnremarks='$data[returnremarks]' WHERE minvid='$data[minvid]' AND mistatus='1'";

		//$sql = "UPDATE machine_inventory SET cfactoryid='$data[dfid]',rentdays='$data[rd]',rentdate='$data[rentdate]',mistatus='1' WHERE minvid='$data[minvid]'";

		//echo $sql1 = "INSERT INTO machine_renthistory_insert VALUES ('$data[ccid]','$data[macode]','$data[cfactoryid]','$data[dfid]','1','$data[rd]','$data[rp]','$data[rentdate]',CURTIME(),'','','$data[remarks]','','$data[rminvid]')";
		//echo "<br/>";
		$query = $this->db->query($sql);
		return $query1 = $this->db->query($sql1);
	}
	public function year_wise_off_day_insert($data)
	{
		date_default_timezone_set('Asia/Dhaka');
		$data['offdate'] = date("Y-m-d", strtotime($data['offdate']));
		$data['smonth'] = date('F', strtotime($data['offdate']));
		$data['syear'] = date('Y', strtotime($data['offdate']));

		$d = date('Y-m-d');
		$t = date("H:i:s");
		$d1 = str_replace("-", "", $d);
		$t1 = str_replace(":", "", $t);
		$ccid = $d1 . $t1;
		$data['ccid'] = $ccid . $data['i'];



		$sql = "INSERT INTO off_day_insert VALUES ('$data[ccid]','$data[factoryid]','$data[offdate]','$data[smonth]','$data[syear]',CURDATE(),CURTIME())";

		return $query = $this->db->query($sql);
	}
	public function sewing_floor_insert($factoryid, $sfn)
	{
		date_default_timezone_set('Asia/Dhaka');

		$d = date('Y-m-d');
		$t = date("H:i:s");
		$d1 = str_replace("-", "", $d);
		$t1 = str_replace(":", "", $t);
		$ccid = $d1 . $t1;

		$sql = "SELECT * FROM sewing_floor_insert WHERE factoryid='$factoryid' AND sfname='$sfn'";
		$query = $this->db->query($sql);
		if ($query->num_rows() == 1) {
			return false;
		} else {
			$sql = "INSERT INTO sewing_floor_insert VALUES ('$ccid','$factoryid','$sfn')";

			return $query = $this->db->query($sql);
		}
	}
	public function sewing_floor_list()
	{
		$query = "SELECT sfnid,factoryname,sfname 
		FROM sewing_floor_insert
		JOIN factory ON factory.factoryid=sewing_floor_insert.factoryid 
		ORDER BY factoryname,sfname ASC";
		$result = $this->db->query($query);
		return $result->result_array();
	}
	public function factory_wise_sewing_floor_list($factoryid)
	{
		$query = "SELECT sfnid,factoryname,sfname 
		FROM sewing_floor_insert
		JOIN factory ON factory.factoryid=sewing_floor_insert.factoryid
		WHERE sewing_floor_insert.factoryid='$factoryid' 
		ORDER BY factoryname,sfname ASC";
		$result = $this->db->query($query);
		return $result->result_array();
	}
	public function show_factory_wise_sewing_floor($factoryid)
	{
		$query = "SELECT sfnid,factoryid,sfname  
		FROM sewing_floor_insert 
		WHERE factoryid='$factoryid' ORDER BY sfname ASC";
		$result = $this->db->query($query);
		return $result->result_array();
	}
	public function sewing_line_insert($factoryid, $sfnid, $sln)
	{
		date_default_timezone_set('Asia/Dhaka');

		$d = date('Y-m-d');
		$t = date("H:i:s");
		$d1 = str_replace("-", "", $d);
		$t1 = str_replace(":", "", $t);
		$ccid = $d1 . $t1;

		$sql = "SELECT * FROM sewing_line_insert WHERE sfnid='$sfnid' AND slname='$sln'";
		$query = $this->db->query($sql);
		if ($query->num_rows() == 1) {
			return false;
		} else {
			$sql = "INSERT INTO sewing_line_insert VALUES ('$ccid','$sfnid','$sln')";

			return $query = $this->db->query($sql);
		}
	}
	public function multiple_sewing_line_insert($data)
	{
		date_default_timezone_set('Asia/Dhaka');
		$sql = "INSERT INTO sewing_line_insert VALUES ('$data[ccid1]','$data[sfnid]','$data[sln]')";

		return $query = $this->db->query($sql);
	}
	public function sewing_line_list()
	{
		$query = "SELECT slnid,factoryname,sfname,slname 
		FROM sewing_line_insert
		JOIN sewing_floor_insert ON sewing_floor_insert.sfnid=sewing_line_insert.sfnid 
		JOIN factory ON factory.factoryid=sewing_floor_insert.factoryid
		ORDER BY factoryname,sfname,slname ASC";
		$result = $this->db->query($query);
		return $result->result_array();
	}
	public function show_factory_wise_sewing_line($cfactoryid)
	{
		$query = "SELECT sewing_floor_insert.sfnid,factoryid,sfname,slnid,slname  
		FROM sewing_line_insert
		JOIN sewing_floor_insert ON sewing_floor_insert.sfnid=sewing_line_insert.sfnid 
		WHERE factoryid='$cfactoryid' ORDER BY sfname,slname ASC";
		$result = $this->db->query($query);
		return $result->result_array();
	}
	public function purpose_wise_line_allocate_machine_inventory($mpid, $cfactoryid)
	{
		$query = "SELECT factoryname,pfactoryid,cfactoryid,
		mpurpose,(machine_name.mcode) AS mcode,
		minvid,rminvid,macode,mname,minfo,model,mtype,brandname,supplier,price,miqty,
		pdate,warranty,description,mistatus,rentdays,rentdate

		FROM machine_inventory
		JOIN model_name ON model_name.monid=machine_inventory.monid
		JOIN machine_type ON machine_type.mtid=machine_inventory.mtid
		JOIN factory ON factory.factoryid=machine_inventory.pfactoryid
		JOIN supplier_insert ON supplier_insert.supplierid=machine_inventory.supplierid
		JOIN brand_insert ON brand_insert.brandid=machine_inventory.brandid
		JOIN machine_name ON machine_name.mcode=model_name.mcode
		JOIN machine_purpose ON machine_purpose.mpid=machine_name.mpid 
		WHERE machine_name.mpid='$mpid' AND cfactoryid='$cfactoryid' AND mistatus IN('0','1')
		ORDER BY factoryid,mpurpose,mname,minvid ASC";
		$result = $this->db->query($query);
		return $result->result_array();
	}
	public function purpose_wise_repair_insert_machine_inventory($mpid, $cfactoryid)
	{
		$query = "SELECT factoryname,pfactoryid,cfactoryid,
		mpurpose,(machine_name.mcode) AS mcode,
		minvid,rminvid,macode,mname,minfo,model,mtype,brandname,supplier,price,miqty,
		pdate,warranty,description,mistatus,rentdays,rentdate

		FROM machine_inventory
		JOIN model_name ON model_name.monid=machine_inventory.monid
		JOIN machine_type ON machine_type.mtid=machine_inventory.mtid
		JOIN factory ON factory.factoryid=machine_inventory.pfactoryid
		JOIN supplier_insert ON supplier_insert.supplierid=machine_inventory.supplierid
		JOIN brand_insert ON brand_insert.brandid=machine_inventory.brandid
		JOIN machine_name ON machine_name.mcode=model_name.mcode
		JOIN machine_purpose ON machine_purpose.mpid=machine_name.mpid 
		WHERE machine_name.mpid='$mpid' AND cfactoryid='$cfactoryid' AND mistatus IN('0','1')
		ORDER BY factoryid,mpurpose,mname,minvid ASC";
		$result = $this->db->query($query);
		return $result->result_array();
	}
	public function multiple_machine_line_allocate_insert($data)
	{
		date_default_timezone_set('Asia/Dhaka');
		$data['adate'] = date("Y-m-d", strtotime($data['adate']));
		$data['smonth'] = date('F', strtotime($data['adate']));
		$data['syear'] = date('Y', strtotime($data['adate']));

		$d = date('Y-m-d');
		$t = date("H:i:s");
		$d1 = str_replace("-", "", $d);
		$t1 = str_replace(":", "", $t);
		$ccid = $d1 . $t1;
		$data['ccid'] = $ccid . $data['i'];

		$sql = "UPDATE machine_inventory SET mistatus='2' WHERE minvid='$data[minvid]'";

		$sql1 = "INSERT INTO machine_allocate_to_line VALUES ('$data[ccid]','$data[cfactoryid]','$data[minvid]','$data[macode]','$data[adate]',CURTIME(),'','','$data[slnid]','$data[remarks]','','1','$data[smonth]','$data[syear]','','','$data[rminvid]')";

		$query = $this->db->query($sql);
		return $query1 = $this->db->query($sql1);
	}
	public function machine_line_allocate_list($mpid, $cfactoryid)
	{
		$query = "SELECT factoryname,pfactoryid,cfactoryid,
		mpurpose,(machine_name.mcode) AS mcode,
		minvid,rminvid,macode,mname,minfo,model,mtype,brandname,supplier,price,miqty,
		pdate,warranty,description,mistatus,rentdays,rentdate

		FROM machine_inventory
		JOIN model_name ON model_name.monid=machine_inventory.monid
		JOIN machine_type ON machine_type.mtid=machine_inventory.mtid
		JOIN factory ON factory.factoryid=machine_inventory.pfactoryid
		JOIN supplier_insert ON supplier_insert.supplierid=machine_inventory.supplierid
		JOIN brand_insert ON brand_insert.brandid=machine_inventory.brandid
		JOIN machine_name ON machine_name.mcode=model_name.mcode
		JOIN machine_purpose ON machine_purpose.mpid=machine_name.mpid 
		WHERE machine_name.mpid='$mpid' AND cfactoryid='$cfactoryid' AND mistatus IN('0','1')
		ORDER BY factoryid,mpurpose,mname,minvid ASC";
		$result = $this->db->query($query);
		return $result->result_array();
	}
	public function factory_wise_machine_line_allocate_list($factoryid)
	{
		$query = "SELECT factoryname,pfactoryid,cfactoryid,
		mpurpose,(machine_name.mcode) AS mcode,
		minvid,rminvid,macode,mname,minfo,model,mtype,brandname,supplier,price,miqty,
		pdate,warranty,description,mistatus,rentdays,rentdate

		FROM machine_inventory
		JOIN model_name ON model_name.monid=machine_inventory.monid
		JOIN machine_type ON machine_type.mtid=machine_inventory.mtid
		JOIN factory ON factory.factoryid=machine_inventory.pfactoryid
		JOIN supplier_insert ON supplier_insert.supplierid=machine_inventory.supplierid
		JOIN brand_insert ON brand_insert.brandid=machine_inventory.brandid
		JOIN machine_name ON machine_name.mcode=model_name.mcode
		JOIN machine_purpose ON machine_purpose.mpid=machine_name.mpid 
		WHERE  cfactoryid='$factoryid' AND mistatus = '2'
		ORDER BY factoryid,mpurpose,mname,minvid ASC";
		$result = $this->db->query($query);
		return $result->result_array();
	}
	public function multiple_machine_allocate_line_return_insert($data)
	{
		date_default_timezone_set('Asia/Dhaka');
		$data['returndate'] = date("Y-m-d", strtotime($data['returndate']));
		$data['smonth'] = date('F', strtotime($data['returndate']));
		$data['syear'] = date('Y', strtotime($data['returndate']));

		$d = date('Y-m-d');
		$t = date("H:i:s");
		$d1 = str_replace("-", "", $d);
		$t1 = str_replace(":", "", $t);
		$ccid = $d1 . $t1;
		$data['ccid'] = $ccid . $data['i'];
		if ($data['cfactoryid'] == $data['pfactoryid']) {

			$sql = "UPDATE machine_inventory SET mistatus='0' WHERE minvid='$data[minvid]'";

			$sql1 = "UPDATE machine_allocate_to_line SET matlstatus='0',allocateretundate='$data[returndate]',allocatereturntime=CURTIME(),allocatereturnremarks='$data[returnremarks]',alrmonth='$data[smonth]',alryear='$data[syear]' WHERE minvid='$data[minvid]' AND matlstatus='1'";
		} else {
			$sql = "UPDATE machine_inventory SET mistatus='1' WHERE minvid='$data[minvid]'";

			$sql1 = "UPDATE machine_allocate_to_line SET matlstatus='0',allocateretundate='$data[returndate]',allocatereturntime=CURTIME(),allocatereturnremarks='$data[returnremarks]',alrmonth='$data[smonth]',alryear='$data[syear]' WHERE minvid='$data[minvid]' AND matlstatus='1'";
		}

		$query = $this->db->query($sql);
		return $query1 = $this->db->query($sql1);
	}

	public function multiple_machine_repair_insert($data)
	{
		date_default_timezone_set('Asia/Dhaka');

		$data['adate'] = date("Y-m-d", strtotime($data['adate']));
		$data['smonth'] = date('F', strtotime($data['adate']));
		$data['syear'] = date('Y', strtotime($data['adate']));

		$d = date('Y-m-d');
		$t = date("H:i:s");
		$d1 = str_replace("-", "", $d);
		$t1 = str_replace(":", "", $t);
		$ccid = $d1 . $t1;
		$data['ccid'] = $ccid . $data['i'];

		$sql = "UPDATE machine_inventory SET cfactoryid='$data[rfactoryid]',mistatus='3' WHERE minvid='$data[minvid]'";

		$sql1 = "INSERT INTO machine_repair_insert VALUES ('$data[ccid]','$data[minvid]','$data[macode]', '$data[cfactoryid]', '$data[rfactoryid]','','$data[adate]',CURTIME(),CURDATE(),CURTIME(),'','', '$data[remarks]','','1','$data[smonth]','$data[syear]','','','$data[rminvid]')";

		$query = $this->db->query($sql);
		return $query1 = $this->db->query($sql1);
	}

	public function multiple_machine_repair_return_insert($data)
	{
		date_default_timezone_set('Asia/Dhaka');
		$data['returndate'] = date("Y-m-d", strtotime($data['returndate']));
		$data['smonth'] = date('F', strtotime($data['returndate']));
		$data['syear'] = date('Y', strtotime($data['returndate']));

		$d = date('Y-m-d');
		$t = date("H:i:s");
		$d1 = str_replace("-", "", $d);
		$t1 = str_replace(":", "", $t);
		$ccid = $d1 . $t1;
		$data['ccid'] = $ccid . $data['i'];
		if ($data['cfactoryid'] == $data['pfactoryid']) {

			$sql = "UPDATE machine_inventory SET mistatus='0' WHERE minvid='$data[minvid]'";

			$sql1 = "UPDATE machine_repair_insert SET mrstatus='0',rrepairdate='$data[returndate]',rrepairtime=CURTIME(),repairprice='$data[price]',rrepairremarks='$data[returnremarks]',repremonth='$data[smonth]',repreyear='$data[syear]' WHERE minvid='$data[minvid]' AND mrstatus='1'";
		} else {
			$sql = "UPDATE machine_inventory SET mistatus='1' WHERE minvid='$data[minvid]'";

			$sql1 = "UPDATE machine_repair_insert SET mrstatus='0',rrepairdate='$data[returndate]',rrepairtime=CURTIME(),repairprice='$data[price]',rrepairremarks='$data[returnremarks]',repremonth='$data[smonth]',repreyear='$data[syear]' WHERE minvid='$data[minvid]' AND mrstatus='1'";
		}

		$query = $this->db->query($sql);
		return $query1 = $this->db->query($sql1);
	}
	public function factory_wise_machine_running_rapair_list($factoryid)
	{
		$query = "SELECT factoryname,pfactoryid,(machine_inventory.cfactoryid) AS cfactoryid,rfactoryid,
		mpurpose,(machine_name.mcode) AS mcode,
		(machine_inventory.minvid) AS minvid,(machine_inventory.rminvid) AS rminvid,(machine_inventory.macode) AS macode,
		mname,minfo,model,mtype,brandname,supplier,price,miqty,
		pdate,warranty,description,mistatus,rentdays,rentdate

		FROM machine_inventory
		JOIN model_name ON model_name.monid=machine_inventory.monid
		JOIN machine_type ON machine_type.mtid=machine_inventory.mtid
		JOIN factory ON factory.factoryid=machine_inventory.pfactoryid
		JOIN supplier_insert ON supplier_insert.supplierid=machine_inventory.supplierid
		JOIN brand_insert ON brand_insert.brandid=machine_inventory.brandid
		JOIN machine_name ON machine_name.mcode=model_name.mcode
		JOIN machine_purpose ON machine_purpose.mpid=machine_name.mpid
		JOIN machine_repair_insert ON machine_repair_insert.macode=machine_inventory.macode  
		WHERE  rfactoryid='$factoryid' AND mrstatus = '1'
		ORDER BY factoryid,mpurpose,mname,minvid ASC";
		$result = $this->db->query($query);
		return $result->result_array();
	}
	public function year_month_wise_factory_wise_machine_repair_list($factoryid, $repmonth, $repyear)
	{
		$query = "SELECT rfactoryid,
		mpurpose,(machine_name.mcode) AS mcode,
		machine_repair_insert.minvid,machine_purpose.mpid,machine_type.mtid,
		mname,model,mtype,SUM(repairprice) AS repairprice
		
		FROM machine_inventory
		JOIN model_name ON model_name.monid=machine_inventory.monid
		JOIN machine_type ON machine_type.mtid=machine_inventory.mtid
		
		JOIN supplier_insert ON supplier_insert.supplierid=machine_inventory.supplierid
		JOIN brand_insert ON brand_insert.brandid=machine_inventory.brandid
		JOIN machine_name ON machine_name.mcode=model_name.mcode
		JOIN machine_purpose ON machine_purpose.mpid=machine_name.mpid
		JOIN machine_repair_insert ON machine_repair_insert.minvid= machine_inventory.minvid
	
		WHERE rfactoryid='$factoryid' AND repmonth='$repmonth' AND repyear='$repyear'
		GROUP BY rfactoryid,machine_purpose.mpid,machine_type.mtid,
		mcode,repmonth,repyear";

		$result = $this->db->query($query);
		return $result->result_array();
	}
	public function date_wise_machine_repair_list($pd, $wd)
	{
		$pd = date("Y-m-d", strtotime($pd));
		$wd = date("Y-m-d", strtotime($wd));

		$query = "SELECT rfactoryid,
		mpurpose,(machine_name.mcode) AS mcode,machine_inventory.macode,
		machine_repair_insert.minvid,machine_purpose.mpid,machine_type.mtid,
		mname,model,mtype,repairprice,srepairdate,rrepairdate
		
		FROM machine_inventory
		JOIN model_name ON model_name.monid=machine_inventory.monid
		JOIN machine_type ON machine_type.mtid=machine_inventory.mtid
		
		JOIN supplier_insert ON supplier_insert.supplierid=machine_inventory.supplierid
		JOIN brand_insert ON brand_insert.brandid=machine_inventory.brandid
		JOIN machine_name ON machine_name.mcode=model_name.mcode
		JOIN machine_purpose ON machine_purpose.mpid=machine_name.mpid
		JOIN machine_repair_insert ON machine_repair_insert.minvid= machine_inventory.minvid
	
		WHERE srepairdate between '$pd' AND '$wd'
		ORDER BY rfactoryid ASC";

		$result = $this->db->query($query);
		return $result->result_array();
	}
	public function date_wise_factory_wise_machine_repair_list($factoryid, $pd, $wd)
	{
		$pd = date("Y-m-d", strtotime($pd));
		$wd = date("Y-m-d", strtotime($wd));

		$query = "SELECT rfactoryid,
		mpurpose,(machine_name.mcode) AS mcode,machine_inventory.macode,
		machine_repair_insert.minvid,machine_purpose.mpid,machine_type.mtid,
		mname,model,mtype,repairprice,srepairdate,rrepairdate
		
		FROM machine_inventory
		JOIN model_name ON model_name.monid=machine_inventory.monid
		JOIN machine_type ON machine_type.mtid=machine_inventory.mtid
		
		JOIN supplier_insert ON supplier_insert.supplierid=machine_inventory.supplierid
		JOIN brand_insert ON brand_insert.brandid=machine_inventory.brandid
		JOIN machine_name ON machine_name.mcode=model_name.mcode
		JOIN machine_purpose ON machine_purpose.mpid=machine_name.mpid
		JOIN machine_repair_insert ON machine_repair_insert.minvid= machine_inventory.minvid
	
		WHERE srepairdate between '$pd' AND '$wd' AND rfactoryid='$factoryid'";

		$result = $this->db->query($query);
		return $result->result_array();
	}
	public function purpose_wise_disposal_insert_machine_inventory($mpid, $cfactoryid)
	{
		$query = "SELECT factoryname,pfactoryid,cfactoryid,
		mpurpose,(machine_name.mcode) AS mcode,
		minvid,rminvid,macode,mname,minfo,model,mtype,brandname,supplier,price,miqty,
		pdate,warranty,description,mistatus,rentdays,rentdate

		FROM machine_inventory
		JOIN model_name ON model_name.monid=machine_inventory.monid
		JOIN machine_type ON machine_type.mtid=machine_inventory.mtid
		JOIN factory ON factory.factoryid=machine_inventory.pfactoryid
		JOIN supplier_insert ON supplier_insert.supplierid=machine_inventory.supplierid
		JOIN brand_insert ON brand_insert.brandid=machine_inventory.brandid
		JOIN machine_name ON machine_name.mcode=model_name.mcode
		JOIN machine_purpose ON machine_purpose.mpid=machine_name.mpid 
		WHERE machine_name.mpid='$mpid' AND cfactoryid='$cfactoryid' AND mistatus IN('0','1')
		ORDER BY factoryid,mpurpose,mname,minvid ASC";
		$result = $this->db->query($query);
		return $result->result_array();
	}
	public function purpose_wise_sell_insert_machine_inventory($mpid, $cfactoryid)
	{
		$query = "SELECT factoryname,pfactoryid,cfactoryid,
		mpurpose,(machine_purpose.mpid) AS mpid,(machine_name.mcode) AS mcode,
		(machine_type.mtid) AS mtid,
		minvid,rminvid,macode,mname,minfo,model,(model_name.monid) AS monid,mtype,brandname,(brand_insert.brandid) AS brandid,
		supplier,(supplier_insert.supplierid) AS supplierid,
		price,miqty,
		pdate,warranty,description,mistatus,rentdays,rentdate

		FROM machine_inventory
		JOIN model_name ON model_name.monid=machine_inventory.monid
		JOIN machine_type ON machine_type.mtid=machine_inventory.mtid
		JOIN factory ON factory.factoryid=machine_inventory.pfactoryid
		JOIN supplier_insert ON supplier_insert.supplierid=machine_inventory.supplierid
		JOIN brand_insert ON brand_insert.brandid=machine_inventory.brandid
		JOIN machine_name ON machine_name.mcode=model_name.mcode
		JOIN machine_purpose ON machine_purpose.mpid=machine_name.mpid 
		WHERE machine_name.mpid='$mpid' AND pfactoryid='$cfactoryid' AND mistatus IN('0')
		ORDER BY factoryid,mpurpose,mname,minvid ASC";
		$result = $this->db->query($query);
		return $result->result_array();
	}
	public function multiple_machine_disposal_insert($data)
	{
		date_default_timezone_set('Asia/Dhaka');

		$data['adate'] = date("Y-m-d", strtotime($data['adate']));
		$data['smonth'] = date('F', strtotime($data['adate']));
		$data['syear'] = date('Y', strtotime($data['adate']));

		$d = date('Y-m-d');
		$t = date("H:i:s");
		$d1 = str_replace("-", "", $d);
		$t1 = str_replace(":", "", $t);
		$ccid = $d1 . $t1;
		$data['ccid'] = $ccid . $data['i'];

		$sql = "UPDATE machine_inventory SET mistatus='6' WHERE macode='$data[macode]'";

		$sql1 = "INSERT INTO machine_disposal_insert VALUES ('$data[ccid]','$data[minvid]','$data[macode]', '$data[cfactoryid]','$data[adate]','$data[remarks]','1','$data[smonth]','$data[syear]','$data[rminvid]')";

		$query = $this->db->query($sql);
		return $query1 = $this->db->query($sql1);
	}
	public function multiple_machine_sell_insert($data)
	{
		date_default_timezone_set('Asia/Dhaka');

		$data['adate'] = date("Y-m-d", strtotime($data['adate']));
		$data['smonth'] = date('F', strtotime($data['adate']));
		$data['syear'] = date('Y', strtotime($data['adate']));

		$d = date('Y-m-d');
		$t = date("H:i:s");
		$d1 = str_replace("-", "", $d);
		$t1 = str_replace(":", "", $t);
		$ccid = $d1 . $t1;
		$data['ccid'] = $ccid . $data['j'];

		$sql1a = "SELECT MAX(midnum) AS midnum FROM machine_asset_code WHERE mafid='$data[sfactoryid]' AND mcode='$data[mcode]' AND mtid='$data[mtid]' ";

		$query1a = $this->db->query($sql1a);
		$result1a = $query1a->result_array();
		foreach ($result1a as $row) {
			$midnumm = $row['midnum'];
			$data['midnum'] = $midnumm + 1;
			$data['macode'] = $data['sfactoryid'] . '-' . $data['mpid'] . '-' . $data['mcode'] . '-' . $data['mtid'] . '-' . $data['midnum'];

			$ccid = $ccid + $data['j'];

			$sqlu = "UPDATE machine_inventory SET mistatus='7' WHERE minvid='$data[minvid]'";

			$sqla = "INSERT INTO machine_asset_code VALUES ('$ccid','$data[macode]','$data[sfactoryid]','$data[mcode]','$data[mtid]','$data[midnum]','$data[rminvid]')";

			$sqlr = "INSERT INTO machine_root_asset_code VALUES ('$ccid')";

			$sql = "INSERT INTO machine_inventory VALUES ('$ccid','$data[sfactoryid]','$data[sfactoryid]','$data[macode]','$data[mtid]','$data[monid]','$data[brandid]','$data[supplierid]','1','$data[adate]','$data[price]','$data[warranty]','$data[description]','0','0000-00-00','0','$data[rminvid]')";

			$sqls = "INSERT INTO machine_sell_insert VALUES ('$ccid','$data[minvid]','$data[macode]','$data[sfactoryid]','$data[adate]','$data[smonth]','$data[syear]','1','$data[rminvid]')";



			$queru = $this->db->query($sqlu);
			$querya = $this->db->query($sqla);
			$queryr = $this->db->query($sqlr);
			$query = $this->db->query($sql);
			$querys = $this->db->query($sqls);
		}
		return $query;
	}
	public function factory_wise_machine_running_line_list($factoryid)
	{
		$query = "SELECT afactoryid,
		mpurpose,(machine_name.mcode) AS mcode,
		machine_allocate_to_line.minvid,machine_purpose.mpid,machine_type.mtid,
		mname,model,mtype,sewing_line_insert.slnid,slname,sfname,COUNT(machine_name.mcode) AS nmcode
		
		FROM machine_inventory
		JOIN model_name ON model_name.monid=machine_inventory.monid
		JOIN machine_type ON machine_type.mtid=machine_inventory.mtid
		
		JOIN supplier_insert ON supplier_insert.supplierid=machine_inventory.supplierid
		JOIN brand_insert ON brand_insert.brandid=machine_inventory.brandid
		JOIN machine_name ON machine_name.mcode=model_name.mcode
		JOIN machine_purpose ON machine_purpose.mpid=machine_name.mpid
		JOIN machine_allocate_to_line ON machine_allocate_to_line.minvid= machine_inventory.minvid
		JOIN sewing_line_insert ON sewing_line_insert.slnid= machine_allocate_to_line.slnid
		JOIN sewing_floor_insert ON sewing_floor_insert.sfnid= sewing_line_insert.sfnid
		WHERE machine_allocate_to_line.matlstatus = '1' AND afactoryid='$factoryid'
		
		GROUP BY afactoryid,machine_purpose.mpid,machine_type.mtid,mcode";
		$result = $this->db->query($query);
		return $result->result_array();
	}
	public function machine_running_line_list()
	{
		$query = "SELECT afactoryid,
		mpurpose,(machine_name.mcode) AS mcode,
		machine_allocate_to_line.minvid,machine_purpose.mpid,machine_type.mtid,
		mname,model,mtype,sewing_line_insert.slnid,slname,sfname,COUNT(machine_name.mcode) AS nmcode
		
		

		FROM machine_inventory
		JOIN model_name ON model_name.monid=machine_inventory.monid
		JOIN machine_type ON machine_type.mtid=machine_inventory.mtid
		
		JOIN supplier_insert ON supplier_insert.supplierid=machine_inventory.supplierid
		JOIN brand_insert ON brand_insert.brandid=machine_inventory.brandid
		JOIN machine_name ON machine_name.mcode=model_name.mcode
		JOIN machine_purpose ON machine_purpose.mpid=machine_name.mpid
		JOIN machine_allocate_to_line ON machine_allocate_to_line.minvid= machine_inventory.minvid
		JOIN sewing_line_insert ON sewing_line_insert.slnid= machine_allocate_to_line.slnid
		JOIN sewing_floor_insert ON sewing_floor_insert.sfnid= sewing_line_insert.sfnid
		WHERE machine_allocate_to_line.matlstatus = '1'
		
		GROUP BY afactoryid,machine_purpose.mpid,machine_type.mtid,mcode";
		$result = $this->db->query($query);
		return $result->result_array();
	}
	public function factory_wise_machine_status($factoryid)
	{
		// $query = "SELECT purchase_factory_status_view.factoryname,
		// purchase_factory_status_view.pfactoryid,
		// purchase_factory_status_view.mpurpose,
		// purchase_factory_status_view.mname,purchase_factory_status_view.mtype,
		// purchase_factory_status_view.mcode,purchase_factory_status_view.mtid,purchase_factory_status_view.mpid,
		// purchase_factory_status_view.totalpurchasemachine,
		// purchase_factory_status_view.totalfreemachine,purchase_factory_status_view.totalmachineinline,
		// purchase_factory_status_view.totalmachineinrepair,
		// purchase_factory_status_view.totalmachinetransfer,rent_factory_status_view.totalmachinerent
		// FROM purchase_factory_status_view
		// LEFT JOIN rent_factory_status_view ON rent_factory_status_view.mtid=purchase_factory_status_view.mtid
		// AND rent_factory_status_view.mcode=purchase_factory_status_view.mcode
		// AND rent_factory_status_view.mpid=purchase_factory_status_view.mpid
		// AND rent_factory_status_view.pfactoryid=purchase_factory_status_view.pfactoryid
		// WHERE purchase_factory_status_view.pfactoryid='$factoryid'";
		// $result = $this->db->query($query);
		// return $result->result_array();


		// $query = "SELECT purchase_factory_status_view.pfactoryid,
		// 		purchase_factory_status_view.mname,
		// 		rent_factory_status_view.cfactoryid,
		// 		purchase_factory_status_view.mpurpose,
		// 		purchase_factory_status_view.mtype,
		// 		purchase_factory_status_view.mcode,
		// 		purchase_factory_status_view.mtid,
		// 		purchase_factory_status_view.mpid,
		// 		totalpurchasemachine,totalfreemachine,totalfreemachiner,
		// 		totalmachineinrepair,totalmachineinrepairr,
		// 		totalmachinetransfer, totalmachineinline, totalmachineinliner,
		// 		totalmachinerent 
		// 		FROM purchase_factory_status_view

		// 		LEFT JOIN rent_factory_status_view 
		// 		ON rent_factory_status_view.mpid=purchase_factory_status_view.mpid
		// 		AND rent_factory_status_view.mcode=purchase_factory_status_view.mcode
		// 		AND rent_factory_status_view.mtid=purchase_factory_status_view.mtid
		// 		AND rent_factory_status_view.cfactoryid=purchase_factory_status_view.pfactoryid

		// 		WHERE purchase_factory_status_view.factoryid='$factoryid'
		// 		GROUP BY purchase_factory_status_view.mpid,purchase_factory_status_view.mcode,
		// 		purchase_factory_status_view.mtid,purchase_factory_status_view.pfactoryid";
		// 		$result = $this->db->query($query);
		// 		return $result->result_array();



		$query = "SELECT * FROM machine_inhouse_view
					WHERE  factoryid='$factoryid'
					GROUP BY factoryid, 
					mpurpose,mname,
					mtype,
					mcode,
					mtid,
					mpid ";
		$result = $this->db->query($query);
		return $result->result_array();
	}
	public function machine_status()
	{
		// $query = "SELECT purchase_factory_status_view.factoryname,
		// purchase_factory_status_view.pfactoryid,
		// purchase_factory_status_view.mpurpose,
		// purchase_factory_status_view.mname,purchase_factory_status_view.mtype,
		// purchase_factory_status_view.mcode,purchase_factory_status_view.mtid,purchase_factory_status_view.mpid,
		// purchase_factory_status_view.totalpurchasemachine,
		// purchase_factory_status_view.totalfreemachine,purchase_factory_status_view.totalmachineinline,
		// purchase_factory_status_view.totalmachineinrepair,
		// purchase_factory_status_view.totalmachinetransfer,rent_factory_status_view.totalmachinerent
		// FROM purchase_factory_status_view
		// LEFT JOIN rent_factory_status_view ON rent_factory_status_view.mtid=purchase_factory_status_view.mtid
		// AND rent_factory_status_view.mcode=purchase_factory_status_view.mcode
		// AND rent_factory_status_view.mpid=purchase_factory_status_view.mpid
		// AND rent_factory_status_view.pfactoryid=purchase_factory_status_view.pfactoryid
		// WHERE purchase_factory_status_view.pfactoryid='$factoryid'";
		// $result = $this->db->query($query);
		// return $result->result_array();


		// $query = "SELECT purchase_factory_status_view.pfactoryid,
		// 		purchase_factory_status_view.mname,
		// 		rent_factory_status_view.cfactoryid,
		// 		purchase_factory_status_view.mpurpose,
		// 		purchase_factory_status_view.mtype,
		// 		purchase_factory_status_view.mcode,
		// 		purchase_factory_status_view.mtid,
		// 		purchase_factory_status_view.mpid,
		// 		totalpurchasemachine,totalfreemachine,totalfreemachiner,
		// 		totalmachineinrepair,totalmachineinrepairr,
		// 		totalmachinetransfer, totalmachineinline, totalmachineinliner,
		// 		totalmachinerent 
		// 		FROM purchase_factory_status_view

		// 		LEFT JOIN rent_factory_status_view 
		// 		ON rent_factory_status_view.mpid=purchase_factory_status_view.mpid
		// 		AND rent_factory_status_view.mcode=purchase_factory_status_view.mcode
		// 		AND rent_factory_status_view.mtid=purchase_factory_status_view.mtid
		// 		AND rent_factory_status_view.cfactoryid=purchase_factory_status_view.pfactoryid

		// 		WHERE purchase_factory_status_view.factoryid='$factoryid'
		// 		GROUP BY purchase_factory_status_view.mpid,purchase_factory_status_view.mcode,
		// 		purchase_factory_status_view.mtid,purchase_factory_status_view.pfactoryid";
		// 		$result = $this->db->query($query);
		// 		return $result->result_array();



		$query = "SELECT * FROM machine_inhouse_view
					
					GROUP BY factoryid, 
					mpurpose,mname,
					mtype,
					mcode,
					mtid,
					mpid ";
		$result = $this->db->query($query);
		return $result->result_array();
	}
}
