with(document.producto){
	onsubmit = function(e){
		e.preventDefault();
		ok = true;
		if(!isChecked){
            var isChecked = document.getElementById('c0').checked;
            alert('Selecciona un color');
        }
		if(ok){ submit(); }
	}
}
