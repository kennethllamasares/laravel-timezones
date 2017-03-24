<?php

namespace KennethLlamasares\Timezones\Console;
use Illuminate\Console\Command;

class SeedTimezones extends Command
{
    protected $signature = 'timezones:seed';
    protected $description = 'Command description.';

    public function fire()
    {
        $data = json_decode(file_get_contents(__DIR__ . '/../../resources/timezones.json'), true);

        \DB::table(\Config::get('timezones.table_name'))->truncate();

        foreach ($data as $tzs) {
            foreach ($tzs as $offset => $timezones) {
                foreach ($timezones as $timezone) {
                    \DB::table(\Config::get('timezones.table_name'))->insert(array(
                        'label' => $timezone['label'],
                        'value' => $timezone['value'],
                        'offset' => $offset
                    ));
                }
            }
        }

        $this->getOutput()->writeln('<info>Seeded:</info> Timezones');
    }
}