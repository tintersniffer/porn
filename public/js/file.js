var itemNext = 0;
var itemList = {}; // file, isDownloading
function sendFile(){	
	var fileField = document.getElementById('file');
	if(fileField.value=='') return;	
		
	for(var i=0; i< fileField.files.length; i++){
		var file = fileField.files[i];
		var obj = new Object();
		obj.file = file;
		obj.isDownloading = false;
		obj.isCompleted = false;
				
		itemList[itemNext] = obj;
		
		var data = "<tr>";
		data +="<td><span style=\"font-weight: bold;\">";
		data +=itemNext;
		data +="</span></td>";
		data +="<td id=\"myFileName"+itemNext+"\"><span style=\"font-weight: bold;\">";
		data +=file.name;
		data +="</span></td>";
		data +="<td>";
		data += "<div id=\"myProgress"+itemNext+"\"><span style=\"font-weight: bold;\">On queue</span> <a href=\"#\" class=\"btn btn-danger\" onclick=\"downloadFile("+itemNext+"); return false;\">Start now</a></div>";
		data +="</td>";
		data +="</tr>";
		$('#myTable>tbody').append(data);	
		itemNext++;
	}
	$('#file').val('');
	handleFile();
}

function handleFile(){
	var itemNumber = -1;
	for(var i=0; i<itemNext; i++){
		if(itemList[i].isDownloading) return;
		if( !itemList[i].isCompleted){
			itemNumber = i;
			break;
		}
	}
	if(itemNumber == -1) return;	
	downloadFile(itemNumber);
}

function downloadFile(_itemNumber){
	//var startTime = new Date().getTime();	
	var xhr = new XMLHttpRequest();
	var file = itemList[_itemNumber].file;	
	itemList[_itemNumber].isDownloading = true;
    xhr.upload.onprogress = function(e) {
        	var done = e.position || e.loaded, total = e.totalSize || e.total;
            var progress = Math.floor(done/total*1000)/10;
            var unprogress = 100-progress;
            var currTime = new Date().getTime();
            var usedTime = currTime - this.startTime;
            var estimatedTime = usedTime/progress*unprogress;
            estimatedTime = estimatedTime/1000;
            var sec = Math.round(estimatedTime%60);
            estimatedTime = Math.floor(estimatedTime/60);
            var min = estimatedTime%60;
            var hour = Math.floor(estimatedTime/60);
            var progressId = "#myProgress"+this.itemNumber;
            sec = (sec<10)? "0"+sec:sec;
            min = (min<10)? "0"+min:min;
            hour = (min<10)? "0"+hour: hour;
            var time = "Time left:   "+hour+":"+min+":"+sec;
            var progressData = "<span style=\"font-weight: bold;\">"+time+"</span><div class=\"progress progress-striped\"><div class=\"bar\" style=\"text-align: left; padding-left: 5px; width: "+progress+"%;\">"+progress+"%</div></div>";
            $(progressId).html(progressData);
    };       
    xhr.onreadystatechange = function(e) {
        if ( 4 == this.readyState ) {
        	        
        	itemList[this.itemNumber].isCompleted = true;
        	itemList[this.itemNumber].isDownloading = false;

        	
        	//alert(itemList[_itemNumber].file.name);
            handleFile();
            console.log(['xhr upload complete', e]);
        }
    };
    xhr.onload = function(e){
    	var progressId = "#myProgress"+this.itemNumber;
    	var filenameId = "#myFileName"+this.itemNumber;
    	$(progressId).html('<span style=\"font-weight: bold;\">upload complete</span> &nbsp; <a class="btn btn-inverse" href="'+this.responseText+'" target="_blank">View</a>'); 
    	//$(filenameId).html('<span style=\"font-weight: bold;\">'+itemList[_itemNumber].file.name+'<br /></span><input onClick="this.select();" tyle="text" value="'+this.responseText+'">'); 
       	//$(filenameId).html('<span style=\"font-weight: bold;\">'+itemList[_itemNumber].file.name+'<br />'+this.responseText+'</span>');
        //$('#test').html(this.responseText);
    };
    
    var formData = new FormData();
    formData.append("file", file);    
	var url = document.getElementById('server').value + "/upload.php";
    alert(url);
    xhr.open('post', url, true);
    //xhr.setRequestHeader("Cache-Control", "no-cache"); 
    xhr.upload.startTime = new Date().getTime();
    xhr.upload.itemNumber = _itemNumber;	
    xhr.itemNumber = _itemNumber;    
    xhr.send(formData);
}