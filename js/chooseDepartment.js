var dept_name;
var dept_id;
var current_department_index;

$("document").ready(function() {

	$("#logout-link").click(function() {
		window.location.href = "logout.php";
	});

	current_department_index = -1;
	$("td").click(function(e) {
		let row_id = e.target.id;
		dept_id = row_id[row_id.length - 1];
		modal.style.display = "block";
		dept_name = $(e.target).text();
		$("#confirmation-box-content").html("Are you sure you want to register to <strong>" + dept_name + "</strong>?");
	});

	var modal = document.getElementById('myModal');
	$("#no-btn").click(function() {
		modal.style.display = "none";
	});

	$("#yes-btn").click(function() {
		$.ajax({
			url: 'editDepartment.php',
			method: "POST",
			data: {username:username, dept_id: dept_id},
			success: function(data) {
				console.log(data);
				if(data === "0")
				{
					window.location.href = "courses.php";
				} else {
					
				}
			}
		});
	});

	$(window).click(function(e) {
		if(e.target == modal)
			modal.style.display = "none";
	});

	$(document).keydown(function(e) {
		// down 40
		// up 38
	    let key = e.which;
		if(key == 27 && modal.style.display !== "none")
			modal.style.display = "none";
		if(key == 40 || key == 38) {
			if(key == 40)
				current_department_index++;
			else if(key == 38)
				current_department_index--;

			
		}
	});

});

