<?=doctype('html')?>
<?php 
$default=$this->config->item('default');
$default_items=$this->config->item($default);
$title=element('title',$default_items);
?>
<html dir="ltr" lang="en-US">
<head>
	<title><?=ucwords($title)?></title>
	<?php
	define('ASSETS_PATH','extra/');
	define('CSS_PATH',ASSETS_PATH.'css_new/');
	define('JS_PATH',ASSETS_PATH.'js/');
	define('IMG_PATH',ASSETS_PATH.'images/');
	echo meta('content-type','text/html; charset=utf-8','equiv');
	$common_items=$this->config->item('common');
	$common_meta=element('meta',$common_items);
	$default_meta=element('meta',$default_items);
	if($common_meta && $default_meta)
		$meta=array_merge($common_meta,$default_meta);
	else if($common_meta)
		$meta=$common_meta;
	else
		$meta=$default_meta;

	if(isset($meta) && is_array($meta))				
		foreach($meta as $k=>$v)					
			echo meta($k,$v); 
		?>
		<link rel="icon" type="image/png" href="images/favicon.png">
		<!-- Latest compiled and minified CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
		<!-- Optional theme -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

		<script src="<?php echo base_url().'extra/theme/bower_components/jquery/dist/jquery.min.js' ?>"></script>
		<script src="<?php echo base_url(JS_PATH).'/default/bootstrap.min.js' ?>"></script>
		<script src="<?php echo base_url(JS_PATH).'/default/jquery.validate.js' ?>"></script>
		<script src="<?php echo base_url(JS_PATH).'/default/select2.min.js' ?>"></script>

		<style>

			
		</style>
		
		
	</head>
	<body class="login-body" style="overflow: hidden;">	

		<div class="container-fluid" style="overflow: hidden;">
			<div class="row">
				<div class="col-md-12" style="height: 36%; background-color: #42609B;">

				</div>	
			</div>

			<div class="row">
				<div class="col-md-12" style="height: 100%; background-color:#F1F1F1;">

				</div>	
			</div>

			<div class="row" style="background-color:#F1F1F1;">
				<div class="text-center out-links" style="width: 100%;position: absolute;bottom: 28px;">
					<?php if(@$isrukumlogin){?>
					<p style="font-size: 14px;">यो एप प्रयोग गर्न आवस्यक UserID र Password<br>
						सम्बन्धित बिध्यालयबाट प्राप्त गर्न सक्नुहुन्छ|</p>

						<p style="font-size: 14px;">You will get UserID and Password to use this App from your School</p>
						<?php }?>
						<h4 style="color:#42609b; font-weight:bold; font-size:13px; margin-bottom:0;">Technical Support (7AM to 9 PM)</h4>
						<h4 style="color:#42609b; font-weight:bold; font-size:13px;">
							9851184879, 9801181587, 01-4244461
						</h4>
					</div>
				</div>

				<div class="row">
					<div class="col-md-12" style="height: 5%; background-color: #42609B; position:absolute;bottom: 0;">
						<div class="col-md-2" style="padding: 7px;">
							<img src="images/login_logo.png" alt="" style="width:59px">
						</div>
						<div class="col-md-8">
							<p style="color:white; text-align: center; padding: 7px">Powered by <b>Midas Education Pvt.Ltd.</b></p>
						</div>
					</div>	
				</div>

				<div class="row">

					<div style="height:60%; background-color:#FFFFFF; position: absolute; top: 15%; width: 24%; margin-left: 38%; border-radius: 2%;box-shadow: 4px 4px rgba(165, 160, 160, 0.1);">
						<div class="col-md-12" style="padding-top: 23px;">
						<img src="images/school_final.jpg" alt="" style="width: 100%">
							<?php if(@$isrukumlogin){?>
							<p class="text-center" style="font-size: 16px;font-weight: bold;color: #08438a;">रुकुम पश्चिम</p>
							<?php }?>
						</div>
						<form id="frmlogin" action="login/authenticate" method="POST">
							<div class="col-md-12">
								<div class="form-body">
									<div class="form-group">
										<small class="control-label col-md-12" style="margin: 0;color: #aaa;">username</small>
										<div class="col-md-12">
											<input type="hidden" name="isrukumlogin" value="<?= @$isrukumlogin?>">
											<input type="text" placeholder="98XXXXXXXX" id="phone" class="form-control" name="phone" required autocomplete="off">
										</div>
									</div>
								</div>
							</div>

							<div class="col-md-12">
								<div class="form-body">
									<div class="form-group">
										<small class="control-label col-md-12" style="margin: 0;color: #aaa;">password</small>
										<div class="col-md-10">
											<input type="password" placeholder="Password" id="password" name="user_pass" required autocomplete="off" class="form-control" style="width: 268px;">
										   
										</div>
										<div class="col-md-2" style="margin-top: 10px;">
										<a href="javascript:void(0)" onclick="seepass()"><i class="fa fa-eye-slash see-pass"></i></a>
										</div>
									</div>
								</div>
							</div>

							<?php if($this->session->flashdata('err_msg')){?>
							<div class="col-md-12" style="padding: 0;">
								<div class="form-body">
									<div class="form-group" style="margin-bottom: 10px;padding: 0 4px;">
										<div class="col-md-offset-1 col-md-10 alert alert-danger" style="padding: 5px; margin-bottom: 0px">
											<p style="font-size: 12px"><?php echo $this->session->flashdata('err_msg');?></p>
										</div>
									</div>
								</div>
							</div>						
							<?php } ?>
							<div class="col-md-12">
								<div class="form-body">
									<div class="form-group">
										<div class="col-md-12">
											<button class="col-md-12 btn btn-primary" name="" class="form-control">Login</button>
										</div>
									</div>
								</div>
							</div>

						</form>
					<!-- <div class="col-md-12" style="padding-top: 32px;">
						<a class="pull-right" href="" style="color:black;">Lost Your Password</a>
					</div> -->
				</div>	
			</div>

		</div>
	</body>
	<script>
	function seepass()
{		
	
		var type = $('#password').attr('type');
      if (type == 'password') {
        $('#password').attr('type', 'text');
        $('.see-pass').removeClass('fa fa-eye-slash').addClass('fa fa-eye');
      } else if (type == 'text') {
        $('#password').attr('type', 'password');
        $('.see-pass').removeClass('fa fa-eye').addClass('fa fa-eye-slash');
      }
    }
	</script>
	</html>