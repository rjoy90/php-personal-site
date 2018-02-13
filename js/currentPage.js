var docURL = document.URL;
var linksList = document.querySelectorAll('a[href]');
for (var i = 0; i< linksList.length; i++) 
{
	var link = linksList[i];
	console.log(link.href + ", " + docURL);
	//window.alert(link.href + ", " + docURL);
	if (link.href === docURL) 
	{
		link.className += 'current-link';
		//window.alert("found current page!");
	}
}