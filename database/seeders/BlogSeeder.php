<?php

namespace Database\Seeders;

use App\Models\Blog;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class BlogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Blog::create([
            'category_id'=> 1,
            'user_id'=> 1,
            'comment'=> 10,
            'view'=> 250,
            'name'=> 'Yazılımda İsimlendirme Kuralları',
            'slug'=> Str::slug('Yazılımda İsimlendirme Kuralları', '-'),
            'image'=> asset('img/blog/naming_convention.jpg'),
            'summary' => 'Programlamada isimlendirme kuralları kodunuzun okunurluğu için önemlidir.',
            'content'=> "<p>Programlamada naming convention'lar, kodun anlaşılır,
            düzenli ve bakımı kolay olmasını sağlar. İyi bir naming convention,
            diğer geliştiricilerin kodunuzu anlamasını kolaylaştırır ve hataları
            en aza indirir. Ayrıca, proje boyunca tutarlılık sağlar, kodun okunabilirliğini
            artırır ve kodunuzun daha iyi belgelendirilmesine yardımcı olur. İyi bir naming
            convention, programcıların kodu daha hızlı geliştirmelerine ve bakım yapmalarına
            yardımcı olur, böylece yazılım geliştirme süreçleri daha verimli hale gelir. Bu
            nedenle, naming convention'ların önemi büyüktür ve iyi bir yazılım mühendisi için
            temel bir prensip olarak kabul edilir.</p>",
        ]);

        Blog::create([
            'category_id'=> 2,
            'user_id'=> 2,
            'comment'=> 0,
            'view'=> 100,
            'name'=> 'Verilerimiz Her Gün Daha Çok Çalınıyor',
            'slug'=> Str::slug('Verilerimiz Her Gün Daha Çok Çalınıyor', '-'),
            'image'=> asset('img/blog/veri-guvenligi.jpg'),
            'summary' => 'Verilerimiz bizim kişiliğimizdir, onları dikkatsizce paylaşmak, evinizin kapısını kilitlememek gibidir.',
            'content'=> "<p>Veri güvenliği, bugünün dijital dünyasında önemli
            bir rol oynamaktadır. Veriler, şirketlerin, bireylerin ve
            hükümetlerin işleyişinde kritik bir varlık haline gelmiştir.
            Veri güvenliği, bu değerli bilgilerin yetkisiz erişimden, kötü
            niyetli saldırılardan ve veri kaybından korunmasını sağlar.

            Veri güvenliği, çeşitli önlemleri içerir. Bunlar arasında güçlü
            parolalar kullanma, iki faktörlü kimlik doğrulama, güvenilir
            şifreleme yöntemleri, güncel yazılım ve güvenlik yamalarını
            uygulama, veri yedekleme ve kurtarma planları oluşturma yer
            almaktadır. Ayrıca, veri güvenliği politikaları ve eğitimleriyle
            personelin bilinçlenmesi de büyük önem taşır.</p>",
        ]);

        Blog::create([
            'category_id'=> 3,
            'user_id'=> 1,
            'comment'=> 23,
            'view'=> 1000,
            'name'=> 'Yakında Sabit Disklere İhtiyaç Duymayacağız',
            'slug'=> Str::slug('Yakında Sabit Disklere İhtiyaç Duymayacağız', '-'),
            'image'=> asset('img/blog/bulut-bilisimi.jpg'),
            'summary' => 'Bulut bilişimin, işletmelere ve bireylere esneklik, ölçeklenebilirlik ve erişim kolaylığı sağladığı belirtilmiştir.',
            'content'=> "<p>Bulut bilişim, bilgi teknolojilerinde devrim
            yaratmış bir paradigma olarak öne çıkıyor. Bu yaklaşım, verilerin
            ve uygulamaların yerel sunucular yerine uzak sunucular üzerinde
            barındırılmasını temsil ediyor. Bulut bilişim, işletmelere ve
            bireylere daha fazla esneklik, ölçeklenebilirlik ve erişim
            kolaylığı sunuyor. Veriler ve uygulamalar herhangi bir cihazdan
            internet bağlantısıyla erişilebilir hale geliyor. Bu, iş
            sürekliliğini artırırken maliyetleri düşürüyor. Ayrıca, güvenlik
            ve veri yedeklemesi konularında da önemli avantajlar sunar. Bulut
            bilişim, geleceğin teknoloji altyapısını şekillendiriyor ve iş
            dünyasında dönüşümün anahtarı haline gelmiştir.</p>",
            'status'=> 'Pasif',
        ]);
    }
}
