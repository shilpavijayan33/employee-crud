<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Designation;

class DesignationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $designations=['CEO','CFO','Manager','Assisstant Manager','Chairman','Supervisor','Driver'];

        for ($i=0; $i < count($designations) ; $i++) { 
            $designation= new Designation();
            $designation->name=$designations[$i];
            $designation->save();
        }
    
       
        
    }
}
