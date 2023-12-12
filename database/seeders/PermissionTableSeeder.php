<?php
namespace Database\Seeders;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Permissions
        $permissions = [
        'الرئيسية',
        'قائمة_تقارير_الطلاب',
        'المستخدمين',
        
        'اول',
        'ثاني',
        'ثالث',
        'رابع',
        'خامس',
        'سادس',
        'سابع',
        'ثامن',
        'تاسع',

        'كل_الطلاب',
        'طلاب_مستمرين',
        'طلاب_منقطعين',

        'قائمة_المستخدمين',
        'صلاحيات المستخدمين',

        'تقرير_الحضور_والغيب',

        'اضافة مستخدم',
        'تعديل مستخدم',
        'حذف مستخدم',

        'عرض صلاحية',
        'اضافة صلاحية',
        'تعديل صلاحية',
        'حذف صلاحية',
        ];
        
        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }
    }
}
