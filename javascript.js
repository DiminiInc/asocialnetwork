function loginTabsChange(evt, tabName) {
  // Declare all variables
  var i, tabcontent, tablinks;

  // Get all elements with class="tabcontent" and hide them
  tabcontent = document.getElementsByClassName("tabcontent");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }

  // Get all elements with class="tablinks" and remove the class "active"
  tablinks = document.getElementsByClassName("tablinks");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].className = tablinks[i].className.replace(" active", "");
  }

  // Show the current tab, and add an "active" class to the button that opened the tab
  document.getElementById(tabName).style.display = "block";
  evt.currentTarget.className += " active";
}

function addInput(e){
  var input = document.createElement("input");
  input.setAttribute('name', 'account[]');
  input.setAttribute('type', 'varchar');
  input.setAttribute('class', 'login-input-label');
  input.setAttribute('maxlength', '40');
  var parent = document.getElementById("extForm");
  parent.appendChild(input);
  var input = document.createElement("input");
  input.setAttribute('name', 'account_id[]');
  input.setAttribute('type', 'varchar');
  input.setAttribute('class', 'login-input-label');
  input.setAttribute('maxlength', '40');
  var parent = document.getElementById("extForm");
  parent.appendChild(input);
  var br = document.createElement("br");
  var parent = document.getElementById("extForm");
  parent.appendChild(br);
  var br = document.createElement("br");
  var parent = document.getElementById("extForm");
  parent.appendChild(br);
}