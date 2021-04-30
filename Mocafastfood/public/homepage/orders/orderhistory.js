function inserted(){
	document.getElementById('overlay').style.display = 'block';
	document.getElementById('insert').style.opacity='1';
	document.getElementById('insert').style.visibility = 'visible';
	document.getElementById('insert').style.transform ='translate(-50%,-50%) rotateX(10deg)';
}
function back(){
	document.getElementById('overlay').style.display = 'none';
	document.getElementById('insert').style.opacity='0';
	document.getElementById('insert').style.visibility = 'hidden';
	document.getElementById('insert').style.transform ='translate(-50%,-50%) rotateX(30deg)';
}