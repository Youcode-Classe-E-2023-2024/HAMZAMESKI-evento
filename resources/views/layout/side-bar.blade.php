<div class="navigation">
    <ul style="padding-top: 10px;">
        <li>
            <a href="#">
                        <span class="icon" style="background-color: white; display: flex; justify-content: center; align-items: center; border-radius: 100%;">
                            <img src="{{ asset('imgs/logo.svg') }}" alt="" width="50">
                        </span>
                <span class="title">EVENTO</span>
            </a>
        </li>

        <li>
            <a href="#">
                        <span class="icon">
                            <ion-icon name="home-outline"></ion-icon>
                        </span>
                <span class="title">Dashboard</span>
            </a>
        </li>

        <li>
            <a href="#">
                        <span class="icon">
                            <ion-icon name="people-outline"></ion-icon>
                        </span>
                <span class="title">Customers</span>
            </a>
        </li>

        <li>
            <a href="#">
                        <span class="icon">
                            <ion-icon name="chatbubble-outline"></ion-icon>
                        </span>
                <span class="title">Messages</span>
            </a>
        </li>

        <li>
            <a href="#">
                        <span class="icon">
                            <ion-icon name="help-outline"></ion-icon>
                        </span>
                <span class="title">Help</span>
            </a>
        </li>

        <li>
            <a href="#">
                        <span class="icon">
                            <ion-icon name="settings-outline"></ion-icon>
                        </span>
                <span class="title">Settings</span>
            </a>
        </li>

        <li>
            <a href="#">
                        <span class="icon">
                            <ion-icon name="lock-closed-outline"></ion-icon>
                        </span>
                <span class="title">Password</span>
            </a>
        </li>

        <li>
            <a href="#">
                        <form action="{{ 'logout' }}" method="POST" class="icon">
                            @csrf
                            <button type="submit">
                                <ion-icon name="log-out-outline"></ion-icon>
                            </button>
                        </form>
                <span class="title">Sign Out</span>
            </a>
        </li>
    </ul>
</div>
