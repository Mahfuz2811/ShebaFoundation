<nav id="navigation" class="style-1 style-2">

    <div class="left-corner"></div>
    <div class="right-corner"></div>

    <ul class="menu" id="responsive">

        <li><a href="{{ route('front_home') }}" class="{{ $link == 1 ? 'current' : '' }}">Home</a></li>
        <li><a href="{{ route('post', ['slug' => 'treatment-method']) }}" class="{{ $link == 2 ? 'current' : '' }}">Treatment Method</a></li>
        <li><a href="{{ route('our_teams', ['slug' => 'our-teams']) }}" class="{{ $link == 3 ? 'current' : '' }}">Our Teams</a></li>
        <li><a href="{{ route('post', ['slug' => 'effect-of-drugs']) }}" class="{{ $link == 8 ? 'current' : '' }}">Effect Of Drugs</a></li>
        <li><a href="{{ route('our_recoveries', ['slug' => 'our-recoveries']) }}" class="{{ $link == 4 ? 'current' : '' }}">Our Recoveries</a></li>
        <li><a href="{{ route('post', ['slug' => 'about-us']) }}" class="{{ $link == 5 ? 'current' : '' }}">About Us</a></li>
        <li><a href="{{ route('gallery') }}" class="{{ $link == 6 ? 'current' : '' }}">Gallery</a></li>
        <li><a href="{{ route('keep_touch') }}" class="{{ $link == 7 ? 'current' : '' }}">Contact</a>

    </ul>
</nav>
