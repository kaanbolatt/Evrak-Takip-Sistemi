AppServ kurulumu

Çalışma Appserv'e göre tasarlanmıştır.
Güvenli bir şekilde Appserv indirmek için aşağıdaki bağlantıyı kullanabilirsiniz.
https://www.appserv.org/en/

Proje kurulumu

RAR'ın içerisindeki dosyaları C->AppServ->www'nin içerisine çıkartalım. (deneme.rar) 
Daha sonrasında rarın içerisindeki sql dosyasını localhost/phpmyadmin'e entegre edelim.
Entegre ettikten sonra, www'nin içerisindeki deneme klasörüne giriş sağlayalım.
Klasörde 3 adet SQL baglan.php bulunmaktadır. Bunların hepsini değiştirmemiz lazım aksi halde proje çalışmayacaktır.
Bunların bir tanesi ana dizinde bulunan deneme'nin içerisinde baglan.php.
Diğeri deneme->nedmin->netting'in içerisinde bulunan baglan.php
Ve son olarak iste deneme->nedmin->production'un içerisinde bulunan baglan.php'dir.