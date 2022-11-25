<?php
/**
* Created by Claudio Campos.
* User: callcocam@gmail.com, contato@sigasmart.com.br
* https://www.sigasmart.com.br
*/
namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Tall\Theme\Contracts\IStatus;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /**
         *@var $statusModel Builder
         */
        $statusModel = app(IStatus::class);

        $statusModel->query()->forceDelete();
        $statusModel->factory()->create([
            'name'=>'Published'
        ]);
        $statusModel->factory()->create([
            'name'=>'Draft'
        ]);
    }
}
