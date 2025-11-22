document.addEventListener("DOMContentLoaded", () => {
  const sele = document.querySelector("#select");
  const inp = document.querySelector("#age");
  const p = document.querySelector("p");
  const result = document.querySelector("#result");
  function pick() {
    if (sele.value === "calcYear") {
      inp.placeholder = "Input age";
      p.innerHTML = "You were born in <span id='result'>x_x</span>";
    } else {
      inp.placeholder = "Input birth year";
      p.innerHTML = "You are <span id='result'>x_x</span> years old, congrats.";
    }
  }
  sele.addEventListener("change", pick);

  function calcAge(year) {
    year = Number(year);
    if (isNaN(year) || year <= 0) return "x_x";
    const current = new Date().getFullYear();
    return current - year;
  }

  function calcYear(age) {
    age = Number(age);
    if (isNaN(age) || age <= 0) return "x_x";
    const current = new Date().getFullYear();
    return current - age;
  }
  inp.addEventListener("input", () => {
    const value = inp.value;
    const result = document.querySelector("#result");
    if (sele.value === "calcYear") {
      result.textContent = calcYear(value);
    } else {
      result.textContent = calcAge(value);
    }
  });
});
