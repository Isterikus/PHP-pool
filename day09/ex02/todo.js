list = document.getElementById('ft_list');
button = document.getElementById('new');
decodedCookie = decodeURIComponent(document.cookie);
elems = decodedCookie.split(';');
var count;

elems.forEach(function(item, i, arr) {
	if (!item)
		return ;
	var	n = item.indexOf('=');
	item = item.substr(n + 1);
	list.insertAdjacentHTML('afterBegin', "<div class='elem' onclick='if(del_cook(this.innerHTML)) this.parentNode.removeChild(this);' id='e_"+item+"'>"+item+"</div>");
	count = i + 1;
});

button.onclick = function() {
	elem = prompt("Write new TO DO!");
	if (!elem)
		return ;
	if (typeof count === 'undefined')
		count = 1;
	list.insertAdjacentHTML('afterBegin', "<div class='elem' onclick='if(del_cook(this.innerHTML)) this.parentNode.removeChild(this);' id='e_"+elem+"'>"+elem+"</div>");
	document.cookie = "e_"+elem+"="+elem+"; expires=Thu, 18 Dec 2017 12:00:00 UTC; path=/";
	count++;
}

function del_cook(name) {
	if (!confirm("Are you CHELOVEEEEK MALEKULA?"))
		return (false);
	document.cookie = "e_"+name+"=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;";
	return (true);
}
