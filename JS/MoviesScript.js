var ratedMovies=[];

function groupBy(genre) {

	var reset = document.querySelectorAll('div');
	for (var i = 0; i < reset.length; i++) {
		reset[i].style.display='';
	}
	if (genre=="") return; // please select - possibly you want something else here
	// alert("it is Working");
	genre = genre.toLowerCase();
	var elements = document.querySelectorAll('div:not(.' + genre + ')');
	console.log(elements);
	for (var i = 0; i < elements.length; i++) {
		elements[i].style.display='none';
	}
	// divOne.style.display='none';
} 

function rate(rating, id) {
	var result = document.querySelector('.starRating' + id +  ' #rating' + rating);
	result.checked = true;
	// document.getElementById("rating" + rating).checked = true;
};


function addRate(form)
{
	var url = $(form).attr('action');

                // fetch the data for the form
    var data = $(form).serializeArray();

    // setup the ajax request
    $.ajax({
        url: url,
        data: data,
        dataType: 'json',
        success: function() {
            if(rsp.success) {
                alert('form has been posted successfully');
            }
        }
    });

   
    return false;
	


}