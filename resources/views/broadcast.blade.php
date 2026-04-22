<script>
document.addEventListener("DOMContentLoaded", function () {

    console.log("Echo:", window.Echo);

    if (!window.Echo) {
        console.error("Echo belum siap ❌");
        return;
    }

    window.Echo.channel('notifikasi')
        .listen('.TugasDikirim', (e) => {

            console.log("EVENT MASUK:", e);

            let li = document.createElement('li');
            li.innerText = e.nama + " kirim tugas: " + e.tugas;

            document.getElementById('list').appendChild(li);
        });

});
</script>