const inputs = document.querySelectorAll(".input");

function focusFunc() {
  let parent = this.parentNode;
  parent.classList.add("focus");
}

function blurFunc() {
  let parent = this.parentNode;
  if (this.value == "") {
    parent.classList.remove("focus");
  }
}

inputs.forEach((input) => {
  input.addEventListener("focus", focusFunc);
  input.addEventListener("blur", blurFunc);
});

function send_message() {
  var name = document.querySelector("#name").value;
  var email = document.querySelector("#email").value;
  var mobile = document.querySelector("#mobile").value;
  var message = document.querySelector("#message").value;

  if (name == "") {
    alert('Please enter name');
  } else if (email == "") {
    alert('Please enter email');
  }
  else if (mobile == "") {
    alert('Please enter mobile');
  }
  else if (message == "") {
    alert('Please enter message');
  } else {
    var ajax = new XMLHttpRequest();
    ajax.open("POST", "send_message.php", true);
    ajax.onreadystatechange = function () {
      if (this.readyState == 4 && this.status == 200) {
        // Response
        var response = this.responseText;
        alert(response);
      }
    };
    var data = new URLSearchParams({ name, email, mobile, message });
    ajax.send(data);

  }
}