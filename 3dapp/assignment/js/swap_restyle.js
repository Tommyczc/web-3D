// JavaScript Document
var counter = 0;
$(document).ready(function() {
	
	selectPage();
	
});

function selectPage() {

	$('#home').show();
	$('#about').hide();
	$('#models').hide();


    document.getElementById('bodyColor').style.backgroundColor = 'lightblue';
	document.getElementById('headerColor').style.backgroundColor = '#8a1e10';
	document.getElementById('footerColor').style.backgroundColor = '#8a1e10';

	$('#navHome').click(function(){
		$('#home').show();
		$('#about').hide();
		$('#models').hide();

	});

	$('#navStyle').click(function(){
    		changeLook();
    	});

	$('#navAbout').click(function(){
		$('#home').hide();
		$('#about').show();
		$('#models').hide();
	});

	$('#navModels').click(function(){
		window.location="./x3D_viewer_page/index.php";
	});
}




function changeLook() {
	counter += 1;
	switch (counter) {
		case 1:
			document.getElementById('bodyColor').style.backgroundColor = 'lightblue';
			document.getElementById('headerColor').style.backgroundColor = '#FF0000';
			document.getElementById('footerColor').style.backgroundColor = '#FF9900';
			break;

	    case 2:
	        changeBack();
	        counter==0;
	        break;
	}
}

function changeBack() {
	document.getElementById('bodyColor').style.backgroundColor = 'lightblue';
    document.getElementById('headerColor').style.backgroundColor = '#8a1e10';
    document.getElementById('footerColor').style.backgroundColor = '#8a1e10';
}

