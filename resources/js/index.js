
// Hamburger dropdown
const button = document.querySelector('#menu-button'); // Hamburger Icon
const menu = document.querySelector('#menu'); // Menu

button.addEventListener('click', () => {
  menu.classList.toggle('hidden');
});

// // Second dropdown
const buttonDropdown = document.querySelector('#dropdown'); // Hamburger Icon
const menuDropdown = document.querySelector('#dropdown-menu'); // Menu

buttonDropdown.addEventListener('click', () => {
  menuDropdown.classList.toggle('hidden');
  
});

//Search button
                
// const searchButton = document.querySelector('#find-worker');
// console.log('hello');
// searchButton.addEventListener('click', function(){
//   console.log('button clicked');
// })

//Search button
                
const searchButton = document.querySelector('#find-worker');
const searchInput = document.querySelector('#profession');


searchButton.addEventListener('click', function(){
  searchInput.focus();
})
