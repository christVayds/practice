
// for navigation in mobile view
document.getElementById('option').addEventListener('click', function(){
	var content = document.getElementById('content');
	var nav = document.getElementById('nav');

	content.classList.toggle('visible');
	content.classList.toggle('hidden');

	nav.classList.toggle('visible');
	nav.classList.toggle('hidden');
});