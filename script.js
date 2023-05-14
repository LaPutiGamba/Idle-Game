function start(obj) { 
    resize(obj);
    statusPlantation();
}

/**************** RESIZE ****************/
function resize(obj) {
	requestAnimationFrame (function(){ 
		if ((window.innerWidth/obj.offsetWidth) < (window.innerHeight/obj.offsetHeight)) {
			obj.style.transform = "scale(" + window.innerWidth/obj.offsetWidth + ")";
			obj.style.msTransform = "scale(" + window.innerWidth/obj.offsetWidth + ")";
			obj.style.MozTransform = "scale(" + window.innerWidth/obj.offsetWidth + ")";
			obj.style.WebkitTransform = "scale(" + window.innerWidth/obj.offsetWidth + ")";
		} else {
			obj.style.transform = "scale(" + window.innerHeight/obj.offsetHeight + ")";				
			obj.style.msTransform = "scale(" + window.innerHeight/obj.offsetHeight + ")";
			obj.style.MozTransform = "scale(" + window.innerHeight/obj.offsetHeight + ")";
			obj.style.WebkitTransform = "scale(" + window.innerHeight/obj.offsetHeight + ")";
		}

		obj.style.top = ((window.innerHeight/2) - (obj.offsetHeight/2)) + "px";
		obj.style.left = ((window.innerWidth/2) - (obj.offsetWidth/2)) + "px";
	});
}


/**************** CALLING PLANTATIONS ****************/
function plantations(ID, ID2) {
    var _plantations = document.querySelectorAll('[data-crops="P' + ID + '"]');
    for (var i = 0; i < _plantations.length; i++) {
        _plantations[i].style.display = "none";
    }

    switch (ID2) {
    case 1:
        document.getElementById("plantation" + ID).style.backgroundImage = "url('../images/fieldCropsWheat.png')";
        break;
    case 2:
        document.getElementById("plantation" + ID).style.backgroundImage = "url('../images/fieldCropsCorn.png')";
        break;
    case 3:
        document.getElementById("plantation" + ID).style.backgroundImage = "url('../images/fieldCropsSoyBean.png')";
        break;
    case 4:
        document.getElementById("plantation" + ID).style.backgroundImage = "url('../images/fieldCropsSugarCane.png')";
        break;
    case 5:
        document.getElementById("plantation" + ID).style.backgroundImage = "url('../images/fieldCropsCarrot.png')";
        break;
    case 6:
        document.getElementById("plantation" + ID).style.backgroundImage = "url('../images/fieldCropsPumpkin.png')";
        break;
    }

    const xhttp = new XMLHttpRequest();
    xhttp.open("GET", "selectFunction.php?selectFunction=3&numPlantation=" + ID + "&timestampValue=" + (Math.floor(Date.now() / 1000)), true);
    xhttp.send();

    const xhttp2 = new XMLHttpRequest();
    xhttp2.open("GET", "selectFunction.php?selectFunction=5&numPlantation=" + ID + "&cropSelected=" + ID2, true);
    xhttp2.send();
}


/**************** CALLING STATUS PLANTATIONS ****************/
function statusPlantation() {
    const xhttp = new XMLHttpRequest();
    xhttp.onload = function() {
        var ID = this.responseText;
        ID = ID.trim();
        ID = ID.slice(0, (ID.length - 1));
        const plantationsDoneArray = ID.split(", ");

        console.log(plantationsDoneArray);
        for (var i = 0; i < plantationsDoneArray.length; i++) {  
            console.log(plantationsDoneArray[i].slice(-1));
            if (plantationsDoneArray[i].slice(-1) != "0") {
                console.log(plantationsDoneArray[i]);
                console.log(plantationsDoneArray[i].slice(0, -1));
                var getBackgroundImage = window.getComputedStyle(document.getElementById("plantation" + plantationsDoneArray[i].slice(0, -1))).getPropertyValue("background-image");
                var modifiedBackgroundImage = getBackgroundImage.replace('.png', 'Done.png');
                document.getElementById("plantation" + plantationsDoneArray[i]).style.backgroundImage = modifiedBackgroundImage;
            }
        }
    }
    
    xhttp.open("GET", "selectFunction.php?selectFunction=4", true);
    xhttp.send();
}

setInterval(statusPlantation, 5000);


/**************** RECOLLECT CROPS ****************/
function recolectCrops(ID) {
    var getBackgroundImage = window.getComputedStyle(document.getElementById("plantation" + ID)).getPropertyValue("background-image");
    var modifiedBackgroundImage = getBackgroundImage.slice((getBackgroundImage.length - 10), getBackgroundImage.length);

    if (modifiedBackgroundImage == "Done.png')") {
        const xhttp = new XMLHttpRequest();
        xhttp.open("GET", "selectFunction.php?selectFunction=" + ID, true);
        xhttp.send();
    } 

    var _plantations = document.querySelectorAll('[data-crops="P' + ID + '"]');
    for (var i = 0; i < _plantations.length; i++) {
        _plantations[i].style.display = "";
    }

    document.getElementById("plantation" + ID).style.backgroundImage = "url('../images/fieldCrops.png')";
}