// to open model
const openModel = (id) => {
  document.getElementById(id).style.display = "block";
};

// to open model
const closeModel = (id) => {
  document.getElementById(id).style.display = "none";
};

document.querySelector(".fa-xmark").addEventListener("click", () => {
  closeModel("tmodel");
});

// fnction to load teacher data
const loadData = () => {
  fetch("http://localhost/attendence-system/teacher-data.php")
    .then((res) => res.json())
    .then((data) => {
      let tr = "";

      for (i in data) {
        tr += `<tr>
                    <td>${data[i].id}</td>
                    <td>${data[i].name}</td>
                    <td>${data[i].email}</td>
                    <td>${data[i].class}</td>
                    <td><button onclick='editTeacher(${data[i].id})' value=${data[i].id}><i class="fa-solid fa-pen-to-square"></i></button></td>
                    <td><button onclick='delTeacher(${data[i].id})' value=${data[i].id}><i class="fa-solid fa-trash"></i></button></td>
                </tr>`;
      }

      document.querySelector("#table").innerHTML = tr;
    });
};

loadData();

// function to del teacher
const delTeacher = (id) => {
  let data = { id: id };
  let jsonData = JSON.stringify(data);

  fetch("http://localhost/attendence-system/del-teacher.php", {
    method: "POST",
    body: jsonData,
    headers: {
      "Content-type": "application/json",
    },
  }).then((res) => {
    if (confirm("Are you sure you wnat to delete ? ")) {
      loadData();
    }
  });
};

// function to edit teacher

let name = document.getElementById("name");
let email = document.getElementById("email");
let room = document.getElementById("class");
let userId = document.getElementById("id");

const editTeacher = (id) => {
  let data = { id: id };
  let jsonData = JSON.stringify(data);

  fetch("http://localhost/attendence-system/get-teacher.php", {
    method: "POST",
    body: jsonData,
    headers: {
      "Content-type": "application/json",
    },
  })
    .then((res) => res.json())
    .then((result) => {
      console.log(result);
      openModel("tmodel");
      name.value = result.name;
      email.value = result.email;
      room.value = result.class;
      userId.value = result.id;
    });
};

document.getElementById("update-form").addEventListener("submit", (e) => {
  e.preventDefault();
  closeModel("tmodel");

  let data = {
    id: id.value,
    name: name.value,
    email: email.value,
    room: room.value,
  };
  let jsonData = JSON.stringify(data);

  fetch("http://localhost/attendence-system/update-teacher.php", {
    method: "POST",
    body: jsonData,
    headers: {
      "Content-type": "application/json",
    },
  }).then((res) => loadData());
});
