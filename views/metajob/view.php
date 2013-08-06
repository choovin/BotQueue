<? if ($megaerror): ?>
	<?= Controller::byName('htmltemplate')->renderView('errorbar', array('message' => $megaerror))?>
<? else: ?>
  <? if ($metajob->get('subjob_type') == 'slice'): ?>
    <?= Controller::byName('metajob')->renderView('slicejob_view', array('metajob' => $metajob)) ?>
  <? endif ?>
<? endif ?>