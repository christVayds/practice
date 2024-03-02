var ifname = document.getElementById("ifname");
var imname = document.getElementById("imname");
var ilname = document.getElementById("ilname");
var iemail = document.getElementById("iemail");
var ipass = document.getElementById("ipass");
var ibdate = document.getElementById("ibdate");
var icourse = document.getElementById("icourse");
var ischoolID = document.getElementById("ischoolID");
var iyear = document.getElementById("iyear");

function generatePass(){
	return "12345678";
}

ipass.value = generatePass();

document.getElementById("next").addEventListener('click', ()=>{
	var first = document.getElementById("first");
	var middle = document.getElementById("middle");
	var last = document.getElementById("last");
	var email = document.getElementById("email");
	var pass = document.getElementById("passw");
	var bdate = document.getElementById("bdate");
	var course = document.getElementById("course");
	var schoolID = document.getElementById("schoolID");
	var year = document.getElementById("year");

	first.textContent = "First name: " + ifname.value;
	middle.textContent = "Middle name: " + imname.value;
	last.textContent = "Last name: " + ilname.value;
	email.textContent = "Email: " + iemail.value;
	pass.textContent = "Password: " + ipass.value;
	bdate.textContent = "Birth date: " + ibdate.value;
	course.textContent = "Course: " + icourse.value;
	schoolID.textContent = "School ID: " + ischoolID.value;
	year.textContent = "Year: " + iyear.value;
});