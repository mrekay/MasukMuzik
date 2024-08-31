<?php

$user = new user();
if ($action == "login"){

    $username = $req->post('username');
    $password = $req->post('password');

    if (empty($username)) returnErrorMessage("Kullanıcı adı boş olamaz");
    if (empty($password)) returnErrorMessage("Şifre boş olamaz");

   $user_id = $user->loginCheck($username,sha1(md5($password)));
   if ($user_id > 0 ) {
       session::set('login', true);
       session::set('user_id', $user_id);
       returnSuccessMessage("Giriş başarılı");
   }else{
       returnErrorMessage("Kullanıcı adı veya şifre hatalı");
   }



}if ($action == "register"){

    $username = trim($req->post('username'));
    $name = trim( $req->post('name'));
    $surname =  trim($req->post('surname'));
    $password = $req->post('password');

    if (empty($username)) returnErrorMessage("Kullanıcı adı boş olamaz");
    if (empty($name)) returnErrorMessage("İsim boş olamaz");
    if (empty($surname)) returnErrorMessage("Soyisim boş olamaz");
    if (empty($password)) returnErrorMessage("Şifre boş olamaz");

    $hasUser =$user->hasUser($username);
    if ($hasUser) returnErrorMessage("Kullanıcı adı zaten kullanımda");

    if (strlen($password) < 6) returnErrorMessage("Şifre en az 6 karakter olmalıdır");
    if (!preg_match('/[A-Za-z].*[0-9]|[0-9].*[A-Za-z]/', $password)) returnErrorMessage("Şifre en az 1 harf ve 1 rakam içermelidir");
    if (str_contains($password, ' ')) returnErrorMessage("Şifre boşluk içeremez");
    if (str_contains($username, ' ')) returnErrorMessage("Kullanıcı adı boşluk içeremez");


   $user_id = $user->register($username,$name,$surname,sha1(md5($password)));
   if ($user_id > 0 ) {
       session::set('login', true);
       session::set('user_id', $user_id);
       returnSuccessMessage("Kayıt başarılı");
   }else{
       returnErrorMessage("Kayıt başarısız");
   }



} else if ($action == "update"){
    $name = $req->post('name');
    $surname = $req->post('surname');
    $password = $req->post('password');

    if (empty($name)) returnErrorMessage("İsim boş olamaz");
    if (empty($surname)) returnErrorMessage("Soyisim boş olamaz");

    $user->id =$CurrentUser->id;
    $user->name = $name;
    $user->surname = $surname;
    if (!empty($password)) {
        $user->password = sha1(md5($password));
    }

    $user->update();

    returnSuccessMessage("İşlem başarılı");



}else if ($action == "select"){
    $user->id = $CurrentUser->id;
    $user->select();

    $user_data =[
        'name'=>$user->name,
        'surname'=>$user->surname,
    ];

    returnSuccessMessage("İşlem başarılı", $user_data);

}


else{
    return returnErrorMessage("Geçersiz İşlem");
}