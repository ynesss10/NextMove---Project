// Load saved careers saat halaman dimuat
document.addEventListener('DOMContentLoaded', () => {
  displaySavedCareers();
});

// Fungsi untuk menampilkan saved careers
const displaySavedCareers = () => {
  const savedCareers = JSON.parse(localStorage.getItem('savedCareers')) || [];
  const container = document.getElementById('savedCareers');
  const emptyState = document.getElementById('emptyState');
  
  if (savedCareers.length === 0) {
    // Tampilkan empty state
    container.style.display = 'none';
    emptyState.style.display = 'block';
  } else {
    // Tampilkan list karir yang disimpan
    emptyState.style.display = 'none';
    container.style.display = 'grid';
    container.innerHTML = '';
    
    savedCareers.forEach(career => {
      const careerCard = document.createElement('div');
      careerCard.className = 'career-card';
      careerCard.innerHTML = `
        <div class="career-card-header">
          <h3>${career.name}</h3>
          <button class="btn-remove" data-id="${career.id}" style="position: absolute; top: 15px; right: 15px; background: none; border: none; color: white; cursor: pointer; padding: 5px;">
            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
              <polyline points="3 6 5 6 21 6"></polyline>
              <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path>
              <line x1="10" y1="11" x2="10" y2="17"></line>
              <line x1="14" y1="11" x2="14" y2="17"></line>
            </svg>
          </button>
        </div>
        <div class="career-card-body">
          <div class="career-description">${career.description}</div>
          <div class="career-card-actions">
            <a href="/career/detail?name=${encodeURIComponent(career.name)}" class="btn btn-view">View Detail</a>
          </div>
        </div>
      `;
      
      container.appendChild(careerCard);
    });
    
    // Handle tombol remove
    const removeButtons = document.querySelectorAll('.btn-remove');
    removeButtons.forEach(btn => {
      btn.addEventListener('click', (e) => {
        e.preventDefault();
        const careerName = btn.closest('.career-card').querySelector('h3').textContent;
        removeCareer(parseInt(btn.dataset.id), careerName);
      });
    });
  }
};

// Fungsi untuk menghapus karir
const removeCareer = (careerID, careerName) => {
  if (confirm(`Hapus "${careerName}" dari daftar simpanan?`)) {
    let savedCareers = JSON.parse(localStorage.getItem('savedCareers')) || [];
    savedCareers = savedCareers.filter(career => career.id !== careerID);
    
    localStorage.setItem('savedCareers', JSON.stringify(savedCareers));
    alert(`${careerName} berhasil dihapus`);
    
    // Refresh tampilan
    displaySavedCareers();
  }
};
