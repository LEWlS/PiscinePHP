$(document).ready(function(){
	$.ajax({
		url : 'select.php'
	 });
	$("button").click(function(){
		var valeur = prompt("New task");
		$("#ft_list").prepend('<div id="task" class="task">' + valeur +'</div>');
		console.log(valeur);
		index = $("#ft_list").childElementCount;
		$.ajax({
			url : 'insert.php',
			type : 'GET',
			data : {'index': index, 'val': valeur}
		 });
	});
	$("#ft_list").on( "click", "#task",function() {
        if (confirm("Sure ?"))
		{	
			$(this).remove();
		}
	});
});