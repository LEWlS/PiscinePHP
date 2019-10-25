$(document).ready(function(){
	var cookies = document.cookie.split(";");
    for (var i = 0; i < cookies.length; i++) {
        thisone = cookies[i].split('=', 2);
        if ($.isNumeric(thisone[0]))
        {
			$( "#ft_list" ).append("<div id='task' class='task'>" + thisone[1] +"</div>");
		}
	}
	$("button").click(function(){
		var valeur = prompt("New task");
		$("#ft_list").prepend('<div id="task" class="task">' + valeur +'</div>');
		$('#ft_list').children().each(function(index, item){                 
			document.cookie = index + '=' + item.innerHTML; 
		});
	});
	$("#ft_list").on( "click", "#task",function() {
        if (confirm("Sure ?"))
		{	
			$(this).remove();
			deleteAllCookies();
        	$('#ft_list').children().each(function(index, item){                 
            document.cookie = index + '=' + item.innerHTML; 
			});
		}
	});
	function deleteAllCookies() {
		var cookies = document.cookie.split(";");
		for (var i = 0; i < cookies.length; i++) {
			var cookie = cookies[i];
			var eqPos = cookie.indexOf("=");
			var name = eqPos > -1 ? cookie.substr(0, eqPos) : cookie;
			document.cookie = name + "=;expires=Thu, 01 Jan 1970 00:00:00 GMT";
		}
	}
})