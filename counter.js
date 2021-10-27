const countElement = document.getElementById("count");

updateVisitCount();

function updateVisitCount() {
	fetch("https://api.countapi.xyz/update/atikegalle/group/?amount=+1")
		.then((res) => res.json())
		.then((res) => {
			countElement.innerHTML = res.value;
		});
}
