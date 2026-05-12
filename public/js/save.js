const showToast = (message, type = 'success') => {
  const toast = document.createElement('div');
  toast.textContent = message;
  toast.style.position = 'fixed';
  toast.style.bottom = '20px';
  toast.style.right = '20px';
  toast.style.padding = '12px 24px';
  toast.style.borderRadius = '8px';
  toast.style.color = 'white';
  toast.style.fontWeight = 'bold';
  toast.style.zIndex = '10000';
  toast.style.transition = 'opacity 0.3s ease, transform 0.3s ease';
  toast.style.opacity = '0';
  toast.style.transform = 'translateY(20px)';
  toast.style.boxShadow = '0 4px 12px rgba(0,0,0,0.15)';
  
  if (type === 'success') {
    toast.style.background = 'linear-gradient(to right, #10B981, #059669)';
  } else if (type === 'info') {
    toast.style.background = 'linear-gradient(to right, #3B82F6, #2563EB)';
  } else {
    toast.style.background = 'linear-gradient(to right, #EF4444, #DC2626)';
  }
  
  document.body.appendChild(toast);
  
  setTimeout(() => {
    toast.style.opacity = '1';
    toast.style.transform = 'translateY(0)';
  }, 10);
  
  setTimeout(() => {
    toast.style.opacity = '0';
    toast.style.transform = 'translateY(20px)';
    setTimeout(() => document.body.removeChild(toast), 300);
  }, 3000);
};

const showConfirmModal = (message, onConfirm) => {
  const overlay = document.createElement('div');
  overlay.style.position = 'fixed';
  overlay.style.top = '0';
  overlay.style.left = '0';
  overlay.style.width = '100vw';
  overlay.style.height = '100vh';
  overlay.style.backgroundColor = 'rgba(0, 0, 0, 0.5)';
  overlay.style.display = 'flex';
  overlay.style.justifyContent = 'center';
  overlay.style.alignItems = 'center';
  overlay.style.zIndex = '9999';
  overlay.style.opacity = '0';
  overlay.style.transition = 'opacity 0.2s ease';

  const modal = document.createElement('div');
  modal.style.background = 'white';
  modal.style.padding = '24px';
  modal.style.borderRadius = '12px';
  modal.style.boxShadow = '0 10px 25px rgba(0,0,0,0.2)';
  modal.style.maxWidth = '400px';
  modal.style.width = '90%';
  modal.style.textAlign = 'center';
  modal.style.transform = 'scale(0.9)';
  modal.style.transition = 'transform 0.2s ease';
  
  const title = document.createElement('h3');
  title.textContent = 'Konfirmasi';
  title.style.marginTop = '0';
  title.style.color = '#2d3748';
  title.style.fontFamily = 'Arial, sans-serif';
  
  const text = document.createElement('p');
  text.textContent = message;
  text.style.color = '#4a5568';
  text.style.marginBottom = '24px';
  text.style.lineHeight = '1.5';
  
  const btnContainer = document.createElement('div');
  btnContainer.style.display = 'flex';
  btnContainer.style.gap = '12px';
  btnContainer.style.justifyContent = 'center';
  
  const btnCancel = document.createElement('button');
  btnCancel.textContent = 'Batal';
  btnCancel.style.padding = '10px 20px';
  btnCancel.style.border = 'none';
  btnCancel.style.borderRadius = '8px';
  btnCancel.style.cursor = 'pointer';
  btnCancel.style.background = '#e2e8f0';
  btnCancel.style.color = '#4a5568';
  btnCancel.style.fontWeight = 'bold';
  
  const btnConfirm = document.createElement('button');
  btnConfirm.textContent = 'Hapus';
  btnConfirm.style.padding = '10px 20px';
  btnConfirm.style.border = 'none';
  btnConfirm.style.borderRadius = '8px';
  btnConfirm.style.cursor = 'pointer';
  btnConfirm.style.background = '#f56565';
  btnConfirm.style.color = 'white';
  btnConfirm.style.fontWeight = 'bold';
  
  btnCancel.onmouseover = () => btnCancel.style.background = '#cbd5e0';
  btnCancel.onmouseout = () => btnCancel.style.background = '#e2e8f0';
  btnConfirm.onmouseover = () => btnConfirm.style.background = '#e53e3e';
  btnConfirm.onmouseout = () => btnConfirm.style.background = '#f56565';
  
  btnContainer.appendChild(btnCancel);
  btnContainer.appendChild(btnConfirm);
  modal.appendChild(title);
  modal.appendChild(text);
  modal.appendChild(btnContainer);
  overlay.appendChild(modal);
  document.body.appendChild(overlay);
  
  setTimeout(() => {
    overlay.style.opacity = '1';
    modal.style.transform = 'scale(1)';
  }, 10);
  
  const close = () => {
    overlay.style.opacity = '0';
    modal.style.transform = 'scale(0.9)';
    setTimeout(() => document.body.removeChild(overlay), 200);
  };
  
  btnCancel.onclick = close;
  btnConfirm.onclick = () => {
    close();
    onConfirm();
  };
};


document.addEventListener('DOMContentLoaded', () => {
  displaySavedCareers();
});


const displaySavedCareers = () => {
  const savedCareers = JSON.parse(localStorage.getItem('savedCareers')) || [];
  const container = document.getElementById('savedCareers');
  const emptyState = document.getElementById('emptyState');
  
  if (savedCareers.length === 0) {

    container.style.display = 'none';
    emptyState.style.display = 'block';
  } else {
  
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
            <a href="/detail?${career.career_id ? 'id=' + career.career_id : 'name=' + encodeURIComponent(career.name)}" class="btn btn-view">View Detail</a>
          </div>
        </div>
      `;
      
      container.appendChild(careerCard);
    });
    

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

const removeCareer = (careerID, careerName) => {
  showConfirmModal(`Hapus "${careerName}" dari daftar simpanan?`, () => {
    let savedCareers = JSON.parse(localStorage.getItem('savedCareers')) || [];
    savedCareers = savedCareers.filter(career => career.id !== careerID);
    
    localStorage.setItem('savedCareers', JSON.stringify(savedCareers));
    showToast(`${careerName} berhasil dihapus`, 'success');
    
    displaySavedCareers();
  });
};
