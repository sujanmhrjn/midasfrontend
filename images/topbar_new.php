<style>
.main-header{
    box-shadow:0 2px 10px -5px rgba(0, 2, 2, 0.15);
    background-color:#fff;
}
.main-header__content{
    padding:10px 10px;
    display:flex;
    align-items:center;
    justify-content:space-between;
}
@media screen and (min-width:768px) {
    .main-header__content{
      padding:10px 30px;
    }
}

.main-header__logo a{
    display:inline-block;
}

.main-header__action{
    display:flex;
    align-items:center;
}
.main-header__action .btn{
    color:#fff;
    background-color: #0C4CA1;
    font:16px 'Poppins', sans-serif;
    text-transform: uppercase;
    font-weight: 600;
    letter-spacing:1.1;
    transition:all 0.4s;
}
.main-header__action .btn:hover{
    background-color: #063470
}
.main-header__action .btn span{display: none;}

.main-header__action .account{
    margin-left:16px;
    position: relative;
  
}
.main-header__action .account__active{
    display: flex;
    align-items: center;
    cursor: pointer;
}
.main-header__action .account-image{
    height:40px;
    width:40px;
    overflow: hidden;
    position: relative;
    background-color: #eee;
    border-radius: 100px;
}
.main-header__action .account-image img{
    position:absolute;
    top:0;
    left:0;
    height:100%;
    width:100%;
    object-fit: cover;
    object-position: top center;
}
.main-header__action .account-title{
    display: none;
}
.main-header__action .account-toggler{
    margin-left: 16px;
    font-size: 12px;
    cursor: pointer;
}
.main-header__action .account-dropdown{
    position:absolute;
    right:0;
    top:100%;
    margin-top: 16px;
    background-color:#0C4CA1;
    color:#fff;
    min-width: 220px;
    border-radius: 8px;
    padding:20px 25px;
    display:none;
    z-index:99
}
.main-header__action .account-dropdown::before{
    content:"";
    display: inline-block;
    margin:0 auto;
    position: absolute;
    right:24px;
    top:-4px;
    height:16px;
    width:16px;
    background-color: #0C4CA1;
    border-radius: 4px;
    transform:rotate(45deg)
}
.main-header__action .account-dropdown h2{
    font:500 20px 'Poppins', sans-serif;
    margin:0 0 10px;
    color:#fff !important;
}
.main-header__action .account-dropdown ul{
    list-style-type: none;
    padding: 0;
    margin:0;
    font-family: 'Poppins', sans-serif;
    font-size: 14px;
}
.main-header__action .account-dropdown ul a{
    color:#fff;
    display: block;
    padding:6px 0;
}
.main-header .account-overlay {
    background:#000;
    position:fixed;
    top:0;
    left:0;
    right:0;
    bottom:0;
    z-index: 1;
    opacity: 0;
    display: none;
}

@media  screen and (min-width: 768px){
    .main-header__action .account{
        margin-left:32px;
    }
    .main-header__action .account-title{
        display: block;
        font-size:14px;
        font-family: 'Poppins', sans-serif;
        margin-left:16px;
    }
    .main-header__action .btn{
        font-size:10px;
    }
    .main-header__action .btn i{display: none; }
    .main-header__action .btn span{display: block;}
}

</style>

<?php 
define('DISTRICT',$this->session->userdata('district'));
$this->load->module('login');
$userdata = $this->login->getProfileData();
// print_r($userdata);
$user = $userdata['user'];
$lorg = $userdata['lorg'];
$org = $userdata['org'];
// print_r($org);
$usergrouplength =count($this->session->userdata('ug'));
$usergroup =$this->session->userdata('ug')[0];
$usergroupcond = ($usergroup=="Midas App" || $usergroup=="Rukum Users");
$org_image = $this->session->userdata['org_image'];
?>
<div id="usergid" value="<?=$usergroup?>" data-usergrouplength="<?=$usergrouplength?>" style="display: none"></div>
<header class="main-header">
  <div class="main-header__content">
  <!-- Logo -->
    <?php 
      $sname=$_SERVER['SERVER_NAME'];
      $sname=explode(".",$sname);
      if($sname[0]=='myclass')
      {
        $logo=base_url(IMG_PATH).'/eclass.png';
        $logo_style='    
        width: 90%;';
      }
      else
      {
        $logo=base_url(IMG_PATH).'/hos-logo.png';
        $logo_style='padding-top: 10px;';
      }
    if(!($usergrouplength == 1 && $usergroupcond)){ ?>
      <div class="main-header__logo">
          <a href="<?= base_url('/')?>">
              <img src="<?php echo  base_url('/');?>/pics/logo.png" alt="midaseCLASS"/>
          </a>
      </div>
      <?php }?>

      <div class="main-header__action">

        
        <?php 
          if(isRukumUsers()){?>
    
          <select name="language" class="form-control languages language" style="margin-top: 10px;">
            <option value="np" <?=$this->session->userdata('language') == 'np'?'selected':''?>>NP</option>
            <option value="en" <?=$this->session->userdata('language') == 'en'?'selected':''?>>EN</option>
          </select>
          
        <?php }?>
        <?php if($sname[0]=='myclass'):?>
       
          <a href="<?=base_url();?>" class="btn"><i class="fa fa-home"></i><span>Dashboard</span></a>
        
        <?php endif;?>
  
          <?php
            if(@$user->user_image && file_exists(APPPATH."../uploads/".$user->user_image))
              $org_src = base_url()."uploads/".$user->user_image;
            else if(@$lorg->image && file_exists(APPPATH."../uploads/".$lorg->image))
              $org_src = base_url()."uploads/".$lorg->image;    
        else if(@$org_image && file_exists(APPPATH."../uploads/".$org_image))
        $org_src = base_url()."uploads/".$org_image;	
            else
              $org_src = base_url().'images/school-logo.jpg';

              $defaultimg='https://test.siddhyog.org/wp-content/uploads/2018/11/person-dummy.jpg';

            ?>
         
            <div class="account">
              <div class="account__active">
                  <div class="account-image">
                    <img src="<?= $org_src ?>" onerror="this.onerror=null;this.src='<?=$defaultimg;?>';" alt="User Image" >
                  </div>
                  <div class="account-title">
                    <?=$this->session->userdata('username')?$this->session->userdata('username'):'Not Yet Logged In'?> 
                    
                  </div>
                  <div class="account-toggler"><i class="fa fa-chevron-down"></i></div>
              </div>
              <div class="account-dropdown">
                  <h2><?=$this->session->userdata('username')?$this->session->userdata('username'):'Not Yet Logged In'?></h2>
                  <ul>
                      <li>
                          <a href="<?php echo base_url().'login/profile';  ?>" >View Profile</a>
                      </li>

                      <li>
                          <a href="<?php echo base_url('login/logout'); ?>">Sign Out</a>
                      </li>
                  </ul>
              </div>
           </div>
    

        <div class="account-overlay"></div>
      </div>
    
  </div>
</header>
<style>
  .select2{
    width: 100% !important;
  }
</style>
<?php 
$seg1 = $this->uri->segment(1);
$seg2 = $this->uri->segment(2);
$segment =  $seg1.'/'.$seg2;
$saveorganizationurl = base_url().$segment.'/rukumdashboard/saveorganization';
?>
<div id="orgModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Select Organization</h4>
      </div>
      <div class="modal-body">

        <script src="<?php echo base_url(JS_PATH).'/template/dashboard/dashboard.js' ?>"></script>
        <script src="<?php echo base_url(JS_PATH).'/template/rukum/organization.js' ?>"></script>
        <div id="cl-wrapper">
          <div id="cl-wrapper" class="login-container">
            <div class="middle-login">
              <div class="block-flat">
                <div class=" no-bg">

                  <h4 class="text-center">
                    Please select an organization
                  </h4>
                  <div style="clear:both"></div>

                </div>
                <div>
                  <input type="hidden" name="midas" id="midas" value="<?=$this->session->userdata['midasuser'][0]->userid?>">
                  <form id="orgForm" style="margin-bottom: 0px !important;" class="form-horizontal" action="<?=$saveorganizationurl?>" method="POST">
                    <div class="">
                      <!-- <h4 class="title">Login Access</h4> -->
                      <h5 class="label label-danger display_block padding_10"></h5>
                      <div class="form-group">
                        <div class="col-sm-12">
                          <div class="input-group orghtml">
                            <span class="input-group-addon" style="padding:6px 12px;"><i class="fa fa-building-o" style="font-size: 16px;"></i></span>

                            <select class="form-control organizationchange" name="organizationid">
                              <option value="">---Select---</option>
                            </select>
                          </div>
                        </div>
                        <input type="hidden" class="organizationname" name="organizationname" value="">
                        <input type="hidden" class="address" name="address" value="">
                        <input type="hidden" class="districtname" name="districtname" value="">
                        <input type="hidden" class="organizationnamenep" name="organizationnamenep" value="">
                        <input type="hidden" class="addressnep" name="addressnep" value="">
                        <input type="hidden" class="districtnamenep" name="districtnamenep" value="">


                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button class="btn btn-primary btn-lte saveorganization" type="button" data-dismiss="modal">Set Organization</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
<script type="text/javascript">
  $(document).ready(function(){
    console.log($('.language').val());
    localStorage.setItem('language',$('.language').val());
    $(document).off('change','.languages');
    $(document).on('change','.languages',function(){
      // alert('changing');
      var lang = $(this).find('option:selected').val();
      var url = '/'+'4077/4077/'+'/login/setlanguagesession';
      var infoData = {currentlanguage:lang};
      $.post(url,infoData,function(res){
      // var response = JSON.parse(res);
      localStorage.setItem('language',lang);
      location.reload();
    })
    });
    $(document).off('click','.selectorganization');
    $(document).on('click','.selectorganization',function(){
      $('#orgModal').modal('show');
      fetchCommitteeOrg();
    });
  })
  
</script>

<script>
        $(function(){
            $(".main-header .account__active").on("click", function(){
                $(".main-header .account .account-dropdown").fadeToggle('300');
                $(".main-header .account-overlay").fadeToggle('300');
            })

            $(document).on("click", '.main-header .account-overlay', function(e){
                $(".main-header .account .account-dropdown").fadeOut('300');
                $(this).hide();
            })
        })
    </script>
