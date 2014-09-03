<nav class="subHeader subHeaderFooter">
    <ul>
    	<li class="{{ $activeNav == 'profile' ? 'active' : '' }}">        
            <a href="{{ baseUrl() }}/profile">You</a>
        </li>
        <li class="{{ $activeNav == 'prefs' ? 'active' : '' }}">
            <a href="{{ baseUrl() }}/your-b247">Your B24/7</a>
        </li>        
        <li class="{{ $activeNav == 'password' ? 'active' : '' }}">
            <a href="{{ baseUrl() }}/password">Change My Password</a>
        </li>
</nav>