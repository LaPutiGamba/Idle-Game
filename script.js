function start(obj) { 
    resize(obj);
    statusPlantation();

    changeScene();
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


/**************** CHANGE FROM LOADING SCENE TO THE GAME ****************/
function changeScene() {
    document.getElementById("loadingScene").style.display = "none";
    document.getElementById("game").style.display = "";
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
        for (var i = 0; i < plantationsDoneArray.length; i++) {  
            var comparition = plantationsDoneArray[i].slice(-1);
            
            // It's done update.
            if (comparition == "0") {
                switch(plantationsDoneArray[i].slice(1, 2)) {
                    case "1":
                        document.getElementById("plantation" + plantationsDoneArray[i].slice(0, 1)).style.backgroundImage = "url('../images/fieldCropsWheatDone.png')";
                        break;
                    case "2":
                        document.getElementById("plantation" + plantationsDoneArray[i].slice(0, 1)).style.backgroundImage = "url('../images/fieldCropsCornDone.png')";
                        break;
                    case "3":
                        document.getElementById("plantation" + plantationsDoneArray[i].slice(0, 1)).style.backgroundImage = "url('../images/fieldCropsSoyBeanDone.png')";
                        break;
                    case "4":
                        document.getElementById("plantation" + plantationsDoneArray[i].slice(0, 1)).style.backgroundImage = "url('../images/fieldCropsSugarCaneDone.png')";
                        break;
                    case "5":
                        document.getElementById("plantation" + plantationsDoneArray[i].slice(0, 1)).style.backgroundImage = "url('../images/fieldCropsCarrotDone.png')";
                        break;
                    case "6":
                        document.getElementById("plantation" + plantationsDoneArray[i].slice(0, 1)).style.backgroundImage = "url('../images/fieldCropsPumpkinDone.png')";
                        break;
                    default:
                        break;
                }

                var _plantations = document.querySelectorAll('[data-crops="P' + plantationsDoneArray[i].slice(0, 1) + '"]');
                for (var x = 0; x < _plantations.length; x++) {
                    _plantations[x].style.display = "none";
                }

            }

            // It's done.
            if (comparition == "1") {
                var getBackgroundImage = window.getComputedStyle(document.getElementById("plantation" + plantationsDoneArray[i].slice(0, 1))).getPropertyValue("background-image");
                var modifiedBackgroundImage = getBackgroundImage.replace('.png', 'Done.png');
                document.getElementById("plantation" + plantationsDoneArray[i].slice(0, 1)).style.backgroundImage = modifiedBackgroundImage;
            }

            // It's not done.
            if (comparition == "2") {
                switch(plantationsDoneArray[i].slice(1, 2)) {
                    case "1":
                        document.getElementById("plantation" + plantationsDoneArray[i].slice(0, 1)).style.backgroundImage = "url('../images/fieldCropsWheat.png')";
                        break;
                    case "2":
                        document.getElementById("plantation" + plantationsDoneArray[i].slice(0, 1)).style.backgroundImage = "url('../images/fieldCropsCorn.png')";
                        break;
                    case "3":
                        document.getElementById("plantation" + plantationsDoneArray[i].slice(0, 1)).style.backgroundImage = "url('../images/fieldCropsSoyBean.png')";
                        break;
                    case "4":
                        document.getElementById("plantation" + plantationsDoneArray[i].slice(0, 1)).style.backgroundImage = "url('../images/fieldCropsSugarCane.png')";
                        break;
                    case "5":
                        document.getElementById("plantation" + plantationsDoneArray[i].slice(0, 1)).style.backgroundImage = "url('../images/fieldCropsCarrot.png')";
                        break;
                    case "6":
                        document.getElementById("plantation" + plantationsDoneArray[i].slice(0, 1)).style.backgroundImage = "url('../images/fieldCropsPumpkin.png')";
                        break;
                    default:
                        break;
                }

                var _plantations = document.querySelectorAll('[data-crops="P' + plantationsDoneArray[i].slice(0, 1) + '"]');
                for (var y = 0; y < _plantations.length; y++) {
                    _plantations[y].style.display = "none";
                }
            }
        }

        changeScene();
    }
    
    xhttp.open("GET", "selectFunction.php?selectFunction=4", true);
    xhttp.send();
}

setInterval(statusPlantation, 5000);


/**************** RECOLLECT CROPS ****************/
function recolectCrops(ID) {
    if (ID == 7) {
        var getBackgroundImage = document.getElementById("chicken").src;
    } else if (ID == 8) {
        var getBackgroundImage = document.getElementById("cow").src;
        } else if (ID == 9) {
            var getBackgroundImage = document.getElementById("pig").src;
            } else {
                var getBackgroundImage = document.getElementById("plantation" + ID).style.backgroundImage;
            }

    var sugarCaneBackground = getBackgroundImage.slice((getBackgroundImage.length - 10), getBackgroundImage.length);
    var modifiedBackgroundImage = getBackgroundImage.slice((getBackgroundImage.length - 8), getBackgroundImage.length);
    if (sugarCaneBackground != "Cane.png\")" && (modifiedBackgroundImage == "ne.png\")" || modifiedBackgroundImage == "Done.png")) {
        const xhttp = new XMLHttpRequest();
        if (modifiedBackgroundImage == "ne.png\")") {
            switch(getBackgroundImage.slice((getBackgroundImage.length - 14), getBackgroundImage.length)) {
                case "heatDone.png\")":
                    xhttp.open("GET", "selectFunction.php?selectFunction=6&selectedMaterial=1&selectedPlantation=" + ID, true);
                    break;
                case "CornDone.png\")":
                    xhttp.open("GET", "selectFunction.php?selectFunction=6&selectedMaterial=2&selectedPlantation=" + ID, true);
                    break;
                case "BeanDone.png\")":
                    xhttp.open("GET", "selectFunction.php?selectFunction=6&selectedMaterial=3&selectedPlantation=" + ID, true);
                    break;
                case "CaneDone.png\")":
                    xhttp.open("GET", "selectFunction.php?selectFunction=6&selectedMaterial=4&selectedPlantation=" + ID, true);
                    break;
                case "rrotDone.png\")":
                    xhttp.open("GET", "selectFunction.php?selectFunction=6&selectedMaterial=5&selectedPlantation=" + ID, true);
                    break;
                case "pkinDone.png\")":
                    xhttp.open("GET", "selectFunction.php?selectFunction=6&selectedMaterial=6&selectedPlantation=" + ID, true);
                    break;
                default:
                    break;
            }
        }

        if (modifiedBackgroundImage == "Done.png") {
            switch(getBackgroundImage.slice((getBackgroundImage.length - 11), getBackgroundImage.length)) {
                case "kenDone.png":
                    xhttp.open("GET", "selectFunction.php?selectFunction=6&selectedMaterial=" + ID + "&selectedPlantation=1", true);
                    break;
                case "cowDone.png":
                    xhttp.open("GET", "selectFunction.php?selectFunction=6&selectedMaterial=" + ID + "&selectedPlantation=2", true);
                    break;
                case "pigDone.png":
                    xhttp.open("GET", "selectFunction.php?selectFunction=6&selectedMaterial=" + ID + "&selectedPlantation=3", true);
                    break;
                default:
                    break;
            }
        }

        xhttp.send();

        var _plantations = document.querySelectorAll('[data-crops="P' + ID + '"]');
        for (var i = 0; i < _plantations.length; i++) {
            _plantations[i].style.display = "";
        }
    
        if (ID == 7) {
            document.getElementById("chicken").src = "../images/chicken.png";
        } else if (ID == 8) {
            document.getElementById("cow").src = "../images/cow.png";
            } else if (ID == 9) {
                document.getElementById("pig").src = "../images/pig.png";
                } else {
                document.getElementById("plantation" + ID).style.backgroundImage = "url('../images/fieldCrops.png')";
                }
    } 
}


/**************** RECOLLECT ANIMAL MATERIALS ****************/
function coops(ID) {
    const xhttp = new XMLHttpRequest();
    xhttp.onload = function() {
        isActive = this.responseText;
        if (isActive == "NULL") {
            switch (ID) {
            case 1:
                document.getElementById("chicken").src = "../images/chickenWaiting.png";
                break;
            case 2:
                document.getElementById("cow").src = "../images/cowWaiting.png";
                break;
            case 3:
                document.getElementById("pig").src = "../images/pigWaiting.png";
                break;
            }
                        
            const xhttp2 = new XMLHttpRequest();
            xhttp2.open("GET", "selectFunction.php?selectFunction=7&numCoop=" + ID + "&timestampValue=" + (Math.floor(Date.now() / 1000)), true);
            xhttp2.send();
        }
        }
    xhttp.open("GET", "selectFunction.php?selectFunction=8&numCoop=" + ID, true);
    xhttp.send();
}


/**************** CALLING STATUS COOPS ****************/
function statusCoops() {
    const xhttp = new XMLHttpRequest();
    xhttp.onload = function() {
        var ID = this.responseText;
        ID = ID.trim();
        ID = ID.slice(0, (ID.length - 1));
        const coopsDoneArray = ID.split(", ");

        for (var i = 0; i < coopsDoneArray.length; i++) {  
            var comparition = coopsDoneArray[i].slice(-1);

            // It's done update.
            if (comparition == "0") {
                switch(coopsDoneArray[i].slice(0, 1)) {
                case "1":
                    document.getElementById("chicken").src = "../images/chickenDone.png";
                    break;
                case "2":
                    document.getElementById("cow").src = "../images/cowDone.png";
                    break;
                case "3":
                    document.getElementById("pig").src = "../images/pigDone.png";
                    break;
                default:
                    break;
                }
            }

            // It's done.
            if (comparition == "1") {
                var getBackgroundImage = window.getComputedStyle(document.getElementById("coop" + coopsDoneArray[i].slice(0, 1))).getPropertyValue("src");
                var modifiedBackgroundImage = getBackgroundImage.replace('.png', 'Done.png');
                document.getElementById("coop" + coopsDoneArray[i].slice(0, 1)).src = modifiedBackgroundImage;
            }

            // It's not done.
            if (comparition == "2") {
                switch(coopsDoneArray[i].slice(0, 1)) {
                    case "1":
                        document.getElementById("chicken").src = "../images/chickenWaiting.png";
                        break;
                    case "2":
                        document.getElementById("cow").src = "../images/cowWaiting.png";
                        break;
                    case "3":
                        document.getElementById("pig").src = "../images/pigWaiting.png";
                        break;
                    default:
                        break;
                }
            }
        }

        changeScene();
    }
    
    xhttp.open("GET", "selectFunction.php?selectFunction=9", true);
    xhttp.send();
}

setInterval(statusCoops, 5000);