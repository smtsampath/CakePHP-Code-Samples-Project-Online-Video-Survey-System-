Hi <?php echo $user['fullname']; ?>,

Someone has requested a password reset on your account. In order to reset your password please click on the link below:

<?php echo Router::url(array('action' => 'forgotten_password', 'password_reset' => $user['password_reset']), true)."\n"; ?>

Regards,
Flipit Media (Pvt) Ltd.