//UI vars

// document.querySelectorAll('.activeBtn').forEach(btn => {
// 	btn.addEventListener('click', function(e) {
//   	e.preventDefault();
//     this.closest('tr').classList.remove('active');

//   });
// });

// document.querySelectorAll('.deactiveBtn').forEach(btn => {
// 	btn.addEventListener('click', function(e) {
//   	e.preventDefault();
//     this.closest('tr').classList.add('active');
//   });
// });



function toggleMenu(){
    let toggleadmin = document.querySelector(".toggleadmin");
    let navigation = document.querySelector(".navigation");
    let main = document.querySelector(".main");
    toggleadmin.classList.toggle("active");
    navigation.classList.toggle("active");
    main.classList.toggle("active");
}


