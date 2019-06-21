<!DOCTYPE html>
<html>
<head>
	<title>Form</title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
	<link rel="stylesheet" href="/resources/demos/style.css">
	<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
	<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
	<script>
		function get_age(born, now) {
			var birthday = new Date(now.getFullYear(), born.getMonth(), born.getDate());
			if (now >= birthday) 
				return now.getFullYear() - born.getFullYear();
			else
				return now.getFullYear() - born.getFullYear() - 1;
		}
		$(function() {
			$("#dob").datepicker({
				changeMonth: true,
				changeYear: true,
				dateFormat:"dd-mm-yy",
				onSelect : function(){
					var dob = $("#dob").val();
					console.log(dob);
        			var now = new Date();
        			var birthdate = dob.split("-");
        			var born = new Date(birthdate[2], birthdate[1]-1, birthdate[0]);
        			age=get_age(born,now);
        			$("#age").val(age);
				}
			});
			$('#submit').click(function(e){
				e.preventDefault();
				var username = $("#username").val();
				var firstname = $("#firstname").val();
				var lastname = $("#lastname").val();
				var dob = $("#dob").val();
				var age = $("#age").val();
				var hobbies = $("#hobbies").val();
				$.ajax({
					type: "POST",
					url: "formProcess.php",
					dataType: "json",
					data: {username:username, firstname:firstname, lastname:lastname, dob:dob,age:age,hobbies:hobbies},
					success : function(data){
						if (data.code == "200"){
							alert("Success: " +data.msg);
						} else {
							$(".alert-danger").html("<ul>"+data.msg+"</ul>");
							$(".alert-danger").css("display","block");
						}
					}
				});

      });
		});
		$(function() {
			$("#username").keyup(function(){
		var username = $("#username").val();
		console.log(username.length);
		if(username.length >= 3)
		{
			$("#status").html('<img src="loader.gif" /> Checking availability...');
			$.post("check.php", {username: username}, function(data, status){
				$("#status").html(data);
			});
		}
		
	});
		});
		$( function() {
			    var availableTags = [
      //"Reading","Writing","Cycling","Photography"
    ];
			function split( val ) {
				return val.split( /,\s*/ );
			}
			function extractLast( term ) {
				return split( term ).pop();
			}

			$("#hobbies")
      // don't navigate away from the field on tab when selecting an item
      .on( "keydown", function( event ) {
      	if ( event.keyCode === $.ui.keyCode.TAB &&
      		$( this ).autocomplete( "instance" ).menu.active ) {
      		event.preventDefault();
      }}).autocomplete({
      	minLength: 0,
        source: function( request, response ) {
            $.getJSON("search.php", { term : extractLast( request.term )},response);
        },
      	focus: function() {
          return false;
      },
      select: function( event, ui ) {
      	var terms = split( this.value );
          // remove the current input
          terms.pop();
          // add the selected item
          terms.push( ui.item.value );
          // add placeholder to get the comma-and-space at the end
          terms.push( "" );
          this.value = terms.join( ", " );
          return false;
      }
  });
  } );
</script>
</head>
<body>
	<div class="container">
		<form name="f1">
			<div class="alert alert-danger" role="alert" style="display:none;"></div>
			<div class="form-group">
				<label for="username">Username</label>
				<input type="text" class="form-control" id="username" name="username"aria-describedby="emailHelp" placeholder="username">
				<div id="status"></div>
			</div>
			<div class="form-group">
				<label for="firstname">First Name</label>
				<input type="text" class="form-control" id="firstname" name="firstname" placeholder="firstname">
			</div>
			<div class="form-group">
				<label for="lastname">Last Name</label>
				<input type="text" class="form-control" id="lastname" name="lastname" placeholder="lastname">
			</div>
			<div class="form-group">
				<label for="dob">DOB</label>
				<input type="text" class="form-control" id="dob" name="dob">
			</div>
			<div class="form-group">
				<label for="age">AGE</label>
				<input type="text" class="form-control" id="age" name="age" placeholder="age" readonly>
			</div>
			<div class="form-group">
				<label for="hobbies">Hobbies</label>
				<input type="text" class="form-control" id="hobbies" name="hobbies" placeholder="hobbies">
			</div>
			<div class="form-check">
				<input type="checkbox" class="form-check-input" id="exampleCheck1">
				<label class="form-check-label" for="exampleCheck1">Check me out</label>
			</div>
			<button type="submit" id="submit" class="btn btn-primary">Submit</button>
		</form>
	</div>
</body>
</html>