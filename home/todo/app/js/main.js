var addBtn = document.querySelector("#add-btn");
var addForm = document.querySelector("#add-form");
addBtn.addEventListener('click', function () {
	addForm.classList.remove("display-none");
	// add_form.classList.add("display-block");
});

var addCancel = document.querySelector("#add-cancel");
addCancel.addEventListener('click', function () {
	addForm.classList.add("display-none");
});


var todos = document.querySelectorAll(".todo");
var editForm = document.querySelector("#edit-form");
for (var i = 0; i < todos.length; i++) {
	todos[i].addEventListener('click', function () {
		var id = this.dataset.id;
		var title = this.querySelector(".title-value").textContent;
		var memo = this.querySelector(".memo-value").textContent;
		var progress = this.querySelector(".progress-value").dataset.progress;
// console.log(id);
// console.log(title);
// console.log(memo);
// console.log(progress);

		var editTodoId = editForm.querySelector("#id");
		editTodoId.value = id;
		var editTitle = editForm.querySelector("#title");
		editTitle.value = title;
		var editMemo = editForm.querySelector("#memo");
		editMemo.value = memo;
		var editProgress = editForm.querySelector("#progress");
		var editProgressOptions = editForm.querySelector("#progress").options;
		for (var i = 0; editProgress.length > i; i++) {
			if (editProgressOptions[i].value == progress) {
				editProgressOptions[i].selected = true;
			}
		}

		editForm.classList.remove("display-none");
	});
};

var editCancel = document.querySelector("#edit-cancel");
editCancel.addEventListener('click', function () {
	editForm.classList.add("display-none");
});
