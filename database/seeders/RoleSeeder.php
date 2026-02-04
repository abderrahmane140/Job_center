<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;


class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $recruiter = Role::create(['name' => 'recruiter']);    
        $jobSeeker = Role::create(['name' => 'job_seeker']);

        //Permissions
        $permissions = [
            'create job offer',
            'edit job offer',
            'close job offer',
            'apply job',
            'view applications',
            'edit cv',
        ];

        foreach ($permissions as $permission) {
            Permission::firstOrCreate(['name' => $permission]);
        }


         // Assign permissions
        $recruiter->givePermissionTo([
            'create job offer',
            'edit job offer',
            'close job offer',
            'view applications',
        ]);

        $jobSeeker->givePermissionTo([
            'apply job',
            'edit cv',
        ]);
    }
}
