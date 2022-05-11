// JavaScript Document
$(document).ready(function(){

	 //AJAX service request to get the main text data from the json data store
	 $.getJSON('/~zc243/3dapp/assignment/data.json', function(jsonObj) {
	  
		//Get the coke main text data
		$('#x3dModelTitle_coke').html('<h2>' + jsonObj.pageTextData[4].x3dModelTitle + '<h2>');
		$('#x3dCreationMethod_coke').html('<p>' + jsonObj.pageTextData[4].x3dCreationMethod + '<p>');
		$('#title_coke').html('<h2>' + jsonObj.pageTextData[4].title + '<h2>');
		$('#subTitle_coke').html('<h3>' + jsonObj.pageTextData[4].subTitle + '</h3>');
		$('#description_coke').html('<p>' + jsonObj.pageTextData[4].description + '</p>');
 
		//Get the sprite main text data
		$('#x3dModelTitle_sprite').html('<h2>' + jsonObj.pageTextData[5].x3dModelTitle + '<h2>');
		$('#x3dCreationMethod_sprite').html('<p>' + jsonObj.pageTextData[5].x3dCreationMethod + '<p>');
		$('#title_sprite').html('<h2>' + jsonObj.pageTextData[5].title + '<h2>');
		$('#subTitle_sprite').html('<h3>' + jsonObj.pageTextData[5].subTitle + '</h3>');
		$('#description_sprite').html('<p>' + jsonObj.pageTextData[5].description + '</p>');		

		//Get the pepper main text data
		$('#x3dModelTitle_fanta').html('<h2>' + jsonObj.pageTextData[6].x3dModelTitle + '<h2>');
		$('#x3dCreationMethod_fanta').html('<p>' + jsonObj.pageTextData[6].x3dCreationMethod + '<p>');
 		$('#title_fanta').html('<h2>' + jsonObj.pageTextData[6].title + '<h2>');
		$('#subTitle_fanta').html('<h3>' + jsonObj.pageTextData[6].subTitle + '</h3>');
		$('#description_fanta').html('<p>' + jsonObj.pageTextData[6].description + '</p>');
		


	 });
});








