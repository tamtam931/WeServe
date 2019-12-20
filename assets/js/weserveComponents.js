const weserveJSPath = window.location.protocol+`//`+window.location.hostname+window.location.pathname

function anchorTag(uri,text,specs){
	
	var componentString = `<a href ="`+weserveJSPath+`">`+text+`</a>`;
	var classSpecs = '';

	if (text) {

		if (uri) {

			newUri = weserveJSPath+uri;

		}

		if (specs) {

			classSpecs = 'class="'+specs+'"';
		}

		componentString = `<a href="`+newUri+`" `+classSpecs+`>`+text+`</a>`;
	}

	return componentString;
}