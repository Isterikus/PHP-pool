function del_cook(name) {
	alert(name+"=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;");
	document.cookie = name+"=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;";
}

$( document ).ready(function() {
	list = $('#ft_list');
	button = $('#new');
	count = 0;

	decodedCookie = decodeURIComponent(document.cookie);
	elems = decodedCookie.split(';');
	var count;

	elems.forEach(function(item, i, arr) {
		if (!item)
			return ;
		var	n = item.indexOf('=');
		item = item.substr(n + 1);
		list.prepend("<div class='elem' onclick='this.parentNode.removeChild(this); del_cook(this.getAttribute(\"id\"))' id='e"+i+"'>"+item+"</div>");
		count = i + 1;
	});

	$('#new').click(function() {
		if (typeof count === 'undefined')
			count = 1;
		elem = prompt("Write new TO DO!");
		document.cookie = "e"+count+"="+elem+"; expires=Thu, 18 Dec 2017 12:00:00 UTC; path=/";
		list.prepend("<div class='elem' onclick='this.parentNode.removeChild(this); del_cook(this.getAttribute(\"id\"))' id='e"+count+"'>"+elem+"</div>");
		count++;
	});
});
