<style>
    .profile-container {
        background: #FBFCFD;
        box-shadow: 0px 4px 20px -1px #B2CEBF;
        border-radius: 20px;
    }
    .profile-text {
        font-weight: 700;
        font-style: normal;
        color: #111723;
    }

    .profile-subtext {
        font-style: normal;
        font-weight: 400;
        color: #7A7D84;
    }

    .side-items {
        background: #111723;
        border-radius: 10px;
        font-weight: 500;
        color: white !important;
    }

    .transparent-container {
        opacity: 0;
    }

    .nav-link[aria-selected="false"] {
        background: rgba(255, 255, 255, 0) !important;
        color: #111723 !important;
    }

    .nav-link[aria-selected="true"] {
        background: #111723 !important;
        color: white !important;
    }

    .nav-link {
        font-weight: 700;
        border-radius: 10px;
    }

    .sidebar-ight-primaryl {
        background: linear-gradient(180deg, rgba(226, 226, 226, 0.2) 0%, rgba(255, 255, 255, 0.1) 100%);
        box-shadow: 0px 4px 20px -1px #848DD3;
        backdrop-filter: blur(10px);
    }

    .sidebar {
        height: 100%;
        width: 250px;
        position: absolute;
        z-index: 1;
        top: 0;
        left: 0;
        overflow-x: hidden;
        transition: 0.5s;
        padding-top: 60px;

        background: linear-gradient(180deg, rgba(226, 226, 226, 0.2) 0%, rgba(255, 255, 255, 0.1) 100%);
        box-shadow: 0px 4px 20px -1px #848DD3;
        backdrop-filter: blur(10px);
    }

    .sidebar {
        height: 100%;
        width: 250px;
        position: fixed;
        z-index: 1;
        top: 0;
        left: 0;
        overflow-x: hidden;
        padding-top: 16px;

        background: linear-gradient(180deg, rgba(226, 226, 226, 0.2) 0%, rgba(255, 255, 255, 0.1) 100%);
        box-shadow: 0px 4px 10px -1px #848DD3;
        backdrop-filter: blur(10px);
    }

    #mainBody {
        margin-left: 250px; 
        padding: 0px 10px;
    }
</style>

<aside class="sidebar" id="customSidebar">
    <!-- username -->
    <div class="profile-container pb-3 m-3">
        <img class="img-fluid profile-image pl-4 pr-4 pt-4 mb-3 mx-auto d-block" src="{{ asset('icons/user_icon.svg') }}">
        @if (Auth::guest())
            <p class="pl-4 pr-4 mb-0 mx-auto d-block profile-text">User</p>
            <span class="pl-4 pr-4 mb-3 profile-subtext">email</span>
        @else
            <p class="pl-4 pr-4 mb-0 mx-auto d-block profile-text">{{ Auth::user()->name }}</p>
            <span class="pl-4 pr-4 mb-3 profile-subtext">{{ Auth::user()->email }}</span>
        @endif
    </div>

    <div class="nav flex-column nav-pills mt-4" id="v-pills-tab" role="tablist" aria-orientation="vertical">
        <button class="nav-link active link border-0 ml-4 mr-4 mb-2" id="v-pills-home-tab" data-toggle="pill" data-target="#v-pills-home" type="button" role="tab" aria-controls="v-pills-home" aria-selected="true"><span>Home</span></button>
        <button class="nav-link link border-0 ml-4 mr-4 mb-2" id="v-pills-profile-tab" data-toggle="pill" data-target="#v-pills-profile" type="button" role="tab" aria-controls="v-pills-profile" aria-selected="false"><span>Projects</span></button>
        <button class="nav-link link border-0 ml-4 mr-4 mb-2" id="v-pills-messages-tab" data-toggle="pill" data-target="#v-pills-messages" type="button" role="tab" aria-controls="v-pills-messages" aria-selected="false"><span>Education</span></button>
        <button class="nav-link link border-0 ml-4 mr-4 mb-2" id="v-pills-settings-tab" data-toggle="pill" data-target="#v-pills-settings" type="button" role="tab" aria-controls="v-pills-settings" aria-selected="false"><span>About</span></button>
    </div>
</aside>