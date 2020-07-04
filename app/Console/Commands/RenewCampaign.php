<?php

namespace App\Console\Commands;

use App\Models\Setting;
use Illuminate\Console\Command;

class CreateNewSetting extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'settings:create';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $title = $this->ask("Setting title (web)");
        $subtitle = $this->ask("Setting subtitle (web)");
        $settingKey = $this->ask("Setting name (db: snack_case)");
        $type = $this->getTypeOfSetting();
        switch ($type)
        {
            case 'color':
            case 'date':
            case 'email':
            case 'number':
            case 'password':
            case 'text':
            case 'textarea':
                $this->createInputSettings($settingKey, $title, $subtitle, $type);
                break;
            case 'radio':
            case 'dropdown':
                $this->createRadioSettings($settingKey, $title, $subtitle, $type);
                break;
            case 'checkbox':
                $this->createCheckboxSettings($settingKey, $title, $subtitle, $type);
                break;
            case 'switch':
                $this->createSwitchSettings($settingKey, $title, $subtitle, $type);
                break;
            case 'image':
                $this->createImageSettings($settingKey, $title, $subtitle, $type);
        }
    }




    private function getTypeOfSetting()
    {
        return $this->choice('What type of setting do you want to create?', config('setting.types'));
    }




    private function createInputSettings($settingKey, $title, $subtitle, $type)
    {
        $value =$this->ask('Initial value');
        $data = [
            'placeholder' => $this->ask("Place holder"),
            'max_length' => $this->ask("Max length"),
            'min_length' => $this->ask("Min length"),
            'is_required' => $this->confirm("Is required?"),
        ];
        return $this->createSetting($settingKey, $title, $subtitle, $type, $value, $data);
    }

    private function createImageSettings($settingKey, $title, $subtitle, $type)
    {
        $value =$this->ask('Image name relative to your Storage:url():');
        $data = [
            'height' => $this->ask("Height"),
            'weight' => $this->ask("Width"),
            'rounded' => $this->confirm("Is Rounded?"),
        ];
        return $this->createSetting($settingKey, $title, $subtitle, $type, $value, $data);
    }


    private function createRadioSettings($settingKey, $title, $subtitle, $type)
    {
        $options =  [];
        $index = 1;
        $this->info("Please insert available option for this radio");
        do {
            $options[] = [
                'label' => $this->ask("Label $index:"),
                'value' => $this->ask("Value $index:"),
            ];
            $index++;
        } while ($this->confirm("Do you want to add more options?", true));
        $data = [
            'options' => $options,
        ];
        $value = $this->choice("Which one is default value?", array_column($options, 'value'));

        return $this->createSetting($settingKey, $title, $subtitle, $type, $value, $data);
    }



    private function createCheckboxSettings($settingKey, $title, $subtitle, $type)
    {
        $options =  [];
        $index = 1;
        $this->info("Please insert available option for this radio");
        do {
            $options[] = [
                'label' => $this->ask("Label $index:"),
                'value' => $this->ask("Value $index:"),
                'checked' => $this->confirm("Checked $index:"),
            ];
            $index++;
        } while ($this->confirm("Do you want to add more options?", true));
        $data = [
            'options' => $options,
        ];
        $value = array_column(array_filter($options, function($option) {
            return $option['checked'];
        }), 'value');
        return $this->createSetting($settingKey, $title, $subtitle, $type, $value, $data);
    }




    private function createSwitchSettings($settingKey, $title, $subtitle, $type)
    {
        $data = [
//            'onlabel' => $this->anticipate('Switch on label:', ['True', 'On', 'Enabled', 'Ready']),
//            'offlabel' => $this->anticipate('Switch off label:', ['False', 'Off', 'Disabled', 'Not ready'])
        ];

        $value = $this->confirm("Is default switch on?");
        return $this->createSetting($settingKey, $title, $subtitle, $type, $value, $data);
    }



    private function createSetting($settingKey, $title, $subtitle, $type, $value, $data)
    {
        $setting = new Setting();
        $setting->name = $settingKey;
        $setting->title = $title;
        $setting->subtitle = $subtitle;
        $setting->type = $type;
        $setting->value = $value;
        $setting->data = $data;
        $setting->save();
        return $setting;
    }
}
