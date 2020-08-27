// date setup
const today = new Date().toISOString().split('T')[0];
document.getElementsByName("start_date")[0].setAttribute('min', today);
document.getElementsByName("end_date")[0].setAttribute('min', today);

// modal
document.addEventListener('DOMContentLoaded', function() {
  var elems = document.querySelectorAll('.modal');
  var instances = M.Modal.init(elems, options);
});
