function saveCareer(careerData) {
  if (!careerData.title) {
    alert('Career title is required');
    return false;
  }

  const savedCareers = JSON.parse(localStorage.getItem('savedCareers')) || [];
  
  const isAlreadySaved = savedCareers.some(career => career.title === careerData.title);
  
  if (isAlreadySaved) {
    alert('This career is already saved');
    return false;
  }

  careerData.savedDate = new Date().toISOString();
  savedCareers.push(careerData);
  localStorage.setItem('savedCareers', JSON.stringify(savedCareers));

  alert('Career saved successfully!');
  return true;
}


function isCareerSaved(careerTitle) {
  const savedCareers = JSON.parse(localStorage.getItem('savedCareers')) || [];
  return savedCareers.some(career => career.title === careerTitle);
}


function updateSaveButtonState(careerTitle, buttonElement) {
  if (isCareerSaved(careerTitle)) {
    buttonElement.disabled = true;
    buttonElement.textContent = 'Saved';
    buttonElement.style.opacity = '0.6';
  }
}


function quickSaveCareer(event, careerTitle, careerDescription, detailLink) {
  event.preventDefault();
  
  if (isCareerSaved(careerTitle)) {
    alert('This career is already saved');
    return;
  }

  const careerData = {
    title: careerTitle,
    description: careerDescription,
    detailLink: detailLink || '/details'
  };

  if (saveCareer(careerData)) {

    event.target.disabled = true;
    event.target.textContent = 'Saved';
    event.target.style.opacity = '0.6';
  }
}
