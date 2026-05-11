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


const saveCareer = (careerId, careerName, description) => {
  let savedCareers = JSON.parse(localStorage.getItem('savedCareers')) || [];
  
  const isAlreadySaved = savedCareers.some(career => career.name === careerName);
  
  if (!isAlreadySaved) {

    savedCareers.push({
      id: Date.now(),
      career_id: careerId,
      name: careerName,
      description: description
    });
    
    localStorage.setItem('savedCareers', JSON.stringify(savedCareers));
    return true;
  }
  
  return false;
};


document.addEventListener('DOMContentLoaded', () => {
  const saveButtons = document.querySelectorAll('.btn-save');
  
  saveButtons.forEach(btn => {
    btn.addEventListener('click', (e) => {
      e.preventDefault();
      
      let careerName, description, careerId;
      const card = btn.closest('.card');
      
      if (card) {
        careerName = card.querySelector('.card-header').textContent;
        description = card.querySelector('.card-body').textContent;
      } else {
        careerName = document.querySelector('.career-title').textContent;
        description = document.querySelector('.career-section p').textContent;
      }
      
      careerId = btn.getAttribute('data-id');
      
   
      const isSaved = saveCareer(careerId, careerName, description);
      
      if (isSaved) {
   
        btn.textContent = 'Saved';
        btn.classList.add('saved');
        btn.disabled = true;
        
        showToast(`${careerName} berhasil disimpan!`, 'success');
      } else {
        showToast(`${careerName} sudah disimpan sebelumnya`, 'info');
      }
    });
  });
});
