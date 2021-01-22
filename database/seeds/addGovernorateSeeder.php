<?php

use App\District;
use App\Governorate;
use Illuminate\Database\Seeder;

class addGovernorateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $gov1 = Governorate::create([
            'name'=>'أربيل'
        ]);
            $gov1->districts()->create([
                'name'=>'قضاء أربيل'
            ]);
            $gov1->districts()->create([
                'name'=>'قضاء بنصلاوة '
            ]);
            $gov1->districts()->create([
                'name'=>'قضاء سوران'
            ]);
            $gov1->districts()->create([
                'name'=>'قضاء شقلاوة'
            ]);
            $gov1->districts()->create([
                'name'=>'قضاء جومان'
            ]);
            $gov1->districts()->create([
                'name'=>'قضاء كويسنجق'
            ]);
            $gov1->districts()->create([
                'name'=>'قضاء ميركسور'
            ]);
            $gov1->districts()->create([
                'name'=>'قضاء خبات'
            ]);


        $gov2 = Governorate::create([
            'name'=>'الأنبار'
        ]);
            $gov2->districts()->create([
                'name'=>'قضاء الرمادي'
            ]);
            $gov2->districts()->create([
                'name'=>'قضاء هيت'
            ]);
            $gov2->districts()->create([
                'name'=>'قضاء الفلوجة'
            ]);
            $gov2->districts()->create([
                'name'=>'قضاء عانة'
            ]);
            $gov2->districts()->create([
                'name'=>'قضاء حديثة'
            ]);
            $gov2->districts()->create([
                'name'=>'قضاء الرطبة'
            ]);
            $gov2->districts()->create([
                'name'=>'قضاء القائم'
            ]);
            $gov2->districts()->create([
                'name'=>'قضاء راوة'
            ]);
            $gov2->districts()->create([
                'name'=>'قضاء الخالدية'
            ]);
            $gov2->districts()->create([
                'name'=>'قضاء العامرية'
            ]);
            $gov2->districts()->create([
                'name'=>'قضاء الكرمة'
            ]);




        $gov3 = Governorate::create([
            'name'=>'بابل'
        ]);
            $gov3->districts()->create([
                'name'=>'قضاء الحلة'
            ]);
            $gov3->districts()->create([
                'name'=>'قضاء المحاويل'
            ]);
            $gov3->districts()->create([
                'name'=>'قضاء الهاشمية'
            ]);
            $gov3->districts()->create([
                'name'=>'قضاء المسيب'
            ]);
            $gov3->districts()->create([
                'name'=>'قضاء الحمزة الغربي'
            ]);
            $gov3->districts()->create([
                'name'=>'قضاء القاسم'
            ]);
            $gov3->districts()->create([
                'name'=>'قضاء كوثى'
            ]);
            $gov3->districts()->create([
                'name'=>'قضاء الإسكندرية'
            ]);
            $gov3->districts()->create([
                'name'=>'قضاء النيل'
            ]);
            $gov3->districts()->create([
                'name'=>'قضاء الكفل'
            ]);




        $gov4 = Governorate::create([
            'name'=>'بغداد'
        ]);
            $gov4->districts()->create([
                'name'=>'قضاء الرصافة'
            ]);
            $gov4->districts()->create([
                'name'=>'قضاء الأعظمية'
            ]);
            $gov4->districts()->create([
                'name'=>'قضاء الشعب'
            ]);
            $gov4->districts()->create([
                'name'=>'قضاء الصدر الاول'
            ]);
            $gov4->districts()->create([
                'name'=>'قضاء الصدر الثاني'
            ]);
            $gov4->districts()->create([
                'name'=>'قضاء المدائن'
            ]);
            $gov4->districts()->create([
                'name'=>'قضاء الحسينية'
            ]);
            $gov4->districts()->create([
                'name'=>'قضاء المعامل'
            ]);
            $gov4->districts()->create([
                'name'=>'قضاء الكرخ'
            ]);
            $gov4->districts()->create([
                'name'=>'قضاء الكاظمية'
            ]);
            $gov4->districts()->create([
                'name'=>'قضاء المحمودية'
            ]);
            $gov4->districts()->create([
                'name'=>'قضاء أبي غريب'
            ]);
            $gov4->districts()->create([
                'name'=>'قضاء الطارمية'
            ]);
            $gov4->districts()->create([
                'name'=>'قضاء الشعلة'
            ]);

        $gov5 = Governorate::create([
            'name'=>'البصرة'
        ]);
            $gov5->districts()->create([
                'name'=>'قضاء البصرة'
            ]);
            $gov5->districts()->create([
                'name'=>'قضاء أبي الخصيب'
            ]);
            $gov5->districts()->create([
                'name'=>'قضاء الزبير'
            ]);
            $gov5->districts()->create([
                'name'=>'قضاء القرنة'
            ]);
            $gov5->districts()->create([
                'name'=>'قضاء الفاو'
            ]);
            $gov5->districts()->create([
                'name'=>'قضاء شط العرب'
            ]);
            $gov5->districts()->create([
                'name'=>'قضاء المدينة'
            ]);
            $gov5->districts()->create([
                'name'=>'قضاء الدير'
            ]);




        $gov6 = Governorate::create([
            'name'=>'حلبجة'
        ]);
            $gov6->districts()->create([
                'name'=>'قضاء حلبجة'
            ]);
            $gov6->districts()->create([
                'name'=>'قضاء شاره زور'
            ]);
            $gov6->districts()->create([
                'name'=>'قضاء سيد صادق'
            ]);
            $gov6->districts()->create([
                'name'=>'قضاء بنجوين'
            ]);






        $gov7 = Governorate::create([
            'name'=>'دهوك'
        ]);
            $gov7->districts()->create([
                'name'=>'قضاء دهوك'
            ]);
            $gov7->districts()->create([
                'name'=>'قضاء سميل'
            ]);
            $gov7->districts()->create([
                'name'=>'قضاء زاخو'
            ]);
            $gov7->districts()->create([
                'name'=>'قضاء العمادية'
            ]);
            $gov7->districts()->create([
                'name'=>'قضاء بردرش'
            ]);
            $gov7->districts()->create([
                'name'=>'قضاء عقرة'
            ]);



        $gov8 = Governorate::create([
            'name'=>'القادسية'
        ]);
            $gov8->districts()->create([
                'name'=>'الديوانية'
            ]);
            $gov8->districts()->create([
                'name'=>'قضاء عفك'
            ]);
            $gov8->districts()->create([
                'name'=>'قضاء الشامية'
            ]);
            $gov8->districts()->create([
                'name'=>'قضاء الحمزة'
            ]);
            $gov8->districts()->create([
                'name'=>'قضاء البدير'
            ]);
            $gov8->districts()->create([
                'name'=>'قضاء سومر'
            ]);
            $gov8->districts()->create([
                'name'=>'قضاء الدغارة'
            ]);
            $gov8->districts()->create([
                'name'=>'قضاء نفر'
            ]);
            $gov8->districts()->create([
                'name'=>'قضاء السنية'
            ]);
            $gov8->districts()->create([
                'name'=>'قضاء الشافعية'
            ]);









        $gov9 = Governorate::create([
            'name'=>'ديالى'
        ]);
            $gov9->districts()->create([
                'name'=>'قضاء بعقوبة'
            ]);
            $gov9->districts()->create([
                'name'=>'قضاء المقدادية'
            ]);
            $gov9->districts()->create([
                'name'=>'قضاء الخالص'
            ]);
            $gov9->districts()->create([
                'name'=>'قضاء خانقين (ديالى)'
            ]);
            $gov9->districts()->create([
                'name'=>'قضاء بلدروز'
            ]);
            $gov9->districts()->create([
                'name'=>'قضاء كفري'
            ]);
            $gov9->districts()->create([
                'name'=>'قضاء خان بني سعد'
            ]);









        $gov10 = Governorate::create([
            'name'=>'ذي قار'
        ]);
            $gov10->districts()->create([
                'name'=>'قضاء الناصرية'
            ]);
            $gov10->districts()->create([
                'name'=>'قضاء الرفاعي'
            ]);
            $gov10->districts()->create([
                'name'=>'قضاء سوق الشيوخ'
            ]);
            $gov10->districts()->create([
                'name'=>'قضاء الجبايش'
            ]);
            $gov10->districts()->create([
                'name'=>'قضاء الشطرة'
            ]);
            $gov10->districts()->create([
                'name'=>'قضاء الدواية'
            ]);
            $gov10->districts()->create([
                'name'=>'قضاء الفهود'
            ]);
            $gov10->districts()->create([
                'name'=>'قضاء الفجر'
            ]);
            $gov10->districts()->create([
                'name'=>'قضاء النصر'
            ]);
            $gov10->districts()->create([
                'name'=>'قضاء الغراف'
            ]);
            $gov10->districts()->create([
                'name'=>'قضاء قلعة سكر '
            ]);







        $gov11 = Governorate::create([
            'name'=>'السليمانية'
        ]);
            $gov11->districts()->create([
                'name'=>'قضاء السليمانية (مركز المحافظة )'
            ]);
            $gov11->districts()->create([
                'name'=>'قضاء قره داغ'
            ]);
            $gov11->districts()->create([
                'name'=>'قضاء شارباريز'
            ]);
            $gov11->districts()->create([
                'name'=>'قضاء ماوت'
            ]);
            $gov11->districts()->create([
                'name'=>'قضاء بشدر'
            ]);
            $gov11->districts()->create([
                'name'=>'قضاء رانية'
            ]);
            $gov11->districts()->create([
                'name'=>'قضاء دوكان'
            ]);
            $gov11->districts()->create([
                'name'=>'قضاء دربندخان'
            ]);
            $gov11->districts()->create([
                'name'=>'قضاء كلار'
            ]);
            $gov11->districts()->create([
                'name'=>'قضاء جمجمال'
            ]);











        $gov12 = Governorate::create([
            'name'=>'صلاح الدين'
        ]);
            $gov12->districts()->create([
                'name'=>'قضاء تكريت (مركز المحافظة )'
            ]);
            $gov12->districts()->create([
                'name'=>'قضاء طوز خورماتو'
            ]);
            $gov12->districts()->create([
                'name'=>'قضاء سامراء'
            ]);
            $gov12->districts()->create([
                'name'=>'قضاء بلد'
            ]);
            $gov12->districts()->create([
                'name'=>'قضاء بيجي'
            ]);
            $gov12->districts()->create([
                'name'=>'قضاء الدور'
            ]);
            $gov12->districts()->create([
                'name'=>'قضاء الشرقاط'
            ]);
            $gov12->districts()->create([
                'name'=>'قضاء الدجيل'
            ]);
            $gov12->districts()->create([
                'name'=>'قضاء آمرلي'
            ]);








        $gov13 = Governorate::create([
            'name'=>'كركوك'
        ]);
            $gov13->districts()->create([
                'name'=>'قضاء كركوك'
            ]);
            $gov13->districts()->create([
                'name'=>'قضاء الحويجة'
            ]);
            $gov13->districts()->create([
                'name'=>'قضاء داقوق'
            ]);
            $gov13->districts()->create([
                'name'=>'قضاء دبس'
            ]);









        $gov14 = Governorate::create([
            'name'=>'كربلاء'
        ]);
            $gov14->districts()->create([
                'name'=>'قضاء كربلاء'
            ]);
            $gov14->districts()->create([
                'name'=>'قضاء عين تمر'
            ]);
            $gov14->districts()->create([
                'name'=>'قضاء الهندية'
            ]);
            $gov14->districts()->create([
                'name'=>'قضاء الحر'
            ]);








        $gov15 = Governorate::create([
            'name'=>'المثنى'
        ]);
            $gov15->districts()->create([
                'name'=>'قضاء السماوة (مركز المحافظة )'
            ]);
            $gov15->districts()->create([
                'name'=>'قضاء الرميثة'
            ]);
            $gov15->districts()->create([
                'name'=>'قضاء الخضر'
            ]);
            $gov15->districts()->create([
                'name'=>'قضاء الوركاء'
            ]);
            $gov15->districts()->create([
                'name'=>'قضاء السلمان'
            ]);








        $gov16 = Governorate::create([
            'name'=>'ميسان'
        ]);
            $gov16->districts()->create([
                'name'=>'قضاء العمارة'
            ]);
            $gov16->districts()->create([
                'name'=>'قضاء علي الغربي'
            ]);
            $gov16->districts()->create([
                'name'=>'قضاء الميمونة'
            ]);
            $gov16->districts()->create([
                'name'=>'قضاء قلعة صالح'
            ]);
            $gov16->districts()->create([
                'name'=>'قضاء المجر الكبير'
            ]);
            $gov16->districts()->create([
                'name'=>'قضاء الكحلاء'
            ]);









        $gov17 = Governorate::create([
            'name'=>'النجف'
        ]);
            $gov17->districts()->create([
                'name'=>'قضاء النجف (مركز المحافظة )'
            ]);
            $gov17->districts()->create([
                'name'=>'قضاء الكوفة'
            ]);
            $gov17->districts()->create([
                'name'=>'قضاء المناذرة'
            ]);
            $gov17->districts()->create([
                'name'=>'قضاء المشخاب'
            ]);
            $gov17->districts()->create([
                'name'=>'قضاء الحيدرية'
            ]);






        $gov18 = Governorate::create([
            'name'=>'نينوى'
        ]);
            $gov18->districts()->create([
                'name'=>'قضاء الموصل'
            ]);
            $gov18->districts()->create([
                'name'=>'قضاء الحمدانية'
            ]);
            $gov18->districts()->create([
                'name'=>'قضاء تلكيف'
            ]);
            $gov18->districts()->create([
                'name'=>'قضاء سنجار'
            ]);
            $gov18->districts()->create([
                'name'=>'قضاء تلعفر'
            ]);
            $gov18->districts()->create([
                'name'=>'قضاء الشيخان'
            ]);
            $gov18->districts()->create([
                'name'=>'قضاء الحضر'
            ]);
            $gov18->districts()->create([
                'name'=>'قضاء البعاج'
            ]);
            $gov18->districts()->create([
                'name'=>'قضاء مخمور'
            ]);






        $gov19 = Governorate::create([
            'name'=>'واسط'
        ]);
            $gov19->districts()->create([
                'name'=>'قضاء الكوت'
            ]);
            $gov19->districts()->create([
                'name'=>'قضاء النعمانية'
            ]);
            $gov19->districts()->create([
                'name'=>'قضاء الحي'
            ]);
            $gov19->districts()->create([
                'name'=>'قضاء بدرة'
            ]);
            $gov19->districts()->create([
                'name'=>'قضاء الصويرة'
            ]);
            $gov19->districts()->create([
                'name'=>'قضاء العزيزية'
            ]);










    }
}
