<div class="page-date">
    <span id="date-display">{{ now()->format('l, d F Y') }}</span>
    <span id="time-display">{{ now()->format('H:i:s') }}</span>
</div>

<script>
    function updateDateTime() {
        const now = new Date();
        
        const days = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'];
        const months = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni',
                       'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];

        const dayName = days[now.getDay()];
        const date = String(now.getDate()).padStart(2, '0');
        const month = months[now.getMonth()];
        const year = now.getFullYear();
        
        const dateStr = dayName + ', ' + date + ' ' + month + ' ' + year;
        
        const hours = String(now.getHours()).padStart(2, '0');
        const minutes = String(now.getMinutes()).padStart(2, '0');
        const seconds = String(now.getSeconds()).padStart(2, '0');
        
        const timeStr = hours + ':' + minutes + ':' + seconds;
        
        document.getElementById('date-display').textContent = dateStr;
        document.getElementById('time-display').textContent = timeStr;
    }
    
    updateDateTime();
    setInterval(updateDateTime, 1000);
</script>
