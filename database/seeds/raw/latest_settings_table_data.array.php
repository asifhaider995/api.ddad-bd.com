<?php
return array (
    3 =>
        array (
            'name' => 'queue_size',
            'title' => 'Queue size',
            'type' => 'number',
            'value' => "30",
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
    0 =>
  array (
    'name' => 'packages',
    'title' => 'Packages',
    'subtitle' => 'Each line contain new package(PackageName,DailyMinutes,Rate/TV/Month)<br>Ex: HelloBoss,40,2200',
    'type' => 'textarea',
    'value' => "SuperDuper,40,2200\nQuickBoost,30,2000\n",
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
      2 =>  array (
            'name' => 'placements',
            'title' => 'Placement',
            'subtitle' => 'Each line contain new placement,Placement title, placement duration',
            'type' => 'textarea',
            'value' => "LongTime,40\nShortTime,30\n",
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
  1 =>
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
