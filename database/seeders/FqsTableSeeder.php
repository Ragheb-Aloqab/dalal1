<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FqsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('fqs')->insert([
            [
                'question' => 'كيف يمكنني البحث عن عقار على موقع دلال؟',
                'answer' => 'يمكنك استخدام شريط البحث لتحديد الموقع، نوع العقار، والمدى السعري. ستظهر لك قائمة بالعقارات المتاحة وفقًا لبحثك.'
            ],
            [
                'question' => 'هل يمكنني الحصول على مساعدة في تمويل شراء العقار؟',
                'answer' => 'نعم، نحن نقدم استشارات لتمويل العقارات ونساعدك في العثور على أفضل الخيارات التمويلية المتاحة.'
            ],
            [
                'question' => 'كيف يمكنني إدراج عقاري للبيع أو للإيجار؟',
                'answer' => 'يمكنك التسجيل في موقعنا وتقديم التفاصيل الخاصة بالعقار الذي ترغب في عرضه، وسنتولى الباقي.'
            ]
        ]);
    }
}
