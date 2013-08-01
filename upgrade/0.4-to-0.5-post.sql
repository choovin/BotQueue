update bots set status = 'working' where status = 'slicing';
update bots set status = 'offline' where status = 'maintenance';
alter table bots change status enum('idle', 'working', 'paused', 'waiting', 'error', 'offline') default 'idle';

alter table slice_jobs drop user_id;
alter table slice_jobs drop uid;
alter table slice_jobs drop status;
alter table slice_jobs drop progress;
alter table slice_jobs drop add_date;
alter table slice_jobs drop taken_date;
alter table slice_jobs drop output_log;
alter table slice_jobs drop error_log;

alter table jobs drop status;
alter table jobs drop taken_time;
alter table jobs drop downloaded_time;
alter table jobs drop finished_time;
alter table jobs drop slice_complete_time;
alter table jobs drop verified_time;
alter table jobs drop slice_job_id;