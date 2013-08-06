<table class="table table-striped table-bordered table-condensed">
	<tbody>
    <tr>
      <th>Name</th>
      <th>Status</th>
      <th>Date</th>
    </tr>
    <? if (!empty($jobs)): ?>
      <? foreach ($jobs AS $row): ?>
        <? $sj = $row['SliceJob'] ?>
        <? $mj = $row['MetaJob'] ?>
        <tr>
          <td><?=$mj->getLink()?></td>
          <td><?=$sj->getStatusHTML()?></td>
          <? if ($mj->get('status') == 'available'): ?>
            <td><?=Utility::relativeTime($mj->get('add_date'))?></td>
          <? elseif ($mj->get('status') == 'taken'): ?>
            <td><?=Utility::relativeTime($mj->get('taken_date'))?></td>
          <? else: ?>
            <td><?=Utility::relativeTime($mj->get('finish_date'))?></td>
          <? endif ?>
        </tr>
      <? endforeach ?>
    <? else: ?>
      <tr>
        <td colspan="3"><strong>No slice jobs found!</strong></td>
      </tr>
    <? endif ?>
  </tbody>
</table>