// validasi.js

document.getElementById('formAlumni').addEventListener('submit', function(event) {
    const requiredInputs = this.querySelectorAll('[required]');
    let isValid = true;
    
    requiredInputs.forEach(input => {
        // Hapus penanda error sebelumnya
        input.classList.remove('input-error');

        // Cek jika input kosong atau hanya berisi spasi
        if (input.value.trim() === '') {
            isValid = false;
            // Tandai input yang error
            input.classList.add('input-error');
        }
    });

    if (!isValid) {
        event.preventDefault(); // Mencegah form disubmit
        alert('Semua kolom wajib diisi. Silakan cek kembali!'); 
    }
});