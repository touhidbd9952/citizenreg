<?php 
$divisions = $this->db->query("select * from divisions")->result();
$dristricts = $this->db->query("select * from districts")->result();
$upazilas = $this->db->query("select * from upazilas")->result();
$unions = $this->db->query("select * from unions")->result();
$jpzipinfo = $this->db->query("select * from t_japan_zipcode")->result();
?>


<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<link rel="stylesheet" href="css/mystyle.css" />
<script src="js/myjs.js"></script>

<style type="text/css">
#message1{font-size:24px;color:green;}
#message2{font-size:24px;color:red;}
.input-text-style{text-align:right;}
.space{margin-top:10px;}
</style>

<style>
.textalign{text-align:right;}
.input_md{width:49%;float:left;}
.mr{margin-right:10px;}
.mbottom{margin-bottom:0px;padding-bottom:15px;}
.mtop{margin-top:15px;}
.ptop{padding-top:30px;}
.pbottom{padding-bottom:30px;}
.mb5{margin-bottom:5px;}
.btn_width{width:100px !important;float:right;}
.float_left{float:left}
.hideme{display:none;}
.clearboth{clear:both;}
.h87{height:87px;}
.w100p{width:100%;}
.p5{padding:5px;}
.pb10{padding-bottom:10px;}
.borderline{border:1px solid #000}
.color-red{color:#F00;}
.bdcolor{background:#F7F7F7;}
.contentbgcolor{background:#F7F7F7;}
.page-pd{padding-top:60px;padding-bottom:60px;}
.page-title{padding-bottom:10px;font-size:26px;}
#footer{width:100% !important;font-size:15px;padding-top:10px;}
.displaynone_xs{display:block}
.titlemargin{margin: 0 0 50px 0;}
.btn {padding: 0 2px;font-size: 16px;}
.imgsize{border:5px solid #CCCCCC; width:auto;height:200px;margin:-100px 0 20px 0;float:right;}
@media(max-width:767px)
{
	.titlemargin{margin: 0 0 20px 0;}
	.textalign{text-align:left;}
	.ptop{padding-top:0px;}
	.input_sm{width:100%;margin-right:10px;}
	.mbottom{margin-bottom:10px;}
	.h87{height:67px;margin-bottom:5px;}
	.bdcolor{background:#FFF;}
	.contentbgcolor{background:#FFF;}
	.page-pd{padding-top:0px;padding-bottom:30px;}
	.page-title{padding-bottom:0px;font-size:16px;}
	.footer-content{width:100%;font-size:10px;padding-top:10px;}
	.displaynone_xs{display:none}
	.imgsize{border:5px solid #CCCCCC; width:auto;height:200px;margin:0px 0 20px 0;float:right;}
	.pbottom{padding-bottom:0px;}
}
@media(min-width:768px) and (max-width:992px)
{
	.titlemargin{margin: 0 0 20px 0;}
	.textalign{text-align:left;}
	.ptop{padding-top:0px;}
	.bdcolor{background:none;}
}
@media print {
    .no-print {
        display: none;
    }
	.ptop{padding-top:0px;}
	.form-group {margin-bottom: 5px !important;}
	input,select,textarea{border-left:none !important;border-right:none !important;border-top:none !important;font-size:11px !important;}
}
</style>

<script>
$(document).ready(function(e) {
     function readURL(input) 
	{
		//main
		if (input.files && input.files[0]) 
		{
			var reader = new FileReader();
	
			reader.onload = function (e) 
			{
				$('#blah').attr('src', e.target.result);
			}
	
			reader.readAsDataURL(input.files[0]);
		}
	}

	$("#imgInp").change(function(){
		readURL(this); //main
	});
	
	var rdo_marital_status_married = document.getElementById('rdo_marital_status_married');
	if(rdo_marital_status_married.checked)
	{ 
		var spouseinfo = document.getElementById("spouseinfo");
		if(spouseinfo.classList.contains("hideme"))
		{
			spouseinfo.classList.remove("hideme");
		}
	}
	
});
function validation()
{   
	var name = document.getElementById('first_en_Name').value;
	
	document.getElementById('first_en_Name').style.borderColor="black";
	
	var err=0;
	if(name ==""){++err;document.getElementById('name_en_FullName').style.borderColor="red";}
	
	var agreement = document.getElementById("agreement");
	var element = document.getElementById("chkmark_error");
	if(!agreement.checked)
	{
		++err;
		element.classList.remove("hideme"); 
	} 
	else 
	{
		element.classList.add("hideme");
	}
	
	if(err==0)
	{
		return true;
	}return false;
}

/////// rdo_marital_status ///////////////
function show_rdo_marital_status_others_info_1()
{
	var rdo_marital_status_single = document.getElementById('rdo_marital_status_single');
	var rdo_marital_status_married = document.getElementById('rdo_marital_status_married');
	if(rdo_marital_status_single.checked)
	{
		var element = document.getElementById("marital_status_others_info");
  		element.classList.add("hideme");
		var spouseinfo = document.getElementById("spouseinfo");  
  		
		if(!spouseinfo.classList.contains("hideme"))
		{
			spouseinfo.classList.add("hideme");
		}
	}
	else if(rdo_marital_status_married.checked)
	{ 
		var element = document.getElementById("marital_status_others_info");
  		element.classList.add("hideme");
		var spouseinfo = document.getElementById("spouseinfo");
		if(spouseinfo.classList.contains("hideme"))
		{
			spouseinfo.classList.remove("hideme");
		}
	}
}

function show_rdo_marital_status_others_info_2()
{
	var rdo_marital_status_others = document.getElementById('rdo_marital_status_others');
	if(rdo_marital_status_others.checked)
	{
		var element = document.getElementById("marital_status_others_info");
		element.classList.remove("hideme");
		var spouseinfo = document.getElementById("spouseinfo");
		if(!spouseinfo.classList.contains("hideme"))
		{
			spouseinfo.classList.add("hideme");
		}
	}
	
}
function marital_status()
{
	var element = document.getElementById("marital_status_others_info");
  	element.classList.add("hideme");
}

/////// rdo_visa_status ///////////////

function show_rdo_visa_status_others_info_1()
{
	var rdo_visa_status_student = document.getElementById('rdo_visa_status_student');
	var rdo_visa_status_business = document.getElementById('rdo_visa_status_business');
	var rdo_visa_status_work = document.getElementById('rdo_visa_status_work');
	var rdo_visa_status_visit = document.getElementById('rdo_visa_status_visit');
	if(rdo_visa_status_student.checked || rdo_visa_status_business.checked || rdo_visa_status_work.checked || rdo_visa_status_visit.checked)
	{
		var element = document.getElementById("visa_status_others_info");
  		element.classList.add("hideme");
	}
}

function show_rdo_visa_status_others_info_2()
{
	var rdo_visa_status_others = document.getElementById('rdo_visa_status_others');
	if(rdo_visa_status_others.checked)
	{
		var element = document.getElementById("visa_status_others_info");
		element.classList.remove("hideme"); 
	}
	
}
function maritalstatus()
{
	var element = document.getElementById("marital_status_others_info");
  	element.classList.add("hideme");
}
function visastatus()
{
	var element = document.getElementById("visa_status_others_info");
  	element.classList.add("hideme");
}

</script>
<script>
function myFunction() 
{
  window.print();
}
</script>	                            

<h3 class="no-print">Registration Edit <button onclick="myFunction()" style="margin-left:50px;font-size:18px;" title="Print"><i class="fa fa-print"></i></button></h3>

<?php
		if(isset($model)&& !empty($model))
		{
    	foreach($model as $d)
		{
?>	
 <form action="register_management/update_register"  method="post" onSubmit="return validation()" enctype="multipart/form-data" style="padding-bottom:50px;">
            	<input type="hidden" name="id" value="<?php echo $d->id;?>">
            <div class="row bdcolor">
              <div class="form-group displaynone_xs">
              	<div class="col-md-3" id="div1">
                &nbsp;
                </div>
                <div class="col-md-9 mbottoms contentbgcolor">
                	<div class="row">
                        <div class="col-md-12" > 
                        	&nbsp;
                        </div>
                    </div>
                </div>
              </div>
              </div>
              
         
        
            
            <!--======= Photo ==========----->
            <div class="row bdcolor">
              <div class="form-group col-md-9" >
              	<div class="col-md-3 textalign" id="div1">
                
                <label>Photo</label><span style="font-size:10px"> </span>
                </div>
                <div class="col-md-9 mbottoms contentbgcolor">
                	<div class="row">
                        <div class="col-md-12 no-print"> 
                                <input type="file"  class="form-control input_md input_sm mr mbottom" name="pic" id="imgInp" style="border-color:#fff;box-shadow:none;" >
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12"> 
                                <img id="blah" src="<?php if($d->pic !=""){echo 'img/register/'.$d->pic;}else{echo 'img/upload_img1.png';}?>"  class="imgsize">
                        </div>
                    </div>
                     
                </div>
              </div>
              </div>
            
              
            <!--======= Name ==========----->
            <div class="row bdcolor">
              <div class="form-group col-md-9" >
              	<div class="col-md-3 textalign" id="div1"> 
                <label>Name</label><span style="font-size:10px"> (as in Passport)</span>
                </div>
                <div class="col-md-9 mbottoms contentbgcolor">
                	<div class="row">
                        <div class="col-md-12"> 
                        	English <br>
                                <input type="text"  class="form-control input_md input_sm  mbottom col-md-4" name="first_en_Name" id="first_en_Name" value="<?php if($d->first_en_Name!="") echo $d->first_en_Name;?>"  placeholder="First Name" >
                                <input type="text"  class="form-control input_md input_sm  mbottom col-md-4" name="last_en_Name" id="last_en_Name" value="<?php if($d->last_en_Name!="") echo $d->last_en_Name;?>"  placeholder="Last Name" >
                                <input type="text"  class="form-control input_md input_sm col-md-4" name="name_en_NickName" id="name_en_NickName" value="<?php if($d->name_en_NickName!="") echo $d->name_en_NickName;?>" placeholder="Nick Name" >
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12"> 
                            Bangla <br>
                                <input type="text" class="form-control input_md input_sm  mbottom col-md-4" name="name_bn_FirstName" id="name_bn_FirstName" value="<?php if($d->name_bn_FirstName!="") echo $d->name_bn_FirstName;?>"  placeholder="Full Name" >
                                <input type="text" class="form-control input_md input_sm  mbottom col-md-4" name="name_bn_LastName" id="name_bn_LastName" value="<?php if($d->name_bn_LastName!="") echo $d->name_bn_LastName;?>"  placeholder="Last Name" >
                                <input type="text" class="form-control input_md input_sm col-md-4" name="name_bn_NickName" id="name_bn_NickName" value="<?php if($d->name_bn_NickName!="") echo $d->name_bn_NickName;?>" placeholder="Nick Name" >
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12"> 
                        Japanese <br>
                                <input type="text" class="form-control input_md input_sm  mbottom col-md-4" name="name_jp_FirstName" id="name_jp_FirstName" value="<?php if($d->name_jp_FirstName!="") echo $d->name_jp_FirstName;?>" placeholder="First Name In JP" >
                                <input type="text" class="form-control input_md input_sm  mbottom col-md-4" name="name_jp_LastName" id="name_jp_LastName" value="<?php if($d->name_jp_LastName!="") echo $d->name_jp_LastName;?>" placeholder="Last Name In JP" >
                                <input type="text" class="form-control input_md input_sm col-md-4" name="name_jp_NickName" id="name_jp_NickName" value="<?php if($d->name_jp_NickName!="") echo $d->name_jp_NickName;?>" placeholder="Nick Name In JP" >
                        </div>
                    </div>
                </div>
              </div>
              </div>
              
              
              <!--======= Gender ==========-----> 
               <div class="row bdcolor">
              <div class="form-group col-md-9">
              	<div class="col-md-3 ptop textalign"> 
                <label>Gender</label>
                </div>
                <div class="col-md-9 mbottom contentbgcolor ptop">
                	<div class="row">
                        <div class="col-md-12" style="margin-bottom:10px;">
                        	<div class="mr float_left"><input type="radio" name="gender" id="rdo_male" value="Male" <?php if($d->gender=="Male"){echo 'checked';}?>>&nbsp;Male</div>
                            <div class="float_left"><input type="radio" name="gender" id="rdo_female" value="Female" <?php if($d->gender=="Female"){echo 'checked';}?>>&nbsp;Female</div>
                        </div>
                    </div>
                </div>
              </div>
              </div>
              
              <!--======= Date of birth ==========-----> 
               <div class="row bdcolor">
              <div class="form-group col-md-9">
              	<div class="col-md-3  textalign"> 
                <label>Date Of Birth</label>
                </div>
                <div class="col-md-9 mbottom contentbgcolor">
                	<div class="row">
                        <div class="col-md-12">
                        	<div class="mr float_left">
                            <select name="birthYear">
								<?php 
									$c_year=date("Y"); $l_year=$c_year-130; 
									for($c_year;$c_year>=$l_year;$c_year--)
									{
								?>
                                <option value="<?php echo $c_year?>" <?php if($d->birthYear==$c_year){echo 'selected';}?> ><?php echo $c_year;?></option>
                                <?php }?>
                                </select>&nbsp;Year</div>
                                
                            <div class="mr float_left">
                            <select name="birthMonth">
								<?php
									for($i=1;$i<=12;$i++)
									{
								?>
                                <option value="<?php echo $i?>" <?php if($d->birthMonth==$i){echo 'selected';}?>><?php echo $i;?></option>
                                <?php }?>
                                </select>&nbsp;Month</div>
                                
                            <div class="mr float_left">
                            <select name="birthDay">
								<?php
									for($i=1;$i<=31;$i++)
									{
								?>
                                <option value="<?php echo $i?>" <?php if($d->birthDay==$i){echo 'selected';}?> ><?php echo $i;?></option>
                                <?php }?>
                                </select>&nbsp;Day</div>
                        </div>
                    </div>
                </div>
              </div>
              </div>
              
              
               <!--======= Marital Status ==========-----> 
               <div class="row bdcolor">
              <div class="form-group col-md-9">
              	<div class="col-md-3 textalign">
                <label>Marital Status</label>
                </div>  
                <div class="col-md-9 mbottom contentbgcolor">
                	<div class="row">
                        <div class="col-md-12" style="margin-bottom:10px;">
                        	<div class="mr float_left"><input type="radio" name="marital_status" id="rdo_marital_status_single" value="Single" onChange="show_rdo_marital_status_others_info_1()" <?php if($d->marital_status=='Single'){echo 'checked';}?> checked>&nbsp;Single</div>
                            <div class="mr float_left"><input type="radio" name="marital_status" id="rdo_marital_status_married" value="Married" onChange="show_rdo_marital_status_others_info_1()"  <?php if($d->marital_status=='Married'){echo 'checked';}?>>&nbsp;Married</div>
                            <div class="mr float_left"><input type="radio" name="marital_status" id="rdo_marital_status_others" value="Others" onChange="show_rdo_marital_status_others_info_2()" <?php if($d->marital_status=='Others'){echo 'checked';}?>>&nbsp;Others</div>
                            <div class="float_left" id="marital_status_others_info" class="hideme"><input type="text" class="form-control" name="marital_status_others_info" id="maritalstatus_othersinfo" value="<?php if($d->birthDay=='Others' && $d->marital_status_others_info !=""){echo $d->marital_status_others_info;}?>"  placeholder=""></div>
                        </div>
                    </div>
                </div>
              </div>
              </div>
              
              
            
            <!--======= Spouse Name ==========----->
            <div class="row bdcolor hideme" id="spouseinfo">
              <div class="form-group col-md-9" >
              	<div class="col-md-3 textalign" id="div1">
                <label>Spouse Name</label><span style="font-size:10px"></span>
                </div>
                <div class="col-md-9 mbottoms pbottom contentbgcolor">
                	<div class="row">
                        <div class="col-md-12"> 
                        	English <br>
                                <input type="text" class="form-control input_md input_sm  mbottom col-md-4" name="name_en_Spouse_FirstName" id="name_en_Spouse_FirstName" value="<?php if($d->name_en_Spouse_FirstName!="") echo $d->name_en_Spouse_FirstName;?>"  placeholder="First Name" >
                                <input type="text" class="form-control input_md input_sm  mbottom col-md-4" name="name_en_Spouse_LastName" id="name_en_Spouse_LastName" value="<?php if($d->name_en_Spouse_LastName!="") echo $d->name_en_Spouse_LastName;?>"  placeholder="Last Name" >
                                <input type="text" class="form-control input_md input_sm col-md-4" name="name_en_Spouse_NickName" id="name_en_Spouse_NickName" value="<?php if($d->name_en_Spouse_NickName!="") echo $d->name_en_Spouse_NickName;?>" placeholder="Nick Name" >
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12"> 
                            Bangla <br>
                                <input type="text" class="form-control input_md input_sm  mbottom col-md-4" name="name_bn_Spouse_FirstName" id="name_bn_Spouse_FirstName" value="<?php if($d->name_bn_Spouse_FirstName!="") echo $d->name_bn_Spouse_FirstName;?>"  placeholder="First Name" >
                                <input type="text" class="form-control input_md input_sm  mbottom col-md-4" name="name_bn_Spouse_LastName" id="name_bn_Spouse_LastName" value="<?php if($d->name_bn_Spouse_LastName!="") echo $d->name_bn_Spouse_LastName;?>"  placeholder="Last Name" >
                                <input type="text" class="form-control input_md input_sm col-md-4" name="name_bn_Spouse_NickName" id="name_bn_Spouse_NickName" value="<?php if($d->name_bn_Spouse_NickName!="") echo $d->name_bn_Spouse_NickName;?>" placeholder="Nick Name" >
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12"> 
                        Japanese <br>
                                <input type="text" class="form-control input_md input_sm  mbottom col-md-4" name="name_jp_Spouse_FirstName" id="name_jp_Spouse_FirstName" value="<?php if($d->name_jp_Spouse_FirstName!="") echo $d->name_jp_Spouse_FirstName;?>" placeholder="First Name In JP" >
                                <input type="text" class="form-control input_md input_sm  mbottom col-md-4" name="name_jp_Spouse_LastName" id="name_jp_Spouse_LastName" value="<?php if($d->name_jp_Spouse_LastName!="") echo $d->name_jp_Spouse_LastName;?>" placeholder="Last Name In JP" >
                                <input type="text" class="form-control input_md input_sm col-md-4" name="name_jp_Spouse_NickName" id="name_jp_Spouse_NickName" value="<?php if($d->name_jp_Spouse_NickName!="") echo $d->name_jp_Spouse_NickName;?>" placeholder="Nick Name In JP" >
                        </div>
                    </div>
                </div>
              </div>
              </div>
              
             
              
              <!--======= Occupation ==========----->
            <div class="row bdcolor">
              <div class="form-group col-md-9" >
              	<div class="col-md-3  textalign" id="div1">
                <label>Job Status</label><span style="font-size:10px"></span>
                </div>
                <div class="col-md-9 mbottoms contentbgcolor">
                	<div class="row">
                        <div class="col-md-4"> 
                        	Occupation <br>
                                <input type="text" class="form-control input_md input_sm mr mbottom" name="occupation" id="occupation" value="<?php if($d->occupation!="") echo $d->occupation;?>"  placeholder="Occupation" style="width: 100%;">    
                        </div>
                        <div class="col-md-4"> 
                        	Name of Organization <br>
                                <input type="text" class="form-control input_md input_sm mr mbottom" name="name_of_organization" id="name_of_organization" value="<?php if($d->name_of_organization!="") echo $d->name_of_organization;?>"  placeholder="Name of Organization" style="width: 100%;">    
                        </div>
                        <div class="col-md-4"> 
                        	Position <br>
                                <input type="text" class="form-control input_md input_sm mr mbottom" name="position" id="position" value="<?php if($d->position!="") echo $d->position;?>" placeholder="Position" style="width: 100%;">    
                        </div>
                    </div>
                    
                    
                </div>
              </div>
              </div>
              
              
              
             
              
              
              
               
              
              
              <!--======= Date of entry into Japan ==========-----> 
                <div class="row bdcolor">
              <div class="form-group col-md-9">
              	<div class="col-md-3 ptop textalign">
                <label>Date of entry into Japan</label>
                </div>
                <div class="col-md-9 mbottom contentbgcolor ptop">
                	<div class="row">
                        <div class="col-md-12" style="margin-bottom:10px;">
                        	<div class="mr float_left">
                            <select name="jpEntryYear">
								<?php 
									$c_year=date("Y"); $l_year=$c_year-100; 
									for($c_year;$c_year>=$l_year;$c_year--)
									{
								?>
                                <option value="<?php echo $c_year?>" <?php if($d->jpEntryYear==$c_year){echo 'selected';}?> ><?php echo $c_year;?></option>
                                <?php }?>
                                </select>&nbsp;Year</div>
                                
                            <div class="mr float_left">
                            <select name="jpEntryMonth">
								<?php
									for($i=1;$i<=12;$i++)
									{
								?>
                                <option value="<?php echo $i?>" <?php if($d->jpEntryMonth==$i){echo 'selected';}?>><?php echo $i;?></option>
                                <?php }?>
                                </select>&nbsp;Month</div>
                                
                            <div class="mr float_left">
                            <select name="jpEntryDay">
								<?php
									for($i=1;$i<=31;$i++)
									{
								?>
                                <option value="<?php echo $i?>" <?php if($d->jpEntryDay==$i){echo 'selected';}?>><?php echo $i;?></option>
                                <?php }?>
                                </select>&nbsp;Day</div>
                        </div>
                    </div>
                </div>
              </div>
              </div>
              
              
              
              <!--======= Address in Japan ==========-----> 
                <div class="row  bdcolor">
              <div class="form-group col-md-9">
              	<div class="col-md-3 textalign">
                <label>Address in Japan</label>
                </div>
                <div class="col-md-9 mbottom contentbgcolor">
                	<div class="row">
                	<div class="col-md-7">
                    	<input type="text" class="form-control mb5" name="jpzipcode" id="jpzipcode" onKeyUp="getjpinfo()" value="<?php if($d->jpzipcode!="") echo $d->jpzipcode?>" placeholder="Zip Code" style="width:100px;">
                        
                        <input type="text" class="form-control w100p mb5" name="jpdivisiondistrict" id="jpdivisiondistrict" value="<?php if($d->jpdivisiondistrict!="") echo $d->jpdivisiondistrict?>" style="width:100%" placeholder="Japan Division District">
                        <input type="text" class="form-control w100p mb5" name="jpcity" id="jpcity" style="width:100%" value="<?php if($d->jpcity!="") echo $d->jpcity?>" placeholder="Japan City Area">
                        <input type="text" class="form-control w100p mb5" name="jpbuilding" id="jpbuilding" style="width:100%" value="<?php if($d->jpbuilding!="") echo $d->jpbuilding?>" placeholder="Japan Building Apartment No.">
                	</div>
                	<div class="col-md-5">
                	<div class="row">
                        <div class="col-md-12" style="margin-bottom:10px;">
                        	<div class="mr float_left mb5 w100p"><input type="text" class="form-control w100p" name="address_in_japan_phone" id="address_in_japan_phone" value="<?php if($d->address_in_japan_phone!="") echo $d->address_in_japan_phone;?>" placeholder="Phone"></div>
                            <div class="mr float_left mb5 w100p"><input type="text" class="form-control w100p" name="address_in_japan_mobile" id="address_in_japan_mobile" value="<?php if($d->address_in_japan_mobile!="") echo $d->address_in_japan_mobile;?>" placeholder="Mobile"></div>
                            <div class="mr float_left w100p"><input type="email" class="form-control w100p" name="email" id="email" value="<?php if($d->email!="") echo $d->email;?>" placeholder="Email"></div>
                        </div>
                    </div>
                </div>
                </div>
                </div>
                
              </div>
              </div>
              
               
              
              <!--======= Address in Bangladesh ==========----->  
              
              <div class="row  bdcolor">
              <div class="form-group col-md-9">
              	<div class="col-md-3 textalign">
                <label>Address in Bangladesh</label>
                </div>
                <div class="col-md-9 mbottom contentbgcolor">
                	<div class="row">
                	<div class="col-md-7">
                		<div class="row">	  
                      	<div class="col-md-12">  
                            <div class="mb10 pb10 float_left col-md-6">
                                <select name="bddivision" id="bddivision"  onChange="getdistrictbdlist()" style="height:25px;width:130px;">
                                    <option value=""></option>
                                    <?php 
                                        foreach($divisions as $divs)
                                        {	
                                    ?>
                                    <option value="<?php echo $divs->id;?>" <?php if($divs->id==$d->bd_division_id){echo 'selected';}?>><?php echo $divs->name;?></option>
                                    <?php }?>
                                </select>&nbsp;Division
                           </div>
                           <div class="mb10 pb10 float_left col-md-6">
                                <select name="bddristrict" id="bddristrict" onChange="getupazilabdlist()" style="height:25px;width:130px;">
                                <?php 
									foreach($dristricts as $dris)
									{	
										if($dris->id == $d->bd_district_id)
										{
								?>
										<option value="<?php echo $dris->id;?>" selected;><?php echo $dris->name;?></option>
                                <?php 
										}
									}
								?>
                                </select>&nbsp;Dristrict
                           </div>
                           <div class="mb10 pb10 float_left col-md-6">
                                <select name="bdupazila" id="bdupazila" onChange="getunionbdlist()" style="height:25px;width:130px;">
                                 <?php 
									foreach($upazilas as $upaz)
									{	
										if($upaz->id == $d->bd_upazilla_id)
										{
								?>
										<option value="<?php echo $upaz->id;?>" selected;><?php echo $upaz->name;?></option>
                                <?php 
										}
									}
								?>
                                </select>&nbsp;Upazila
                           </div>
                           <div class="mb10 pb10 float_left col-md-6">
                                <select name="bdunion" id="bdunion" style="height:25px;width:130px;">
                                <?php 
									foreach($unions as $union)
									{	
										if($union->id == $d->bd_union_id)
										{
								?>
										<option value="<?php echo $union->id;?>" selected;><?php echo $union->name;?></option>
                                <?php 
										}
									}
								?>
                                </select>&nbsp;Union
                           </div>
                         </div>
                     </div>
                     
                     <div class="row">
                     	<div class="col-md-12">
                        Address<br>
                			<input type="text" name="address_in_bangladesh" id="address_in_bangladesh" value="<?php if($d->address_in_bangladesh!="") echo $d->address_in_bangladesh;?>" class="form-control" style="width:100%">
                        </div>
                     </div>
                	</div>
                    
                	<div class="col-md-5">
                	<div class="row">
                        <div class="col-md-12" style="margin-bottom:10px;">
                        	<div class="mr float_left mb5 w100p"><input type="text" class="form-control w100p" name="address_in_bangladesh_phone" id="address_in_bangladesh_phone" value="<?php if($d->address_in_bangladesh_phone!="") echo $d->address_in_bangladesh_phone;?>" placeholder="Phone"></div>
                            <div class="mr float_left mb5 w100p"><input type="text" class="form-control w100p" name="address_in_bangladesh_mobile" id="address_in_bangladesh_mobile" value="<?php if($d->address_in_bangladesh_mobile!="") echo $d->address_in_bangladesh_mobile;?>" placeholder="Mobile"></div>
                        </div>
                    </div>
                </div>
                </div>
                </div>
                
              </div>
              </div>
              
               
              
              <!--======= Place Of Origin In Greater Khulna ==========----->  
              
              <div class="row  bdcolor">
              <div class="form-group col-md-9">
              	<div class="col-md-3 textalign">
                <label>Place Of Origin In Greater Khulna</label>
                </div>
                <div class="col-md-9 mbottom contentbgcolor">
                	<div class="row">
                	<div class="col-md-12"> 
                    
                    	<div class="mr float_left">
                            <select name="division" id="division"  onChange="getdistrictlist()" style="height:25px;width:130px;">
								<?php 
									foreach($divisions as $divs)
									{	
								?>
                                <option value="<?php echo $divs->id;?>" <?php if($divs->id==$d->place_of_origin_division){echo 'selected';}?>><?php echo $divs->name;?></option>
                                <?php }?>
                            </select>&nbsp;Division
                       </div>
                       <div class="mr float_left">
                            <select name="dristrict" id="dristrict" onChange="getupazila()" style="height:25px;width:130px;">
								<?php 
									foreach($dristricts as $dris)
									{	
										if($dris->id == $d->place_of_origin_district)
										{
								?>
										<option value="<?php echo $dris->id;?>" selected;><?php echo $dris->name;?></option>
                                <?php 
										}
									}
								?>
                            </select>&nbsp;Dristrict
                       </div>
                       <div class="mr float_left">
                            <select name="upazila" id="upazila" onChange="getunion()" style="height:25px;width:130px;">
								<?php 
									foreach($upazilas as $upaz)
									{	
										if($upaz->id == $d->place_of_origin_upazila)
										{
								?>
										<option value="<?php echo $upaz->id;?>" selected;><?php echo $upaz->name;?></option>
                                <?php 
										}
									}
								?>
                            </select>&nbsp;Upazila
                       </div>
                       <div class="mr float_left">
                            <select name="union" id="union" style="height:25px;width:130px;">
								<?php 
									foreach($unions as $union)
									{	
										if($union->id == $d->place_of_origin_union)
										{
								?>
										<option value="<?php echo $union->id;?>" selected;><?php echo $union->name;?></option>
                                <?php 
										}
									}
								?>
                            </select>&nbsp;Union
                       </div>
                	</div>
                	
                </div>
                </div>
                
              </div>
              </div>
              
              
               
              
              <!--======= Emergency Contact ==========-----> 
               <div class="row  bdcolor">
              <div class="form-group col-md-9">
              	<div class="col-md-3 ptop textalign">
                <label>Emergency Contact</label>
                </div>
                <div class="col-md-9 mbottom contentbgcolor ptop">
                	<div class="row">
                        <div class="col-md-6" style="margin-bottom:10px;">
                                <input type="text" class="form-control input_md input_sm mr mbottom w100p mb5" name="emergency_contact_name" id="emergency_contact_name" value="<?php if($d->emergency_contact_name!="") echo $d->emergency_contact_name;?>"  placeholder="Name" >
                                <input type="text" class="form-control input_md input_sm w100p mbottom" name="emergency_contact_person_relationship" id="emergency_contact_person_relationship" value="<?php if($d->emergency_contact_person_relationship!="") echo $d->emergency_contact_person_relationship;?>" placeholder="Relationship" >
                        </div>
                    
                        <div class="col-md-6" style="margin-bottom:10px;"> 
                                <input type="text" class="form-control input_md input_sm mr mbottom w100p mb5" name="emergency_contact_phone" id="emergency_contact_phone" value="<?php if($d->emergency_contact_phone!="") echo $d->emergency_contact_phone;?>" placeholder="Phone" >
                                <input type="text" class="form-control input_md input_sm w100p" name="emergency_contact_mobile" id="emergency_contact_mobile" value="<?php if($d->emergency_contact_mobile!="") echo $d->emergency_contact_mobile;?>" placeholder="Mobile" >
                        </div>
                    </div>
                </div>
              </div>
              </div>
              
              
              
              <!--======= Visa Status ==========-----> 
               <div class="row  bdcolor">
              <div class="form-group col-md-9">
              	<div class="col-md-3 textalign">
                <label>Residence Status</label>
                </div>
                <div class="col-md-9 mbottom contentbgcolor">
                	<div class="row">
                        <div class="col-md-12" style="margin-bottom:10px;">
                        	<div class="mr float_left"><input type="radio" name="visa_status" id="rdo_visa_status_student" value="Student" <?php if($d->visa_status=="Student"){echo 'checked';}?> onChange="show_rdo_visa_status_others_info_1()" >&nbsp;Student</div>
                            <div class="mr float_left"><input type="radio" name="visa_status" id="rdo_visa_status_business" value="Business" <?php if($d->visa_status=="Business"){echo 'checked';}?> onChange="show_rdo_visa_status_others_info_1()">&nbsp;Business</div>
                            <div class="mr float_left"><input type="radio" name="visa_status" id="rdo_visa_status_work" value="Job" <?php if($d->visa_status=="Job"){echo 'checked';}?> onChange="show_rdo_visa_status_others_info_1()" >&nbsp;Job</div>
                            <div class="mr float_left"><input type="radio" name="visa_status" id="rdo_visa_status_permanent_resident" value="Visit" <?php if($d->visa_status=="Visit"){echo 'checked';}?> onChange="show_rdo_visa_status_others_info_1()" >&nbsp;Permanent Resident</div>
                            <div class="mr float_left"><input type="radio" name="visa_status" id="rdo_visa_status_others" value="Others" <?php if($d->visa_status=="Others"){echo 'checked';}?> onChange="show_rdo_visa_status_others_info_2()">&nbsp;Others</div>
                            <div class="float_left" id="visa_status_others_info" class="hideme"><input type="text" name="visa_status_others_info" value="<?php if(!$d->visa_status_others_info!="") echo $d->visa_status_others_info;?>"  placeholder="Others information"></div>
                        </div>
                    </div>
                </div>
              </div>
              </div>
              
              
              
              
               
              
              <div class="form-group col-md-9 no-print">
                <input type="submit" class="form-control btn_width btn btn-default" value="Update">
              </div>
              
              
            </form>
 <?php 
 if(isset($_GET['esk'])&& !empty($_GET['esk']))echo '<label class="ems mymsg fl-r">'.$_GET['esk'].'</label>';
 }}
 ?> 
 
 
 <script>
 function getjpinfo()
{
	var zipcode = document.getElementById('jpzipcode').value;
	var zip=""; var k="";
	<?php 
	foreach($jpzipinfo as $jpz)
	{
	?> 
	if('<?php echo $jpz->zipcode;?>' == zipcode)
	{
		document.getElementById("jpdivisiondistrict").value = "<?php echo $jpz->division.", ".$jpz->district;?>";
		document.getElementById("jpcity").value = "<?php echo $jpz->city;?>";
	}
	<?php
	}
	?>
	
}
//for bangladesh addresss
//getdistrictbdlist getupazilabdlist getunionbdlist  bddivision bddristrict bdupazila bdunion
 function getdistrictbdlist()
 { 
	var bddivisionid = document.getElementById("bddivision").value; 
	var bddristrict = document.getElementById("bddristrict"); 
	var bdupazila = document.getElementById("bdupazila"); 
	var bdunion = document.getElementById("bdunion"); 
	//if change district,upazila,union goes empty
	var length = bddristrict.options.length;
	for (i = length-1; i >= 0; i--) 
	{
	  bddristrict.options[i] = null;
	}
	var length = bdupazila.options.length;
	for (i = length-1; i >= 0; i--) 
	{
	  bdupazila.options[i] = null;
	}
	var length = bdunion.options.length;
	for (i = length-1; i >= 0; i--) 
	{
	  bdunion.options[i] = null;
	}
	//blank option start
	var option = document.createElement("option");
	option.text = "";
	option.value = "";
	bddristrict.appendChild(option);
	//blank option end
	<?php 
	foreach($dristricts as $dist)
	{
	?> 
	if('<?php echo $dist->division_id;?>' == bddivisionid)
	{
	var option = document.createElement("option");
	option.text = "<?php echo $dist->name;?>";
	option.value = "<?php echo $dist->id;?>";
	bddristrict.appendChild(option);
	}
	<?php
	}
	?>
 }
 function getupazilabdlist()
 {
	var bddristrictid = document.getElementById("bddristrict").value;
	var bdupazila = document.getElementById("bdupazila"); 
	var bdunion = document.getElementById("bdunion"); 
	
	//if change upazila,union goes empty
	var length = bdupazila.options.length;
	for (i = length-1; i >= 0; i--) 
	{
	  bdupazila.options[i] = null;
	}
	var length = bdunion.options.length;
	for (i = length-1; i >= 0; i--) 
	{
	  bdunion.options[i] = null;
	}
	
	//blank option start
	var option = document.createElement("option");
	option.text = "";
	option.value = "";
	bdupazila.appendChild(option);
	//blank option end
	
	<?php 
	foreach($upazilas as $upa)
	{
	?> 
	if('<?php echo $upa->district_id;?>' == bddristrictid)
	{
	var option = document.createElement("option");
	option.text = "<?php echo $upa->name;?>";
	option.value = "<?php echo $upa->id;?>";
	bdupazila.appendChild(option);
	}
	<?php
	}
	?>
 }
 function getunionbdlist()
 {
	var bdupazilaid = document.getElementById("bdupazila").value;
	var bdunion = document.getElementById("bdunion"); 
	var length = bdunion.options.length;
	for (i = length-1; i >= 0; i--) 
	{
	  bdunion.options[i] = null;
	}
	
	//blank option start
	var option = document.createElement("option");
	option.text = "";
	option.value = "";
	bdunion.appendChild(option);
	//blank option end
	
	<?php 
	foreach($unions as $union)
	{
	?> 
	if('<?php echo $union->upazilla_id;?>' == bdupazilaid)
	{
	var option = document.createElement("option");
	option.text = "<?php echo $union->name;?>";
	option.value = "<?php echo $union->id;?>";
	bdunion.appendChild(option);
	}
	<?php
	}
	?>
 }
 </script> 
 
  
<script>
//for Place Of Origin In Greater Khulna
 function getdistrictlist()
 {
	var divisionid = document.getElementById("division").value;
	var dristrict = document.getElementById("dristrict"); 
	//if change district,upazila,union goes empty
	var length = dristrict.options.length;
	for (i = length-1; i >= 0; i--) 
	{
	  dristrict.options[i] = null;
	}
	var length = upazila.options.length;
	for (i = length-1; i >= 0; i--) 
	{
	  upazila.options[i] = null;
	}
	var length = union.options.length;
	for (i = length-1; i >= 0; i--) 
	{
	  union.options[i] = null;
	}
	//blank option start
	var option = document.createElement("option");
	option.text = "";
	option.value = "";
	dristrict.appendChild(option);
	//blank option end
	<?php 
	foreach($dristricts as $dist)
	{
	?> 
	if('<?php echo $dist->division_id;?>' == divisionid)
	{
	var option = document.createElement("option");
	option.text = "<?php echo $dist->name;?>";
	option.value = "<?php echo $dist->id;?>";
	dristrict.appendChild(option);
	}
	<?php
	}
	?>
 }
 function getupazila()
 {
	var dristrictid = document.getElementById("dristrict").value;
	var upazila = document.getElementById("upazila"); 
	//if change upazila,union goes empty
	var length = upazila.options.length;
	for (i = length-1; i >= 0; i--) 
	{
	  upazila.options[i] = null;
	}
	var length = union.options.length;
	for (i = length-1; i >= 0; i--) 
	{
	  union.options[i] = null;
	}
	
	//blank option start
	var option = document.createElement("option");
	option.text = "";
	option.value = "";
	upazila.appendChild(option);
	//blank option end
	
	<?php 
	foreach($upazilas as $upa)
	{
	?> 
	if('<?php echo $upa->district_id;?>' == dristrictid)
	{
	var option = document.createElement("option");
	option.text = "<?php echo $upa->name;?>";
	option.value = "<?php echo $upa->id;?>";
	upazila.appendChild(option);
	}
	<?php
	}
	?>
 }
 function getunion()
 {
	var upazilaid = document.getElementById("upazila").value;
	var union = document.getElementById("union"); 
	var length = union.options.length;
	for (i = length-1; i >= 0; i--) 
	{
	  union.options[i] = null;
	}
	
	//blank option start
	var option = document.createElement("option");
	option.text = "";
	option.value = "";
	union.appendChild(option);
	//blank option end
	
	<?php 
	foreach($unions as $union)
	{
	?> 
	if('<?php echo $union->upazilla_id;?>' == upazilaid)
	{
	var option = document.createElement("option");
	option.text = "<?php echo $union->name;?>";
	option.value = "<?php echo $union->id;?>";
	union.appendChild(option);
	}
	<?php
	}
	?>
 }
 </script> 