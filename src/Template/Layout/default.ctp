<?
/**
 * @var \App\View\AppView $this
 * todo css
 */
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<?= $this->Html->charset() ?>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="author" content="Zach Hoeken / Justin Nesselrotte">
	<title><?= $this->fetch('title') ?> - <?= RR_PROJECT_NAME ?></title>
	<?= $this->Html->meta('icon') ?>

	<?= $this->fetch('meta') ?>
	<?= $this->fetch('css') ?>
	<?= $this->fetch('script') ?>
</head>
<body class="preview" data-spy="scroll" data-target=".subnav" data-offset="50">
<div class="container">


	<?= $this->cell('Menubar') ?>

	<section id="content" style="margin-top:60px">
		<? if ($this->fetch('title')): ?>
			<div class="page-header">
				<h1><?= $this->fetch('title') ?></h1>
			</div>
		<? endif ?>

		<div class="row">
			<div class="span12">
				<?= $this->fetch('content') ?>
			</div>
		</div>

		<br/><br/>

		<div class="alert alert-info">
			<strong>Hey You!</strong> If you run into any problems, please <a
				href="https://github.com/Hoektronics/BotQueue/issues/new">report a bug</a>. Make sure to include the
			<strong>bumblebee/info.log</strong> file if it is client-related.
		</div>

	</section>

	<footer>
		<div class="row">
			<div class="span6">
				<h3>Connect</h3>
				<a href="http://www.hoektronics.com">Blog</a><br/>
				<a href="https://twitter.com/hoeken">Twitter</a><br/>
				<a href="irc://irc.freenode.net/botqueue">Freenode #BotQueue</a><br/>
				<a href="https://groups.google.com/d/forum/botqueue">Google Group</a><br/>
			</div>
			<div class="span6">
				<h3>Info</h3>
				Made by Zach Hoeken and Justin Nesselrotte. (<a href="/about">about</a>)<br/>
				Software licensed under the <a href="http://www.gnu.org/copyleft/gpl.html">GPL v3.0</a>. Code at <a
					href="https://github.com/Hoektronics/BotQueue">GitHub</a>.<br/>
				&copy; <?= date("Y") ?> <a href="http://www.hoektronics.com"><?= COMPANY_NAME ?></a>. Powered by <a
					href="http://www.botqueue.com">BotQueue</a>.<br/>
				Page generated in <?= round(microtime(true) - TIME_START, 3) ?> seconds.
			</div>
		</div>
		<br/>
	</footer>

</div>

<script src="/js/botqueue.js"></script>
<script src="/bootstrap/2.3.0/js/bootstrap.js"></script>
<script src='https://www.google.com/recaptcha/api.js'></script>
</body>
</html>