<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		date_default_timezone_set("Asia/Tokyo");
		//date_default_timezone_set("Asia/Dhaka");
		$this->load->helper(array('cookie', 'url')); 
		
	}
	public function index()
	{
		$data = array();
		$data['content'] = $this->load->view('citizen_registration','',true);
		$this->load->view('master',$data);
	}
	public function citizen_registration()
	{
		if(!$_POST){redirect("main");}
		else
		{
			$data = array();
			$data["name_en_FirstName"] = trim($this->input->post("name_en_FirstName"));
			$data["name_en_LastName"] = trim($this->input->post("name_en_LastName"));
			$data["name_jp_FirstName"] = trim($this->input->post("name_jp_FirstName"));
			$data["name_jp_LastName"] = trim($this->input->post("name_jp_LastName"));
			$data["gender"] = $this->input->post("gender");
			$data["marital_status"] = $this->input->post("marital_status");
			$data["marital_status_others_info"] = trim($this->input->post("marital_status_others_info"));
			
			$data["birthYear"] = $this->input->post("birthYear");
			$data["birthMonth"] = $this->input->post("birthMonth");
			$data["birthDay"] = $this->input->post("birthDay"); 
			
			$data["passport_no"] = trim($this->input->post("passport_no")); 
			
			$data["passportValidatyYear"] = $this->input->post("passportValidatyYear");
			$data["passportValidatyMonth"] = $this->input->post("passportValidatyMonth");
			$data["passportValidatyDay"] = $this->input->post("passportValidatyDay");
			   
			 
			$data["jpEntryYear"] = $this->input->post("jpEntryYear");
			$data["jpEntryMonth"] = $this->input->post("jpEntryMonth");
			$data["jpEntryDay"] = $this->input->post("jpEntryDay");
			   
			
			//$data["address_in_japan"] = trim($this->input->post("address_in_japan"));
			//jpzipcode jpdivisiondistrict jpcity jpbuilding
			$data["jpzipcode"] = trim($this->input->post("jpzipcode"));
			$data["jpdivisiondistrict"] = trim($this->input->post("jpdivisiondistrict"));
			$data["jpcity"] = trim($this->input->post("jpcity"));
			$data["jpbuilding"] = trim($this->input->post("jpbuilding"));
			
			$data["address_in_japan_phone"] = trim($this->input->post("address_in_japan_phone"));
			$data["address_in_japan_mobile"] = trim($this->input->post("address_in_japan_mobile"));
			
			$data["address_in_bangladesh"] = trim($this->input->post("address_in_bangladesh"));
			$data["address_in_bangladesh_phone"] = trim($this->input->post("address_in_bangladesh_phone"));
			$data["address_in_bangladesh_mobile"] = trim($this->input->post("address_in_bangladesh_mobile"));
			
			$data["email"] = trim($this->input->post("email"));
			
			$data["emergency_contact_name"] = trim($this->input->post("emergency_contact_name"));
			$data["emergency_contact_person_relationship"] = trim($this->input->post("emergency_contact_person_relationship"));
			$data["emergency_contact_phone"] = trim($this->input->post("emergency_contact_phone"));
			$data["emergency_contact_mobile"] = trim($this->input->post("emergency_contact_mobile"));
			
			$data["visa_status"] = $this->input->post("visa_status");
			$data["visa_status_others_info"] = trim($this->input->post("visa_status_others_info"));
			$data["complete"] = 0;
			$data["registration_time"] = date("Y-m-d H:i:s");
			
			$insertedid = $this->mm->Insert_data_getid('t_register',$data); 
			
			$p = pathinfo($_FILES['pic']['name']);  
			if(count($p)>2)
			{
				$imgfilename = $insertedid.'.jpg';
				$oldfile = './img/register/'.$imgfilename;
				if(file_exists($oldfile))
				{
					unlink($oldfile);
				}
				$this->mm->image_upload('./img/register/' , '70000000', '10000', '7000', $imgfilename ,'300','400','pic');
				
				$data = array();
				$data['pic']= $insertedid.".jpg";
				$this->mm->update_info('t_register',$data,array("id"=>$insertedid));
				redirect("citizen_registration_view/".$insertedid, 'refresh');
			}
			
			redirect("citizen_registration_view/".$insertedid, 'refresh');
		}
	}
	public function citizen_registration_view($id)
	{
		$data = array();
		$data['previoususerdata'] = $this->db->query("select * from t_register where id='".$id."'")->result();
		$data['content'] = $this->load->view('citizen_registration_view',$data,true);
		$this->load->view('master',$data);
	}
	public function citizen_registration_edit($id)
	{
		$data = array();
		$data['previoususerdata'] = $this->db->query("select * from t_register where id='".$id."'")->result();
		$data['content'] = $this->load->view('citizen_registration_edit',$data,true);
		$this->load->view('master',$data);
	}
	public function citizen_registration_edit2()
	{
		if(!$_POST){redirect("main");}
		else
		{
			$id = $this->input->post("id");
			$data = array();
			$data["name_en_FirstName"] = trim($this->input->post("name_en_FirstName"));
			$data["name_en_LastName"] = trim($this->input->post("name_en_LastName"));
			$data["name_jp_FirstName"] = trim($this->input->post("name_jp_FirstName"));
			$data["name_jp_LastName"] = trim($this->input->post("name_jp_LastName"));
			$data["gender"] = $this->input->post("gender");
			$data["marital_status"] = $this->input->post("marital_status");
			$data["marital_status_others_info"] = trim($this->input->post("marital_status_others_info"));
			
			$data["birthYear"] = $this->input->post("birthYear");
			$data["birthMonth"] = $this->input->post("birthMonth");
			$data["birthDay"] = $this->input->post("birthDay"); 
			
			$data["passport_no"] = trim($this->input->post("passport_no")); 
			
			$data["passportValidatyYear"] = $this->input->post("passportValidatyYear");
			$data["passportValidatyMonth"] = $this->input->post("passportValidatyMonth");
			$data["passportValidatyDay"] = $this->input->post("passportValidatyDay");
			   
			 
			$data["jpEntryYear"] = $this->input->post("jpEntryYear");
			$data["jpEntryMonth"] = $this->input->post("jpEntryMonth");
			$data["jpEntryDay"] = $this->input->post("jpEntryDay");
			   
			
			//$data["address_in_japan"] = trim($this->input->post("address_in_japan"));
			
			$data["jpzipcode"] = trim($this->input->post("jpzipcode"));
			$data["jpdivisiondistrict"] = trim($this->input->post("jpdivisiondistrict"));
			$data["jpcity"] = trim($this->input->post("jpcity"));
			$data["jpbuilding"] = trim($this->input->post("jpbuilding"));
			
			$data["address_in_japan_phone"] = trim($this->input->post("address_in_japan_phone"));
			$data["address_in_japan_mobile"] = trim($this->input->post("address_in_japan_mobile"));
			
			$data["address_in_bangladesh"] = trim($this->input->post("address_in_bangladesh"));
			$data["address_in_bangladesh_phone"] = trim($this->input->post("address_in_bangladesh_phone"));
			$data["address_in_bangladesh_mobile"] = trim($this->input->post("address_in_bangladesh_mobile"));
			
			$data["email"] = trim($this->input->post("email"));
			
			$data["emergency_contact_name"] = trim($this->input->post("emergency_contact_name"));
			$data["emergency_contact_person_relationship"] = trim($this->input->post("emergency_contact_person_relationship"));
			$data["emergency_contact_phone"] = trim($this->input->post("emergency_contact_phone"));
			$data["emergency_contact_mobile"] = trim($this->input->post("emergency_contact_mobile"));
			
			$data["visa_status"] = $this->input->post("visa_status");
			$data["visa_status_others_info"] = trim($this->input->post("visa_status_others_info"));
			$data["complete"] = 0;
			$data["registration_time"] = date("Y-m-d H:i:s");
			
			if($this->mm->update_info('t_register',$data,array("id"=>$id)))
			{
				$p = pathinfo($_FILES['pic']['name']); 
				if(count($p)>2)
				{
					$imgfilename = $id.'.jpg';
					$oldfile = './img/register/'.$imgfilename;
					if(file_exists($oldfile))
					{
						unlink($oldfile);
					}
					$this->mm->image_upload('./img/register/' , '70000000', '10000', '7000', $imgfilename ,'300','400','pic');
					
					$data = array();
					$data['pic']= $id.".jpg";
					$this->mm->update_info('t_register',$data,array("id"=>$id));
					redirect("citizen_registration_view/".$id, 'refresh');
				}
				redirect("citizen_registration_view/".$id, 'refresh');
			}
			redirect("citizen_registration_view/".$id, 'refresh');
		}
	}
	public function citizen_registration_submit($id)
	{
		$previoususerdata = $this->db->query("select * from t_register where id='".$id."'")->result(); 
		/////////////////////////////////////////////////////////
			$data = array();
			foreach($previoususerdata as $d)	
		
			$data["name_en_FirstName"] = $d->name_en_FirstName;
			$data["name_en_LastName"] = $d->name_en_LastName;
			$data["name_jp_FirstName"] = $d->name_jp_FirstName;
			$data["name_jp_LastName"] = $d->name_jp_LastName;
			$data["gender"] = $d->gender;
			$data["marital_status"] = $d->marital_status;
			$data["marital_status_others_info"] = $d->marital_status_others_info;
			
			$data["birthYear"] = $d->birthYear;
			$data["birthMonth"] = $d->birthMonth<10 ? "0".$d->birthMonth:$d->birthMonth;
			$data["birthDay"] = $d->birthDay<10 ? "0".$d->birthDay:$d->birthDay;  
			
			$data["passport_no"] = $d->passport_no; 
			
			$data["passportValidatyYear"] = $d->passportValidatyYear;
			$data["passportValidatyMonth"] = $d->passportValidatyMonth<10 ? "0".$d->passportValidatyMonth:$d->passportValidatyMonth;
			$data["passportValidatyDay"] = $d->passportValidatyDay<10 ? "0".$d->passportValidatyDay:$d->passportValidatyDay;
			 
			$data["jpEntryYear"] = $d->jpEntryYear;
			$data["jpEntryMonth"] = $d->jpEntryMonth<10 ? "0".$d->jpEntryMonth:$d->jpEntryMonth;
			$data["jpEntryDay"] = $d->jpEntryDay<10 ? "0".$d->jpEntryDay:$d->jpEntryDay; 
			
			//$data["address_in_japan"] = $d->address_in_japan;
			
			$data["jpzipcode"] = $d->jpzipcode;
			$data["jpdivisiondistrict"] = $d->jpdivisiondistrict;
			$data["jpcity"] = $d->jpcity;
			$data["jpbuilding"] = $d->jpbuilding;
			
			$data["address_in_japan_phone"] = $d->address_in_japan_phone;
			$data["address_in_japan_mobile"] = $d->address_in_japan_mobile;
			
			$data["address_in_bangladesh"] = $d->address_in_bangladesh;
			$data["address_in_bangladesh_phone"] = $d->address_in_bangladesh_phone;
			$data["address_in_bangladesh_mobile"] = $d->address_in_bangladesh_mobile;
			
			$data["email"] = $d->email;
			
			$data["emergency_contact_name"] = $d->emergency_contact_name;
			$data["emergency_contact_person_relationship"] = $d->emergency_contact_person_relationship;
			$data["emergency_contact_phone"] = $d->emergency_contact_phone;
			$data["emergency_contact_mobile"] = $d->emergency_contact_mobile;
			
			$data["visa_status"] = $d->visa_status;
			$data["visa_status_others_info"] = $d->visa_status_others_info;
		
			$data["complete"] = 1;
			$data["registration_time"] = $d->registration_time; 
			
			$this->mm->update_info('t_register',$data,array("id"=>$id));
 
			$marital_status = "";
			if($d->marital_status !="Others"){$marital_status = $d->marital_status;}else if($d->marital_status=="Others"){$marital_status = $d->marital_status." - ".$d->marital_status_others_info;}
		$visa_status ="";
			if($d->visa_status !="Others"){ $visa_status = $d->visa_status;}else if($d->visa_status=="Others"){$visa_status = $d->visa_status." - ".$d->visa_status_others_info;}
			
			$baseurl = base_url();
			
			$address_in_japan = "";
			if($data["jpbuilding"] !=""){$address_in_japan .= $data["jpbuilding"].", ";}
			if($data["jpcity"] !=""){$address_in_japan .= $data["jpcity"].", ";}
			if($data["jpdivisiondistrict"]  !=""){$address_in_japan .= $data["jpdivisiondistrict"];}
			if($data["jpzipcode"]  !=""){$address_in_japan .= " ".$data["jpzipcode"];}
			
		$mailmessage = '
<link href="https://fonts.googleapis.com/css?family=M+PLUS+1p" rel="stylesheet">
<style>
.wf-roundedmplus1c { font-family: "M PLUS Rounded 1c"; }
</style>
	
<div class="col-md-5 col-sm-6 col-xs-12 wf-roundedmplus1c" style="float:left;">
<center>
<h2 style="margin-bottom: 5px;">Embassy of Bangaldesh, Tokyo</h2>
<p style="margin:-5px 0 5px 0;font-size:13px;">3-29 Kioicho, Chiyoda-ku, Tokyo 120-0094 <br>
Phone: (03)3234-5801, Fax: (03)3234-5801, </p>
<p style="margin-top:-5px;font-size:13px;">Email: <a href="bdembassy.tokyo@mofa.gov.db"><b style="color:#699D9D;text-decoration:underline;">bdembassy.tokyo@mofa.gov.db</b></a>, Website:bdembjp.mofa.gov.db</p>
<p style="border-bottom:1px solid #006;min-width:200px;max-width:500px;margin-top:-5px;"></p>
<p style="min-width:200px;max-width:450px;padding:5px;border:1px solid #000;font-size:11px">
	The information collected will be used for the internal use of the Embassy and will be strictly maintained confidential.
</p>
</center>

<div style="margin:20px 0 30px 0;">

<h3>Citizen Registration</h3>


Name &nbsp;:&nbsp;'. $d->name_en_FirstName." ".$d->name_en_LastName.'&nbsp;&nbsp;'. $d->name_jp_FirstName." ".$d->name_jp_LastName.'
<br><br>
Gender &nbsp;:&nbsp;'. $d->gender.'
<br><br>
Marital Status &nbsp;:&nbsp;'.$marital_status.'
<br><br>
Date Of Birth &nbsp;:&nbsp; '. $d->birthYear."/".$d->birthMonth."/".$d->birthDay.'
<br><br>
Passport No. &nbsp;:&nbsp; '. $d->passport_no.',&nbsp; &nbsp;Validity &nbsp;:&nbsp; '. $d->passportValidatyYear."/".$d->passportValidatyMonth."/".$d->passportValidatyDay.'
<br><br>
Date of entry into Japan &nbsp;:&nbsp; '. $d->jpEntryYear."/".$d->jpEntryMonth."/".$d->jpEntryDay.' 
<br><br>
Address in Japan &nbsp;:&nbsp; '. $address_in_japan.', &nbsp;&nbsp; Phone &nbsp;:&nbsp; '. $d->address_in_japan_phone.', &nbsp;&nbsp; Mobile &nbsp;:&nbsp; '. $d->address_in_japan_mobile.'
<br><br>
Address in Bangladesh &nbsp;:&nbsp; '. $d->address_in_bangladesh.', &nbsp;&nbsp; Phone &nbsp;:&nbsp; '. $d->address_in_bangladesh_phone.', &nbsp;&nbsp; Mobile &nbsp;:&nbsp;'. $d->address_in_bangladesh_mobile.',
<br><br>
Email &nbsp;:&nbsp; '. $d->email.'
<br><br>
Emergency Contact &nbsp;:&nbsp; '. $d->emergency_contact_name.', &nbsp;&nbsp; Relationship &nbsp;:&nbsp;'. $d->emergency_contact_person_relationship.', &nbsp;&nbsp; Phone &nbsp;:&nbsp;'. $d->emergency_contact_phone.', &nbsp;&nbsp; Mobile &nbsp;:&nbsp;'. $d->emergency_contact_mobile.'
<br><br>
Visa Status &nbsp;:&nbsp; '.$visa_status.'

</div>
';
		

		
		$mail_admin_message = '
<link href="https://fonts.googleapis.com/css?family=M+PLUS+1p" rel="stylesheet">
<style>
.wf-roundedmplus1c { font-family: "M PLUS Rounded 1c"; }
</style>		
<div class="col-md-5 col-sm-6 col-xs-12 wf-roundedmplus1c" style="float:left;">
<center>
<h2 style="margin-bottom: 5px;">Embassy of Bangaldesh, Tokyo</h2>
<p style="margin:-5px 0 5px 0;font-size:13px;">3-29 Kioicho, Chiyoda-ku, Tokyo 120-0094 <br>
Phone: (03)3234-5801, Fax: (03)3234-5801, </p>
<p style="margin-top:-5px;font-size:13px;">Email: <a href="bdembassy.tokyo@mofa.gov.db"><b style="color:#699D9D;text-decoration:underline;">bdembassy.tokyo@mofa.gov.db</b></a>, Website:bdembjp.mofa.gov.db</p>
<p style="border-bottom:1px solid #006;min-width:200px;max-width:500px;margin-top:-5px;"></p>
<p style="min-width:200px;max-width:450px;padding:5px;border:1px solid #000;font-size:11px">
	A new citizen is registered and given below information.
</p>
</center>

<div style="margin:20px 0 30px 0;">

<h3>Citizen Registration</h3>


Name &nbsp;:&nbsp;'. $d->name_en_FirstName." ".$d->name_en_LastName.'&nbsp;&nbsp;'. $d->name_jp_FirstName." ".$d->name_jp_LastName.'
<br><br>
Gender &nbsp;:&nbsp;'. $d->gender.'
<br><br>
Marital Status &nbsp;:&nbsp;'.$marital_status.'
<br><br>
Date Of Birth &nbsp;:&nbsp; '. $d->birthYear."/".$d->birthMonth."/".$d->birthDay.'
<br><br>
Passport No. &nbsp;:&nbsp; '. $d->passport_no.',&nbsp; &nbsp;Validity &nbsp;:&nbsp; '. $d->passportValidatyYear."/".$d->passportValidatyMonth."/".$d->passportValidatyDay.'
<br><br>
Date of entry into Japan &nbsp;:&nbsp; '. $d->jpEntryYear."/".$d->jpEntryMonth."/".$d->jpEntryDay.' 
<br><br>
Address in Japan &nbsp;:&nbsp; '. $address_in_japan.', &nbsp;&nbsp; Phone &nbsp;:&nbsp; '. $d->address_in_japan_phone.', &nbsp;&nbsp; Mobile &nbsp;:&nbsp; '. $d->address_in_japan_mobile.'
<br><br>
Address in Bangladesh &nbsp;:&nbsp; '. $d->address_in_bangladesh.', &nbsp;&nbsp; Phone &nbsp;:&nbsp; '. $d->address_in_bangladesh_phone.', &nbsp;&nbsp; Mobile &nbsp;:&nbsp;'. $d->address_in_bangladesh_mobile.'
<br><br>
Email &nbsp;:&nbsp; '. $d->email.'
<br><br>
Emergency Contact &nbsp;:&nbsp; '. $d->emergency_contact_name.', &nbsp;&nbsp; Relationship &nbsp;:&nbsp;'. $d->emergency_contact_person_relationship.', &nbsp;&nbsp; Phone &nbsp;:&nbsp;'. $d->emergency_contact_phone.', &nbsp;&nbsp; Mobile &nbsp;:&nbsp;'. $d->emergency_contact_mobile.'
<br><br>
Visa Status &nbsp;:&nbsp; '.$visa_status.'


</div>
</div>
';
		
				$mailmessage .= "<br><br><br><br>Best Regards,<br><br>Admin,<br>Embassy of Bangaldesh, Tokyo</div>";
				
				$mailsendvia = "smtp";
				$smtp_host = "rejwanur.com";
				$smtp_port = "65";
				$smtp_user = "abcdefgh";
				$smtp_pass = "123456789";
				
				$from = "bdembassy.tokyo@mofa.gov.db";
				$subject="Citizen Registration";
				
				$admin_email="";
				if($mailsendvia == "smtp")
				{
					$to=$d->email;
					$sendresult1 = $this->mm->send_mail($smtp_host,$smtp_port,$smtp_user,$smtp_pass,$to,$from,$subject,$mailmessage);
					$to=$admin_email;
					$sendresult2 = $this->mm->send_mail($smtp_host,$smtp_port,$smtp_user,$smtp_pass,$to,$from,$subject,$mail_admin_message);
					
					
					if($sendresult1){
						redirect('mail_success_message');
					}
					else{
						/////clint mail//////
						$to=$d->email;
						$headers[] = 'MIME-Version: 1.0';
						$headers[] = 'Content-type: text/html; charset=iso-8859-1';
						$headers[] = 'To:'.$to;
						$headers[] = 'From: <'.$from.'>';
						
						mail($to,$subject,$mailmessage,implode("\r\n", $headers));
						
						/////admin mail//////
						$to=$admin_email;
						$headers[] = 'MIME-Version: 1.0';
						$headers[] = 'Content-type: text/html; charset=iso-8859-1';
						$headers[] = 'To:'.$to;
						$headers[] = 'From: <'.$from.'>';
						mail($to,$subject,$mail_admin_message,$from);
						//redirect('mail_error_message');
						redirect('mail_success_message');
					}
				}
			
		
	}
	public function mail_success_message()
	{
		$data = array();
		$data['content'] = $this->load->view('mail_success_message','',true);
		$this->load->view('master',$data);
	}
	public function mail_error_message()
	{
		$data = array();
		$data['content'] = $this->load->view('mail_error_message','',true);
		$this->load->view('master',$data);
	}
	
	
	
	public function mail_help()
	{
		$data = array();
		$data['content'] = $this->load->view('citizen_registration_mail','',true);
		$this->load->view('master',$data);
	}
	public function help_write_header_csv()//just for help
	{
			$file_name = "./registration/regdb_test.csv";
			$file_read = fopen($file_name, "r");
			$filecontent = fgetcsv($file_read, 0); echo $filecontent[0]." ".$filecontent[1]."-----";print_r($filecontent);
			fclose($file_read);
			if(file_exists($file_name) && is_array($filecontent) && $filecontent[0]=="")
			{
				$file_name = "./registration/regdb_test.csv";
				$file_write = fopen($file_name, 'w');
				$headers = 'name_en_FirstName,name_en_LastName,name_jp_FirstName,name_jp_LastName,gender,marital_status,marital_status_others_info,birth,passport_no,passportValidaty,jpEntry,address_in_japan,address_in_japan_phone,address_in_japan_mobile,address_in_japan_email,address_in_bangladesh,address_in_bangladesh_phone,address_in_bangladesh_mobile,address_in_bangladesh_email,emergency_contact_name, emergency_contact_person_relationship, emergency_contact_phone, emergency_contact_mobile, visa_status, visa_status_others_info';
    			fwrite($file_write,$headers);
				fclose($file_write);
				
			}
 			
	}
	public function get_zipcodeinfo()
	{
		$zipcode = $this->input->post('zipcode');
		if($zipcode !="")
		{
			$zipcodelist = $this->db->query("select * from t_japan_zipcode where zipcode='".$zipcode."'")->result(); 
			echo json_encode($zipcodelist);
		}
	}
	public function error_404()
	{
		$data = array();
		$data['menu']="error_404";
		$data['content'] = $this->load->view('404',$data,true);
		$this->load->view('master',$data);
	}
	
	
	
	
	


}
