var dept_name;
var dept_id;

$("document").ready(function() {
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
		//Check first if a textbox is in focus
	    let key = e.which;
		if(key == 27 && modal.style.display !== "none")
			modal.style.display = "none";
	});

});

