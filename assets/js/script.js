// date setup annonce post
const today = new Date().toISOString().split("T")[0];
const start = document.getElementById("start_date");
const end = document.getElementById("end_date");
let days = "";

if (start) {
  start.min = today;

  start.addEventListener("change", (e) => {
    let day = new Date(e.target.value);
    day.setDate(day.getDate() + 1);
    let tomorrow = day.toISOString().split("T")[0];
    end.min = tomorrow;
  });

  end.addEventListener("change", (e) => {
    let day = new Date(e.target.value);
    day.setDate(day.getDate() - 1);
    let yesterday = day.toISOString().split("T")[0];
    start.max = yesterday;
  });
}

const bookStart = document.getElementById("book_start_date");
const bookEnd = document.getElementById("book_end_date");

if (bookStart) {
  const bookingTotal = () => {
    let date1 = new Date(bookStart.value);
    let date2 = new Date(bookEnd.value);
    let diffTime = Math.abs(date2 - date1);
    let diffDays = Math.ceil(diffTime / (1000 * 60 * 60 * 24));
    let nightPrice = document.getElementById("nightPrice").innerHTML;

    let total = diffDays * nightPrice;
    total ? document.getElementById("totalDays").innerHTML = total : document.getElementById("totalDays").innerHTML = 0;
  };
  bookStart.addEventListener("change", () => {bookingTotal(); });
  bookEnd.addEventListener("change", () => {bookingTotal(); });
  bookingTotal();
}