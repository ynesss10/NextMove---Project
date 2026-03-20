// Saved Careers Page - Display and manage saved careers
document.addEventListener('DOMContentLoaded', function() {
  loadSavedCareers();
});

/**
 * Load saved careers from localStorage
 */
function loadSavedCareers() {
  const emptyState = document.getElementById('emptyState');
  const savedCareersContainer = document.getElementById('savedCareers');
  
  // Get saved careers from localStorage
  const savedCareers = JSON.parse(localStorage.getItem('savedCareers')) || [];

  if (savedCareers.length === 0) {
    emptyState.style.display = 'block';
    savedCareersContainer.style.display = 'none';
  } else {
    emptyState.style.display = 'none';
    savedCareersContainer.style.display = 'grid';
    
    // Clear previous content
    savedCareersContainer.innerHTML = '';
    
    // Add each saved career
    savedCareers.forEach((career, index) => {
      const careerCard = createCareerCard(career, index);
      savedCareersContainer.appendChild(careerCard);
    });
  }
}

/**
 * Create a career card element
 */
function createCareerCard(career, index) {
  const card = document.createElement('div');
  card.className = 'career-card';
  card.innerHTML = `
    <div class="career-card-header">
      <h3>${career.title || 'Career Title'}</h3>
    </div>
    <div class="career-card-body">
      <p class="career-description">${career.description || 'No description available'}</p>
      <div class="career-meta">
        <div class="meta-item">
          <span>📅 Saved on:</span>
          <strong>${formatDate(career.savedDate)}</strong>
        </div>
      </div>
      <div class="career-card-actions">
        <a href="${career.detailLink || '/details'}" class="btn btn-view">View Detail</a>
        <button class="btn btn-remove" onclick="removeSavedCareer(${index})">Remove</button>
      </div>
    </div>
  `;
  
  return card;
}

/**
 * Remove a saved career
 */
function removeSavedCareer(index) {
  if (confirm('Are you sure you want to remove this career?')) {
    const savedCareers = JSON.parse(localStorage.getItem('savedCareers')) || [];
    savedCareers.splice(index, 1);
    localStorage.setItem('savedCareers', JSON.stringify(savedCareers));
    
    // Reload the page
    loadSavedCareers();
  }
}

/**
 * Format date to readable format
 */
function formatDate(dateString) {
  if (!dateString) return 'Today';
  
  const date = new Date(dateString);
  const options = { year: 'numeric', month: 'short', day: 'numeric' };
  return date.toLocaleDateString('id-ID', options);
}
