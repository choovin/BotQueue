<?
  require("../extensions/global.php");
  $start_time = microtime(true);
  
  $database = "devqueue";
  
  //dump our production database
  echo "Dumping backup data.\n";
  $cmd = "/usr/bin/mysqldump -u root {$database} > {$database}-v0.4.sql";
  passthru($cmd);
  
  //overwrite our dev database
  echo "Creating new tables.\n";
  $cmd = "/usr/bin/mysql -u root {$database} < 0.4-to-0.5-pre.sql";
  passthru($cmd);
  
  // get our slicejobs lined up.
  echo "Populating meta_jobs from slice_jobs\n";
  $rs = db()->query("SELECT * FROM slice_jobs");
  while ($row = $rs->fetch_assoc())
  {
    $sj = new SliceJob($row['id']);
    $j = $sj->getJob();
    
    $mj = new MetaJob();
    $mj->set('bot_id', $j->id);
    $mj->set('job_id', $sj->get('job_id'));
    $mj->set('subjob_id', $sj->id);
    $mj->set('subjob_type', 'slice');
    
    if ($sj->get('status') == 'available')
      $mj->set('status', 'available');      
    else if ($sj->get('status') == 'slicing')
      $mj->set('status', 'taken');      
    else if ($sj->get('status') == 'pending')
      $mj->set('status', 'qa');      
    else if ($sj->get('status') == 'complete')
      $mj->set('status', 'pass'); 
    else if ($sj->get('status') == 'failure')
      $mj->set('status', 'fail');   
    else if ($sj->get('status') == 'expired')
    {
      $mj->set('status', 'pass');
      $sj->set('is_expired', 1);
    }
    
    $mj->set('output_log', $sj->get('output_log'));
    $mj->set('error_log', $sj->get('error_log'));
    $mj->set('add_date', $sj->get('add_date'));
    $mj->set('taken_date', $sj->get('taken_date'));
    $mj->set('finish_date', $sj->get('finish_date'));
    $mj->set('qa_date', $sj->get('finish_date'));
    
    $mj->save();
    
    $sj->set('metajob_id', $mj->id);
    $sj->save(); 
    
    $j->set('slicejob_id', $mj->id);
    $j->save();
  }
  
  // get our printjobs lined up.
  echo "Populating print_jobs / meta_jobs from jobs\n";
  $rs = db()->query("SELECT * FROM jobs");
  while ($row = $rs->fetch_assoc())
  {
    $j = new Job($row['id']);
    
    if ($j->get('file_id'))
    {
      $pj = new PrintJob();
      $pj->set('file_id', $j->get('file_id'));
      $pj->save();
      
      $mj = new MetaJob();
      $mj->set('bot_id', $j->get('bot_id'));
      $mj->set('job_id', $j->id);
      $mj->set('subjob_id', $pj->id);
      $mj->set('subjob_type', 'print');

      if ($j->get('status') == 'available')
        $mj->set('status', 'available');      
      else if ($j->get('status') == 'taken')
        $mj->set('status', 'taken');      
      else if ($j->get('status') == 'downloading')
        $mj->set('status', 'taken');
      else if ($j->get('status') == 'slicing')
        $mj->set('status', 'available');
      else if ($j->get('status') == 'qa')
        $mj->set('status', 'qa');
      else if ($j->get('status') == 'complete')
        $mj->set('status', 'pass'); 
      else if ($j->get('status') == 'failure')
        $mj->set('status', 'fail');   
      else if ($j->get('status') == 'canceled')
        $mj->set('status', 'canceled');

      $mj->set('add_date', $j->get('created_time'));
      $mj->set('taken_date', $j->get('taken_time'));
      $mj->set('finish_date', $j->get('finished_time'));
      $mj->set('qa_date', $j->get('verified_time'));

      $mj->save();

      $pj->set('metajob_id', $mj->id);
      $pj->save(); 

      $j->set('printjob_id', $mj->id);
      $j->save();
    }
  }

  //modify tables and delete stuff
  echo "Finalizing database format.\n";
  $cmd = "/usr/bin/mysql -u root {$database} < 0.4-to-0.5-post.sql";
  passthru($cmd);
  
  //finished!!!!
  echo "\nv0.4 to v0.5 upgrade complete in " . round((microtime(true) - $start_time), 2) . " seconds.\n";
?>