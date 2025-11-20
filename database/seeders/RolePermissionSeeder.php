<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;


class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // //crud
        // Permission::create(['name' => 'manage user']);
        // Permission::create(['name' => 'manage product']);
        // Permission::create(['name' => 'manage profile']);
        // Permission::create(['name' => 'manage kaldik']);

        // $permission = Permission::all();

        $admin = Role::create(['name' => 'admin']);
        $buyer = Role::create(['name' => 'buyer']);

        // $admin->syncPermissions($permission);
        // $buyer->givePermissionTo([
        //     'rekap presensi',
        //     'manage presensi',
        //     'manage jadwal',
        //     'manage hari_libur',
        //     'view all users',
        //     'melakukan presensi',
        //     'manage izin',
        //     'view all jadwal',
        //     'view all instansi',
        //     'view all hari_libur',
        //     'view self profile',
        //     'view self riwayat absen',
        //     'melakukan presensi',
        //     'view self jadwal',
        //     'view self izin',
        //     'manage users',
        //     'manage event',
        //     'view all event'
        // ]);



        // $userAdmin = User::factory()->create([
        //     "name" => '',
        //     'telp' => '081',
        //     'username' => 'admin1',
        //     'password' => '123',
        //     'uid_rfid' => '1234',
        //     'foto' => 'admin.jpg',
        // ]);
        // $userAdmin->assignRole('admin_yayasan');

        // $operator = User::factory()->make([
        //     "name" => 'Pak Operator',
        //     "telp" => '082',
        //     'username' => 'operator',
        //     'password' => '123',
        //     'uid_rfid' => '12345',
        //     'foto' => 'operator.jpg'
        // ]);
        // $operator->assignRole('operator_instansi');

        // $pendidik = User::factory()->make([
        //     "name" => 'Bu Pendidik',
        //     "telp" => '083',
        //     "username" => 'pendidik',
        //     'password' => '123',
        //     'uid_rfid' => '132',
        //     "foto" => 'pendidik.jpg'
        // ]);
        // $pendidik->assignRole('tenaga_pendidik');

        // $pendidikan = User::factory()->make([
        //     "name" => 'Bu Pendidikan',
        //     'telp' => '085',
        //     'username' => 'pendidikan',
        //     'password' => '123',
        //     "uid_rfid" => '145',
        //     "foto" => 'pendidikan.jpg'
        // ]);
        // $pendidikan->assignRole('tenaga_kependidikan');
    }
}
