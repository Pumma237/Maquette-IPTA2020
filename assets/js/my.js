// Back to top button
function scrollFunction() {
    if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
        document.getElementById("myBtn").style.display = "block";
    } else {
        document.getElementById("myBtn").style.display = "none";
    }
}
// Go to top with animation
function topFunction() {
	$("html, body").animate({scrollTop: 0}, 650);
}
