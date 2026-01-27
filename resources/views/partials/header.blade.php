<header class="app-header">
    <div class="header-container">
        <div class="greeting">
            <h2 id="greeting">Selamat Pagi, {{ Auth::user()->name }}</h2>
            <p>{{ $message }}</p>
        </div>

        <div class="avatar">
            <a href="{{ route('profil') }}"><img src="{{ $admin->photos ? asset('storage/' . $admin->photos) : asset('storage/profile_photos/default.png') }}" alt=""></a>
        </div>
    </div>
</header>
<script>
    function updateGreeting() {
        const hour = new Date().getHours();
        let greeting;
        
        if (hour >= 0 && hour < 12) {
            greeting = 'Selamat Pagi';
        } else if (hour >= 12 && hour < 15) {
            greeting = 'Selamat Siang';
        } else if (hour >= 15 && hour < 18) {
            greeting = 'Selamat Sore';
        } else {
            greeting = 'Selamat Malam';
        }
        
        document.getElementById('greeting').textContent = greeting + ', {{ Auth::user()->name }}';
    }
    
    updateGreeting();
    setInterval(updateGreeting, 60000);
</script>
