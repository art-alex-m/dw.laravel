<?php

namespace Database\Seeders;

use App\Enum\RolesEnum;
use Database\Factories\UserFactory;
use Illuminate\Database\Seeder;

class SuperAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(UserFactory $userFactory)
    {
        /** @var \App\Models\User $admin */
        $admin = $userFactory->asSuperAdmin()->createOne();
        $admin->assignRole(RolesEnum::SUPER_ADMIN);
    }
}
