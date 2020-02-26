<head>
	<title>Tweeter Homepage</title>
	<link rel="stylesheet" href="homepage.css">
</head>
<body>
<?= $this->extend('Templates/Base') ?>

<?= $this->section('content') ?>
	<div style="text-align: center;">
		<img src="tweeter_logo.png">
		<h1 class="mb-5">Welcome to Tweeter</h1>
		<p class="lead">Tweeter is a plaftorm for sharing your ideas in a Twit (Its a Tweet, but not) (Not associated with Twitter)</p>
		<?php if(is_loggedin()): ?>
		<p>You are logged in.</p>
		<a href="<?= site_url('account') ?>" class="btn btn-primary px-5">Continue to Tweeter</a>
		<?php else: ?>
		<p>Log in to see the magic</p>
		<a href="<?= site_url('account/login') ?>" class="btn btn-primary px-5">Login</a>
		<?php endif; ?>
	</div>
<?= $this->endSection() ?>
</body>
