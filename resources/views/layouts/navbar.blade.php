<div class="flex px-24 py-5 bg-white">
    <div class="flex w-1/12 justify-center">
        <a href="/">
            <img src="{{ asset('img/byke-green.png') }}" style="max-width:50%;">
        </a>
    </div>

    <ul class="flex w-10/12 justify-center items-center">
        <li class="mr-12">
            <a class="text-glen-gray " href="/rent">Rent</a>
        </li>
        <li class="mr-12">
            <a class="text-glen-gray " href="/what-is-byke">What is Byke</a>
        </li>
        <li class="mr-12">
            <a class="text-glen-gray " href="/invest">Invest a Bike</a>
        </li>
        <li class="mr-12">
            <a class="text-glen-gray " href="/achievements">Achievements</a>
        </li>
        <li class="mr-12">
            <a class="text-glen-gray " href="/perks">Perks</a>
        </li>
    </ul>

    <div class="flex w-1/12 justify-center items-center">
        @auth
        <a class="text-glen-gray pr-4 mr-4 border-r-2 border-color-glen-gray" href="/users/{{Auth::id()}}">Account</a>
        <a class="text-glen-gray" href="/logout">Logout</a>
        @endauth
        
        @guest
        <a class="text-glen-gray pr-4 mr-4 border-r-2 border-color-glen-gray" href="/login">Login</a>
        <a class="text-glen-gray" href="/register">Register</a>
        @endguest
    </div>
</div>