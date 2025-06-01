<header class="bg-blue-600 text-white p-4">
    <div class="container mx-auto flex justify-between items-center">
        <a href="{{ route('courses.index') }}" class="text-2xl font-bold">EduFlow</a>
        <nav>
            @auth
                <span class="mr-4">Welcome, {{ auth()->user()->name }}</span>
                @if (auth()->user()->role === 'instructor')
                    <a href="{{ route('courses.create') }}" class="bg-blue-700 px-4 py-2 rounded">Create Course</a>
                @endif
                <form action="{{ route('logout') }}" method="POST" class="inline">
                    @csrf
                    <button type="submit" class="bg-red-500 px-4 py-2 rounded ml-4">Logout</button>
                </form>
            @else
                <a href="{{ route('login') }}" class="bg-blue-700 px-4 py-2 rounded">Login</a>
                <a href="{{ route('register') }}" class="bg-green-500 px-4 py-2 rounded ml-4">Register</a>
            @endauth
        </nav>
    </div>
</header>
