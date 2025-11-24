const menuToggle = document.getElementById("menuToggle");
const sidebar = document.getElementById("sidebar");
const orderCard = document.querySelector(".order-card");
const dash = document.querySelector("#dash");
const add = document.querySelector("#add");
const mess = document.querySelector("#mess");
const noti = document.querySelector("#noti");
const set = document.querySelector("#set");
// Toggle sidebar
menuToggle.addEventListener("click", (e) => {
  e.stopPropagation(); // Prevent body from also seeing this click
  sidebar.classList.toggle("hidden");
});

// Prevent clicks inside sidebar from closing it
sidebar.addEventListener("click", (e) => {
  e.stopPropagation();
});

// Hide sidebar when clicking anywhere outside it
document.body.addEventListener("click", () => {
  sidebar.classList.add("hidden");
});

// Redirect to orders page
orderCard.addEventListener("click", () => {
  window.location.href = "orders.html";
});

dash.addEventListener("click", () => {
  window.location.href = "index.php?page=Homepage";
});

add.addEventListener("click", () => {
  window.location.href = "addproducts.html";
});

mess.addEventListener("click", () => {
  window.location.href = "message.html";
});
noti.addEventListener("click", () => {
  window.location.href = "orders.html";
});
set.addEventListener("click", () => {
  window.location.href = "settings.html";
});
