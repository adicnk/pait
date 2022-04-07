//Hanya Alphabet dan Huruf Saja
function alphaOnly(event) {
	var key = event.keyCode;
	//console.log(key);
	return ((key>=65 && key<=90) || key==46 || key>=97 || key==32);
}

//Hanya numeric saja
function numOnly(event) {
	var key = event.keyCode;
	//console.log(key);
	return (key>=48 && key<=57);
}

//Hanya huruf, angka, koma dan garing
function placeDateOnly(event) {
	var key = event.keyCode;
	//console.log(key);
	return ((key>=65 && key<=90) || (key==47 || (key>=48 && key<=57)) || key>=97 || key==44 || key==32);
}

// Warna kuning ketika mengedit
function yellowin(x){
	x.style.background = "yellow";
}

//Untuk warna putih ketika selesai mengedit
function whiteout(x){		
	x.style.background = "white";
}