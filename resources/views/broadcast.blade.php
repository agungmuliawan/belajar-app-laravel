<!DOCTYPE html>
<html>
<head>
    <title>Notifikasi Real-Time</title>
</head>
<body>

<h2>📢 Notifikasi Tugas</h2>

<ul id="notifikasi"></ul>

<!-- Load JS hasil build Vite -->
@vite('resources/js/app.js')

<script>
    document.addEventListener("DOMContentLoaded", function () {

        window.Echo.channel('notifikasi-tugas')
            .listen('TugasDikirim', (e) => {

                let li = document.createElement('li');
                li.innerText = e.namaMahasiswa + " submit tugas: " + e.judulTugas;

                document.getElementById('notifikasi').appendChild(li);
            });

    });
</script>

</body>
</html>