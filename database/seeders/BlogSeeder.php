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
            'name'=> 'Yazılama Hangi Programlama Dili İle Başlamalıyım?',
            'slug'=> Str::slug('Yazılama Hangi Programlama Dili İle Başlamalıyım?'),
            'summary' => "Yazılıma adım atmak isteyenler için uygun başlangıç: İlk adımınızı atarken sizi en iyi yönlendirecek programlama dili hangisi? Bu blog, yazılım dünyasına giriş için doğru dil seçimi hakkında rehberlik ediyor.",
            'content'=> "<p>
            Günümüzde birçok programlama dili var. Gün geçtikçe teknolojinin hızla ilerlemesi ve yapay zekanın da yazılım dünyasına dahil olmasıyla birlikte, yazılım geliştiricilerinin kullandığı programlama dillerinde değişiklikler oluyor. Tam da şu anda yazılım dünyasına adım atmak isteyen bir yazılım geliştirici adayının aklına ilk takılan soru ise ‘Acaba hangi dil ile başlamalıyım?’ oluyor. Hadi bu soruyu birkaç başlık altında inceleyelim.
        </p>
        <hr>
        <h4>
            Programlama Dili Nedir?
        </h4>
        <p>
            İlk öğrenmemiz gereken kavram programlama dilinin ne olduğudur. Basit bir tanım yapmak gerekirse programlama dilleri, yazılım geliştiricileri ile bilgisayar arasında iletişim kuran yapıdır.&nbsp;
        </p>
        <p>
            Bilgisayarlar, elektrik sinyalinin var olup olmamasına bakarlar. Halk diline göre, bilgisayarların anladığı tek şey 0 ve 1 sayılarıdır. 0, elektrik sinyalinin olmadığını; 1 ise elektrik sinyalinin olduğunu ifade eder. Birçok 0 ve 1'i kombinasyonladığımızda bilgisayarın bir anlam çıkarmasına da makine dili deriz.&nbsp;
        </p>
        <p>
            Fakat günümüzde bırakın basit bir yazılım geliştirmeyi, bir cümleyi bile makine dilinde 0 ve 1'leri yan yana getirerek oluşturmak çok zahmetlidir. İşte tam da burada yazılım dilleri devreye girer. İnsan diline yakın metotlarla yazdığımız kodlar, programlama dilinin derleyicileri ile arka planda makine diline dönüştürülür.&nbsp;
        </p>
        <hr>
        <h4>
            Neden Birçok Programlama Dili Var?
        </h4>
        <p>
            Programlama dillerini bilgisayarlara benzetebiliriz. Nasıl ki her bilgisayar genel olarak benzer işleri yapsalar da hepsinin özelleştiği alanlar vardır, aynı şekilde programlama dillerinin de özelleştiği alanlar olabiliyor.&nbsp;
        </p>
        <p>
            Örneğin bir bilgisayar almak istediğimizde en başta baktığımız parametre, onu hangi amaçla kullanacağımızdır. Bir oyun bilgisayarı mı almalıyım, bir ofis bilgisayarı mı? Bilgisayarda tasarım programları mı çalıştıracağım, sadece internette mi gezineceğim?&nbsp;
        </p>
        <p>
            Nasıl ki ortalama özellikte bir bilgisayar aldığımızda hemen hemen her amaç için bilgisayarı kullanabiliyor olsak da, daha yüksek FPS alarak oyun oynamak için, bir oyun bilgisayarı tercih ediyoruz veya daha yüksek çözünürlükte tasarım yapmak için 4K çözünürlüklü ekrana sahip bir tasarım bilgisayarı tercih ediyoruz.
        </p>
        <p>
            İşte bunun gibi programlama dillerinin hemen hepsi ortak amaçlar için kullanılabilir. Fakat biz bir web uygulaması geliştirmek istediğimizde Java, PHP, C# gibi; yapay zeka geliştirmek ve veri işlemek için Python, R gibi; veri tabanı geliştirmek istediğimizde MSSQL, Oracle gibi programlama dillerini tercih ediyoruz.
        </p>
        <p>
            Bu durum aynı zamanda ortak bir kütüphanenin oluşmasını da sağlıyor. Kütüphane, programlama dillerini geliştiren insanların ücretsiz veya belli ücret karşılığında geliştirdikleri kod parçacıkları demek. Örneğin siz, kodunuzda türev alma hesaplamalarını kullanmak istiyorsunuz. Bu sizin projenizin tamamı olmasa da bir kısmında işinize yarayacak. Eğer daha önceden türev alacak fonksiyonu kodlayıp bir kütüphane içerisinde sizlere sunan bir kişi varsa, deyim yerindeyse Amerika'yı yeniden keşfetmek yerine o kütüphaneyi projenize dahil ederek işinizi daha hızlı görebilirsiniz.
        </p>
        <p>
            Buna binaen C++ dilinde de yapay zeka uygulaması geliştirilebiliriz. Fakat Python dilini kullanan insanların oluşturduğu yapay zeka kütüphaneleri, C++ dilinde oluşturulmuş kütüphanelerden çok daha fazla. Bu yüzden insanların bulunduğumuz zamanda, yapay zeka için Python programlama dilini kullanma olasılığı C++ dilinden çok daha yüksek.&nbsp;
        </p>
        <p>
            Tabi bu C++ dilini işlevsiz kılmıyor. Yani bu istatistiğe bakarak bundan sonra C++ kullanmayıp sadece Python kullanmalıyız kanısı yanlıştır. Çünkü bir dili tercih etmenin tek nedeni kütüphaneler değildir. Kütüphane sayısının yanı sıra; derleme hızı, teknik destek alabilmek, programlama dilini destekleyen ve kullanan kuruluşlar, programlama dilini geliştiren kişilerin programlama dilini sürekli güncel tutmaları ve yeni teknolojileri eklemeleri, maliyet durumları gibi birçok parametreye göre programlama dilleri tercih edilir.
        </p>
        <hr>
        <h4>
            O Zaman Hangi Dil İle Başlamalıyım?
        </h4>
        <p>
            Yazımızı özetlemek gerekirse bizim, programlama dili seçmedeki en önemli parametremiz <span style='color:hsl(0,0%,0%);'><strong>kullanım amacı</strong></span> olmalıdır. Geliştirmek istediğimiz proje bir mobil uygulama yazılımı ise ilk bakacağımız diller <i>Kotlin, Swift, Flutter, React Native</i>'dir. Eğer mobil uygulamamız hem Android hem IOS üzerinde çalışsın istiyorsak ve bunun için ayrı diller kullanmak istemiyorsak, o zaman <i>Kotlin </i>ve <i>Swift'i </i>eleyerek <i>Flutter </i>ve <i>React Native </i>diline bakabiliriz. Bu şekilde parametreleri arttırarak hangi dili seçeceğimize karar verebiliriz. Bu parametrelerin cevaplarını internette bulmak da bir hayli basit.
        </p>
        <p>
            Son olarak; asla bir programlama dilini, bir futbol takımını sever gibi sevmemeliyiz. Çünkü zamanla, eskiden popüler olmayan diller, son dönemde popüler olmuş bir uygulamanın geliştirilmesi ile veya bazı büyük firmaların kullanması ile beklenmedik bir popülerlik kazanabilir. Yeni aldığı güncellemeler ile çok daha hızlı veya optimize çalışmaya başlamış olabilir.&nbsp;
        </p>
        <p>
            Böyle bir durumda yazılım geliştiricisinin tutumu, her zaman yeniliğe açık olmalıdır. Çünkü hangi dil ile bir proje geliştirirseniz geliştirin aslında yaptığınız tüm işin kullanıcı ve bilgisayar arasında bir iletişim kurmak olduğunu fark edeceksiniz.&nbsp;
        </p>
        <hr>
        <p>
            Umarım paylaştığım bilgiler size yardımcı olmuştur. Blog ile ilgili fikirlerinizi yukarıda bulunan <strong>Benimle İletişime Geç </strong>sekmesine tıklayarak iletebilirsiniz. Bir sonraki yazılarda görüşmek üzere, hoşça kalın!
        </p>",
        ]);
    }
}
