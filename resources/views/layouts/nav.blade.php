<nav class="bg-white border-b border-gray-100">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="flex-shrink-0 flex items-center">
                    <x-application-logo class="block h-10 w-auto fill-current text-gray-600" />
                </div>
            </div>
            <div>
                <ul class="nav justify-content-end">
                    <li class="nav-item">
                        {{ Auth::user()->name }}
                    </li>
                    <li class="nav-item">
                        <form action="/logout" method="post">
                            @csrf
                            <input class="logout-btn" type="submit" value="Logout">
                        </form>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</nav>