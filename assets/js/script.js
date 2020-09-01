// // date setup
// const today = new Date().toISOString().split('T')[0];
// const start = document.getElementById('start_date');
// const end = document.getElementById('end_date');
// let days = '';

// start.min = today;
// start.max = end.value;

// start.addEventListener('onchange', (e) => {
//   let tomorrow = new Date(e.target.value);
//   tomorrow.setDate(tomorrow.getDate() + 1);

//   let newTomorrow = tomorrow.toISOString().split('T')[0]
//   start.max = e.target.value;
//   end.min = newTomorrow;
// }); 

// const substractDate = () => {
//   const date1 = new Date(start.value);
//   const date2 = new Date(end.value);
//   const diffTime = Math.abs(date2 - date1);
//   const diffDays = Math.ceil(diffTime / (1000 * 60 * 60 * 24));
  
//   let nightPrice =  document.getElementById('nightPrice').innerHTML;
//   document.getElementById('totalDays').innerHTML = diffDays * nightPrice;
// }

// start.addEventListener('onchange', () => {
//   substractDate();
// });

// substractDate();