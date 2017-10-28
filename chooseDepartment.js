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
		alert(dept_name + dept_id);
		
		
	});

});

