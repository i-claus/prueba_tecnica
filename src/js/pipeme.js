
//var someString = 'biomedica';

String.prototype.pipeme = function() {
	return (Array.from(this.toUpperCase())).join('|');
}
