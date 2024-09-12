<nav x-data="{ open: false }" class="bg-white dark:bg-gray-800 border-b border-gray-100 dark:border-gray-700">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('dashboard') }}">
                        <x-application-logo class="block h-9 w-auto fill-current text-gray-800 dark:text-gray-200" />
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class=" space-x-8 sm:-my-px sm:ms-10 sm:flex">
                    <x-nav-link :href="route('home')" :active="request()->routeIs('home')">
                        Menu Principal
                    </x-nav-link>
                </div>
                
                
            </div>
            
            
            
            
            <div class="flex justify-between h-16 mt-5">
                
                <div>{{ Auth::user()->name }}</div>               
                
                <div class=" space-x-8 sm:-my-px sm:ms-10 sm:flex">
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        
                        <x-nav-link :href="route('logout')"
                        onclick="event.preventDefault();
                                    this.closest('form').submit();">
                    {{ __('Log Out') }}
                </x-nav-linkk>
            </form>  
        </div>
    </div>
</div>    
</div>
   
     
</nav>
