<style>

    .dashboard-container {
        width: 100%;
        margin: 0 auto;

        display: flex;
        justify-content: center;
    }

    .dashboard-content {
        width: 50%;
        color: white;
    }

    .header {
        width: 100%;
        display: flex;
        justify-content: space-between;
        align-items: center;

        background-color: rgb(20, 23, 25);
        border-radius: 8px;
        padding: 20px;

    }

    .FOOTER {
        margin-top: 10px;
        width: 100%;
        display: flex;
        justify-content: space-between;
        align-items: center;

        background-color: rgb(20, 23, 25);
        border-radius: 8px;
        padding: 20px;

    }


    .playlists-content {
        width: 100%;

        margin-top: 10px;
        padding: 20px;
        background-color: rgb(20, 23, 25);
        border-radius: 8px;
    }

    .playlists-list {
        display: flex;
        justify-content: space-between;
        align-items: center;

        padding: 0 20px;
    }

    .playlists-content .playlists-item {
        margin-top: 20px;
        height: 256px;
        width: 256px;

        background-image: url("assets/images/playlist_bg.png");
        background-size: cover;
        border-radius: 20px;

        display: flex;
        justify-content: center;
        align-items: center;
        flex-direction: column;

        font-size: 24px;
        font-weight: bolder;

        cursor: pointer;
        transition: .5s all;
    }

    .playlists-content .playlists-header-title {
        font-size: 24px;
        font-weight: bolder;
    }

    .playlists-content .create-playlist-item {
        margin-top: 20px;
        height: 256px;
        width: 256px;

        background-color: rgb(30, 33, 35);
        border-radius: 20px;

        display: flex;
        justify-content: center;
        align-items: center;
        flex-direction: column;

        font-size: 24px;
        font-weight: bolder;

        cursor: pointer;
        transition: .5s all;
    }

    .playlists-content .create-playlist-header-title {
        font-size: 24px;
        font-weight: bolder;
    }

    .playlists-content .playlists-item:hover {
        transform: scale(1.05);
        transition: .5s all;
    }


    .user-photo {
        height: 48px;
        border-radius: 48px;
    }

</style>

<style>
    .playlist-content {
        width: 100%;

        margin-top: 10px;
        padding: 20px;
        background-color: rgb(20, 23, 25);
        border-radius: 8px;
        color: white;
    }

    .playlist-header {
        width: 100%;
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding-bottom: 20px;
        border-bottom: 1px solid white;
        color: white !important;
    }

    .playlist-title {
        font-size: 24px;
        font-weight: bolder;
        margin-left: 10px;
    }

    .playlist-info {
        display: flex;
        align-items: center;
    }

    .music-list-item {
        cursor: pointer;
    }

    .play-music-panel {
        margin-top: 10px;
        width: 100%;
        display: flex;
        justify-content: center;
        align-items: center;
        flex-direction: column;
        background-color: rgb(20, 23, 25);
        border-radius: 8px;
        padding: 10px;

    }

    .music-progress-bar-bg {
        width: 100%;
        height: 10px;
        background-color: rgb(30, 33, 35);
        border-radius: 3px;
    }

    .music-progress-bar {
        height: 10px;
        width: 0;

        border-radius: 3px;
        background-color: #4CAF50;
    }
</style>