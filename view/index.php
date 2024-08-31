<div class="dashboard-container">
    <div class="dashboard-content">
        <div class="header">
            <div class="h5">
                Merhaba <?= $CurrentUser->name ??"Hoş geldiniz" ?>
            </div>
            <div class="user-menu">
                <div class="dropdown">

                    <?php if ($CurrentUser->id >0 ){?>
                    <div class="btn text-white dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                        <img src="/assets/images/user.png" class="user-photo">
                    </div>

                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item upload-playlist-music" onclick="showUpdateUser()" href="#"><i
                                        class="fa-solid fa-pen me-2"></i>Profilini Düzenle</a></li>
                        <li><a class="dropdown-item delete-playlist" href="/logout"><i class="fa-solid fa-door-open me-2"></i>
                                Çıkış yap</a></li>
                    </ul>
                    <?php }else{ ?>
                        <a href="/login" class="btn text-white">
                            <img src="/assets/images/user.png" class="user-photo">
                        </a>
                    <?php }?>
                </div>
            </div>
        </div>
        <div class="playlists-content">
            <div class="playlists-list-header-title">Oynatma Listelerin</div>
            <div class="playlists-list row">
                <?php if ($CurrentUser->id <=0 ){?>
                    <div class="col-12 d-flex justify-content-center">
                        <div class="alert mt-3">
                            <h5><i class="icon fas fa-warning"></i> Bilgilendirme!</h5>
                            Oynatma listelerini görüntülemek veya hemen oluşturmak için lütfen <a href="/login">giriş yapınız</a>.
                        </div>
                    </div>
                <?php }?>
            </div>
        </div>
        <div class="playlist-content" style="display: none">
            <div class="playlist-header">
                <div class="playlist-info">
                    <div class="btn text-white go-back-to-playlist">
                        <i class="fa-solid fa-arrow-alt-circle-left"></i>
                    </div>
                    <div class="playlist-logo">
                        <img src="assets/images/playlist_bg.png" height="96">
                    </div>
                    <div class="playlist-title">Playlist Adı</div>
                </div>
                <div class="playlist-menu">
                    <div class="dropdown">
                        <div class="btn text-white dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fa-solid fa-bars fs-5"></i>
                        </div>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item upload-playlist-music" onclick="showUploadMusic()" href="#"><i
                                            class="fa-solid fa-upload me-2"></i>Müzik Yükle</a></li>
                            <li><a class="dropdown-item edit-playlist"  href="#"><i class="fa-solid fa-pen me-2"></i>Düzenle</a>
                            </li>
                            <li><a class="dropdown-item delete-playlist" onclick="deletePlayList()" href="#"><i class="fa-solid fa-times me-2"></i>Çalma
                                    Listesini sil</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <table class="playlist-musics-table table table-striped table-dark">
                <tbody>
                <tr>
                    <td>#</td>
                    <td>Fotoğraf</td>
                    <td>Müzik Adı</td>
                    <td><i class="fa-solid fa-cogs fs-5"></i></td>
                </tr>


                </tbody>
            </table>
        </div>

        <div class="play-music-panel text-white">
            <div class="col-12">
                <div class="music-progress-bar-bg">
                    <div class="music-progress-bar"></div>
                </div>
                <div class="col-12 row m-0">
                    <div class="col-6">
                        <span class="audio-kalan-sure"></span>
                    </div>
                    <div class="col-6 text-end">
                        <span class="audio-toplam-sure text-end w-100"></span>
                    </div>
                </div>
            </div>
            <div class="d-flex mt-3">
            <div class="mx-2">
                <div class="btn text-white" onclick="previousMusic()"><i class="fa-solid fa-arrow-left"></i></div>
            </div>
            <div class="mx-2">
                <div class="btn text-white music-play-pause-status-btn"><i class="fa-solid fa-play"></i></div>
            </div>
            <div class="mx-2">
                <div class="btn  text-white" onclick="nextMusic()"><i class="fa-solid fa-arrow-right"></i></div>
            </div>
            </div>
        </div>

        <div class="footer">
            <div class="h6">Maşuk Müzik v1.0</div>
            <div class="h6">Website created by<BR> Ertuğrul kadir ALEMDAROĞLU <br> 2233212013 Bandırma MYO</div>
        </div>
    </div>
</div>