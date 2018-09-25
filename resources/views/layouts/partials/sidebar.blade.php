<div class="sidebar" data-image="{{asset('assets/img/sidebar-5.jpg')}}">
    <div class="sidebar-wrapper">
        <div class="logo">
            <a href="#" class="simple-text">
                Messaging Board
            </a>
        </div>

        <ul class="nav">
            <li class="nav-item active">
                <a href="{{ url('home') }}" class="nav-link">
                    <i class="nc-icon nc-chart-pie-35"></i>
                    <p>Dashboard</p>
                </a>
            </li>
            <li>
                <a href="{{ url('message-template') }}" class="nav-link">
                    <i class="nc-icon nc-circle-09"></i>
                    <p>Message Templates</p>
                </a>
            </li>
            <li>
                <a href="{{ url('contact') }}" class="nav-link">
                    <i class="nc-icon nc-notes"></i>
                    <p>Contacts</p>
                </a>
                <a href="{{ url('sms') }}" class="nav-link">
                    <i class="nc-icon nc-notes"></i>
                    <p>Sms</p>
                </a>
            </li>

        </ul>
    </div>
</div>
