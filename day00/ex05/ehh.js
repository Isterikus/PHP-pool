
function head_next() {
	var game = document.getElementById("test");
	game.classList.remove("invisible");
	game.classList.add("visible");
}

function set_icons() {
	$(".icn").removeClass("l_img");
	$(".icn").addClass("jump");
}

function unset_icons() {
	$(".icn").addClass("l_img");
	$(".icn").removeClass("jump");
}

function set_attr() {
	$(".left").attr("contenteditable", "true");
	$(".right").attr("contenteditable", "true");
}

function icons() {
	var game = document.getElementsByClassName("icn");
	$("img.icn").mouseenter(function() { $(this).css( "width", "90%" ) }).mouseleave(function() { $(this).css( "width", "58%" ) });
	$("#conten").click(set_attr());
}

function form(event)
{
	event.preventDefault();
	var que = document.querySelector("#form input[type='text']").value;
	var ansv = document.querySelector("#ansv");
	var game = document.getElementById("test");
	var head = document.getElementsByClassName("head");
	var cat = document.getElementById("ct");
	var mid_img = document.getElementById("mid");

	if (que.indexOf("yes") > -1 || que.indexOf("Yes") > -1)
	{
		ansv.innerHTML = "Ok, go to header!";
		head_next();
	}
	else
	{
		ansv.innerHTML = "Ohh, sadly. May be this preety cat can convince you?) Click on it!";
		cat.classList.remove("r_opacity");
		mid_img.classList.add("opacity");
		document.querySelector("#cl_ct").addEventListener("click", head_next);
	}
	document.querySelector("#form input[type='text']").value = " ";
}

window.onload = function () {
	document.querySelector("#form").addEventListener("submit", form);
	document.querySelector("#ic_game").addEventListener("click", icons);
}
