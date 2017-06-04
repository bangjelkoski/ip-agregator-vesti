
// Postavi Cookie
function setCookie(cname, cvalue, exdays) {
    var d = new Date();
    d.setTime(d.getTime() + (exdays*24*60*60*1000));
    var expires = "expires="+ d.toUTCString();
    document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
}


// Procitaj Cookie
function getCookie(cname) {
    var name = cname + "=";
    var decodedCookie = decodeURIComponent(document.cookie);
    var ca = decodedCookie.split(';');
    for(var i = 0; i <ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0) == ' ') {
            c = c.substring(1);
        }
        if (c.indexOf(name) == 0) {
            return c.substring(name.length, c.length);
        }
    }
    return "";
}

// Proveri da li je vec lajkovan Post
function verifyLike(e){
	var post_id = e.getAttribute('data-id'), like_count_element = e.querySelector('.like-count'), like_count = like_count_element.innerHTML;
	// Postoji Cookie
	if(getCookie('lajkovana_vest_'+post_id)){
		alert('Vec ste lajkovali');
	}else{
		like_count_element.innerHTML = parseInt(like_count) + 1;
		setCookie('lajkovana_vest_'+post_id, true, 900);
		ajaxLikeHate(1, 1, post_id, parseInt(like_count) + 1);
	}
}

// Proveri da li je vec Hejtovan Post
function verifyHate(e){
	var post_id = e.getAttribute('data-id'), like_count_element = e.querySelector('.hate-count'), like_count = like_count_element.innerHTML;
	// Postoji Cookie
	if(getCookie('hejtovana_vest_'+post_id)){
		alert('Vec ste Hejtovali');
	}else{
		like_count_element.innerHTML = parseInt(like_count) + 1;
		setCookie('hejtovana_vest_'+post_id, true, 900);
		ajaxLikeHate(1, 2, post_id, parseInt(like_count) + 1);
	}
}

// Proveri da li je vec lajkovan Post
function verifyLikeComment(e){
	var post_id = e.getAttribute('data-id'), like_count_element = e.querySelector('.like-count'), like_count = like_count_element.innerHTML;
	// Postoji Cookie
	if(getCookie('lajkovan_komentar_'+post_id)){
		alert('Vec ste lajkovali');
	}else{
		like_count_element.innerHTML = parseInt(like_count) + 1;
		setCookie('lajkovan_komentar_'+post_id, true, 900);
		ajaxLikeHate(2, 1, post_id, parseInt(like_count) + 1);
	}
}

// Proveri da li je vec Hejtovan Post
function verifyHateComment(e){
	var post_id = e.getAttribute('data-id'), like_count_element = e.querySelector('.hate-count'), like_count = like_count_element.innerHTML;
	// Postoji Cookie
	if(getCookie('hejtovan_komentar_'+post_id)){
		alert('Vec ste Hejtovali');
	}else{
		like_count_element.innerHTML = parseInt(like_count) + 1;
		setCookie('hejtovan_komentar_'+post_id, true, 900);
		ajaxLikeHate(2, 2, post_id, parseInt(like_count) + 1);
	}
}

// AJAX Request za Lajkovanje/Hejtovanje
function ajaxLikeHate(post, type, id, count) {
  var xhttp;    
  var str = 'post=' + post + '&type=' + type + '&id=' + id + '&count=' + count;
  xhttp = new XMLHttpRequest();
  xhttp.open('GET', 'action_like_hate.php?'+str, true);
  xhttp.send();
}

// Iskljuci da ne moze da se izabere ista kategorija
function verifyCategoryForHome(e){
		var old_value = e.getAttribute('data-val');
		var selected = [];
		var elements = document.querySelectorAll(".kategorija-za-naslovnu :checked");
		var value = e.value;
		for (i = 0; i < elements.length; i++){
			var tmp = elements[i].value;
		    selected.push(tmp);
		}
		var count = 0;
		for(var i = 0; i < selected.length; i++){
		    if(selected[i] == value)
		        count++;
		}
		if(count > 1){
			alert('Vec ste selektovali tu kategoriju');
			e.value = old_value;
		}else{
			e.value = value;
			e.setAttribute('data-val', value);
		}
}

// Verifikacija registracije
function verifyRegister(e){
	var forma = findParentBySelector(e, '.korisnicka-forma');
	var email = forma.querySelector('.email-field')
	password = forma.querySelector('.password-field'), phone = forma.querySelector('.phone-field');

	email.style.borderColor = !email.value ? 'red' : '#ccc';
	password.style.borderColor = !password.value ? 'red' : '#ccc';
	phone.style.borderColor = !phone.value ? 'red' : '#ccc';

	if(!email.value || !password.value || !phone.value){
		alert('Upisite sve elemente');
	}else{
		var regex1 = new RegExp("(\\d{3})-(\\d{3})-(\\d{4})"), regex2 = new RegExp("(\\d{3})-(\\d{4})-(\\d{3})"), regex3 = new RegExp("(\\d{3})-(\\d{7})");
		if(regex1.test(phone.value) || regex2.test(phone.value) || regex3.test(phone.value)){
			phone.style.borderColor = '#ccc';
			document.getElementById("register-form").submit();
		}else{
			phone.style.borderColor = 'red';
			alert('Verifikacija telefona nije prosla');
		}
	}
}

// Pomocna functija za trazenje parent elementa
function collectionHas(a, b) { //helper function (see below)
    for(var i = 0, len = a.length; i < len; i ++) {
        if(a[i] == b) return true;
    }
    return false;
}

// Pomocna forma da trazimo parent element
function findParentBySelector(elm, selector) {
    var all = document.querySelectorAll(selector);
    var cur = elm.parentNode;
    while(cur && !collectionHas(all, cur)) { //keep going up until you find a match
        cur = cur.parentNode; //go up
    }
    return cur; //will return null if not found
}