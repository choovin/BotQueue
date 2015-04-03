<?
/**
 * @var \App\Model\Entity\User $user
 * todo Add the github fork banner if the user isn't logged in
 * todo Add the notification count
 * todo Add the logged in user stuff
 * todo Add admin menu
 */
?>
<section id="navbar">
	<div class="navbar navbar-fixed-top">
		<div class="navbar-inner">
			<div class="container">
				<div class="pull-right">
					<button type="button" class="btn btn-navbar" data-toggle="collapse" data-target="#menu-bar">
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
				</div>
				<a class="brand" style="margin-left:0" href="/"><?= RR_PROJECT_NAME ?></a>

				<div id="menu-bar" class="nav-collapse collapse">
					<ul class="nav">
						<li class="<?= ($area == 'dashboard') ? 'active' : '' ?>"><a href="/">Dashboard</a></li>
						<li class="<?= ($area == 'create') ? 'active' : '' ?> dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">Actions<b class="caret"></b></a>
							<ul class="dropdown-menu">
								<li><a href="/upload">Create Job</a></li>
								<li><a href="/bot/register">Register Bot</a></li>
								<li><a href="/queue/create">Create Queue</a></li>
							</ul>
						</li>
						<li class="<?= ($area == 'bots') ? 'active' : '' ?>"><a href="/bots">Bots</a></li>
						<li class="<?= ($area == 'queues') ? 'active' : '' ?>"><a href="/queues">Queues</a></li>
						<li class="<?= ($area == 'jobs') ? 'active' : '' ?>"><a href="/jobs">Jobs</a></li>
						<li class="<?= ($area == 'app') ? 'active' : '' ?>"><a href="/apps">App</a></li>
						<li class="<?= ($area == 'slicers') ? 'active' : '' ?>"><a href="/slicers">Slicers</a></li>
						<li class="<?= ($area == 'stats') ? 'active' : '' ?>"><a href="/stats">Stats</a></li>
						<li class="<?= ($area == 'help') ? 'active' : '' ?>"><a href="/help">Help</a></li>
						<? /** if (User::isAdmin()): ?>
							<li class="<?= ($area == 'admin') ? 'active' : '' ?> dropdown">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown">Admin<b
										class="caret"></b></a>
								<ul class="dropdown-menu">
									<li><a href="/admin">Admin Panel</a></li>
									<li><a href="/bots/live">Live view</a></li>
								</ul>
							</li>
						<? endif */ ?>
					</ul>
					<ul class="nav pull-right">
						<li class="divider-vertical"></li>
						<? if ($user): ?>
							<li class="dropdown">
								<a href="#" class="dropdown-toggle"
								   data-toggle="dropdown">Hello, <?= h($user['username']) ?>
									<b class="caret"></b>
								</a>
								<ul class="dropdown-menu">
									<li><a href="/preferences">Preferences</a></li>
									<li class="divider"></li>
									<li><a href="/logout">Log Out</a></li>
								</ul>
							</li>
						<? else: ?>
							<li>
								<a href="/login"
								   style="padding-left: 17px; background: transparent url('/img/lock_icon.png') no-repeat 0px center;">Log
									in</a>
							</li>
							<li><a href="/register">Sign up</a></li>
						<? endif ?>
					</ul>
				</div>
			</div>
		</div>
	</div>
</section>