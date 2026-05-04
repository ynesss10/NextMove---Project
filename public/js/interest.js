const cards = document.querySelectorAll(".card");
const btnNext = document.querySelector(".btn-next");

cards.forEach(card => {
  card.addEventListener("click", () => {
    cards.forEach(c => c.classList.remove("active"));
    card.classList.add("active");
  });
});

let errorMsg = document.querySelector(".error-message");
if (!errorMsg) {
  errorMsg = document.createElement("div");
  errorMsg.className = "error-message";
  errorMsg.textContent = "Silakan pilih salah satu minat sebelum melanjutkan!";
  const footerNav = document.querySelector(".footer-nav");
  const btnNext = document.querySelector(".btn-next");
  footerNav.insertBefore(errorMsg, btnNext);
}

btnNext.addEventListener("click", async (e) => {
  const activeCard = document.querySelector(".card.active");
  
  if (!activeCard) {
    e.preventDefault();
    errorMsg.classList.add("show");
    setTimeout(() => {
      errorMsg.classList.remove("show");
    }, 3000);
  } else {
    e.preventDefault();
    const interestId = activeCard.getAttribute("data-id");
    
    try {
      const response = await fetch('/api/interest/save', {
        method: 'POST',
        headers: {
          'Content-Type': 'application/json',
        },
        body: JSON.stringify({ interest_id: interestId })
      });

      const data = await response.json();

      if (data.success) {
        window.location.href = '/skills';
      } else {
        errorMsg.textContent = data.message || 'Terjadi kesalahan';
        errorMsg.classList.add("show");
        setTimeout(() => {
          errorMsg.classList.remove("show");
        }, 3000);
      }
    } catch (error) {
      console.error('Error:', error);
      errorMsg.textContent = 'Terjadi kesalahan saat menyimpan pilihan';
      errorMsg.classList.add("show");
      setTimeout(() => {
        errorMsg.classList.remove("show");
      }, 3000);
    }
  }
});