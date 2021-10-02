var acc = document.querySelectorAll('.accordion-title');
var accItem = document.querySelectorAll('.accordionItem');
var i;

for (i = 0; i < acc.length; i++) {
    if(acc[i].parentElement.className=="accordionItem open"){
        acc[i].classList.add('active');
    }
    acc[i].addEventListener("click", toggleItem, false);
    function toggleItem() {
        var itemClass = this.parentNode.className;
        for (i = 0; i < accItem.length; i++) {
            // acc[i].style.maxHeight = null;
            // acc[i].style.paddingTop="0px";
            // acc[i].style.paddingBottom = "0px";
            accItem[i].firstElementChild.classList.remove('active');
            accItem[i].className='accordionItem close';
        }
        if (itemClass == 'accordionItem close') {
            this.parentNode.className = 'accordionItem open';
            this.classList.add('active');
            this.style.maxHeight = this.scrollHeight + "px";;
            // this.nextElementSibling.style.paddingTop="20px";
            // this.style.paddingBottom = "30px";

        }
    }
}