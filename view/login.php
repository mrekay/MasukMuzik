<div class="login-container">

    <div class="login-box">
        <div class="login-box-header">
            <img src="assets/images/logo.png" style="height: 64px">
            MaşukMuzik
        </div>
        <form id="login-form" class="login-box-content">
            <div class="h6 mb-5">Giriş Yap</div>
            <div class="login-input-wrapper">
                <label>Kullanıcı adı</label>
                <input name="username" class="form-control" placeholder="Kullanıcı Adı">
            </div>
            <div class="login-input-wrapper">
                <label>Parola</label>
                <input type="password" name="password" class="form-control" placeholder="Parola">
                <a href="/forgot-password" class="text-primary btn">Parolamı unuttum</a>
            </div>
        </form>

        <div class="login-box-footer mt-5">
            <div class="h-6 d-flex align-items-center">Hesabın yok mu? <a href="/register" class="btn text-primary">Kayıt ol</a></div>
            <div class="btn btn-primary" onclick="login()">Giriş Yap</div>
        </div>
    </div>

</div>