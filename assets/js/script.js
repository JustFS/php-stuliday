// date setup
const today = new Date().toISOString().split('T')[0];
const start = document.getElementById('start_date');

document.getElementsByName("start_date")[0].setAttribute('min', today);

start.addEventListener('input', (e) => {
  let tomorrow = new Date(e.target.value);
  tomorrow.setDate(tomorrow.getDate() + 1);

  let newTomorrow = tomorrow.toISOString().split('T')[0]
  document.getElementsByName("end_date")[0].min = newTomorrow;
})
