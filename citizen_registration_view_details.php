

<script>
function hideus()
{
	var btn1 = document.getElementById('btn1');
	var btn2 = document.getElementById('btn2');
	btn1.style.display='none';
	btn2.style.display='none';
}
</script>


<style>
.input_md{width:49%;float:left;}
.mr{margin-right:10px;}
.mbottom{margin-bottom:0px;padding-bottom:15px;}
.mtop{margin-top:15px;}
.mb5{margin-bottom:5px;}
.btn_width{width:100px !important;float:right;}
.float_left{float:left}
.hideme{display:none;}
.clearboth{clear:both;}
.h87{height:87px;}
.w100p{width:100%;}
.p5{padding:5px;}
.borderline{border:1px solid #000}
.color-red{color:#F00;}
.bdcolor{background:#D7D4D4;}
.bgwhite,.form-control{background:#fff !important;}
.contentbgcolor{background:#FFF;}
.page-pd{padding-top:30px;padding-bottom:60px;}
.page-title{padding-bottom:30px;}
.bbottom{border-bottom:1px solid #cec9c9;}
.btop{border-top:1px solid #cec9c9;}
.ptop{padding-top:15px;}
#footer{width:100% !important;font-size:15px;padding-top:10px;}
.sp{padding-bottom:15px;}
th,td{vertical-align:top !important;}
table{padding-left:15px;border:none !important;}
.thw{width:150px !important}
.thw2{width:80px;float:left}
.h3height{padding-bottom:25px;font-size:22px;}
.imgstyle{border: 5px solid#CCCCCC;margin: 20px 0 20px 0;float: right;/*position: absolute;*/top: 100px;right: 550px;width: 120px;height: 120px;}
.divsty1{max-width:350px;height:auto;}
@media(max-width:767px)
{
	.input_sm{width:100%;margin-right:10px;}
	.mbottom{margin-bottom:10px;}
	.h87{height:67px;margin-bottom:5px;}
	.bdcolor{background:#FFF;}
	.contentbgcolor{background:#FFF;}
	.page-pd{padding-top:0px;padding-bottom:30px;}
	.page-title{padding-bottom:0px;}
	.ptop{padding-top:0px;}
	.footer-content{width:100%;font-size:10px;padding-top:10px;}
	.sp{padding-bottom:5px;}
	th,td{vertical-align:top !important;}
	table{padding-left:15px;font-size:10px;}
	.thw{width:120px}
	.thw2{width:60px;}
	.h3height{padding-bottom:5px;font-size:20px;}
	.imgstyle{border:5px solid#CCCCCC;margin: 20px 0 20px 0;float: right;/*position: absolute;*/top: 60px;right: 20px;width: 120px;height: 120px;	}
}
@media(min-width:768px) and (max-width:991px)
{
	.input_sm{width:100%;margin-right:10px;}
	.mbottom{margin-bottom:10px;}
	.h87{height:67px;margin-bottom:5px;}
	.bdcolor{background:#FFF;}
	.contentbgcolor{background:#FFF;}
	.page-pd{padding-top:0px;padding-bottom:30px;}
	.page-title{padding-bottom:0px;}
	.ptop{padding-top:0px;}
	.footer-content{width:100%;font-size:10px;padding-top:10px;}
	.sp{padding-bottom:5px;}
	th,td{vertical-align:top !important;}
	table{padding-left:15px;font-size:10px;}
	.thw{width:120px}
	.thw2{width:60px;}
	.h3height{padding-bottom:5px;font-size:20px;}
	.imgstyle{border:5px solid#CCCCCC;margin: 20px 0 20px 0;float: right;/*position: absolute;*/top: 60px;right: 50px;width: 120px;height: 120px;	}
}
@media print 
{
    .no-print {
        display: none;
    }
	.h3height{font-size:22px;}
	.ptop{padding-top:0px;}
	.form-group {margin-bottom: 5px !important;}
	input,select,textarea{border-left:none !important;border-right:none !important;border-top:none !important;font-size:11px !important;}
	.sp {padding-bottom: 0px;}
	@page { margin: 0; }
  	body { margin: 1cm 1cm;font-size:16px !important; }
	table{font-size:16px;}
	.divsty1{width:100%;height:auto;}
	/*img{width:130px !important;height:130px !important;margin-top:-120px !important;margin-right:-20px !important;}*/
	.imgstyle{border:5px solid#CCCCCC;margin: 20px 0 20px 0;float: left;/*position: absolute;top: 60px;right: 200px;*/width:150px !important;height:170px !important;	}
	.page-title{padding-bottom:0px;margin-left:-130px !important;}
	.titlemargin{margin-left:-130px !important;}
}
</style>
<script>
function myFunction() 
{
  window.print();
}
</script>

<?php 
foreach($model as $d)
{ 
	$marital_status = "";
	if($d->marital_status !="Others"){$marital_status = $d->marital_status;}else if($d->marital_status=="Others"){$marital_status = $d->marital_status." - ".$d->marital_status_others_info;}
$visa_status ="";
	if($d->visa_status !="Others"){ $visa_status = $d->visa_status;}else if($d->visa_status=="Others"){$visa_status = $d->visa_status." - ".$d->visa_status_others_info;}
	$address_in_japan = "";
	if($d->jpbuilding !=""){$address_in_japan .= $d->jpbuilding.",<br> ";}
	if($d->jpcity !=""){$address_in_japan .= "&nbsp;&nbsp;&nbsp;".$d->jpcity.",<br> ";}
	if($d->jpdivisiondistrict !=""){$address_in_japan .= "&nbsp;&nbsp;&nbsp;".$d->jpdivisiondistrict;}
	if($d->jpzipcode !=""){$address_in_japan .= " ".$d->jpzipcode;}
?>


<div style="margin:20px 0 30px 80px;max-width:1000px;float:left;">
<center> <a href="javascript:" onclick="myFunction()" style="float:right;font-size:24px;" class="no-print" title="Print"><i class="fa fa-print"></i></a>
<h3 class="h3height">Citizen Registration Information</h3>



<table>
	<tr>
    	<td colspan="2"><img id="blah" src="<?php if($d->pic !=""){echo base_url().'img/register/'.$d->pic;}else{echo 'img/upload_img1.png';}?>"  class="imgstyle"></td>
    </tr>
	<tr> 
    	<th class="thw">Name</th> 
        <td>&nbsp;:&nbsp;<?php echo $d->name_en_FirstName." ".$d->name_en_LastName;?> &nbsp;&nbsp;&nbsp; <?php echo $d->name_jp_FirstName." ".$d->name_jp_LastName;?><div class="sp">&nbsp;</div></td>
    </tr>
    
    <tr> 
    	<th>Gender</th> 
        <td>&nbsp;:&nbsp;<?php echo $d->gender;?><div class="sp">&nbsp;</div></td>
    </tr>
    
    <tr> 
    	<th>Marital Status</th> 
        <td>&nbsp;:&nbsp;<?php echo $marital_status;?><div class="sp">&nbsp;</div></td>
    </tr>
    
    <tr> 
    	<th>Date Of Birth</th> <td>&nbsp;:&nbsp; <?php echo $d->birthYear."/".$d->birthMonth."/".$d->birthDay;?><div class="sp">&nbsp;</div></td>
    </tr>
    
    <tr> 
    	<th>Passport No</th> 
        <td>
        <table>
        <tr>
        <td style="vertical-align:top;">&nbsp;:&nbsp; <?php echo  $d->passport_no;?> </td>
        <td>&nbsp;&nbsp;Validity &nbsp;:&nbsp;<?php echo $d->passportValidatyYear."/".$d->passportValidatyMonth."/".$d->passportValidatyDay;?><div class="sp">&nbsp;</div></td>
        </tr>
        </table>
        </td>
    </tr>
    <tr> 
    	<th>Date of entry into Japan</th> <td>&nbsp;:&nbsp; <?php echo $d->jpEntryYear."/".$d->jpEntryMonth."/".$d->jpEntryDay;?><div class="sp">&nbsp;</div></td>
    </tr>
    <tr> 
    	<th>Address in Japan</th> 
        <td>
        <table style="margin-left:10px;">
        	<tr><td><div class="thw2">Address</div> </td><td><div class="divsty1">&nbsp;:&nbsp;<?php echo $address_in_japan;?></div></td></tr>
			<tr><td><div class="thw2">Phone</div> </td><td>&nbsp;:&nbsp;<?php echo $d->address_in_japan_phone;?></td></tr>
            <tr><td><div class="thw2">Mobile</div> </td><td>&nbsp;:&nbsp;<?php echo $d->address_in_japan_mobile;?><div class="sp">&nbsp;</div></td></tr>
        </table>
        </td>
    </tr>
    <tr> 
    	<th>Address in Bangladesh</th> 
        <td> 
        <table style="margin-left:10px;">
        	<tr><td><div class="thw2">Address</div> </td><td><div style="max-width:250px;height:auto;">&nbsp;:&nbsp;<?php echo $d->address_in_bangladesh;?></div></td></tr>
			<tr><td><div class="thw2">Phone</div> </td><td>&nbsp;:&nbsp;<?php echo $d->address_in_bangladesh_phone;?></td></tr>
            <tr><td><div class="thw2">Mobile</div> </td><td>&nbsp;:&nbsp;<?php echo $d->address_in_bangladesh_mobile;?><div class="sp">&nbsp;</div></td></tr>
        </table>
        </td>
    </tr>
    <tr> 
    	<th>Email</th> <td>&nbsp;:&nbsp; <?php echo $d->email;?><div class="sp">&nbsp;</div></td>
    </tr>
    <tr> 
    	<th>Emergency Contact</th> 
        <td> 
        <table style="margin-left:10px;">
        	<tr><td><div class="thw2">Name</div> </td><td>&nbsp;:&nbsp;<?php echo $d->emergency_contact_name;?></td></tr>
			<tr><td><div class="thw2">Relationship</div></td><td>&nbsp;:&nbsp;<?php echo $d->emergency_contact_person_relationship;?></td></tr>
            <tr><td><div class="thw2">Phone</div> </td><td>&nbsp;:&nbsp;<?php echo $d->emergency_contact_phone;?></td></tr>
            <tr><td><div class="thw2">Mobile</div> </td><td>&nbsp;:&nbsp;<?php echo $d->emergency_contact_mobile;?> <div class="sp">&nbsp;</div></td></tr>
        </table>
        </td>
    </tr>
    <tr> 
    	<th>Visa Status</th> <td>&nbsp;:&nbsp; <?php echo $visa_status;?> <div class="sp">&nbsp;</div> </td>
    </tr>
    
</table>

</center>


</div>
<?php 
}
?>







				