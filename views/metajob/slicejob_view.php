<? if ($mj->get('status') == 'qa'): ?>
  <h2>Oh no!  Something went wrong with the slicing process.</h3>

  <div class="alert alert-error">
    <p>You should download the <a href="<?=$outputfile->getRealUrl()?>">output file</a> and verify that it is correct or not with the GCode Viewer below.</p>
    <p>Here is the error that the slice engine reported:</p>
    <blockquote><?= nl2br(Utility::sanitize($sj->get('error_log')))?></blockquote>
  </div>

  <div class="row">
    <div class="span6">
        <div class="alert alert-success">
          <input type="hidden" name="submit" value="1">
          <a class="btn btn-large btn-success" style="float:right;" href="<?=$mj->getUrl()?>/pass">PASS</a>
          <span>If everything is okay, click <strong>Pass</strong>.<br/> The slice job will be marked as good and your bot will run it.</span>
        </div>
      </form>
    </div>
    <div class="span6">
      <div class="alert alert-error">
        <a class="btn btn-large btn-danger" style="float:right;" href="<?=$mj->getUrl()?>/fail">FAIL</a>
        <span>If there are problems, click <strong>Fail</strong>.<br/> The job will be cancelled and your bot will move onto the next job.</span>
      </div>
    </div>
  </div>
<? endif ?>

<div class="row">
	<div class="span6">
	  <h3>Input File: <?=$inputfile->getLink()?></h3>
	  <iframe id="input_frame" frameborder="0" scrolling="no" width="100%" height="400" src="<?=$inputfile->getUrl()?>/render"></iframe>
	</div>
	<div class="span6">
	  <h3>Output File: <?=$outputfile->getLink() ?></h3>
	  <? if ($outputfile->isHydrated()): ?>
		  <iframe id="output_frame" frameborder="0" scrolling="no" width="100%" height="400" src="<?=$outputfile->getUrl()?>/render"></iframe>
    <? else: ?>
      Output file does not exist yet.
    <? endif ?>
	</div>
</div>
  
<div class="row">
	<div class="span12">
	  <h3>Detailed Information</h3>
		<table class="table table-striped table-bordered table-condensed">
			<tbody>
				<tr>
					<th>Slice Job:</th>
					<td><?=$mj->getName() ?></td>
				</tr>
				<tr>
					<th>Status:</th>
					<td><?=$sj->getStatusHTML() ?></td>
				</tr>
				<tr>
					<th>Slice Engine:</th>
					<td><?=$engine->getLink() ?></td>
				</tr>
				<tr>
					<th>Slice Config:</th>
					<td><?=$config->getLink() ?></td>
				</tr>				
				<tr>
					<th>Add Date:</th>
					<td><?=Utility::formatDateTime($mj->get('add_date'))?></td>
				</tr>
				<? if(strtotime($mj->get('taken_date')) > 0): ?>
					<tr>
						<th>Taken Date:</th>
						<td><?=Utility::formatDateTime($mj->get('taken_date'))?></td>
					</tr>
				<? endif ?>
				<? if(strtotime($mj->get('finish_date')) > 0): ?>
					<tr>
						<th>Finished Date:</th>
						<td><?=Utility::formatDateTime($mj->get('finish_date'))?></td>
					</tr>
				<? endif ?>
				<? if(strtotime($mj->get('qa_date')) > 0): ?>
					<tr>
						<th>QA Date:</th>
						<td><?=Utility::formatDateTime($mj->get('qa_date'))?></td>
					</tr>
				<? endif ?>
				<? if ($sj->get('output_log')): ?>
					<tr>
						<th>Output Log:</th>
						<td><?= nl2br(Utility::sanitize($sj->get('output_log'))) ?></td>
					</tr>
				<? endif ?>
				<? if ($sj->get('error_log')): ?>
          <tr>
						<th>Error Log:</th>
						<td><?= nl2br(Utility::sanitize($sj->get('error_log')))?></td>
					</tr>
				<? endif ?>
        <tr>
					<th>Slice Config Snapshot:</th>
					<td><button class="btn" onclick="$('#config_snapshot').show()">Click to display config snapshot information</button></td>
				</tr>
				<tr id="config_snapshot" style="display: none">
					<td colspan="2"><?= nl2br(Utility::sanitize($sj->get('slice_config_snapshot')))?></td>
				</tr>
			</tbody>
		</table>
	</div>
</div>