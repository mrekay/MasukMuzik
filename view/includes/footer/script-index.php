<?php if ($CurrentUser->id > 0) { ?>
<script>

    function getPlayLists() {
        $.ajax({
            dataType: 'json',
            url: 'app/playlist/selectList',
            type: 'POST',
            success: function (response) {
                $('.playlists-list').html('');
                if (response.data.length > 0) {
                    $.each(response.data, function (index, value) {
                        $('.playlists-list').append(
                            $('<div class="playlists-item col-3" data-id="' + value.id + '">').append(
                                $('<div class="playlists-item-title">').text(value.name)
                            )
                        )
                    })
                }

                $('.playlists-list').append(
                    $('<div class="create-playlist-item col-3">').append(
                        $('<div class="playlists-item-title">').text("Yeni Ekle")
                    )
                )
            }
        });
    }

    $(document).on('click', '.create-playlist-item', function () {
        showCreatePlayList();
    })

    $(document).ready(function () {
        var urlParams = new URLSearchParams(window.location.search);

        if (urlParams.has('splid')) {
            var splid = urlParams.get('splid');

            if (!isNaN(splid)) {
                showPlaylist(splid);
            }
        }

        // Diğer işlemler
        getPlayLists();
    })

    /* playlist fonksiyonları*/
    $(document).on('click', '.playlists-item', function () {
        var data_id = $(this).attr('data-id');
        showPlaylist(data_id);

    });

    function showPlaylist(data_id) {
        $('.playlists-content').hide();
        $('.playlist-content').show();
        loadMusics(data_id);

        /* sayfayı yenileyince açık olması için */
        var url = new URL(window.location.href);
        var params = new URLSearchParams(url.search);
        params.set('splid', data_id);
        url.search = params.toString();
        window.history.pushState({}, '', url.toString());
    }

    function reloadMusics() {
        loadMusics($('.playlist-content').attr('data-id'));
    }

    $(document).on('click', '.dropdown', function(event) {
        event.stopPropagation();
    });

    var musics = [];

    function loadMusics(data_id) {

        $('.music-list-item').remove();
        $('.no-music-items').remove();
        $.ajax({
            dataType: 'json',
            url: 'app/playlist/select',
            type: 'POST',
            data: {
                playlist_id: data_id
            },
            success: function (response) {
                $('.playlist-title').text(response.data.playlist_info.name);
                $('.playlist-content').attr('data-id', data_id);
                $('.playlist-content').attr('data-name', response.data.playlist_info.name);
                $('.playlist-content').attr('data-musics', response.data.playlist_musics);

                musics = response.data.playlist_musics;
                if (response.data.playlist_musics.length > 0) {
                    $i = 1;
                    $.each(response.data.playlist_musics, function (index, value) {
                        $('.playlist-musics-table tbody').append(
                            $('<tr class="music-list-item" data-id="' + index + '">').append(
                                $('<td>').html($i),
                                $('<td>').append(
                                    $('<img src="assets/images/music_bg.png" height="48">')
                                ),
                                $('<td>').text(value.name),
                                $('<td>').append(
                                    $('<div class="dropdown">').append(
                                        $('<div class="btn text-white dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">').html('<i class="fa-solid fa-cog fs-5"></i>'),
                                        $('<ul class="dropdown-menu">').append(
                                            $('<li>').append(
                                                $('<a class="dropdown-item" href="#" onclick="deleteMusic('+value.id+')">').html('<i class="fa-solid fa-times me-2"></i>Sil')
                                            )
                                        )
                                    )
                                )
                            )
                        )
                        $i++;
                    })
                } else {
                    $('.playlist-content').append(
                        $('<div class="w-100 d-flex align-items-center no-music-items" style="flex-direction: column">').append(
                            $('<div>').text('Müzik Bulunamadı'),
                            $('<div class="mt-2 btn text-primary load-playlist-music" onclick="showUploadMusic()">').text('Müzik Ekle')
                        )
                    )
                }
            }
        });
    }

    $(document).on('click', '.music-list-item', function () {
        playMusic($(this).attr('data-id'));
    })

    var currentMusicIndex = 0;
    var currentMusicStatus = 1; // durdu 1, çalıyor 2;
    var audio = new Audio();

    function setMusicStatus(status) {
        currentMusicStatus = status;

        if (currentMusicStatus == 1)
            $('.music-play-pause-status-btn').html($('<i class="fa-solid fa-play">'));
        else
            $('.music-play-pause-status-btn').html($('<i class="fa-solid fa-pause">'));
    }

    $('.music-play-pause-status-btn').click(function () {
        if (currentMusicStatus == 1) resumeMusic();
        else pauseMusic();
    })

    function playMusic(musicID) {
        if (isNaN(musicID)) return;
        currentMusicIndex = musicID;
        if (musics.length > 0) {
            audio.src = musics[currentMusicIndex]["path"];
            audio.play();
        }
    }

    function resumeMusic() {
        audio.play();
    }

    function pauseMusic() {
        audio.pause();
    }

    audio.addEventListener('pause', function () {
        setMusicStatus(1);
    });
    audio.addEventListener('play', function () {
        setMusicStatus(2);
    });
    audio.addEventListener('timeupdate', function () {
        var currentSeconds = parseInt(audio.currentTime % 60);
        var currentMinutes = parseInt((audio.currentTime / 60) % 60);
        var totalSeconds = parseInt(audio.duration % 60);
        var totalMinutes = parseInt((audio.duration / 60) % 60);

        // Format the time as m:ss
        currentSeconds = (currentSeconds < 10 ? "0" : "") + currentSeconds;
        currentMinutes = (currentMinutes < 10 ? "0" : "") + currentMinutes;
        totalSeconds = (totalSeconds < 10 ? "0" : "") + totalSeconds;
        totalMinutes = (totalMinutes < 10 ? "0" : "") + totalMinutes;

        // Update the time display
        $('.audio-kalan-sure').text(currentMinutes + ":" + currentSeconds);
        $('.audio-toplam-sure').text(totalMinutes + ":" + totalSeconds);
        var percentage = (audio.currentTime / audio.duration) * 100;
        $('.music-progress-bar').css('width', percentage + '%');
    });
    audio.addEventListener('ended', function () {
        nextMusic();
    });

    function nextMusic() {
        if (musics.length > 0) {
            currentMusicIndex++;
            if (currentMusicIndex >= musics.length) {
                currentMusicIndex = 0; // Loop back to the first music
            }
            playMusic(currentMusicIndex);
        }
    }

    function previousMusic() {
        if (musics.length > 0) {
            currentMusicIndex--;
            if (currentMusicIndex < 0) {
                currentMusicIndex = musics.length - 1; // Loop back to the last music
            }
            playMusic(currentMusicIndex);
        }
    }

    $('.music-progress-bar-bg').on('click', function (e) {
        var offset = $(this).offset();
        var left = (e.pageX - offset.left);
        var totalWidth = $(this).width();
        var percentage = (left / totalWidth);
        audio.currentTime = audio.duration * percentage;
    });

    function deletePlayList() {
        var playlist_id = $('.playlist-content').attr('data-id');

        Swal.fire({
            title: 'Silmek istediğine emin misin?',
            text: "Bu işlem geri alınamaz!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Evet, sil!'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    dataType: 'json',
                    url: 'app/playlist/delete',
                    type: 'POST',
                    data: {
                        playlist_id: playlist_id
                    },
                    success: function (response) {
                        getPlayLists();
                        $('.playlist-content').hide();
                        $('.playlists-content').show();
                    }
                });
            }
        })


    }

    function deleteMusic(id) {

        Swal.fire({
            title: 'Silmek istediğine emin misin?',
            text: "Bu işlem geri alınamaz!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Evet, sil!'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    dataType: 'json',
                    url: 'app/music/delete',
                    type: 'POST',
                    data: {
                        music_id: id
                    },
                    success: function (response) {
                        reloadMusics();
                    }
                });
            }
        })


    }

    $('.go-back-to-playlist').click(function(){
        $('.playlist-content').hide();
        $('.playlists-content').show();

    })

$('.edit-playlist').click(function(){
    editPlayList($('.playlist-content').attr('data-id'));
})

</script>
<?php }?>