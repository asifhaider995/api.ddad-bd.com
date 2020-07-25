<?php 
return array (
  0 => 
  array (
    'name' => 'dashboard_mode',
    'title' => 'Dashboard mode',
    'subtitle' => NULL,
    'type' => 'dropdown',
    'value' => 'st_dark_bg',
    'data' => 
    array (
      'options' => 
      array (
        0 => 
        array (
          'label' => 'Lignt mode',
          'value' => 'st_gray_bg',
        ),
        1 => 
        array (
          'label' => 'Dark mode',
          'value' => 'st_dark_bg',
        ),
      ),
    ),
    'created_at' => '2020-07-25T21:41:44.000000Z',
    'updated_at' => '2020-07-25T21:41:44.000000Z',
    'deleted_at' => NULL,
  ),
  1 => 
  array (
    'name' => 'packages',
    'title' => 'Packages',
    'subtitle' => 'Each line contain new package(PackageName,DailyMinutes,Rate/TV/Month)<br>Ex: HelloBoss,40,2200',
    'type' => 'textarea',
    'value' => 'SuperDuper,40,2200
QuickBoost,30,2000
',
    'data' => 
    array (
      'placeholder' => NULL,
      'max_length' => NULL,
      'min_length' => NULL,
      'is_required' => true,
    ),
    'created_at' => '2020-06-06T00:58:06.000000Z',
    'updated_at' => '2020-06-06T00:58:06.000000Z',
    'deleted_at' => NULL,
  ),
  2 => 
  array (
    'name' => 'placements',
    'title' => 'Placement',
    'subtitle' => 'Each line contain new placement,Placement title, placement duration',
    'type' => 'textarea',
    'value' => 'LongTime,40
ShortTime,30
',
    'data' => 
    array (
      'placeholder' => NULL,
      'max_length' => NULL,
      'min_length' => NULL,
      'is_required' => true,
    ),
    'created_at' => '2020-06-06T00:58:06.000000Z',
    'updated_at' => '2020-06-06T00:58:06.000000Z',
    'deleted_at' => NULL,
  ),
  3 => 
  array (
    'name' => 'queue_size',
    'title' => 'Queue size',
    'subtitle' => NULL,
    'type' => 'number',
    'value' => '30',
    'data' => 
    array (
      'placeholder' => NULL,
      'max_length' => NULL,
      'min_length' => NULL,
      'is_required' => true,
    ),
    'created_at' => '2020-06-06T00:58:06.000000Z',
    'updated_at' => '2020-06-06T00:58:06.000000Z',
    'deleted_at' => NULL,
  ),
  4 => 
  array (
    'name' => 'estimated_run_time',
    'title' => 'Estimated run time in one day',
    'subtitle' => 'Enter in minutes(System will convert it to hours)',
    'type' => 'number',
    'value' => '720',
    'data' => 
    array (
      'placeholder' => NULL,
      'max_length' => NULL,
      'min_length' => NULL,
      'is_required' => true,
    ),
    'created_at' => '2020-06-06T00:58:06.000000Z',
    'updated_at' => '2020-06-06T00:58:06.000000Z',
    'deleted_at' => NULL,
  ),
  5 => 
  array (
    'name' => 'loop_sync_content_url',
    'title' => 'Loop sync content url',
    'subtitle' => 'Upload content in campaign then stop this campaign only add video url here',
    'type' => 'text',
    'value' => 'http://ddad.test/storage/campaigns/2/videos/pAxo8kQPtKZbWeGwL8FpdwK4j4t0K71HcL4nOB9b.mp4',
    'data' => 
    array (
      'placeholder' => NULL,
      'max_length' => NULL,
      'min_length' => NULL,
      'is_required' => true,
    ),
    'created_at' => '2020-06-06T00:58:06.000000Z',
    'updated_at' => '2020-06-06T00:58:06.000000Z',
    'deleted_at' => NULL,
  ),
  6 => 
  array (
    'name' => 'can_admin_backup',
    'title' => 'Enable Backup',
    'subtitle' => 'for settings',
    'type' => 'switch',
    'value' => '1',
    'data' => 
    array (
    ),
    'created_at' => '2020-04-22T18:09:53.000000Z',
    'updated_at' => '2020-04-22T18:12:21.000000Z',
    'deleted_at' => NULL,
  ),
);