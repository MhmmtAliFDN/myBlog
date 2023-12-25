<?php

namespace Database\Seeders;

use App\Models\Portfolio;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class PortfolioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Portfolio::create([
            'user_id' => 1,
            'category_id' => 1,
            'name' => 'Blog ve Portföy Projem',
            'slug' => Str::slug('Blog ve Portföy Projem'),
            'summary' => 'PHP, Laravel, HTML, CSS, Javascript, Bootstrap 5 ve MySQL gibi güçlü araçlar kullanarak oluşturduğum blog ve portföy sayfam.',
            'content' => '<h1>
            <span style="color:hsl(216,100%,40%);"><strong>Projelerimle Teknolojiye Dokunuş</strong></span>
        </h1>
        <p>
            <span style="color:hsl(0,0%,0%);">Merhaba dostlar! Bugün sizlere kendi ellerimle hayata geçirdiğim yeni bir projeden bahsetmek istiyorum. Kendi dijital dünyamı inşa ettiğim bu projede, sizlere üzerinde titizlikle çalıştığım projeleri, teknolojiyle ilgili yazılarımı ve daha fazlasını sunuyorum. Size biraz projemin bölümlerinden bahsetmek istiyorum.</span>
        </p>
        <hr>
        <h4>
            Ana Sayfa: Dijital Dünyama Hoş Geldiniz!
        </h4>
        <p>
            Ana sayfa, dijital dünyama hoş geldiniz demenin yanı sıra, sizi karşılayan bir tasarıma ve kullanıcı dostu bir arayüze sahiptir. Minimalist ve şık bir tasarım anlayışı ile sizleri projelerime yönlendirmeyi hedefledim.
        </p>
        <h4>
            Çalışmalarım: Projelerimle Tanışın
        </h4>
        <p>
            Bu sayfada, üzerinde özenle çalıştığım projeleri sizlere sunuyorum. Her biri benim için birer çocuk gibi, emek ve sevgiyle büyüdüler. Kullandığım teknolojiler arasında C#, Asp.NET, Angular, PHP, Laravel, HTML, CSS, Javascript, Flutter, MSSQL MySQL, SQLite ve Bootstrap 5 gibi güçlü araçlar yer alıyor. Bu teknolojiler sayesinde projelerimi daha işlevsel ve kullanıcı dostu hale getirmeyi başardım.
        </p>
        <h4>
            Teknoloji ve Ben: Blog Yazılarım
        </h4>
        <p>
            Teknoloji dünyası benim için bir tutku ve bu tutkuyu sizinle paylaşmak istedim. Blog yazılarımda, kullandığım teknolojilere dair deneyimlerimi, yeni gelişmeleri ve ilginç projeleri ele alıyorum. Siz de teknolojiye dair merakınızı ve bilgi seviyenizi artırmak için bu yazılara göz atabilirsiniz.
        </p>
        <h4>
            Hakkımda: Biraz Daha Yakından Tanıyın
        </h4>
        <p>
            Merak edenler için hazırladığım bu sayfada, kim olduğumu, neden bu projeyi geliştirdiğimi ve hedeflerimi bulabilirsiniz. Dijital dünyamda nelerle meşgul olduğumu ve gelecekteki planlarımı paylaştım.
        </p>
        <h4>
            İletişim: Benimle İletişime Geçin
        </h4>
        <p>
            Eğer projelerimle ilgili sorularınız varsa, işbirliği teklifleri ile gelmek istiyorsanız ya da sadece merhaba demek istiyorsanız, iletişim sayfası sizin için. Benimle iletişime geçmekten çekinmeyin; yeni insanlarla tanışmak ve fikir alışverişi yapmak beni heyecanlandırıyor.
        </p>
        <hr>
        <p>
            Umarım dijital dünyama yaptığınız ziyaretten keyif alırsınız. Projelerimi keşfetmek ve teknolojiyle ilgili yazılarımı okumak için hazır mısınız? Daha fazlası için www.muhammetalifidan.com.tr<span style="background-color:hsl(0,0%,100%);"> </span>sizi bekliyor! Herkese teşekkür ederim, beraber büyüyeceğiz!
        </p>
        <p>
            O zaman şimdilik <span style="font-size:18px;"><code><strong>print("Goodbye")</strong></code></span>
        </p>',
            'status' => 'Aktif',
        ]);
    }
}
