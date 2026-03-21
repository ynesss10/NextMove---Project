// Fungsi untuk menyimpan karir ke localStorage
const saveCareer = (careerName, description) => {
  // Ambil data yang sudah ada
  let savedCareers = JSON.parse(localStorage.getItem('savedCareers')) || [];
  
  // Cek apakah karir sudah disimpan
  const isAlreadySaved = savedCareers.some(career => career.name === careerName);
  
  if (!isAlreadySaved) {
    // Tambah karir baru
    savedCareers.push({
      id: Date.now(),
      name: careerName,
      description: description
    });
    
    // Simpan ke localStorage
    localStorage.setItem('savedCareers', JSON.stringify(savedCareers));
    return true;
  }
  
  return false;
};

// Handle klik tombol save
document.addEventListener('DOMContentLoaded', () => {
  const saveButtons = document.querySelectorAll('.btn-save');
  
  saveButtons.forEach(btn => {
    btn.addEventListener('click', (e) => {
      e.preventDefault();
      
      // Ambil data karir dari card
      const card = btn.closest('.card');
      const careerName = card.querySelector('.card-header').textContent;
      const description = card.querySelector('.card-body').textContent;
      
      // Simpan karir
      const isSaved = saveCareer(careerName, description);
      
      if (isSaved) {
        // Ubah text dan style tombol
        btn.textContent = 'Saved';
        btn.classList.add('saved');
        btn.disabled = true;
        
        // Tampilkan notifikasi
        alert(`${careerName} berhasil disimpan!`);
      } else {
        alert(`${careerName} sudah disimpan sebelumnya`);
      }
    });
  });
});
