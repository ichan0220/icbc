$(function(){
	alert('tes');
	function tes(){
		$('img[src="http://maps.gstatic.com/mapfiles/szc4.png"]').attr('style','width: 40px; height: 15px; -webkit-user-select: none; border: 0px; padding: 0px; margin: 0px;');
		$('div[title="Zoom out"]').attr('style','position: absolute; left: 23px; top: 0px; width: 22px; height: 17px; cursor: pointer;');
		$('img[src="http://maps.gstatic.com/mapfiles/szc4.png"]').attr('src',imgPlus);
	}
	tes();
});