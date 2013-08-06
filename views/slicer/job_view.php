<? if ($megaerror): ?>
	<?= Controller::byName('htmltemplate')->renderView('errorbar', array('message' => $megaerror))?>
<? else: ?>
  <?= Controller::byName('htmltemplate')->renderView('errorbar', array('message' => "This page is obsolete."))?>
<? endif ?>