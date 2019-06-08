			<div class="well adik">
			<table style="width:100%">
			<tr>
			<th>Hi ! </th>
			<th> <?php echo $username; ?></th>
			</tr>	
			</table>       
			</div>

			<div class="well adik">
			<table style="width:100%">
			<tr>
			<th><i class="material-icons">&#xE850;</i>  </th>
			<th> <?php echo $balance ; ?> Satoshis</th>
			</tr>	
			</table>       
			</div>
			
			<div class="well content  <?php if($page == "bids"){echo "current";}else {echo "adik" ;}?>">
			<a href="bids.php">
			<table style="width:100%">
			<tr>
			<th><i class="material-icons">&#xE425;</i>  </th>
			<th> <p id="demo1"></p></th>
			</tr>	
			</table>   
			</a>
			</div>
			
			
			<div class="well content  <?php if($page == "old"){echo "current";}else {echo "adik" ;}?>">
			<a href="old.php">
			<table style="width:100%">
			<tr>
			<th><i class="material-icons">&#xE90E;</i>  </th>
			<th> Previous Winners </th>
			</tr>	
			</table>       
			</a>
			</div>
		
			<div class="well content  <?php if($page == "contact"){echo "current";}else {echo "adik" ;}?>">
			<a href="contact.php">
			<table style="width:100%">
			<tr>
			<th><i class="material-icons">&#xE0B0;</i>  </th>
			<th> Contact Us </th>
			</tr>	
			</table>       
			</a>
			</div>		
 <script>
function timeConverter(UNIX_timestamp){
  var a = new Date(UNIX_timestamp * 1000);
  var months = ['Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','Dec'];
  var year = a.getFullYear();
  var month = months[a.getMonth()];
  var date = a.getDate();
  var hour = a.getHours();
  var min = a.getMinutes();
  var sec = a.getSeconds();
  var time = date + ' ' + month + ' ' + year + ' ' + hour + ':' + min + ':' + sec ;
  return time;
}
var datetime = timeConverter(<?php echo $endtime; ?>);
// Set the date we're counting down to
var countDownDate = new Date(datetime).getTime();

// Update the count down every 1 second
var x = setInterval(function() {

    // Get todays date and time
    var now = new Date().getTime();
    
    // Find the distance between now an the count down date
    var distance = countDownDate - now;
    
    // Time calculations for days, hours, minutes and seconds
    var days = Math.floor(distance / (1000 * 60 * 60 * 24));
	if(days == 0){var ony = "";}else{ony = days+"D ";}
		console.log(ony);
    var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
    var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
    var seconds = Math.floor((distance % (1000 * 60)) / 1000);
    
    // Output the result in an element with id="demo"
    document.getElementById("demo").innerHTML = ony + hours + "H "
    + minutes + "M " + seconds + "s ";
    document.getElementById("demo1").innerHTML = ony + hours + "H "
    + minutes + "M " + seconds + "s ";    
    // If the count down is over, write some text 
    if (distance < 0) {
        clearInterval(x);
        document.getElementById("demo").innerHTML = "EXPIRED";
		document.getElementById("demo1").innerHTML = "EXPIRED";
    }
}, 1000);
</script>			