// date setup
const today = new Date().toISOString().split('T')[0];
const start = document.getElementById('start_date');
const end = document.getElementById('end_date');
let days = '';

start.min = today;
start.max = end.value;

document.addEventListener('input', (e) => {
  let tomorrow = new Date(e.target.value);
  tomorrow.setDate(tomorrow.getDate() + 1);

  let newTomorrow = tomorrow.toISOString().split('T')[0]
  end.min = newTomorrow;
  start.max = e.target.value;
});

const substractDate = () => {
  const date1 = new Date(start.value);
  const date2 = new Date(end.value);
  const diffTime = Math.abs(date2 - date1);
  const diffDays = Math.ceil(diffTime / (1000 * 60 * 60 * 24));
  
  let nightPrice =  document.getElementById('nightPrice').innerHTML;
  days = document.getElementById('totalDays').innerHTML = diffDays * nightPrice;
}

document.addEventListener('input', () => {
  substractDate();
});

substractDate();
