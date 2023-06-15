<h3>Merhaba {{ session()->get('customer')->name }},</h3>
<h3>rezervasyonunuz başarıyla oluşturuldu.</h3>
<h3>aşağıdaki qr kodu ile şarj istasyonuna giriş yapabilirsiniz.</h3>
<img src="{{ asset('assets/front/img/ionycharge.png') }}" width="300" height="300" alt="">