<?php

namespace App\Console\Commands;

use App\Models\Hobbies;
use Illuminate\Support\Str;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Cache;

class CreateHobbyCron extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:create-hobby-cron';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $hobbies = [
            'Membaca',
            'Menulis',
            'Coding',
            'Desain',
            'Olahraga',
            'Musik',
        ];
        
        // $index = Cache::get('hobby_index', 0);

        // if ($index >= count($hobbies)) {
        //     $index = 0;
        // }

        // Hobbies::create([
        //     'hobby' => 'Hobby Auto ' . $hobbies[$index],
        // ]);

        // Cache::put('hobby_index', $index + 1);

        // $this->info('Hobby dibuat: ' . $hobbies[$index]);

        $index = 0;

        $this->info('Loop hobby dimulai... (CTRL + C untuk stop)');

        while (true) {

            if ($index >= count($hobbies)) {
                $index = 0;
            }

            Hobbies::create([
                'hobby' => $hobbies[$index],
            ]);

            $this->info('Hobby dibuat: ' . $hobbies[$index]);

            $index++;
            sleep(1);
        }
    }
}