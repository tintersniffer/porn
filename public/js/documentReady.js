var documentReady = new Array(); 
var documentReadyInterator = 0;
function addDocumentReady(_function){
	documentReady[documentReadyInterator++] = _function;
}