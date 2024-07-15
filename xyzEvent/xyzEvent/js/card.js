const container = document.getElementById("containerCard");
const registerBtn = document.getElementById("registerCard");
const loginBtn = document.getElementById("loginCard");

registerBtn.addEventListener("click", () => {
  container.classList.add("active");
});

loginBtn.addEventListener("click", () => {
  container.classList.remove("active");
});
