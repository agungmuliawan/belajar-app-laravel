import Echo from 'laravel-echo';
import Pusher from 'pusher-js';

window.Pusher = Pusher;

console.log("SEBELUM ECHO");

try {
    window.Echo = new Echo({
        broadcaster: 'reverb',
        key: 'local', 
        wsHost: window.location.hostname,
        wsPort: 8080,
        wssPort: 8080,
        forceTLS: false,
        enabledTransports: ['ws', 'wss'],
    });

    console.log("ECHO DIBUAT:", window.Echo);
} catch (e) {
    console.error("ERROR SAAT BUAT ECHO:", e);
}