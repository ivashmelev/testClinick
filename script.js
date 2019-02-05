$(document).ready(() => {

	for(i in tables){
		for(j in values[i]){
			let elemTable = $(".table[title="+values[i][j].table+"]");
			let elemRow = elemTable.children("tbody").children(".row[title="+values[i][j].row+"]");
			let elemColumn = elemRow.children(".column[title="+values[i][j].column+"]").text(values[i][j].value);
		}
	}

	$(".add").click(() => {
		$(".form").load("form.php");
	});

});