<!DOCTYPE html>
<html>
    <head>
        <title> Live Search </title>
        <link rel="stylesheet" href="https://bootswatch.com/3/cosmo/bootstrap.min.css">
        <script type="text/javascript" src="<?php echo base_url();?>assets/js/jquery.js" ></script>
        <link rel="stylesheet" href= "https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
        .dropbtn {
  background-color: #04AA6D;
  color: white;
  padding: 16px;
  font-size: 16px;
  border: none;
  cursor: pointer;
}

.dropbtn:hover, .dropbtn:focus {
  background-color: #3e8e41;
}

#myInput {
  box-sizing: border-box;
  background-image: url('searchicon.png');
  background-position: 14px 12px;
  background-repeat: no-repeat;
  font-size: 16px;
  padding: 14px 20px 12px 45px;
  border: none;
  border-bottom: 1px solid #ddd;
}

#myInput:focus {outline: 3px solid #ddd;}

.dropdown {
  position: relative;
  display: inline-block;
}

.dropdown-content {
  display: none;
  position: absolute;
  background-color: #f6f6f6;
  min-width: 230px;
  overflow: auto;
  border: 1px solid #ddd;
  z-index: 1;
}

.dropdown-content a {
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
}

.dropdown a:hover {background-color: #ddd;}

.show {display: block;}

 </style>
            </head>
            <body> 
                <h3 align="center"> Check Out </h3> 
                <div class align="center">   
                <div class="dropdown">
                <button onclick="myFunction()" class="dropbtn">Search Names</button>
            <div id="myDropdown" class="dropdown-content">
             <input type="text" placeholder="Search.." id="myInput" onkeyup="filterFunction()">
            
             <?php foreach ($visitors as $row):?>
            <a href='' class="visitor-link" data-visitor_id="<?php echo $row->visitor_id;?>"><?php echo $row->name;?></a>
                <?php endforeach;?>
                </div>
             </div>
                <div id="results-container">
            </div>
            <script>
              window.onload = function() {
    var visitorLinks = document.getElementsByClassName('visitor-link');
    for (var i = 0; i < visitorLinks.length; i++) {
        visitorLinks[i].addEventListener('click', function(event) {
            event.preventDefault();
            var visitorName = this.innerText;
            var visitorId = this.getAttribute('data-visitor_id');
            var url = 'book?visitor=' + encodeURIComponent(visitorName);
            window.location.href = url;
        });
    }
};
</script>
            <script>

function myFunction() {
  document.getElementById("myDropdown").classList.toggle("show");
}
function filterFunction() {
  var input, filter, ul, li, a, i;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  div = document.getElementById("myDropdown");
  a = div.getElementsByTagName("a");
  for (i = 0; i < a.length; i++) {
    txtValue = a[i].textContent || a[i].innerText;
    if (txtValue.toUpperCase().indexOf(filter) > -1) {
      a[i].style.display = "";
    } else {
      a[i].style.display = "none";
    }
  }
}
</script>
  
 </script>
            
  </body>
  </html>
