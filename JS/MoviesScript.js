function groupBy(genre) {
	if (genre=="") return; // please select - possibly you want something else here
	// alert("it is Working");
	genre = genre.toLowerCase();

	console.log(genre);
	var elements = document.querySelector('div :not(genre)');
	console.log(elements);
	// divOne.style.display='none';
} 