// to open model
const opensModel = (id) => {
  document.getElementById(id).style.display = "block";
};

// to open model
const closesModel = (id) => {
  document.getElementById(id).style.display = "none";
};

document.querySelector(".fa-xmark").addEventListener("click", () => {
  closeModel("smodel");
});


const loadStdData = () => {
    fetch("http://localhost/attendence-system/std-data.php")
      .then((res) => res.json())
      .then((data) => {
        let tr = "";
  
        for (i in data) {
          tr += `<tr>
                      <td>${data[i].id}</td>
                      <td>${data[i].sname}</td>
                      <td>${data[i].email}</td>
                      <td>${data[i].course}</td>
                      <td>${data[i].name}</td>
                      <td><button onclick='editStd(${data[i].id})' value=${data[i].id}><i class="fa-solid fa-pen-to-square"></i></button></td>
                      <td><button onclick='delStd(${data[i].id})' value=${data[i].id}><i class="fa-solid fa-trash"></i></button></td>
                  </tr>`;
        }
  
        document.querySelector("#std-table").innerHTML = tr;
      });
};
  

loadStdData();


const delStd = (id) => {

    let data = { id: id };
    let jsonData = JSON.stringify(data);
  
    fetch("http://localhost/attendence-system/del-std.php", {
      method: "POST",
      body: jsonData,
      headers: {
        "Content-type": "application/json",
      },
    }).then((res) => {
      if (confirm("Are you sure you wnat to delete ? ")) {
        loadStdData();
      }
    });

}

let stdId = document.getElementById("std-id");
let stdName = document.getElementById("std-name");
let stdEmail = document.getElementById("std-email");
let stdProgram = document.getElementById("std-program");
let stdTeacher = document.getElementById("std-teacher");

// function for edit std

const editStd = (id) => {

  let data = { id: id }
  let jsonData = JSON.stringify(data);

  fetch("http://localhost/attendence-system/get-std.php", {
    method: "POST",
    body: jsonData,
    headers: {
      "Content-type": "application/json"
    }
  })
    .then((res) => res.json())
    .then((data) => {
      console.log(data);
      opensModel("smodel");
      stdId.value = data.id,
        stdName.value = data.sname,
        stdEmail.value = data.email,
        stdProgram.value = data.course,
        stdTeacher.value = data.name
    });

}


document.getElementById("std-update-form").addEventListener('submit', (e) => {

  e.preventDefault();
  
  let data = { id: stdId.value, name: stdName.value, email: stdEmail.value, program: stdProgram.value }
  let jsonData = JSON.stringify(data);

  fetch("http://localhost/attendence-system/update-std.php", {
    method: "POST",
    body: jsonData,
    headers: {
      "Content-type": "application/json"
    }
    
  })
  .then(() => {
    closesModel("smodel");
    loadStdData();
  })

});