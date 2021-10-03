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
		<link rel="preconnect" href="https://fonts.googleapis.com">
		<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
		<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

		<link href="https://fonts.googleapis.com/css2?family=Raleway:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">

		<script src="<?php echo base_url().'extra/theme/bower_components/jquery/dist/jquery.min.js' ?>"></script>
		<script src="<?php echo base_url(JS_PATH).'/default/bootstrap.min.js' ?>"></script>
		<script src="<?php echo base_url(JS_PATH).'/default/jquery.validate.js' ?>"></script>
		<script src="<?php echo base_url(JS_PATH).'/default/select2.min.js' ?>"></script>

		<style>
			/* font-family: 'Poppins', sans-serif; */
			/* font-family: 'Raleway', sans-serif; */
			.auth-screen{
				background:#F2F5FF;
				width:100%;
				min-height:100vh;
				font-family: 'Poppins', sans-serif; 
			}

			.auth-screen__content{
				max-width:525px;
				margin:0 auto;
				padding: 100px 0;
			}

			.auth-screen__content .content{
				background-color:#fff;
				padding:45px 60px;
				border-radius:10px;
				margin-bottom:20px;
				width:100%;
				box-shadow:0 0px 15px rgba(0, 0, 0, 0.09)
			}

			.auth-screen .logo{
				display:block;
				margin:0 auto 16px;
				text-align:center;
			}

			.auth-screen .logo-title{
				font-family: 'Raleway', sans-serif;
				font-weight: 800;
				color:#0C4CA1;
				margin:0;
				text-align:center;
			}

			.auth-screen .logo-subtitle{
				margin-bottom:35px;
				text-align:center;
				color:#676767;
				font-size:14px;
				font-family: 'Poppins', sans-serif; 
			}

		</style>
		
		
	</head>
	<body class="auth-screen">	
		<div class="container">
			<div class="auth-screen__content">
				<div class="logo">
					<svg width="234" height="51" viewBox="0 0 234 51" fill="none" xmlns="http://www.w3.org/2000/svg">
						<path d="M0.980957 41V12.2378H8.39307V15.5947C8.98389 14.4668 9.92383 13.509 11.2129 12.7212C12.5199 11.9155 14.0775 11.5127 15.8857 11.5127C19.5202 11.5127 22.1341 12.945 23.7275 15.8096C25.5537 12.945 28.4004 11.5127 32.2676 11.5127C35.4544 11.5127 37.8804 12.4705 39.5454 14.3862C41.2104 16.284 42.043 18.8263 42.043 22.0132V41H34.4697V23.7856C34.4697 22.1027 34.0669 20.7778 33.2612 19.811C32.4556 18.8263 31.3545 18.334 29.958 18.334C28.5615 18.334 27.4336 18.8263 26.5742 19.811C25.7148 20.7778 25.2852 22.1206 25.2852 23.8394V41H17.6851V23.5171C17.6851 21.9058 17.2912 20.6436 16.5034 19.7305C15.7157 18.7995 14.6235 18.334 13.2271 18.334C11.8306 18.334 10.7026 18.8263 9.84326 19.811C8.98389 20.7778 8.5542 22.1027 8.5542 23.7856V41H0.980957Z" fill="#CC9F0C"/>
						<path d="M45.1045 12.2378H53.2417L59.687 30.9829L66.186 12.2378H74.1084L59.4185 50.856H52.1406L56.1689 40.2749L45.1045 12.2378Z" fill="#CC9F0C"/>
						<path d="M78.5845 34.375L81.6191 32.4146C83.1768 35.3328 85.5579 36.792 88.7627 36.792C90.2487 36.792 91.502 36.3892 92.5225 35.5835C93.543 34.7599 94.0532 33.641 94.0532 32.2266C94.0532 31.4388 93.8473 30.7406 93.4355 30.1318C93.0238 29.5052 92.4777 29.0039 91.7974 28.6279C91.1349 28.234 90.374 27.8402 89.5146 27.4463C88.6553 27.0524 87.769 26.6943 86.856 26.3721C85.9608 26.0498 85.0835 25.647 84.2241 25.1636C83.3647 24.6623 82.5949 24.1252 81.9146 23.5522C81.2521 22.9793 80.715 22.2363 80.3032 21.3232C79.8914 20.3923 79.6855 19.3538 79.6855 18.208C79.6855 15.8447 80.5539 13.9648 82.2905 12.5684C84.0272 11.154 86.2204 10.4468 88.8701 10.4468C90.1413 10.4468 91.314 10.6348 92.3882 11.0107C93.4624 11.3688 94.3486 11.8433 95.0469 12.4341C95.7451 13.007 96.3091 13.5889 96.7388 14.1797C97.1864 14.7705 97.5176 15.3613 97.7324 15.9521L94.5366 17.7783C93.2834 15.3255 91.305 14.0991 88.6016 14.0991C87.2409 14.0991 86.113 14.4572 85.2178 15.1733C84.3226 15.8895 83.875 16.8473 83.875 18.0469C83.875 18.8167 84.0809 19.4971 84.4927 20.0879C84.9045 20.6787 85.4505 21.1621 86.1309 21.5381C86.8112 21.9141 87.5811 22.29 88.4404 22.666C89.2998 23.042 90.1771 23.3911 91.0723 23.7134C91.9854 24.0177 92.8716 24.4206 93.731 24.9219C94.5903 25.4053 95.3602 25.9424 96.0405 26.5332C96.7209 27.1061 97.2669 27.867 97.6787 28.8159C98.0905 29.7648 98.2964 30.8301 98.2964 32.0117C98.2964 34.5182 97.3743 36.5592 95.5303 38.1348C93.6862 39.7103 91.3587 40.498 88.5479 40.498C83.8213 40.498 80.5002 38.457 78.5845 34.375Z" fill="#0C4CA1"/>
						<path d="M101.761 25.4858C101.761 22.7108 102.396 20.1774 103.667 17.8857C104.939 15.5762 106.693 13.759 108.931 12.4341C111.169 11.1092 113.649 10.4468 116.37 10.4468C118.68 10.4468 120.676 10.8496 122.359 11.6553C124.042 12.4609 125.403 13.3651 126.441 14.3677L124.964 18.1006C124.463 17.5814 123.881 17.0801 123.218 16.5967C122.556 16.1133 121.598 15.6388 120.345 15.1733C119.091 14.7078 117.802 14.4751 116.478 14.4751C113.506 14.4751 111.062 15.5314 109.146 17.644C107.23 19.7388 106.272 22.3527 106.272 25.4858C106.272 28.5832 107.266 31.1971 109.253 33.3276C111.241 35.4582 113.694 36.5234 116.612 36.5234C119.763 36.5234 122.601 35.2612 125.125 32.7368L126.441 36.416C126.083 36.792 125.635 37.1859 125.098 37.5977C124.561 37.9915 123.872 38.4302 123.03 38.9136C122.207 39.3791 121.213 39.755 120.049 40.0415C118.886 40.3459 117.677 40.498 116.424 40.498C113.631 40.498 111.115 39.8446 108.877 38.5376C106.639 37.2127 104.894 35.4045 103.641 33.1128C102.387 30.8211 101.761 28.2788 101.761 25.4858Z" fill="#0C4CA1"/>
						<path d="M131.812 39.7729V0H136.163V15.3076C136.897 13.9469 138.025 12.8011 139.546 11.8701C141.068 10.9212 142.76 10.4468 144.622 10.4468C147.845 10.4468 150.333 11.512 152.088 13.6426C153.86 15.7552 154.747 18.5034 154.747 21.8872V39.7729H150.396V21.7261C150.396 19.4881 149.76 17.7157 148.489 16.4087C147.236 15.0838 145.625 14.4214 143.655 14.4214C141.453 14.4214 139.654 15.1644 138.257 16.6504C136.861 18.1185 136.163 20.0342 136.163 22.3975V39.7729H131.812Z" fill="#0C4CA1"/>
						<path d="M160.037 25.4858C160.037 21.1711 161.46 17.5903 164.307 14.7437C167.172 11.8791 170.735 10.4468 174.996 10.4468C179.292 10.4468 182.846 11.8791 185.657 14.7437C188.486 17.6082 189.9 21.189 189.9 25.4858C189.9 29.7648 188.477 33.3366 185.63 36.2012C182.784 39.0658 179.221 40.498 174.942 40.498C172.113 40.498 169.562 39.8625 167.288 38.5913C165.032 37.3022 163.26 35.5119 161.971 33.2202C160.682 30.9285 160.037 28.3504 160.037 25.4858ZM164.468 25.4858C164.468 28.7085 165.453 31.3582 167.422 33.4351C169.392 35.494 171.898 36.5234 174.942 36.5234C178.003 36.5234 180.528 35.485 182.515 33.4082C184.502 31.3314 185.496 28.6906 185.496 25.4858C185.496 22.299 184.502 19.6582 182.515 17.5635C180.528 15.4688 178.003 14.4214 174.942 14.4214C171.898 14.4214 169.392 15.4777 167.422 17.5903C165.453 19.703 164.468 22.3348 164.468 25.4858Z" fill="#0C4CA1"/>
						<path d="M193.553 25.4858C193.553 21.1711 194.976 17.5903 197.823 14.7437C200.687 11.8791 204.25 10.4468 208.511 10.4468C212.808 10.4468 216.362 11.8791 219.173 14.7437C222.002 17.6082 223.416 21.189 223.416 25.4858C223.416 29.7648 221.993 33.3366 219.146 36.2012C216.299 39.0658 212.736 40.498 208.458 40.498C205.629 40.498 203.077 39.8625 200.804 38.5913C198.548 37.3022 196.775 35.5119 195.486 33.2202C194.197 30.9285 193.553 28.3504 193.553 25.4858ZM197.984 25.4858C197.984 28.7085 198.969 31.3582 200.938 33.4351C202.907 35.494 205.414 36.5234 208.458 36.5234C211.519 36.5234 214.043 35.485 216.031 33.4082C218.018 31.3314 219.012 28.6906 219.012 25.4858C219.012 22.299 218.018 19.6582 216.031 17.5635C214.043 15.4688 211.519 14.4214 208.458 14.4214C205.414 14.4214 202.907 15.4777 200.938 17.5903C198.969 19.703 197.984 22.3348 197.984 25.4858Z" fill="#0C4CA1"/>
						<path d="M228.975 39.7729V0H233.326V39.7729H228.975Z" fill="#0C4CA1"/>
					</svg>
				</div>
				<?php if(@$isrukumlogin){?>
				<p class="text-center" style="font-size: 16px;font-weight: bold;color: #08438a;">रुकुम पश्चिम</p>
				<?php }?>
				<div class="content">
					<h2 class="logo-title">Sign In</h2>
					<p class="logo-subtitle">Enter your login credentials below to continue.</p>
					<form id="frmlogin" action="login/authenticate" method="POST">
			

						<div class="form-group">
							<label class="control-label">username</label>
							<div>
								<input type="hidden" name="isrukumlogin" value="<?= @$isrukumlogin?>">
								<input type="text" placeholder="98XXXXXXXX" id="phone" class="form-control" name="phone" required autocomplete="off">
							</div>
						</div>
							
				
	
						<div class="form-group">
							<label class="control-label">password</label>
							<div class="input-group">
								<input type="password" placeholder="Password" id="password" name="user_pass" required autocomplete="off" class="form-control">
								<a href="javascript:void(0)" onclick="seepass()"><i class="fa fa-eye-slash see-pass"></i></a>
							</div>
						</div>

					

						<?php if($this->session->flashdata('err_msg')){?>
							<div class="form-group">
								<div class="alert alert-danger" >
									<p><?php echo $this->session->flashdata('err_msg');?></p>
								</div>
							</div>									
						<?php } ?>

			
						<div class="form-group">
						
							<button class="btn btn-primary" name="" class="form-control">Login</button>
						
						</div>
				
		

					</form>
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