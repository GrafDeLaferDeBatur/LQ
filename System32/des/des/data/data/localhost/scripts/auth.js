const checkAuthorization = (e) => {
	const login = document.querySelector("#login").value;
	const password = document.querySelector("#password").value;

	let error = "";

	if(login.trim() === "" || password.trim() === ""){
		e.preventDefault();
		alert("Заполните пустующие поля ввода.");
	}else if(login !== "admin" || password !== "admin"){
		e.preventDefault();
		alert("Совпадений не найдено.");
	}
}

document.querySelector("#submit").addEventListener("click", checkAuthorization);