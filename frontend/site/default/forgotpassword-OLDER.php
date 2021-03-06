<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
    <meta name="description" content="admin-themes-lab">
    <meta name="author" content="themes-lab">
    <!--link rel="shortcut icon" href="http://my.campaigns.io/frontend/site/default/images/favicon.png" type="image/png"-->
    <link rel="shortcut icon" href="http://my.campaigns.io/themes/site/default/images/favicon.png" type="image/png">
    <title>Campaigns.io - re-discover your website</title>

    <link href="<?php echo base_url(); ?>assets/global/css/style.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/global/css/theme.css" rel="stylesheet">

    <link href="<?php echo base_url(); ?>assets/global/css/ui.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/global/css/bootstrap-social.css" rel="stylesheet">
    <script src='https://www.google.com/recaptcha/api.js'></script>

        
        
  </head>
  <body class="account separate-inputs" data-page="login">
<?php
if ($this->config->item('use_username')) {
	$login_label = 'Email or Username';
} else {
	$login_label = 'Email';
}
?>

<div class="container" id="login-block">
<div class="row">
  <div class="col-sm-6 col-md-4 col-md-offset-4">
  <div class="account-wall">
    <?php if(!empty($errors)) { if(is_array($errors)) {  ?>
    <div class="alert alert-danger  alert-dismissible fade in block-inner">
      <button class="close" data-dismiss="alert" type="button">&times;</button>
      <?php foreach($errors as $error) { echo '<p>'.$error.'</p>'; }  ?>
    </div>
    <?php } else { ?>
    <div class="alert alert-danger  alert-dismissible fade in block-inner">
      <button class="close" data-dismiss="alert" type="button">&times;</button>
      <?php echo $errors; ?></div>
    <?php } } ?>
    <?php if(isset($success) && $success!='') { ?>
    <div class="alert alert-success fade in block-inner alert-dismissible" role="alert">
      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      <?php echo $success; ?></div>
    <?php } ?>
    <?php if(isset($message) && $message!='') { ?>
    <div class="alert alert-success fade in block-inner alert-dismissible" role="alert">
      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      <?php echo $message; ?></div>
    <?php } ?>
    <?php $attributes = array('class' => 'validate', 'id' => 'sendActivation'); echo form_open($this->uri->uri_string(), $attributes) ?>
    <div class="login-block">
    <img class="logo-center" src="/assets/images/logo-dark.png" style="margin: 10px auto 20px; display: block;" alt="Campaigns.io" />
    <div class="form-group has-feedback">
      <label><?php echo $login_label; ?>: <span class="mandatory">*</span></label>
      <?php echo form_input($login); ?></div>
    <?php if ($captcha_forgetpassword) {

		if ($use_recaptcha) { /* Google Recaptcha Part*/?>
    <div class="form-group has-feedback">
      <label>Captcha:</label>
      <div class="g-recaptcha" data-size="normal" data-sitekey="<?php echo $this->config->item('recaptcha_sitekey'); ?>" style="transform:scale(0.88);transform-origin:0;-webkit-transform:scale(0.88);transform:scale(0.88);-webkit-transform-origin:0 0;transform-origin:0 0; 0"></div>
    </div>
    <?php } else { ?>
    <div class="form-group has-feedback">
      <label>Enter the code exactly as it appears:</label>
      <?php echo $captcha_html; ?></div>
    <div class="form-group has-feedback">
      <label>Confirmation Code</label>
      <?php echo form_input($captcha); ?> <i class="icon-shield form-control-feedback"></i> </div>
    <?php } } ?>
    <div class="row form-actions">
      <div class="col-xs-9"> <?php echo form_button($submit); ?> </div>
      <div class="col-xs-3"> </div>
    </div>
    <?php echo form_close(); ?> </div>
    </div>
    </div>
</div>
<?php $this->load->view(get_template_directory().'footer_new'); ?>
