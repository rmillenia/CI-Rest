<!-- jQuery -->
		<script src="//code.jquery.com/jquery.js"></script>
		<!-- Bootstrap JavaScript -->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
		<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
 		<script src="Hello World"></script>

 		<script>
		function w3_open() {
			document.getElementById("main").style.marginLeft = "25%";
			document.getElementById("mySidebar").style.width = "25%";
			document.getElementById("mySidebar").style.display = "block";
			document.getElementById("openNav").style.display = 'none';
			document.getElementById("judul").style.display = 'none';
		}
		function w3_close() {
			document.getElementById("main").style.marginLeft = "0%";
			document.getElementById("mySidebar").style.display = "none";
			document.getElementById("openNav").style.display = "inline-block";
			document.getElementById("judul").style.display = 'inline-block';
		}

		function driverMenu() {
		    var x = document.getElementById("lihatDriver");
		    if (x.className.indexOf("w3-show") == -1) {
		        x.className += " w3-show";
		        x.previousElementSibling.className += " w3-green";
		    } else { 
		        x.className = x.className.replace(" w3-show", "");
		        x.previousElementSibling.className = 
		        x.previousElementSibling.className.replace(" w3-green", "");
		    }
		}

		function userMenu() {
		    var x = document.getElementById("lihatUser");
		    if (x.className.indexOf("w3-show") == -1) {
		        x.className += " w3-show";
		        x.previousElementSibling.className += " w3-green";
		    } else { 
		        x.className = x.className.replace(" w3-show", "");
		        x.previousElementSibling.className = 
		        x.previousElementSibling.className.replace(" w3-green", "");
		    }
		}

		function transaksiMenu() {
		    var x = document.getElementById("lihatTransaksi");
		    if (x.className.indexOf("w3-show") == -1) {
		        x.className += " w3-show";
		        x.previousElementSibling.className += " w3-green";
		    } else { 
		        x.className = x.className.replace(" w3-show", "");
		        x.previousElementSibling.className = 
		        x.previousElementSibling.className.replace(" w3-green", "");
		    }
		}

		</script>