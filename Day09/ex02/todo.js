
var c = document.cookie.split(';');
var index = 0;
var list = document.getElementById('ft_list');
for (var key in c)
{
	c[key] = c[key].trim();
	c[key] = c[key].split('=');
}
window.onload = function init(){
	for (key in c)
	{
		l = parseInt(c[key][0]);
		if (!isNaN(l))
		{
			Add(c[key][1].toString());
			if (l > index)
			{
				index = l;
			}
		}
	}
}

function Done(obj){
	if(confirm('Sure?') == true)
		obj.parentNode.removeChild(obj);
	for (key in c)
	
		if (c[key][1] == obj.id)
		{
			document.cookie = c[key][0] + '=; expires=Thu, 01 Jan 1970 00:00:01 GMT;';
		}
	}

function New(){
	var task = prompt("New task");
	task = task.trim();
	if (task != "")
	{	
		var list = document.getElementById('ft_list');
		var taskObject = document.createElement('div');
		taskObject.innerText = task;
		taskObject.id = task;
		taskObject.style.backgroundColor = "grey";
		taskObject.style.width = "100%";
		taskObject.style.height = "50px";
		taskObject.style.textAlign = "center";
		taskObject.style.fontFamily= "monaco";
		taskObject.style.fontSize = '30px';
		taskObject.style.borderColor = "black";
		taskObject.style.borderStyle = "solid";
		taskObject.style.color = "white";
		taskObject.setAttribute("onClick", "Done(this)");
		list.insertAdjacentElement('afterbegin', taskObject);
		index++;
		document.cookie = index + "=" + task;
	}
 }
 function Add(task){
	var list = document.getElementById('ft_list');
	var taskObject = document.createElement('div');
	taskObject.innerText = task;
	taskObject.id = task;
	taskObject.style.backgroundColor = "grey";
	taskObject.style.width = "100%";
	taskObject.style.height = "50px";
	taskObject.style.textAlign = "center";
	taskObject.style.fontFamily= "monaco";
	taskObject.style.fontSize = '30px';
	taskObject.style.borderColor = "black";
	taskObject.style.borderStyle = "solid";
	taskObject.style.color = "white";
	taskObject.setAttribute("onClick", "Done(this)");
	list.insertAdjacentElement('afterbegin', taskObject);
 }
 