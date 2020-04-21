<?php

use Illuminate\Database\Seeder;

class DeviceSeeder extends Seeder
{
    protected $devices = [
        [
            'status' => 'active',
            'location' => 'lalmatia',
            'size' => '23',
            'shop_id' => 'smb003',
            'iot_id' => 'iot005',
            'android_box_id' => 'abd004',
        ],
        [
            'status' => 'active',
            'location' => 'dhanmondi',
            'size' => '41',
            'shop_id' => 'smb001',
            'iot_id' => 'iot002',
            'android_box_id' => 'abd004',
        ],
        [
            'status' => 'inactive',
            'location' => 'mirpur-10',
            'size' => '35',
            'shop_id' => 'smb003',
            'iot_id' => 'iot013',
            'android_box_id' => 'abd002',
        ],
        [
            'status' => 'active',
            'location' => 'elephant road',
            'size' => '22',
            'shop_id' => 'slb002',
            'iot_id' => 'iot015',
            'android_box_id' => 'abd003',
        ],
        [
            'status' => 'inactive',
            'location' => 'paltan',
            'size' => '34',
            'shop_id' => 'smb003',
            'iot_id' => 'iot001',
            'android_box_id' => 'abd005',
        ],
        [
            'status' => 'inactive',
            'location' => 'motijheel',
            'size' => '28',
            'shop_id' => 'slb002',
            'iot_id' => 'iot005',
            'android_box_id' => 'abd001',
        ],

    ];

    public function run()
    {
        foreach ($this->devices as $device) {
            App\Models\Ddad\Device::create($device);
        }
    }
}
