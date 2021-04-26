
<script type="text/javascript" src="js/jquery-1.12.4.js"></script>


<link rel="stylesheet" href="css/mystyle.css" />
<script src="js/myjs.js"></script>
<style type="text/css">
table {
	border-collapse: collapse;
}
.tableHeader {
	font-size: 24px;
	color: #000;
	padding: 5px 0px;
}
.tdStyle {
	text-align: center;
}
.btnStyle {
	padding: 0px 20px;
}
#message1 {
	color: green;
	font-size: 24px;
}
#message2 {
	color: red;
	font-size: 24px;
}
.showme{display:block;}
.hideme{display:none;}
.btnunseen{background:#093;color:#FFF;padding:5px;}
.btnseen{background:#FFF;color:#000;padding:5px;}

</style>
<script>
$(document).ready(function() {
    $('#example').DataTable();
} );
</script>
<script>
function valid()
{
	var searchby = document.getElementById('searchby').value;
	var searchword = document.getElementById('searchword').value;
	var err=0;
	if(searchby==""&&searchword=="")
	{
		err++;
	}
	if(err==0)
	{
		return true;
	}
	return false;
}

function statuschange(anchor)
{
   var conf = confirm('Are you sure want to change this record status?');
   if(conf)
      window.location=anchor.attr("href");
}
function showButton()
{
	var submitid = document.getElementById("submitid");
	submitid.classList.remove("hideme");
}
</script>
<script>
function myFunction() 
{
  window.print();
}
</script>
<?php
	if(isset($_GET['sk'])&& !empty($_GET['sk']))echo '<label class="ms mymsg fl-r no-print">'.$_GET['sk'].'</label>';
	if(isset($_GET['esk'])&& !empty($_GET['esk']))echo '<label class="ems mymsg fl-r no-print">'.$_GET['esk'].'</label>';
?>
<div class="container">
  <div class="row">
    <div class="col-sm-12">
    
      <h2 class="tableHeader">Registration List <a href="<?php echo 'register_management/exportCSV';?>" style="float:right;font-size:16px;" class="no-print">Generate Report</a></h2>
      
      <form action="<?php echo 'register_management/searchregister';?>" method="post" onsubmit="return valid()" style="margin-bottom:5px;" class="no-print">
      	
      	<select  name="searchby" id="searchby" style="width:100px;height:30px;">
        	<option></option>
        	<option value="firstname">First Name</option>
            <option value="lastname">Last Name</option>
            <option value="email">Email</option>
            <option value="phone">Phone</option>
        </select>
        <input type="text" name="searchword" id="searchword" style="height:30px;"/>
        <input type="submit"  value="Search" style="height:30px;" />
        
      </form>
      
      
      
      <table id="example"  class="table table-bordered table-striped table-hover table-responsive" style="border:none;">
        <thead>
          <tr>
            <th class="no-print">SL</th>
            <th>Photo</th>
            <th>Name</th>
            <th>Email</th>
            <th>JP-Phone</th>
            <th>JP-Address</th>
            <th class="no-print">Create Date</th>
            <th class="no-print">Status</th>
            <th class="no-print"><!--<button onclick="myFunction()" style="margin-left:20px;" title="Print"><i class="fa fa-print"></i></button>--></th>
          </tr>
        </thead>
        <tbody>
        
        
          <?php 
					if(isset($model)&&count($model)>0)
					{
						$serial = 0; 
						
					foreach($model as $d)
					{ 
						$email ="";
						$phonejp ="";
						$phonebd ="";
						if($d->email !=""){$email = $d->email;}
						if($d->address_in_japan_phone == $d->address_in_japan_mobile){$phonejp = '<p>'.$d->address_in_japan_mobile.'</p>';}else{$phonejp = '<p>'.$d->address_in_japan_phone.'</p><p>'.$d->address_in_japan_mobile.'</p>';}
						if($d->address_in_bangladesh_phone == $d->address_in_bangladesh_mobile){$phonebd = '<p>'.$d->address_in_bangladesh_mobile.'</p>';}else{$phonebd = '<p>'.$d->address_in_bangladesh_phone.'</p><p>'.$d->address_in_bangladesh_mobile.'</p>';}
						
						$address_in_japan = "";
						if($d->jpbuilding !=""){$address_in_japan .= $d->jpbuilding."";}
						if($d->jpcity !=""){$address_in_japan .= "&nbsp;&nbsp;&nbsp;".$d->jpcity."";}
						if($d->jpdivisiondistrict !=""){$address_in_japan .= "&nbsp;&nbsp;&nbsp;".$d->jpdivisiondistrict;}
						if($d->jpzipcode !=""){$address_in_japan .= " ".$d->jpzipcode;}
						
				?>
          <tr>
            <td class="no-print"><?php echo ++$serial;?></td>
            <td><?php if(isset($d->pic)&&!empty($d->pic)){ ?>
              <img src="img/register/<?php echo $d->pic?>" style="Width:auto;min-Width:100;height:100px"/>
              <?php }?>
            </td>
            <td>
            <div style="min-width:150px;">
			<?php if(isset($d->name_en_FirstName)) echo $d->name_en_FirstName;?><?php if(isset($d->name_en_LastName)) echo " ".$d->name_en_LastName;?><br />
            <?php if(isset($d->name_jp_FirstName)) echo $d->name_jp_FirstName;?><?php if(isset($d->name_jp_LastName)) echo " ".$d->name_jp_LastName;?>
            </div>
            </td>
            <td><?php if(isset($email)) echo $email;?></td>
            <td><?php if(isset($phonejp)) echo $phonejp;?></td>
            <td><div style="min-width:200px;max-width:200px;"><?php if(isset($address_in_japan)) echo $address_in_japan;?></div></td>
            <td class="no-print"><?php if(isset($d->registration_time)) echo $d->registration_time;?></td>
            <td class="no-print"><?php if(isset($d->readstatus)&& $d->readstatus == 0){?><span class="btnunseen">Unseen</span><?php }else{?><span class="btnseen">Seen</span><?php }?></td>
            <td class="no-print"><a href="<?php echo 'register_management/view_details/'.$d->id?>">[View]</a>&nbsp; </td>
          </tr>
          <?php 
					}
				?>
          <?php 
           if(count($memberlist)>10)
           {
           ?>      
            <tr class="no-print">
                <td colspan="14">
                
                <style>
                    a {-webkit-transition: color .24s ease-in-out;-moz-transition: color .24s ease-in-out;-o-transition: color .24s ease-in-out;-ms-transition: color .24s ease-in-out;transition: color .24s ease-in-out;color: #2777BB;}
                    a.page, a.pgactive {padding:5px 12px;border:1px solid #ccc;margin:0 5px;line-height:30px;height:40px;}
                    a.pgactive { color:#FF8000;}
                </style>
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 m10" style="padding-top:10px;">
                    <center>
                    <?php
                    //product($catid,$catname)
                    $c = 0;
                    $p = 1; 
                    $count=1;                                   
                    if($start > 1)
                    {
                        echo "<a href='".$functionname."?page=" . ($start-1)/$per_page . "' class='btn btn-sm btn-primary page'>PREV</a>";    
                    }
                    for($c =0;  $c < count($memberlist);$c++) 
                    {
                        if($count <= 1000)
                        {
                            if($c%$per_page==0)
                            {
                                if(($end-1)/$per_page == $p)
                                {
                                    echo "<a href='".$functionname."?page={$p}' class='btn btn-sm btn-warning page'>{$p}</a>";
                                }
                                else
                                {
                                    echo "<a href='".$functionname."?page={$p}' class='btn btn-sm btn-primary page'>{$p}</a>";
                                }
                                $p++;
                            }
                            $count++;
                        }
                        
                    }
                    if($end < count($memberlist))
                    {
                        echo '...'."<a href='".$functionname."?page=" . ((($end-1)/$per_page)+1) . "' class='btn btn-sm btn-primary page'>NEXT</a>";
                    } 
                    ?>
                    </center>
              </div>
                
                </td>
                </tr>
                <?php 
                }
                ?>
                <?php 		   
                   }
                   else
                   {
                ?>
                    <tr>
                        <td colspan="10"><div class="alert alert-danger"> Record Not Found..... </div></td>
                    </tr>
                 <?php 
                   }
                 ?>	
        </tbody>
      </table>
      
    </div>
  </div>
</div>
