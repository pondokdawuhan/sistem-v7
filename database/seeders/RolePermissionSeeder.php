<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        

      $permissions = ['super-admin', 'admin', 'guru', 'guru-piket', 'kurikulum', 'pendamping', 'wali-kelas', 'ketua-asrama', 'kesiswaan', 'kepala', 'keamanan', 'guru-ekstra', 'ketertiban', 'pengasuh', 'yayasan', 'pengurus'];

      
      foreach ($permissions as $permission) {
        Permission::create(['name' => $permission]);
      }
      // permissions end

      // roles start
        Role::create(['name' => 'Super Admin']);
        Role::create(['name' => 'Admin']);
        Role::create(['name'=> 'Guru']);
        Role::create(['name'=> 'Guru Piket']);
        Role::create(['name'=> 'Kurikulum']);
        Role::create(['name'=> 'Pendamping']);
        Role::create(['name'=> 'Wali Kelas']);
        Role::create(['name'=> 'Ketua Asrama']);
        Role::create(['name'=> 'Kesiswaan']);
        Role::create(['name'=> 'Kepala']);
        Role::create(['name'=> 'Keamanan']);
        Role::create(['name'=> 'Guru Ekstra']);
        Role::create(['name'=> 'Ketertiban']);
        Role::create(['name'=> 'Pengasuh']);
        Role::create(['name'=> 'Yayasan']);
        Role::create(['name'=> 'Pengurus']);
      // roles end

      // givePermissions start
        Role::findByName('Super Admin')->givePermissionTo('super-admin');

        Role::findByName('Admin')->givePermissionTo('admin');

        Role::findByName('Yayasan')->givePermissionTo('yayasan');

        Role::findByName('Pengasuh')->givePermissionTo('pengasuh');

        Role::findByName('Keamanan')->givePermissionTo('keamanan');

        Role::findByName('Ketertiban')->givePermissionTo('ketertiban');

        Role::findByName('Guru Ekstra')->givePermissionTo('guru-ekstra');

        Role::findByName('Kepala')->givePermissionTo('kepala');

        Role::findByName('Ketua Asrama')->givePermissionTo('ketua-asrama');

        Role::findByName('Kesiswaan')->givePermissionTo('kesiswaan');

        Role::findByName('Wali Kelas')->givePermissionTo('wali-kelas');
        
        Role::findByName('Kurikulum')->givePermissionTo('kurikulum');

        Role::findByName('Guru')->givePermissionTo('guru');

        Role::findByName('Guru Piket')->givePermissionTo('guru-piket');

        Role::findByName('Pendamping')->givePermissionTo('pendamping');

        Role::findByName('Pengurus')->givePermissionTo('pengurus');

        User::find(1)->assignRole('Super Admin');
    }
}
