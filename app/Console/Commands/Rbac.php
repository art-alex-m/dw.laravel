<?php

namespace App\Console\Commands;

use App\Enum\PermissionsEnum;
use App\Enum\RolesEnum;
use Illuminate\Console\Command;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

/**
 * Class Rbac.
 *
 * @package App\Console\Commands
 */
class Rbac extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'rbac:init';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Refresh roles and permissions';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        Role::query()->truncate();
        Permission::query()->truncate();

        /** @var Role $superAdmin */
        $superAdmin = Role::create(['name' => RolesEnum::SUPER_ADMIN]);

        foreach (PermissionsEnum::listData() as $name => $description) {
            $permission = Permission::create(['name' => $name]);
            $superAdmin->givePermissionTo($permission);
        }

        return Command::SUCCESS;
    }
}
