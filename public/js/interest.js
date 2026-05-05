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

const interestForm = document.getElementById('interestForm');
const interestInput = document.getElementById('interest_id');

btnNext.addEventListener("click", (e) => {
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
    interestInput.value = interestId;
    interestForm.submit();
  }
});