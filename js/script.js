

const menu = document.querySelector(".menu");
const menuMain = menu.querySelector(".menu-main");
const goBack = menu.querySelector(".go-back");
const menuTrigger = document.querySelector(".mobile-menu-trigger");
const closeMenu = menu.querySelector(".mobile-menu-close");
let subMenu;
menuMain.addEventListener("click", (e) => {
  if (!menu.classList.contains("active")) {
    return;
  }
  if (e.target.closest(".menu-item-has-children")) {
    const hasChildren = e.target.closest(".menu-item-has-children");
    showSubMenu(hasChildren);
  }
});
goBack.addEventListener("click", () => {
  hideSubMenu();
})
menuTrigger.addEventListener("click", () => {
  toggleMenu();
})
closeMenu.addEventListener("click", () => {
  let all_li = document.querySelectorAll('.menu-item-has-children');
  for (let i = 0; i < all_li.length; i++) {
    all_li[i].firstElementChild.classList.remove('none-class');
    all_li[i].firstElementChild.nextElementSibling.style.display = 'none ';
    console.log(all_li[i].firstElementChild.nextElementSibling);
    all_li[i].firstElementChild.nextElementSibling.classList.remove('hide-p');
  }
  toggleMenuRemove();
})
document.querySelector(".menu-overlay").addEventListener("click", () => {
  toggleMenu();
})
function toggleMenu() {
  menu.classList.toggle("active");
  document.querySelector(".menu-overlay").classList.toggle("active");
  let all_li = document.querySelectorAll('.menu-item-has-children');
  for (let i = 0; i < all_li.length; i++) {
    all_li[i].firstElementChild.nextElementSibling.style.display = 'block';
    all_li[i].firstElementChild.classList.add('none-class');
    all_li[i].firstElementChild.nextElementSibling.classList.add('hide-p');
  }
}
function toggleMenuRemove() {
  menu.classList.toggle("active");
  document.querySelector(".menu-overlay").classList.toggle("active");
}
function showSubMenu(hasChildren) {
  subMenu = hasChildren.querySelector(".sub-menu");
  let all_menu = subMenu.firstElementChild.firstElementChild;
  all_menu.style.display = 'block';
  subMenu.classList.add("active");
  subMenu.style.animation = "slideLeft 0.5s ease forwards";
  const menuTitle = hasChildren.querySelector("i").parentNode.childNodes[0].textContent;
  menu.querySelector(".current-menu-title").innerHTML = menuTitle;
  menu.querySelector(".mobile-menu-head").classList.add("active");
}

function hideSubMenu() {
  subMenu.style.animation = "slideRight 0.5s ease forwards";
  setTimeout(() => {
    subMenu.classList.remove("active");
  }, 300);
  menu.querySelector(".current-menu-title").innerHTML = "";
  menu.querySelector(".mobile-menu-head").classList.remove("active");
}

window.onresize = function () {
  if (this.innerWidth > 991) {
    if (menu.classList.contains("active")) {
      toggleMenu();
    }

  }
}

function openSearch() {
  document.getElementById("myOverlay").style.display = "block";
}

// Close the full screen search box
function closeSearch() {
  document.getElementById("myOverlay").style.display = "none";
}

//slide show start
var slideIndex = 1;
showSlides(slideIndex);

// Next/previous controls
function plusSlides(n) {
  showSlides(slideIndex += n);
}

// Thumbnail image controls
function currentSlide(n) {
  showSlides(slideIndex = n);
}

function showSlides(n) {
  var i;
  var slides = document.getElementsByClassName("mySlides");
  var dots = document.getElementsByClassName("dot");
  if (n > slides.length) { slideIndex = 1 }
  if (n < 1) { slideIndex = slides.length }
  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";
  }
  for (i = 0; i < dots.length; i++) {
    dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex - 1].style.display = "block";
  dots[slideIndex - 1].className += " active";
}

var slideIndex = 0;
showSlides();

function showSlides() {
  var i;
  var slides = document.getElementsByClassName("mySlides");
  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";
  }
  slideIndex++;
  if (slideIndex > slides.length) { slideIndex = 1 }
  slides[slideIndex - 1].style.display = "block";
  setTimeout(showSlides, 2000); // Change image every 2 seconds
}

//slide show end

//product grid

const productStyles = document.querySelectorAll(".product-styles");

for (let i = 0; i < productStyles.length; i++) {

  for (let j = 0; j < productStyles[i].children.length; j++) {
    productStyles[i].children[j].addEventListener("click", function () {
      const productThumb = this.parentElement.parentElement;
      const proThumbImage = productThumb.querySelector(".pro-thumb-img");
      proThumbImage.src = this.getAttribute("data-image")
      updateStyle(j, this.parentElement)

    })
  }
}
// update buttons of  active styles

function updateStyle(numb, proStyle) {
  for (let i = 0; i < proStyle.children.length; i++) {
    if (i == numb) {
      proStyle.children[i].classList.add("active-style");
    }
    else {
      proStyle.children[i].classList.remove("active-style");
    }
  }
}
//Product quantity counter
function increaseCount(a, b) {
  var input = b.previousElementSibling;
  var value = parseInt(input.value, 10);
  value = isNaN(value) ? 0 : value;
  value++;
  input.value = value;
}

function decreaseCount(a, b) {
  var input = b.nextElementSibling;
  var value = parseInt(input.value, 10);
  if (value > 1) {
    value = isNaN(value) ? 0 : value;
    value--;
    input.value = value;
  }
}
//Manage Cart
function manage_cart(pid, type) {
  if (type == 'update') {
    var qty = document.getElementById(pid + "qty").value;
  } else {
    var qty = jQuery("#qty").val();
  }
  var ajax = new XMLHttpRequest();
  ajax.open("post", "manage_cart.php", true);
  ajax.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      // Response
      var response = this.responseText;
      if (type == 'update' || type == 'remove') {
        console.log("removing");
        window.location.href = window.location.href;
      }
      document.querySelector('.cart-a span').innerHTML = response;
    }
  };
  var data = new URLSearchParams({ pid, qty, type });
  ajax.send(data);
}

//Sort products
function sort_product_drop(cat_id, site_path) {
  var sort_product_id = document.querySelector('#sort_product_id').value;
  window.location.href = site_path + "categories.php?id=" + cat_id + "&sort=" + sort_product_id;
}
//add items to wishlist if user is logged in 
function wishlist_manage(pid, type) {
  var ajax = new XMLHttpRequest();
  ajax.open("post", "wishlist_manage.php", true);
  ajax.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      // Response
      var response = this.responseText;
      if (response == 'not_login') {
        window.location.href = 'login.php';
      } else {
        document.querySelector('.wishlist-count').innerHTML = response;
      }

    }
  };
  var data = new URLSearchParams({ pid, type });
  ajax.send(data);
}

//Get the button
var mybutton = document.getElementById("myBtn");

// When the user scrolls down 20px from the top of the document, show the button
window.onscroll = function() {scrollFunction()};

function scrollFunction() {
  if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
    mybutton.style.display = "block";
  } else {
    mybutton.style.display = "none";
  }
}

// When the user clicks on the button, scroll to the top of the document
function topFunction() {
  document.body.scrollTop = 0;
  document.documentElement.scrollTop = 0;
}



