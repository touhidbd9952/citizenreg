<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register_management extends CI_Controller {

	public function __construct()
	{
        parent::__construct();
 
    }
	public function index()
	{
		$data = array();
		$data['menu'] = 'registerview';
		$data['per_page'] = 50;
		$limit_start = 0;
		$limit_end = 0;
        if (isset($_GET['page'])&&!empty($_GET['page']) ) 
		{
            $data['start'] = ($_GET['page'] - 1) * $data['per_page'] + 1;  //$data['start'] = ($_GET['page'] - 1) * $data['per_page'] + 1; 
			$limit_start = $data['start']-1; 
        } 
		else 
		{
            $data['start'] = 1;
			$limit_start = 0;
        }
		if (isset($_GET['page'])&&!empty($_GET['page']) ) 
		{
        	$data['end'] = $data['start'] + $data['per_page'];
			$limit_end = $data['per_page']; 
		}
		else
		{
			$data['end'] = $data['start'] + $data['per_page'];
			$limit_end = $data['per_page']; 
		}
		$data['functionname'] = "register_management/index";
		$data['model'] = $this->db->query("Select * from t_register where complete=1  LIMIT $limit_start , $limit_end ")->result(); 
		$data['memberlist'] = $this->db->query("Select * from t_register ")->result(); 
		$data['content'] = $this->load->view('register/view_register_info',$data,true);
		$data['container'] = $this->load->view('register/register_page',$data,true);
		$this->load->view('masteradmin',$data);
	}
	public function searchregister()
	{
		$searchby = $this->input->post('searchby');
		$searchword = trim($this->input->post('searchword'));
		$data = array();
		$data['menu'] = 'registerview';
		$data['per_page'] = 50;
		$limit_start = 0;
		$limit_end = 0;
		if (isset($_GET['page'])&&!empty($_GET['page']) ) 
		{
			$data['start'] = ($_GET['page'] - 1) * $data['per_page'] + 1;  //$data['start'] = ($_GET['page'] - 1) * $data['per_page'] + 1; 
			$limit_start = $data['start']-1; 
		} 
		else 
		{
			$data['start'] = 1;
			$limit_start = 0;
		}
		if (isset($_GET['page'])&&!empty($_GET['page']) ) 
		{
			$data['end'] = $data['start'] + $data['per_page'];
			$limit_end = $data['per_page']; 
		}
		else
		{
			$data['end'] = $data['start'] + $data['per_page'];
			$limit_end = $data['per_page']; 
		}
		if($searchby !="" && $searchword !="")
		{
			$searchword = trim(strtolower($searchword));
			if($searchby=='firstname')
			{ 
				$data['model'] = $this->db->query("Select * from t_register where complete=1 and LOWER(name_en_FirstName) like'".$searchword."%'  ")->result();  //echo 'paisi-1';print_r($data['model']);exit;
			}
			else if($searchby=='lastname')
			{ 
				$data['model'] = $this->db->query("Select * from t_register where complete=1 and  LOWER(name_en_LastName) like'".$searchword."%'  ")->result(); //echo 'paisi-2';print_r($data['model']);exit;
			}
			else if($searchby=='email')
			{
				$data['model'] = $this->db->query("Select * from t_register where complete=1 and  LOWER(email) like'".$searchword."%'  ")->result(); //echo 'paisi-3';print_r($data['model']);exit;
			}
			else if($searchby=='phone')
			{
				$data['model'] = $this->db->query("Select * from t_register where complete=1 and  address_in_japan_phone like'".$searchword."%'  ")->result(); //echo 'paisi-4';print_r($data['model']);exit;
				if(count($data['model'])<1)
				{
					$data['model'] = $this->db->query("Select * from t_register where complete=1 and  address_in_japan_mobile like'".$searchword."%'  ")->result(); //echo 'paisi-5';print_r($data['model']);exit;
				}
				else if(count($data['model'])<1)
				{
					$data['model'] = $this->db->query("Select * from t_register where complete=1 and  address_in_bangladesh_phone like'".$searchword."%'  ")->result(); //echo 'paisi-6';print_r($data['model']);exit;
				}
				else if(count($data['model'])<1)
				{
					$data['model'] = $this->db->query("Select * from t_register where complete=1 and  address_in_bangladesh_mobile like'".$searchword."%'  ")->result(); //echo 'paisi-7';print_r($data['model']);exit;
				}
			}
		}
		else
		{
			$data['model'] = $this->db->query("Select * from t_register where complete=1  LIMIT $limit_start , $limit_end ")->result();  
		} 
		
		$data['functionname'] = "register_management/index";
		$data['memberlist'] = $this->db->query("Select * from t_register ")->result(); 
		$data['content'] = $this->load->view('register/view_register_info',$data,true);
		$data['container'] = $this->load->view('register/register_page',$data,true);
		$this->load->view('masteradmin',$data);
	}
	
	public function view_info()
	{
		$data = array();
		$data['menu'] = 'register';
		$data['per_page'] = 50;
		$limit_start = 0;
		$limit_end = 0;
        if (isset($_GET['page'])&&!empty($_GET['page']) ) 
		{
            $data['start'] = ($_GET['page'] - 1) * $data['per_page'] + 1;  //$data['start'] = ($_GET['page'] - 1) * $data['per_page'] + 1; 
			$limit_start = $data['start']-1; 
        } 
		else 
		{
            $data['start'] = 1;
			$limit_start = 0;
        }
		if (isset($_GET['page'])&&!empty($_GET['page']) ) 
		{
        	$data['end'] = $data['start'] + $data['per_page'];
			$limit_end = $data['per_page']; 
		}
		else
		{
			$data['end'] = $data['start'] + $data['per_page'];
			$limit_end = $data['per_page']; 
		}
		$data['functionname'] = "register_management/view_info";
		$data['model'] = $this->db->query("Select * from t_register where complete=1  LIMIT $limit_start , $limit_end ")->result(); 
		$data['memberlist'] = $this->db->query("Select * from t_register ")->result();
		
		$data['content'] = $this->load->view('register/view_register_info',$data,true);
		$data['container'] = $this->load->view('register/register_page',$data,true);
		$this->load->view('masteradmin',$data);
	}
	public function view_details($id)
	{
		$dataupd = array();
		$dataupd['readstatus'] = 1;
		$this->mm->update_info('t_register',$dataupd,array("id" =>$id));
		$data = array();
		$data['model'] = $this->db->query("Select * from t_register where complete=1 and id='".$id."' ")->result();  
		$data['content'] = $this->load->view('register/citizen_registration_view_details',$data,true);
		$data['container'] = $this->load->view('register/register_page',$data,true);
		$this->load->view('masteradmin',$data);
	}
	
	public function edit_data()
	{
		$id = array("id" => $this->uri->segment(3));
		
		$data = array();
		$data['model'] = $this->mm->get_all_info_by_id('t_register',$id);
		
		$data['content'] = $this->load->view('register/register_form_edit',$data,true);
		$data['container'] = $this->load->view('register/register_page',$data,true);
		$this->load->view('masteradmin',$data);
		
	}
	public function update_register()
	{
		if(!$_POST){redirect("admincontroller");}
		else
		{ 
			$id = $this->input->post("id");
			$data = array();
			
			$data["name_bn_FirstName"] = trim($this->input->post("name_bn_FirstName"));
			$data["name_bn_LastName"] = trim($this->input->post("name_bn_LastName"));
			$data["name_bn_NickName"] = trim($this->input->post("name_bn_NickName"));
			$data["name_jp_FirstName"] = trim($this->input->post("name_jp_FirstName"));
			$data["name_jp_LastName"] = trim($this->input->post("name_jp_LastName"));
			$data["name_jp_NickName"] = trim($this->input->post("name_jp_NickName"));
			
			
			$data["gender"] = $this->input->post("gender");
			$data["birthYear"] = $this->input->post("birthYear");
			$data["birthMonth"] = $this->input->post("birthMonth");
			$data["birthDay"] = $this->input->post("birthDay"); 
			$data["marital_status"] = $this->input->post("marital_status");
			$data["marital_status_others_info"] = trim($this->input->post("marital_status_others_info"));
			
			
			$data["name_en_Spouse_FirstName"] = trim($this->input->post("name_en_Spouse_FirstName"));
			$data["name_en_Spouse_LastName"] = trim($this->input->post("name_en_Spouse_LastName"));
			$data["name_en_Spouse_NickName"] = trim($this->input->post("name_en_Spouse_NickName"));
			$data["name_bn_Spouse_FirstName"] = trim($this->input->post("name_bn_Spouse_FirstName"));
			$data["name_bn_Spouse_LastName"] = trim($this->input->post("name_bn_Spouse_LastName"));
			$data["name_bn_Spouse_NickName"] = trim($this->input->post("name_bn_Spouse_NickName"));
			$data["name_jp_Spouse_FirstName"] = trim($this->input->post("name_jp_Spouse_FirstName"));
			$data["name_jp_Spouse_LastName"] = trim($this->input->post("name_jp_Spouse_LastName"));
			$data["name_jp_Spouse_NickName"] = trim($this->input->post("name_jp_Spouse_NickName"));
			
			$data["occupation"] = trim($this->input->post("occupation"));
			$data["name_of_organization"] = trim($this->input->post("name_of_organization")); 
			$data["position"] = trim($this->input->post("position"));  
			
			$data["jpEntryYear"] = $this->input->post("jpEntryYear");
			$data["jpEntryMonth"] = $this->input->post("jpEntryMonth");
			$data["jpEntryDay"] = $this->input->post("jpEntryDay");
			
			$data["jpzipcode"] = trim($this->input->post("jpzipcode"));
			$data["jpdivisiondistrict"] = trim($this->input->post("jpdivisiondistrict"));
			$data["jpcity"] = trim($this->input->post("jpcity"));
			$data["jpbuilding"] = trim($this->input->post("jpbuilding"));
			
			$data["address_in_japan_phone"] = trim($this->input->post("address_in_japan_phone"));
			$data["address_in_japan_mobile"] = trim($this->input->post("address_in_japan_mobile"));
			$data["email"] = trim($this->input->post("email"));
			
			//bangladesh
			$data["bd_division_id"] = trim($this->input->post("bddivision"));
			$data["bd_district_id"] = trim($this->input->post("bddristrict"));
			$data["bd_upazilla_id"] = trim($this->input->post("bdupazila"));
			$data["bd_union_id"] = trim($this->input->post("bdunion"));
			$data["address_in_bangladesh"] = trim($this->input->post("address_in_bangladesh"));
			$data["address_in_bangladesh_phone"] = trim($this->input->post("address_in_bangladesh_phone"));
			$data["address_in_bangladesh_mobile"] = trim($this->input->post("address_in_bangladesh_mobile"));
			
			//place_of_origin_in_greater_khulna
			$data["place_of_origin_division"] = $this->input->post("division");
			$data["place_of_origin_district"] = $this->input->post("dristrict");
			$data["place_of_origin_upazila"] = $this->input->post("upazila");
			$data["place_of_origin_union"] = $this->input->post("union");
			
			$data["emergency_contact_name"] = trim($this->input->post("emergency_contact_name"));
			$data["emergency_contact_person_relationship"] = trim($this->input->post("emergency_contact_person_relationship"));
			$data["emergency_contact_phone"] = trim($this->input->post("emergency_contact_phone"));
			$data["emergency_contact_mobile"] = trim($this->input->post("emergency_contact_mobile"));
			
			$data["visa_status"] = $this->input->post("visa_status");
			$data["visa_status_others_info"] = trim($this->input->post("visa_status_others_info"));
			$data["update_at"] = date("Y-m-d H:i:s"); 
			
			if($this->mm->update_info('t_register',$data,array("id" =>$id)))
			{
				$p = pathinfo($_FILES['pic']['name']); 
				if(count($p)>2)
				{
					$picname = $this->db->query("select pic from t_register where id='".$id."'")->row()->pic;
					$oldfile = './img/register/'.$picname;
					if(file_exists($oldfile))
					{
						unlink($oldfile);
					}
					$imgfilename = $picname;
					$this->mm->image_upload('./img/register/' , '70000000', '10000', '7000', $imgfilename ,'300','400','pic');
				}
				redirect("register_management/view_info?sk=Update successfully");
			}
			else
			{
				redirect("register_management/view_info?esk=error!!!, not updated");
			}
		}
	}
	public function change_status($id)
	{
		$status =0;
		$previousdata = $this->db->query("select status from t_register where id='".$id."'")->result(); 
		if(count($previousdata)>0){$status =$previousdata[0]->status;}
		$data = array();
		if($status ==1)
		{
			$data['status'] = 0;
		}
		else
		{
			$data['status'] = 1;
		}
		
		if($this->mm->update_info('t_register',$data, array("id" =>$id)))
		{ 
			$msg = "Status Changed";
			redirect(base_url()."register_management/view_info?sk=".$msg , "refresh");
		}
		else
		{
			$emsg = "Database too busy, try later";
			redirect(base_url()."register_management/view_info?esk=".$emsg , "refresh");
		}	
	}
	public function select_home_banner()
	{
		$id = $this->input->post("mainpicno"); 
		if($id != "")
		{
			$data = array();
			$data["main_pic"] = "";
			$this->db->update('t_register',$data);
			
			$udata = array();
			$udata["main_pic"]=$id; 
			$this->mm->update_info('t_register',$udata,array("id" =>$id));
			$updateresult = $this->mm->update_info('t_register',$udata,array("id" =>$id));
			$msg = "Updated";
			redirect(base_url()."register_management/view_info?ssk=".$msg , "refresh");
		}
		else
		{
			redirect(base_url()."register_management/view_info", "refresh");
		}
	}
	
	public function exportCSV()
	{ 
	   //$data[] = array('f_name'=> "Nishit", 'l_name'=> "patel", 'mobile'=> "999999999", 'gender'=> "male");
	   	$data = $this->db->query("select * from t_register")->result(); 
        header("Content-type: application/csv");
        header("Content-Disposition: attachment; filename=\"bdembreg".".csv\"");
        header("Pragma: no-cache");
        header("Expires: 0");

        $handle = fopen('php://output', 'w');
		//Header
        fputcsv($handle, array("FirstName en","LastName en","FirstName jp", "LastName jp","Gender", "Marital status","Marital status others info","BirthYear","BirthMonth"	,"BirthDay"	,"Passport_No","Passport Validaty Year","Passport Validaty Month"	,"Passport Validaty Day","JP Entry Year","JP Entry Month"	,"JP Entry Day","JP zip code","JP division district","JP city"	,"Jp building","Jp phone","jp mobile"	,"Bangladesh address","Bangladesh phone"	,"Bangladesh mobile"	,"Email","Emergency contact name","Emergency contact person relationship","Emergency contact phone","Emergency contact mobile"	,"Visa status","Visa status others info","registration_time"));
        $cnt=1;
		//data
        foreach ($data as $d) {
            $narray = 
						array(
								$d->name_en_FirstName,$d->name_en_LastName,$d->name_jp_FirstName,$d->name_jp_LastName,$d->gender,$d->marital_status,$d->marital_status_others_info,$d->birthYear,$d->birthMonth,$d->birthDay,$d->passport_no,$d->passportValidatyYear,$d->passportValidatyMonth,$d->passportValidatyDay,$d->jpEntryYear,$d->jpEntryMonth,$d->jpEntryDay,$d->jpzipcode,$d->jpdivisiondistrict,$d->jpcity,$d->jpbuilding,$d->address_in_japan_phone,$d->address_in_japan_mobile,$d->address_in_bangladesh,$d->address_in_bangladesh_phone,$d->address_in_bangladesh_mobile,$d->email,$d->emergency_contact_name,$d->emergency_contact_person_relationship,$d->emergency_contact_phone,$d->emergency_contact_mobile,$d->visa_status,$d->visa_status_others_info,$d->registration_time
							 );
            fputcsv($handle, $narray);
			//$cnt++;
        }
            fclose($handle);
        exit;
   }
	
	
	
}
